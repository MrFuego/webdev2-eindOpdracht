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
            </ul>
        </div>
    </div>
</div>
<!-- End Top Bar -->
