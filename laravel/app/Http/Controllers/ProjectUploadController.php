<?php

namespace App\Http\Controllers;

// benodigde namespaces inladen
use App\Models\Image;
use App\Models\Project;
use App\Models\Category;
use App\Models\Reward;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class ProjectUploadController extends Controller
{

    public function index() {
        $categories = Category::all();

        return view('uploader.index')->with(compact('categories'));
    }

    public function store(Request $request) {

        $rules = [
            'project_name'          => 'required',
            'project_intro'         => 'required',
            'project_description'   => 'required',
            'final_date'            => 'required',
            'goal'                  => 'required|numeric',
            'project_category'      => 'required|numeric',
            'file'                  => 'required',
            'file.*'                => 'image|mimes:jpeg,png,gif,svg,jpg|max:2048',
        ];

        $validator = Validator::make($request->all(), $rules);

        if($validator->fails()) {
            return Redirect::back()
                ->withInput()
                ->withErrors($validator);

        } else{
            $userId = Auth::id();

            $project_id = $this->storeProjectToDatabase( $request->project_name, $request->project_intro, $request->project_description, $request->final_date, $request->goal, $request->project_category, $userId );


            if($request->perk_title !== 'empty'){
                for( $i = 0 ; $i < $request->amountOfPerks ; $i++){
                    $this->storeRewardToDatabase( $project_id, $request->perk_title[$i], $request->perk_price[$i], $request->perk_description[$i]);
                }
            }

            if($request->hasFile('file')) {

                // folder van de afbeeldig(en)
                $directory = '/project-' . $project_id;

                foreach($request->file('file') as $image) {

                    $name = $image->getClientOriginalName();
                    $extension = $image->getClientOriginalExtension();

                    $filename = pathinfo($name, PATHINFO_FILENAME) . '-' . uniqid(5) . '.' . $extension;

                    $image->storeAs($directory, $filename, 'public');

                    $this->storeImageToDatabase($project_id, $filename, 'storage' . $directory);

                }


            }

            return back()->with([
                'notification' => 'success',
                'message' => 'Het project is succesvol opgeladen'
            ]);
        }
    }


    private function storeProjectToDatabase( $project_name, $project_intro, $project_description, $final_date, $goal, $project_category, $userId ) {

        $project = new Project();

        $project->project_name = $project_name;
        $project->project_intro = $project_intro;
        $project->project_description = $project_description;
        $project->final_date = $final_date;
        $project->goal = $goal;
        $project->category = $project_category;
        $project->user_id = $userId;


        $project->save();

        $id = $project->id;
        return $id;

    }


    private function storeImageToDatabase( $project_id, $filename, $filepath ) {

        $image = new Image();

        $image->project_id = $project_id;
        $image->filename = $filename;
        $image->filepath = $filepath;

        $image->save();

    }

    private function storeRewardToDatabase( $project_id, $name, $price, $description ) {

        $reward = new Reward();

        $reward->project_id = $project_id;
        $reward->name = $name;
        $reward->price = $price;
        $reward->description = $description;

        $reward->save();

    }
}
