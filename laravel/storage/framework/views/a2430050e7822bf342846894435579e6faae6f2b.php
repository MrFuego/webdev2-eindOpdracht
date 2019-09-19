<?php $__env->startSection('title', 'contact us'); ?>

<?php $__env->startSection('content'); ?>

    <style>
        #textarea-test{
            height:250px;
        }
    </style>

    <div class="column is-full">
        <h1 class="title is-3">Contact us</h1>
    </div>
    <div class="column is-full">
        <?php if(Session::has('notification')): ?>
            <div class="notification is-<?php echo e(Session::get('notification')); ?>">
                <?php echo e(Session::get('message')); ?>

            </div>
        <?php endif; ?>
    </div>

    <div class="column is-full">
        <form id="contact-form" action="<?php echo e(route('contact.mail')); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <h2 class="title is-5">
                Uw bericht aan ons:
            </h2>
            <div class="column is-full is-full-mobile">
                <textarea class="input" name="comment" id="textarea-test"></textarea>
            </div>
            <div class="column is-full is-full-mobile">
                <h2 class="title is-5">
                    Email adres:
                </h2>
                <input class="input" type="email" name="email">
                <h2 class="title is-5">
                    Naam:
                </h2>
                <input class="input" type="name" name="name">
            </div>
            <div class="control">
                <button type="submit" class="button is-primary">
                    <?php echo app('translator')->getFromJson('labels.send'); ?>
                </button>
            </div>
        </form>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/hannesdebaere/Documents/GitHub/webdev2/webdev2-eindOpdracht/laravel/resources/views/pages/contact.blade.php ENDPATH**/ ?>