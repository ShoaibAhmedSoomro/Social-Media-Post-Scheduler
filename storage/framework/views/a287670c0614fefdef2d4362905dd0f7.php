<?php if(session('impersonate_by')): ?>
    <div class="menu-item mb-2">
        <a href="<?php echo e(route('auth.leave_impersonate')); ?>" class="btn btn-outline btn-primary btn-sm wp-100">
            <i class="fa-light fa-right-from-bracket"></i> <?php echo e(__("Back to Admin")); ?>

        </a>
    </div>
<?php endif; ?>

<?php if(Auth::user()->role == 2): ?>
	<div class="menu-item mb-2">
		<?php if(session("login_as") == "client"): ?>
			<a href="<?php echo e(url("auth/login-as-admin")); ?>" class="btn btn-outline btn-primary btn-sm wp-100"><i class="fa-light fa-right-from-bracket"></i> <?php echo e(__("Admin Dashboard")); ?></a>
		<?php else: ?>
			<a href="<?php echo e(url("auth/login-as-user")); ?>" class="btn btn-outline btn-primary btn-sm wp-100"><i class="fa-light fa-right-from-bracket"></i> <?php echo e(__("User Dashboard")); ?></a>
		<?php endif; ?>
	</div>
<?php endif; ?><?php /**PATH /home/cotlas-socialxi/htdocs/socialxi.cotlas.net/modules/Auth/resources/views/sidebar-block.blade.php ENDPATH**/ ?>