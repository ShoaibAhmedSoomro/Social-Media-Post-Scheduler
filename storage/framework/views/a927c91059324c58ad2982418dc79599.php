<?php $__env->startSection('sub_header'); ?>
    <?php if (isset($component)) { $__componentOriginal6bfd7fd5c294530066e0efb20ff4cd9a = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal6bfd7fd5c294530066e0efb20ff4cd9a = $attributes; } ?>
<?php $component = App\View\Components\SubHeader::resolve(['title' => ''.e(__('Affiliate Reports')).'','description' => ''.e(__('Affiliate Reports provide insights into commission earnings and referral performance')).''] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('sub-header'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\SubHeader::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
        <a  href="<?php echo e(route("admin.affiliate.export_pdf")); ?>" class="btn btn-dark exportPDF"><?php echo e(__("Export PDF")); ?></a>
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
        <div class="d-flex align-items-center justify-content-between mb-4">
            <div></div>
            <div class="d-flex align-items-center justify-content-between gap-8">
                <select class="form-select ajax-pages-filter w-220" data-width="220" name="user_id" id="user_id" data-control="select2" data-ajax-url="<?php echo e(route('admin.users.search')); ?>" data-selected-id="">
                    <option value="-1"><?php echo e(__("All Affiliates")); ?></option>
                </select>

                <div>
                    <div class="daterange d-none bg-white b-r-4 fs-12 border-gray-300 border" data-open="left"></div>
                </div>
            </div>
        </div>

        <div class="ajax-pages" data-url="<?php echo e(route('admin.affiliate.statistics')); ?>" data-resp=".ajax-pages">
            
            <div class="pb-30 mt-200 ajax-scroll-loading">
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
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/cotlas-socialxi/htdocs/socialxi.cotlas.net/modules/AdminAffiliate/resources/views/index.blade.php ENDPATH**/ ?>