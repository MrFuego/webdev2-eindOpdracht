<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Pledge;
use App\Models\Image;

class ProjectsController extends Controller
{
    public function projects()
    {

        $projects = Project::all();

        foreach($projects as $project){

            // calculates how much days untill the project ends
            $project->daysToGo = Project::calculateDaysToGo($project->final_date);

            // calculates the total sum of all the pledges
            $project->allPledges = Project::calculateSumOfPledges($project->pledges);

            // calculates the total progress of all the pledges
            $project->progress = Project::calculateDonationProgress($project->goal, $project->allPledges);

            // counts the amount of unique backers
            $project->totalBackers = count(Pledge::all()->where('project_id', $project->id)->groupBy('user_id'));
        }

        return view('projects')->with(compact('projects'));

    }

    public function getProject($project_id)
    {
        $project = Project::where('id', $project_id);

        // calculates how much days untill the project ends
        $project->daysToGo = Project::calculateDaysToGo($project->first()['final_date']);


        // calculates the total sum of all the pledges
        $project->allPledges = Project::calculateSumOfPledges($project->first()['pledges']);

        // calculates the total progress of all the pledges
        $project->progress = Project::calculateDonationProgress($project->first()['goal'], $project->first()['allPledges']);

        // counts the amount of unique backers
        $project->totalBackers = count(Pledge::all()->where('project_id', $project->first()['id'])->groupBy('user_id'));

        $project->images = Image::all()->where('project_id', $project_id);

        return view('singleProject')->with(compact('project'));
    }

}
