<?php
    $optionSidebarSmall = get_option('backend_sidebar_type', 1);
    $hasSidebarSmall = UserInfo::getDataUser("sidebar-small", $optionSidebarSmall);
?>

<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>"  dir="<?php echo e(Language::getCurrent('dir')); ?>" class="<?php echo e($hasSidebarSmall ? 'sidebar-small' : ($optionSidebarSmall == 1 ? 'sidebar-small' : '')); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="<?php echo e(get_option("website_keyword", config('site.keywords'))); ?>">
    <meta name="description" content="<?php echo e(get_option("website_description", config('site.description'))); ?>">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <link rel="icon" type="image/x-icon" href="<?php echo e(url( get_option("website_favicon", asset('public/img/favicon.png')) )); ?>">
    <title>
        <?php if (! empty(trim($__env->yieldContent('pagetitle')))): ?>
            <?php echo $__env->yieldContent('pagetitle'); ?>
        <?php else: ?>
            <?php echo e((__(module("name")) ?? '' ) . " | " . get_option("website_title", config('site.title'))); ?>

        <?php endif; ?>
    </title>

    <?php echo $__env->yieldContent('css'); ?>
    <?php echo Script::renderCss(); ?>

    <?php echo Script::globals(); ?>

    <link rel="stylesheet" href="<?php echo e(theme_public_asset('css/main.css')); ?>?version=9.0.3">

    <?php echo $__env->yieldContent('head_embed_code'); ?>
</head>
<body>
    <div class="loading">
        <div class="d-flex justify-content-center align-items-center hp-100">
            <div class="loader"></div>
        </div>
    </div>

    <div id="drag-overlay">
        <div class="overlay-box">
            <i class="fas fa-cloud-upload-alt"></i>
            <h2 class="mb-2"><?php echo e(__('Drag & Drop your files here')); ?></h2>
            <p class="mb-0 text-muted">
                <?php echo e(__('Supported formats:')); ?>

                <span class="text-uppercase">
                    <?php echo e(get_option('file_allowed_file_types', 'jpeg,gif,png,jpg,webp,mp4,csv,pdf,mp3,wmv,json')); ?>

                </span>
            </p>
        </div>
    </div>

    <?php echo $__env->make('partials.header', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    <?php echo $__env->make('partials.sidebar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    
    <div class="main">

         <?php if(View::hasSection('sub_header') && View::hasSection('content') && View::hasSection('form')): ?>
            <?php
                // Decode the JSON attributes if provided
                $attributes = @json_decode( htmlspecialchars_decode( View::yieldContent('form') ), true) ?? [];
                // Convert to string format: key="value"
                $attributesString = collect($attributes)->map(function ($value, $key) {
                    return $key . '="' . e($value) . '"';
                })->implode(' ');
            ?>

            <form <?php echo $attributesString; ?>>
                <?php echo csrf_field(); ?>

                <?php if (! empty(trim($__env->yieldContent('sub_header')))): ?>
                    <div class="border-bottom mb-5 bg-polygon">
                        <div class="container">
                            <div class="pt-4 pb-4">
                                <?php echo $__env->yieldContent('sub_header'); ?>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>

                <?php echo $__env->yieldContent('content'); ?>
            </form>
        <?php else: ?>
            <?php if (! empty(trim($__env->yieldContent('sub_header')))): ?>
                <div class="border-bottom mb-5 bg-polygon">
                    <div class="container">
                        <div class="pt-4 pb-4">
                            <?php echo $__env->yieldContent('sub_header'); ?>
                        </div>
                    </div>
                </div>
            <?php endif; ?>

            <?php echo $__env->yieldContent('content'); ?>
        <?php endif; ?>
    </div>

    <?php echo $__env->make('partials.footer', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    <!-- FOOTER END -->
    <script type="text/javascript" src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/maps/modules/map.js"></script>
    <script src="https://code.highcharts.com/mapdata/custom/world.js"></script>
    <script type="text/javascript" src="<?php echo e(theme_public_asset('plugins/jquery/jquery.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(theme_public_asset('plugins/jquery-ui/jquery-ui.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(theme_public_asset('plugins/codemirror5/lib/codemirror.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(theme_public_asset('plugins/codemirror5/mode/htmlmixed/htmlmixed.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(theme_public_asset('plugins/codemirror5/mode/php/php.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(theme_public_asset('plugins/codemirror5/mode/css/css.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(theme_public_asset('plugins/codemirror5/mode/javascript/javascript.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(theme_public_asset('plugins/codemirror5/mode/xml/xml.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(theme_public_asset('plugins/bootstrap/js/bootstrap.bundle.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(theme_public_asset('plugins/izitoast/js/iziToast.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(theme_public_asset('plugins/lodash/lodash.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(theme_public_asset('plugins/moment/moment.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(theme_public_asset('plugins/emojionearea/emojionearea.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(theme_public_asset('plugins/datetimepicker/timepicker-addon.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(theme_public_asset('plugins/daterangepicker/daterangepicker.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(theme_public_asset('plugins/select2/js/select2.full.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(theme_public_asset('plugins/sweetalert2/sweetalert2.all.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(theme_public_asset('plugins/ion.rangeSlider/js/ion.rangeSlider.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(theme_public_asset('plugins/tinymce/tinymce.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(theme_public_asset('plugins/inputTags/inputTags.jquery.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(theme_public_asset('plugins/lazysizes/lazysizes.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(theme_public_asset('plugins/datatables/datatables.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(theme_public_asset('plugins/fullcalendar/index.global.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(theme_public_asset('js/main.js')); ?>?version=9.0.3"></script>
    <?php echo $__env->yieldContent('script'); ?>
    <?php echo Script::renderJs(); ?>

    <?php echo Script::renderRaw(); ?>

</body>
</html><?php /**PATH /home/cotlas-socialxi/htdocs/socialxi.cotlas.net/resources/themes/app/pico/resources/views/layouts/app.blade.php ENDPATH**/ ?>