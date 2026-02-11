<?php $__env->startSection('sub_header'); ?>
    <?php if (isset($component)) { $__componentOriginal6bfd7fd5c294530066e0efb20ff4cd9a = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal6bfd7fd5c294530066e0efb20ff4cd9a = $attributes; } ?>
<?php $component = App\View\Components\SubHeader::resolve(['title' => ''.e(__('CAPTCHA Settings')).'','description' => ''.e(__('Configure bot protection using captcha verification and options')).''] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
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
    <form class="actionForm" action="<?php echo e(url_admin("settings/save")); ?>">
        <div class="card shadow-none border-gray-300 mb-4">
            <div class="card-header">
                <div class="fw-6"><?php echo e(__("General configuration")); ?></div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="mb-4">
                            <label for="captcha_type" class="form-label"><?php echo e(__('CAPTCHA Type')); ?></label>
                            <select class="form-select" name="captcha_type" id="captcha_type">
                                <option value="disable" <?php echo e(get_option('captcha_type', 'disable') == 'disable' ? 'selected' : ''); ?>><?php echo e(__("Disable")); ?></option>
                                <option value="recaptcha" <?php echo e(get_option('captcha_type', 'disable') == 'recaptcha' ? 'selected' : ''); ?>><?php echo e(__("Google reCaptcha V2")); ?></option>
                                <option value="turnstile" <?php echo e(get_option('captcha_type', 'disable') == 'turnstile' ? 'selected' : ''); ?>><?php echo e(__("Cloudflare Turnstile")); ?></option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card shadow-none border-gray-300 mb-4">
            <div class="card-header">
                <div class="fw-6"><?php echo e(__("Google reCaptcha V2")); ?></div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="mb-4">
                            <label class="form-label"><?php echo e(__('Status')); ?></label>
                            <div class="d-flex gap-8 flex-column flex-lg-row flex-md-column">
                                <div class="form-check me-3">
                                    <input class="form-check-input" type="radio" name="auth_google_recaptcha_status" value="1" id="auth_google_recaptcha_status_1" <?php echo e(get_option("auth_google_recaptcha_status", 1)==1?"checked":""); ?>>
                                    <label class="form-check-label mt-1" for="auth_google_recaptcha_status_1">
                                        <?php echo e(__('Enable')); ?>

                                    </label>
                                </div>
                                <div class="form-check me-3">
                                    <input class="form-check-input" type="radio" name="auth_google_recaptcha_status" value="0" id="auth_google_recaptcha_status_0"<?php echo e(get_option("auth_google_recaptcha_status", 1)==0?"checked":""); ?>>
                                    <label class="form-check-label mt-1" for="auth_google_recaptcha_status_0">
                                        <?php echo e(__('Disable')); ?>

                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>                                       
                    <div class="col-md-12">
                        <div class="mb-4">
                            <label for="name" class="form-label"><?php echo e(__('Google site key')); ?></label>
                            <input placeholder="<?php echo e(__('Enter API Key')); ?>" class="form-control" name="auth_google_recaptcha_site_key" id="auth_google_recaptcha_site_key" type="text" value="<?php echo e(get_option("auth_google_recaptcha_site_key", "")); ?>">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="mb-4">
                            <label for="name" class="form-label"><?php echo e(__('Google secret key')); ?></label>
                            <input placeholder="<?php echo e(__('Enter API Key')); ?>" class="form-control" name="auth_google_recaptcha_secret_key" id="auth_google_recaptcha_secret_key" type="text" value="<?php echo e(get_option("auth_google_recaptcha_secret_key", "")); ?>">
                        </div>
                    </div>                                      
                </div>
            </div>
        </div>
        <div class="card shadow-none border-gray-300 mb-4">
            <div class="card-header">
                <div class="fw-6"><?php echo e(__("Cloudflare Turnstile")); ?></div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="mb-4">
                            <label class="form-label"><?php echo e(__('Status')); ?></label>
                            <div class="d-flex gap-8 flex-column flex-lg-row flex-md-column">
                                <div class="form-check me-3">
                                    <input class="form-check-input" type="radio" name="auth_cloudflare_turnstile_status" value="1" id="auth_cloudflare_turnstile_status_1" <?php echo e(get_option("auth_cloudflare_turnstile_status_status", 1)==1?"checked":""); ?>>
                                    <label class="form-check-label mt-1" for="auth_cloudflare_turnstile_status_1">
                                        <?php echo e(__('Enable')); ?>

                                    </label>
                                </div>
                                <div class="form-check me-3">
                                    <input class="form-check-input" type="radio" name="auth_cloudflare_turnstile_status" value="0" id="auth_cloudflare_turnstile_status_0"<?php echo e(get_option("auth_cloudflare_turnstile_status", 1)==0?"checked":""); ?>>
                                    <label class="form-check-label mt-1" for="auth_cloudflare_turnstile_status_0">
                                        <?php echo e(__('Disable')); ?>

                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>                                       
                    <div class="col-md-12">
                        <div class="mb-4">
                            <label for="name" class="form-label"><?php echo e(__('Cloudflare site key')); ?></label>
                            <input placeholder="<?php echo e(__('Enter API Key')); ?>" class="form-control" name="auth_cloudflare_turnstile_site_key" id="auth_cloudflare_turnstile_site_key" type="text" value="<?php echo e(get_option("auth_cloudflare_turnstile_site_key", "")); ?>">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="mb-4">
                            <label for="name" class="form-label"><?php echo e(__('Cloudflare secret key')); ?></label>
                            <input placeholder="<?php echo e(__('Enter API Key')); ?>" class="form-control" name="auth_cloudflare_turnstile_secret_key" id="auth_cloudflare_turnstile_secret_key" type="text" value="<?php echo e(get_option("auth_cloudflare_turnstile_secret_key", "")); ?>">
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
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/cotlas-socialxi/htdocs/socialxi.cotlas.net/modules/AdminCaptcha/resources/views/index.blade.php ENDPATH**/ ?>