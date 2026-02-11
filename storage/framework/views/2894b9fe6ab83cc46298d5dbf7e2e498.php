<div class="modal fade" id="captionModal" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false">
	<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
		<form class="modal-content actionForm" action="<?php echo e(module_url("save")); ?>" data-call-success="Main.closeModal('captionModal'); Main.ajaxScroll(true);">
			<input type="text" class="d-none" name="type" value="0">
			<div class="modal-header">
				<h1 class="modal-title fs-16"><?php echo e(__("Create caption")); ?></h1>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">

		    	<input class="d-none" name="id_secure" type="text" value="<?php echo e(data($result, "id_secure")); ?>">
         		<div class="msg-errors"></div>
 				<div class="row">
 					<div class="col-md-12">
 						<div class="mb-4">
		                  	<label for="name" class="form-label"><?php echo e(__('Name')); ?></label>
	                     	<input placeholder="<?php echo e(__('Name')); ?>" class="form-control" name="name" id="name" type="text" value="<?php echo e(data($result, "name")); ?>">
		                </div>
 					</div>
 					<div class="col-md-12">
 						<div class="mb-4">
		                  	<label for="content" class="form-label"><?php echo e(__('Caption')); ?></label>
	                     	<textarea  class="form-control input-emoji" name="content" id="content" placeholder="<?php echo e(__('Enter caption')); ?>"><?php echo e(data($result, "content")); ?></textarea>
		                </div>
 					</div>
 				</div>

			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><?php echo e(__('Close')); ?></button>
				<button type="submit" class="btn btn-dark"><?php echo e(__('Save changes')); ?></button>
			</div>
		</form>
	</div>
</div>

<script type="text/javascript">
	Main.Emoji();
</script><?php /**PATH /home/cotlas-socialxi/htdocs/socialxi.cotlas.net/modules/AppCaptions/resources/views/update.blade.php ENDPATH**/ ?>