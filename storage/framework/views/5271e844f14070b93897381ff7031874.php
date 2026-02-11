<?php
$Datatable
?>

<div class="container pb-5">
    <form class="actionMulti">
        <div class="card mt-5">
            <div class="card-header">
                <div class="d-flex flex-wrap justify-content-between align-items-center w-100 gap-8">
                    <!-- Table Info Section -->
                    <div class="table-info"></div>
                    <div class="d-flex flex-wrap gap-8">
                        <!-- Search Section -->
                        <?php $__env->startComponent('components.datatable_search', ['placeholder' => 'Search', 'searchField' => 'datatable_filter[search]']); ?> <?php echo $__env->renderComponent(); ?>
                        
                        <!-- Filters Dropdown -->
                        <?php $__env->startComponent('components.datatable_filters', ['filters' => $Datatable['filters'] ?? []]); ?> <?php echo $__env->renderComponent(); ?>
                        
                        <!-- Status Filter -->
                        <?php $__env->startComponent('components.datatable_select', ['name' => 'datatable_filter[status]', 'options' => $Datatable['status_filter']?? []  ]); ?> <?php echo $__env->renderComponent(); ?>
                        
                        <!-- Actions Dropdown -->
                        <?php $__env->startComponent('components.datatable_actions', ['actions' => $Datatable['actions'] ?? []]); ?> <?php echo $__env->renderComponent(); ?>
                    </div>
                </div>
            </div>
            
            <div class="card-body p-0 border-0">
                <?php if(!empty($Datatable['columns'])): ?>
                    <div class="table-responsive">
                        <!-- Table -->
                        <?php if(!isset($customTable) || !$customTable): ?>
                            <?php $__env->startComponent('components.datatable_table', ['element' => $Datatable['element'], 'columns' => $Datatable['columns'], 'url' => module_url('list')]); ?> <?php echo $__env->renderComponent(); ?>
                        <?php else: ?>
                            <?php echo e($slot); ?>

                        <?php endif; ?>
                        
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
</div><?php /**PATH /home/cotlas-socialxi/htdocs/socialxi.cotlas.net/resources/themes/app/pico/resources/views/components/datatable.blade.php ENDPATH**/ ?>