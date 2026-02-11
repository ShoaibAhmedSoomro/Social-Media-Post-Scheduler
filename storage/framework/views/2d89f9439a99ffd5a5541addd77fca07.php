<?php $__env->startSection('sub_header'); ?>
    <?php if (isset($component)) { $__componentOriginal6bfd7fd5c294530066e0efb20ff4cd9a = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal6bfd7fd5c294530066e0efb20ff4cd9a = $attributes; } ?>
<?php $component = App\View\Components\SubHeader::resolve(['title' => ''.e(__('AI Configuration')).'','description' => ''.e(__('Set up and customize your AI settings easily')).''] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
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
<div class="container max-w-800 pb-5">

    
    <div class="card shadow-none border-gray-300 mb-4">
        <div class="card-header fw-6">
            <?php echo e(__('Update & Import AI Models')); ?>

        </div>
        <div class="card-body">

            <div class="alert alert-primary mb-4" role="alert">
                <strong><?php echo e(__('Note:')); ?></strong>
                <?php echo e(__('You can update your AI models in two ways.')); ?><br>
                1. <?php echo e(__('Update directly from built-in providers (no files are uploaded or sent outside).')); ?><br>
                2. <?php echo e(__('Upload a JSON file manually (downloaded from our official website).')); ?><br>
                <em><?php echo e(__('Any models not listed in the new data will be removed from your database.')); ?></em>
            </div>

            <div class="mb-4">
                <h6 class="fw-bold mb-2"><?php echo e(__('Option 1: Update from Providers')); ?></h6>
                <p class="text-muted small mb-3">
                    <?php echo e(__('This will automatically fetch and update models from OpenAI, Gemini, Deepseek, Claude...')); ?><br>
                    <?php echo e(__('Safe: only updates database, no files are transferred.')); ?>

                </p>
                <form method="POST" action="<?php echo e(route('admin.ai-configuration.import-all')); ?>" class="actionForm" data-redirect="">
                    <?php echo csrf_field(); ?>
                    <button type="submit" class="btn btn-dark b-r-10 w-100"
                            data-confirm="<?php echo e(__('Are you sure you want to update and import AI models automatically? This will replace existing ones.')); ?>">
                        <i class="fal fa-sync-alt me-1"></i> <?php echo e(__('Update from Providers')); ?>

                    </button>
                </form>
            </div>

            <hr class="my-4">

            <div>
                <h6 class="fw-bold mb-2"><?php echo e(__('Option 2: Upload JSON File')); ?></h6>
                <p class="text-muted small mb-3">
                    <?php echo e(__('Download the latest AI models JSON file from our website, then upload it here to update your system.')); ?>

                    <br>
                    <a href="https://stackposts.com/ai_models.json" target="_blank">
                        <i class="fal fa-download me-1"></i><?php echo e(__('Download JSON file')); ?>

                    </a>
                </p>
                <form method="POST" action="<?php echo e(route('admin.ai-configuration.import-json')); ?>" 
                      class="actionForm" enctype="multipart/form-data" data-redirect="">
                    <?php echo csrf_field(); ?>
                    <div class="mb-3">
                        <input type="file" name="json_file" class="form-control" accept=".json,.txt" required>
                    </div>
                    <button type="submit" class="btn btn-danger b-r-10 w-100"
                            data-confirm="<?php echo e(__('Are you sure you want to upload and import models from JSON file? This will replace existing ones.')); ?>">
                        <i class="fal fa-upload me-1"></i> <?php echo e(__('Upload & Import JSON File')); ?>

                    </button>
                </form>
            </div>

        </div>
    </div>

    <form class="actionForm" action="<?php echo e(url_admin('settings/save')); ?>">

        
        <div class="card shadow-none border-gray-300 mb-4 ">
            <div class="card-header fw-6"><?php echo e(__('General configuration')); ?></div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 mb-4">
                        <label class="form-label"><?php echo e(__('Status')); ?></label>
                        <select class="form-select" name="ai_status">
                            <option value="1" <?php echo e(get_option('ai_status', 1) == 1 ? 'selected' : ''); ?>>
                                <?php echo e(__('Enable')); ?>

                            </option>
                            <option value="0" <?php echo e(get_option('ai_status', 1) == 0 ? 'selected' : ''); ?>>
                                <?php echo e(__('Disable')); ?>

                            </option>
                        </select>
                    </div>

                    
                    <div class="col-md-6 mb-4">
                        <label class="form-label"><?php echo e(__('Default Language')); ?></label>

                        <?php
                            // Normalize whatever languages() returns to a flat [code => label] array of strings
                            $langs = languages();
                            if ($langs instanceof \Illuminate\Support\Collection) {
                                $langs = $langs->toArray();
                            }
                            $normalizeLabel = function ($v, $code) {
                                if (is_string($v)) return $v;
                                if (is_array($v)) {
                                    // common possible keys
                                    foreach (['name','label','native','title'] as $k) {
                                        if (!empty($v[$k]) && is_string($v[$k])) return $v[$k];
                                    }
                                    // last resort: join any stringy bits
                                    $parts = array_filter($v, fn ($i) => is_string($i) && $i !== '');
                                    if (!empty($parts)) return implode(' / ', array_unique($parts));
                                }
                                // absolute fallback: show the code
                                return (string) $code;
                            };
                            $current = (string) get_option('ai_language', 'en-US');
                        ?>

                        <select class="form-select" name="ai_language">
                            <?php $__currentLoopData = $langs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $code => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php $text = $normalizeLabel($label, $code); ?>
                                <option value="<?php echo e($code); ?>" <?php echo e($current === (string) $code ? 'selected' : ''); ?>>
                                    <?php echo e($text); ?>

                                </option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>

                    
                    <div class="col-md-6 mb-4">
                        <label class="form-label"><?php echo e(__('Default Tone Of Voice')); ?></label>
                        <select class="form-select" name="ai_tone_of_voice">
                            <?php $__currentLoopData = tone_of_voices(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($key); ?>" <?php echo e(get_option('ai_tone_of_voice', 'Friendly') == $key ? 'selected' : ''); ?>>
                                    <?php echo e($value); ?>

                                </option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>

                    
                    <div class="col-md-6 mb-4">
                        <label class="form-label"><?php echo e(__('Default Creativity')); ?></label>
                        <select class="form-select" name="ai_creativity">
                            <?php $__currentLoopData = ai_creativity(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($key); ?>" <?php echo e(get_option('ai_creativity', 0) == $key ? 'selected' : ''); ?>>
                                    <?php echo e($value); ?>

                                </option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>

                    
                    <div class="col-md-6 mb-4">
                        <label class="form-label"><?php echo e(__('Maximum Input Length')); ?></label>
                        <input type="number" class="form-control" name="ai_max_input_lenght"
                               value="<?php echo e(get_option('ai_max_input_lenght', 100)); ?>">
                    </div>
                    <div class="col-md-6 mb-4">
                        <label class="form-label"><?php echo e(__('Maximum Output Length')); ?></label>
                        <input type="number" class="form-control" name="ai_max_output_lenght"
                               value="<?php echo e(get_option('ai_max_output_lenght', 1000)); ?>">
                    </div>
                </div>
            </div>
        </div>

        
        <div class="card shadow-none border-gray-300 mb-4">
            <div class="card-header fw-6"><?php echo e(__('Default AI Platform')); ?></div>
            <div class="card-body">
                <div class="row">
                    <?php
                        $labels = [
                            'openai'   => 'OpenAI',
                            'gemini'   => 'Gemini',
                            'claude'   => 'Claude',
                            'deepseek' => 'DeepSeek',
                        ];
                    ?>

                    
                    <?php if(!empty($platformsByCategory['text'])): ?>
                        <div class="col-md-6 mb-4">
                            <label class="form-label"><?php echo e(__('Text')); ?></label>
                            <select class="form-select" name="ai_platform">
                                <?php $__currentLoopData = $platformsByCategory['text']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($p); ?>" <?php echo e(get_option('ai_platform', 'openai') == $p ? 'selected' : ''); ?>>
                                        <?php echo e($labels[$p] ?? ucfirst($p)); ?>

                                    </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    <?php endif; ?>

                    
                    <?php if(!empty($platformsByCategory['image'])): ?>
                        <div class="col-md-6 mb-4">
                            <label class="form-label"><?php echo e(__('Image')); ?></label>
                            <select class="form-select" name="ai_platform_image">
                                <?php $__currentLoopData = $platformsByCategory['image']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($p); ?>" <?php echo e(get_option('ai_platform_image', 'openai') == $p ? 'selected' : ''); ?>>
                                        <?php echo e($labels[$p] ?? ucfirst($p)); ?>

                                    </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        
        <?php $__currentLoopData = $providers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $providerKey => $providerName): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="card shadow-none border-gray-300 mb-4">
                <div class="card-header fw-6"><?php echo e(__($providerName)); ?></div>
                <div class="card-body">
                    
                    <div class="mb-4">
                        <label class="form-label"><?php echo e(__('API Key')); ?></label>
                        <input type="text" class="form-control"
                               name="ai_<?php echo e($providerKey); ?>_api_key"
                               value="<?php echo e(get_option("ai_{$providerKey}_api_key", '')); ?>"
                               placeholder="<?php echo e(__('Enter API Key')); ?>">
                    </div>

                    
                    <?php $__currentLoopData = $categoryOrder; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php
                            $items = $models[$providerKey][$category] ?? collect();
                        ?>
                        <?php if($items->isNotEmpty()): ?>
                            <div class="mb-4">
                                <label class="form-label">
                                    <?php echo e(__('Default Model for :category', ['category' => $categoryLabels[$category] ?? ucfirst($category)])); ?>

                                </label>
                                <select class="form-select" name="ai_<?php echo e($providerKey); ?>_model_<?php echo e($category); ?>">
                                    <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($item->model_key); ?>"
                                            <?php echo e(get_option("ai_{$providerKey}_model_{$category}") == $item->model_key ? 'selected' : ''); ?>>
                                            <?php echo e($item->name); ?>

                                        </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        
        <div class="mt-4">
            <button type="submit" class="btn btn-dark b-r-10 w-100">
                <?php echo e(__('Save changes')); ?>

            </button>
        </div>
    </form>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/cotlas-socialxi/htdocs/socialxi.cotlas.net/modules/AdminAIConfiguration/resources/views/index.blade.php ENDPATH**/ ?>