<?php $__env->startSection('sub_header'); ?>
    <?php if (isset($component)) { $__componentOriginal6bfd7fd5c294530066e0efb20ff4cd9a = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal6bfd7fd5c294530066e0efb20ff4cd9a = $attributes; } ?>
<?php $component = App\View\Components\SubHeader::resolve(['title' => ''.e(__('Plan Management')).'','description' => ''.e(__('Seamlessly manage subscription plans to drive revenue growth.')).'','count' => $total] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('sub-header'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\SubHeader::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
        <a class="btn btn-dark btn-sm" href="<?php echo e(module_url('create')); ?>">
            <span><i class="fa-light fa-plus"></i></span>
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
    <?php $__env->startComponent('components.datatable', [ "Datatable" => $Datatable ]); ?> <?php echo $__env->renderComponent(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <?php $__env->startComponent('components.datatable_script', [ "Datatable" => $Datatable, "edit_popup" => "" , "edit_url" => "" , "column_actions" => true, "column_status" => true]); ?> <?php echo $__env->renderComponent(); ?>
    <script type="text/javascript">
        columnDefs = columnDefs.concat([
            {
                targets: 'type:name',
                orderable: true,
                render: function (data, type, row) {
                    switch(data){
                        case 1:
                            return `<span class="badge badge-xs badge-pill badge-outline badge-info"><?php echo e(__("Monthly")); ?></span>`;
                            break;

                        case 2:
                            return `<span class="badge badge-xs badge-pill badge-outline badge-success"><?php echo e(__("Yearly")); ?></span>`;
                            break;

                        case 3:
                            return `<span class="badge badge-xs badge-pill badge-outline badge-primary"><?php echo e(__("Lifetime")); ?></span>`;
                            break;
                    }
                }
            },
            {
                targets: 'featured:name',
                orderable: true,
                render: function (data, type, row) {
                    switch(data){
                        case 0:
                            return `<span class="fs-18 text-danger"><i class="fa-light fa-circle-xmark"></i></span>`;
                            break;

                        case 1:
                            return `<span class="fs-18 text-success"><i class="fa-light fa-circle-check"></i></span>`;
                            break;
                    }
                }
            },
            {
                targets: 'free_plan:name',
                orderable: true,
                render: function (data, type, row) {
                    switch(data){
                        case 0:
                            return `<span class="fs-18 text-danger"><i class="fa-light fa-circle-xmark"></i></span>`;
                            break;

                        case 1:
                            return `<span class="fs-18 text-success"><i class="fa-light fa-circle-check"></i></span>`;
                            break;
                    }
                }
            }
        ]);
        var dtConfig = {
            columns: <?php echo json_encode($Datatable['columns'] ?? []); ?>,
            lengthMenu: <?php echo json_encode($Datatable['lengthMenu'] ?? []); ?>,
            order: <?php echo json_encode($Datatable['order'] ?? []); ?>,
            columnDefs: <?php echo json_encode($Datatable['columnDefs'] ?? []); ?>

        };

        dtConfig.columnDefs = dtConfig.columnDefs.concat(columnDefs);
        var DataTable = Main.DataTable("#<?php echo e($Datatable['element']); ?>", dtConfig);
        DataTable.columns([]).visible(false);
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/cotlas-socialxi/htdocs/socialxi.cotlas.net/modules/AdminPlans/resources/views/index.blade.php ENDPATH**/ ?>