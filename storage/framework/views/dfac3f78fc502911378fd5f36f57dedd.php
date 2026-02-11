<?php $__env->startSection('form', json_encode([
    'action' => module_url("save"),
    'method' => 'POST',
    'class' => 'actionForm',
    'data-redirect1' => module_url()
])); ?>

<?php $__env->startSection('sub_header'); ?>
    <?php if (isset($component)) { $__componentOriginal6bfd7fd5c294530066e0efb20ff4cd9a = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal6bfd7fd5c294530066e0efb20ff4cd9a = $attributes; } ?>
<?php $component = App\View\Components\SubHeader::resolve(['title' => ''.e($result ? __('Edit plan') : __('Create new plan')).'','description' => ''.e($result ? __('Modify existing subscription plan details and pricing options.') : __('Easily create and customize a new subscription plan.')).''] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('sub-header'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\SubHeader::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
        <a class="btn btn-light btn-sm" href="<?php echo e(module_url()); ?>">
            <span><i class="fa-light fa-chevron-left"></i></span>
            <span><?php echo e(__('Back')); ?></span>
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

    <div class="container max-w-800 pb-5">

        <input type="hidden" name="id" value="<?php echo e($result->id_secure ?? ''); ?>">

        <div class="card b-r-6 border-gray-300 mb-3">

            <div class="card-header">
                <div class="fw-5">
                    <?php echo e(__("Plan info")); ?>

                </div>
            </div>

            <div class="card-body">

                <div class="msg-errors"></div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-4">
                            <label class="form-label"><?php echo e(__('Status')); ?></label>
                            <div class="d-flex gap-8 flex-column flex-lg-row flex-md-column">
                                <div class="form-check me-3">
                                    <input class="form-check-input" type="radio" name="status" value="1" id="status_1" <?php if(($result->status ?? 1) == 1): echo 'checked'; endif; ?>>
                                    <label class="form-check-label mt-1" for="status_1">
                                        <?php echo e(__('Enable')); ?>

                                    </label>
                                </div>
                                <div class="form-check me-3">
                                    <input class="form-check-input" type="radio" name="status" value="0" id="status_0" <?php if(($result->status ?? 1) == 0): echo 'checked'; endif; ?>>
                                    <label class="form-check-label mt-1" for="status_0">
                                        <?php echo e(__('Disable')); ?>

                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-4">
                            <label class="form-label"><?php echo e(__('Featured')); ?></label>
                            <div class="d-flex gap-8 flex-column flex-lg-row flex-md-column">
                                <div class="form-check me-3">
                                    <input class="form-check-input" type="radio" name="featured" value="1" id="featured_1" <?php if(($result->featured ?? 0) == 1): echo 'checked'; endif; ?>>
                                    <label class="form-check-label mt-1" for="featured_1">
                                        <?php echo e(__('Yes')); ?>

                                    </label>
                                </div>
                                <div class="form-check me-3">
                                    <input class="form-check-input" type="radio" name="featured" value="0" id="featured_2" <?php if(($result->featured ?? 0) == 0): echo 'checked'; endif; ?>>
                                    <label class="form-check-label mt-1" for="featured_2">
                                        <?php echo e(__('No')); ?>

                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="mb-4">
                            <label for="name" class="form-label"><?php echo e(__('Name')); ?></label>
                            <input placeholder="<?php echo e(__('')); ?>" class="form-control" name="name" id="name" type="text" value="<?php echo e($result->name ?? ''); ?>">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="mb-4">
                            <label for="code" class="form-label"><?php echo e(__('Description')); ?></label>
                            <textarea class="form-control" name="desc"><?php echo e($result->desc ?? ''); ?></textarea>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="mb-4">
                            <label for="position" class="form-label"><?php echo e(__('Position')); ?></label>
                            <input class="form-control" name="position" id="position" type="number" value="<?php echo e($result->position ?? 0); ?>">
                        </div>
                    </div>
                </div>

            </div>

        </div>

        <div class="card b-r-6 border-gray-300 mb-3">

            <div class="card-header">
                <div class="fw-5">
                    <?php echo e(__("Pricing")); ?>

                </div>
            </div>

            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-4">
                            <label for="name" class="form-label"><?php echo e(__('Price')); ?></label>
                            <input class="form-control" name="price" id="price" type="number" value="<?php echo e($result->price ?? 0); ?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-4">
                            <label for="type" class="form-label"><?php echo e(__('Payment Frequency')); ?></label>
                            <select class="form-select" name="type">
                                <option value="1" <?php if(($result->type ?? 1) == 1): echo 'selected'; endif; ?>><?php echo e(__("Monthly")); ?></option>
                                <option value="2" <?php if(($result->type ?? 1) == 2): echo 'selected'; endif; ?>><?php echo e(__("Yearly")); ?></option>
                                <option value="3" <?php if(($result->type ?? 1) == 3): echo 'selected'; endif; ?>><?php echo e(__("Lifetime")); ?></option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-4">
                            <label for="free_plan" class="form-label"><?php echo e(__('Free Plan')); ?></label>
                            <select class="form-select" name="free_plan">
                                <option value="1" <?php if(($result->free_plan ?? 0) == 1): echo 'selected'; endif; ?>><?php echo e(__("Yes")); ?></option>
                                <option value="0" <?php if(($result->free_plan ?? 0) == 0): echo 'selected'; endif; ?>><?php echo e(__("No")); ?></option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-4">
                            <label for="trial_day" class="form-label"><?php echo e(__('Trial day')); ?></label>
                            <input placeholder="<?php echo e(__('')); ?>" class="form-control" name="trial_day" id="trial_day" type="number" value="<?php echo e($result->trial_day ?? 0); ?>">
                        </div>
                    </div>
                    <div class="text-gray-600 fs-12 mb-2">
                        <div><i class="fa-light fa-circle-info me-1"></i><b><?php echo e(__("Free Plan: ")); ?></b><?php echo e(__("Select YES to make the plan free with no expiration date.")); ?></div>
                        <div><i class="fa-light fa-circle-info me-1"></i><b><?php echo e(__("Trial Plan: ")); ?></b><?php echo e(__("Select NO (Free Plan) to activate a trial period with a defined expiration date.")); ?></div>
                    </div>
                </div>

            </div>

        </div>

        <div class="plan-permissions">

            <?php
                $permissions = $result->permissions ?? [];
                $permissions = collect($permissions)->pluck('value', 'key')->toArray();

                $plan_permissions = app('plan_permissions') ?? [];
                $plan_permissions = Plan::syncPlanPermissions($plan_permissions);
                app()->instance('plan_permissions', $plan_permissions);
            ?>

            <?php if(app('plan_permissions')): ?>

                <?php $__currentLoopData = app('plan_permissions'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                    <?php if( $value['view'] ?? false ): ?>

                        <?php
                            $viewPath = $value['key'] . '::' . $value['view'];
                        ?>

                        <?php if(View::exists($viewPath)): ?>
                            <?php echo $__env->make($viewPath, array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                        <?php endif; ?>

                    <?php else: ?>

                        <div class="card b-r-6 border-gray-300 mb-3">
                            <div class="card-header">
                                <div class="form-check">
                                    <input class="form-check-input prevent-toggle" type="checkbox" value="1" id="permissions[<?php echo e($value['key']); ?>]" name="permissions[<?php echo e($value['key']); ?>]" <?php if( array_key_exists($value['key'], $permissions ) ): echo 'checked'; endif; ?>>
                                    <input class="form-control d-none" name="labels[<?php echo e($value['key']); ?>]" type="text" value="<?php echo e($value['name']); ?>">
                                    <label class="fw-6 fs-14 text-gray-700 ms-2" for="permissions[<?php echo e($value['key']); ?>]">
                                        <?php echo e(__($value['name'])); ?>

                                    </label>
                                </div>
                            </div>
                        </div>

                    <?php endif; ?>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            <?php endif; ?>



        </div>

        <div>
            <button type="submit" class="btn btn-dark w-100"><?php echo e(__("Save changes")); ?></button>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/cotlas-socialxi/htdocs/socialxi.cotlas.net/modules/AdminPlans/resources/views/update.blade.php ENDPATH**/ ?>