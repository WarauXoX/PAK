
<?php $__env->startSection('links'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/style.css')); ?>">

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <section class="main">

        <div id="text">
            <h1>Обучайся самостоятельно в сфере IT</h1>
            <p class="secondary" style="font-size: 1.2em">
                Закрытая платформа автоматизированных курсов для студентов ГАПОУ СО
                «ЕТ «АВТОМАТИКА»
            </p>
            <?php if(auth()->user()): ?>
                    <a href="  <?php echo route('user.profile'); ?>  ">  начать  </a>
            <?php else: ?>
                <button id="start">Начать</button>
            <?php endif; ?>

        </div>
        <div id="block">
            <p id="InfSec">Информационная безопастность</p>
            <p id="ProgFrbus">Программное решение для бизнеса</p>
            <p id="Web">Web разработка</p>
        </div>

        <div class="pop-up-bg">
            <div class="pop-up">
                <form action="<?php echo e(route( "login" )); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <h2>Вход в систему ПАК</h2>
                    <input name="email" placeholder="Ваш E-mail" />
                    <input name="password" placeholder="пароль" />
                    <div id="preResPass">
                        <a href="#" id="ResPass">Забыли пороль</a>
                    </div>
                    <div class="aunth">
                        <button type="submit">Войти</button>
                        <a href="registration.html">Регистрация</a>
                    </div>
                </form>
            </div>
            <div>





    </section>
    <section class="AbtUs">
        <div class="reason">
            <h2>Для чего данная платформа</h2>
            <p>
                Платформа автоматизированных курсов по IT – это онлайн-платформа,
                которая обеспечивает автоматизированное проведение учебных курсов по
                ИТ. <br/>Она разработана, чтобы предложить учащимся беспрепятственный
                процесс обучения за счет использования технологий и автоматизации для
                оптимизации процесса обучения.
            </p>
        </div>
        <div>
            <p class="secondary">
                На платформе представлен ряд ИТ-курсов, охватывающих различные темы,
                такие как информационная безопасность программные решения для бизнеса
                и вебразработка.
            </p>
            <p class="secondary">
                Студенты могут получить доступ к платформе из любого места, в любое
                время и учиться в своем собственном темпе.
            </p>
            <p class="secondary">
                Платформа предлагает интерактивные учебные материалы, такие как видео,
                вебинары, викторины и задания, которые помогают учащимся эффективно
                приобретать новые навыки и знания. Кроме того, платформа обеспечивает
                автоматическую оценку и обратную связь, что экономит время как
                студентов, так и преподавателей. Платформа автоматизированного курса
                ИТ — отличное решение для тех, кто хочет гибко и эффективно освоить
                ИТ-навыки без ограничений традиционного обучения в классе.
            </p>
        </div>
    </section>
    <h1 class="title">Как строится процесс</h1>
    <section class="process">
        <div>
            <img src="assets/img/MainPage/1.png" alt="registration"/>
            <h3>Регистрация</h3>
            <p>
                Вы производите регистрацию на нашей платформе указывая актуальные
                данные
            </p>
        </div>
        <hr/>
        <div>
            <img src="assets/img/MainPage/2.png" alt="access"/>
            <h3>Получение доступа к курсу</h3>
            <p>
                Указываете специализацию для получения доступа к определенному курсу.
                В течении суток Вы получаете доступ.
            </p>
        </div>
        <hr/>
        <div>
            <img src="assets/img/MainPage/3.png" alt="tutorial"/>
            <h3>Обучение</h3>
            <p>
                Вы приступаете к последовательному прохождению курса по вашей
                специальности, изучая информацию и выполняя практические
            </p>
        </div>
    </section>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <script src="<?php echo e(asset('assets/JS/script.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.PAKH', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\user\PhpstormProjects\PAK\resources\views/index.blade.php ENDPATH**/ ?>