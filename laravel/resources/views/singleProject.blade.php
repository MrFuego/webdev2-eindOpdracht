@extends('layout')

@section('title', 'projects')

@section('content')


    <div class="column is-full">
        <div class="box">
            <div class="image-project has-background-light" style="background-image: url('{{ asset($project[0]->images->first()['filepath'])  . '/' . $project[0]->images->first()['filename'] }}')"></div>
            <section class="project-info">
                <h1 class="title is-5 is-spaced"> {{ $project[0]->project_name }} </h1>
                <p class="intro">
                    {{ $project[0]->project_description }}
                </p>
                <div class="level">
                    <div class="level-left">
                        <p>
                            <strong>
                                {{ $project[0]->allPledges }}
                            </strong>
                            credits gedoneerd
                        </p>
                    </div>
                    <div class="level-right">
                        <p>
                            <strong>
                                {{ $project[0]->daysToGo }}
                            </strong>
                            dagen te gaan
                        </p>
                    </div>
                </div>
                <progress class="progress is-info" value="{{ $project[0]->progress }}" max="100">45%</progress>
                <div class="level-right">
                    <p>
                        <strong>
                            {{ $project[0]->totalBackers }}
                        </strong>
                        backers
                    </p>
                </div>
            </section>
        </div>
    </div>

@endsection
