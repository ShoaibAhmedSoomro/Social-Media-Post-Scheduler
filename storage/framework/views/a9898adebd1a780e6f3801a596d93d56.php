

<?php $__env->startSection('content'); ?>

    <?php
    $user = Auth::user();
    $user_id = $user->id;
    ?>

    <div class="container pb-5 mb-5 hp-100 position-relative">

        <nav aria-label="breadcrumb" class="mb-3 mt-3">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="<?php echo e(module_url("")); ?>" class="text-gray-500 fs-12 fw-5 text-hover-primary">
                        <span><i class="fa-light fa-angle-left"></i></span>
                        <span><?php echo e(__("View All Tickets")); ?></span>
                    </a>
                </li>
            </ol>
        </nav>

        <div class="m2 mb-5">
            <div class="d-flex flex-column flex-lg-row flex-md-column align-items-md-start align-items-lg-center justify-content-between">
                <div class="my-3 d-flex flex-column gap-8">
                    <div>
                        <?php if($ticket->status == 1): ?>
                            <span class="badge badge-outline badge-sm badge-primary"><i class="fa-light fa-door-open pe-2"></i><?php echo e(__("Open")); ?></span>
                        <?php elseif($ticket->status == 2): ?>
                            <span class="badge badge-outline badge-sm badge-success"><i class="fa-light fa-circle-check pe-2"></i><?php echo e(__("Resolved")); ?></span>
                        <?php else: ?>
                            <span class="badge badge-outline badge-sm badge-dark"><i class="fa-light fa-lock pe-2"></i><?php echo e(__("Closed")); ?></span>
                        <?php endif; ?>
                    </div>
                    <h1 class="fs-20 font-medium lh-1 text-gray-900">
                        <span><?php echo e($ticket->title); ?></span>
                    </h1>
                    <div class="fs-11 text-gray-600">
                        <div class="d-flex align-items-center gap-8">
                            <span><?php echo e($ticket->category_name); ?></span>
                            <span class="size-4 d-block border b-r-50 bg-gray-400"></span>
                            <span><?php echo e(sprintf( __("%s replies") , $ticket->total_comment)); ?></span>
                        </div>
                    </div>
                </div>

                <div class="d-flex gap-8">
                    <?php if($ticket->status == 2): ?>
                    <a class="btn btn-success btn-sm actionItem" data-id="<?php echo e($ticket->id_secure); ?>" href="<?php echo e(module_url("status/resolved")); ?>" data-redirect="<?php echo e(route('admin.support.ticket', $ticket->id_secure)); ?>">
                        <span><i class="fa-light fa-circle-check"></i></span>
                        <span><?php echo e(__("Resolved")); ?></span>
                    </a>
                    <?php endif; ?>
                    <div class="d-flex">
                        <div class="btn-group">
                            <button class="btn btn-outline btn-primary btn-sm dropdown-toggle dropdown-arrow-hide" data-bs-toggle="dropdown">
                                <i class="fa-light fa-grid-2"></i> <?php echo e(__('Actions')); ?>

                            </button>
                            <ul class="dropdown-menu dropdown-menu-end border-1 border-gray-300 px-2 w-100 max-w-125">
                                <li>
                                    <a class="dropdown-item p-2 rounded d-flex gap-8 fw-5 fs-14 actionItem" data-id="<?php echo e($ticket->id_secure); ?>" href="<?php echo e(module_url("status/open")); ?>" data-redirect="<?php echo e(route('admin.support.ticket', $ticket->id_secure)); ?>">
                                        <span class="size-16 me-1 text-center"><i class="fa-light fa-door-open"></i></span>
                                        <span><?php echo e(__('Open')); ?></span>
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item p-2 rounded d-flex gap-8 fw-5 fs-14 actionItem" data-id="<?php echo e($ticket->id_secure); ?>" href="<?php echo e(module_url("status/close")); ?>" data-redirect="<?php echo e(route('admin.support.ticket', $ticket->id_secure)); ?>">
                                        <span class="size-16 me-1 text-center"><i class="fa-light fa-lock"></i></span>
                                        <span><?php echo e(__('Close')); ?></span>
                                    </a>
                                </li>
                                <li><hr class="dropdown-divider"></li>
                                <li>
                                    <a class="dropdown-item p-2 rounded d-flex gap-8 fw-5 fs-14 actionItem" data-id="<?php echo e($ticket->id_secure); ?>" href="<?php echo e(module_url("status/unread")); ?>" data-redirect="<?php echo e(route('admin.support.index', $ticket->id_secure)); ?>">
                                        <span class="size-16 me-1 text-center"><i class="fa-light fa-envelope"></i></span>
                                        <span ><?php echo e(__('Unread')); ?></span>
                                    </a>
                                </li>
                                <?php if($ticket->pin): ?>
                                <li>
                                    <a class="dropdown-item p-2 rounded d-flex gap-8 fw-5 fs-14 actionItem" data-id="<?php echo e($ticket->id_secure); ?>" href="<?php echo e(module_url("status/pin")); ?>" data-redirect="<?php echo e(route('admin.support.ticket', $ticket->id_secure)); ?>">
                                        <span class="size-16 me-1 text-center"><i class="fa-light fa-thumbtack"></i></span>
                                        <span><?php echo e(__('Pin')); ?></span>
                                    </a>
                                </li>
                                <?php else: ?>
                                <li>
                                    <a class="dropdown-item p-2 rounded d-flex gap-8 fw-5 fs-14 actionItem" data-id="<?php echo e($ticket->id_secure); ?>" href="<?php echo e(module_url("status/unpin")); ?>" data-redirect="<?php echo e(route('admin.support.ticket', $ticket->id_secure)); ?>">
                                        <span class="size-16 me-1 text-center"><i class="fa-light fa-thumbtack"></i></span>
                                        <span><?php echo e(__('Unpin')); ?></span>
                                    </a>
                                </li>
                                <?php endif; ?>
                                <li><hr class="dropdown-divider"></li>
                                <li>
                                    <a class="dropdown-item p-2 rounded d-flex gap-8 fw-5 fs-14" href="<?php echo e(route("admin.support.edit", ["id" => $ticket->id_secure])); ?>">
                                        <span class="size-16 me-1 text-center"><i class="fa-light fa-pen-to-square"></i></span>
                                        <span><?php echo e(__('Edit')); ?></span>
                                    </a>
                                </li>
                                <li><hr class="dropdown-divider"></li>
                                <li>
                                    <a class="dropdown-item p-2 rounded d-flex gap-8 fw-5 fs-14 actionItem" data-id="<?php echo e($ticket->id_secure); ?>" href="<?php echo e(module_url("destroy")); ?>" data-confirm="<?php echo e(__("Are you sure you want to delete this item?")); ?>" data-redirect="<?php echo e(route('admin.support.index', $ticket->id_secure)); ?>">
                                        <span class="size-16 me-1 text-center"><i class="fa-light fa-trash-can-list"></i></span>
                                        <span><?php echo e(__('Delete')); ?></span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="min-h-650 max-h-850 hp-100 pb-5">
            <div class="card shadow-none border-gray-300 hp-100 b-r-6">
                <div class="d-flex card-body p-0 hp-100">
                    <div class="d-flex flex-column flex-fill">
                        <div class="overflow-y-auto ajax-scroll-top position-relative hp-100" 
                             data-scroll=".ajax-scroll-top"
                             data-url-top="<?php echo e(route('admin.support.comment', ['ticket_id' => $ticket->id_secure])); ?>"
                             data-resp=".show-comments">

                            <div class="ajax-scroll-loading-top position-sticky t-0 l-0 zIndex-200 wp-100 hp-100 d-flex align-items-center justify-content-center fs-40 bg-opacity-light-6">
                                <i class="fa-light fa-loader fa-spin"></i>
                            </div>
                            <div class="show-comments p-3">
                
                            </div>

                        </div>

                        <div class="mt-auto border-top">
                            <form class="actionForm" method="POST" action="<?php echo e(module_url("save_comment")); ?>" data-call-success="Main.ajaxScrollTop(true); Main.clearForm($(this));">
                                <input type="text" class="d-none" name="ticket_id" value="<?php echo e($ticket->id_secure); ?>">
                                <textarea class="textarea_editor h-180 border-0 b-r-10" id="textarea_editor" name="comment"></textarea>

                                <button type="submit" class="btn btn-lg btn-light w-100 border-end-0 border-bottom-0 border-start-0 border-top btr-r-0 btl-r-0 bbr-r-10 bbl-r-10 text-gray-900 shadow-none text-hover-info">
                                    <i class="fa-light fa-paper-plane"></i>
                                    <?php echo e(__("Send message")); ?>

                                </button>
                            </form>
                        </div>
                    </div>
                    <div class="flex-fill max-w-350 border-start d-none1 overflow-y-auto hp-100 hide-scroll d-none d-lg-block hide-scroll">
                        <div class="p-3 border-bottom fs-14">
                            <div class="fw-5">
                                <i class="fa-light fa-circle-info"></i> <?php echo e(__("Ticket info")); ?>

                            </div>
                        </div>

                        <div class="p-3">
                            
                            <div class="row fs-12">

                                <div class="col-4 mb-3 fw-5">
                                    <?php echo e(__("Ticket ID")); ?>

                                </div>
                                <div class="col-8 mb-3 text-uppercase">
                                    <?php echo e($ticket->id_secure); ?>

                                </div>

                                <div class="col-4 mb-3 fw-5">
                                    <?php echo e(__("Open by")); ?>

                                </div>
                                <div class="col-8 mb-3">
                                    <div class="d-flex align-items-center gap-8">
                                        <div class="d-flex size-16 size-child">
                                            <img src="<?php echo e(Media::url( $ticket->user_avatar )); ?>" class="border b-r-50">
                                        </div>
                                        <div class=""><?php echo e($ticket->user_fullname); ?></div>
                                    </div>
                                </div>

                                <div class="col-4 mb-3 fw-5">
                                    <?php echo e(__("Type")); ?>

                                </div>
                                <div class="col-8 mb-3">
                                    <?php if($ticket->type_name != ""): ?>
                                    <span class="badge badge-sm badge-<?php echo e($ticket->type_color); ?>">
                                        <span class="me-2"><i class="<?php echo e($ticket->type_icon); ?>"></i></span>
                                        <span><?php echo e(__($ticket->type_name)); ?></span>
                                    </span>
                                    <?php else: ?>
                                    <?php echo e(__("None")); ?>

                                    <?php endif; ?>
                                    
                                </div>

                                <div class="col-4 mb-3 fw-5">
                                    <?php echo e(__("Labels")); ?>

                                </div>
                                <div class="col-8 mb-3">
                                    <?php if(!empty($ticket->label_names)): ?>
                                        
                                        <?php $__currentLoopData = $ticket->label_names; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $label_name): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <span class="badge badge-outline badge-sm mb-1 badge-<?php echo e($ticket->label_colors[$key]); ?>">
                                            <span class="me-2"><i class="<?php echo e($ticket->label_icons[$key]); ?>"></i></span>
                                            <span><?php echo e(__($label_name)); ?></span>
                                        </span>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                    <?php else: ?>
                                    <?php echo e(__("None")); ?>

                                    <?php endif; ?>
                                </div>

                                <div class="col-4 mb-3 fw-5">
                                    <?php echo e(__("Total replied")); ?>

                                </div>
                                <div class="col-8 mb-3">
                                    <?php echo e($ticket->total_comment); ?> 
                                </div>

                                <div class="col-4 mb-3 fw-5">
                                    <?php echo e(__("Last replied")); ?>

                                </div>
                                <div class="col-8 mb-3">
                                    <?php echo e(time_elapsed_string($ticket->changed)); ?>

                                </div>

                                <div class="col-4 fw-5">
                                    <?php echo e(__("Created at")); ?>

                                </div>
                                <div class="col-8">
                                    <?php echo e(datetime_show($ticket->changed)); ?>

                                </div>
                            </div>

                        </div>

                        <?php if( $recent_tickets->count() > 0 ): ?>
                        <div class="p-3 border-bottom border-top fs-14">
                            <div class="fw-5">
                                <i class="fa-light fa-clock-rotate-left"></i> <?php echo e(__("Recent tickets")); ?>

                            </div>
                        </div>

                        <div class="p-3">

                            <?php $__currentLoopData = $recent_tickets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="card shadow-none mb-3 border-gray-300 b-r-6">
                                <div class="card-body p-3">
                                    <div class="fw-5 fs-12 text-truncate-2">
                                        <a href="<?php echo e(route('admin.support.ticket', $value->id_secure)); ?>" class="text-gray-900 text-hover-primary">
                                            <?php echo e($value->title); ?>

                                        </a>
                                    </div>
                                    <div class="fs-11 text-gray-600">
                                        <div class="d-flex align-items-center gap-8">
                                            <span><?php echo e($value->category_name); ?></span>
                                            <span class="size-4 d-block border b-r-50 bg-gray-400"></span>
                                            <span><?php echo e(sprintf( __("%s replies"), $value->total_comment)); ?></span>
                                        </div>
                                    </div>
                                    <div>
                                        <?php if($value->status == 1): ?>
                                            <span class="badge badge-outline badge-sm badge-primary"><i class="fa-light fa-door-open pe-2"></i><?php echo e(__("Open")); ?></span>
                                        <?php elseif($value->status == 2): ?>
                                            <span class="badge badge-outline badge-sm badge-success"><i class="fa-light fa-circle-check pe-2"></i><?php echo e(__("Resolved")); ?></span>
                                        <?php else: ?>
                                            <span class="badge badge-outline badge-sm badge-dark"><i class="fa-light fa-lock pe-2"></i><?php echo e(__("Closed")); ?></span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        </div>
                        <?php endif; ?>
                    </div>
                </div>                
            </div>
        </div>

    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<script>
    var ticket_id = '<?php echo e($ticket->id_secure); ?>';
    var user_token = '<?php echo e(session("user_token")); ?>';

    var options = {
        'type': 'pusher',
        'app_key': '<?php echo e(get_option("pusher_app_key", "")); ?>',
        'cluster': '<?php echo e(get_option("pusher_cluster", "")); ?>',
        'channel': 'support_comments',
        'event'  : 'SupportEvents'
    };

    Main.broadCast(options, function(data){
        if(ticket_id == data.comment.ticket_id && user_token != data.comment.user_token){
            Main.ajaxScrollTop(true);
        }
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/cotlas-socialxi/htdocs/socialxi.cotlas.net/modules/AdminSupport/resources/views/view_ticket.blade.php ENDPATH**/ ?>