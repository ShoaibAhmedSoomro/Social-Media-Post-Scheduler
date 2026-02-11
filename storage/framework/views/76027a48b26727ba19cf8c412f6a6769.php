

<?php $__env->startSection('sub_header'); ?>
    <?php if (isset($component)) { $__componentOriginal6bfd7fd5c294530066e0efb20ff4cd9a = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal6bfd7fd5c294530066e0efb20ff4cd9a = $attributes; } ?>
<?php $component = App\View\Components\SubHeader::resolve(['title' => ''.e(__('Manage Addons')).'','description' => ''.e(__('Discover and install powerful modules for Stackposts')).''] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('sub-header'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\SubHeader::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
        <div class="d-flex gap-8">
            <form action="<?php echo e(url()->current()); ?>" method="GET">
                <div class="input-group">
                    <div class="form-control form-control-sm">
                        <span class="btn btn-icon">
                            <i class="fa-duotone fa-solid fa-magnifying-glass"></i>
                        </span>
                        <input class="ajax-scroll-filter" name="search" placeholder="<?php echo e(__('Enter your keyword')); ?>" type="text">
                    </div>
                    <button type="submit" class="btn btn-sm btn-light">
                        <?php echo e(__("Search")); ?>

                    </button>
                </div>
            </form>
            <a class="btn btn-outline btn-success btn-sm text-nowrap" href="<?php echo e(module_url("")); ?>">
                <span><i class="fa-light fa-store"></i></span>
                <span><?php echo e(__('Marketplace')); ?></span>
            </a>
            <a class="btn btn-dark btn-sm actionItem" href="<?php echo e(module_url("install")); ?>" data-popup="installModal">
                <span><i class="fa-light fa-file-zipper"></i></span>
                <span><?php echo e(__('Install')); ?></span>
            </a>
        </div>
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
<div class="container py-5 marketplace-wrapper max-w-850">
    
	    <div class="d-flex flex-column gap-3">
        <?php $__empty_1 = true; $__currentLoopData = $addons; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $addon): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        	<div class="card hp-100 d-flex flex-column rounded-4 overflow-hidden card border-0 shadow-sm rounded-4 mb-4">
    			<div class="card-body  px-4 py-4 gap-16 align-items-center flex-grow-1">
    				<div class="d-flex flex-column flex-md-row flex-grow-1 gap-16 align-items-top">
	        			<div class="size-60 d-flex justify-content-center align-items-center position-relative">
	    					<?php if($addon->thumbnail): ?>
	    						<img src="<?php echo e($addon->thumbnail); ?>" class="wp-100 hp-100 b-r-10 position-relative zIndex-1">
	    					<?php else: ?>
		    					<div class="size-60 border-2 border-gray-200 b-r-10 position-relative d-flex justify-content-center align-items-center">
		    						<i class="<?php echo e($addon->icon); ?> fs-30" style="color: <?php echo e($addon->color); ?>" class="position-relative zIndex-1"></i>
		    						<div class="position-absolute wp-100 hp-100 opacity-25 b-r-10 t-0" style="background: <?php echo e($addon->color); ?>;"></div>
		    					</div>
	    					<?php endif; ?>
	        			</div>

	        			<div class="flex-grow-1">
	    					<div class="d-flex justify-content-between gap-3">
	    						<div class="fw-bold fs-18 mb-0">
	    							<?php echo e($addon->name); ?>

	    						</div>
	    						<div>
	    							<?php if($addon->status === 1): ?>
	    								<span class="badge badge-outline badge-success b-r-6"><?php echo e(__('Activated')); ?></span>
	    							<?php else: ?>
	    								<span class="badge badge-outline badge-danger b-r-6"><?php echo e(__('Deactivated')); ?></span>
	    							<?php endif; ?>
	    						</div>
	    					</div>
	    					<div class="fs-12 mb-1 text-gray-600 text-truncate-1">
	    						<?php if($addon->version): ?>
	    							<?php echo e(__("Version:")); ?> <?php echo e($addon->version); ?>

	    						<?php endif; ?>
	    					</div>
	    					<div class="flex-grow-1 fs-14 mb-0 text-gray-600">
	    						<div class="text-truncate-2">
	    							<?php echo e($addon->description); ?>

	    						</div>
	    					</div>
		        			<div class="d-flex gap-8 mt-3">
		        				<?php if($addon->has_update): ?>
		        				<a href="<?php echo e(route("admin.marketplace.do_update", $addon->product_id??'')); ?>" class="btn rounded-3 btn-warning actionItem" data-redirect="" data-bs-title="<?php echo e(__("Update Add-on")); ?>" data-bs-toggle="tooltip" data-bs-placement="top">
					             	<i class="fa-light fa-circle-arrow-up"></i> 
					             	<?php echo e(__('Update to :version', ['version' => $addon->latest_version])); ?>

					            </a>
		        				<?php endif; ?>
		        				<?php if($addon->uri): ?>
		        				<a href="<?php echo e(url($addon->uri)); ?>" class="btn rounded-3 btn-icon btn-secondary" data-bs-title="<?php echo e(__("Go to Add-on")); ?>" data-bs-toggle="tooltip" data-bs-placement="top">
		        					<i class="fa-light fa-arrow-up-right-from-square"></i>
		        				</a>
		        				<?php endif; ?>
		        				<?php if(!$addon->is_main): ?>
						            <?php if($addon->status === 0): ?>
			        				<a href="<?php echo e(route("admin.marketplace.active", $addon->id_secure ?? '')); ?>" class="btn rounded-3 btn-icon btn-outline btn-success actionItem" data-redirect="" data-bs-title="<?php echo e(__("Active Add-on")); ?>" data-bs-toggle="tooltip" data-bs-placement="top">
						             	<i class="fa-light fa-plug-circle-plus"></i>
						            </button>
						            <?php else: ?>
						            <a href="<?php echo e(route("admin.marketplace.deactive", $addon->id_secure ?? '')); ?>" class="btn rounded-3 btn-icon btn-outline btn-danger actionItem" data-confirm="<?php echo e(__("Are you sure you want to deactive this addon?")); ?>" data-redirect="" data-bs-title="<?php echo e(__("Deactive Add-on")); ?>" data-bs-toggle="tooltip" data-bs-placement="top">
						             	<i class="fa-light fa-power-off"></i>
						            </button>
						            <?php endif; ?>
			        				<a href="<?php echo e(route("admin.marketplace.destroy", $addon->id_secure ?? '')); ?>" class="btn rounded-3 btn-icon btn-light actionItem" data-confirm="<?php echo e(__("The addon will be permanently deleted from the system and cannot be recovered. Are you sure you want to delete this addon?")); ?>" data-redirect="" data-bs-title="<?php echo e(__("Delete Add-on")); ?>" data-bs-toggle="tooltip" data-bs-placement="top">
						             	<i class="fa-light fa-trash-can"></i>
						            </a>
				             	<?php endif; ?>
	        			</div>
	        			</div>
        			</div>

        		</div>
        	</div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <div class="d-flex flex-column align-items-center justify-content-center py-5 my-5">
			    <span class="fs-70 mb-3 text-primary">
			        <i class="fa-light fa-plug"></i>
			    </span>
			    <div class="fw-semibold fs-5 mb-2 text-gray-800">
			        <?php echo e(__('No addons found')); ?>

			    </div>
			    <div class="text-body-secondary mb-4">
			        <?php echo e(__('There are currently no addons available in the system.')); ?>

			    </div>
			</div>
        <?php endif; ?>
    </div>

    <?php if($addons->hasPages()): ?>
    <div class="d-flex justify-content-center mt-4">
        <?php echo e($addons->links('components.pagination')); ?>

    </div>
    <?php endif; ?>


</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/cotlas-socialxi/htdocs/socialxi.cotlas.net/modules/AdminMarketplace/resources/views/addons.blade.php ENDPATH**/ ?>