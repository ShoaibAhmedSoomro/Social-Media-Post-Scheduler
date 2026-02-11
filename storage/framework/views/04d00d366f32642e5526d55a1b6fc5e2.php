<?php
    $teams = UserInfo::getJoinedTeams();
    $currentTeamSecure = session('current_team_secure');
?>

<?php if($teams && count($teams)): ?>
<div class="menu-item mb-2">
    <label class="form-label mb-1"><?php echo e(__("Select Team")); ?></label>
    <div class="input-group">
     	<select class="form-select actionChange" name="team_id" data-url="<?php echo e(route("app.teams.joined.open_team")); ?>">
	        <option value="0" <?php echo e(empty($currentTeamSecure) ? 'selected' : ''); ?>>
	            <?php echo e(__("Your Team")); ?>

	        </option>
	        <?php $__currentLoopData = $teams; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	            <option value="<?php echo e($value['id_secure']); ?>"
	                <?php echo e($currentTeamSecure == $value['id_secure'] ? 'selected' : ''); ?>>
	                <?php echo e($value['name']); ?>

	            </option>
	        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	    </select>
 		<a href="<?php echo e(route("app.teams.joined")); ?>" class="btn btn-light btn-icon" data-bs-title="<?php echo e(__("Joined Teams")); ?>" data-bs-toggle="tooltip" data-bs-placement="top">
      		<i class="fa-light fa-people-group"></i>
 		</a>
    </div>
    
</div>
<?php endif; ?><?php /**PATH /home/cotlas-socialxi/htdocs/socialxi.cotlas.net/modules/AppTeamJoined/resources/views/sidebar-block.blade.php ENDPATH**/ ?>