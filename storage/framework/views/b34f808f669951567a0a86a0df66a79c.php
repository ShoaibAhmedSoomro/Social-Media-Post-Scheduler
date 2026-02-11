<?php if(!empty($filters)): ?>
<div class="d-flex">
    <div class="btn-group position-static">
        <button class="btn btn-outline btn-light btn-sm dropdown-toggle dropdown-arrow-hide" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="true">
            <i class="fa-light fa-filter"></i> <?php echo e(__("Filters")); ?>

        </button>
        <div class="dropdown-menu dropdown-menu-end border-1 border-gray-300 w-full max-w-250" data-popper-placement="bottom-end">
            <div class="d-flex justify-content-between align-items-center border-bottom px-3 py-2 fw-6 fs-16 gap-8">
                <div>
                    <span><i class="fa-light fa-filter"></i></span>
                    <span><?php echo e(__("Filters")); ?></span>
                </div>
                <a href="javascript:void(0);"  data-bs-dropdown-close="true">
                    <i class="fal fa-times"></i>
                </a>
            </div>
            <div class="p-3">
                <?php $__currentLoopData = $filters; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $filter): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="mb-3">
                        <label class="form-label"><?php echo e($filter['label']); ?></label>
                        <select class="form-select form-select-sm datatable_filter" name="<?php echo e($filter['name']); ?>">
                            <?php $__currentLoopData = $filter['options']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $option): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($option['value']); ?>"><?php echo e($option['label']); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>
</div>
<?php endif; ?><?php /**PATH /home/cotlas-socialxi/htdocs/socialxi.cotlas.net/resources/themes/app/pico/resources/views/components/datatable_filters.blade.php ENDPATH**/ ?>