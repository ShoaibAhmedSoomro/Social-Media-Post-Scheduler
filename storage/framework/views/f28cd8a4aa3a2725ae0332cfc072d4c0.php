<?php
    $id_custom = str_replace("[", "_", $id);
    $id_custom = str_replace("]", "", $id_custom);
?>

<?php if(isset($name)): ?>
<label for="name" class="form-label"><?php echo e(__($name)); ?>

    <?php if(isset($required) && $required): ?>
    (<span class="text-danger">*</span>)
    <?php endif; ?>
</label>
<?php endif; ?>
<div class="input-group mb-3">
    <input class="form-control" id="<?php echo e($id_custom); ?>" name="<?php echo e($id); ?>" placeholder="<?php echo e(__("Select file")); ?>" type="text" value="<?php echo e($value ?? ''); ?>">
    <a class="btn btn-input actionItem pointer" href="<?php echo e(route("app.files.popup_files")); ?>" data-id="<?php echo e($id_custom); ?>" data-filter="<?php echo e(serialize([ "type" => "image", "multi" => isset($multi)?$multi:false ])); ?>" data-popup="filesModal">
        <i class="fa-light fa-folder-open"></i> <?php echo e(__("Files")); ?>

    </a>
</div>
<?php /**PATH /home/cotlas-socialxi/htdocs/socialxi.cotlas.net/modules/AppFiles/resources/views/block_select_file.blade.php ENDPATH**/ ?>