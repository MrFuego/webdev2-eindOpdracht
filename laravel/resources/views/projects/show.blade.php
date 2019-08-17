@extends('layout')

@section('title', 'projects')

@section('content')

    @if(Session::has('notification'))
        <div class="column is-full">
            <div class="notification is-{{ Session::get('notification') }}">
                {{ Session::get('message') }}
            </div>
        </div>
    @endif

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
            <div class="individual-project-info">
                <h1 class="title is-4 is-spaced"> {{ $project->first()['project_name'] }} </h1>
                <p class="intro">
                    {{ $project->first()['project_intro'] }}
                </p>
            </div>
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
            <div class="level-right">
                <button id="download-project-{{ $project->totalBackers }}" type="submit" class="button is-primary download-pdf">
                    pdf downloaden
                </button>
            </div>
        </section>
    </div>
    <div class="column is-three-quarters project_explenation">
        {!! $project->first()['project_description'] !!}
    </div>
    <div class="column is-one-quarter">
        @foreach ( $project->rewards as $reward )
            <div class="box box-reward">
                <p>
                    Doneer <strong class="has-text-weight-bold">{{ $reward->price }}</strong> Cr of meer
                </p>
                <h2 class="title is-6">
                    {{ $reward->name }}
                </h2>
                <p>
                    {{ $reward->description }}
                </p>
                <div class="control">
                    <form action="/buy/{{ $reward->id }}" method="post">
                        @csrf
                        <button id="buy-perk-{{ $reward->id }}" type="submit" class="button is-primary buy-perk">
                            Koop deze reward
                        </button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>

@endsection
