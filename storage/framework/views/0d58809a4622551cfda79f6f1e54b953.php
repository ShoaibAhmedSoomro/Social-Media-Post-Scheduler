<?php
$user_id = Auth::user()->id;
?>

<?php if($comments["pagination"]["last_page"] == $page || ($comments["pagination"]["last_page"] == 0 && $page == 1)): ?>

    <?php if($user_id == $ticket->user_id): ?>
        <div class="d-flex justify-content-end gap-8 align-items-top mb-4">
            <div>
                <div class="d-flex align-items-center gap-8 mb-2 justify-content-end">
                    <div class="fw-5 fs-12">
                        <?php echo e(__("You")); ?>

                    </div>
                    <div class="size-4 bg-gray-300 b-r-100"></div>
                    <div class="text-gray-600 fs-12"><?php echo e(time_elapsed_string($ticket->created)); ?></div>
                </div>
                <div class="bg-gray-100 p-2 border b-r-6 fs-13 max-w-450 wp-100 width-wrap">
                    <?php echo $ticket->content; ?>

                </div>
            </div>
        </div>
    <?php else: ?>
        <div class="d-flex justify-content-start gap-8 align-items-top mb-4">
            <div class="size-32 size-child">
                <img src="<?php echo e(Media::url( $ticket->user_avatar )); ?>" class="border rounded-circle">
            </div>

            <div>
                <div class="d-flex align-items-center gap-8 mb-2">
                    <div class="fw-5 fs-12">
                        <?php echo e($ticket->user_fullname); ?>

                    </div>
                    <div class="size-4 bg-gray-300 b-r-100"></div>
                    <div class="text-gray-600 fs-12"><?php echo e(time_elapsed_string($ticket->created)); ?></div>
                </div>
                <div class="bg-gray-100 p-2 border b-r-6 fs-13 max-w-450 wp-100 width-wrap">
                    <?php echo $ticket->content; ?>

                </div>
            </div>
        </div>
    <?php endif; ?>
    
<?php endif; ?>

<?php if( !empty($comments["comments"]) ): ?>
   
    <?php $__currentLoopData = $comments["comments"]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

        <?php if($user_id == $comment->user_id): ?>
            <div class="d-flex justify-content-end gap-8 align-items-top mb-4 comment-item">
                <div>
                    <div class="d-flex align-items-center gap-8 mb-2 justify-content-end">
                        <div class="fw-5 fs-12">
                            <?php echo e(__("You")); ?>

                        </div>
                        <div class="size-4 bg-gray-300 b-r-100"></div>
                        <div class="text-gray-600 fs-12"><?php echo e(time_elapsed_string($comment->changed)); ?></div>
                        <div class="d-flex gap-6 text-gray-600 fs-12">
                            <a href="<?php echo e(route("admin.support.edit_comment")); ?>" data-id="<?php echo e($comment->id_secure); ?>" class="actionItem text-gray-900 text-hover-primary" data-popup="editCommentPopup"><i class="fa-light fa-pen-to-square"></i></a>
                            <a href="<?php echo e(route("admin.support.delete_comment")); ?>" data-id="<?php echo e($comment->id_secure); ?>" class="actionItem text-gray-900 text-hover-danger" data-remove="comment-item" data-confirm="<?php echo e(__("Are you sure you want to delete this item?")); ?>"><i class="fa-light fa-trash-can"></i></a>
                        </div>
                    </div>
                    <div class="bg-gray-100 p-2 border b-r-6 fs-13 max-w-450 wp-100 width-wrap">
                        <?php echo $comment->comment; ?>

                    </div>
                </div>
            </div>
        <?php else: ?>
            <div class="d-flex justify-content-start gap-8 align-items-top mb-4">
                <div class="size-32 size-child">
                    <img src="<?php echo e(Media::url( $comment->user_avatar )); ?>" class="border rounded-circle">
                </div>

                <div>
                    <div class="d-flex align-items-center gap-8 mb-2">
                        <div class="fw-5 fs-12">
                            <?php echo e($comment->user_fullname); ?>

                        </div>
                        <div class="size-4 bg-gray-300 b-r-100"></div>
                        <div class="text-gray-600 fs-12"><?php echo e(time_elapsed_string($comment->changed)); ?></div>
                    </div>
                    <div class="bg-gray-100 p-2 border b-r-6 fs-13 max-w-450 wp-100 width-wrap">
                        <?php echo $comment->comment; ?>

                    </div>
                </div>
            </div>
        <?php endif; ?>

    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<?php endif; ?><?php /**PATH /home/cotlas-socialxi/htdocs/socialxi.cotlas.net/modules/AdminSupport/resources/views/comments.blade.php ENDPATH**/ ?>