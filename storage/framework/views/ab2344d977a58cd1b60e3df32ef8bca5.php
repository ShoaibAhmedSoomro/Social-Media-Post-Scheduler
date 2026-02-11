<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <?php if(isset($subject)): ?>
  <title><?php echo e($subject ?? __('Email Notification')); ?></title>
  <?php else: ?>
    <title><?php echo $__env->yieldContent('subject', __('Email Notification')); ?></title>
  <?php endif; ?>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    body { margin:0; padding:0; background: #f9f9f9; font-family: 'Segoe UI', Arial, sans-serif; }
    .main-container { background: #fff; max-width: 560px; margin: 32px auto 0 auto; border-radius: 12px; box-shadow:0 4px 16px #0001; overflow:hidden; }
    .content { padding:32px 24px 24px 24px; color:#222; }
    .btn {
      display:inline-block;
      background: #248bcb;
      color:#fff;
      padding: 12px 32px;
      border-radius:6px;
      text-decoration:none;
      font-size:16px;
      margin: 16px 0;
      transition:.15s;
    }
    .btn:hover { background:#18597c; }
    @media (max-width:600px) {
      .main-container { width: 96%!important; margin:16px auto; }
      .content { padding:18px 8px; }
    }
  </style>
</head>
<body>
  <div class="main-container">
    <?php echo $__env->make('adminmailthemes::themes.modern-pro.header', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    <div class="content">
      <?php echo $content??''; ?>

    </div>
    <?php echo $__env->make('adminmailthemes::themes.modern-pro.footer', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
  </div>
</body>
</html><?php /**PATH /home/cotlas-socialxi/htdocs/socialxi.cotlas.net/modules/AdminMailThemes/resources/views/themes/modern-pro/layout.blade.php ENDPATH**/ ?>