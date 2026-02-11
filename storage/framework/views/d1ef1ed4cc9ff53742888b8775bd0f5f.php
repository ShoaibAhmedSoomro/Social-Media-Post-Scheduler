<table id="<?php echo e($element); ?>" data-url="<?php echo e($url); ?>" class="display table table-bordered table-hide-footer w-100">
    <thead>
        <tr>
            <?php $__currentLoopData = $columns; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $column): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($key == 0): ?>
                    <th class="align-middle w-10px pe-2">
                        <div class="form-check form-check-sm form-check-custom form-check-solid">
                            <input class="form-check-input checkbox-all" type="checkbox" data-checkbox-parent=".table-responsive"/>
                        </div>
                    </th>
                <?php elseif($key + 1 == count($columns)): ?>
                    <th class="align-middle w-120 max-w-100">
                        <?php echo e(__('Actions')); ?>

                    </th>
                <?php else: ?>
                    <th class="align-middle">
                        <?php echo e($column['data']); ?>

                    </th>
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tr>
    </thead>
    <tbody class="fs-14">
    </tbody>
</table><?php /**PATH /home/cotlas-socialxi/htdocs/socialxi.cotlas.net/resources/themes/app/pico/resources/views/components/datatable_table.blade.php ENDPATH**/ ?>