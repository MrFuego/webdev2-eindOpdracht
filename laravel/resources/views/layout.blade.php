<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('title', 'Clickstarter')</title>

        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

        <!-- Styles -->
        @include('partials.styles')

        <!-- Sripts -->
        @include('partials.scripts')


    </head>
    <body class="has-navbar-fixed-top">

        @include('partials.header')

        <section class="section">
            <div class="container is-widescreen">
                <div class="columns is-multiline is-variable is-2">

                    @yield('content')

                </div>
            </div>
        </section>

        @include('partials.footer')

    </body>
</html>
