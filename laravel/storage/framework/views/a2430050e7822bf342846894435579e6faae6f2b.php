<?php $__env->startSection('title', 'contact us'); ?>

<?php $__env->startSection('content'); ?>

<h1>Contact pagina</h1>

    <div class="column is-full">
        <form id="contact-form" action="<?php echo e(route('contact')); ?>" method="POST">
            <?php echo csrf_field(); ?>
                <div class="column is-half is-full-mobile">
                    <input class="input" type="text">
                </div>
                <div class="column is-half is-full-mobile">
                    <h2 class="title is-5">
                        Email adres=
                    </h2>
                    <input class="input" type="email">
                    <h2 class="title is-5">
                        Naam:
                    </h2>
                    <input class="input" type="name">
                </div>

        </form>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/hannesdebaere/Documents/GitHub/webdev2/webdev2-eindOpdracht/laravel/resources/views/pages/contact.blade.php ENDPATH**/ ?>