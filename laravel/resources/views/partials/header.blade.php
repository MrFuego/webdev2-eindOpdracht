<header>
    <nav>
        <ul class="menu" role="menubar">
            <li class="@if(Route::is('index')) is-active @endif" role="menuitem">
            <a href="{{ route('index') }}">
                Home
            </a>
            </li>
            <li class="@if(Route::is('projects')) is-active @endif" role="menuitem">
                <a href="{{ route('projects') }}">
                    Projecten
                </a>
            </li>
            <li class="@if(Route::is('news')) is-active @endif" role="menuitem">
                <a href="{{ route('news') }}">
                    Nieuws
                </a>
            </li>
            @if(Auth::check())
            <li class="@if(Route::is('stripe.post')) is-active @endif" role="menuitem">
            <a href="{{ route('stripe.post') }}">
                Credits kopen
            </a>
            </li>
            <li class="@if(Route::is('profile')) is-active @endif" role="menuitem">
                <a href="{{ route('profile') }}">
                    Profile
                </a>
            </li>

            <li class="@if(Route::is('project.add')) is-active @endif" role="menuitem">
                <a href="{{ route('project.add') }}">
                    Start een campagne
                </a>
            </li>
            <li role="menuitem">
                <a href="{{ route('project.add') }}">
                    Logout
                </a>
            </li>

            @else
            <li class="@if(Route::is('login')) is-active @endif" role="menuitem">
                <a href="{{ route('login') }}">
                    Login
                </a>
            </li>

            @endif

            <!-- Authentication Links -->
            @guest
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                </li>
                @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                    </li>
                @endif
            @else
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }} <span class="caret"></span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
            @endguest
        </ul>
    </nav>
</header>
