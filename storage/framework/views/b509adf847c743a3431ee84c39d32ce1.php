<?php
    $coupon_plans = $coupon ? json_decode($coupon->plans) : [];
?> 

<div class="card border-gray-300 b-r-6 mb-4">
            
    <div class="card-body">
        
        <div class="d-flex justify-content-between mb-4">
            
            <div class="">
                <div class="fw-5 fs-18"><?php echo e(__("Coupon")); ?></div>
                <div class="fs-12 text-gray-700"><?php echo e(__("Enter coupon code and secure exclusive savings today.")); ?></div>
            </div>
        </div>

        <form class="actionForm" action="<?php echo e(route("app.coupons.apply")); ?>">
            <div class="mb-0">
                <div class="input-group">
                    <div class="form-control">
                        <i class="fa-light fa-ticket"></i>
                        <input placeholder="<?php echo e(__("Enter coupon")); ?>" name="code" type="text" value="<?php echo e($coupon ? $coupon->code : ''); ?>">
                    </div>
                    <button type="submit" class="btn btn-input">
                        <?php echo e(__("Apply")); ?>

                    </button>
                </div>
                <?php if($coupon): ?>
                <span class="fs-12 text-danger">
                    <?php if(!in_array($plan->id, $coupon_plans)): ?>
                        <?php echo e(__("This coupon does not apply to this plan.")); ?>

                    <?php elseif($coupon->start_date > time()): ?>
                        <?php echo e(sprintf( __("The coupon becomes active on %s."), datetime_show( $coupon->start_date ))); ?>

                    <?php elseif($coupon->end_date < time()): ?>
                        <?php echo e(__("The coupon you entered has expired. Please try another one or contact support for help.")); ?>

                    <?php elseif($coupon->usage_limit <= $coupon->usage_count): ?>
                        <?php echo e(__("This coupon has reached its usage limit and can no longer be used.")); ?>

                    <?php endif; ?>
                </span>
                <?php endif; ?>
            </div>
        </form>

    </div>

</div><?php /**PATH /home/cotlas-socialxi/htdocs/socialxi.cotlas.net/modules/AdminCoupons/resources/views/block_apply_coupon.blade.php ENDPATH**/ ?>