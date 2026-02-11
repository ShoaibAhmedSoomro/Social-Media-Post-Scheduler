<?php $__env->startSection('sub_header'); ?>
    <?php if (isset($component)) { $__componentOriginal6bfd7fd5c294530066e0efb20ff4cd9a = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal6bfd7fd5c294530066e0efb20ff4cd9a = $attributes; } ?>
<?php $component = App\View\Components\SubHeader::resolve(['title' => ''.e(__('Appearance')).'','description' => ''.e(__('The interface matches brand and preferences')).''] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
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
    <form class="actionForm" action="<?php echo e(url_admin('settings/save')); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <div class="card shadow-none border-gray-300 mb-4">
            <div class="card-header">
                <div class="fw-6">
                    <?php echo e(__("Backend configure")); ?>

                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    
                    <div class="col-md-12">
                        <div class="mb-4">
                            <label class="form-label"><?php echo e(__('Sidebar type')); ?></label>
                            <div class="mb-0">
                                <div class="d-flex gap-4 flex-column flex-lg-row">
                                    <div class="form-check me-3">
                                        <input class="form-check-input" type="radio" name="backend_sidebar_type" value="1" id="backend_sidebar_type_2" <?php echo e(get_option("backend_sidebar_type", 1)==1?"checked":""); ?>>
                                        <label class="form-check-label mt-1" for="backend_sidebar_type_2">
                                            <?php echo e(__('Hover')); ?>

                                        </label>
                                    </div>
                                    <div class="form-check me-3">
                                        <input class="form-check-input" type="radio" name="backend_sidebar_type" value="0" id="backend_sidebar_type_0" <?php echo e(get_option("backend_sidebar_type", 1)==0?"checked":""); ?>>
                                        <label class="form-check-label mt-1" for="backend_sidebar_type_0">
                                            <?php echo e(__('Open')); ?>

                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-12 d-none">
                        <div class="mb-4">
                            <label class="form-label"><?php echo e(__('Theme color')); ?></label>
                            <div class="mb-0">
                                <div class="d-flex gap-4 flex-column flex-lg-row">
                                    <div class="form-check me-3">
                                        <input class="form-check-input" type="radio" name="backend_theme_color" value="1" id="backend_theme_color_1" <?php echo e(get_option("backend_theme_color", 1)==1?"checked":""); ?>>
                                        <label class="form-check-label mt-1" for="backend_theme_color_1">
                                            <?php echo e(__('Dark')); ?>

                                        </label>
                                    </div>
                                    <div class="form-check me-3">
                                        <input class="form-check-input" type="radio" name="backend_theme_color" value="0" id="backend_theme_color_0" <?php echo e(get_option("backend_theme_color", 1)==0?"checked":""); ?>>
                                        <label class="form-check-label mt-1" for="backend_theme_color_0">
                                            <?php echo e(__('Light')); ?>

                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-12">
                        <div class="mb-4">
                            <label class="form-label"><?php echo e(__('Sidebar icon color')); ?></label>
                            <div class="mb-0">
                                <div class="d-flex flex-column flex-lg-row">
                                    <div class="form-check me-3">
                                        <input class="form-check-input" type="radio" name="backend_sidebar_icon_color" value="1" id="backend_sidebar_icon_color_1" <?php echo e(get_option("backend_sidebar_icon_color", 1)==1?"checked":""); ?>>
                                        <label class="form-check-label mt-1" for="backend_sidebar_icon_color_1">
                                            <?php echo e(__('Default')); ?>

                                        </label>
                                    </div>
                                    <div class="form-check me-3">
                                        <input class="form-check-input" type="radio" name="backend_sidebar_icon_color" value="0" id="backend_sidebar_icon_color_0" <?php echo e(get_option("backend_sidebar_icon_color", 1)==0?"checked":""); ?>>
                                        <label class="form-check-label mt-1" for="backend_sidebar_icon_color_0">
                                            <?php echo e(__('Custom Color')); ?>

                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-12">
                        <div class="mb-4">
                            <label class="form-label" for="backend_site_icon_color"><?php echo e(__('Custom color')); ?></label>
                            <input class="form-control w-80" name="backend_site_icon_color" id="backend_site_icon_color" type="color" value="<?php echo e(get_option('backend_site_icon_color', '')); ?>">
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


<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/cotlas-socialxi/htdocs/socialxi.cotlas.net/modules/AdminBackendAppearance/resources/views/index.blade.php ENDPATH**/ ?>