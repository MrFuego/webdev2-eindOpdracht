@extends('layout')

@section('title', 'projects')

@section('content')


    @foreach ($projects as $project)
        <div class="column is-one-quarter-desktop is-half-tablet is-full-mobile ">
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



@endsection
