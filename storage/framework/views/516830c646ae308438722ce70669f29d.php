<?php $__env->startSection('content'); ?>
    <div class="container py-5">
        
        <?php echo $__env->make("components.main-message", array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

        <div class="ajax-pages" data-url="<?php echo e(route('app.dashboard.statistics')); ?>" data-resp=".ajax-pages">
            
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

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/cotlas-socialxi/htdocs/socialxi.cotlas.net/modules/AppDashboard/resources/views/index.blade.php ENDPATH**/ ?>