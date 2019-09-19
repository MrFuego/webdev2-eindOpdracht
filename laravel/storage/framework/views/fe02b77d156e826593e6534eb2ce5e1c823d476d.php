<?php $__env->startSection('title', 'projects'); ?>

<?php $__env->startSection('content'); ?>

    <?php $__currentLoopData = $projectsU; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $projectU): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="column is-half-desktop is-full-tablet is-full-mobile project-container-uitgelicht">
            <a href="projects/<?php echo e($projectU->id); ?>">
                <div class="box">
                    <div class="image-project has-background-light" style="background-image: url('<?php echo e(asset($projectU->images->first()['filepath'])  . '/' . $projectU->images->first()['filename']); ?>')"></div>
                    <section class="project-info">
                        <h1 class="title is-2 is-spaced"> <?php echo e($projectU->project_name); ?> </h1>
                        <p class="intro">
                            <?php echo e($projectU->project_intro); ?>

                        </p>
                        <div class="level">
                            <div class="level-left">
                                <p>
                                    <strong>
                                        <?php echo e($projectU->allPledges); ?>

                                    </strong>
                                    credits gedoneerd
                                </p>
                            </div>
                            <div class="level-right">
                                <p>
                                    <strong>
                                        <?php echo e($projectU->daysToGo); ?>

                                    </strong>
                                    dagen te gaan
                                </p>
                            </div>
                        </div>
                        <progress class="progress is-info" value="<?php echo e($projectU->progress); ?>" max="100"></progress>
                        <div class="level-right">
                            <p>
                                <strong>
                                    <?php echo e($projectU->totalBackers); ?>

                                </strong>
                                backers
                            </p>
                        </div>
                    </section>
                </div>
            </a>
        </div>

    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    <?php $__currentLoopData = $projects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $project): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="column is-one-quarter-desktop is-half-tablet is-full-mobile ">
            <a href="projects/<?php echo e($project->id); ?>">
                <div class="box">
                    <div class="image-project has-background-light" style="background-image: url('<?php echo e(asset($project->images->first()['filepath'])  . '/' . $project->images->first()['filename']); ?>')"></div>
                    <section class="project-info">
                        <h1 class="title is-5 is-spaced"> <?php echo e($project->project_name); ?> </h1>
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
                        <progress class="progress is-info" value="<?php echo e($project->progress); ?>" max="100">45%</progress>
                        <div class="level-right">
                            <p>
                                <strong>
                                    <?php echo e($project->totalBackers); ?>

                                </strong>
                                backers
                            </p>
                        </div>
                    </section>
                </div>
            </a>
        </div>


    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>



<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/hannesdebaere/Documents/GitHub/webdev2/webdev2-eindOpdracht/laravel/resources/views/projects/index.blade.php ENDPATH**/ ?>