<!DOCTYPE html>
<html lang="en" data-coreui-theme="light">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
  <title><?php echo e($title ?? 'Authentication'); ?> | CoreUI + Laravel</title>
  <?php echo app('Illuminate\Foundation\Vite')(['resources/scss/app.scss', 'resources/js/app.js']); ?>
</head>
<body>
  <?php echo $__env->yieldContent('content'); ?>
</body>
</html>
<?php /**PATH /app/resources/views/layouts/auth.blade.php ENDPATH**/ ?>