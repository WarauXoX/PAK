<?php use Carbon\Carbon; ?>


<?php $__env->startSection('links'); ?>
    <link rel="stylesheet" href="<?php echo e(asset("assets/css/profile.css")); ?>">
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
    <div class="profile margin">
        <div>

            <img src="<?php echo e(Storage::url(request()->user()->avatar)); ?>" alt="avatar">
        </div>
        <div id="right-panel">
            <h2 id="name"><?php echo e(request()->user()->name); ?> <?php echo e(request()->user()->surname); ?></h2>
            <div class="info">
                <b>Город:</b>
                <p><?php echo e(request()->user()->city); ?></p>
                <b>Возраст:</b>
                <p><?php $yearth = Carbon::parse(request()->user()->birthdate)->diffInYears() ?>
                    <?php echo e($yearth); ?>

                </p>
                <b>Роль:</b>
                <p><?php echo e(auth()->user()->role->title); ?></p>
            </div>
            <a href="<?php echo e(route("course.create")); ?>">
                <button><b>+</b> добавить курс</button>
            </a>
        </div>
    </div>

    <div class="courses margin">
        <div class="main-part-of-cousre">
            <div class="course-status gray-text">
                <b>курс</b>
                <p>|</p>
                <p>в процессе</p>
            </div>
            <div id="name-of-course">
                <p>Информационная безопастность</p>
                <a href="#" id="sertificate">скачать сертификат</a>
                <div id="progress"><p>2/88</p></div>
            </div>
        </div>
        <div id="content-of-course">
            <p>Урок: </p>
            <p id="points"></p>
            <a href="">
                <button id="start-lection">смотреть</button>
            </a>
        </div>
        <hr align="center" width="2px" color="#c9c9c9">
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.PAKH', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\user\PhpstormProjects\PAK\resources\views/profile.blade.php ENDPATH**/ ?>
