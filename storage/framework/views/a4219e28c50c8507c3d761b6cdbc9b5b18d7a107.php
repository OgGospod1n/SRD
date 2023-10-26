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

    <?php echo \Livewire\Livewire::styles(); ?>


    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.7.3/dist/alpine.js" defer></script>
</head>

<body class="font-sans antialiased bg-gray-100">
    <div class="min-h-screen pb-5">
        <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('navigation-dropdown')->html();
} elseif ($_instance->childHasBeenRendered('ZFWB5WH')) {
    $componentId = $_instance->getRenderedChildComponentId('ZFWB5WH');
    $componentTag = $_instance->getRenderedChildComponentTagName('ZFWB5WH');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('ZFWB5WH');
} else {
    $response = \Livewire\Livewire::mount('navigation-dropdown');
    $html = $response->html();
    $_instance->logRenderedChild('ZFWB5WH', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>

        <!-- Page Content -->
        <main>
            <?php echo e($slot); ?>

        </main>
    </div>

    <?php echo $__env->yieldPushContent('modals'); ?>

    <?php echo \Livewire\Livewire::scripts(); ?>

    <script src="<?php echo e(asset('js/app.js')); ?>"></script>
    <?php echo $__env->yieldContent('scripts'); ?>
</body>

</html>
<?php /**PATH C:\collaborative-document-editor-development\server\resources\views/layouts/app.blade.php ENDPATH**/ ?>