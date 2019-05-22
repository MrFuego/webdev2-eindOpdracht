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

        return view('welcome')->with(compact('projects'));

    }
}
