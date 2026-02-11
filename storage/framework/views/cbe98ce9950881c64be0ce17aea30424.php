<?php
    $notifications = \Notifier::getLatest(auth()->id(), 20);
    $unread = $notifications->whereNull('read_at');
?>

<div>
    <!-- Tabs -->
    <nav class="d-flex align-items-center justify-content-between border-bottom px-3">
        <div class="nav nav-tabs border-bottom-0" id="nav-tab" role="tablist">
            <button class="nav-link active" id="nav-unread-tab" data-bs-toggle="tab" data-bs-target="#notif-unread" type="button" role="tab">
                <?php echo e(__('Unread')); ?>

                <?php if($unread->count()): ?>
                    <span class="badge badge-danger badge-sm ms-1"><?php echo e($unread->count()); ?></span>
                <?php endif; ?>
            </button>
            <button class="nav-link" id="nav-all-tab" data-bs-toggle="tab" data-bs-target="#notif-all" type="button" role="tab">
                <?php echo e(__('All')); ?>

            </button>
        </div>
    </nav>

    <!-- Tab Content -->
    <div class="tab-content p-3 max-h-450 overflow-auto" id="nav-tabContent">
        <!-- Unread -->
        <div class="tab-pane fade show active" id="notif-unread" role="tabpanel">
            <?php $__empty_1 = true; $__currentLoopData = $unread; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <?php
                    $message = $item->source === 'manual'
                        ? optional($item->manual)->message
                        : $item->message;
                ?>
                <div class="border-bottom py-2 px-1">
                    <div class="d-flex justify-content-between">
                        <div class="fw-5 text-dark text-break">
                            <span class="badge badge-dark text-white h-20"><?php echo e(__('New')); ?></span>
                        	<span><?php echo nl2br(e($message)); ?></span>
                    	</div>
                        <a href="<?php echo e(route('app.notifications.markAsRead', $item->id)); ?>" data-id="<?php echo e($item->id); ?>" data-content="notif-list" class="min-w-20 min-h-20 max-h-20 size-20 b-r-50 d-flex align-items-center justify-content-center border border-1 bg-hover-success text-hover-white d-block actionItem" data-call-success="checkUnreads(result.count);"><i class="fa-solid fa-check"></i></a>
                    </div>
                    <?php if($item->url): ?>
                        <a href="<?php echo e($item->url); ?>" target="_blank" class="fs-12 text-primary d-block mt-1"> <?php echo e(__('View')); ?> &rarr; </a>
                    <?php endif; ?>
                    <div class="fs-12 text-muted mt-1"><?php echo e($item->created_at->diffForHumans()); ?></div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <div class="text-center text-muted py-3"><?php echo e(__('No unread notifications.')); ?></div>
            <?php endif; ?>
        </div>

        <!-- All -->
        <div class="tab-pane fade" id="notif-all" role="tabpanel">
            <?php $__empty_1 = true; $__currentLoopData = $notifications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <?php
                    $message = $item->source === 'manual'
                        ? optional($item->manual)->message
                        : $item->message;
                ?>
                <div class="border-bottom py-2 px-1">
                    <div class="fw-5 text-dark text-break">
                    	<?php if(is_null($item->read_at)): ?>
                            <span class="badge badge-dark text-white h-20"><?php echo e(__('New')); ?></span>
                        <?php endif; ?>
                        d
                    	<span><?php echo nl2br(e($message)); ?></span>
                	</div>
                    <?php if($item->url): ?>
                        <a href="<?php echo e($item->url); ?>" target="_blank" class="fs-12 text-primary d-block mt-1"> <?php echo e(__('View')); ?> &rarr; </a>
                    <?php endif; ?>
                    <div class="fs-12 text-muted mt-1"><?php echo e($item->created_at->diffForHumans()); ?></div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <div class="text-center text-muted py-3"><?php echo e(__('No notifications found.')); ?></div>
            <?php endif; ?>
        </div>
    </div>
</div>

<script>
	
</script><?php /**PATH /home/cotlas-socialxi/htdocs/socialxi.cotlas.net/modules/AppNotifications/resources/views/components/notification-items.blade.php ENDPATH**/ ?>