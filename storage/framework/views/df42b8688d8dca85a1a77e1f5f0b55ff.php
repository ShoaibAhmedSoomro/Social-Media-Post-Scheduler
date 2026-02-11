<?php $__env->startSection('sub_header'); ?>
    <?php if (isset($component)) { $__componentOriginal6bfd7fd5c294530066e0efb20ff4cd9a = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal6bfd7fd5c294530066e0efb20ff4cd9a = $attributes; } ?>
<?php $component = App\View\Components\SubHeader::resolve(['title' => ''.e(__('URL Shorteners Configuration')).'','description' => ''.e(__('Optimize, manage, and customize shortened link settings')).''] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
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

<?php
    $URLShorteners = URLShortener::getPlatforms();
?>

<div class="container max-w-800 pb-5">
    <form class="actionForm" action="<?php echo e(url_admin("settings/save")); ?>">
        <div class="card shadow-none border-gray-300 mb-4">
            <div class="card-header">
                <div class="fw-6"><?php echo e(__("General configuration")); ?></div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="mb-4">
                            <label for="name" class="form-label"><?php echo e(__('URL Shortener Platform')); ?></label>
                            <select class="form-select" name="url_shorteners_platform">
                                    <option value="0" <?php echo e(get_option("url_shorteners_platform", 0)==0?"selected":""); ?> ><?php echo e(__("Disable")); ?></option>
                                <?php $__currentLoopData = $URLShorteners; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($key); ?>" <?php echo e(get_option("url_shorteners_platform", 0)==$key?"selected":""); ?> ><?php echo e(__($value)); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card shadow-none border-gray-300 mb-4">
            <div class="card-header">
                <div class="fw-6"><?php echo e(__("Short.io")); ?></div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="mb-4">
                            <label class="form-label"><?php echo e(__('Status')); ?></label>
                            <div class="d-flex gap-8 flex-column flex-lg-row flex-md-column">
                                <div class="form-check me-3">
                                    <input class="form-check-input" type="radio" name="shortio_status" value="1" id="shortio_status_1" <?php echo e(get_option("shortio_status", 0)==1?"checked":""); ?>>
                                    <label class="form-check-label mt-1" for="shortio_status_1">
                                        <?php echo e(__('Enable')); ?>

                                    </label>
                                </div>
                                <div class="form-check me-3">
                                    <input class="form-check-input" type="radio" name="shortio_status" value="0" id="shortio_status_0"<?php echo e(get_option("shortio_status", 0)==0?"checked":""); ?>>
                                    <label class="form-check-label mt-1" for="shortio_status_0">
                                        <?php echo e(__('Disable')); ?>

                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="mb-4">
                            <label for="shortio_api_key" class="form-label"><?php echo e(__('API Key')); ?></label>
                            <input class="form-control" name="shortio_api_key" id="shortio_api_key" type="text" value="<?php echo e(get_option("shortio_api_key", "")); ?>">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="mb-4">
                            <label for="shortio_domain" class="form-label"><?php echo e(__('Domain')); ?></label>
                            <input class="form-control" name="shortio_domain" id="shortio_domain" type="text" value="<?php echo e(get_option("shortio_domain", "")); ?>">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card shadow-none border-gray-300 mb-4">
            <div class="card-header">
                <div class="fw-6"><?php echo e(__("Bitly")); ?></div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="mb-4">
                            <label class="form-label"><?php echo e(__('Status')); ?></label>
                            <div class="d-flex gap-8 flex-column flex-lg-row flex-md-column">
                                <div class="form-check me-3">
                                    <input class="form-check-input" type="radio" name="bitly_status" value="1" id="bitly_status_1" <?php echo e(get_option("bitly_status", 0)==1?"checked":""); ?>>
                                    <label class="form-check-label mt-1" for="bitly_status_1">
                                        <?php echo e(__('Enable')); ?>

                                    </label>
                                </div>
                                <div class="form-check me-3">
                                    <input class="form-check-input" type="radio" name="bitly_status" value="0" id="bitly_status_0"<?php echo e(get_option("bitly_status", 0)==0?"checked":""); ?>>
                                    <label class="form-check-label mt-1" for="bitly_status_0">
                                        <?php echo e(__('Disable')); ?>

                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="mb-4">
                            <label for="bitly_api_key" class="form-label"><?php echo e(__('API Token')); ?></label>
                            <input class="form-control" name="bitly_api_key" id="bitly_api_key" type="text" value="<?php echo e(get_option("bitly_api_key", "")); ?>">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card shadow-none border-gray-300 mb-4">
            <div class="card-header">
                <div class="fw-6"><?php echo e(__("TinyURL")); ?></div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="mb-4">
                            <label class="form-label"><?php echo e(__('Status')); ?></label>
                            <div class="d-flex gap-8 flex-column flex-lg-row flex-md-column">
                                <div class="form-check me-3">
                                    <input class="form-check-input" type="radio" name="tinyurl_status" value="1" id="tinyurl_status_1" <?php echo e(get_option("tinyurl_status", 0)==1?"checked":""); ?>>
                                    <label class="form-check-label mt-1" for="tinyurl_status_1">
                                        <?php echo e(__('Enable')); ?>

                                    </label>
                                </div>
                                <div class="form-check me-3">
                                    <input class="form-check-input" type="radio" name="tinyurl_status" value="0" id="tinyurl_status_0"<?php echo e(get_option("tinyurl_status", 0)==0?"checked":""); ?>>
                                    <label class="form-check-label mt-1" for="tinyurl_status_0">
                                        <?php echo e(__('Disable')); ?>

                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="mb-4">
                            <label for="tinyurl_api_key" class="form-label"><?php echo e(__('API Key')); ?></label>
                            <input class="form-control" name="tinyurl_api_key" id="tinyurl_api_key" type="text" value="<?php echo e(get_option("tinyurl_api_key", "")); ?>">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card shadow-none border-gray-300 mb-4">
            <div class="card-header">
                <div class="fw-6"><?php echo e(__("Rebrandly")); ?></div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="mb-4">
                            <label class="form-label"><?php echo e(__('Status')); ?></label>
                            <div class="d-flex gap-8 flex-column flex-lg-row flex-md-column">
                                <div class="form-check me-3">
                                    <input class="form-check-input" type="radio" name="rebrandly_status" value="1" id="rebrandly_status_1" <?php echo e(get_option("rebrandly_status", 0)==1?"checked":""); ?>>
                                    <label class="form-check-label mt-1" for="rebrandly_status_1">
                                        <?php echo e(__('Enable')); ?>

                                    </label>
                                </div>
                                <div class="form-check me-3">
                                    <input class="form-check-input" type="radio" name="rebrandly_status" value="0" id="rebrandly_status_0"<?php echo e(get_option("rebrandly_status", 0)==0?"checked":""); ?>>
                                    <label class="form-check-label mt-1" for="rebrandly_status_0">
                                        <?php echo e(__('Disable')); ?>

                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="mb-4">
                            <label for="rebrandly_api_key" class="form-label"><?php echo e(__('API Key')); ?></label>
                            <input class="form-control" name="rebrandly_api_key" id="rebrandly_api_key" type="text" value="<?php echo e(get_option("rebrandly_api_key", "")); ?>">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="mb-4">
                            <label for="rebrandly_domain" class="form-label"><?php echo e(__('Domain')); ?></label>
                            <input class="form-control" name="rebrandly_domain" id="rebrandly_domain" type="text" value="<?php echo e(get_option("rebrandly_domain", "rebrand.ly")); ?>">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card shadow-none border-gray-300 mb-4">
            <div class="card-header">
                <div class="fw-6"><?php echo e(__("Slimu.in")); ?></div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="mb-4">
                            <label class="form-label"><?php echo e(__('Status')); ?></label>
                            <div class="d-flex gap-8 flex-column flex-lg-row flex-md-column">
                                <div class="form-check me-3">
                                    <input class="form-check-input" type="radio" name="slimu_status" value="1" id="slimu_status_1" <?php echo e(get_option("slimu_status", 0)==1?"checked":""); ?>>
                                    <label class="form-check-label mt-1" for="slimu_status_1">
                                        <?php echo e(__('Enable')); ?>

                                    </label>
                                </div>
                                <div class="form-check me-3">
                                    <input class="form-check-input" type="radio" name="slimu_status" value="0" id="slimu_status_0" <?php echo e(get_option("slimu_status", 0)==0?"checked":""); ?>>
                                    <label class="form-check-label mt-1" for="slimu_status_0">
                                        <?php echo e(__('Disable')); ?>

                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="mb-4">
                            <label for="slimu_api_key" class="form-label"><?php echo e(__('API Key')); ?></label>
                            <input class="form-control" name="slimu_api_key" id="slimu_api_key" type="text" value="<?php echo e(get_option("slimu_api_key", "")); ?>">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-4">
            <button type="submit" class="btn btn-dark b-r-10 w-100">
                <?php echo e(__('Save changes')); ?>

            </button>
        </div>

    </form>

</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/cotlas-socialxi/htdocs/socialxi.cotlas.net/modules/AdminURLShorteners/resources/views/index.blade.php ENDPATH**/ ?>