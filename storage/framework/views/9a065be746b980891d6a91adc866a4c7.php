<?php $__env->startSection('links'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/registration.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <h2 style="margin: 1.7em 3em;">Регистрация</h2>
    <form class="registration" method="POST" action="<?php echo e(route('register')); ?>">
        <?php echo csrf_field(); ?>
        <div>
            <div>
                <input required name="name" placeholder="<?php echo e(__('name')); ?>" >

                <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <span>
                        <strong class="error"><?php echo e($message); ?></strong>
                    </span>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                <input required name="surname" placeholder="Ваша фамилия">

                <?php $__errorArgs = ['surname'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <span>
                    <strong class="error">$<?php echo e($message); ?></strong>
                </span>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                <div class="photo">
                    <div class="square"></div>
                    <a href="" style="color: #4B82D6; white-space: nowrap;">загрузить фото</a>
                </div>
            </div>

            <p class="title">Ваш пол</p>
            <div class="sex" method="get">
                <input required type="radio" checked name="gender" id="man" value="man">
                <label for="man" id="manlab">Мужской</label>

                <input required type="radio" name="gender" id="women" value="woman">
                <label for="women" id="womlab">Женский</label>

            </div>

            <div>
                <p class="title">Роль</p>
                <div class="select">
                    <select name="role" id="role">
                        <option value="Студент">Студент</option>
                        <option value="Преподаватель">Преподаватель</option>
                    </select>
                </div>
                <?php $__errorArgs = ['role'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <span>
                    <strong class="error">$<?php echo e($message); ?></strong>
                </span>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
            <div>
                <p class="title">Ваш город</p>
                <div class="select">
                    <select name="city" id="city">
                        <option value="Студент">Екатеринбург</option>
                        <option value="Преподаватель">Самара</option>
                    </select>
                    <?php $__errorArgs = ['city'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <span>
                    <strong class="error">$<?php echo e($message); ?></strong>
                    </span>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
                <p class="title">Дата рождения</p>
                <input required type="date" name="birthdate" id="birthdate">
                <?php $__errorArgs = ['birthdate'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <span>
                    <strong class="error">$<?php echo e($message); ?></strong>
                </span>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
        </div>

        <div style="margin-left:30%;">
            <div>
                <input required name="mail" placeholder="E-mail">

                <?php $__errorArgs = ['mail'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <span>
                    <strong class="error">$<?php echo e($message); ?></strong>
                </span>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                <input required name="phone" placeholder="Телефон">
                <?php $__errorArgs = ['phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <span>
                    <strong class="error">$<?php echo e($message); ?></strong>
                </span>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                <input required name="password" type="password" placeholder="Пароль">
                <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <span>
                    <strong class="error">$<?php echo e($message); ?></strong>
                </span>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                <input name="password_confirmation" required type="password" placeholder="Повторите пароль">
            </div>

            <div>
                <p class="title">Выберите курс</p>
                <div class="select">
                    <select name="course" id="course">
                        <option value="Студент">1</option>
                        <option value="Студент">2</option>
                        <option value="Студент">3</option>
                        <option value="Студент">4</option>
                    </select>
                    <?php $__errorArgs = ['cource'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <span>
                    <strong class="error">$<?php echo e($message); ?></strong>
                </span>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
                <p class="title">выберите группу</p>
                <div class="select">
                    <select name="group" id="group">
                        <option value="Студент">ИСП-320</option>
                        <option value="Преподаватель">ИСП-420</option>
                    </select>
                    <?php $__errorArgs = ['group'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <span>
                    <strong class="error">$<?php echo e($message); ?></strong>
                </span>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    <input required type="submit" value="submit">
                </div>
            </div>
        </div>

    </form>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.PAKH', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\user\Desktop\ПАК\PAK-laravel\project-PAK\resources\views/registration.blade.php ENDPATH**/ ?>