<?php $__env->startSection('sub_header'); ?>
    <?php if (isset($component)) { $__componentOriginal6bfd7fd5c294530066e0efb20ff4cd9a = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal6bfd7fd5c294530066e0efb20ff4cd9a = $attributes; } ?>
<?php $component = App\View\Components\SubHeader::resolve(['title' => ''.e(__('AI Templates')).'','description' => ''.e(__('Pre-made formats designed for use with AI.')).'','count' => $total] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('sub-header'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\SubHeader::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
        <a class="btn btn-dark btn-sm actionItem" href="<?php echo e(module_url('update')); ?>"  data-popup="AITemplatesModal">
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
    <?php $__env->startComponent('components.datatable_script', [ "Datatable" => $Datatable, "edit_popup" => "AITemplatesModal" , "column_actions" => true, "column_status" => true]); ?> <?php echo $__env->renderComponent(); ?>

    <script type="text/javascript">
        columnDefs  = columnDefs.concat([
            {
                targets: 'ai_categories.name:name',
                orderable: true,
                render: function (data, type, row) {
                    return `
                        <div class="fs-14 d-flex gap-6 align-items-center">
                            <i class="${row.ai_categories_icon} text-${row.ai_categories_color} fs-14" ></i> ${row.ai_categories_name}
                        </div>
                        `;
                }
            },
        ]);
        var dtConfig = {
            columns: <?php echo json_encode($Datatable['columns'] ?? []); ?>,
            lengthMenu: <?php echo json_encode($Datatable['lengthMenu'] ?? []); ?>,
            order: <?php echo json_encode($Datatable['order'] ?? []); ?>,
            columnDefs: <?php echo json_encode($Datatable['columnDefs'] ?? []); ?>

        };

        dtConfig.columnDefs = dtConfig.columnDefs.concat(columnDefs);
        var DataTable = Main.DataTable("#<?php echo e($Datatable['element']); ?>", dtConfig);
        DataTable.columns(['ai_categories.icon:name', 'ai_categories.color:name']).visible(false);
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/cotlas-socialxi/htdocs/socialxi.cotlas.net/modules/AdminAITemplates/resources/views/index.blade.php ENDPATH**/ ?>