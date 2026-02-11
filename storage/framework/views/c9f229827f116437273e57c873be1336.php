<?php
    $providers  = \AI::getPlatforms();
    $modelList  = collect($providers)->mapWithKeys(fn($title, $provider) => [
        $provider => \AI::getAvailableModels($provider)
    ]);
?>

<div class="card shadow-none border-gray-300 mb-4">
    <div class="card-header fw-6 fs-18">
        <?php echo e(__("AI Model Rates")); ?>

    </div>
    <div class="card-body">

        
        <div class="card shadow-none border-gray-300 mb-4">
            <div class="card-body">
                <ul class="mb-0 fs-14">
                    <li>
                        <b><?php echo e(__("Purpose:")); ?></b>
                        <?php echo e(__("Customize the conversion rate from token to credit for each AI model to control AI usage costs in your system.")); ?>

                    </li>
                    <li class="mt-3">
                        <b><?php echo e(__("How to use:")); ?></b>
                        <?php echo e(__("For each model, enter the number of credits that will be deducted for each token used.")); ?><br>
                        <span class="text-900"><?php echo e(__("Example:")); ?></span>
                        <b>1</b> <?php echo e(__("means 1 token = 1 credit (default);")); ?>

                        <b>20</b> <?php echo e(__("means 20 tokens = 1 credit (using this model will cost 20x).")); ?>

                    </li>
                    <li class="mt-3">
                        <b><?php echo e(__("Note:")); ?></b>
                        <?php echo e(__("If you leave a field blank, the system will use the default value of 1 credit/token.")); ?><br>
                        <?php echo e(__("You can adjust this rate at any time to suit your pricing strategy or cost control needs.")); ?>

                    </li>
                </ul>
            </div>
        </div>

        
        <?php $__currentLoopData = $providers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $provider => $title): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="fw-6 mb-3 mt-20 fs-18 text-primary border-bottom pb-1">
                <?php echo e(__($title)); ?>

            </div>

            <?php $__currentLoopData = ($modelList[$provider] ?? []); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category => $models): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="mb-3">
                	<div class="mb-2 text-muted fw-5 fs-13">
	                    <?php echo e(__("Category:")); ?> <span class="text-dark"><?php echo e(ucfirst($category)); ?></span>
	                </div>

	                <?php $__currentLoopData = $models; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $modelKey => $info): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	                    <div class="mb-2">
	                        <div class="p-3 border rounded-3 d-flex justify-content-between align-items-center fs-14 gap-16 shadow-sm hover-shadow transition">
	                            <div>
	                                <div class="fw-6"><?php echo e($info['name'] ?? $modelKey); ?></div>
	                                <small class="text-muted fs-12">
	                                    <?php echo e(__("API Type:")); ?> <?php echo e($info['api_type'] ?? 'n/a'); ?>

	                                </small>
	                            </div>
	                            <div class="text-end">
	                                <label class="form-label fs-11 text-muted mb-1 d-block">
	                                    <?php echo e(__("Credits/Token")); ?>

	                                </label>
	                                <input type="number"
	                                       step="0.01"
	                                       min="0.01"
	                                       class="form-control text-end w-100"
	                                       style="max-width: 90px"
	                                       name="credit_rates[<?php echo e($modelKey); ?>]"
	                                       value="<?php echo e(old("credit_rates.$modelKey", $rates[$modelKey] ?? 1)); ?>"
	                                       placeholder="1"
	                                       required>
	                            </div>
	                        </div>
	                    </div>
	                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    </div>
</div>
<?php /**PATH /home/cotlas-socialxi/htdocs/socialxi.cotlas.net/modules/AdminAIConfiguration/resources/views/credit-rates.blade.php ENDPATH**/ ?>