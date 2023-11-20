<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <script
        src="https://code.jquery.com/jquery-3.7.1.js"
        integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
        crossorigin="anonymous"></script>
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
                    <?php echo e(__('выход')); ?>

                </a>

                <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" class="d-none">
                    <?php echo csrf_field(); ?>
                </form>
            </div>
        <?php else: ?>
            <div class="header-login">

                <label for="start" >Вход</label>
                <input type="radio" id="start">

                <a href="<?php echo e(route('register')); ?>">Регистрация</a>
            </div>

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

<?php echo $__env->yieldContent('scripts'); ?>
</body>
</html>
<?php /**PATH C:\Users\user\PhpstormProjects\PAK\resources\views/layouts/PAKH.blade.php ENDPATH**/ ?>