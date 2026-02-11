<?php $__env->startSection('sub_header'); ?>
    <?php if (isset($component)) { $__componentOriginal6bfd7fd5c294530066e0efb20ff4cd9a = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal6bfd7fd5c294530066e0efb20ff4cd9a = $attributes; } ?>
<?php $component = App\View\Components\SubHeader::resolve(['title' => ''.e(__('Mail Server')).'','description' => ''.e(__('Configure and manage your email server settings')).''] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
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
    
<div class="container pb-5">
    <div class="row">
        <div class="col-md-6">
            
            <form class="actionForm mb-4" action="<?php echo e(url_admin("settings/save")); ?>">
                <div class="card shadow-none border-gray-300 mb-4">
                    <div class="card-header">
                        <div class="fw-5">
                            <?php echo e(__("General settings")); ?>

                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-4">
                                    <label class="form-label"><?php echo e(__('Email Protocol')); ?></label>
                                    <div class="d-flex gap-8 flex-column flex-lg-row flex-md-column">
                                        <div class="form-check me-3">
                                            <input class="form-check-input" type="radio" name="mail_protocol" value="mail" id="mail_protocol_mai" <?php echo e(get_option("mail_protocol", "mail")=="mail"?"checked":""); ?>>
                                            <label class="form-check-label mt-1" for="mail_protocol_mai">
                                                <?php echo e(__('Mail')); ?>

                                            </label>
                                        </div>
                                        <div class="form-check me-3">
                                            <input class="form-check-input" type="radio" name="mail_protocol" value="smtp" id="mail_protocol_smtp"<?php echo e(get_option("mail_protocol", "mail")=="smtp"?"checked":""); ?>>
                                            <label class="form-check-label mt-1" for="mail_protocol_smtp">
                                                <?php echo e(__('SMTP')); ?>

                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-4">
                                    <label for="name" class="form-label"><?php echo e(__('Sender Email')); ?></label>
                                    <input class="form-control" name="mail_sender_email" id="mail_sender_email" type="text" value="<?php echo e(get_option("mail_sender_email", "example@gmail.com")); ?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-4">
                                    <label for="name" class="form-label"><?php echo e(__('Sender Name')); ?></label>
                                    <input class="form-control" name="mail_sender_name" id="mail_sender_name" type="text" value="<?php echo e(get_option("mail_sender_name", "Admin")); ?>">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card shadow-none border-gray-300 mb-4">
                    <div class="card-header">
                        <div class="fw-5">
                            <?php echo e(__("SMTP Settings")); ?>

                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-4">
                                    <label for="smtp_server" class="form-label"><?php echo e(__('SMTP Server')); ?></label>
                                    <input class="form-control" name="smtp_server" id="smtp_server" type="text" value="<?php echo e(get_option("smtp_server", "")); ?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-4">
                                    <label for="smtp_username" class="form-label"><?php echo e(__('SMTP Username')); ?></label>
                                    <input class="form-control" name="smtp_username" id="smtp_username" type="text" value="<?php echo e(get_option("smtp_username", "")); ?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-4">
                                    <label for="smtp_password" class="form-label"><?php echo e(__('SMTP Password')); ?></label>
                                    <input class="form-control" name="smtp_password" id="smtp_password" type="text" value="<?php echo e(get_option("smtp_password", "")); ?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-4">
                                    <label for="smtp_port" class="form-label"><?php echo e(__('SMTP Port')); ?></label>
                                    <input class="form-control" name="smtp_port" id="smtp_port" type="text" value="<?php echo e(get_option("smtp_port", "")); ?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-4">
                                    <label for="smtp_encryption" class="form-label"><?php echo e(__('SMTP Encryption')); ?></label>
                                    <select class="form-select" name="smtp_encryption">
                                        <option value="NONE" <?php echo e(get_option("smtp_encryption", "TLS")=="NONE"?"selected":""); ?>><?php echo e(__("NONE")); ?></option>
                                        <option value="TLS" <?php echo e(get_option("smtp_encryption", "TLS")=="TLS"?"selected":""); ?>><?php echo e(__("TLS")); ?></option>
                                        <option value="SSL" <?php echo e(get_option("smtp_encryption", "TLS")=="SSL"?"selected":""); ?>><?php echo e(__("SSL")); ?></option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mt-0">
                    <button type="submit" class="btn btn-dark b-r-10 w-100">
                        <?php echo e(__('Save changes')); ?>

                    </button>
                </div>

            </form>

        </div>

        <div class="col-md-6">
            <form class="actionForm mb-4" action="<?php echo e(route('admin.mail-server.test')); ?>">
                <div class="card shadow-none border-gray-300 mb-4">
                    <div class="card-header">
                        <div class="fw-5">
                            <?php echo e(__("Test Send Email")); ?>

                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-0">
                                    <label for="test_email" class="form-label"><?php echo e(__('Test Email')); ?></label>
                                    <input class="form-control" name="test_email" id="test_email" type="text" placeholder="<?php echo e(__('Recipient email address')); ?>">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-4">
                    <button type="submit" class="btn btn-outline btn-info b-r-10 w-100">
                        <?php echo e(__('Send now')); ?>

                    </button>
                </div>

            </form>
        </div>
    </div>

</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/cotlas-socialxi/htdocs/socialxi.cotlas.net/modules/AdminMailServer/resources/views/index.blade.php ENDPATH**/ ?>