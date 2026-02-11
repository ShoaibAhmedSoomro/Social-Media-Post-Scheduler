<?php if($categories): ?>
    <div class="row">
    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="col-4 mb-4">
            <a class="card shadow-none border border-gray-300 min-h-115 actionItem" href="<?php echo e(module_url("templates")); ?>" data-content="ai-template-data" data-id="<?php echo e($value->id_secure); ?>" >
                <div class="card-body d-flex justify-content-between align-items-center px-3 gap-16">
                    <div class="fs-12 fw-5 text-truncate-2">
                        <div class="size-30 d-flex align-items-center justify-content-between fs-20">
                            <i class="<?php echo e($value->icon); ?> text-<?php echo e($value->color); ?>-500"></i>
                        </div>
                        <div class="text-truncate-2">
                            <?php echo e($value->name); ?>

                        </div>
                    </div>
                </div>
            </a>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
<?php endif; ?><?php /**PATH /home/cotlas-socialxi/htdocs/socialxi.cotlas.net/modules/AppAIContents/resources/views/categories.blade.php ENDPATH**/ ?>