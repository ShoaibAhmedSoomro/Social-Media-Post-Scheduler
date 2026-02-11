<?php
    $options = $options ?? [];
?>

<?php if( isset($include_media) && $include_media ): ?>
<div class="col-6">
    <div class="mb-3">
        <label for="name" class="form-label"><?php echo e(__('Include media')); ?></label>
        <select class="form-select" data-control="select2" name="ai_options[include_media]">
            <option value="0" <?php echo e((isset($options['include_media']) && $options['include_media'] == 0) ? 'selected' : ''); ?>><?php echo e(__("Disable")); ?></option>
            <optgroup label="<?php echo e(__('Media Online')); ?>"> 
                <option value="ai" <?php echo e((isset($options['include_media']) && $options['include_media'] == 'ai') ? 'selected' : ''); ?>><?php echo e(__('AI Image')); ?></option>
                <option value="unsplash" <?php echo e((isset($options['include_media']) && $options['include_media'] == 'unsplash') ? 'selected' : ''); ?>><?php echo e(__('Unsplash')); ?></option>
                <option value="pexels_photo" <?php echo e((isset($options['include_media']) && $options['include_media'] == 'pexels_photo') ? 'selected' : ''); ?>><?php echo e(__('Pexels Photo')); ?></option>
                <option value="pexels_video" <?php echo e((isset($options['include_media']) && $options['include_media'] == 'pexels_video') ? 'selected' : ''); ?>><?php echo e(__('Pexels Video')); ?></option>
                <option value="pixabay_photo" <?php echo e((isset($options['include_media']) && $options['include_media'] == 'pixabay_photo') ? 'selected' : ''); ?>><?php echo e(__('Pixabay Photo')); ?></option>
                <option value="pixabay_video" <?php echo e((isset($options['include_media']) && $options['include_media'] == 'pixabay_video') ? 'selected' : ''); ?>><?php echo e(__('Pixabay Video')); ?></option>
            </optgroup>
            <optgroup label="<?php echo e(__('Folder File')); ?>">
                <?php $__currentLoopData = $folders??[]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($value->id); ?>" <?php echo e((isset($options['include_media']) && $options['include_media'] == $value->id) ? 'selected' : ''); ?>><?php echo e($value->name); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </optgroup>
        </select>
    </div>
</div>
<?php endif; ?>

<div class="col-md-6 mb-3">
    <label class="form-label"><?php echo e(__("Language")); ?></label>
    <select class="form-select" data-control="select2" name="ai_options[language]" required="">
        <?php $__currentLoopData = languages(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value="<?php echo e($key); ?>" <?php echo e((isset($options['language']) ? $options['language'] : get_option("ai_language", "en-US")) == $key ? 'selected' : ''); ?>><?php echo e($value); ?></option>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </select>
</div>

<div class="col-md-6 mb-3">
    <label class="form-label"><?php echo e(__("Tone of voice")); ?></label>
    <select class="form-select" data-control="select2" name="ai_options[tone_of_voice]" required="">
        <?php $__currentLoopData = tone_of_voices(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value="<?php echo e($key); ?>" <?php echo e((isset($options['tone_of_voice']) ? $options['tone_of_voice'] : get_option("ai_tone_of_voice", "Friendly")) == $key ? 'selected' : ''); ?>><?php echo e($value); ?></option>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </select>
</div>

<div class="col-md-6 mb-3">
    <label class="form-label"><?php echo e(__("Creativity")); ?></label>
    <select class="form-select" data-control="select2" name="ai_options[creativity]" required="">
        <?php $__currentLoopData = ai_creativity(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value="<?php echo e($key); ?>" <?php echo e((isset($options['creativity']) ? $options['creativity'] : get_option("ai_creativity", 0)) == $key ? 'selected' : ''); ?>><?php echo e($value); ?></option>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </select>
</div>

<?php if( isset($hashtags) && $hashtags ): ?>
<div class="col-md-6 mb-3">
    <label class="form-label"><?php echo e(__("Add hashtags")); ?></label>
    <select class="form-select" data-control="select2" name="ai_options[hashtags]">
        <option value=""><?php echo e(__("Disable")); ?></option>
        <?php for($i=1; $i <= 10; $i++): ?>
            <option value="<?php echo e($i); ?>" <?php echo e((isset($options['hashtags']) && $options['hashtags'] == $i) ? 'selected' : ''); ?>><?php echo e($i); ?></option>
        <?php endfor; ?>
    </select>
</div>
<?php endif; ?>

<div class="col-md-6 mb-3">
    <label class="form-label"><?php echo e(__("Approximate words")); ?></label>
    <input type="number" class="form-control" name="ai_options[max_length]" value="<?php echo e(isset($options['max_length']) ? $options['max_length'] : get_option("ai_max_input_lenght", 0)); ?>" required="">
</div>

<?php if( isset($total_result) && $total_result ): ?>
<div class="col-md-6 mb-3">
    <label class="form-label"><?php echo e(__("Total results")); ?></label>
    <input type="text" class="form-control" name="ai_options[number_result]" value="<?php echo e($options['number_result'] ?? 3); ?>">
</div>
<?php endif; ?><?php /**PATH /home/cotlas-socialxi/htdocs/socialxi.cotlas.net/modules/AppAIContents/resources/views/options.blade.php ENDPATH**/ ?>