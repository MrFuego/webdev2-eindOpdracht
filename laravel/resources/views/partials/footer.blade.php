<footer>
    <ul class="menu" role="menubar">
        <li class="@if(Route::is('about')) is-active @endif" role="menuitem">
            <a href="{{ route('about') }}">
                About
            </a>
        </li>
        <li class="@if(Route::is('contact')) is-active @endif" role="menuitem">
            <a href="{{ route('contact') }}">
                Contact
            </a>
        </li>
        <li class="@if(Route::is('privacy')) is-active @endif" role="menuitem">
            <a href="{{ route('privacy') }}">
                Privacy
            </a>
        </li>
    <ul class="menu" role="menubar">


    <p>Copyright {{ date('Y') }}</p>

</footer>
