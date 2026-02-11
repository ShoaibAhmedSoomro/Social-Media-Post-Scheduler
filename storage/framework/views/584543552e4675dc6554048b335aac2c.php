<div class="menu-item pt-2 border-bottom-1"></div>
<div class="menu-item mb-2 px-0">
    <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
        <div class="px-3 py-1 fs-12 border-bottom-1 bg-gray-100">
            <?php echo e(__("Your Plan")); ?>

        </div>
        <div class="card-body d-flex gap-3 py-2 px-3">
            <div class="flex-grow-1">
                <div class="fw-bold fs-13 text-primary mb-1">
                    <?php echo e($user->plan->name ?? __('No Plan')); ?> <i class="fa-solid fa-crown text-warning"></i>
                </div>
                <?php
                    $expired = false;
                    if ($user->expiration_date && $user->expiration_date > 0) {
                        $expired = $user->expiration_date < time();
                    }
                    $summary = Credit::getCreditUsageSummary();
                    $isUnlimited = $summary['is_unlimited'] ?? false;
                    $quotaReached = $summary['quota_reached'] ?? false;
                    $progressValue = $isUnlimited || $quotaReached ? 100 : ($summary['progress_value'] ?? 0);
                    $progressBarClass = $isUnlimited
                        ? 'bg-success'
                        : ($quotaReached ? 'bg-danger' : 'bg-primary');
                ?>
                <div class="d-flex fs-12">
                    <div class="mb-2">
                        <?php echo e(__('Expire:')); ?>

                        <b class="<?php echo e($expired ? 'text-danger' : 'text-muted'); ?>">
                            <?php if($user->expiration_date == -1): ?>
                                <?php echo e(__('Unlimited')); ?>

                            <?php elseif($user->expiration_date): ?>
                                <?php echo e(date_show($user->expiration_date)); ?>

                            <?php else: ?>
                                <?php echo e(__('N/A')); ?>

                            <?php endif; ?>
                        </b>
                        <?php if($expired && $user->expiration_date > 0): ?>
                            <span class="badge badge-xs badge-outline b-r-10 badge-danger ms-2"><?php echo e(__('Expired')); ?></span>
                        <?php elseif($user->expiration_date == -1): ?>
                            <span class="badge badge-xs badge-outline b-r-10 badge-success ms-2"><?php echo e(__('Active')); ?></span>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="d-flex justify-content-between fs-12 mb-1 mt-1">
                    <span><?php echo e(__('Credits used')); ?></span>
                    <span>
                        <b><?php echo e(number_format($summary['used'])); ?></b>
                        <?php if($isUnlimited): ?>
                            / <span class="text-success"><?php echo e(__('Unlimited')); ?></span>
                        <?php else: ?>
                            / <?php echo e(number_format($summary['limit'])); ?>

                        <?php endif; ?>
                    </span>
                </div>
                <div class="progress wp-100 h-8 mb-2" style="background: #eee">
                    <div class="progress-bar <?php echo e($progressBarClass); ?>"
                        style="width: <?php echo e($progressValue); ?>%;">
                    </div>
                </div>
                <a href="<?php echo e(route('app.profile', 'plan')); ?>" class="btn btn-sm btn-dark wp-100 mt-2">
                    <?php echo e(__('Upgrade / Details')); ?>

                </a>
            </div>
        </div>
    </div>
</div><?php /**PATH /home/cotlas-socialxi/htdocs/socialxi.cotlas.net/modules/AdminPlans/resources/views/sidebar-block.blade.php ENDPATH**/ ?>