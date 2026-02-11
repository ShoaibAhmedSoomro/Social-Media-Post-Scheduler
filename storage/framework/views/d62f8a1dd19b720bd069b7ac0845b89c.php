<?php $__env->startSection('sub_header'); ?>
    <?php if (isset($component)) { $__componentOriginal6bfd7fd5c294530066e0efb20ff4cd9a = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal6bfd7fd5c294530066e0efb20ff4cd9a = $attributes; } ?>
<?php $component = App\View\Components\SubHeader::resolve(['title' => ''.e(__('Bulk Post')).'','description' => ''.e(__('Manage and publish multiple posts efficiently and quickly')).''] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('sub-header'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\SubHeader::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
        <a class="btn btn-primary btn-sm" href="<?php echo e(module_url("download-template")); ?>">
            <span><i class="fa-light fa-table-layout"></i></span>
            <span><?php echo e(__('Bulk Template')); ?></span>
        </a>
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
    
    <div class="container pb-5 max-w-700">

        <form class="actionForm" action="<?php echo e(module_url("save")); ?>" method="POST" data-redirect="<?php echo e(module_url("")); ?>">
            
            <div class="card border-gray-300 mb-3 b-r-6">
                <div class="card-body py-5">
                    <div class="mb-3">
                        <?php echo $__env->make('appchannels::block_channels', [
                            'permission' => 'apppublishing', 
                            'accounts' => []
                        ], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                    </div>
                    <div class="mb-3">
                        <?php echo $__env->make('appfiles::block_select_file', [
                            "id" => "file",
                            "name" => __("Media CSV file"),
                            "required" => false,
                            "value" => ""
                        ], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                    </div>
                    <div class="mb-3">
                        <label class="form-label"><?php echo e(__("Interval per post (minute)")); ?></label>
                        <input type="number" class="form-control mb-3" name="delay" value="60">

                        <div class="alert alert-warning fs-14" role="alert">
                            <?php echo e(__("If your posts are scheduled incorrectly or left empty, the system will automatically set the first post to the current time, with subsequent posts following a set interval delay.")); ?>

                        </div>
                    </div>
                    <?php if( get_option("url_shorteners_platform", 0) ): ?>
                    <div class="mb-0">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="1" name="url_shorten" id="url_shorten">
                            <label class="form-check-label" for="url_shorten">
                                <?php echo e(__("Auto URL Shortener")); ?>

                            </label>
                        </div>
                    </div>
                    <?php endif; ?>
                </div>
            </div>

            <button class="btn btn-dark w-100"><?php echo e(__("Save changes")); ?></button>

        </form>
        
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/cotlas-socialxi/htdocs/socialxi.cotlas.net/modules/AppBulkPost/resources/views/index.blade.php ENDPATH**/ ?>