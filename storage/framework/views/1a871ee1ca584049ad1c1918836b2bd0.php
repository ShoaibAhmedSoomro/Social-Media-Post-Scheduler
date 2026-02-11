<?php $__env->startSection('sub_header'); ?>
    <?php if (isset($component)) { $__componentOriginal6bfd7fd5c294530066e0efb20ff4cd9a = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal6bfd7fd5c294530066e0efb20ff4cd9a = $attributes; } ?>
<?php $component = App\View\Components\SubHeader::resolve(['title' => ''.e(__('Mail Sender')).'','description' => ''.e(__('Send custom messages manually to selected user accounts.')).''] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
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

<?php $__env->startSection('form', json_encode([
    'action' => module_url("save"),
    'method' => 'POST',
    'class' => 'actionForm',
    'data-redirect' => module_url()
])); ?>

<?php $__env->startSection('content'); ?>

<div class="container pb-5 mt-5">
    <input class="d-none" name="id" type="text" value="">
    <div class="row">
        <div class="col-md-8">
            <div class="card b-r-6 border-gray-300 mb-3">
                <div class="card-body">
                    <div class="msg-errors"></div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-4">
                                <label for="to" class="form-label"><?php echo e(__('Recipient(s)')); ?></label>
                                <select name="user_ids[]" class="form-select h-auto" data-control="select2" data-select2-tags="true" multiple required>
                                    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($user->id); ?>"><?php echo e($user->fullname); ?> (<?php echo e($user->email); ?>)</option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="mb-4">
                                <label for="subject" class="form-label"><?php echo e(__('Subject')); ?></label>
                                <input placeholder="<?php echo e(__('')); ?>" class="form-control" name="subject" id="subject" type="text" value="">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="mb-4">
                                <label for="content" class="form-label"><?php echo e(__('Message')); ?> (<span class="text-danger">*</span>)</label>
                                <textarea class="textarea_editor border-gray-300 border-1 min-h-100" name="content" placeholder="<?php echo e(__("Enter content")); ?>"></textarea>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

        </div>
        <div class="col-md-4">
            <div class="card b-r-6 border-gray-300 mb-3">
                <div class="card-header bg-gray-100 fw-5 fs-14">
                  <?php echo e(__('Available Variables')); ?>

                </div>
                <div class="card-body p-3 fs-13">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><code>[username]</code> – <?php echo e(__('Username')); ?></li>
                        <li class="list-group-item"><code>[fullname]</code> – <?php echo e(__('Full name')); ?></li>
                        <li class="list-group-item"><code>[email]</code> – <?php echo e(__('Email address')); ?></li>
                        <li class="list-group-item"><code>[plan_name]</code> – <?php echo e(__('Plan name')); ?></li>
                        <li class="list-group-item"><code>[plan_desc]</code> – <?php echo e(__('Plan description')); ?></li>
                        <li class="list-group-item"><code>[plan_price]</code> – <?php echo e(__('Plan price')); ?></li>
                        <li class="list-group-item"><code>[expiration_date]</code> – <?php echo e(__('Expiration date')); ?></li>
                        <li class="list-group-item"><code>[plan_type]</code> – <?php echo e(__('Plan type')); ?></li>
                        <li class="list-group-item"><code>[plan_trial_day]</code> – <?php echo e(__('Trial days')); ?></li>
                    </ul>
                </div>
            </div>

        </div>
    </div>
    <div class="row">
        <div class="col-md-8">
            <button type="submit" class="btn btn-dark w-100"><?php echo e(__("Send")); ?></button>
        </div>
    </div>



</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/cotlas-socialxi/htdocs/socialxi.cotlas.net/modules/AdminMailSender/resources/views/index.blade.php ENDPATH**/ ?>