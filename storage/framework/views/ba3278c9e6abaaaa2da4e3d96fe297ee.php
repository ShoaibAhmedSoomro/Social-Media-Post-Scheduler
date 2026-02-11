<?php $__env->startSection('sub_header'); ?>
    <?php if (isset($component)) { $__componentOriginal6bfd7fd5c294530066e0efb20ff4cd9a = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal6bfd7fd5c294530066e0efb20ff4cd9a = $attributes; } ?>
<?php $component = App\View\Components\SubHeader::resolve(['title' => ''.e(__('Affiliate Withdrawal Requests')).'','description' => ''.e(__('Manage and process withdrawal requests efficiently')).'','count' => $total] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
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
    <?php $__env->startComponent('components.datatable_script', [ "Datatable" => $Datatable, "edit_popup" => "addAffiliateWithdrawalModal" , "edit_text" => __("Edit note") , "edit_url" => "addAffiliateWithdrawalModal" , "column_actions" => true, "column_status" => true]); ?> <?php echo $__env->renderComponent(); ?>
    <script type="text/javascript">
        columnDefs = columnDefs.concat([
            {
                targets: 'affiliate_uid:name',
                orderable: true,
                render: function (data, type, row) {
                    return `
                        <div class="d-flex gap-8 align-items-center">
                            <div class="size-40 size-child border b-r-6">
                                <img data-src="${ Main.mediaURL('<?php echo e(Media::url()); ?>', row.user_avatar) }" src="${ Main.text2img(row.user_fullname, '000') }" class="b-r-6 lazyload" onerror="this.src='${ Main.text2img(row.user_fullname, '000') }'">
                            </div>
                            <div class="text-start lh-1 text-truncate">
                                <div class="fw-5 text-gray-900 text-truncate">
                                    <div class="text-truncate">
                                        <a class="text-gray-800 text-hover-primary actionItem" data-id="${row.RecordID}" href="<?php echo e(module_url("update")); ?>" data-popup="addAffiliateWithdrawalModal">
                                            ${row.user_fullname}
                                        </a>
                                    </div>
                                    <div class="text-truncate text-gray-500 fs-12">
                                        ${row.user_email}
                                    </div>
                                </div>
                            </div>
                        </div>`;
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
        DataTable.columns(['users.fullname:name', 'users.email:name', 'users.avatar:name']).visible(false);
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/cotlas-socialxi/htdocs/socialxi.cotlas.net/modules/AdminAffiliateWithdrawal/resources/views/index.blade.php ENDPATH**/ ?>