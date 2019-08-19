<?php

namespace App\Http\Controllers;


use App\Models\Project;
use App\Models\Pledge;

use Illuminate\Support\Facades\Auth;

class ProfilepageController extends Controller
{
    public function index(){

        $userId = Auth::id();

        if($userId === 1){
            $projects = Project::All();
        }else{
            $projects = Project::all()->where('user_id', $userId);
        }

        foreach($projects as $project){

            // calculates how much days untill the project ends
            $project->daysToGo = Project::calculateDaysToGo($project->final_date);

            // calculates the total sum of all the pledges
            $project->allPledges = Project::calculateSumOfPledges($project->pledges);

            // calculates the total progress of all the pledges
            $project->progress = Project::calculateDonationProgress($project->goal, $project->allPledges);

            // counts the amount of unique backers
            $project->totalBackers = count(Pledge::all()->where('project_id', $project->id)->groupBy('user_id'));

            if($project->active == 1){
                $project->active = 'active';
                $project->active_link = 'inactive';
            }else{
                $project->active = 'inactive';
                $project->active_link = 'active';
            }
        }

        return view('pages/profile')->with(compact('projects'));
    }
}
