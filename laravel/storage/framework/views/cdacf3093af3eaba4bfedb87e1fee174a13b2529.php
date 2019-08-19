<footer>

    <nav class="navbar" role="navigation" aria-label="main navigation">
            <div class="column is-one-third has-text-centered">
                <a class="<?php if(Route::is('about')): ?> is-active <?php endif; ?>" role="menuitem">
                    <a href="<?php echo e(route('about')); ?>">
                        About
                    </a>
                </a>
            </div>
            <div class="column is-one-third has-text-centered">
                <a class="<?php if(Route::is('contact')): ?> is-active <?php endif; ?>" role="menuitem">
                    <a href="<?php echo e(route('contact')); ?>">
                        Contact
                    </a>
                </a>
            </div>
            <div class="column is-one-third has-text-centered">
                <a class="<?php if(Route::is('privacy')): ?> is-active <?php endif; ?>" role="menuitem">
                    <a href="<?php echo e(route('privacy')); ?>">
                        Privacy
                    </a>
                </a>
            </div>
        <div class="column is-full has-text-centered">
            <p>Copyright <?php echo e(date('Y')); ?> Hannes De Baere</p>
        </div>
    </nav>
</footer>
<?php /**PATH /Users/hannesdebaere/Documents/GitHub/webdev2/webdev2-eindOpdracht/laravel/resources/views/partials/footer.blade.php ENDPATH**/ ?>