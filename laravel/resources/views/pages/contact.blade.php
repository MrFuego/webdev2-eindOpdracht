@extends('layout')

@section('title', 'contact us')

@section('content')

<h1>Contact pagina</h1>

    <div class="column is-full">
        <form id="contact-form" action="{{ route('contact') }}" method="POST">
            @csrf
                <div class="column is-half is-full-mobile">
                    <input class="input" type="text">
                </div>
                <div class="column is-half is-full-mobile">
                    <h2 class="title is-5">
                        Email adres=
                    </h2>
                    <input class="input" type="email">
                    <h2 class="title is-5">
                        Naam:
                    </h2>
                    <input class="input" type="name">
                </div>

        </form>
    </div>

@endsection
