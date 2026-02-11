<?php
    $plan = $user->plan;
    if($plan){
        $plan_detail = \Pricing::plansWithFeatures($plan->id);
    }

    $pricing = \Pricing::plansWithFeatures();
    $planTypes = \Modules\AdminPlans\Facades\Plan::getTypes();

    $expired = false;
    if ($user->expiration_date && $user->expiration_date > 0) {
        $expired = $user->expiration_date < time();
    }

    $credit_summary = Credit::getCreditUsageSummary();
?>



<?php $__env->startSection('content'); ?>
    <?php echo $__env->make("appprofile::partials.profile-header", array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    
    <div class="container py-5 pricing">

        <?php echo $__env->make("components.main-message", array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

        <div class="mb-5">
            <?php if (isset($component)) { $__componentOriginal6bfd7fd5c294530066e0efb20ff4cd9a = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal6bfd7fd5c294530066e0efb20ff4cd9a = $attributes; } ?>
<?php $component = App\View\Components\SubHeader::resolve(['title' => ''.e(__('Subscription Plan')).'','description' => ''.e(__('Manage your plan. Upgrade for more features!')).''] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
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
        </div>

        <div class="card shadow-sm rounded-4 mb-5 mx-auto">
            <div class="card-body p-0">
                <div class="d-flex flex-column flex-md-row">
                    <!-- Left: Plan Info -->
                    <div class="flex-fill border-end-md mb-4 mb-md-0">
                        <div class="border-bottom fw-semibold fs-14 text-uppercase px-4 py-3">
                            <?php echo e(__("Your Plan")); ?>

                        </div>
                        <div class="p-4 fs-14">
                            <div class="size-50 d-flex gap-10 align-items-center bg-gray-100 border border-gray-200 fs-25 justify-content-center b-r-20 mb-2">
                                <i class="fa-light fa-user-crown text-warning"></i>
                            </div>
                            <div class="mb-2 fw-semibold fs-20"><b><?php echo e($plan->name ?? __("No Plan")); ?></b>
                                <?php if($plan && $plan->free_plan): ?>
                                    <span class="badge badge-outline badge-light badge-pill badge-sm position-relative t--5">
                                        <?php echo e(__("Free Plan")); ?>

                                    </span>
                                <?php endif; ?>
                            </div>
                            <div class="mb-2">
                                <?php echo e(__('Expiration date :')); ?>

                                <b class="<?php echo e($expired ? 'text-danger' : 'text-success'); ?>">
                                    <?php if($user->expiration_date == -1): ?>
                                        <?php echo e(__('Unlimited')); ?>

                                    <?php elseif($user->expiration_date): ?>
                                        <?php echo e(date_show($user->expiration_date)); ?>

                                    <?php else: ?>
                                        <?php echo e(__('N/A')); ?>

                                    <?php endif; ?>
                                </b>
                            </div>

                            <div class="mt-4 mb-1 d-flex justify-content-between align-items-center">
                                <span class="fs-12"><?php echo e(__('Credits used')); ?></span>
                                <span class="small fw-bold text-primary"><?php echo e($credit_summary['progress_label']); ?></span>
                            </div>
                            <div class="progress wp-100 h-10" style="background: #eee">
                                <div class="progress-bar <?php echo e($credit_summary['is_unlimited'] ? 'bg-success' : 'bg-dark'); ?>"
                                     style="width: <?php echo e($credit_summary['progress_value']); ?>%;">
                                </div>
                            </div>
                            <div class="small mt-1">
                                <?php echo e(__('Used:')); ?> <b><?php echo e(number_format($credit_summary['used'])); ?></b>
                                <?php echo e($credit_summary['is_unlimited'] ? '' : '/ ' . number_format($credit_summary['limit'])); ?>

                                (<?php echo e(__('Left:')); ?> <b><?php echo e($credit_summary['is_unlimited'] ? __('Unlimited') : number_format($credit_summary['remaining'])); ?></b>)
                            </div>
                            <?php if($credit_summary['quota_reached']): ?>
                                <div class="text-danger small mt-1"><?php echo e($credit_summary['message']); ?></div>
                            <?php endif; ?>

                            
                            <div class="d-flex gap-10 mt-4 flex-wrap">
                                <?php if($plan && Plan::hasSubscription()): ?>
                                <a href="<?php echo e(route("payment.cancel_subscription")); ?>" class="btn btn-outline btn-danger btn-md actionItem" data-confirm="<?php echo e(__("Are you sure you want to cancel your subscription?")); ?>" data-redirect=""><?php echo e(__("Cancel Subscription")); ?></a>
                                <?php else: ?>
                                    <?php if($plan && !$plan->free_plan): ?>
                                    <a href="#pricingTab" class="btn btn-warning btn-md"><?php echo e(__("Upgrade Plan")); ?></a>
                                    <a href="<?php echo e(route('payment.index', $plan->id_secure)); ?>" class="btn btn-dark btn-md"><?php echo e(__("Renew Plan")); ?></a>
                                    <?php endif; ?>
                                <?php endif; ?>
                            </div>
                            
                        </div>
                    </div>
                    <div class="flex-fill">
                        <div class="border-bottom fw-semibold fs-14 text-uppercase px-4 py-3">
                            <?php echo e(__("Plan Permissions")); ?>

                        </div>
                        <div class="p-4">
                            <?php $__currentLoopData = $plan_detail['features']??[]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $feature): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li class="mb-2 d-flex align-items-center gap-1">
                                    <span class="d-flex align-items-center justify-content-center size-20 d-block bg-gray-100 border border-gray-300 b-r-50 fs-13 me-2 <?php echo e($feature['check'] ? 'text-success' : 'text-danger'); ?>">
                                        <i class="fa-regular fa-<?php echo e($feature['check'] ? 'check' : 'xmark'); ?>"></i>
                                    </span>

                                    <?php echo e(__($feature['label'])); ?>

                                    
                                    <?php if(!empty($feature['subfeature'])): ?>
                                        <div class="feature-popup-wrapper position-relative ms-1 d-inline-block">
                                            <span class="info-hover-icon" tabindex="0">
                                                <i class="fa fa-info-circle text-primary" style="cursor:pointer;"></i>
                                            </span>
                                            <div class="features-popup shadow-lg">
                                                <?php $__currentLoopData = $feature['subfeature']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $group): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <div class="fw-bold mb-1 small px-3 pt-2">
                                                        <?php echo e(__($group['tab_name'] ?? '')); ?>

                                                    </div>
                                                    <ul class="list-unstyled mb-2 px-3">
                                                        <?php $__currentLoopData = $group['items']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <li class="d-flex align-items-center">
                                                                <span class="d-flex align-items-center justify-content-center size-20 d-block bg-gray-100 border border-gray-300 b-r-50 fs-13 me-2 <?php echo e($feature['check'] ? 'text-success' : 'text-gray-600'); ?>">
                                                                    <i class="fa-regular fa-<?php echo e($feature['check'] ? 'check' : 'xmark'); ?>"></i>
                                                                </span>
                                                                <?php echo e(__($item['label'])); ?>

                                                            </li>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </ul>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            <?php if(empty($plan_detail)): ?>
                                <div class="text-center py-5">
                                    <span class="d-inline-block mb-2 fs-70">
                                        <i class="fa fa-box-open text-primary"></i>
                                    </span>
                                    <div class="fw-semibold text-gray-700" style="opacity:.85">
                                        <?php echo e(__("No features available for this plan.")); ?>

                                    </div>
                                </div>
                            <?php endif; ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="text-center mb-5">
            <h2 class="fw-bold mb-2 fs-35"><?php echo e(__('Choose a plan that suits you. Grow business fast.')); ?></h2>
            <p class="mx-auto text-lg text-muted max-w-500">
                <?php echo e(__('Choose an affordable plan packed with top features to engage your audience, create loyalty, and boost sales.')); ?>

            </p>
        </div>

        <div class="d-flex mx-auto justify-content-center mb-5">
            <ul class="nav nav-tabs justify-content-center mb-4 gap-0 b-r-20 border border-gray-300 overflow-hidden" id="pricingTab" role="tablist">
                <?php $__currentLoopData = $planTypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $typeKey => $typeLabel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li class="nav-item <?php echo e($typeKey==2?"border-start border-end border-gray-300":""); ?>" role="presentation">
                        <button
                            class="nav-link px-4 border-bottom-0 py-2 fw-bold bg-active-gray-200 text-active-gray-800 <?php if($loop->first): ?> active <?php endif; ?>"
                            id="tab-<?php echo e($typeKey); ?>"
                            data-bs-toggle="tab"
                            data-bs-target="#content-<?php echo e($typeKey); ?>"
                            type="button"
                            role="tab"
                            aria-controls="content-<?php echo e($typeKey); ?>"
                            aria-selected="<?php echo e($loop->first ? 'true' : 'false'); ?>"
                        >
                            <?php echo e(__($typeLabel)); ?>

                        </button>
                    </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>

        
        <div class="tab-content" id="pricingTabContent">
            <?php $__currentLoopData = $planTypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $typeKey => $typeLabel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="tab-pane fade <?php if($loop->first): ?> show active <?php endif; ?>" 
                    id="content-<?php echo e($typeKey); ?>" 
                    role="tabpanel"
                    aria-labelledby="tab-<?php echo e($typeKey); ?>">
                    <div class="row justify-content-center gy-4">
                        <?php $__empty_1 = true; $__currentLoopData = $pricing[$typeKey] ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $plan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <div class="col-md-3">
                                <div class="card pricing-card hp-100 text-center border-0 shadow-sm">
                                    <div class="card-body py-5 position-relative">
                                        <?php if(!empty($plan['featured'])): ?>
                                            
                                        <?php endif; ?>
                                        <span class="text-uppercase fw-bold text-primary mb-2 d-block" style="letter-spacing:1px;">
                                            <?php echo e(__($plan['name'] ?? '-')); ?>

                                        </span>
                                        <?php
                                            $isFreePlan = $plan['free_plan'];
                                        ?>

                                        <h2 class="fw-bold mb-0 mt-2 fs-35">
                                            <?php if($isFreePlan): ?>
                                                $0
                                                <small class="fs-14 text-muted">/<?php echo e(strtolower(__($typeLabel))); ?></small>
                                            <?php else: ?>
                                                $<?php echo e($plan['price']); ?>

                                                <small class="fs-14 text-muted">/<?php echo e(strtolower(__($typeLabel))); ?></small>
                                            <?php endif; ?>
                                        </h2>
                                        <div class="mb-2 text-muted mb-4"><?php echo e($plan['desc'] ?? ''); ?></div>
                                        <ul class="list-unstyled text-start mb-4 mx-auto" style="max-width:240px;">
                                            <?php $__currentLoopData = $plan['features']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $feature): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <li class="mb-2 d-flex align-items-center gap-1">
                                                    <span class="d-flex align-items-center justify-content-center size-20 d-block bg-gray-100 border border-gray-300 b-r-50 fs-13 me-2 <?php echo e($feature['check'] ? 'text-success' : 'text-danger'); ?>">
                                                        <i class="fa-regular fa-<?php echo e($feature['check'] ? 'check' : 'xmark'); ?>"></i>
                                                    </span>

                                                    <?php echo e(__($feature['label'])); ?>

                                                    
                                                    <?php if(!empty($feature['subfeature'])): ?>
                                                        <div class="feature-popup-wrapper position-relative ms-1 d-inline-block">
                                                            <span class="info-hover-icon" tabindex="0">
                                                                <i class="fa fa-info-circle text-primary" style="cursor:pointer;"></i>
                                                            </span>
                                                            <div class="features-popup shadow-lg">
                                                                <?php $__currentLoopData = $feature['subfeature']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $group): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                    <div class="fw-bold mb-1 fs-12 px-3 pt-2">
                                                                        <?php echo e(__($group['tab_name'] ?? '')); ?>

                                                                    </div>
                                                                    <ul class="list-unstyled mb-2 px-3">
                                                                        <?php $__currentLoopData = $group['items']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                            <li class="d-flex align-items-center">
                                                                                <span class="d-flex align-items-center justify-content-center size-20 d-block bg-gray-100 border border-gray-300 b-r-50 fs-13 me-2 <?php echo e($feature['check'] ? 'text-success' : 'text-gray-600'); ?>">
                                                                                    <i class="fa-regular fa-<?php echo e($feature['check'] ? 'check' : 'xmark'); ?>"></i>
                                                                                </span>
                                                                                <span class="text-gray-700 fs-14"><?php echo e(__($item['label'])); ?></span>
                                                                            </li>
                                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                    </ul>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            </div>
                                                        </div>
                                                    <?php endif; ?>
                                                </li>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </ul>

                                        <?php
                                            $isCurrentPlan = isset($user) && $user->plan_id == ($plan['id'] ?? null);
                                            $isFreePlan = $plan['free_plan'];
                                        ?>

                                        <?php if($isCurrentPlan): ?>
                                            <button class="btn btn-outline-secondary text-gray-700 border-gray-300 btn-lg w-100 rounded-5" disabled>
                                                <?php echo e(__("Current Plan")); ?>

                                            </button>
                                        <?php elseif($isFreePlan): ?>
                                            <a href="<?php echo e(route('plan.activate', $plan['id_secure'])); ?>" data-confirm="<?php echo e(__("Are you sure you want to switch to this plan?")); ?>" class="btn btn-light btn-lg w-100 rounded-5 actionItem" data-redirect="">
                                                <?php echo e(__("Start for Free")); ?>

                                            </a>
                                        <?php else: ?>
                                            <a href="<?php echo e(route('payment.index', $plan['id_secure'])); ?>" class="btn btn-dark btn-lg w-100 rounded-5">
                                                <?php echo e(__("Choose Plan")); ?>

                                            </a>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <div class="col-12 text-center text-muted py-5"><?php echo e(__('No plans available.')); ?></div>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/cotlas-socialxi/htdocs/socialxi.cotlas.net/modules/AppProfile/resources/views/plan.blade.php ENDPATH**/ ?>