<div class="modal fade" id="paypalConfigurationModal" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false">
	<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
		<form class="modal-content actionForm" action="<?php echo e(url_admin("settings/save")); ?>" data-call-success="Main.closeModal('paypalConfigurationModal');">
			<div class="modal-header">
				<h1 class="modal-title fs-16"><?php echo e(__("Paypal Configuration")); ?></h1>
				
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body p-4">
         		<div class="msg-errors"></div>
 				<div class="row">
 					<div class="col-md-12">
                        <div class="mb-4">
                            <label class="form-label"><?php echo e(__('Status')); ?></label>
                            <div class="d-flex gap-8 flex-column flex-lg-row flex-md-column">
                                <div class="form-check me-3">
                                    <input class="form-check-input" type="radio" name="paypal_status" value="1" id="paypal_status_1" <?php if( get_option("paypal_status", 0) == 1 ): echo 'checked'; endif; ?> >
                                    <label class="form-check-label mt-1" for="paypal_status_1">
                                        <?php echo e(__('Enable')); ?>

                                    </label>
                                </div>
                                <div class="form-check me-3">
                                    <input class="form-check-input" type="radio" name="paypal_status" value="0" id="paypal_status_0" <?php if( get_option("paypal_status", 0) == 0 ): echo 'checked'; endif; ?> >
                                    <label class="form-check-label mt-1" for="paypal_status_0">
                                        <?php echo e(__('Disable')); ?>

                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
 						<div class="mb-3">
		                  	<label for="name" class="form-label"><?php echo e(__('Environment')); ?></label>
		                  	<select class="form-select" name="paypal_environment">
		                  		<option value="1" <?php if( get_option("paypal_environment", 0) == 1 ): echo 'selected'; endif; ?>><?php echo e(__("Live")); ?></option>
		                  		<option value="0" <?php if( get_option("paypal_environment", 0) == 0 ): echo 'selected'; endif; ?>><?php echo e(__("Sandbox")); ?></option>
		                  	</select>
		                </div>
 					</div>
 					<div class="col-md-12">
 						<div class="mb-3">
		                  	<label for="name" class="form-label"><?php echo e(__('Client ID')); ?></label>
	                     	<input class="form-control" name="paypal_client_id" id="paypal_client_id" type="text" value="<?php echo e(get_option("paypal_client_id", "")); ?>">
		                </div>
 					</div>
 					<div class="col-md-12">
 						<div class="mb-3">
		                  	<label for="name" class="form-label"><?php echo e(__('Client Secret')); ?></label>
	                     	<input class="form-control" name="paypal_client_secret" id="paypal_client_secret" type="text" value="<?php echo e(get_option("paypal_client_secret", "")); ?>">
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
</div><?php /**PATH /home/cotlas-socialxi/htdocs/socialxi.cotlas.net/modules/PaymentPaypal/resources/views/configuration.blade.php ENDPATH**/ ?>