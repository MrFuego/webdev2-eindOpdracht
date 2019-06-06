<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Image;
use App\Models\Pledge;

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
        $project = Project::all()->where('id', $project_id);

        // calculates how much days untill the project ends
        $project[0]->daysToGo = Project::calculateDaysToGo($project[0]->final_date);

        // calculates the total sum of all the pledges
        $project[0]->allPledges = Project::calculateSumOfPledges($project[0]->pledges);

        // calculates the total progress of all the pledges
        $project[0]->progress = Project::calculateDonationProgress($project[0]->goal, $project[0]->allPledges);

        // counts the amount of unique backers
        $project[0]->totalBackers = count(Pledge::all()->where('project_id', $project[0]->id)->groupBy('user_id'));

        return view('singleProject')->with(compact('project'));
    }

}
