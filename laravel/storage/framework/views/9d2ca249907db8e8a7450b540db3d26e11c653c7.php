<?php $__env->startSection('title', 'projects'); ?>

<?php $__env->startSection('content'); ?>

    <?php if(Session::has('notification')): ?>
        <div class="column is-full">
            <div class="notification is-<?php echo e(Session::get('notification')); ?>">
                <?php echo e(Session::get('message')); ?>

            </div>
        </div>
    <?php endif; ?>

    <div class="column is-half">
        <div class="box">
            <div class="image-project has-background-light" style="background-image: url('<?php echo e(asset($project->images->first()->filepath)  . '/' . $project->images->first()->filename); ?>')"></div>

            <?php $__currentLoopData = $project->images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="column is-one-quarter-desktop is-one-third-tablet is-half-tablet ">
                    <div class="image-project has-background-light" style="background-image: url('<?php echo e(asset($image->filepath)  . '/' . $image->filename); ?>')"></div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
    <div class="column is-half">
        <section class="project-info">
            <div class="individual-project-info">
                <h1 class="title is-4 is-spaced"> <?php echo e($project->first()['project_name']); ?> </h1>
                <p class="intro">
                    <?php echo e($project->first()['project_intro']); ?>

                </p>
            </div>
            <div class="level">
                <div class="level-left">
                    <p>
                        <strong>
                            <?php echo e($project->allPledges); ?>

                        </strong>
                        credits gedoneerd
                    </p>
                </div>
                <div class="level-right">
                    <p>
                        <strong>
                            <?php echo e($project->daysToGo); ?>

                        </strong>
                        dagen te gaan
                    </p>
                </div>
            </div>

            <progress class="progress is-info" value="<?php echo e($project->progress); ?>" max="100"></progress>
            <div class="level-right">
                <p>
                    <strong>
                        <?php echo e($project->totalBackers); ?>

                    </strong>
                    backers
                </p>
            </div>
            <div class="level-right">
                <button id="download-project-<?php echo e($project->totalBackers); ?>" type="submit" class="button is-primary download-pdf">
                    pdf downloaden
                </button>
            </div>
        </section>
    </div>
    <div class="column is-three-quarters project_explenation">
        <?php echo $project->first()['project_description']; ?>

    </div>
    <div class="column is-one-quarter">
        <?php $__currentLoopData = $project->rewards; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reward): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="box box-reward">
                <p>
                    Doneer <strong class="has-text-weight-bold"><?php echo e($reward->price); ?></strong> Cr of meer
                </p>
                <h2 class="title is-6">
                    <?php echo e($reward->name); ?>

                </h2>
                <p>
                    <?php echo e($reward->description); ?>

                </p>
                <div class="control">
                    <form action="/buy/<?php echo e($reward->id); ?>" method="post">
                        <?php echo csrf_field(); ?>
                        <button id="buy-perk-<?php echo e($reward->id); ?>" type="submit" class="button is-primary buy-perk">
                            Koop deze reward
                        </button>
                    </form>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/hannesdebaere/Documents/GitHub/webdev2/webdev2-eindOpdracht/laravel/resources/views/projects/show.blade.php ENDPATH**/ ?>