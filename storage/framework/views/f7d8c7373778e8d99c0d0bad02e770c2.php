<?php $__env->startSection('content'); ?>
    <div class="border-bottom mb-1 py-4 bg-polygon">
        <div class="container">
            <div class="d-flex justify-content-between align-self-center">
                <div class="mb-0">
                    <div class="fw-7 fs-20 mx-auto mb-2 text-primary-700"><?php echo e(__('Welcome, Admin')); ?> 🚀</div>
                    <div class="fw-5 text-gray-700"><?php echo e(__('Overview of platform performance, user activity, and system health.')); ?></div>
                </div>
            </div>
        </div>
    </div>

    <div class="container py-5">

        <div class="ajax-pages" data-url="<?php echo e(route('admin.dashboard.statistics')); ?>" data-resp=".ajax-pages">
            
            <div class="pb-30 mt-200 ajax-scroll-loading">
                <div class="app-loading mx-auto mt-10 pl-0 pr-0">
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                </div>
            </div>

        </div>       
        
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/cotlas-socialxi/htdocs/socialxi.cotlas.net/modules/AdminDashboard/resources/views/index.blade.php ENDPATH**/ ?>