<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Pledge;
use App\Models\Image;
use App\Models\Reward;
use Illuminate\Support\Facades\Storage;
use App\Models\Category;

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

        $project->rewards = Reward::all()->where('project_id', $project_id);

        $project->id = $project_id;

        return view('singleProject')->with(compact('project'));
    }



    public function edit($id){

        $project = Project::findOrFail($id);

        $categories = Category::all();

        return view('projectEdit')->with( compact('project', 'categories') );
    }

    public function update(){


        dd(request()->data);
    }



    public function destroy($id){
        //dd($id);

        $project = Project::findOrFail($id);

        if($project->pledges->first()){
            return back()->with([
                'notification' => 'danger',
                'message' => 'dit project kan niet verwijderd worden omdat er al donaties zijn!'
            ]);
        }else{

            $project->images = Image::all()->where('project_id', $id);

            foreach( $project->images as $image){
                $file = str_replace('storage/', '', $image->filepath) . '/' . $image->filename;

                Storage::disk('public')->delete($file);

            }

            rmdir(storage_path('app/public/project-'.$id));


            $project->images()->delete();

            $project->rewards()->delete();

            $project->delete();
            return back()->with([
                'notification' => 'success',
                'message' => 'Het project is succesvol verwijderd'
            ]);
            return redirect('/profile');
        }


    }

}
