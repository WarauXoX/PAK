<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <?php echo $__env->yieldContent('links'); ?>
    <title>регистрация</title>
</head>
<body>
<header>

    <h1>ПАК</h1>
    <div class="app">
        <?php if(request()->user()): ?>
            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="<?php echo e(route('logout')); ?>"
                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                    <?php echo e(__('Logout')); ?>

                </a>

                <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" class="d-none">
                    <?php echo csrf_field(); ?>
                </form>
            </div>
        <?php else: ?>

            <a href="<?php echo e(route('register')); ?>">Регистрация</a>
        <?php endif; ?>
    </div>


</header>

<?php echo $__env->yieldContent('content'); ?>

<footer>
    <div>
        <p>2023 все права защищены</p>
    </div>
    <div>
        <p><u> +7 999 999 99 99</u></p>
        <p>pak@mail.ru</p>
        <p>Тех. Поддержка</p>
    </div>
</footer>
</body>
</html>
<?php /**PATH C:\Users\user\Desktop\ПАК\PAK-laravel\project-PAK\resources\views/layouts/PAKH.blade.php ENDPATH**/ ?>