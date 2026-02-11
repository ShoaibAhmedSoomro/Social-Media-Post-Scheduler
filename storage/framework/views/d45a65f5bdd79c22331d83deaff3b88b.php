<?php if(!empty($actions)): ?>
<div class="d-flex">
    <div class="btn-group">
        <button class="btn btn-outline btn-primary btn-sm dropdown-toggle dropdown-arrow-hide" data-bs-toggle="dropdown">
            <i class="fa-light fa-grid-2"></i> <?php echo e(__('Actions')); ?>

        </button>
        <ul class="dropdown-menu dropdown-menu-end border-1 border-gray-300 w-auto max-w-300">
            <?php $__currentLoopData = $actions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $action): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

            	<?php if(!isset($action['divider'])): ?>
	                <li class="mx-2">
	                    <a class="dropdown-item p-2 rounded d-flex gap-8 fw-5 fs-14 actionMultiItem" href="<?php echo e($action['url']); ?>" data-confirm="<?php echo e($action['confirm'] ?? ''); ?>" data-call-success="<?php echo e($action['call_success']); ?>">
	                        <span class="size-16 me-1 text-center"><i class="fa-light <?php echo e($action['icon']); ?>"></i></span>
	                        <span class="text-truncate"><?php echo e($action['label']); ?></span>
	                    </a>
	                </li>
            	<?php else: ?>
            		<li><hr class="dropdown-divider"></li>
            	<?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>
</div>
<?php endif; ?><?php /**PATH /home/cotlas-socialxi/htdocs/socialxi.cotlas.net/resources/themes/app/pico/resources/views/components/datatable_actions.blade.php ENDPATH**/ ?>