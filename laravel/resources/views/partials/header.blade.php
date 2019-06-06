<header>
    <nav class="navbar is-fixed-top" role="navigation" aria-label="main navigation">
        <div class="container is-full-width">
            <div class="navbar-brand">
                <a class="navbar-item" href="https://bulma.io">
                <img src="https://bulma.io/images/bulma-logo.png" width="112" height="28">
                </a>

                <div class="navbar-burger">
                    <span aria-hidden="true"></span>
                    <span aria-hidden="true"></span>
                    <span aria-hidden="true"></span>
                </div>
            </div>

            <div id="nav-menu" class="navbar-menu">
                <div class="navbar-start">
                    <a class="navbar-item @if(Route::is('index')) is-active @endif" href="{{ route('index') }}">
                        Home
                    </a>
                    <a class="navbar-item @if(Route::is('projects')) is-active @endif" href="{{ route('projects') }}">
                        Projecten
                    </a>
                    <a class="navbar-item @if(Route::is('news')) is-active @endif" href="{{ route('news') }}">
                        Nieuws
                    </a>
                    @if(Auth::check())
                        <a class="navbar-item @if(Route::is('project.add')) is-active @endif" href="{{ route('project.add') }}">
                            Start een campagne
                        </a>
                    @endif
                </div>
                <div class="navbar-end">
                    <!-- Authentication Links -->
                    @guest
                        <div class="buttons">
                            <a class="navbar-item button is-primary" href="{{ route('login') }}">{{ __('Login') }}</a>
                            @if (Route::has('register'))
                                <a class="navbar-item button is-light" href="{{ route('register') }}">{{ __('Register') }}</a>
                            @endif
                    @else
                        <div class="navbar-item has-dropdown is-hoverable">
                            <a class="navbar-link navbar-item @if(Route::is('profile')) is-active @endif" href="{{ route('profile') }}">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class="navbar-dropdown">
                                <a class="navbar-item @if(Route::is('stripe.post')) is-active @endif" href="{{ route('stripe.post') }}">
                                    Credits kopen
                                </a>
                                <a class="navbar-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </div>
                    @endguest
                </div>

            </div>
        </div>
    </nav>
</header>
