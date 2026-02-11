<?php $__env->startSection('sub_header'); ?>
    <?php if (isset($component)) { $__componentOriginal6bfd7fd5c294530066e0efb20ff4cd9a = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal6bfd7fd5c294530066e0efb20ff4cd9a = $attributes; } ?>
<?php $component = App\View\Components\SubHeader::resolve(['title' => ''.e(__('Frontend Theme Manager')).'','description' => ''.e(__('Easily manage and activate guest site themes.')).''] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('sub-header'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\SubHeader::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
        <div>
            <label for="file-upload" class="btn btn-primary btn-sm">
                <span class="me-1 mt-1 text-center"><i class="fa-light fa-file-import"></i></span> <?php echo e(__("Import")); ?>

            </label>
            <input id="file-upload" data-url="<?php echo e(module_url("import")); ?>" class="d-none" name="file" type="file" multiple="true" data-redirect="" />
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
<div class="container py-4">
    <div class="row g-4">
        <?php $__currentLoopData = $themes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $theme): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="col-md-4 mb-3">
            <div class="card hp-100 overflow-hidden border border-gray-300">
                <?php if(!empty($theme['preview']) && file_exists(base_path('resources/themes/guest/' . $theme['id'] . '/' . $theme['preview']))): ?>
                    <img src="<?php echo e(asset('resources/themes/guest/' . $theme['id'] . '/' . $theme['preview'])); ?>"
                         class="card-img-top h-220" style="object-fit:cover;">
                <?php else: ?>
                    <div style="height:160px;background:#f3f3f3;display:flex;align-items:center;justify-content:center;color:#bbb">
                        No Preview
                    </div>
                <?php endif; ?>
                <div class="card-body border-top">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <h5 class="card-title mb-0"><?php echo e($theme['name'] ?? $theme['id']); ?></h5>
                        <?php if(isset($activeTheme) && $activeTheme == $theme['id']): ?>
                            <span class="badge badge-pill badge-outline badge-sm badge-success ms-2"><?php echo e(__('Active')); ?></span>
                        <?php endif; ?>
                    </div>
                    <p class="card-text small mb-2 text-muted text-truncate-3"><?php echo e($theme['description'] ?? ''); ?></p>
                    <ul class="list-unstyled mb-3 small">
                        <?php if(!empty($theme['author'])): ?>
                            <li><strong><?php echo e(__('Author')); ?>:</strong> <?php echo e($theme['author']); ?></li>
                        <?php endif; ?>
                        <?php if(!empty($theme['version'])): ?>
                            <li><strong><?php echo e(__('Version')); ?>:</strong> <?php echo e($theme['version']); ?></li>
                        <?php endif; ?>
                    </ul>
                    <div class="mt-auto">
                        <?php if(!isset($activeTheme) || $activeTheme != $theme['id']): ?>
                            <a class="btn btn-dark w-100 actionItem" href="<?php echo e(module_url("set-default")); ?>" data-id="<?php echo e($theme['id']); ?>" data-redirect="">
                                <?php echo e(__('Use Theme')); ?>

                            </a>
                        <?php else: ?>
                            <button class="btn btn-outline-success w-100" disabled>
                                <?php echo e(__('Currently Actived')); ?>

                            </button>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/cotlas-socialxi/htdocs/socialxi.cotlas.net/modules/AdminFrontendThemes/resources/views/index.blade.php ENDPATH**/ ?>