<header>
    <nav class="navbar is-fixed-top" role="navigation" aria-label="main navigation">
        <div class="container is-full-width">
            <div class="navbar-brand">
                <a class="navbar-item" href="<?php echo e(route('index')); ?>">
                <img src="http://localhost:8000/storage/logo/logo.svg" width="112" height="28">
                </a>

                <div class="navbar-burger">
                    <span aria-hidden="true"></span>
                    <span aria-hidden="true"></span>
                    <span aria-hidden="true"></span>
                </div>
            </div>

            <div id="nav-menu" class="navbar-menu">
                <div class="navbar-start">
                    <a class="navbar-item <?php if(Route::is('index')): ?> is-active <?php endif; ?>" href="<?php echo e(route('index')); ?>">
                        Home
                    </a>
                    <a class="navbar-item <?php if(Route::is('projects.index')): ?> is-active <?php endif; ?>" href="<?php echo e(route('projects.index')); ?>">
                        Projecten
                    </a>
                    <a class="navbar-item <?php if(Route::is('news')): ?> is-active <?php endif; ?>" href="<?php echo e(route('news')); ?>">
                        Nieuws
                    </a>
                    <?php if(Auth::check()): ?>
                        <a class="navbar-item <?php if(Route::is('project.add')): ?> is-active <?php endif; ?>" href="<?php echo e(route('project.add')); ?>">
                            Start een campagne
                        </a>
                    <?php endif; ?>
                </div>
                <div class="navbar-end">
                    <!-- Authentication Links -->
                    <?php if(auth()->guard()->guest()): ?>
                        <div class="buttons">
                            <a class="navbar-item button is-primary" href="<?php echo e(route('login')); ?>"><?php echo e(__('Login')); ?></a>
                            <?php if(Route::has('register')): ?>
                                <a class="navbar-item button is-light" href="<?php echo e(route('register')); ?>"><?php echo e(__('Register')); ?></a>
                            <?php endif; ?>
                    <?php else: ?>
                        <div class="navbar-item has-dropdown is-hoverable">
                            <a class="navbar-link navbar-item <?php if(Route::is('profile')): ?> is-active <?php endif; ?>" href="<?php echo e(route('profile')); ?>">
                                <?php echo e(Auth::user()->name); ?> <span class="caret"></span>
                            </a>

                            <div class="navbar-dropdown">
                                <a class="navbar-item <?php if(Route::is('stripe.post')): ?> is-active <?php endif; ?>" href="<?php echo e(route('stripe.post')); ?>">
                                    Credits kopen
                                </a>
                                <a class="navbar-item" href="<?php echo e(route('logout')); ?>"
                                onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                    <?php echo e(__('Logout')); ?>

                                </a>

                                <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                                    <?php echo csrf_field(); ?>
                                </form>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>

            </div>
        </div>
    </nav>
</header>
<?php /**PATH /Users/hannesdebaere/Documents/GitHub/webdev2/webdev2-eindOpdracht/laravel/resources/views/partials/header.blade.php ENDPATH**/ ?>