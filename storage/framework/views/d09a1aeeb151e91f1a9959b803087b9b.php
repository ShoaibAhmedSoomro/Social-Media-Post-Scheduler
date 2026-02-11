<?php $__env->startSection('form', json_encode([
    'method' => 'POST'
])); ?>

<?php 
    $channels = Channels::channels();
?>

<?php $__env->startSection('sub_header'); ?>
    <?php if (isset($component)) { $__componentOriginal6bfd7fd5c294530066e0efb20ff4cd9a = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal6bfd7fd5c294530066e0efb20ff4cd9a = $attributes; } ?>
<?php $component = App\View\Components\SubHeader::resolve(['title' => ''.e(__('Manage channels')).'','description' => ''.e(__('Seamless Management for All Channels')).'','count' => $total] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('sub-header'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\SubHeader::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>

        <div class="d-flex gap-8">
            <a class="btn btn-dark btn-sm" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#addChannelModal">
                <span><i class="fa-light fa-plus"></i></span>
                <span><?php echo e(__('Add channels')); ?></span>
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
    <div class="container pb-3">
        <div class="d-flex align-items-center justify-content-between">
            <div class="table-info"></div>
            <div class="d-flex flex-wrap gap-8">    
                <div class="d-flex">
                    <div class="form-control form-control-sm">
                        <span class="btn btn-icon">
                            <i class="fa-duotone fa-solid fa-magnifying-glass"></i>
                        </span>
                        <input class="ajax-scroll-filter" name="keyword" placeholder="<?php echo e(__('Search')); ?>" type="text">
                        <button class="btn btn-icon">
                            <div class="form-check form-check-sm mb-0">
                                <input class="form-check-input checkbox-all" id="select_all" type="checkbox">
                            </div>
                        </button>
                    </div>
                </div>
                <div class="d-flex">
                    <div class="btn-group position-static">
                        <button class="btn btn-outline btn-light btn-sm dropdown-toggle dropdown-arrow-hide" data-bs-toggle="dropdown" aria-expanded="true">
                            <i class="fa-light fa-filter"></i> <?php echo e(__("Filters")); ?>

                        </button>
                        <div class="dropdown-menu dropdown-menu-end border-1 border-gray-300 w-full max-w-250" data-popper-placement="bottom-end">
                            <div class="d-flex border-bottom px-3 py-2 fw-6 fs-16 gap-8">
                                <span><i class="fa-light fa-filter"></i></span>
                                <span><?php echo e(__("Filters")); ?></span>
                            </div>
                            <div class="p-3">
                                <div class="mb-3">
                                    <label class="form-label"><?php echo e(__("Status")); ?></label>
                                    <select class="form-select ajax-scroll-filter" name="status">
                                        <option value="-1"><?php echo e(__("All")); ?></option>
                                        <option value="1"><?php echo e(__("Active")); ?></option>
                                        <option value="0"><?php echo e(__("Disconnected")); ?></option>
                                        <option value="2"><?php echo e(__("Pause")); ?></option>
                                    </select>
                                </div>
                                <div>
                                    <label class="form-label"><?php echo e(__("Social network")); ?></label>
                                    <select class="form-select ajax-scroll-filter" name="module_name">
                                        <option value=""><?php echo e(__("All")); ?></option>
                                        <?php if( !empty( $channels ) ): ?>
                                            <?php $__currentLoopData = $channels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $channel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                                <?php if( !empty( $channel ) && isset( $channel['items']  ) ): ?>
                                                    <?php $__currentLoopData = $channel['items']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="<?php echo e($item['id']); ?>"><?php echo e($item['module_name']); ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <?php endif; ?>

                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
                                    </select>
                            </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="d-flex">
                    <div class="btn-group position-static">
                        <button class="btn btn-outline btn-primary btn-sm dropdown-toggle dropdown-arrow-hide" data-bs-toggle="dropdown" aria-expanded="true">
                            <i class="fa-light fa-grid-2"></i> <?php echo e(__("Actions")); ?>

                        </button>
                        <ul class="dropdown-menu dropdown-menu-end border-1 border-gray-300 px-2 w-100 max-w-125" data-popper-placement="bottom-end">
                            <li>
                                <a class="dropdown-item p-2 rounded d-flex gap-8 fw-5 fs-14 actionMultiItem" href="<?php echo e(module_url("status/active")); ?>" data-call-success="Main.ajaxScroll(true)">
                                    <span class="size-16 me-1 text-center"><i class="fa-light fa-check"></i></span>
                                    <span><?php echo e(__("Active")); ?></span>
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item p-2 rounded d-flex gap-8 fw-5 fs-14 actionMultiItem" href="<?php echo e(module_url("status/pause")); ?>" data-call-success="Main.ajaxScroll(true)">
                                    <span class="size-16 me-1 text-center"><i class="fa-light fa-pause"></i></span>
                                    <span><?php echo e(__("Pause")); ?></span>
                                </a>
                            </li>
                            <li><hr class="dropdown-divider"></li>
                            <li>
                                <a class="dropdown-item p-2 rounded d-flex gap-8 fw-5 fs-14 actionMultiItem" href="<?php echo e(module_url("destroy")); ?>" data-call-success="Main.ajaxScroll(true)">
                                    <span class="size-16 me-1 text-center"><i class="fa-light fa-trash-can-list"></i></span>
                                    <span><?php echo e(__("Delete")); ?></span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="ajax-scroll container px-4" data-url="<?php echo e(module_url("list")); ?>" data-resp=".channel-list" data-scroll="document">
        <div class="row channel-list">
        </div>
        <div class="pb-30 ajax-scroll-loading d-none">
            <div class="app-loading mx-auto mt-100 pl-0 pr-0">
                <div></div>
                <div></div>
                <div></div>
                <div></div>
            </div>
        </div>
    </div>
    <!-- Add Channels Modal -->
    <div class="modal modal-xl fade" id="addChannelModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered1 modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header px-4">
                    <h1 class="modal-title fs-5"><?php echo e(__("Add channels")); ?></h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-4">

                    <div class="row">
                        <?php if( !empty( $channels ) ): ?>
                            <?php $__currentLoopData = $channels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $channel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="col-md-4 mb-4">
                                    <div class="card border-gray-300">
                                        <div class="card-body text-center d-flex flex-column justify-content-center align-items-center gap-10">
                                            <div class="d-flex align-items-center justify-content-center size-50 text-white border-1 b-r-100 fs-16" style="background-color: <?php echo e($channel['color']); ?>;">
                                                <i class="<?php echo e($channel['icon']); ?>"></i>
                                            </div>
                                            <div class="fs-14 fw-5"><?php echo e(__($channel['name'])); ?></div>
                                            <div>
                                                <?php if( !empty( $channel ) && isset( $channel['items']  ) ): ?>
                                                    <?php $__currentLoopData = $channel['items']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <a href="<?php echo e(url($item["uri"])); ?>" class="btn btn-outline btn-sm btn-light mb-1"><i class="fa-light fa-plus"></i> <?php echo e(__( ucfirst( str_replace("_", " ", $item["category"]) ) )); ?></a>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/cotlas-socialxi/htdocs/socialxi.cotlas.net/modules/AppChannels/resources/views/index.blade.php ENDPATH**/ ?>