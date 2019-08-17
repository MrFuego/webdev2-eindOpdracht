@extends('layout')

@section('title', 'projects')

@section('content')


    <div class="column is-half-desktop is-full-tablet is-full-mobile project-container-uitgelicht">
        <div class="box">
            <div class="image-project has-background-light"  style="background-image: url('http://localhost:8000/storage/project-3/AC-Dc-George-Young-55cecf4ffae5e2.jpg')">
            </div>
            <section class="project-info">
                <h1 class="title is-2 is-spaced"> {{ $projects[0]->project_name }} </h1>
                <p class="intro">
                    {{ $projects[0]->project_description }}
                </p>
                <div class="level">
                    <div class="level-left">
                        <p>
                            <strong>
                                {{ $projects[0]->allPledges }}
                            </strong>
                            credits gedoneerd
                        </p>
                    </div>
                    <div class="level-right">
                        <p>
                            <strong>
                                {{ $projects[0]->daysToGo }}
                            </strong>
                            dagen te gaan
                        </p>
                    </div>
                </div>
                <progress class="progress is-info" value="{{ $projects[0]->progress }}" max="100">45%</progress>
                <div class="level-right">
                    <p>
                        <strong>
                            {{ $projects[0]->totalBackers }}
                        </strong>
                        backers
                    </p>
                </div>
            </section>
        </div>
    </div>


    <div class="column is-half-desktop is-full-tablet is-full-mobile project-container-uitgelicht">
        <div class="box">
            <div class="image-project has-background-light"  style="background-image: url('http://localhost:8000/storage/project-3/AC-Dc-George-Young-55cecf4ffae5e2.jpg')">
            </div>
            <section class="project-info">
                <h1 class="title is-2 is-spaced"> {{ $projects[0]->project_name }} </h1>
                <p class="intro">
                    {{ $projects[0]->project_description }}
                </p>
                <div class="level">
                    <div class="level-left">
                        <p>
                            <strong>
                                {{ $projects[0]->allPledges }}
                            </strong>
                            credits gedoneerd
                        </p>
                    </div>
                    <div class="level-right">
                        <p>
                            <strong>
                                {{ $projects[0]->daysToGo }}
                            </strong>
                            dagen te gaan
                        </p>
                    </div>
                </div>
                <progress class="progress is-info" value="{{ $projects[0]->progress }}" max="100">45%</progress>
                <div class="level-right">
                    <p>
                        <strong>
                            {{ $projects[0]->totalBackers }}
                        </strong>
                        backers
                    </p>
                </div>
            </section>
        </div>
    </div>

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
