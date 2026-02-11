<?php $__env->startSection('sub_header'); ?>
    <?php if (isset($component)) { $__componentOriginal6bfd7fd5c294530066e0efb20ff4cd9a = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal6bfd7fd5c294530066e0efb20ff4cd9a = $attributes; } ?>
<?php $component = App\View\Components\SubHeader::resolve(['title' => ''.e(__('Embed Code')).'','description' => ''.e(__('Code snippet to display external content on websites.')).''] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
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
        <div class="card border mb-4">
            <div class="card-body">
                <div class="fw-5 fs-14 mb-2"><?php echo e(__("Status")); ?>                
                    <div class="d-flex gap-8 flex-column flex-lg-row flex-md-column mb-4">
                        <div class="form-check me-3">
                            <input class="form-check-input" type="radio" name="embed_code_status" value="1" id="embed_code_status_1" <?php echo e(get_option("embed_code_status", 0)==1?"checked":""); ?>>
                            <label class="form-check-label mt-1" for="embed_code_status_1">
                                <?php echo e(__('Enable')); ?>

                            </label>
                        </div>
                        <div class="form-check me-3">
                            <input class="form-check-input" type="radio" name="embed_code_status" value="0" id="embed_code_status_0"<?php echo e(get_option("embed_code_status", 0)==0?"checked":""); ?>>
                            <label class="form-check-label mt-1" for="embed_code_status_0">
                                <?php echo e(__('Disable')); ?>

                            </label>
                        </div>
                    </div>
                    <textarea class="input-code border-gray-300 border-1 h-min-100" name="embed_code" placeholder="<?php echo e(__("Enter content")); ?>"> <?php echo e(get_option("embed_code", "")); ?></textarea>
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

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/cotlas-socialxi/htdocs/socialxi.cotlas.net/modules/AdminEmbedCode/resources/views/index.blade.php ENDPATH**/ ?>