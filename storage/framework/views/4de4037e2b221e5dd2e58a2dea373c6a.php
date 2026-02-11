<?php $__env->startSection('sub_header'); ?>
    <?php if (isset($component)) { $__componentOriginal6bfd7fd5c294530066e0efb20ff4cd9a = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal6bfd7fd5c294530066e0efb20ff4cd9a = $attributes; } ?>
<?php $component = App\View\Components\SubHeader::resolve(['title' => ''.e(__('AI Contents')).'','description' => ''.e(__('AI tools for efficient and creative content generation')).''] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
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
    <div class="container px-4 pb-5">
        <div class="d-flex gap-0 max-h-800 min-h-600 hp-100 b-r-6 border border-gray-300 bg-white">
            <div class="ai-cate col d-none d-lg-block border-end">
                <div class="d-flex flex-column flex-fill hp-100">
                    <div class="d-flex justify-content-between align-items-center p-3 border-bottom position-relative zIndex-3">
                        <div class="fs-16 fw-5"><?php echo e(__("AI Templates")); ?></div>
                        <div class="d-block d-lg-none">
                            <div class="btn btn-icon btn-sm btn-light btn-hover-danger b-r-50 a-rotate closeAICate">
                                <i class="fa-light fa-xmark"></i>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex flex-column flex-column-fluid overflow-y-auto p-3 fs-12 hp-100 position-relative ai-template-data ajax-pages" data-url="<?php echo e(module_url("categories")); ?>" data-resp=".ai-template-data">
                        <div class="w-100 d-flex justify-content-center mt-120 fs-50 text-gray-600">
                            <i class="fa-light fa-loader fa-spin"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="ai-form col d-flex d-lg-block flex-column">
                <div class="d-flex flex-column flex-column-fluid ">
                    <div class="d-flex justify-content-between align-items-center p-3 border-bottom position-relative zIndex-3 d-block d-lg-none">
                        <div class="fs-16 fw-5"><i class="fal fa-lightbulb"></i> <?php echo e(__("AI Content Generation")); ?></div>

                        <div>
                            <a class="btn btn-outline btn-info btn-sm openAICate" href="javascript:void(0);">
                                <span><?php echo e(__('Templates')); ?></span>
                            </a>
                        </div>
                    </div>
                    <form class="p-4 actionForm" action="<?php echo e(module_url("process")); ?>" data-content="ai-result-data" method="POST" data-call-success="AIContent.openResult();">
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label class="form-label"><?php echo e(__("Your prompt")); ?></label>
                                <textarea class="form-control p-2" rows ="4" name="prompt"></textarea>
                            </div>

                            <?php echo $__env->make("appaicontents::options", [
                                "hashtags" => true,
                                "total_result" => true,
                            ], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

                            <div class="col-md-12">
                                <button type="submit" class="btn btn-dark b-r-50 px-4"><?php echo e(__("Generate")); ?></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="ai-result col d-none d-lg-block border-start ai-result-data">
                <div class="d-flex flex-column flex-fill hp-100">
                    <div class="d-flex justify-content-between align-items-center p-3 border-bottom position-relative zIndex-3">
                        <div class="fs-16 fw-5"><?php echo e(__("Get started")); ?></div>
                        <div class="d-block d-lg-none">
                            <div class="btn btn-icon btn-sm btn-light btn-hover-danger b-r-50 a-rotate closeAIResult">
                                <i class="fa-light fa-xmark"></i>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex flex-column flex-column-fluid overflow-y-auto p-3 fs-14 hp-100 position-relative">
                        <div class="mb-3">
                            <?php echo e(__("Start by choosing a prompt from the Prompt Templates panel on the left. You can either use the random prompt button or create one manually.")); ?>

                        </div>
                        <div class="mb-3">
                            <?php echo e(__("Craft or modify your prompt to specify the desired AI output. Click the Generate button to start the generation process.")); ?>

                        </div>
                        <div class="mb-3">
                            <?php echo e(__("Results have been generated for your prompt.")); ?>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/cotlas-socialxi/htdocs/socialxi.cotlas.net/modules/AppAIContents/resources/views/index.blade.php ENDPATH**/ ?>