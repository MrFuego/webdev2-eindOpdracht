@extends('layout')

@section('front-page-content')

<div class="project-container-first" style="background-image: url('http://localhost:8000/storage/project-3/AC-Dc-George-Young-55cecf4ffae5e2.jpg')">
    <div class="project-info">
        <h1> {{ $projects[0]->project_name }} </h1>
        <h2> 10209 </h2>
        <h3> pledged from {{ $projects[0]->goal }} </h3>

        <h2> 25 </h2>
        <h3> backers </h3>

        <h2> {{ $projects[0]->daysToGo }}</h2>
        <h3> dagen te gaan </h3>
    </div>
</div>

@endsection



@section('content')
    @foreach ($projects as $project)

        <div class="project-container" style="background-image: url('{{ asset($project->images->first()['filepath'])  . '/' . $project->images->first()['filename'] }}')">
            <div class="project-info">
                <h1> {{ $project->project_name }} </h1>
                <h2> 10209 </h2>
                <h3> pledged from {{ $project->goal }} </h3>

                <h2> 25 </h2>
                <h3> backers </h3>

                <h2> {{ $project->daysToGo }}</h2>
                <h3> dagen te gaan </h3>
            </div>
        </div>


    @endforeach



@endsection
