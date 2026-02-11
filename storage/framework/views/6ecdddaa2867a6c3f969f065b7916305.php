<?php $__env->startSection('sub_header'); ?>
    <?php if (isset($component)) { $__componentOriginal6bfd7fd5c294530066e0efb20ff4cd9a = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal6bfd7fd5c294530066e0efb20ff4cd9a = $attributes; } ?>
<?php $component = App\View\Components\SubHeader::resolve(['title' => ''.e(__('Mail Themes')).'','description' => ''.e(__('Customizable email layouts for consistent, branded communication.')).''] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
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

<div class="container py-4">
    <div class="row g-4">
        <?php $__currentLoopData = $themes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $theme): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-md-4">
                <div class="card hp-100 border border-gray-300 overflow-hidden">
                    <?php if(!empty($theme['preview'])): ?>
                        <img src="<?php echo e($theme['preview']); ?>" class="card-img-top" alt="<?php echo e(__('Theme Preview')); ?>" style="object-fit:cover;height:220px;">
                    <?php else: ?>
                        <div class="bg-light text-center py-5 fs-3 text-muted"><?php echo e(__('No preview')); ?></div>
                    <?php endif; ?>
                    <div class="card-body d-flex flex-column border-top">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <h5 class="card-title mb-0"><?php echo e($theme['info']['name'] ?? $theme['slug']); ?></h5>
                            <?php if(isset($active) && $active == $theme['slug']): ?>
                                <span class="badge badge-pill badge-outline badge-sm badge-success ms-2"><?php echo e(__('Active')); ?></span>
                            <?php endif; ?>
                        </div>
                        <p class="card-text small mb-2 text-muted text-truncate-3">
                            <?php echo e($theme['info']['description'] ?? __('No description')); ?>

                        </p>
                        <ul class="list-unstyled mb-3 small">
                            <?php if(!empty($theme['info']['author'])): ?>
                                <li><strong><?php echo e(__('Author')); ?>:</strong> <?php echo e($theme['info']['author']); ?></li>
                            <?php endif; ?>
                            <?php if(!empty($theme['info']['version'])): ?>
                                <li><strong><?php echo e(__('Version')); ?>:</strong> <?php echo e($theme['info']['version']); ?></li>
                            <?php endif; ?>
                            <li><strong><?php echo e(__('Slug')); ?>:</strong> <code><?php echo e($theme['slug']); ?></code></li>
                        </ul>
                        <div class="mt-auto">
                            <?php if(!isset($active) || $active != $theme['slug']): ?>
                                <a class="btn btn-dark w-100 actionItem" href="<?php echo e(module_url("set-default")); ?>" data-id="<?php echo e($theme['slug']); ?>" data-redirect="">
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

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/cotlas-socialxi/htdocs/socialxi.cotlas.net/modules/AdminMailThemes/resources/views/index.blade.php ENDPATH**/ ?>