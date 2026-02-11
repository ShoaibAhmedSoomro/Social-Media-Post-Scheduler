<?php $__env->startSection('sub_header'); ?>
    <?php if (isset($component)) { $__componentOriginal6bfd7fd5c294530066e0efb20ff4cd9a = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal6bfd7fd5c294530066e0efb20ff4cd9a = $attributes; } ?>
<?php $component = App\View\Components\SubHeader::resolve(['title' => ''.e(__('Broadcast Configuration')).'','description' => ''.e(__('Configure real-time broadcast settings for your application.')).''] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
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
                            <label for="name" class="form-label"><?php echo e(__('Broadcast Driver')); ?></label>
                            <?php
                                $drivers = [
                                    '0' => __('Disable'),
                                    'pusher' => __('Pusher'),
                                ];
                                $selected = get_option("broadcast_driver", 0);
                            ?>
                            <select class="form-select" name="broadcast_driver">
                                <?php $__currentLoopData = $drivers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($value); ?>" <?php echo e($selected == $value ? 'selected' : ''); ?>><?php echo e($label); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card shadow-none border-gray-300 mb-4">
            <div class="card-header">
                <div class="fw-6"><?php echo e(__("Pusher")); ?></div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="mb-4">
                            <label for="pusher_app_id" class="form-label"><?php echo e(__('App ID')); ?></label>
                            <input class="form-control" name="pusher_app_id" id="pusher_app_id" type="text" value="<?php echo e(get_option("pusher_app_id", "")); ?>">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="mb-4">
                            <label for="pusher_app_key" class="form-label"><?php echo e(__('App Key')); ?></label>
                            <input class="form-control" name="pusher_app_key" id="pusher_app_key" type="text" value="<?php echo e(get_option("pusher_app_key", "")); ?>">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="mb-4">
                            <label for="pusher_app_secret" class="form-label"><?php echo e(__('App Secret')); ?></label>
                            <input class="form-control" name="pusher_app_secret" id="pusher_app_secret" type="text" value="<?php echo e(get_option("pusher_app_secret", "")); ?>">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="mb-4">
                            <label for="pusher_cluster" class="form-label"><?php echo e(__('Cluster')); ?></label>
                            <input class="form-control" name="pusher_cluster" id="pusher_cluster" type="text" value="<?php echo e(get_option("pusher_cluster", "")); ?>">
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
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/cotlas-socialxi/htdocs/socialxi.cotlas.net/modules/AdminBroadcast/resources/views/settings.blade.php ENDPATH**/ ?>