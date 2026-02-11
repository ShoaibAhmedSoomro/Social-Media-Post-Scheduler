<?php if( $results->Total() > 0 ): ?>

	<?php $__currentLoopData = $results; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	<div class="col-12 col-sm-6 col-md-4 col-lg-4 col-xl-4 col-xxl-3 mb-4">
	    <label class="card shadow-none  bg-<?php echo e($value->color); ?>-100 border border-gray-100" for="caption_<?php echo e($value->id_secure); ?>">
	    	<div class="card-body d-flex justify-content-between align-items-center px-3 gap-16">
	    		<div class="d-flex align-items-center gap-8 fs-13 fw-5 text-truncate">
	    			<div class="size-30 d-flex align-items-center justify-content-between fs-20">
	    				<i class="<?php echo e($value->icon); ?> text-<?php echo e($value->color); ?>-500"></i>
	    			</div>
	    			<div>
	    				<?php echo e($value->name); ?>

	    			</div>
	    		</div>
	    		<div class="d-flex gap-16">
	    			<div class="btn-group position-static">
                        <div class="dropdown-toggle dropdown-arrow-hide text-gray-900 fs-14" data-bs-toggle="dropdown" aria-expanded="true">
                            <i class="fa-light fa-grid-2"></i>
                        </div>
                        <ul class="dropdown-menu dropdown-menu-end border-1 border-gray-300 px-1 w-100 max-w-120 min-w-120">
                            <li>
                                <a class="dropdown-item px-2 p-t-2 p-b-2 rounded d-flex align-items-center gap-8 fw-5 fs-13 actionItem" href="<?php echo e(module_url("update")); ?>" data-id="<?php echo e($value->id_secure); ?>" data-popup="AICategoriesModal" data-call-success="">
                                    <i class="fa-light fa-pen-to-square"></i> <span ><?php echo e(__('Edit')); ?></span>
                                </a>
                            </li>
                            <li><hr class="dropdown-divider"></li>
                            <li>
                                <a class="dropdown-item px-2 p-t-2 p-b-2 rounded d-flex align-items-center gap-8 fw-5 fs-13 actionItem" href="<?php echo e(module_url("destroy")); ?>" data-id="<?php echo e($value->id_secure); ?>" data-call-success="Main.ajaxScroll(true);">
                                    <i class="fa-light fa-trash-can"></i> <span><?php echo e(__('Delete')); ?></span>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <input class="form-check-input checkbox-item" type="checkbox" name="id[]" value="<?php echo e($value->id_secure); ?>" id="caption_<?php echo e($value->id_secure); ?>">
	    		</div>
	    	</div>
	    </label>
	</div>
	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php else: ?>
	<div class="empty"></div>
<?php endif; ?>
<?php /**PATH /home/cotlas-socialxi/htdocs/socialxi.cotlas.net/modules/AdminAICategories/resources/views/list.blade.php ENDPATH**/ ?>