<?php $__env->startSection('sub_header'); ?>
    <?php if (isset($component)) { $__componentOriginal6bfd7fd5c294530066e0efb20ff4cd9a = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal6bfd7fd5c294530066e0efb20ff4cd9a = $attributes; } ?>
<?php $component = App\View\Components\SubHeader::resolve(['title' => ''.e(__('Marketplace')).'','description' => ''.e(__('Discover and install powerful modules')).''] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('sub-header'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\SubHeader::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
        <div class="d-flex gap-8">
            <form action="<?php echo e(url()->current()); ?>" method="GET">
                <div class="input-group">
                    <div class="form-control form-control-sm">
                        <span class="btn btn-icon">
                            <i class="fa-duotone fa-solid fa-magnifying-glass"></i>
                        </span>
                        <input class="ajax-scroll-filter" name="search" placeholder="<?php echo e(__('Enter your keyword')); ?>" type="text">
                    </div>
                    <button type="submit" class="btn btn-sm btn-light">
                        <?php echo e(__("Search")); ?>

                    </button>
                </div>
                
            </form>
            <a class="btn btn-outline btn-primary btn-sm text-nowrap" href="<?php echo e(module_url("addons")); ?>">
                <span><i class="fa-light fa-plug"></i></span>
                <span><?php echo e(__('Manage Addons')); ?></span>
            </a>
            <a class="btn btn-dark btn-sm actionItem" href="<?php echo e(module_url("install")); ?>" data-popup="installModal">
                <span><i class="fa-light fa-file-zipper"></i></span>
                <span><?php echo e(__('Install')); ?></span>
            </a>
        </div>

     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal6bfd7fd5c294530066e0efb20ff4cd9a)): ?>
<?php $attributes = $__attributesOriginal6bfd7fd5c294530066e0efb20ff4cd9a; ?>
<?php unset($__attributesOriginal6bfd7fd5c294530066e0efb20ff4cd9a); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal6bfd7fd5c294530066e0efb20ff4cd9a)): ?>
<?php $component = $__componentOriginal6bfd7fd5c294530066e0efb20ff4cd9a; ?>
<?php unset($__componentOriginal6bfd7fd5c294530066e0efb20ff4cd9a); ?>
<?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="container py-5 marketplace-wrapper">
    <?php if(session('error')): ?>
        <div class="alert alert-danger text-center">
            <?php echo e(session('error')); ?>

        </div>
    <?php endif; ?>

    <div class="row g-4">
        <?php $__empty_1 = true; $__currentLoopData = $modules; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <div class="col-md-4">
                <div class="card hp-100 d-flex flex-column rounded-4 overflow-hidden card border-0 shadow-sm rounded-4 mb-4">
                    

                    <div class="card-body d-flex flex-column px-4 py-4">
                        <a href="<?php echo e(route('admin.marketplace.detail', $item['slug'])); ?>">
                            <div class="size-60 size-child mb-4">
                                <img src="<?php echo e($item['thumbnail']); ?>" alt="<?php echo e($item['name']); ?>" class="img-fluid w-100 h-200 object-fit-cover border border-gray-300 b-r-14 border-3">
                            </div>
                        </a>

                        <a href="<?php echo e(route('admin.marketplace.detail', $item['slug'])); ?>" class="text-dark text-hover-primary">
                            <h5 class="fs-17 fw-semibold mb-1"><?php echo e($item['name']); ?></h5>
                        </a>
                        <p class="text-muted small flex-grow-1 mb-3"><?php echo e(\Str::limit($item['description'], 130)); ?></p>

                        <div class="d-flex justify-content-between align-items-center mb-3 small">
                            <span class="fw-bold text-primary fs-20">$<?php echo e($item['price']); ?></span>
                            <span class="text-muted"><?php echo e($item['version']); ?></span>
                        </div>

                        
                        <div>
                            <?php if(!empty($item['demo_url'])): ?>
                            <a href="<?php echo e($item['demo_url']); ?>" target="_blank" class="btn btn-sm btn-light rounded-5 border">
                                <i class="fa-light fa-eye"></i> <?php echo e(__('Live Demo')); ?>

                            </a>
                            <?php endif; ?>
                            <?php if($item['installed']): ?>
                                <?php if($item['addon_status'] === 0): ?>
                                    <button class="btn btn-sm rounded-5 btn-secondary border" disabled>
                                        <i class="fa fa-power-off me-1"></i> <?php echo e(__('Deactivated')); ?>

                                    </button>
                                <?php elseif($item['has_update']): ?>
                                    <a href="<?php echo e(route('admin.marketplace.do_update', ['product_id' => $item['id']])); ?>" class="btn btn-sm btn-warning fw-semibold rounded-pill actionItem" data-redirect="">
                                        <i class="fa fa-arrow-up me-1"></i>
                                        <?php echo e(__('Update to :version', ['version' => $item['version']])); ?>

                                    </a>
                                <?php else: ?>
                                    <button class="btn btn-sm rounded-5 btn-success border" disabled>
                                        <i class="fa fa-check-circle me-1"></i> <?php echo e(__('Installed')); ?>

                                    </button>
                                <?php endif; ?>
                            <?php else: ?>
                                <?php if(!empty($item['product_url'])): ?>
                                    <a href="<?php echo e($item['product_url']); ?>" target="_blank" class="btn btn-sm rounded-5 btn-dark border">
                                        <i class="fa fa-cart-plus me-1"></i> <?php echo e(__('Buy Now')); ?>

                                    </a>
                                <?php endif; ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <div class="col-12 text-center max-w-600 mx-auto">
                <div class="d-flex flex-column align-items-center justify-content-center py-5 my-5">
                    <span class="fs-70 mb-3 text-primary">
                        <i class="fa-light fa-puzzle-piece"></i>
                    </span>
                    <div class="fw-semibold fs-5 mb-2 text-gray-800">
                        <?php echo e(__('No modules found')); ?>

                    </div>
                    <div class="text-body-secondary mb-4">
                        <?php echo e(__('No modules are available in the marketplace at this time. Please check back later for new modules or updates.')); ?>

                    </div>
                    <a href="<?php echo e(route('admin.dashboard')); ?>" class="btn btn-dark">
                        <i class="fa-light fa-house"></i> <?php echo e(__('Go to Dashboard')); ?>

                    </a>
                </div>
            </div>
        <?php endif; ?>
    </div>

    <?php if($modules->hasPages()): ?>
        <div class="d-flex justify-content-center mt-4">
            <?php echo e($modules->links('components.pagination')); ?>

        </div>
    <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/cotlas-socialxi/htdocs/socialxi.cotlas.net/modules/AdminMarketplace/resources/views/index.blade.php ENDPATH**/ ?>