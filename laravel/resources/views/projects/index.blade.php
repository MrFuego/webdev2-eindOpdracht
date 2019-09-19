@extends('layout')

@section('title', 'projects')

@section('content')

    @foreach($projectsU as $projectU)
        <div class="column is-half-desktop is-full-tablet is-full-mobile project-container-uitgelicht">
            <a href="projects/{{ $projectU->id }}">
                <div class="box">
                    <div class="image-project has-background-light" style="background-image: url('{{ asset($projectU->images->first()['filepath'])  . '/' . $projectU->images->first()['filename'] }}')"></div>
                    <section class="project-info">
                        <h1 class="title is-2 is-spaced"> {{ $projectU->project_name }} </h1>
                        <p class="intro">
                            {{ $projectU->project_intro }}
                        </p>
                        <div class="level">
                            <div class="level-left">
                                <p>
                                    <strong>
                                        {{ $projectU->allPledges }}
                                    </strong>
                                    credits gedoneerd
                                </p>
                            </div>
                            <div class="level-right">
                                <p>
                                    <strong>
                                        {{ $projectU->daysToGo }}
                                    </strong>
                                    dagen te gaan
                                </p>
                            </div>
                        </div>
                        <progress class="progress is-info" value="{{ $projectU->progress }}" max="100"></progress>
                        <div class="level-right">
                            <p>
                                <strong>
                                    {{ $projectU->totalBackers }}
                                </strong>
                                backers
                            </p>
                        </div>
                    </section>
                </div>
            </a>
        </div>

    @endforeach

    @foreach ($projects as $project)
        <div class="column is-one-quarter-desktop is-half-tablet is-full-mobile ">
            <a href="projects/{{ $project->id }}">
                <div class="box">
                    <div class="image-project has-background-light" style="background-image: url('{{ asset($project->images->first()['filepath'])  . '/' . $project->images->first()['filename'] }}')"></div>
                    <section class="project-info">
                        <h1 class="title is-5 is-spaced"> {{ $project->project_name }} </h1>
                        <p class="intro">
                            {{ $project->project_intro }}
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
