<?php $__env->startSection('title', 'profile'); ?>

<?php $__env->startSection('content'); ?>

    <?php if(Session::has('notification')): ?>
        <div class="notification is-<?php echo e(Session::get('notification')); ?>">
            <?php echo e(Session::get('message')); ?>

        </div>
    <?php endif; ?>




    <div class="column is-full ">
        <h1 class="title is-2">
            Mijn projecten
        </h1>
    </div>
    <?php $__currentLoopData = $projects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $project): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="column is-full-desktop is-full-tablet is-full-mobile ">
            <div class="box">
                <div class="columns is-multiline project-profile">
                    <div class="column is-half">
                        <div class="image-project has-background-light" style="background-image: url('<?php echo e(asset($project->images->first()['filepath'])  . '/' . $project->images->first()['filename']); ?>')"></div>
                    </div>
                    <div class="column is-half">
                        <section class="project-info">
                            <h1 class="title is-5 is-spaced"> <?php echo e($project->project_name); ?> </h1>
                            <p class="is-italic"><?php echo e($project->active); ?></p>
                            <p class="intro">
                                <?php echo e($project->project_intro); ?>

                            </p>
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
                        </section>
                        <div class="level">
                            <div class="level-left">
                                <form action="/projects/<?php echo e($project->id); ?>/edit" method="get">
                                    <input type="hidden" value="<?php echo e($project->id); ?> name="project_id">
                                    <div class="control">
                                        <button type="submit" class="button is-success">
                                            Project bewerken
                                        </button>
                                    </div>
                                </form>
                            </div>

                            <div class="level-right">
                                <form action="/projects/<?php echo e($project->id); ?>/<?php echo e($project->active_link); ?>" method="post">
                                    <?php echo csrf_field(); ?>
                                    <input type="hidden" value="<?php echo e($project->id); ?> name="project_id">
                                    <div class="control">
                                        <button type="submit" class="button is-warning">
                                            Project

                                            <?php if($project->active === 'active'): ?>
                                                inactief
                                            <?php elseif($project->active === 'inactive'): ?>
                                                actief
                                            <?php endif; ?>
                                             zetten
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <div class="level">
                            <div class="level-left">
                                <form action="/projects/<?php echo e($project->id); ?>/donations" method="get">
                                    <?php echo csrf_field(); ?>
                                    <div class="control">
                                        <button type="submit" class="button is-info">
                                            Donaties bekijken
                                        </button>
                                    </div>
                                </form>
                            </div>


                            <div class="level-left">
                                <form action="/projects/<?php echo e($project->id); ?>/reacties" method="post">
                                    <?php echo csrf_field(); ?>
                                    <div class="control">
                                        <button type="submit" class="button is-info">
                                            Reacties bekijken
                                        </button>
                                    </div>
                                </form>
                            </div>

                        </div>

                        <div class="level-left">
                            <div class="level-left">
                                <form action="/projects/<?php echo e($project->id); ?>" method="post">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>
                                    <div class="control">
                                        <button type="submit" class="button is-danger">
                                            Project verwijderen
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/hannesdebaere/Documents/GitHub/webdev2/webdev2-eindOpdracht/laravel/resources/views/pages/profile.blade.php ENDPATH**/ ?>