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
    body { margin:0; padding:0; background: #f4f6f8; font-family: 'Inter', Arial, sans-serif; }
    .main-container { background: #fff; max-width: 460px; margin: 32px auto 0 auto; border-radius: 10px; box-shadow:0 2px 8px #0001; }
    .content { padding:32px 24px 28px 24px; color:#232323; }
    .btn {
      display:inline-block;
      background: #22223b;
      color:#fff;
      padding: 12px 28px;
      border-radius:5px;
      text-decoration:none;
      font-size:15px;
      margin: 18px 0 10px 0;
      transition:.15s;
      border:none;
    }
    .btn:hover { background:#4a4e69; }
    h2 { margin-top:0; font-weight:500; letter-spacing:.01em;}
    @media (max-width:600px) {
      .main-container { width: 98%!important; margin:12px auto; }
      .content { padding:16px 6px; }
    }
  </style>
</head>
<body>
  <div class="main-container">
    <?php echo $__env->make('adminmailthemes::themes.minimal-elegant.header', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    <div class="content">
      <?php echo $content??''; ?>

    </div>
    <?php echo $__env->make('adminmailthemes::themes.minimal-elegant.footer', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
  </div>
</body>
</html><?php /**PATH /home/cotlas-socialxi/htdocs/socialxi.cotlas.net/modules/AdminMailThemes/resources/views/themes/minimal-elegant/layout.blade.php ENDPATH**/ ?>