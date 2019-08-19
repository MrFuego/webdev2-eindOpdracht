
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="//cdn.ckeditor.com/4.11.4/standard/ckeditor.js"></script>
<script src="<?php echo e(asset('js/app.js')); ?>" defer></script>

<script>

    document.addEventListener('DOMContentLoaded', () => {

        // Get all "navbar-burger" elements
        const $navbarBurgers = document.getElementsByClassName('navbar-burger')[0];
        const $navbarMenu = document.getElementsByClassName('navbar-menu')[0];

        $navbarBurgers.onclick = function(){
            $navbarBurgers.classList.toggle('is-active');
            $navbarMenu.classList.toggle('is-active');
        };

    });

</script>


<?php /**PATH /Users/hannesdebaere/Documents/GitHub/webdev2/webdev2-eindOpdracht/laravel/resources/views/partials/scripts.blade.php ENDPATH**/ ?>