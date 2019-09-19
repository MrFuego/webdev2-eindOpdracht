@extends('layout')

@section('title', 'contact us')

@section('content')

    <style>
        #textarea-test{
            height:250px;
        }
    </style>

    <div class="column is-full">
        <h1 class="title is-3">Contact us</h1>
    </div>
    <div class="column is-full">
        @if(Session::has('notification'))
            <div class="notification is-{{ Session::get('notification') }}">
                {{ Session::get('message') }}
            </div>
        @endif
    </div>

    <div class="column is-full">
        <form id="contact-form" action="{{ route('contact.mail') }}" method="POST">
            @csrf
            <h2 class="title is-5">
                Uw bericht aan ons:
            </h2>
            <div class="column is-full is-full-mobile">
                <textarea class="input" name="comment" id="textarea-test"></textarea>
            </div>
            <div class="column is-full is-full-mobile">
                <h2 class="title is-5">
                    Email adres:
                </h2>
                <input class="input" type="email" name="email">
                <h2 class="title is-5">
                    Naam:
                </h2>
                <input class="input" type="name" name="name">
            </div>
            <div class="control">
                <button type="submit" class="button is-primary">
                    @lang('labels.send')
                </button>
            </div>
        </form>
    </div>

@endsection
