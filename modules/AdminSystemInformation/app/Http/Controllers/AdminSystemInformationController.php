<?php

namespace Modules\AdminSystemInformation\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class AdminSystemInformationController extends Controller
  
{

    public function index()
    {
        // Fetch PHP, MySQL, and server settings.
        $mysqlConfig = DB::select("SHOW VARIABLES WHERE Variable_name IN (
            'max_connections', 'max_user_connections', 'wait_timeout', 'max_allowed_packet'
        )");
        $mysqlSettings = collect($mysqlConfig)->pluck('Value', 'Variable_name');

        $data = [
            'phpSettings' => [
                'max_input_time'       => ini_get('max_input_time'),
                'file_uploads'         => ini_get('file_uploads'),
                'max_execution_time'   => ini_get('max_execution_time'),
                'SMTP'                 => ini_get('SMTP'),
                'smtp_port'            => ini_get('smtp_port'),
                'upload_max_filesize'  => ini_get('upload_max_filesize'),
                'phpversion'           => phpversion(),
                'allow_url_fopen'      => ini_get('allow_url_fopen'),
                'allow_url_include'    => ini_get('allow_url_include'),
                'memory_limit'         => ini_get('memory_limit'),
                'post_max_size'        => ini_get('post_max_size'),
            ],
            'mysqlSettings' => $mysqlSettings,
            'extensions'    => [
                'pdo_mysql' => extension_loaded('pdo_mysql') ? 'Enabled' : 'Disabled',
                'intl'      => extension_loaded('intl') ? 'Enabled' : 'Disabled',
                'openssl'   => extension_loaded('openssl') ? 'Enabled' : 'Disabled',
                'zip'       => extension_loaded('zip') ? 'Enabled' : 'Disabled',
                'zlib_output_compression' => ini_get('zlib.output_compression') ? 'Enabled' : 'Disabled',
            ],
            'imageSupport' => [
                'jpeg' => function_exists('imagejpeg') ? 'Supported' : 'Not Supported',
                'png'  => function_exists('imagepng') ? 'Supported' : 'Not Supported',
                'webp' => function_exists('imagewebp') ? 'Supported' : 'Not Supported',
            ],
            'tools' => [
                'ffmpeg'  => shell_exec('ffmpeg -version') ? 'Installed' : 'Not Installed',
                'nodeJs'  => shell_exec('node -v') ? 'Installed' : 'Not Installed',
            ],
            'serverSoftware' => $_SERVER['SERVER_SOFTWARE'] ?? 'Not Available',
        ];
        return view('adminsysteminformation::index',$data);
    }


    
    

    public function save(Request $request)
    {
        $posts = $request->all();
        foreach ($posts as $name => $value)
        {
            if(is_string($value) || $value==""){
                DB::table('options')->updateOrInsert(
                    ['name' => $name],
                    fn ($exists) => $exists ? ['value' => $value] : ['value' => $value],
                );
            }
        }

        ms([
            "status" => 1,
            "message" => __("Succeed")
        ]);
    }

    public function pusher(){
        return view('adminsettings::pusher');
    }
}