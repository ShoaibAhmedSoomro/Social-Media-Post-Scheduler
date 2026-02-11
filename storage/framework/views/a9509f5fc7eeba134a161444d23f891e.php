

<?php $__env->startSection('sub_header'); ?>
    <?php if (isset($component)) { $__componentOriginal6bfd7fd5c294530066e0efb20ff4cd9a = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal6bfd7fd5c294530066e0efb20ff4cd9a = $attributes; } ?>
<?php $component = App\View\Components\SubHeader::resolve(['title' => ''.e($result ? __('Edit Language') : __('Add New Language')).'','description' => ''.e($result ? __('Modify existing language details and settings.') : __('Add a new language to your system.')).''] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
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

<div class="container max-w-800">
    <form class="actionForm" class="mb-4 pb-4" action="<?php echo e(module_url("save")); ?>" data-redirect="<?php echo e(module_url()); ?>">
    	<input class="d-none" name="id" type="text" value="<?php echo e(data($result, "id_secure")); ?>">
		<div class="card border-1 border-gray-300 shadow-none mb-3">
         	<div class="card-body">
         		<div class="msg-errors"></div>
 				<div class="row">
 					<div class="col-md-12">
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
		                  	<label for="name" class="form-label"><?php echo e(__('Name')); ?></label>
	                     	<input class="form-control" name="name" id="name" type="text" value="<?php echo e($result->name ?? ''); ?>">
		                </div>
 					</div>
 					<div class="col-md-6">
 						<div class="mb-4">
		                  	<label for="code" class="form-label"><?php echo e(__('Language')); ?></label>
		                  	<select class="form-select" name="code" id="code">
                                <option value=""><?php echo e(__('Select language')); ?></option>
                                <?php $__currentLoopData = get_language_codes(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($key); ?>" <?php if(($result->code ?? '') == $key): echo 'selected'; endif; ?>><?php echo e($value); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
		                </div>
 					</div>
 					<div class="col-md-6">
                        <div class="mb-4">
                            <label for="dir" class="form-label"><?php echo e(__('Text direction')); ?></label>
                            <select class="form-select" name="dir">
                                <option value="ltr" <?php if(($result->dir ?? 'ltr') == 'ltr'): echo 'selected'; endif; ?>><?php echo e(__("LTR")); ?></option>
                                <option value="rtl" <?php if(($result->dir ?? 'ltr') == 'rtl'): echo 'selected'; endif; ?>><?php echo e(__("RTL")); ?></option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-4">
                            <label for="is_default" class="form-label"><?php echo e(__('Is default')); ?></label>
                            <select class="form-select" name="is_default">
                                <option value="1" <?php if(($result->is_default ?? 0) == 1): echo 'selected'; endif; ?>><?php echo e(__("Yes")); ?></option>
                                <option value="0" <?php if(($result->is_default ?? 0) == 0): echo 'selected'; endif; ?>><?php echo e(__("No")); ?></option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="mb-4">
                            <label for="auto_translate" class="form-label mb-1"><?php echo e(__('Auto Translate')); ?></label>
                            <div class="text-gray-600 fs-12 mb-2"><?php echo e(__("The system will automatically translate the entire language using Google Translate.")); ?></div>
                            <select class="form-select" name="auto_translate">
                                <option value="1" <?php if(($result->auto_translate ?? 0) == 1): echo 'selected'; endif; ?>><?php echo e(__("Yes")); ?></option>
                                <option value="0" <?php if(($result->auto_translate ?? 0) == 0): echo 'selected'; endif; ?>><?php echo e(__("No")); ?></option>
                            </select>
                        </div>
                    </div>
 					<div class="col-md-12">
 						<label for="name" class="form-label"><?php echo e(__('Flag')); ?></label>
			            <div class="input-group mb-3">
			            	<div class="form-control">
		                     	<i class="fa-light fa-magnifying-glass"></i>
		                     	<input placeholder="<?php echo e(__("Search")); ?>" type="text" class="search-input" value="">
			                </div>
			                <span class="btn btn-icon btn-input min-w-55">
			                    <input class="form-check-input checkbox-all" type="checkbox" value="">
			                </span>
			            </div>
 						<div class="bg-gray-100 pf-0 b-r-4">
		                  	<ul class="list-group overflow-y-scroll max-h-450 border-1 border-gray-300">
		                  		<?php
		                  			$flags = glob( Module::getModulePath('AdminLanguages/resources/assets/css/flags/flags')."/*" );
		                  		?>

		                  		<?php $__currentLoopData = $flags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $flag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		                  			
		                  			<?php
		                  				$directory_list = explode("/", $flag);
				                        $flag = end($directory_list);
				                        $ext = explode(".", $flag);
				                        if(count($ext) == 2 && $ext[1] == "svg")
				                            $icon = "flag-icon flag-icon-".$ext[0];
				                    ?>

			                        <li class="search-list">
			                        	<div class="list-group-item bg-gray-100 border-start-0 border-end-0 d-flex align-items-center gap-8">
									  		<span>
									  			<input class="form-check-input" type="radio" name="icon" value="<?php echo e($icon); ?>" id="flag_<?php echo e($icon); ?>" <?php echo e(data($result, "icon", "radio", $icon)); ?>>
									  		</span>
									  		<label  class="mt-1 fs-14" for="flag_<?php echo e($icon); ?>">
									  			<span class="me-2 ms-2"><i class="<?php echo e($icon); ?>"></i> </span>
									  			<?php echo e(strtoupper($ext[0])); ?>

									  		</label>
			                        	</div>
								  	</li>
		                  		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							  	
							</ul>
		                </div>
 					</div>
 				</div>

         	</div>
        </div>
     	<div class="mb-3 pb-4">
      		<button type="submit" class="btn btn-dark w-100">
                <?php echo e(__('Save changes')); ?>

            </button>
     	</div>

    </form>

</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/cotlas-socialxi/htdocs/socialxi.cotlas.net/modules/AdminLanguages/resources/views/update.blade.php ENDPATH**/ ?>