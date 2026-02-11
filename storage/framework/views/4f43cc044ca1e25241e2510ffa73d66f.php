<div class="d-flex flex-column flex-lg-row flex-md-column align-items-md-start align-items-lg-center justify-content-between">
    <div class="d-flex flex-column gap-8 mb-3">
        <h1 class="fs-20 font-medium lh-1 text-gray-900">
            <span class="fw-6"><?php echo e(__($title)); ?></span> 

            <?php if($count != -1): ?>
		        <span class="fs-14 text-gray-700">
		            (<span class="text-primary"><?php echo e(number_format($count)); ?></span> <?php echo e(__("records")); ?>)
		        </span>
		    <?php endif; ?>
        </h1>
        <div class="d-flex align-items-center gap-20 fw-5 fs-14">
            <div class="d-flex gap-8">
                <span class="text-gray-600"><?php echo e(__($description)); ?></span>
            </div>
        </div>
    </div>
    <div class="d-flex gap-8">
        <?php echo e($slot); ?>

    </div>
</div><?php /**PATH /home/cotlas-socialxi/htdocs/socialxi.cotlas.net/resources/themes/app/pico/resources/views/components/sub_header.blade.php ENDPATH**/ ?>