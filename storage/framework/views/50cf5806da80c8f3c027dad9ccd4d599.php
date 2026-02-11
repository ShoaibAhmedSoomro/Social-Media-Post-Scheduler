

<?php $__env->startSection('sub_header'); ?>
    <?php if (isset($component)) { $__componentOriginal6bfd7fd5c294530066e0efb20ff4cd9a = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal6bfd7fd5c294530066e0efb20ff4cd9a = $attributes; } ?>
<?php $component = App\View\Components\SubHeader::resolve(['title' => ''.e($language->name).'','description' => ''.e(__('Update and manage words in language packages efficiently.')).'','count' => $total] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('sub-header'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\SubHeader::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
        <a class="btn btn-dark btn-sm actionItem" data-id="<?php echo e($language->id_secure); ?>" href="<?php echo e(module_url("auto-translate/".$language->id_secure)); ?>" data-confirm="<?php echo e(__("Warning: This action will overwrite all your previous language changes. Are you sure you want to proceed with auto-translating this language?")); ?>" data-redirect="">
            <span><i class="fa-light fa-bolt-auto"></i></span>
            <span><?php echo e(__('Auto Translate')); ?></span>
        </a>
        <a class="btn btn-light btn-sm" href="<?php echo e(module_url()); ?>">
            <span><i class="fa-light fa-chevron-left"></i></span>
            <span><?php echo e(__('Back')); ?></span>
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
    <?php $__env->startComponent('components.datatable', [ "Datatable" => $Datatable, "customTable" => true ]); ?>
        <table id="<?php echo e($Datatable['element']); ?>" data-url="<?php echo e(module_url("translations-list/".$language->id_secure)); ?>" class="display table table-bordered table-hide-footer w-100">
		    <thead>
		        <tr>
		        	<?php
		        		$columns = $Datatable['columns'];
		        	?>
		            <?php $__currentLoopData = $columns; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $column): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		                <?php if($key + 1 == count($columns)): ?>
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
    <?php echo $__env->renderComponent(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <?php $__env->startComponent('components.datatable_script', [ "Datatable" => $Datatable, "edit_popup" => "" , "column_actions" => false, "column_status" => true]); ?> <?php echo $__env->renderComponent(); ?>
    <script type="text/javascript">
        columnDefs = columnDefs.concat([
                {
                    targets: 'name:name',
                    orderable: true,
                    render: function (data, type, row) {
                        return `<div class="text-gray-800 fs-13">${data}</div>`;
                    }
                },
                {
                    targets: 'value:name',
                    orderable: true,
                    render: function (data, type, row) {
                        return `<textarea class="form-control actionChange transaction_${row.id}" data-url="<?php echo e(module_url("update-translation")); ?>/${row.id}">${data}</textarea>`;
                    }
                },
                {
                targets: -1,
                data: null,
                orderable: false,
                className: 'text-end',
                render: function (data, type, row) {
                    return `
                        <button href="<?php echo e(module_url("auto-translation")); ?>/${row.id}" data-id="${row.id}" class="btn btn-light btn-icon btn-sm actionItem" data-call-success="Main.typeText('.transaction_${row.id}', result.text, 0, 1)">
                            <i class="fa-light fa-bolt-auto"></i>
                        </button>
                    `;
                },
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
        DataTable.columns(['id:name']).visible(false);
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/cotlas-socialxi/htdocs/socialxi.cotlas.net/modules/AdminLanguages/resources/views/edit_translations.blade.php ENDPATH**/ ?>