<?php
    $unreadCount = \Notifier::getLatest(auth()->id())->whereNull('read_at')->count();
?>

<div class="d-flex">
    <div class="btn-group" container="body">
        <button type="button"
                class="bg-transparent dropdown-toggle dropdown-arrow-hide fs-18 text-dark position-relative bell-button"
                data-bs-toggle="dropdown" data-bs-auto-close="outside">
            <i class="fa-light fa-bell-on <?php echo e($unreadCount > 0?'animated-bell':''); ?>"></i>

            <?php if($unreadCount > 0): ?>
                <span class="position-absolute t-3 l-20 translate-middle badge rounded-pill badge-danger bounce size-16">
                    <?php echo e($unreadCount); ?>

                </span>
            <?php endif; ?>
        </button>
        <div class="dropdown-menu dropdown-menu-end border-1 border-gray-300 w-full max-w-380 py-0">
            <!-- Header -->
            <div class="d-flex justify-content-between align-items-center px-3 py-2 border-bottom">
                <div class="fw-5 fs-14">
                    <?php echo e(__('Notification')); ?>

                </div>
                <div class="fw-5 fs-14">
                    <a href="javascript:void(0);" class="btn btn-sm btn-icon btn-light btn-clear shrink-0 dropdown-close">
                        <i class="fa-duotone fa-xmark"></i>
                    </a>
                </div>
            </div>

            <!-- Tabs -->
            <div class="notif-list">
                <?php echo $__env->make('appnotifications::components.notification-items', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
            </div>

            <!-- Footer buttons -->
            <div class="d-flex justify-content-between align-items-center px-3 py-3 border-top gap-8">
                <a href="<?php echo e(route('app.notifications.markAllRead')); ?>"
                   class="btn btn-light btn-sm w-100 actionItem"
                   data-action="<?php echo e(route('app.notifications.markAllRead')); ?>"
                   data-type-message="text"
                   data-call-success="checkUnreads(result.count);"
                   data-content="notif-list">
                   <?php echo e(__('Mark all as read')); ?>

                </a>

                <a href="<?php echo e(route('app.notifications.archiveAll')); ?>"
                   class="btn btn-light btn-sm w-100 actionItem"
                   data-action="<?php echo e(route('app.notifications.archiveAll')); ?>"
                   data-type-message="text"
                   data-call-success="checkUnreads(result.count);"
                   data-content="notif-list">
                   <?php echo e(__('Archive all')); ?>

                </a>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
function checkUnreads(unreadCount) {
    let $badge = $(".bell-button .badge");
    let $icon  = $(".bell-button i");

    if (unreadCount > 0) {
        $badge.text(unreadCount).removeClass("d-none").addClass("bounce");
        $icon.addClass("animated-bell");
    } else {
        $badge.addClass("d-none").removeClass("bounce");
        $icon.removeClass("animated-bell");
    }
}
</script><?php /**PATH /home/cotlas-socialxi/htdocs/socialxi.cotlas.net/modules/AdminNotifications/resources/views/partials/header-item.blade.php ENDPATH**/ ?>