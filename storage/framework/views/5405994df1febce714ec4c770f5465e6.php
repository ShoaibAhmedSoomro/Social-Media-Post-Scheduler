<?php $__env->startSection('sub_header'); ?>
    <?php if (isset($component)) { $__componentOriginal6bfd7fd5c294530066e0efb20ff4cd9a = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal6bfd7fd5c294530066e0efb20ff4cd9a = $attributes; } ?>
<?php $component = App\View\Components\SubHeader::resolve(['title' => ''.e(__('Mail Templates')).'','description' => ''.e(__('Reusable email content layouts for system notifications.')).''] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
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
    <div class="accordion" id="mailTemplatesAccordion">
        <?php $accordionId = 1; ?>
        <?php $__currentLoopData = $allTemplates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $module => $templates): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php
                $moduleInfo = \Module::find($module);
                $module_path = $moduleInfo->getPath();
            ?>
            <?php $__currentLoopData = $templates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tpl): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php
                    $collapseId = "collapse{$accordionId}";
                    $headingId = "heading{$accordionId}";
                    $viewId = preg_replace('/[^\w]/', '_', $tpl['view']);
                    $viewPath = $module_path . '/resources/views/' . $tpl['view'] . '.blade.php';
                ?>

                <?php if(File::exists($viewPath)): ?>
                    <div class="accordion-item mb-2 border rounded-3">
                        <h2 class="accordion-header" id="<?php echo e($headingId); ?>">
                            <div class="accordion-button collapsed fw-bold btr-r-6 btl-r-6" type="button" data-bs-toggle="collapse" data-bs-target="#<?php echo e($collapseId); ?>" aria-expanded="false" aria-controls="<?php echo e($collapseId); ?>">
                                <div class="mb-0">
                                    <div class="fw-6 fs-14 text-gray-900"><?php echo e($tpl['name'] ?? ''); ?></div>
                                    <div class="fw-4 fs-12 text-gray-600"><?php echo e($tpl['description'] ?? ''); ?></div>
                                </div>
                            </div>
                        </h2>
                        <div id="<?php echo e($collapseId); ?>" class="accordion-collapse collapse" aria-labelledby="<?php echo e($headingId); ?>" data-bs-parent="#mailTemplatesAccordion">
                            <div class="accordion-body p-0">
                                <form class="actionForm" method="POST" action="<?php echo e(module_url("save_template")); ?>" data-confirm="<?php echo e(__('Please confirm that all information is correct and that you intend to proceed with the changes.')); ?>">

                                    <textarea id="ta-<?php echo e($viewId); ?>" name="content" class="form-control font-monospace template-content input-code min-h-500" rows="30" spellcheck="false"><?php echo File::get($viewPath); ?></textarea>
                                    <input type="hidden" name="view" value="<?php echo e($tpl['view']); ?>">

                                    <?php if(!empty($tpl['variables'])): ?>
                                    <div class="px-4 p-2 small text-muted">
                                        <span class="fw-6 fs-12"><?php echo e(__('Variables:')); ?></span>
                                        <?php $__currentLoopData = $tpl['variables']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $var): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <span class="badge badge-light border">&#123;&#123; $<?php echo e($var); ?> &#125;&#125;</span>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>
                                    <?php endif; ?>

                                    <div class="px-4 py-2 border-top">
                                        <button class="btn btn-success"><?php echo e(__("Save Changes")); ?></button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <?php $accordionId++; ?>
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('script'); ?>
<script type="text/javascript">
$('.accordion').on('shown.bs.collapse', function(e) {
    $(e.target).find('.input-code').each(function() {
        var editor = $(this).data('codemirror');
        if (editor) setTimeout(function() { editor.refresh(); }, 100);
    });
});
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/cotlas-socialxi/htdocs/socialxi.cotlas.net/modules/AdminMailTemplates/resources/views/index.blade.php ENDPATH**/ ?>