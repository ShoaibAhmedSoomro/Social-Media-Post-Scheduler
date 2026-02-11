<div class="modal fade" id="AdminManualPaymentsModal" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false">
	<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
		<form class="modal-content actionForm" action="<?php echo e(module_url("save")); ?>" data-call-success="Main.closeModal('AdminManualPaymentsModal'); Main.DataTable_Reload('#DataTable');">
			<div class="modal-header">
				<h1 class="modal-title fs-16"><?php echo e(__("Add New Payment")); ?></h1>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">

		    	<input class="d-none" name="id_secure" type="text" value="<?php echo e(data($result, "id_secure")); ?>">
         		<div class="msg-errors"></div>
 				<div class="row">
 					<div class="col-md-12">
 						<div class="mb-4">
		                  	<label class="form-label"><?php echo e(__('Status')); ?></label>
		                  	<div class="d-flex gap-8 flex-column flex-lg-row flex-md-column">
				                <div class="form-check me-3">
				                  	<input class="form-check-input" type="radio" name="status" value="0" id="status_0" <?php echo e(data($result, "status", "radio", 0, 1)); ?>>
				                  	<label class="form-check-label mt-1" for="status_0">
				                    	<?php echo e(__('Pending')); ?>

				                  	</label>
				                </div>		                  	
				                <div class="form-check me-3">
				                  	<input class="form-check-input" type="radio" name="status" value="1" id="status_1" <?php echo e(data($result, "status", "radio", 1, 1)); ?>>
				                  	<label class="form-check-label mt-1" for="status_1">
				                    	<?php echo e(__('Approved')); ?>

				                  	</label>
				                </div>
				                <div class="form-check me-3">
				                  	<input class="form-check-input" type="radio" name="status" value="0" id="status_0" <?php echo e(data($result, "status", "radio", 2, 1)); ?>>
				                  	<label class="form-check-label mt-1" for="status_0">
				                    	<?php echo e(__('Cancel')); ?>

				                  	</label>
				                </div>
				            </div>
		                </div>
 					</div>
 					<div class="col-md-12">
                        <div class="mb-4">
                            <label for="user_id" class="form-label"><?php echo e(__('User Name')); ?> (<span class="text-danger">*</span>)</label>
                            <select class="form-select" name="user_id" id="user_id" data-control="select2" data-ajax-url="<?php echo e(route('admin.users.search')); ?>" data-selected-id="">
                            	<option value="-1"><?php echo e(__("Select user")); ?></option>
                            </select>
                        </div>
                    </div>
 					<div class="col-md-12">
 						<div class="mb-4">
                             <label for="plan" class="form-label"><?php echo e(__('Plan')); ?></label>
                             <select placeholder="<?php echo e(__('Select your plan')); ?>" class="form-select" id="plan" aria-label="plan">
                               <option selected disabled><?php echo e(__('Select your plans')); ?></option>
                               <option value="basic"><?php echo e(__('Basic')); ?></option>
                               <option value="standard"><?php echo e(__('Standard')); ?></option>
                               <option value="premium"><?php echo e(__('Premium')); ?></option>
                             </select>

		                </div>
 					</div>
 					<div class="col-md-12">
 						<div class="mb-4">
		                  	<label for="payment_id" class="form-label"><?php echo e(__('Payment ID')); ?></label>
	                     	<input placeholder="<?php echo e(__('Enter transaction ID')); ?>" class="form-control" name="payment_id" id="payment_id" type="text" value="<?php echo e(data($result, "payment_id")); ?>">
		                </div>
 					</div>
                     <div class="col-md-12">
                        <div class="mb-4">
                             <label for="amount" class="form-label"><?php echo e(__('Amount')); ?></label>
                            <input placeholder="<?php echo e(__('Enter Amount')); ?>" class="form-control" name="amount" id="amount" type="text" value="<?php echo e(data($result, "amount")); ?>">
                       </div>
                    </div>  
                     <div class="col-md-12">
                        <div class="mb-4">
                             <label for="notes" class="form-label"><?php echo e(__('notes')); ?></label>
                            <input placeholder="<?php echo e(__('Enter notes')); ?>" class="form-control" name="notes" id="notes" type="text" value="<?php echo e(data($result, "notes")); ?>">
                       </div>
                    </div>                      
 	<!-- 				<div class="col-md-12">
 						<div class="mb-4">
		                  	<label for="notes" class="form-label"><?php echo e(__('Note')); ?></label>
	                     	<textarea  class="form-control" name="notes" id="notes" placeholder="<?php echo e(__('Enter note')); ?>"><?php echo e(data($result, "desc")); ?></textarea>
		                </div>
 					</div> -->
                    <div class="col-md-12">
                        <div class="mb-4">
                             <label for="created" class="form-label"><?php echo e(__('Created Time')); ?></label>
                            <input placeholder="<?php echo e(__('Enter Created Time')); ?>" class="form-control datetime" name="created" id="created" type="datetime" value="">
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
    Main.Select2(); //Seclect User list from User Table/
    Main.DateTime(); // Show normal time //
</script>

<?php /**PATH /home/cotlas-socialxi/htdocs/socialxi.cotlas.net/modules/AdminManualPayments/resources/views/update.blade.php ENDPATH**/ ?>