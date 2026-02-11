<div class="modal fade" id="stripeRecurringConfigurationModal" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false">
	<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
		<form class="modal-content actionForm" action="<?php echo e(url_admin("settings/save")); ?>" data-call-success="Main.closeModal('stripeRecurringConfigurationModal');">
			<div class="modal-header">
				<h1 class="modal-title fs-16"><?php echo e(__("Stripe Recurring Configuration")); ?></h1>
				
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
                                    <input class="form-check-input" type="radio" name="stripe_recurring_status" value="1" id="stripe_recurring_status_1" <?php if( get_option("stripe_recurring_status", 0) == 1 ): echo 'checked'; endif; ?> >
                                    <label class="form-check-label mt-1" for="stripe_recurring_status_1">
                                        <?php echo e(__('Enable')); ?>

                                    </label>
                                </div>
                                <div class="form-check me-3">
                                    <input class="form-check-input" type="radio" name="stripe_recurring_status" value="0" id="stripe_recurring_status_0" <?php if( get_option("stripe_recurring_status", 0) == 0 ): echo 'checked'; endif; ?> >
                                    <label class="form-check-label mt-1" for="stripe_recurring_status_0">
                                        <?php echo e(__('Disable')); ?>

                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
 					<div class="col-md-12">
 						<div class="mb-3">
		                  	<label for="name" class="form-label"><?php echo e(__('Publishable key')); ?></label>
	                     	<input class="form-control" name="stripe_recurring_publishable_key" id="stripe_recurring_publishable_key" type="text" value="<?php echo e(get_option("stripe_recurring_publishable_key", "")); ?>">
		                </div>
 					</div>
 					<div class="col-md-12">
 						<div class="mb-3">
		                  	<label for="name" class="form-label"><?php echo e(__('Secret key')); ?></label>
	                     	<input class="form-control" name="stripe_recurring_secret_key" id="stripe_recurring_secret_key" type="text" value="<?php echo e(get_option("stripe_recurring_secret_key", "")); ?>">
		                </div>
 					</div>
 					<div class="col-md-12">
 						<div class="mb-3">
		                  	<label for="name" class="form-label"><?php echo e(__('Webhook Secret')); ?></label>
	                     	<input placeholder="whsec_xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx" class="form-control" name="stripe_recurring_webhook_secret" id="stripe_recurring_webhook_secret" type="text" value="<?php echo e(get_option("stripe_recurring_webhook_secret", "")); ?>">
		                </div>
 					</div>

 				</div>
				<div class="alert alert-primary fs-14">
					<div class="mb-2">
						<span class="fw-7"><?php echo e(__("Webhook URL")); ?></span>: <?php echo e(route('payment.webhook', 'stripe_recurring')); ?>

					</div>
					<div>
						<span class="fw-7"><?php echo e(__("Required events")); ?></span>: invoice.payment_succeeded, invoice.payment_failed, customer.subscription.deleted, customer.subscription.updated
					</div>
				</div>

			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><?php echo e(__('Close')); ?></button>
				<button type="submit" class="btn btn-dark"><?php echo e(__('Save changes')); ?></button>
			</div>
		</form>
	</div>
</div><?php /**PATH /home/cotlas-socialxi/htdocs/socialxi.cotlas.net/modules/PaymentStripeRecurring/resources/views/configuration.blade.php ENDPATH**/ ?>