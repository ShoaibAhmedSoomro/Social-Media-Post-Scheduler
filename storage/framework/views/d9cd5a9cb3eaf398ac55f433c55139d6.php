<?php $__env->startSection('sub_header'); ?>
    <?php if (isset($component)) { $__componentOriginal6bfd7fd5c294530066e0efb20ff4cd9a = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal6bfd7fd5c294530066e0efb20ff4cd9a = $attributes; } ?>
<?php $component = App\View\Components\SubHeader::resolve(['title' => ''.e(__('System Information')).'','description' => ''.e(__('Exploring essential requirements for optimal performance')).''] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
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

<div class="container w-900 pb-5">

    <!-- Web Server Information Table -->
    <div class="card border-gray-300 mb-5">
        <div class="card-header fw-5"><?php echo e(__("Web Server Information")); ?><i class="fa-light fa-server fs-20"></i></div>
        <div class="card-body p-0">
            <table class="table table-hover w-100">
                <thead class="">
                    <tr class="">
                        <th class="max-w-200 min-w-200 w-200"><span class="fw-5 fw-12"><?php echo e(__("Setting")); ?></span></th>
                        <th class="max-w-200 min-w-200 w-200"><?php echo e(__("Value")); ?></th>
                        <th>Requires</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="fw-5 fs-13"><?php echo e(__("Web Server Type")); ?></td>
                        <td class="fw-5 fs-13"><?php echo e($serverSoftware); ?></td>
                        <td class="fw-5 fs-13"><?php echo e(__("Apache or Nginx recommended")); ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- PHP Configuration Table -->
    <div class="card border-gray-300 mb-5">
        <div class="card-header fw-5"><?php echo e(__("PHP Configuration")); ?><i class="fa-light fa-sliders fs-20"></i></div>
        <div class="card-body p-0">
            <table class="table table-hover w-100">
                <thead>
                    <tr>
                        <th class="max-w-200 min-w-200 w-200"><span class="fw-5 fw-12">Setting</span></th>
                        <th class="max-w-200 min-w-200 w-200">Value</th>
                        <th>Requires</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="fw-5 fs-13"><?php echo e(__("PHP Version")); ?></td>
                        <td class="fw-5 fs-13"><?php echo e($phpSettings['phpversion']); ?></td>
                        <td class="fw-5 fs-13"><?php echo e(__("PHP >= 8.2")); ?></td>
                    </tr>
                    <tr>
                        <td class="fw-5 fs-13"><?php echo e(__("file_uploads")); ?></td>
                        <td class="fw-5 fs-13"><?php echo e($phpSettings['file_uploads'] ? __('Enabled') : __('Disabled')); ?></td>
                        <td class="fw-5 fs-13"><?php echo e(__("Enabled")); ?></td>
                    </tr>
                    <tr>
                        <td class="fw-5 fs-13"><?php echo e(__("max_execution_time")); ?></td>
                        <td class="fw-5 fs-13"><?php echo e($phpSettings['max_execution_time']); ?> <?php echo e(__("seconds")); ?></td>
                        <td class="fw-5 fs-13"><?php echo e(__("120 or more seconds")); ?></td>
                    </tr>
                    <tr>
                        <td class="fw-5 fs-13"><?php echo e(__("SMTP")); ?></td>
                        <td class="fw-5 fs-13"><?php echo e($phpSettings['SMTP']); ?></td>
                        <td class="fw-5 fs-13"><?php echo e(__("Set as per email configuration")); ?></td>
                    </tr>
                    <tr>
                        <td class="fw-5 fs-13"><?php echo e(__("smtp_port")); ?></td>
                        <td class="fw-5 fs-13"><?php echo e($phpSettings['smtp_port']); ?></td>
                        <td class="fw-5 fs-13"><?php echo e(__("Typically 587, 25, 465 or None")); ?></td>
                    </tr>
                    <tr>
                        <td class="fw-5 fs-13"><?php echo e(__("upload_max_filesize")); ?></td>
                        <td class="fw-5 fs-13"><?php echo e($phpSettings['upload_max_filesize']); ?></td>
                        <td class="fw-5 fs-13"><?php echo e(__("At least 1024M")); ?></td>
                    </tr>
                    <tr>
                        <td class="fw-5 fs-13"><?php echo e(__("allow_url_fopen")); ?></td>
                        <td class="fw-5 fs-13"><?php echo e($phpSettings['allow_url_fopen'] ? __('Enabled') : __('Disabled')); ?></td>
                        <td class="fw-5 fs-13"><?php echo e(__("Enabled")); ?></td>
                    </tr>
                    <tr>
                        <td class="fw-5 fs-13"><?php echo e(__("allow_url_include")); ?></td>
                        <td class="fw-5 fs-13"><?php echo e($phpSettings['allow_url_include'] ? __('Enabled') : __('Disabled')); ?></td>
                        <td class="fw-5 fs-13"><?php echo e(__("Disabled (for security)")); ?></td>
                    </tr>
                    <tr>
                        <td class="fw-5 fs-13"><?php echo e(__("memory_limit")); ?></td>
                        <td class="fw-5 fs-13"><?php echo e($phpSettings['memory_limit']); ?></td>
                        <td class="fw-5 fs-13"><?php echo e(__("512M or more")); ?></td>
                    </tr>
                    <tr>
                        <td class="fw-5 fs-13"><?php echo e(__("post_max_size")); ?></td>
                        <td class="fw-5 fs-13"><?php echo e($phpSettings['post_max_size']); ?></td>
                        <td class="fw-5 fs-13"><?php echo e(__("At least 1024M")); ?></td>
                    </tr>
                    <tr>
                        <td class="fw-5 fs-13"><?php echo e(__("max_input_time")); ?></td>
                        <td class="fw-5 fs-13"><?php echo e($phpSettings['max_input_time']); ?> <?php echo e(__("seconds")); ?></td>
                        <td class="fw-5 fs-13"><?php echo e(__("120 seconds")); ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- MySQL Configuration Table -->
    <div class="card border-gray-300 mb-5">
        <div class="card-header fw-5">
            <?php echo e(__("MySQL Configuration")); ?><i class="fa-light fa-wrench fs-20"></i>
        </div>
        <div class="card-body p-0">
            <table class="table table-hover w-100">
                <thead>
                    <tr>
                        <th class="max-w-200 min-w-200 w-200"><span class="fw-5 fw-12"><?php echo e(__("Setting")); ?></span></th>
                        <th class="max-w-200 min-w-200 w-200"><?php echo e(__("Value")); ?></th>
                        <th><?php echo e(__("Requires")); ?></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="fw-5 fs-13"><?php echo e(__("max_connections")); ?></td>
                        <td class="fw-5 fs-13"><?php echo e($mysqlSettings['max_connections'] ?? __('Not Available')); ?></td>
                        <td class="fw-5 fs-13"><?php echo e(__("100 or more")); ?></td>
                    </tr>
                    <tr>
                        <td class="fw-5 fs-13"><?php echo e(__("max_user_connections")); ?></td>
                        <td class="fw-5 fs-13"><?php echo e($mysqlSettings['max_user_connections'] ?? __('Not Available')); ?></td>
                        <td class="fw-5 fs-13"><?php echo e(__("At least 5 per user")); ?></td>
                    </tr>
                    <tr>
                        <td class="fw-5 fs-13"><?php echo e(__("wait_timeout")); ?></td>
                        <td class="fw-5 fs-13"><?php echo e($mysqlSettings['wait_timeout'] ?? __('Not Available')); ?> <?php echo e(__("seconds")); ?></td>
                        <td class="fw-5 fs-13"><?php echo e(__("300 seconds")); ?></td>
                    </tr>
                    <tr>
                        <td class="fw-5 fs-13"><?php echo e(__("max_allowed_packet")); ?></td>
                        <td class="fw-5 fs-13"><?php echo e($mysqlSettings['max_allowed_packet'] ?? __('Not Available')); ?> <?php echo e(__("bytes")); ?></td>
                        <td class="fw-5 fs-13"><?php echo e(__("At least 16M")); ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- PHP Extensions Table -->
    <div class="card border-gray-300 mb-5">
        <div class="card-header fw-5">
            <?php echo e(__("PHP Extensions")); ?><i class="fa-light fa-sliders-up fs-20"></i>
        </div>
        <div class="card-body p-0">
            <table class="table table-hover w-100">
                <thead>
                    <tr>
                        <th class="max-w-200 min-w-200 w-200"><?php echo e(__("Extension")); ?></th>
                        <th class="max-w-200 min-w-200 w-200"><?php echo e(__("Status")); ?></th>
                        <th><?php echo e(__("Requires")); ?></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="fw-5 fs-13"><?php echo e(__("PDO MySQL")); ?></td>
                        <td class="<?php echo e($extensions['pdo_mysql'] === 'Disabled' ? 'fs-13 fw-6 text-danger' : 'fs-13 fw-6 text-success'); ?>">
                            <?php echo e(__($extensions['pdo_mysql'])); ?>

                        </td>
                        <td class="fw-5 fs-13"><?php echo e(__("Required for database connection")); ?></td>
                    </tr>
                    <tr>
                        <td class="fw-5 fs-13"><?php echo e(__("intl")); ?></td>
                        <td class="<?php echo e($extensions['intl'] === 'Disabled' ? 'fs-13 fw-6 text-danger' : 'fs-13 fw-6 text-success'); ?>">
                            <?php echo e(__($extensions['intl'])); ?>

                        </td>
                        <td class="fw-5 fs-13"><?php echo e(__("Required for localization")); ?></td>
                    </tr>
                    <tr>
                        <td class="fw-5 fs-13"><?php echo e(__("OpenSSL")); ?></td>
                        <td class="<?php echo e($extensions['openssl'] === 'Disabled' ? 'fs-13 fw-6 text-danger' : 'fs-13 fw-6 text-success'); ?>">
                            <?php echo e(__($extensions['openssl'])); ?>

                        </td>
                        <td class="fw-5 fs-13"><?php echo e(__("Required for HTTPS support")); ?></td>
                    </tr>
                    <tr>
                        <td class="fw-5 fs-13"><?php echo e(__("Zip")); ?></td>
                        <td class="<?php echo e($extensions['zip'] === 'Disabled' ? 'fs-13 fw-6 text-danger' : 'fs-13 fw-6 text-success'); ?>">
                            <?php echo e(__($extensions['zip'])); ?>

                        </td>
                        <td class="fw-5 fs-13"><?php echo e(__("Required for zip archive handling")); ?></td>
                    </tr>
                    <tr>
                        <td class="fw-5 fs-13"><?php echo e(__("zlib.output_compression")); ?></td>
                        <td class="<?php echo e($extensions['zlib_output_compression'] === 'Disabled' ? 'fs-13 fw-6 text-danger' : 'fs-13 fw-6 text-success'); ?>">
                            <?php echo e(__($extensions['zlib_output_compression'])); ?>

                        </td>
                        <td class="fw-5 fs-13"><?php echo e(__("Enabled for compression")); ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Image Support Table -->
    <div class="card mb-4 border-none shadow">
        <div class="card-header fw-5">
            <?php echo e(__("Image Format Support")); ?><i class="fa-light fa-images fs-20"></i>
        </div>
        <div class="card-body p-0">
            <table class="table table-hover w-100">
                <thead>
                    <tr>
                        <th class="max-w-200 min-w-200 w-200"><?php echo e(__("Image Format")); ?></th>
                        <th class="max-w-200 min-w-200 w-200"><?php echo e(__("Status")); ?></th>
                        <th><?php echo e(__("Requires")); ?></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="fw-5 fs-13"><?php echo e(__("JPEG Support")); ?></td>
                        <td class="<?php echo e($imageSupport['jpeg'] === 'Not Supported' ? 'fs-13 fw-6 text-danger' : 'fs-13 fw-6 text-success'); ?>">
                            <?php echo e(__($imageSupport['jpeg'])); ?>

                        </td>
                        <td class="fw-5 fs-13"><?php echo e(__("Enabled for compression")); ?></td>
                    </tr>
                    <tr>
                        <td class="fw-5 fs-13"><?php echo e(__("PNG Support")); ?></td>
                        <td class="<?php echo e($imageSupport['png'] === 'Not Supported' ? 'fs-13 fw-6 text-danger' : 'fs-13 fw-6 text-success'); ?>">
                            <?php echo e(__($imageSupport['png'])); ?>

                        </td>
                        <td class="fw-5 fs-13"><?php echo e(__("Enabled for compression")); ?></td>
                    </tr>
                    <tr>
                        <td class="fw-5 fs-13"><?php echo e(__("WebP Support")); ?></td>
                        <td class="<?php echo e($imageSupport['webp'] === 'Not Supported' ? 'fs-13 fw-6 text-danger' : 'fs-13 fw-6 text-success'); ?>">
                            <?php echo e(__($imageSupport['webp'])); ?>

                        </td>
                        <td class="fw-5 fs-13"><?php echo e(__("Enabled for compression")); ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Server Tools Table -->
    <div class="card mb-4 border-none shadow">
        <div class="card-header fw-5">
            <?php echo e(__("Server Tools")); ?><i class="fa-light fa-gear-complex-code fs-20"></i>
        </div>
        <div class="card-body p-0">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th class="max-w-200 min-w-200 w-200"><?php echo e(__("Tool")); ?></th>
                        <th class="max-w-200 min-w-200 w-200"><?php echo e(__("Status")); ?></th>
                        <th><?php echo e(__("Requires")); ?></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="fw-5 fs-13"><?php echo e(__("FFMPEG")); ?></td>
                        <td class="<?php echo e($tools['ffmpeg'] === 'Not Installed' ? 'fs-13 fw-6 text-danger' : 'fs-13 fw-6 text-success'); ?>">
                            <?php echo e(__($tools['ffmpeg'])); ?>

                        </td>
                        <td class="fw-5 fs-13"><?php echo e(__("Required for video processing")); ?></td>
                    </tr>
                    <tr>
                        <td class="fw-5 fs-13"><?php echo e(__("Node.js")); ?></td>
                        <td class="<?php echo e($tools['nodeJs'] === 'Not Installed' ? 'fs-13 fw-6 text-danger' : 'fs-13 fw-6 text-success'); ?>">
                            <?php echo e(__($tools['nodeJs'])); ?>

                        </td>
                        <td class="fw-5 fs-13"><?php echo e(__("Required for WhatsApp script")); ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/cotlas-socialxi/htdocs/socialxi.cotlas.net/modules/AdminSystemInformation/resources/views/index.blade.php ENDPATH**/ ?>