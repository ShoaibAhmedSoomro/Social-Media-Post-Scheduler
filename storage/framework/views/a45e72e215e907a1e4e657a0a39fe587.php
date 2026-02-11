<?php $__env->startSection('content'); ?>

<div class="container max-w-800 pb-5">

    <div class="mt-4 mb-4">
        <div class="d-flex flex-column flex-lg-row flex-md-column align-items-md-start align-items-lg-center justify-content-between">
            <div class="my-3 d-flex flex-column gap-8">
                <h1 class="fs-20 font-medium lh-1 fw-6 text-gray-900">
                    <?php echo e(__('New ticket')); ?>

                </h1>
                <div class="d-flex align-items-center gap-20 fw-5 fs-14">
                    <div class="d-flex gap-8">
                        <span class="text-gray-600"><?php echo e(__('Submit new support requests quickly and easily')); ?></span>
                    </div>
                </div>
            </div>
            <div class="d-flex gap-8">
                <a class="btn btn-light btn-sm " href="<?php echo e(module_url()); ?>">
                    <span><i class="fa-light fa-chevron-left"></i></span>
                    <span><?php echo e(__('Back')); ?></span>
                </a>
            </div>
        </div>
    </div>

    <form class="actionForm" action="<?php echo e(module_url("save")); ?>" method="POST">
        <div class="card shadow-none border-gray-300 mb-4">
            <div class="card-body">
                <div class="row">
                	<div class="col-md-6">
                        <div class="mb-4">
                            <label for="cate_id" class="form-label"><?php echo e(__('Category')); ?> (<span class="text-danger">*</span>)</label>
                            <select class="form-select" name="cate_id" id="cate_id" data-control="select2">
                            	<option value="-1"><?php echo e(__("Select Category")); ?></option>
                            	<?php if(!empty( $categories )): ?>
	                                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	                                <option value="<?php echo e($value->id_secure); ?>"><?php echo e($value->name); ?></option>
	                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	                            <?php endif; ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-4">
                            <label for="type_id" class="form-label"><?php echo e(__('Type')); ?></label>
                            <select class="form-select" name="type_id" id="type_id" data-control="select2">
                            	<option value="-1"><?php echo e(__("Select Type")); ?></option>
                            	<?php if(!empty( $types )): ?>
	                                <?php $__currentLoopData = $types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	                                <option value="<?php echo e($value->id_secure); ?>"><?php echo e($value->name); ?></option>
	                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	                            <?php endif; ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="mb-4">
                            <label for="subject" class="form-label"><?php echo e(__('Subject')); ?> (<span class="text-danger">*</span>)</label>
                            <input class="form-control" name="subject" id="subject" type="text" value="" placeholder="<?php echo e(__("Enter the subject of your request here")); ?>">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="mb-4">
                            <label for="name" class="form-label"><?php echo e(__('Content')); ?> (<span class="text-danger">*</span>)</label>
                            <textarea class="textarea_editor border-1 border-gray-300" name="content" placeholder="<?php echo e(__("Describe your issue or request in detail")); ?>"></textarea>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="mb-4">
                            <label for="labels" class="form-label"><?php echo e(__('Labels')); ?></label>
                            <div class="text-gray-600 fs-12 mb-2"><?php echo e(__("Organize and manage your support tickets easily.")); ?></div>
	                        <select class="form-select h-auto" data-control="select2" name="labels[]" multiple="true" data-placeholder="<?php echo e(__("Add labels")); ?>">
	                            <?php if(!empty( $labels )): ?>
	                                <?php $__currentLoopData = $labels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	                                <option value="<?php echo e($value->id_secure); ?>" data-icon="<?php echo e($value->icon); ?> text-<?php echo e($value->color); ?>"><?php echo e($value->name); ?></option>
	                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	                            <?php endif; ?>
	                        </select>
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

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/cotlas-socialxi/htdocs/socialxi.cotlas.net/modules/AppSupport/resources/views/new_ticket.blade.php ENDPATH**/ ?>