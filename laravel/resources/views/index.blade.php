@extends('layout')

@section('title', 'home')

@section('content')


    <div class="column is-full intro-text">
        <div class="has-text-centered">
            <h1 class="title is-1">
                Wie zijn wij?
            </h1>
            <h2 class="title is-3 has-text-weight-light">
                Wij zijn <strong class="has-text-weight-bold"> Clickstarter </strong> <br>
                Wij zijn een online platform om jou te helpen met het bekend maken en financieren van jouw project! <br>
                <strong class="is-italic has-text-weight-bold"> You click it, we start it!</strong>
            </h2>
        </div>
    </div>


    <div class="column is-full">

        <h2 class="title is-3">Uitgelichte projecten</h2>

    </div>

    @foreach ($projects as $project)
        <div class="column is-one-quarter-desktop is-one-third-tablet is-half-tablet ">
            <a href="projects/{{ $project->id }}">
                <div class="box">
                    <div class="image-project has-background-light" style="background-image: url('{{ asset($project->images->first()['filepath'])  . '/' . $project->images->first()['filename'] }}')"></div>
                    <section class="project-info">
                        <h1 class="title is-5 is-spaced"> {{ $project->project_name }} </h1>
                        <p class="intro">
                            {{ $project->project_description }}
                        </p>
                        <div class="level">
                            <div class="level-left">
                                <p>
                                    <strong>
                                        {{ $project->allPledges }}
                                    </strong>
                                    credits gedoneerd
                                </p>
                            </div>
                            <div class="level-right">
                                <p>
                                    <strong>
                                        {{ $project->daysToGo }}
                                    </strong>
                                    dagen te gaan
                                </p>
                            </div>
                        </div>
                        <progress class="progress is-info" value="{{ $project->progress }}" max="100">45%</progress>
                        <div class="level-right">
                            <p>
                                <strong>
                                    {{ $project->totalBackers }}
                                </strong>
                                backers
                            </p>
                        </div>
                    </section>
                </div>
            </a>
        </div>


    @endforeach
    <div class="column is-full">

        <h2 class="title is-3">Recent nieuws</h2>

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
