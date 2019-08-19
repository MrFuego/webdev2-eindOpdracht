<?php $__env->startSection('title', 'edit project'); ?>

<?php $__env->startSection('content'); ?>

    <div class="column is-full">
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
    </div>


    <div class="column is-full">
        <section>

            <div class="table-container">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Donatie</th>
                            <th>Doneur</th>
                            <th>Projectnaam</th>
                            <th>Bedrag</th>
                            <th>Datum</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php $__currentLoopData = $pledges; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pledge): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <th><?php echo e($pledge->number); ?></th>
                                <th><?php echo e($pledge->donor); ?></th>
                                <th><?php echo e($pledge->project_name); ?></th>
                                <th><?php echo e($pledge->pledge); ?></th>
                                <th><?php echo e($pledge->created_at); ?></th>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </tbody>
                </table>
            </div>
        </section>
    </div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/hannesdebaere/Documents/GitHub/webdev2/webdev2-eindOpdracht/laravel/resources/views/projects/showDonations.blade.php ENDPATH**/ ?>