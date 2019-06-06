@extends('layout')

@section('title', 'home')

@section('content')

    <div class="column is-full">
        <h1>News page</h1>
    </div>


    @foreach ($news as $post)
        <div class="column is-one-third-desktop is-half-tablet is-full-mobile ">
            <a href="news/{{ $post->id }}">
                <div class="box">
                    <div class="image-project has-background-light"  style="background-image: url('http://localhost:8000/storage/project-3/AC-Dc-George-Young-55cecf4ffae5e2.jpg')">
                    </div>
                    <section class="project-info">
                        <h1 class="title is-5 is-spaced"> {{ $post->title }} </h1>
                        <p class="intro">
                            {{ $post->description }}
                        </p>
                    </section>
                </div>
            </a>
        </div>
    @endforeach


@endsection
