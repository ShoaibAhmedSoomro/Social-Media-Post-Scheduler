<?php $__env->startSection('sub_header'); ?>
    <?php if (isset($component)) { $__componentOriginal6bfd7fd5c294530066e0efb20ff4cd9a = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal6bfd7fd5c294530066e0efb20ff4cd9a = $attributes; } ?>
<?php $component = App\View\Components\SubHeader::resolve(['title' => ''.e(__('Terms of Use')).'','description' => ''.e(__('Understand your rights and responsibilities using the platform')).''] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
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

<div class="container max-w-1000 pb-5">
    <form class="actionForm" action="<?php echo e(url_admin("settings/save")); ?>">

        <div class="card border">
            <div class="card-header">
                <div class="fw-6"><?php echo e(__("Terms of Use")); ?></div>
            </div>
            <div class="card-body">
                <div class="fw-5 fs-14 mb-2"><?php echo e(__("Status")); ?>  
                <div class="d-flex gap-8 flex-column flex-lg-row flex-md-column mb-4">
                    <div class="form-check me-3">
                        <input class="form-check-input" type="radio" name="terms_of_use_status" value="1" id="terms_of_use_status_1" <?php echo e(get_option("terms_of_use_status", 1)==1?"checked":""); ?>>
                        <label class="form-check-label mt-1" for="terms_of_use_status_1">
                            <?php echo e(__('Enable')); ?>

                        </label>
                    </div>
                    <div class="form-check me-3">
                        <input class="form-check-input" type="radio" name="terms_of_use_status" value="0" id="terms_of_use_status_0"<?php echo e(get_option("terms_of_use_status", 1)==0?"checked":""); ?>> 
                        <label class="form-check-label mt-1" for="terms_of_use_status_0">
                            <?php echo e(__('Disable')); ?>

                        </label>
                    </div>
                </div>
                <textarea class="textarea_editor border-gray-300 border-1 min-h-600" name="terms_of_use" placeholder="<?php echo e(__("Enter content")); ?>"> <?php echo e(get_option("terms_of_use", "")); ?></textarea>
            </div>
            <div class="mt-4">
                <button type="submit" class="btn btn-dark b-r-10 w-100">
                    <?php echo e(__('Save changes')); ?>

                </button>
            </div>
        </div>
        


        </div>



    </form>

</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/cotlas-socialxi/htdocs/socialxi.cotlas.net/modules/AdminTermsOfUse/resources/views/index.blade.php ENDPATH**/ ?>