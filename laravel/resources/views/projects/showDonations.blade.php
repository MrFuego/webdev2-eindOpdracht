@extends('layout')

@section('title', 'edit project')

@section('content')

    <div class="column is-full">
        <section class="project-info">
            <h1 class="title is-5 is-spaced"> {{ $project->project_name }} </h1>
            <p class="is-italic">{{ $project->active }}</p>
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
        <section>

            <div class="table-container">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Donatie</th>
                            <th>Doneur</th>
                            <th>Projectnaam</th>
                            <th>Bedrag</th>
                            <th>Datum</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($pledges as $pledge)
                            <tr>
                                <th>{{ $pledge->number }}</th>
                                <th>{{ $pledge->donor }}</th>
                                <th>{{ $pledge->project_name }}</th>
                                <th>{{ $pledge->pledge }}</th>
                                <th>{{ $pledge->created_at }}</th>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </section>
    </div>


@endsection
