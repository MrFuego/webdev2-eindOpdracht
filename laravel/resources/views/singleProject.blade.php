@extends('layout')

@section('title', 'projects')

@section('content')


    <div class="column is-half">
        <div class="box">
            <div class="image-project has-background-light" style="background-image: url('{{ asset($project->images->first()->filepath)  . '/' . $project->images->first()->filename }}')"></div>

            @foreach ($project->images as $image)
                <div class="column is-one-quarter-desktop is-one-third-tablet is-half-tablet ">
                    <div class="image-project has-background-light" style="background-image: url('{{ asset($image->filepath)  . '/' . $image->filename }}')"></div>
                </div>
            @endforeach
        </div>
    </div>
    <div class="column is-half">
        <section class="project-info">
            <h1 class="title is-5 is-spaced"> {{ $project->first()['project_name'] }} </h1>
            <p class="intro">
                {{ $project->first()['project_description'] }}
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

@endsection
