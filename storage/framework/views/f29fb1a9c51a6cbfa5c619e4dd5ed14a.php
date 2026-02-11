<?php $__env->startSection('sub_header'); ?>
    <?php if (isset($component)) { $__componentOriginal6bfd7fd5c294530066e0efb20ff4cd9a = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal6bfd7fd5c294530066e0efb20ff4cd9a = $attributes; } ?>
<?php $component = App\View\Components\SubHeader::resolve(['title' => ''.e(__('Affiliate Settings')).'','description' => ''.e(__('Configure affiliate commissions, tracking, and payment options easily')).''] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
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
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="mb-4">
                            <label for="name" class="form-label"><?php echo e(__('Affiliate Minimum Withdrawal')); ?></label>
                            <input placeholder="<?php echo e(__('Enter Minimum Withdrawal Amount')); ?>" class="form-control" name="affiliate_minimum_withdrawal" id="affiliate_minimum_withdrawal" type="text" value="<?php echo e(get_option("affiliate_minimum_withdrawal", 50)); ?>">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="mb-4">
                            <label for="name" class="form-label"><?php echo e(__('Affiliate Commission Percentage (%)')); ?></label>
                            <input placeholder="<?php echo e(__('Enter Affiliate Commission Percentage (%)')); ?>" class="form-control" name="affiliate_commission_percentage" id="affiliate_commission_percentage" type="text" value="<?php echo e(get_option("affiliate_commission_percentage", 15)); ?>">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="mb-4">
                            <label for="name" class="form-label"><?php echo e(__('The types of payments accepted for withdrawal')); ?></label>
                            <input placeholder="<?php echo e(__('Enter types of payments')); ?>" class="form-control" name="affiliate_types_of_payments" id="affiliate_types_of_payments" type="text" value="<?php echo e(get_option("affiliate_types_of_payments", "")); ?>">
                        </div>
                    </div>                    
                    <div class="col-md-12">
                        <div class="mb-4">
                            <label for="name" class="form-label"><strong><?php echo e(__('Onetime Commission')); ?></strong><i class="fa fa-info-circle ms-1 text-muted" data-bs-toggle="tooltip" title="<?php echo e(__('If you enable this feature, the affiliate will receive a commission only once. If you disable this feature, the affiliate will receive a recurring commission for each purchase.')); ?>"></i></label>
                            <div class="d-flex gap-8 flex-column flex-lg-row flex-md-column">
                                <div class="form-check me-3">
                                    <input class="form-check-input" type="radio" name="affiliate_onetime_commission_status" value="1" id="affiliate_onetime_commission_status_1" <?php echo e(get_option("affiliate_onetime_commission_status", 1)==1?"checked":""); ?>>
                                    <label class="form-check-label mt-1" for="affiliate_onetime_commission_status_1">
                                        <?php echo e(__('Enable')); ?>

                                    </label>
                                </div>
                                <div class="form-check me-3">
                                    <input class="form-check-input" type="radio" name="affiliate_onetime_commission_status" value="0" id="affiliate_onetime_commission_status_0"<?php echo e(get_option("affiliate_onetime_commission_status", 1)==0?"checked":""); ?>>
                                    <label class="form-check-label mt-1" for="affiliate_onetime_commission_status_0">
                                        <?php echo e(__('Disable')); ?>

                                    </label>
                                </div>
                            </div>
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

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/cotlas-socialxi/htdocs/socialxi.cotlas.net/modules/AdminAffiliateSettings/resources/views/index.blade.php ENDPATH**/ ?>