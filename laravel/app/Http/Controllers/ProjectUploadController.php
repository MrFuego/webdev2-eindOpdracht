<?php

namespace App\Http\Controllers;

// benodigde namespaces inladen
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use App\Models\Project;

class ProjectUploadController extends Controller
{
    public function index() {

        //VOORBEELD OM DINGEN UIT DATABASE TE HALEN
//        $project = Project::where('id', 1)->first();

//       dd($project->images);


        $images = Image::all();

        return view('uploader.index')->with(compact('images'));
    }

    public function store(Request $request) {

        $rules = [
            'project_id'    => 'required|numeric',
            'file'          => 'required',
            'file.*'        => 'image|mimes:jpeg,png,gif,svg,jpg|max:2048',
        ];

        $validator = Validator::make($request->all(), $rules);

        if($validator->fails()) {
            return Redirect::back()
                ->withInput()
                ->withErrors($validator)
                ->with(
                    [
                    'notification' => 'danger',
                    'message' => 'something went wrong!'
                    ]
                );
        }

        if($request->hasFile('file')) {

            // folder van de afbeeldig(en)
            $directory = '/project-' . $request->project_id;

            foreach($request->file('file') as $image) {

                $name = $image->getClientOriginalName();
                $extension = $image->getClientOriginalExtension();

                $filename = pathinfo($name, PATHINFO_FILENAME) . '-' . uniqid(5) . '.' . $extension;

                $image->storeAs($directory, $filename, 'public');

                $this->storeImageToDatabase($request->project_id, $filename, 'storage' . $directory);

            }

            return back()->with([
                'notification' => 'success',
                'message' => 'De afbeeldingen zijn succesvol opgeladen'
            ]);
        }
    }

    private function storeImageToDatabase( $project_id, $filename, $filepath ) {

        $image = new Image();

        $image->project_id = $project_id;
        $image->filename = $filename;
        $image->filepath = $filepath;

        $image->save();

    }
}
