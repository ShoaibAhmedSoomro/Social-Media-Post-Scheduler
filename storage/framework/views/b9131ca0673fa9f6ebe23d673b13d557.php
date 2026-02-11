<?php if( $channels->Total() ): ?>

	<?php $__currentLoopData = $channels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

	<?php
		switch ($value->status) {
			case 1:
				$status_border = "";
				$status_bg = "";
				break;
			
			case 2:
				$status_border = "border-warning";
				$status_bg = "bg-warning-100";
				break;

			default:
				$status_border = "border-danger";
				$status_bg = "bg-danger-100";
				break;
		}
	?>

	<div class="col-12 col-sm-6 col-md-4 col-lg-4 col-xl-4 col-xxl-3 mb-4">
	    <label class="card shadow-none  <?php echo e($status_bg); ?> <?php echo e($status_border); ?>" for="channel_<?php echo e($value->id_secure); ?>">
	        <div class="card-body px-3">
	            <div class="d-flex flex-grow-1 align-items-top gap-8">
	                <div class="text-gray-600 size-40 min-w-40 d-flex align-items-center justify-content-between position-relative">
	                	<a href="<?php echo e($value->url); ?>" target="_blank" class="text-gray-900 text-hover-primary">
	                		<img data-src="<?php echo e(Media::url($value->avatar)); ?>" src="<?php echo e(theme_public_asset('img/default.png')); ?>" class="b-r-100 w-full h-full border-1 lazyload" onerror="this.src='<?php echo e(theme_public_asset('img/default.png')); ?>'">
		                </a>
	                    <span class="size-17 border-1 b-r-100 position-absolute fs-9 d-flex align-items-center justify-content-between text-center text-white b-0 r-0" style="background-color: <?php echo e($value->module_item['color']); ?>;">
	                        <div class="w-100"><i class="<?php echo e($value->module_item['icon']); ?>"></i></div>
	                    </span>
	                </div>
	                <div class="flex-grow-1 fs-14 fw-5 text-truncate">
	                    <div class="text-truncate">
	                    	<a href="<?php echo e($value->url); ?>" target="_blank" class="text-gray-900 text-hover-primary">
	                    		<?php echo e($value->name); ?> <?php echo $value->login_type!=1?'<span class="text-danger-400 fs-12">'.__("(Unofficial)").'</span>':''; ?>

	                    	</a>
	                    </div>
	                    <div class="fs-12 text-gray-600 text-truncate">
                    		<?php echo e(__( ucfirst( $value->social_network." ".$value->category ) )); ?>

	                    </div>
	                </div>
	                <div class="d-flex fs-14">
		                <input class="form-check-input checkbox-item" type="checkbox" name="id[]" value="<?php echo e($value->id_secure); ?>" id="channel_<?php echo e($value->id_secure); ?>">
	                </div>
	            </div>
	        </div>
	        <div class="card-footer fs-12 d-flex justify-content-center gap-8">
	            <a href="<?php echo e(url($value->reconnect_url)); ?>" class="d-flex flex-fill gap-8 align-items-center justify-content-center text-gray-900 text-hover-primary fw-5">
	                <i class="fa-light fa-arrows-rotate-reverse"></i> 
	                <span><?php echo e(__("Reconnect")); ?></span>
	            </a>
	            <?php if($value->status != 0): ?>
	            <div class="text-gray-400 h-20 w-1 bg-gray-200 "></div>

	            	<?php if($value->status == 1): ?>
	            	<a href="<?php echo e(module_url("status/pause")); ?>" class="d-flex flex-fill gap-8 align-items-center justify-content-center text-gray-900 text-hover-primary fw-5 actionItem" data-id="<?php echo e($value->id_secure); ?>" data-call-success="Main.ajaxScroll(true)">
		                <i class="fa-light fa-pause"></i>
		                <span><?php echo e(__("Pause")); ?></span>
		            </a>
		            <?php else: ?>
		            <a href="<?php echo e(module_url("status/active")); ?>" class="d-flex flex-fill gap-8 align-items-center justify-content-center text-gray-900 text-hover-primary fw-5 actionItem" data-id="<?php echo e($value->id_secure); ?>" data-call-success="Main.ajaxScroll(true)">
		                <i class="fa-light fa-check"></i>
		                <span><?php echo e(__("Active")); ?></span>
		            </a>
	            	<?php endif; ?>

		            
	            <?php endif; ?>
	        </div>
	    </label>
	</div>
	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php else: ?>
<div class="d-flex flex-column align-items-center justify-content-center py-5 my-5">
    <span class="fs-70 mb-3 text-primary">
        <i class="fa-light fa-chart-network"></i>
    </span>
    <div class="fw-semibold fs-5 mb-2 text-gray-800">
        <?php echo e(__('No Social Channels Connected')); ?>

    </div>
    <div class="text-body-secondary mb-4 text-center">
        <?php echo e(__('Connect your social channels to manage and track all your accounts in one place.')); ?>

    </div>
    <a class="btn btn-dark" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#addChannelModal">
        <i class="fa-light fa-plus me-1"></i> <?php echo e(__('Add Channel')); ?>

    </a>
</div>
<?php endif; ?><?php /**PATH /home/cotlas-socialxi/htdocs/socialxi.cotlas.net/modules/AppChannels/resources/views/list.blade.php ENDPATH**/ ?>