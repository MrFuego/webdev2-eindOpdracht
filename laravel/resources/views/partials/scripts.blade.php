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
