<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Project;
use App\Models\Image;

class HomepageController extends Controller
{
    public function home()
    {

        $projects = Project::all();
        foreach($projects as $project){
            $project->daysToGo = Project::calculateDaysToGo($project->final_date);
        }

        return view('welcome')->with(compact('projects'));

    }


}
