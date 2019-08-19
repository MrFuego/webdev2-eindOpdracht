<footer>

    <nav class="navbar" role="navigation" aria-label="main navigation">
            <div class="column is-one-third has-text-centered">
                <a class="@if(Route::is('about')) is-active @endif" role="menuitem">
                    <a href="{{ route('about') }}">
                        About
                    </a>
                </a>
            </div>
            <div class="column is-one-third has-text-centered">
                <a class="@if(Route::is('contact')) is-active @endif" role="menuitem">
                    <a href="{{ route('contact') }}">
                        Contact
                    </a>
                </a>
            </div>
            <div class="column is-one-third has-text-centered">
                <a class="@if(Route::is('privacy')) is-active @endif" role="menuitem">
                    <a href="{{ route('privacy') }}">
                        Privacy
                    </a>
                </a>
            </div>
        <div class="column is-full has-text-centered">
            <p>Copyright {{ date('Y') }} Hannes De Baere</p>
        </div>
    </nav>
</footer>
