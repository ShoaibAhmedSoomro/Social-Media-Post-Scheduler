

<?php $__env->startSection('sub_header'); ?>
    <?php if (isset($component)) { $__componentOriginal6bfd7fd5c294530066e0efb20ff4cd9a = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal6bfd7fd5c294530066e0efb20ff4cd9a = $attributes; } ?>
<?php $component = App\View\Components\SubHeader::resolve(['title' => ''.e(__('File Settings')).'','description' => ''.e(__('Configure and manage your file settings easily')).''] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('sub-header'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\SubHeader::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal6bfd7fd5c294530066e0efb20ff4cd9a)): ?>
<?php $attributes = $__attributesOriginal6bfd7fd5c294530066e0efb20ff4cd9a; ?>
<?php unset($__attributesOriginal6bfd7fd5c294530066e0efb20ff4cd9a); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal6bfd7fd5c294530066e0efb20ff4cd9a)): ?>
<?php $component = $__componentOriginal6bfd7fd5c294530066e0efb20ff4cd9a; ?>
<?php unset($__componentOriginal6bfd7fd5c294530066e0efb20ff4cd9a); ?>
<?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="container max-w-800 pb-5">
    <form class="actionForm" action="<?php echo e(url_admin("settings/save")); ?>">
        <div class="card shadow-none border-gray-300 mb-4">
            <div class="card-header">
                <div class="fw-6"><?php echo e(__("General configuration")); ?></div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="mb-4">
                            <label class="form-label"><?php echo e(__('Stogare server')); ?></label>
                            <select class="form-select" name="file_storage_server">
                                <?php foreach (Media::disks() as $key => $value): ?>
                                    <option value="<?php echo e($key); ?>" <?php echo e(get_option("file_storage_server", "local")==$key?"selected":""); ?> ><?php echo e($value); ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="mb-4">
                            <label class="form-label"><?php echo e(__('Allowed File Types')); ?></label>
                            <input type="text" class="form-control" name="file_allowed_file_types" value="<?php echo e(get_option("file_allowed_file_types", "jpeg,gif,png,jpg,webp,mp4,csv,pdf,mp3,wmv,json")); ?>" >
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="mb-4">
                            <label class="form-label"><?php echo e(__('File Upload by URL')); ?></label>
                            <div class="d-flex gap-8 flex-column flex-lg-row flex-md-column">
                                <div class="form-check me-3">
                                    <input class="form-check-input" type="radio" name="file_allow_upload_from_url" value="1" id="file_allow_upload_from_url_1" <?php echo e(get_option("file_allow_upload_from_url", 1)==1?"checked":""); ?>>
                                    <label class="form-check-label mt-1" for="file_allow_upload_from_url_1">
                                        <?php echo e(__('Enable')); ?>

                                    </label>
                                </div>
                                <div class="form-check me-3">
                                    <input class="form-check-input" type="radio" name="file_allow_upload_from_url" value="0" id="file_allow_upload_from_url_0"<?php echo e(get_option("file_allow_upload_from_url", 1)==0?"checked":""); ?>>
                                    <label class="form-check-label mt-1" for="file_allow_upload_from_url_0">
                                        <?php echo e(__('Disable')); ?>

                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card shadow-none border-gray-300 mb-4">
            <div class="card-header">
                <div class="fw-6"><?php echo e(__("Amazon S3")); ?></div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="alert alert-primary fs-14">
                            <?php echo e(__("Click this link to create Amazon S3: ")); ?>

                            <a href="https://s3.console.aws.amazon.com/s3/home" target="_blank">https://s3.console.aws.amazon.com/s3/home</a>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="mb-4">
                            <label for="name" class="form-label"><?php echo e(__('Region')); ?></label>
                            <input class="form-control" name="file_aws3_region" id="file_aws3_region" type="text" value="<?php echo e(get_option("file_aws3_region", "")); ?>">
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="mb-4">
                            <label for="name" class="form-label"><?php echo e(__('Access Key')); ?></label>
                            <input class="form-control" name="file_aws3_access_key" id="file_aws3_access_key" type="text" value="<?php echo e(get_option("file_aws3_access_key", "")); ?>">
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="mb-4">
                            <label for="name" class="form-label"><?php echo e(__('Secret Access Key')); ?></label>
                            <input class="form-control" name="file_awss3_secret_access_key" id="file_awss3_secret_access_key" type="text" value="<?php echo e(get_option("file_awss3_secret_access_key", "")); ?>">
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="mb-4">
                            <label for="name" class="form-label"><?php echo e(__('Bucket Name')); ?></label>
                            <input class="form-control" name="file_aws_bucket_name" id="file_aws_bucket_name" type="text" value="<?php echo e(get_option("file_aws_bucket_name", "")); ?>">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card shadow-none border-gray-300 mb-4">
            <div class="card-header">
                <div class="fw-6"><?php echo e(__("Contabo S3")); ?></div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="alert alert-primary fs-14">
                            <?php echo e(__("Click this link to create Contabo S3: ")); ?>

                            <a href="https://contabo.com/" target="_blank">https://contabo.com/</a>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="mb-4">
                            <label for="name" class="form-label"><?php echo e(__('Region')); ?></label>
                            <input class="form-control" name="file_contabos3_region" id="file_contabos3_region" type="text" value="<?php echo e(get_option("file_contabos3_region", "")); ?>">
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="mb-4">
                            <label for="name" class="form-label"><?php echo e(__('Access Key')); ?></label>
                            <input class="form-control" name="file_contabos3_access_key" id="file_contabos3_access_key" type="text" value="<?php echo e(get_option("file_contabos3_access_key", "")); ?>">
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="mb-4">
                            <label for="name" class="form-label"><?php echo e(__('Secret Access Key')); ?></label>
                            <input class="form-control" name="file_contabo_secret_access_key" id="file_contabo_secret_access_key" type="text" value="<?php echo e(get_option("file_contabo_secret_access_key", "")); ?>">
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="mb-4">
                            <label for="name" class="form-label"><?php echo e(__('Bucket Name')); ?></label>
                            <input class="form-control" name="file_contabos3_bucket_name" id="file_contabos3_bucket_name" type="text" value="<?php echo e(get_option("file_contabos3_bucket_name", "")); ?>">
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="mb-4">
                            <label for="name" class="form-label"><?php echo e(__('Endpoint')); ?></label>
                            <input class="form-control" name="file_contabos3_endpoint" id="file_contabos3_endpoint" type="text" value="<?php echo e(get_option("file_contabos3_endpoint", "")); ?>">
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="mb-4">
                            <label for="name" class="form-label"><?php echo e(__('Public URL')); ?></label>
                            <input class="form-control" name="file_contabos3_public_url" id="file_contabos3_public_url" type="text" value="<?php echo e(get_option("file_contabos3_public_url", "")); ?>">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card shadow-none border-gray-300 mb-4">
            <div class="card-header">
                <div class="fw-6"><?php echo e(__("Adobe Express - Image editor")); ?></div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="mb-4">
                            <label class="form-label"><?php echo e(__('Status')); ?></label>
                            <div class="d-flex gap-8 flex-column flex-lg-row flex-md-column">
                                <div class="form-check me-3">
                                    <input class="form-check-input" type="radio" name="file_addobe_express_status" value="1" id="file_addobe_express_status_1" <?php echo e(get_option("file_addobe_express_status", 0)==1?"checked":""); ?>>
                                    <label class="form-check-label mt-1" for="file_addobe_express_status_1">
                                        <?php echo e(__('Enable')); ?>

                                    </label>
                                </div>
                                <div class="form-check me-3">
                                    <input class="form-check-input" type="radio" name="file_addobe_express_status" value="0" id="file_addobe_express_status_0"<?php echo e(get_option("file_addobe_express_status", 0)==0?"checked":""); ?>>
                                    <label class="form-check-label mt-1" for="file_addobe_express_status_0">
                                        <?php echo e(__('Disable')); ?>

                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="mb-4">
                            <label for="name" class="form-label"><?php echo e(__('API Key')); ?></label>
                            <input class="form-control" name="file_addobe_express_api_key" id="file_addobe_express_api_key" type="text" value="<?php echo e(get_option("file_addobe_express_api_key", "")); ?>">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card shadow-none border-gray-300 mb-4">
            <div class="card-header">
                <div class="fw-6"><?php echo e(__("Unsplash (Search & Get Media Online)")); ?></div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="mb-4">
                            <label class="form-label"><?php echo e(__('Status')); ?></label>
                            <div class="d-flex gap-8 flex-column flex-lg-row flex-md-column">
                                <div class="form-check me-3">
                                    <input class="form-check-input" type="radio" name="file_unsplash_status" value="1" id="file_unsplash_status_1" <?php echo e(get_option("file_unsplash_status", 0)==1?"checked":""); ?>>
                                    <label class="form-check-label mt-1" for="file_unsplash_status_1">
                                        <?php echo e(__('Enable')); ?>

                                    </label>
                                </div>
                                <div class="form-check me-3">
                                    <input class="form-check-input" type="radio" name="file_unsplash_status" value="0" id="file_unsplash_status_0"<?php echo e(get_option("file_unsplash_status", 0)==0?"checked":""); ?>>
                                    <label class="form-check-label mt-1" for="file_unsplash_status_0">
                                        <?php echo e(__('Disable')); ?>

                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="mb-4">
                            <label for="name" class="form-label"><?php echo e(__('Access Key')); ?></label>
                            <input class="form-control" name="file_unsplash_access_key" id="file_unsplash_access_key" type="text" value="<?php echo e(get_option("file_unsplash_access_key", "")); ?>">
                        </div>

                        <div class="mb-4">
                            <label for="name" class="form-label"><?php echo e(__('Secret key')); ?></label>
                            <input class="form-control" name="file_unsplash_secret_key" id="file_unsplash_secret_key" type="text" value="<?php echo e(get_option("file_unsplash_secret_key", "")); ?>">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card shadow-none border-gray-300 mb-4">
            <div class="card-header">
                <div class="fw-6"><?php echo e(__("Pexels (Search & Get Media Online)")); ?></div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="mb-4">
                            <label class="form-label"><?php echo e(__('Status')); ?></label>
                            <div class="d-flex gap-8 flex-column flex-lg-row flex-md-column">
                                <div class="form-check me-3">
                                    <input class="form-check-input" type="radio" name="file_pexels_status" value="1" id="file_pexels_status_1" <?php echo e(get_option("file_pexels_status", 0)==1?"checked":""); ?>>
                                    <label class="form-check-label mt-1" for="file_pexels_status_1">
                                        <?php echo e(__('Enable')); ?>

                                    </label>
                                </div>
                                <div class="form-check me-3">
                                    <input class="form-check-input" type="radio" name="file_pexels_status" value="0" id="file_pexels_status_0"<?php echo e(get_option("file_pexels_status", 0)==0?"checked":""); ?>>
                                    <label class="form-check-label mt-1" for="file_pexels_status_0">
                                        <?php echo e(__('Disable')); ?>

                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="mb-4">
                            <label for="name" class="form-label"><?php echo e(__('API Key')); ?></label>
                            <input class="form-control" name="file_pexels_api_key" id="file_pexels_api_key" type="text" value="<?php echo e(get_option("file_pexels_api_key", "")); ?>">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card shadow-none border-gray-300 mb-4">
            <div class="card-header">
                <div class="fw-6"><?php echo e(__("Pixabay (Search & Get Media Online)")); ?></div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="mb-4">
                            <label class="form-label"><?php echo e(__('Status')); ?></label>
                            <div class="d-flex gap-8 flex-column flex-lg-row flex-md-column">
                                <div class="form-check me-3">
                                    <input class="form-check-input" type="radio" name="file_pixabay_status" value="1" id="file_pixabay_status_1" <?php echo e(get_option("file_pixabay_status", 0)==1?"checked":""); ?>>
                                    <label class="form-check-label mt-1" for="file_pixabay_status_1">
                                        <?php echo e(__('Enable')); ?>

                                    </label>
                                </div>
                                <div class="form-check me-3">
                                    <input class="form-check-input" type="radio" name="file_pixabay_status" value="0" id="file_pixabay_status_0"<?php echo e(get_option("file_pixabay_status", 0)==0?"checked":""); ?>>
                                    <label class="form-check-label mt-1" for="file_pixabay_status_0">
                                        <?php echo e(__('Disable')); ?>

                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="mb-4">
                            <label for="name" class="form-label"><?php echo e(__('API Key')); ?></label>
                            <input class="form-control" name="file_pixabay_api_key" id="file_pixabay_api_key" type="text" value="<?php echo e(get_option("file_pixabay_api_key", "")); ?>">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card shadow-none border-gray-300 mb-4">
            <div class="card-header">
                <div class="fw-6"><?php echo e(__("Google Drive")); ?></div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="mb-4">
                            <label class="form-label"><?php echo e(__('Status')); ?></label>
                            <div class="d-flex gap-8 flex-column flex-lg-row flex-md-column">
                                <div class="form-check me-3">
                                    <input class="form-check-input" type="radio" name="file_google_drive_status" value="1" id="file_google_drive_status_1" <?php echo e(get_option("file_google_drive_status", 0)==1?"checked":""); ?>>
                                    <label class="form-check-label mt-1" for="file_google_drive_status_1">
                                        <?php echo e(__('Enable')); ?>

                                    </label>
                                </div>
                                <div class="form-check me-3">
                                    <input class="form-check-input" type="radio" name="file_google_drive_status" value="0" id="file_google_drive_status_0"<?php echo e(get_option("file_google_drive_status", 0)==0?"checked":""); ?>>
                                    <label class="form-check-label mt-1" for="file_google_drive_status_0">
                                        <?php echo e(__('Disable')); ?>

                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="mb-4">
                            <label for="name" class="form-label"><?php echo e(__('API Key')); ?></label>
                            <input class="form-control" name="file_google_drive_api_key" id="file_google_drive_api_key" type="text" value="<?php echo e(get_option("file_google_drive_api_key", "")); ?>">
                        </div>

                        <div class="mb-4">
                            <label for="name" class="form-label"><?php echo e(__('Client ID')); ?></label>
                            <input class="form-control" name="file_google_drive_client_id" id="file_google_drive_client_id" type="text" value="<?php echo e(get_option("file_google_drive_client_id", "")); ?>">
                        </div>

                        <div class="mb-4">
                            <label for="name" class="form-label"><?php echo e(__('Client Secret')); ?></label>
                            <input class="form-control" name="file_google_drive_client_secret" id="file_google_drive_client_secret" type="text" value="<?php echo e(get_option("file_google_drive_client_secret", "")); ?>">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card shadow-none border-gray-300 mb-4">
            <div class="card-header">
                <div class="fw-6"><?php echo e(__("Dropbox")); ?></div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="mb-4">
                            <label class="form-label"><?php echo e(__('Status')); ?></label>
                            <div class="d-flex gap-8 flex-column flex-lg-row flex-md-column">
                                <div class="form-check me-3">
                                    <input class="form-check-input" type="radio" name="file_dropbox_status" value="1" id="file_dropbox_status_1" <?php echo e(get_option("file_dropbox_status", 0)==1?"checked":""); ?>>
                                    <label class="form-check-label mt-1" for="file_dropbox_status_1">
                                        <?php echo e(__('Enable')); ?>

                                    </label>
                                </div>
                                <div class="form-check me-3">
                                    <input class="form-check-input" type="radio" name="file_dropbox_status" value="0" id="file_dropbox_status_0"<?php echo e(get_option("file_dropbox_status", 0)==0?"checked":""); ?>>
                                    <label class="form-check-label mt-1" for="file_dropbox_status_0">
                                        <?php echo e(__('Disable')); ?>

                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="mb-4">
                            <label for="name" class="form-label"><?php echo e(__('API Key')); ?></label>
                            <input class="form-control" name="file_dropbox_api_key" id="file_dropbox_api_key" type="text" value="<?php echo e(get_option("file_dropbox_api_key", "")); ?>">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card shadow-none border-gray-300 mb-4">
            <div class="card-header">
                <div class="fw-6"><?php echo e(__("OneDrive")); ?></div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="mb-4">
                            <label class="form-label"><?php echo e(__('Status')); ?></label>
                            <div class="d-flex gap-8 flex-column flex-lg-row flex-md-column">
                                <div class="form-check me-3">
                                    <input class="form-check-input" type="radio" name="file_onedrive_status" value="1" id="file_onedrive_status_1" <?php echo e(get_option("file_onedrive_status", 0)==1?"checked":""); ?>>
                                    <label class="form-check-label mt-1" for="file_onedrive_status_1">
                                        <?php echo e(__('Enable')); ?>

                                    </label>
                                </div>
                                <div class="form-check me-3">
                                    <input class="form-check-input" type="radio" name="file_onedrive_status" value="0" id="file_onedrive_status_0"<?php echo e(get_option("file_onedrive_status", 0)==0?"checked":""); ?>>
                                    <label class="form-check-label mt-1" for="file_onedrive_status_0">
                                        <?php echo e(__('Disable')); ?>

                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="mb-4">
                            <label for="name" class="form-label"><?php echo e(__('API Key')); ?></label>
                            <input class="form-control" name="file_onedrive_api_key" id="file_onedrive_api_key" type="text" value="<?php echo e(get_option("file_onedrive_api_key", "")); ?>">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="mt-4">
            <button type="submit" class="btn btn-dark b-r-10 w-100">
                <?php echo e(__('Save changes')); ?>

            </button>
        </div>

    </form>

</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/cotlas-socialxi/htdocs/socialxi.cotlas.net/modules/AppFiles/resources/views/settings.blade.php ENDPATH**/ ?>