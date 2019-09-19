<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Pledge;
use App\Models\News;

class HomepageController extends Controller
{
    public function home()
    {

        $projects = Project::all()->where('uitgelicht', '1')->where('active', 1)->random(4);

        $news = News::orderBy('created_at', 'desc')->take(3)->get();

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

        return view('index')->with(compact('projects', 'news'));
    }


}
