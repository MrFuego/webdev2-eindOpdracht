@extends('layout')

@section('title', 'profile')

@section('content')

    @if(Session::has('notification'))
        <div class="notification is-{{ Session::get('notification') }}">
            {{ Session::get('message') }}
        </div>
    @endif




    <div class="column is-full ">
        <h1 class="title is-2">
            Mijn projecten
        </h1>
    </div>
    @foreach ($projects as $project)
        <div class="column is-half-desktop is-half-tablet is-full-mobile ">
            <div class="box">
                <div class="columns is-multiline project-profile">
                    <div class="column is-half">
                        <div class="image-project has-background-light" style="background-image: url('{{ asset($project->images->first()['filepath'])  . '/' . $project->images->first()['filename'] }}')"></div>
                    </div>
                    <div class="column is-half">
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
                            <progress class="progress is-info" value="{{ $project->progress }}" max="100"></progress>
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
                    <div class="column is-full">
                            <div class="level">
                                <div class="level-left">
                                    <form action="/projects/{{ $project->id }}/edit" method="get">
                                        <input type="hidden" value="{{ $project->id }} name="project_id">
                                        <div class="control">
                                            <button type="submit" class="button is-success">
                                                Project bewerken
                                            </button>
                                        </div>
                                    </form>
                                </div>
                                <div class="level-right">
                                    <form action="/projects/{{ $project->id }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <div class="control">
                                            <button type="submit" class="button is-danger">
                                                Project verwijderen
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>

    @endforeach

@endsection
