@extends('layout')

@section('title', 'projects')

@section('content')


    <div class="column is-one-third-desktop is-half-tablet is-full-mobile ">
        <div class="box">
            <div class="image-project has-background-light"  style="background-image: url('http://localhost:8000/storage/project-3/AC-Dc-George-Young-55cecf4ffae5e2.jpg')">
            </div>
            <section class="project-info">
                <h1 class="title is-5 is-spaced"> {{ $news->first()["title"] }} </h1>
                <p class="intro">
                    {{ $news->first()["description"] }}
                </p>
            </section>
        </div>
    </div>



@endsection
