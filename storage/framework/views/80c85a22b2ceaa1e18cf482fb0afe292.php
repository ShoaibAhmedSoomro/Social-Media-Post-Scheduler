<?php $__env->startSection('content'); ?>
    <?php
        $calculatePayment = Payment::calculatePayment($plan->price, $plan->id, true);
    ?> 

    <div class="max-w-600 mx-auto p-5">
        <div class="text-center">
            <div class="mb-2">
                <span class="badge badge-outline badge-sm badge-pill badge-info">
                    <?php switch($plan->type):

                        case (2): ?>
                            <?php echo e(__("Yearly")); ?>

                            <?php break; ?>

                        <?php case (3): ?>
                            <?php echo e(__("Lifetime")); ?>

                            <?php break; ?>

                        <?php default: ?>
                            <?php echo e(__("Monthly")); ?>


                    <?php endswitch; ?>
                </span>
            </div>
            <div class="fw-9 fs-30 mb-2"><?php echo e($plan->name); ?></div>
            <div class="text-gray-700 mb-5"><?php echo e($plan->desc); ?></div>
        </div>

        <?php echo $__env->make('admincoupons::block_apply_coupon', [], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

        <div class="card border-gray-300 b-r-6 fs-14 mb-5">
            <div class="card-body">
                <div class="d-flex justify-content-between gap-12 mb-2">
                    <div><?php echo e(__("Subtotal")); ?></div>
                    <div class="text-end"><?php echo e($calculatePayment['subtotal']); ?></div>
                </div>
                <div class="d-flex justify-content-between gap-12 mb-2">
                    <div><?php echo e(__("Promotion")); ?></div>
                    <div class="text-end text-danger"><?php echo e($calculatePayment['discount']); ?></div>
                </div>
                

                <div class="d-flex justify-content-between gap-12 border-top pt-3 mt-3 fw-6">
                    <div><?php echo e(__("Total")); ?></div>
                    <div class="text-end"><?php echo e($calculatePayment['total']); ?></div>
                </div>
            </div>
        </div>

        <?php
        $paymentTypes = [
            1 => __("One-time Payment"),
            2 => __("Recurring Payment"),
        ];
        $allPayments = Payment::getPaymentsByType(null);
        $havePaymentMethod = false;
        ?>

        <div class="mb-4">
            <span class="fw-6 text-gray-900 fs-20"><?php echo e(__("Payment methods")); ?></span>
        </div>

        <?php $__currentLoopData = $paymentTypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if(!empty($allPayments[$type])): ?>
                <?php
                $havePaymentMethod = true;
                ?>
                <div class="d-flex align-items-center gap-2 mt-3 mb-1">
                    <span class="fw-6 text-gray-700 fs-16"><?php echo e($label); ?></span>
                </div>
                <?php if($type == 1): ?>
                    <div class="fs-13 text-muted mb-3"><?php echo e(__("Pay one time, no auto-renewal")); ?></div>
                <?php elseif($type == 2): ?>
                    <div class="fs-13 text-muted mb-3"><?php echo e(__("Subscription will auto-renew until you cancel")); ?></div>
                <?php endif; ?>
                <div class="row mb-4">
                    <?php $__currentLoopData = $allPayments[$type]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6 col-xxl-6 mb-4">
                            <a 
                                href="<?php echo e(route("payment.checkout", [ "gateway" => $value['uri'], "plan" => $plan->id_secure ])); ?>" 
                                class="card shadow-none border border-gray-300 b-r-6 bg-hover-primary-100 border-hover-primary payment-option"
                                data-payment-type="<?php echo e($type); ?>"
                                data-gateway="<?php echo e($value['uri']); ?>"
                            >
                                <div class="card-body d-flex justify-content-between align-items-center px-3 gap-16">
                                    <div class="d-flex align-items-center gap-8 fs-13 fw-5 text-truncate">
                                        <div class="size-30 d-flex align-items-center justify-content-between fs-20">
                                            <img src="<?php echo e($value['logo']); ?>" class="w-100" alt="<?php echo e($value['name']); ?>">
                                        </div>
                                        <div>
                                            <?php echo e($value['name']); ?>

                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        <?php if( get_option("payment_manual_status", 0) ): ?>

        <?php
        $havePaymentMethod = true;
        ?>
        <div class="d-flex align-items-center gap-2 mt-3 mb-1">
            <span class="fw-6 text-gray-700 fs-16"><?php echo e(__("Manual Payment")); ?></span>
        </div>
        <div class="fs-13 text-muted mb-3"><?php echo e(__("Bank transfer, cash, or manual confirmation.")); ?></div>

        <div class="card p-4 border border-gray-300 rounded-3 mb-4">
            <?php echo $__env->make("components.main-message", array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
            
            <ul class="mb-3 fs-14 text-muted">
                <li class="mb-3">
                    <?php echo get_option('payment_manual_info', 'Bank Info'); ?>

                </li>
                <li>
                    <span class="mb-1 fw-6"><?php echo e(__("Transfer content")); ?></span>
                    <span class="badge badge-light b-r-6 fs-15 px-3 py-3 w-100"><?php echo e($transactionCode); ?></span>
                </li>
            </ul>
            <form action="<?php echo e(route("payment.manual_payment")); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <input type="hidden" name="plan_id" value="<?php echo e($plan->id_secure); ?>">
                <input type="hidden" name="transaction_code" value="<?php echo e($transactionCode); ?>">
                <div class="mb-3">
                    <label class="form-label fw-6"><?php echo e(__("Your transfer information")); ?></label>
                    <textarea name="payment_info" class="form-control" rows="3" placeholder="<?php echo e(__("E.g. I transferred, account name John Doe, at 09:30 AM")); ?>" required></textarea>
                </div>
                <div class="mb-3">
                    <?php echo Captcha::render(); ?>

                </div>
                <button type="submit" class="btn btn-dark w-100 ">
                    <?php echo e(__("I have transferred")); ?>

                </button>
            </form>
        </div>
        <?php endif; ?>

        <?php if(!$havePaymentMethod): ?>
        <div class="mt-5 d-flex flex-column align-items-center justify-content-center py-5">
            <div class="empty"></div>
            <div class="fw-bold fs-5 mt-3 text-dark"><?php echo e(__("No payment methods available")); ?></div>
            <div class="text-muted mt-2">
                <?php echo e(__("Please contact support or try again later.")); ?>

            </div>
        </div>
        <?php endif; ?>
    </div>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/cotlas-socialxi/htdocs/socialxi.cotlas.net/modules/Payment/resources/views/index.blade.php ENDPATH**/ ?>