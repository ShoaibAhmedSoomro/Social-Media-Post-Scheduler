<?php
$payments = app("payments") ?? [];
?>



<?php $__env->startSection('sub_header'); ?>
    <?php if (isset($component)) { $__componentOriginal6bfd7fd5c294530066e0efb20ff4cd9a = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal6bfd7fd5c294530066e0efb20ff4cd9a = $attributes; } ?>
<?php $component = App\View\Components\SubHeader::resolve(['title' => ''.e(__('Payment Getway Configuration')).'','description' => ''.e(__('Integrate payment gateway for secure and seamless transactions')).''] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
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

    <div class="container pb-5">
        <form class="actionForm" action="<?php echo e(url_admin("settings/save")); ?>">
            <div class="card shadow-none border-gray-300 mb-4">
                <div class="card-header">
                    <div class="fw-6">
                        <?php echo e(__("General Configuration")); ?>

                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="mb-4">
                                <label for="currency" class="form-label"><?php echo e(__('Currency')); ?></label>
                                <select class="form-control" name="currency">
                                    <?php foreach (Payment::listCurrency() as $currency => $name) {?>
                                        <option value="<?php echo e($currency); ?>" <?php echo e(get_option('currency', 'USD') == $currency?"selected":""); ?> >[<?php echo e($currency); ?>] <?php echo e($name); ?></option>
                                    <?php }?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-4">
                                <label for="currency_symbol" class="form-label"><?php echo e(__('Symbol')); ?></label>
                                <input type="text" class="form-control form-control-solid" id="currency_symbol" name="currency_symbol" value="<?php echo e(get_option("currency_symbol", "$")); ?>">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-4">
                                <label for="currency_symbol_postion" class="form-label"><?php echo e(__('Symbol Postion')); ?></label>
                                <select class="form-select" name="currency_symbol_postion">
                                    <option value="1"><?php echo e(__("Before")); ?></option>
                                    <option value="2"><?php echo e(__("After")); ?></option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-dark b-r-10">
                            <?php echo e(__('Save changes')); ?>

                        </button>
                    </div>
                </div>
            </div>
        </form>

        <div class="fs-16 fw-6 mb-4"><?php echo e(__("Payment gateways")); ?></div>

        <div class="row">
            <?php if($payments): ?>
            
                <?php $__currentLoopData = $payments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                    <div class="col-12 col-sm-6 col-md-4 col-lg-4 col-xl-4 col-xxl-3 mb-4">
                        <label class="card shadow-none border border-gray-300" for="payment_<?php echo e($value['id']); ?>">
                            <div class="card-body d-flex justify-content-between align-items-center px-3 gap-16">
                                <div class="d-flex align-items-center gap-8 fs-13 fw-5 text-truncate">
                                    <div class="size-30 d-flex align-items-center justify-content-between fs-20">
                                        <img src="<?php echo e($value['logo']); ?>" class="w-100">
                                    </div>
                                    <div>
                                        <?php echo e($value['name']); ?>

                                    </div>
                                </div>
                                <div class="d-flex gap-16">
                                    <a class="fw-5 fs-16 text-gray-900 actionItem" href="<?php echo e(module_url($value['uri'])); ?>" data-popup="<?php echo e($value['modal']); ?>" data-call-success="">
                                        <i class="fa-light fa-gear"></i>
                                    </a>
                                </div>
                            </div>
                        </label>
                    </div>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            <?php endif; ?>
            
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/cotlas-socialxi/htdocs/socialxi.cotlas.net/modules/AdminPaymentConfigurations/resources/views/index.blade.php ENDPATH**/ ?>