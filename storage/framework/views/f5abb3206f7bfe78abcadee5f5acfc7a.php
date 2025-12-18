<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo e($title ?? 'Pengaduan Masyarakat'); ?></title>

    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
</head>
<body class="min-h-screen bg-gray-100">
    <?php echo $__env->yieldContent('content'); ?>
</body>
</html><?php /**PATH C:\Users\Ramadan\Downloads\Projects\pengaduan-masyarakat\resources\views/layouts/auth.blade.php ENDPATH**/ ?>