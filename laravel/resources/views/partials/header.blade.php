<!-- Start Top Bar -->
<div class="top-bar">
    <div class="row">
        <div class="top-bar-left">
            <ul class="menu" role="menubar">
                <li class="@if(Route::is('index')) is-active @endif" role="menuitem">
                  <a href="{{ route('index') }}">
                    Home
                  </a>
                </li>
                <li class="@if(Route::is('stripe.post')) is-active @endif" role="menuitem">
                  <a href="{{ route('stripe.post') }}">
                    Credits kopen
                  </a>
                </li>
                <li class="@if(Route::is('login')) is-active @endif" role="menuitem">
                  <a href="{{ route('login') }}">
                    Login
                  </a>
                </li>
                <li class="@if(Route::is('profile')) is-active @endif" role="menuitem">
                    <a href="{{ route('profile') }}">
                        Profile
                    </a>
                </li>
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
            </ul>
        </div>
    </div>
</div>
<!-- End Top Bar -->
