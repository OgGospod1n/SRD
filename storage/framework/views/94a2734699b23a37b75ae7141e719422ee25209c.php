<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

        <title><?php echo e(config('app.name', 'Laravel')); ?></title>

        <!-- Google Font -->
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" href="<?php echo e(asset('css/app.css')); ?>">

        <!-- Scripts -->
        <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.7.3/dist/alpine.js" defer></script>
    </head>
    <body>
        <div class="font-sans text-gray-900 antialiased">
            <?php echo e($slot); ?>

        </div>
    </body>
</html>
<?php /**PATH C:\collaborative-document-editor-development\server\resources\views/layouts/guest.blade.php ENDPATH**/ ?>