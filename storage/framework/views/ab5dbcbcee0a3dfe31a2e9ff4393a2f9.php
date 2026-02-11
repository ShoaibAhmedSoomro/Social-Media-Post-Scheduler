<?php $__env->startSection('sub_header'); ?>
    <?php if (isset($component)) { $__componentOriginal6bfd7fd5c294530066e0efb20ff4cd9a = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal6bfd7fd5c294530066e0efb20ff4cd9a = $attributes; } ?>
<?php $component = App\View\Components\SubHeader::resolve(['title' => ''.e(__('General Settings')).'','description' => ''.e(__('Set up core application preferences')).''] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
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
                <div class="fw-6">
                    <?php echo e(__("Website Settings")); ?>

                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="mb-4">
                            <label for="name" class="form-label"><?php echo e(__('Website Title')); ?></label>
                            <input class="form-control" name="website_title" id="website_title" type="text" value="<?php echo e(get_option("website_title", config('site.title'))); ?>">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="mb-4">
                            <label for="name" class="form-label"><?php echo e(__('Website Description')); ?></label>
                            <input class="form-control" name="website_description" id="website_description" type="text" value="<?php echo e(get_option("website_description", config('site.description'))); ?>">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="mb-4">
                            <label for="name" class="form-label"><?php echo e(__('Website Keyword')); ?></label>
                            <input class="form-control" name="website_keyword" id="website_keyword" type="text" value="<?php echo e(get_option("website_keyword", config('site.keywords'))); ?>">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="card shadow-none border-gray-300 mb-4">
            <div class="card-header">
                <div class="fw-6">
                    <?php echo e(__("Logo Settings")); ?>

                </div>
            </div>
            <div class="card-body">
                <div class="row">

                    <div class="col-md-12">
                        <div class="mb-4">
                            <?php echo $__env->make('appfiles::block_select_file', [
                            "id" => "website_favicon",
                            "name" => __("Website favicon"),
                            "required" => false,
                            "value" => get_option("website_favicon", asset('public/img/favicon.png'))
                        ], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="mb-4">
                            <?php echo $__env->make('appfiles::block_select_file', [
                            "id" => "website_logo_dark",
                            "name" => __("Website logo dark"),
                            "required" => false,
                            "value" => get_option("website_logo_dark", asset('public/img/logo-dark.png'))
                        ], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-4">
                            <?php echo $__env->make('appfiles::block_select_file', [
                            "id" => "website_logo_light",
                            "name" => __("Website logo light"),
                            "required" => false,
                           "value" => get_option("website_logo_light", asset('public/img/logo-light.png'))
                        ], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-4">
                             <?php echo $__env->make('appfiles::block_select_file', [
                            "id" => "website_logo_brand_dark",
                            "name" => __("Website logo brand dark"),
                            "required" => false,
                            "value" => get_option("website_logo_brand_dark", asset('public/img/logo-brand-dark.png'))
                        ], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-4">
                            <?php echo $__env->make('appfiles::block_select_file', [
                            "id" => "website_logo_brand_light",
                            "name" => __("Website logo brand light"),
                            "required" => false,
                            "value" => get_option("website_logo_brand_light", asset('public/img/logo-brand-light.png'))
                        ], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card shadow-none border-gray-300 mb-4">
            <div class="card-header">
                <div class="fw-6">
                    <?php echo e(__("Date and Time Formats")); ?>

                </div>
            </div>
            <div class="card-body">
    <div class="row">
        <div class="col-md-6 mb-4">
            <label for="format_date" class="form-label">
                <?php echo e(__('Date')); ?>

            </label>
            <select class="form-select" name="format_date" id="format_date">
                <?php $__currentLoopData = getDateFormats(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $example): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($key); ?>"
                        <?php if(get_option('format_date', getDefaultDateFormat()) == $key): echo 'selected'; endif; ?>>
                        <?php echo e($example); ?> (<?php echo e($key); ?>)
                    </option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>
        <div class="col-md-6 mb-4">
            <label for="format_datetime" class="form-label">
                <?php echo e(__('Date and Time')); ?>

            </label>
            <?php
                $selectedFormat = (string) get_option('format_datetime', getDefaultDateTimeFormat());
            ?>
            <select class="form-select" name="format_datetime" id="format_datetime">
                <?php $__currentLoopData = getDateTimeFormats(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $example): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($key); ?>"
                        <?php echo e($selectedFormat === (string) $key ? 'selected' : ''); ?>>
                        <?php echo e($example); ?> (<?php echo e($key); ?>)
                    </option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>
    </div>
</div>
        </div>
        <div class="card shadow-none border-gray-300 mb-4">
            <div class="card-header">
                <div class="fw-6">
                    <?php echo e(__("Contact Settings")); ?>

                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-4">
                            <label for="name" class="form-label"><?php echo e(__('Company Name')); ?></label>
                            <input class="form-control" name="contact_company_name" id="contact_company_name" type="text" value="<?php echo e(get_option("contact_company_name", "Your Company Name")); ?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-4">
                            <label for="name" class="form-label"><?php echo e(__('Company Website')); ?></label>
                            <input class="form-control" name="contact_company_website" id="contact_company_website" type="text" value="<?php echo e(get_option("contact_company_website", "https://yourcompany.com")); ?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-4">
                            <label for="name" class="form-label"><?php echo e(__('Email Address')); ?></label>
                            <input class="form-control" name="contact_email" id="contact_email" type="text" value="<?php echo e(get_option("contact_email", "support@yourcompany.com")); ?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-4">
                            <label for="name" class="form-label"><?php echo e(__('Phone Number')); ?></label>
                            <input class="form-control" name="contact_phone_number" id="contact_phone_number" type="text" value="<?php echo e(get_option("contact_phone_number", "+1 234 567 890")); ?>">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="mb-4">
                            <label for="name" class="form-label"><?php echo e(__('Working Hours')); ?></label>
                            <input class="form-control" name="contact_working_hours" id="contact_working_hours" type="text" value="<?php echo e(get_option("contact_working_hours", "Mon - Fri: 09:00 AM - 06:00 PM")); ?>">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="mb-4">
                            <label for="name" class="form-label"><?php echo e(__('Location')); ?></label>
                            <input class="form-control" name="contact_location" id="contact_location" type="text" value="<?php echo e(get_option("contact_location", "123 Main Street, City, Country")); ?>">
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
        </div>



    </form>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/cotlas-socialxi/htdocs/socialxi.cotlas.net/modules/AdminSettings/resources/views/index.blade.php ENDPATH**/ ?>