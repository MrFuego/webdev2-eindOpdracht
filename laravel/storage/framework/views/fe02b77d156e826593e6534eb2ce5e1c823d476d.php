<?php $__env->startSection('title', 'projects'); ?>

<?php $__env->startSection('content'); ?>


    <div class="column is-half-desktop is-full-tablet is-full-mobile project-container-uitgelicht">
        <div class="box">
            <div class="image-project has-background-light"  style="background-image: url('http://localhost:8000/storage/project-3/AC-Dc-George-Young-55cecf4ffae5e2.jpg')">
            </div>
            <section class="project-info">
                <h1 class="title is-2 is-spaced"> <?php echo e($projects[0]->project_name); ?> </h1>
                <p class="intro">
                    <?php echo e($projects[0]->project_description); ?>

                </p>
                <div class="level">
                    <div class="level-left">
                        <p>
                            <strong>
                                <?php echo e($projects[0]->allPledges); ?>

                            </strong>
                            credits gedoneerd
                        </p>
                    </div>
                    <div class="level-right">
                        <p>
                            <strong>
                                <?php echo e($projects[0]->daysToGo); ?>

                            </strong>
                            dagen te gaan
                        </p>
                    </div>
                </div>
                <progress class="progress is-info" value="<?php echo e($projects[0]->progress); ?>" max="100">45%</progress>
                <div class="level-right">
                    <p>
                        <strong>
                            <?php echo e($projects[0]->totalBackers); ?>

                        </strong>
                        backers
                    </p>
                </div>
            </section>
        </div>
    </div>


    <div class="column is-half-desktop is-full-tablet is-full-mobile project-container-uitgelicht">
        <div class="box">
            <div class="image-project has-background-light"  style="background-image: url('http://localhost:8000/storage/project-3/AC-Dc-George-Young-55cecf4ffae5e2.jpg')">
            </div>
            <section class="project-info">
                <h1 class="title is-2 is-spaced"> <?php echo e($projects[0]->project_name); ?> </h1>
                <p class="intro">
                    <?php echo e($projects[0]->project_description); ?>

                </p>
                <div class="level">
                    <div class="level-left">
                        <p>
                            <strong>
                                <?php echo e($projects[0]->allPledges); ?>

                            </strong>
                            credits gedoneerd
                        </p>
                    </div>
                    <div class="level-right">
                        <p>
                            <strong>
                                <?php echo e($projects[0]->daysToGo); ?>

                            </strong>
                            dagen te gaan
                        </p>
                    </div>
                </div>
                <progress class="progress is-info" value="<?php echo e($projects[0]->progress); ?>" max="100">45%</progress>
                <div class="level-right">
                    <p>
                        <strong>
                            <?php echo e($projects[0]->totalBackers); ?>

                        </strong>
                        backers
                    </p>
                </div>
            </section>
        </div>
    </div>

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