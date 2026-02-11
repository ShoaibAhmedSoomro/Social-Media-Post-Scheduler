<div class="header">
    <div class="container1 px-3 hp-100">
        <div class="hp-100 d-flex justify-content-between">
            <div class="d-flex justify-content-between align-items-center">
                <div class="d-block d-sm-block d-md-none">
                    <button class="btn btn-icon btn-light sidebar-toggle">
                        <i class="fa-light fa-chevron-right"></i>
                    </button>
                </div>
                <?php $__currentLoopData = \HeaderManager::getHeaderItems('start'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $headerItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                        $isVisible = $headerItem['visible'] ?? fn() => true;
                    ?>
                    <?php if($isVisible()): ?>
                        <?php echo is_callable($headerItem['item']) ? $headerItem['item']() : $headerItem['item']; ?>

                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                <?php echo $__env->yieldContent('header_start'); ?>
            </div>

            <div class="d-flex flex-grow-1 justify-content-between wp-100">
                <?php $__currentLoopData = \HeaderManager::getHeaderItems('center'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $headerItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                        $isVisible = $headerItem['visible'] ?? fn() => true;
                    ?>
                    <?php if($isVisible()): ?>
                        <?php echo is_callable($headerItem['item']) ? $headerItem['item']() : $headerItem['item']; ?>

                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                <?php echo $__env->yieldContent('header_center'); ?>
            </div>

            <div class="d-flex align-items-center gap-16">
                <?php echo $__env->yieldContent('header_end'); ?>

                <?php $__currentLoopData = \HeaderManager::getHeaderItems('end'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $headerItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                        $isVisible = $headerItem['visible'] ?? fn() => true;
                    ?>
                    <?php if($isVisible()): ?>
                        <?php echo is_callable($headerItem['item']) ? $headerItem['item']() : $headerItem['item']; ?>

                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                
            </div>
        </div>
    </div>
</div><?php /**PATH /home/cotlas-socialxi/htdocs/socialxi.cotlas.net/resources/themes/app/pico/resources/views/partials/header.blade.php ENDPATH**/ ?>