<?php $__env->startSection('form', json_encode([])); ?>

<?php $__env->startSection('sub_header'); ?>
    <?php if (isset($component)) { $__componentOriginal6bfd7fd5c294530066e0efb20ff4cd9a = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal6bfd7fd5c294530066e0efb20ff4cd9a = $attributes; } ?>
<?php $component = App\View\Components\SubHeader::resolve(['title' => ''.e(__('Manage Support Labels')).'','description' => ''.e(__('Efficiently organize, track, and maintain support label systems')).'','count' => $total] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('sub-header'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\SubHeader::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>           
        <a class="btn btn-dark btn-sm actionItem d-flex align-items-center gap-1 text-nowrap" 
           href="<?php echo e(module_url("update")); ?>" 
           data-popup="SupportLabelsModal">
            <i class="fa-light fa-plus"></i>
            <span><?php echo e(__('Create new')); ?></span>
        </a>

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
                                        <option value="1"><?php echo e(__("Enable")); ?></option>
                                        <option value="0"><?php echo e(__("Disable")); ?></option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> 
                <div class="btn-group position-static">
                    <button class="btn btn-outline btn-primary btn-sm dropdown-toggle dropdown-arrow-hide" data-bs-toggle="dropdown" aria-expanded="true">
                        <i class="fa-light fa-grid-2"></i> <?php echo e(__("Actions")); ?>

                    </button>
                    <ul class="dropdown-menu dropdown-menu-end border-1 border-gray-300 px-2 w-100 max-w-125" data-popper-placement="bottom-end">
                        <li>
                            <a class="dropdown-item p-2 rounded d-flex gap-8 fw-5 fs-14 actionMultiItem" href="<?php echo e(module_url("status/enable")); ?>" data-call-success="Main.DataTable_Reload('#<?php echo e($Datatable['element']); ?>')">
                                <span class="size-16 me-1 text-center"><i class="fa-light fa-eye"></i></span>
                                <span ><?php echo e(__('Enable')); ?></span>
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item p-2 rounded d-flex gap-8 fw-5 fs-14 actionMultiItem" href="<?php echo e(module_url("status/disable")); ?>" data-call-success="Main.DataTable_Reload('#<?php echo e($Datatable['element']); ?>')">
                                <span class="size-16 me-1 text-center"><i class="fa-light fa-eye-slash"></i></span>
                                <span><?php echo e(__('Disable')); ?></span>
                            </a>
                        </li>
                        <li><hr class="dropdown-divider"></li>
                        <li>
                            <a class="dropdown-item p-2 rounded d-flex gap-8 fw-5 fs-14 actionMultiItem" href="<?php echo e(module_url("destroy")); ?>" data-call-success="Main.ajaxScroll(true);">
                                <span class="size-16 me-1 text-center"><i class="fa-light fa-trash-can-list"></i></span>
                                <span><?php echo e(__("Delete")); ?></span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
                
        <div class="card-body p-0 border-0">
            <?php if(!empty($Datatable['columns'])): ?>
            <div class="table-responsive">
                <table id="<?php echo e($Datatable['element']); ?>" data-url="<?php echo e(module_url("list")); ?>" class="display table table-hide-footer w-100">
                    <thead>
                        <tr>
                            <?php $__currentLoopData = $Datatable['columns']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $column): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                <?php if($key == 0): ?>

                                <?php elseif($key + 1 == count($Datatable['columns'])): ?>
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
                </table>
            </div>
            <?php endif; ?>
        </div>
    </div>

    <div class="container px-4">
        <div class="ajax-scroll" data-url="<?php echo e(module_url("list")); ?>" data-resp=".channel-list" data-scroll="document">
            <div class="row channel-list">
                
            </div>

            <div class="pb-30 ajax-scroll-loading d-none">
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

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/cotlas-socialxi/htdocs/socialxi.cotlas.net/modules/AdminSupportLabels/resources/views/index.blade.php ENDPATH**/ ?>