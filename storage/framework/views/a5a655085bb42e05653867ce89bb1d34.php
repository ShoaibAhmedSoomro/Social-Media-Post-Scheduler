<?php $__env->startSection('sub_header'); ?>
    <?php if (isset($component)) { $__componentOriginal6bfd7fd5c294530066e0efb20ff4cd9a = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal6bfd7fd5c294530066e0efb20ff4cd9a = $attributes; } ?>
<?php $component = App\View\Components\SubHeader::resolve(['title' => ''.e(__('Support Central')).'','description' => ''.e(__('Track and resolve customer support requests')).'','count' => $total] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('sub-header'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\SubHeader::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
        <a class="btn btn-dark btn-sm" href="<?php echo e(module_url("new-ticket")); ?>">
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

    <div class="container pb-5">
        <form class="actionMulti">
            <div class="card mt-5">
                <div class="card-header">
                    <div class="d-flex flex-wrap justify-content-between align-items-center w-100 gap-8">
                        <div class="table-info"></div>
                        <div class="d-flex flex-wrap gap-8">
                            <div class="d-flex">
                                <div class="form-control form-control-sm">
                                    <button class="btn btn-icon">
                                        <i class="fa-duotone fa-solid fa-magnifying-glass"></i>
                                    </button>
                                    <input name="datatable_filter[search]" placeholder="<?php echo e(__('Search')); ?>" type="text"/>
                                </div>
                            </div>
                            <div class="d-flex">
                                <div class="btn-group position-static">
                                    <button class="btn btn-outline btn-light btn-sm dropdown-toggle dropdown-arrow-hide" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="true">
                                        <i class="fa-light fa-filter"></i> <?php echo e(__("Filters")); ?>

                                    </button>
                                    <div class="dropdown-menu dropdown-menu-end border-1 border-gray-300 w-full max-w-250" data-popper-placement="bottom-end">
                                        <div class="d-flex justify-content-between align-items-center border-bottom px-3 py-2 fw-6 fs-16 gap-8">
                                            <div>
                                                <span><i class="fa-light fa-filter"></i></span>
                                                <span><?php echo e(__("Filters")); ?></span>
                                            </div>
                                            <a href="javascript:void(0);"  data-bs-dropdown-close="true">
                                                <i class="fal fa-times"></i>
                                            </a>
                                        </div>
                                        <div class="p-3">
                                            <div class="mb-3">
                                                <label class="form-label"><?php echo e(__("Categories")); ?></label>
                                                <select class="form-select form-select-sm datatable_filter" data-select2-dropdown-class="mt--1" data-control="select2" name="datatable_filter[cate_id]">
                                                    <option value="-1"><?php echo e(__('All')); ?></option>
                                                    <?php if($categories): ?>
                                                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <option value="<?php echo e($value->id); ?>" data-icon="<?php echo e($value->icon); ?> text-<?php echo e($value->color); ?>"><?php echo e($value->name); ?></option>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    <?php endif; ?>
                                                </select>
                                            </div>
                                            <div class="mb-0">
                                                <label class="form-label"><?php echo e(__("Labels")); ?></label>
                                                <select class="form-select form-select-sm datatable_filter" data-select2-dropdown-class="mt--1" data-control="select2" name="datatable_filter[label_id]">
                                                    <option value="-1"><?php echo e(__('All')); ?></option>
                                                    <?php if($labels): ?>
                                                        <?php $__currentLoopData = $labels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <option value="<?php echo e($value->id); ?>" data-icon="<?php echo e($value->icon); ?> text-<?php echo e($value->color); ?>"><?php echo e($value->name); ?></option>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    <?php endif; ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="d-flex">
                                <select class="form-select form-select-sm datatable_filter" name="datatable_filter[status]">
                                    <option value="-1"><?php echo e(__('All')); ?></option>
                                    <option value="1"><?php echo e(__('Open')); ?></option>
                                    <option value="2"><?php echo e(__('Resolved')); ?></option>
                                    <option value="0"><?php echo e(__('Closed')); ?></option>
                                </select>
                            </div>
                            <div class="d-flex">
                                <div class="btn-group">
                                    <button class="btn btn-outline btn-primary btn-sm dropdown-toggle dropdown-arrow-hide" data-bs-toggle="dropdown">
                                        <i class="fa-light fa-grid-2"></i> <?php echo e(__('Actions')); ?>

                                    </button>

                                    <ul class="dropdown-menu dropdown-menu-end border-1 border-gray-300 w-100 max-w-125">
                                        <li class="mx-2">
                                            <a class="dropdown-item p-2 rounded d-flex gap-8 fw-5 fs-14 actionMultiItem" href="<?php echo e(module_url("status/open")); ?>" data-call-success="Main.DataTable_Reload('#<?php echo e($Datatable['element']); ?>')">
                                                <span class="size-16 me-1 text-center"><i class="fa-light fa-door-open"></i></span>
                                                <span ><?php echo e(__('Open')); ?></span>
                                            </a>
                                        </li>
                                        <li class="mx-2">
                                            <a class="dropdown-item p-2 rounded d-flex gap-8 fw-5 fs-14 actionMultiItem" href="<?php echo e(module_url("status/resolved")); ?>" data-call-success="Main.DataTable_Reload('#<?php echo e($Datatable['element']); ?>')">
                                                <span class="size-16 me-1 text-center"><i class="fa-light fa-circle-check"></i></span>
                                                <span ><?php echo e(__('Resolved')); ?></span>
                                            </a>
                                        </li>
                                        <li class="mx-2">
                                            <a class="dropdown-item p-2 rounded d-flex gap-8 fw-5 fs-14 actionMultiItem" href="<?php echo e(module_url("status/close")); ?>" data-call-success="Main.DataTable_Reload('#<?php echo e($Datatable['element']); ?>')">
                                                <span class="size-16 me-1 text-center"><i class="fa-light fa-lock"></i></span>
                                                <span><?php echo e(__('Closed')); ?></span>
                                            </a>
                                        </li>
                                        <li><hr class="dropdown-divider"></li>
                                        <li class="mx-2">
                                            <a class="dropdown-item p-2 rounded d-flex gap-8 fw-5 fs-14 actionMultiItem" href="<?php echo e(module_url("destroy")); ?>" data-confirm="<?php echo e(__("Are you sure you want to delete this item?")); ?>" data-call-success="Main.DataTable_Reload('#<?php echo e($Datatable['element']); ?>')">
                                                <span class="size-16 me-1 text-center"><i class="fa-light fa-trash-can-list"></i></span>
                                                <span><?php echo e(__('Delete')); ?></span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
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
                                            <th class="align-middle w-10px pe-2">
                                                <div class="form-check form-check-sm form-check-custom form-check-solid">
                                                    <input class="form-check-input checkbox-all" type="checkbox" data-checkbox-parent=".table-responsive"/>
                                                </div>
                                            </th>
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
                <div class="card-footer justify-center border-top-0">
                    <div class="d-flex flex-wrap justify-content-center align-items-center w-100 justify-content-md-between gap-20">
                        <div class="d-flex align-items-center gap-8 fs-14 text-gray-700 table-size"></div>
                        <div class="d-flex table-pagination"></div>
                    </div>
                </div>
            </div>
        </form>

    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script type="text/javascript">
        var DataTable = Main.DataTable("#<?php echo e($Datatable['element']); ?>", {

            <?php if(!empty($Datatable['columns'])): ?>
                "columns": <?php echo json_encode($Datatable['columns']); ?>,
            <?php endif; ?>

            <?php if(!empty($Datatable['lengthMenu'])): ?>
                "lengthMenu": <?php echo json_encode($Datatable['lengthMenu']); ?>,
            <?php endif; ?>

            <?php if(!empty($Datatable['order'])): ?>
                "order": <?php echo json_encode($Datatable['order']); ?>,
            <?php endif; ?>

            "columnDefs": [
                {
                    targets: 'id_secure:name',
                    orderable: false,
                    render: function (data, type, row) {
                        return `
                            <div class="form-check form-check-sm form-check-custom form-check-solid">
                                <input class="form-check-input checkbox-item" name="id[]" type="checkbox" value="${row.id_secure}" />
                            </div>`;
                    }
                },
                {
                    targets: 'title:name',
                    orderable: true,
                    render: function (data, type, row) {

                        var lables_output = '';

                        $.each(row.label_names, function(index, name) {
                            if(row.label_names != ""){
                                var color = row.label_colors[index];
                                var icon = row.label_icons[index];
                                lables_output += '<span class="mb-1 badge badge-outline badge-xs me-1 badge-' + color + '"><i class="' + icon + ' me-1"></i> <span>' + name + '</span></span>';
                            }
                        });

                        var read = '';
                        if(row.admin_read){
                            read = `<span class="badge badge-outline badge-xs badge-danger b-r-20 ml-4 px-2"><?php echo e(__("Unread")); ?><i class="ms-1 fa-light fa-envelope"></i></span>`;
                        }

                        return `
                            <div class="d-flex gap-8 align-items-center text-truncate-3">

                                <div class="text-start lh-1.1">
                                    <div class="fw-5 text-gray-900">
                                        <a class="text-gray-800 text-hover-primary fw-6 text-truncate-3" href="<?php echo e(module_url("ticket")); ?>/${row.id_secure}">
                                            ${row.title}
                                            ${read}
                                        </a>
                                        <div class="fw-4 fs-12">${row.category_name}</div>
                                        <div class="fw-4 fs-12">${lables_output}</div>
                                    </div>
                                </div>
                            </div>`;
                    }
                },

                {
                    targets: 'status:name',
                    orderable: true,
                    className: 'min-w-80',
                    render: function (data, type, row) {
                        switch(data) {
                            case 1:
                                var status_class = "badge-primary";
                                var status_text = "<?php echo e(__("Open")); ?>";
                                var status_icon = "fa-light fa-door-open";
                                break;
                            case 2:
                                var status_class = "badge-success";
                                var status_text = "<?php echo e(__("Resolved")); ?>";
                                var status_icon = "fa-light fa-circle-check";
                                break;
                            default:
                                var status_class = "badge-dark";
                                var status_text = "<?php echo e(__("Closed")); ?>";
                                var status_icon = "fa-light fa-lock";
                        }

                        return `
                            <div class="btn-group">
                                <a href="javascript:void(0);" class="badge badge-outline badge-sm ${status_class} dropdown-toggle dropdown-arrow-hide" data-bs-toggle="dropdown"><i class="${status_icon} pe-2"></i>${status_text}</a>
                                <ul class="dropdown-menu dropdown-menu-end border-1 border-gray-300 px-2 w-100 max-w-125">
                                    <li>
                                        <a class="dropdown-item p-1 rounded d-flex gap-8 fw-5 fs-14 b-r-6 actionItem" data-id="${row.id_secure}" href="<?php echo e(module_url("status/open")); ?>" data-call-success="Main.DataTable_Reload('#<?php echo e($Datatable['element']); ?>')">
                                            <span class="size-16 me-1 text-center"><i class="fa-light fa-door-open"></i></span>
                                            <span ><?php echo e(__("Open")); ?></span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item p-1 rounded d-flex gap-8 fw-5 fs-14 b-r-6 actionItem" data-id="${row.id_secure}" href="<?php echo e(module_url("status/resolved")); ?>" data-call-success="Main.DataTable_Reload('#<?php echo e($Datatable['element']); ?>')">
                                            <span class="size-16 me-1 text-center"><i class="fa-light fa-circle-check"></i></span>
                                            <span><?php echo e(__("Resolved")); ?></span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item p-1 rounded d-flex gap-8 fw-5 fs-14 b-r-6 actionItem" data-id="${row.id_secure}" href="<?php echo e(module_url("status/close")); ?>" data-call-success="Main.DataTable_Reload('#<?php echo e($Datatable['element']); ?>')">
                                            <span class="size-16 me-1 text-center"><i class="fa-light fa-lock"></i></span>
                                            <span><?php echo e(__("Close")); ?></span>
                                        </a>
                                    </li>
                                </ul>
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
                                    <?php echo e(__('Actions')); ?></button>
                                <ul class="dropdown-menu border-1 border-gray-300 w-150 max-w-150 min-w-150">
                                    <li class="mx-2">
                                        <a class="dropdown-item d-flex gap-8 fw-5 fs-14 b-r-6" data-id="${row.id_secure}" href="<?php echo e(module_url("edit")); ?>/${row.id_secure}">
                                            <span class="size-16 me-1 text-center"><i class="fa-light fa-pen-to-square"></i></span>
                                            <span><?php echo e(__('Edit')); ?></span>
                                        </a>
                                    </li>
                                    <li><hr class="dropdown-divider"></li>
                                    <li class="mx-2">
                                        <a class="dropdown-item d-flex gap-8 fw-5 fs-14 b-r-6 actionItem" data-id="${row.id_secure}" href="<?php echo e(module_url("destroy")); ?>" data-confirm="<?php echo e(__("Are you sure you want to delete this item?")); ?>" data-call-success="Main.DataTable_Reload('#<?php echo e($Datatable['element']); ?>')">
                                            <span class="size-16 me-1 text-center"><i class="fa-light fa-trash-can-list"></i></span>
                                            <span><?php echo e(__('Delete')); ?></span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        `;
                    },
                },
            ]
        });

        DataTable.columns([
            'user_avatar:name',
            'label_names:name',
            'label_colors:name',
            'label_icons:name',
            'admin_read:name',
            'user_account_id:name',
            'type_name:name',
            'type_color:name',
            'type_icon:name',
            'user_email:name',
            'user_username:name',
            'category_color:name',
            'category_name:name',
        ]).visible(false);
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/cotlas-socialxi/htdocs/socialxi.cotlas.net/modules/AdminSupport/resources/views/index.blade.php ENDPATH**/ ?>