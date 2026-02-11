<?php

namespace Modules\AppFiles\Services;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Modules\AppFiles\Models\Files;
use Intervention\Image\ImageManager;
use Illuminate\Http\File;
use Google_Client;
use Google_Service_Drive;
use Media;

class UploadFileService
{
    protected $client;
    protected $service;
    protected $disk;
    protected $allowedFileTypes = ['jpeg', 'gif', 'png', 'webp', 'jpg', 'mp4', 'csv', 'pdf', 'mp3', 'wmv', 'json'];
    protected $maxFileSize = 2048;

    // Map the storage types to the corresponding disks
    protected $disks = [
        'aws' => 's3',
        'contabo' => 'contabo',
        'local' => 'public',
    ];

    public function __construct()
    {
        $storageType = get_option('file_storage_server', 'local');
        $this->disk = $this->disks[$storageType] ?? 'public';
        $this->maxFileSize = (int)\Access::permission('appfiles.max_size') * 1024;
        $this->allowedFileTypes = explode(',', get_option("file_allowed_file_types", "jpeg,gif,png,jpg,webp,mp4,csv,pdf,mp3,wmv,json") );

        switch ($storageType) {
            case 'aws':
                \Config::set('filesystems.disks.s3', [
                    'driver' => 's3',
                    'key'    => get_option('file_aws3_access_key') ?? '',
                    'secret' => get_option('file_awss3_secret_access_key') ?? '',
                    'region' => get_option('file_aws3_region') ?? '',
                    'bucket' => get_option('file_aws_bucket_name') ?? '',
                    'url'    => null,
                    'endpoint' => null,
                    'use_path_style_endpoint' => true,
                ]);
                break;
            
            case 'contabo':
                \Config::set('filesystems.disks.contabo', [
                    'driver' => 's3',
                    'key'    => get_option('file_contabos3_access_key'),
                    'secret' => get_option('file_contabo_secret_access_key'),
                    'region' => get_option('file_contabos3_region', 'us-east-1'),
                    'bucket' => get_option('file_contabos3_bucket_name'),
                    'endpoint' => get_option('file_contabos3_endpoint'),
                    'use_path_style_endpoint' => true,
                    'visibility' => 'public'
                ]);
                break;
        }
    }

    public function getFileStorageStats($team_id = null)
    {
        if(!$team_id){
            $team_id = request()->team_id ?? 0;
        }
        
        $totalFiles = Files::where('team_id', $team_id)
            ->where('is_folder', 0)
            ->count();

        $usedBytes = Files::where('team_id', $team_id)
            ->sum('size');

        $maxStorageMb = \Access::permission('appfiles.max_storage');
        if (!$maxStorageMb) $maxStorageMb = 0;
        $maxBytes = $maxStorageMb * 1024 * 1024;

        $formatSize = function ($bytes) {
            if ($bytes >= 1073741824) {
                return round($bytes / 1073741824, 2) . 'GB';
            }
            if ($bytes >= 1048576) {
                return round($bytes / 1048576, 2) . 'MB';
            }
            if ($bytes >= 1024) {
                return round($bytes / 1024, 2) . 'KB';
            }
            return $bytes . 'B';
        };

        return [
            'total_files' => $totalFiles,
            'used_bytes' => $usedBytes,
            'used_friendly' => $formatSize($usedBytes),
            'max_bytes' => $maxBytes,
            'max_friendly' => $formatSize($maxBytes),
        ];
    }

    public function checkStorageLimit(int $newFileSizeBytes, ?int $team_id = null): bool
    {
        $team_id = $team_id ?? request()->team_id;

        if (!$team_id) {
            return false;
        }

        $maxStorageMb = \Access::permission('appfiles.max_storage');
        if (!$maxStorageMb || $maxStorageMb <= 0) {
            return false; 
        }

        $maxStorageBytes = $maxStorageMb * 1024 * 1024;
        $usedBytes = Files::where('team_id', $team_id)->sum('size');

        return ($usedBytes + $newFileSizeBytes) > $maxStorageBytes;
    }
    
    public function handleFileUpload(Request $request, $folder)
    {
        $files = $request->file('files');
        $fileData = [];

        // Check tổng size nếu muốn
        $totalSize = array_sum(array_map(fn($file) => $file->getSize(), $files));
        if ($this->checkStorageLimit($totalSize)) {
            throw new \Exception(__('You have exceeded your storage limit.'));
        }

        foreach ($files as $file) {
            $file_name = $this->sanitizeFileName($file->getClientOriginalName());
            $extension = strtolower($file->getClientOriginalExtension());
            $size = $file->getSize();

            // Extension check
            $allowedFileTypes = is_array($this->allowedFileTypes)
                ? $this->allowedFileTypes
                : explode(',', $this->allowedFileTypes);

            if (!in_array($extension, $allowedFileTypes)) {
                throw new \Exception(__('This file type is not allowed: ') . $extension);
            }

            // Size check (MB)
            if ($size > $this->maxFileSize * 1024 * 1024) {
                throw new \Exception(__('File size exceeds the maximum allowed size of :size MB.', [
                    'size' => $this->maxFileSize
                ]));
            }

            // Fix csv MIME
            $mime_type = $file->getMimeType();
            if ($extension === 'csv' && in_array($mime_type, ['text/plain', 'application/octet-stream'])) {
                $mime_type = 'text/csv';
            }

            // Save file
            $file_path = Storage::disk($this->disk)->putFileAs('files', $file, $file_name, 'public');

            if (in_array($this->disk, ['s3', 'contabo'])) {
                $file_path = Storage::disk($this->disk)->url($file_path);
            }

            $is_image = false;
            $img_width = 0;
            $img_height = 0;
            if ($file->isValid() && \Str::startsWith($mime_type, 'image/')) {
                $ImageManager = ImageManager::gd();
                $image = $ImageManager->read($file->getRealPath());
                $img_width = $image->width();
                $img_height = $image->height();
                $is_image = true;
            }

            $fileData[] = [
                'id_secure' => rand_string(),
                'team_id' => $request->team_id,
                'is_folder' => 0,
                'pid' => $folder->id ?? 0,
                'name' => $file_name,
                'file' => $file_path,
                'type' => $mime_type,
                'extension' => $extension,
                'detect' => Media::detectFileType($extension),
                'size' => $file->getSize(),
                'is_image' => $is_image,
                'width' => (int)$img_width,
                'height' => (int)$img_height,
                'created' => time(),
            ];
        }

        Files::insert($fileData);
    }

    public function storeSingleFile($file, string $folder = 'uploads', bool $autoCrop = false, string $aspectRatio = '1:1'): string
    {
        $fileName = $this->sanitizeFileName($file->getClientOriginalName());

        if ($autoCrop && str_starts_with($file->getMimeType(), 'image/')) {
            $manager = \Intervention\Image\ImageManager::gd();
            $image = $manager->read($file->getRealPath());

            $width = $image->width();
            $height = $image->height();

            // Parse aspect ratio (e.g. 16:9 → [16, 9])
            [$aspectW, $aspectH] = explode(':', $aspectRatio);
            $aspectRatioFloat = floatval($aspectW) / floatval($aspectH);

            $currentRatio = $width / $height;

            if ($currentRatio > $aspectRatioFloat) {
                // Crop horizontally (image is too wide)
                $newWidth = intval($height * $aspectRatioFloat);
                $x = intval(($width - $newWidth) / 2);
                $y = 0;
                $cropWidth = $newWidth;
                $cropHeight = $height;
            } else {
                // Crop vertically (image is too tall)
                $newHeight = intval($width / $aspectRatioFloat);
                $x = 0;
                $y = intval(($height - $newHeight) / 2);
                $cropWidth = $width;
                $cropHeight = $newHeight;
            }

            $cropped = $image->crop($cropWidth, $cropHeight, $x, $y);

            // Save to temp file and upload
            $tempDir = sys_get_temp_dir();
            if (!is_writable($tempDir)) {
                throw new \Exception('System temp directory is not writable.');
            }
            $tempPath = $tempDir . DIRECTORY_SEPARATOR . $fileName;
            $cropped->save($tempPath);

            $filePath = \Storage::disk($this->disk)->putFileAs($folder, new \Illuminate\Http\File($tempPath), $fileName);
            @unlink($tempPath);
        } else {
            // Store original file
            $filePath = $file->storeAs($folder, $fileName, $this->disk);
        }

        return $filePath;
    }


    public function storeSingleFileFromURL(string $url, string $folder = 'uploads', ?string $customFileName = null): string
    {
        $fileContent = @file_get_contents($url);

        if ($fileContent === false) {
            throw new \Exception("Unable to download file from URL: $url");
        }

        $path = parse_url($url, PHP_URL_PATH);
        $baseNameRaw = basename($path);

        $ext = pathinfo($baseNameRaw, PATHINFO_EXTENSION);
        $ext = $ext ? strtolower($ext) : 'png';

        $filenameOnly = preg_replace('/[^A-Za-z0-9_\-]/', '', pathinfo($baseNameRaw, PATHINFO_FILENAME));
        if (empty($filenameOnly)) {
            $filenameOnly = 'file';
        }

        $finalFileName = $customFileName
            ? preg_replace('/[^A-Za-z0-9_\-\.]/', '', pathinfo($customFileName, PATHINFO_FILENAME)) . '.' . $ext
            : uniqid() . '_' . $filenameOnly . '.' . $ext;

        $tempPath = tempnam(sys_get_temp_dir(), 'upload_');
        file_put_contents($tempPath, $fileContent);
        $file = new \Illuminate\Http\File($tempPath);

        $filePath = Storage::disk($this->disk)->putFileAs($folder, $file, $finalFileName);

        @unlink($tempPath);

        return $filePath;
    }

    public function saveFileFromUrl(array $file)
    {
        if (empty($file['file_url'])) {
            throw new \Exception(__('File URL is required'));
        }

        $from = $file['from'] ?? '';
        if ($from) {
            switch ($from) {
                case 'google_drive':
                    if (!\Gate::allows('appfiles.google_drive')) {
                        throw new \Exception(__('You do not have permission to upload files from Google Drive.'));
                    }
                    break;
                case 'dropbox':
                    if (!\Gate::allows('appfiles.dropbox')) {
                        throw new \Exception(__('You do not have permission to upload files from Dropbox.'));
                    }
                    break;
                case 'onedrive':
                    if (!\Gate::allows('appfiles.onedrive')) {
                        throw new \Exception(__('You do not have permission to upload files from OneDrive.'));
                    }
                    break;
            }
        }

        $fileContent = $this->downloadFileContent($file['file_url'], $from, $file['access_token'] ?? '');

        // Lấy tên file từ đường dẫn, ưu tiên tên truyền vào
        $file_name = $file['file_name'] ?? basename(parse_url($file['file_url'], PHP_URL_PATH));
        $file_ext = pathinfo($file_name, PATHINFO_EXTENSION);

        // Nếu không có extension, dùng Content-Type
        if (!$file_ext) {
            $head = \Http::head($file['file_url']);
            $mime = $head->header('Content-Type');
            $map = [
                'image/jpeg' => 'jpg',
                'image/png' => 'png',
                'image/webp' => 'webp',
                'video/mp4' => 'mp4',
                'audio/mpeg' => 'mp3',
                'application/json' => 'json',
            ];
            $file_ext = $map[$mime] ?? 'jpg';
            $file_name .= '.' . $file_ext;
        }

        $file_path = 'files/' . uniqid() . '_' . $file_name;

        // Lưu file
        \Storage::disk($this->disk)->put($file_path, $fileContent);

        // Lấy content-type chính xác
        if ($from === 'google_drive') {
            $file_type = 'application/octet-stream';
        } else {
            $head = \Http::head($file['file_url']);
            $file_type = $head->header('Content-Type') ?: Media::detectFileType($file_ext) ?: 'application/octet-stream';
        }

        $file_detect = Media::detectFileType($file_ext);
        $file_size = strlen($fileContent);

        if (!in_array($file_ext, $this->allowedFileTypes)) {
            throw new \Exception(__('Invalid file type. Allowed: ') . implode(', ', $this->allowedFileTypes));
        }

        if ($this->checkStorageLimit($file_size)) {
            throw new \Exception(__('You have exceeded your storage limit.'));
        }

        if ($file_size > $this->maxFileSize * 1024) {
            throw new \Exception(__('File size exceeds the maximum allowed size of :size MB.', ['size' => $this->maxFileSize / 1024]));
        }

        // Xử lý ảnh
        $is_image = in_array($file_type, ['image/jpeg', 'image/png']);
        $img_width = 0;
        $img_height = 0;

        if ($is_image) {
            $ImageManager = ImageManager::gd();
            $image = $ImageManager->read(Media::path($file_path));
            $img_width = $image->width();
            $img_height = $image->height();
        }

        $fileData = [
            'id_secure' => rand_string(),
            'team_id'   => request()->team_id,
            'is_folder' => 0,
            'pid'       => $file['folder_id'] ?? 0,
            'name'      => $file_name,
            'file'      => $file_path,
            'type'      => $file_type,
            'extension' => $file_ext,
            'detect'    => $file_detect,
            'size'      => $file_size,
            'is_image'  => $is_image,
            'width'     => (int)$img_width,
            'height'    => (int)$img_height,
            'created'   => time(),
        ];

        Files::insert($fileData);

        return \Media::url($file_path);
    }

    protected function downloadFileContent($file_url, $from, $access_token = '')
    {
        if ($from === 'google_drive') {
            if (empty($access_token)) {
                throw new \Exception(__('Access Token is required'));
            }
            return $this->getGoogleDriveFileContent($file_url, $access_token)['fileContent'];
        }

        $fileContent = \Http::get($file_url);
        if (!$fileContent->successful()) {
            throw new \Exception(__('Failed to download file'));
        }
        return $fileContent;
    }

    protected function getGoogleDriveFileContent($file_id, $access_token)
    {
        $this->client = new Google_Client();
        $this->client->setClientId( get_option('file_google_drive_client_id') );
        $this->client->setClientSecret( get_option('file_google_drive_api_key') );
        $this->client->setDeveloperKey( get_option('file_google_drive_client_secret') );
        $this->client->addScope(Google_Service_Drive::DRIVE_READONLY);
        $this->client->setAccessType('offline');
        $this->client->setPrompt('select_account consent');
        $this->client->setAccessToken($access_token);
        $this->service = new Google_Service_Drive($this->client);

        $response = $this->service->files->get($file_id, ['alt' => 'media']);
        $content = $response->getBody()->getContents();
        $fileName = $response->getHeaders()['Content-Disposition'][0] ?? $file_id;

        return ['fileContent' => $content, 'name' => $fileName];
    }

    public function saveMultipleFilesFromUrls(array $files, $folder_id = false)
    {
        $result = [];
        foreach ($files as $file) {
            $file = json_decode($file, true);
            if (json_last_error() === JSON_ERROR_NONE && isset($file['link'], $file['name'], $file['from'])) {
                $result[] = $this->saveFileFromUrl([
                    'file_url' => $file['link'],
                    'file_name' => $file['name'],
                    'folder_id' => $folder_id,
                    'from' => $file['from'],
                    'access_token' => $file['access_token'] ?? '',
                ]);
            }
        }
        return $result;
    }

    /**
     * Deletes files and folders based on the provided request.
     */
    public function destroy(Request $request)
    {
        $id_arr = id_arr($request->input('id'));

        if (empty($id_arr)) {
            return response()->json([
                'status'  => 0,
                'message' => __('Please select at least one item'),
            ]);
        }

        // Get files and folders by id_secure and file
        $items = Files::whereIn('id_secure', $id_arr)
                      ->orWhereIn('file', $id_arr)
                      ->get();

        // Delete files and folders recursively
        foreach ($items as $item) {
            if ($item->is_folder) {
                $this->deleteFolderAndContents($item->id);
            } else {
                $this->deleteFileFromServer($item->file);
                $item->delete();
            }
        }

        return response()->json([
            'status'  => 1,
            'message' => __('Succeed'),
        ]);
    }

    /**
     * Recursively deletes a folder and its contents.
     *
     * @param int $folder_id
     * @return bool
     */
    protected function deleteFolderAndContents($folder_id)
    {
        $folder = Files::with('subfolders')->where('id', $folder_id)->first();

        if (!$folder) {
            return false;
        }

        // Delete all subfolders/files within the folder.
        $this->deleteContents($folder);

        // Delete the folder file from storage and then remove its record.
        $this->deleteFileFromServer($folder->file);
        $folder->delete();

        return true;
    }

    /**
     * Recursively deletes the contents (files and subfolders) of a folder.
     * Note: This method no longer deletes the folder record itself.
     *
     * @param Files $folder
     */
    protected function deleteContents($folder)
    {
        // Delete subfolders recursively.
        if (!empty($folder->subfolders)) {
            foreach ($folder->subfolders as $subfolder) {
                $this->deleteFolderAndContents($subfolder->id);
            }
        }

        // Delete files directly within this folder.
        $files = Files::where('pid', $folder->id)->get();
        foreach ($files as $file) {
            $this->deleteFileFromServer($file->file);
            $file->delete();
        }
    }

    /**
     * Deletes a file from the server's storage.
     *
     * @param string $filePath
     */
    public function deleteFileFromServer($filePath)
    {
        if ($filePath && Storage::disk($this->disk)->exists($filePath)) {
            Storage::disk($this->disk)->delete($filePath);
        }
    }

    protected function sanitizeFileName($filename)
    {
        $filename = strtolower($filename);
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        $name = pathinfo($filename, PATHINFO_FILENAME);
        $name = preg_replace('/[^a-z0-9\-_]+/u', '-', $name);
        $name = trim($name, '-_');
        $rand = rand_string(6);
        $clean = $name . '_' . $rand . ($ext ? '.' . $ext : '');

        return $clean;
    }
}