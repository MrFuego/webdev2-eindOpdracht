<?php $__env->startSection('title', 'projects'); ?>

<?php $__env->startSection('content'); ?>


    <div class="column is-one-third-desktop is-half-tablet is-full-mobile ">
        <div class="box">
            <div class="image-project has-background-light"  style="background-image: url('http://localhost:8000/storage/project-3/AC-Dc-George-Young-55cecf4ffae5e2.jpg')">
            </div>
            <section class="project-info">
                <h1 class="title is-5 is-spaced"> <?php echo e($news->first()["title"]); ?> </h1>
                <p class="intro">
                    <?php echo e($news->first()["description"]); ?>

                </p>
            </section>
        </div>
    </div>



<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/hannesdebaere/Documents/GitHub/webdev2/webdev2-eindOpdracht/laravel/resources/views/singleNews.blade.php ENDPATH**/ ?>