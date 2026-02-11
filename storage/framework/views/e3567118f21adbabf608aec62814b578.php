<?php $__env->startSection('sub_header'); ?>
    <?php if (isset($component)) { $__componentOriginal6bfd7fd5c294530066e0efb20ff4cd9a = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal6bfd7fd5c294530066e0efb20ff4cd9a = $attributes; } ?>
<?php $component = App\View\Components\SubHeader::resolve(['title' => ''.e(__('Payment History')).'','description' => ''.e(__('Show payment amounts dates statuses and methods')).'','count' => $total] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('sub-header'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\SubHeader::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
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
    <?php $__env->startComponent('components.datatable_script', [ "Datatable" => $Datatable , "column_status" => true, "column_actions" => false]); ?> <?php echo $__env->renderComponent(); ?>

    <script type="text/javascript">
        Main.DateTime();
        columnDefs  = columnDefs.concat([
            {
                targets: 'uid:name',
                orderable: true,
                render: function (data, type, row) {
                    console.log(row);
                    return `
                        <div class="d-flex gap-8 align-items-center">
                            <div class="size-40 size-child border b-r-6">
                                <img data-src="${ Main.mediaURL('<?php echo e(Media::url()); ?>', row.user_avatar) }" src="${ Main.text2img(row.user_fullname, '000') }" class="b-r-6 lazyload" onerror="this.src='${ Main.text2img(row.user_fullname, '000') }'">
                            </div>
                            <div class="text-start lh-1 text-truncate">
                                <div class="fw-5 text-gray-900 text-truncate">
                                    <div class="text-truncate">
                                        ${row.user_fullname}
                                    </div>
                                    <div class="text-truncate text-gray-500 fs-12">
                                        ${row.user_email}
                                    </div>
                                </div>
                            </div>
                        </div>`;
                }
            },
            {
                targets: -1,
                data: null,
                orderable: false,
                className: 'text-end',
                render: function (data, type, row) {
                    return `
                        <div class="dropdown">
                            <button class="btn btn-light btn-active-light-primary btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <?php echo e(__("Actions")); ?>

                            </button>
                            <ul class="dropdown-menu border-1 border-gray-300 w-150 max-w-150 min-w-150">
                                <li class="mx-2">
                                    <a class="dropdown-item d-flex gap-8 fw-5 fs-14 b-r-6 actionItem" data-id="${row.id_secure}" href="<?php echo e(module_url("destroy")); ?>" data-confirm="<?php echo e(__("Are you sure you want to delete this item?")); ?>" data-call-success="Main.DataTable_Reload('#<?php echo e($Datatable['element']); ?>')">
                                        <span class="size-16 me-1 text-center"><i class="fa-light fa-trash-can-list"></i></span>
                                        <span><?php echo e(__("Delete")); ?></span>
                                    </a>
                                </li>
                            </ul>
                        </div>
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
        DataTable.columns(['users.fullname:name', 'users.email:name', 'users.avatar:name']).visible(false);
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/cotlas-socialxi/htdocs/socialxi.cotlas.net/modules/AdminPaymentHistory/resources/views/index.blade.php ENDPATH**/ ?>