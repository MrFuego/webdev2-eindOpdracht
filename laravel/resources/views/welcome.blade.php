<?php

    function calculateDaysToGo($date)
    {
        $datetime1 = new DateTime(date("Y-m-d"));
        $datetime2 = new DateTime(date('Y-m-d', strtotime($date)));
        $interval = ($datetime1->diff($datetime2))->format('%a');

        return $interval;
    }
?>

@extends('layout')

@section('content')


    @foreach ($projects as $project)

        <div>

            <img src=" " alt="">
            <div>
                <h1> {{ $project->project_name }} </h1>
                <h2> 10209 </h2>
                <h3> pledged from {{ $project->goal }} </h3>

                <h2> 25 </h2>
                <h3> backers </h3>

                <h2> {{ calculateDaysToGo($project->final_date) }}</h2>
                <h3> dagen te gaan </h3>
            </div>
        </div>
    @endforeach



@endsection
