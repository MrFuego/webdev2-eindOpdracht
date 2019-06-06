@extends('layout')

@section('title', 'projects')

@section('content')


    <div class="column is-full">
        <div class="box">

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
    </div>

@endsection
