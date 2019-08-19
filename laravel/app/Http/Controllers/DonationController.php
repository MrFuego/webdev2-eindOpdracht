<?php

namespace App\Http\Controllers;

use App\Models\Pledge;
use Illuminate\Http\Request;
use App\Models\Reward;
use App\User;
use App\Models\Project;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class DonationController extends Controller
{
    public function makeDonation($id)
    {
        $reward = Reward::where('id', $id)->first();
        $user = Auth::user();

        if( $user !== null ){
            $user_credits = $user->credits;
        }

        $project = Project::where( 'id', $reward->project_id)->first();

        if( $user === null ){

            return Redirect::back()->with([
                'notification' => 'danger',
                'message' => 'Oeps, u bent niet ingelogd, gelieve eerst in te loggen voordat u een donatie kunt doen!'
            ]);

        }
        else if( Auth::id() === $project->user_id )
        {

            return Redirect::back()->with([
                'notification' => 'danger',
                'message' => 'Oeps, u kunt niet doneren bij uw eigen project!'
            ]);

        }
        else if( $reward->price > $user_credits )
        {
            return Redirect::back()->with([
                'notification' => 'danger',
                'message' => 'Oeps, u heeft niet genoeg credits! Koop eerst extra credits voordat u het nog eens probeert!'
            ]);
        }
        else
        {
            $donation = [];
            $donation['user_id'] = Auth::id();
            $donation['project_id'] = $reward->project_id;
            $donation['pledge'] = $reward->price;
            $donation['reward_id'] = $reward->id;

            $pledge_id = $this->saveDonation($donation);

            if ($pledge_id !== 'null'){
                $user->credits = $user_credits - $reward->price;

                $user->save();
                return Redirect::back()->with([
                    'notification' => 'success',
                    'message' => 'U heeft met succes een donatie gemaakt!'
                ]);
            }

        }
    }

    public function showDonationToProject($id){
        $userId = Auth::id();

        $project = Project::find($id);


        if($userId === 1 || $userId === $project->user_id){

            $pledges = Pledge::all()->where('project_id', $id);

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
            }else{
                $project->active = 'inactive';
            }

            $i = 1;
            foreach($pledges as $pledge){
                $userInfo = User::all()->where('id', $pledge->user_id)->first();
                $pledge->donor = $userInfo->name;
                $pledge->project_name = $project->project_name;
                $pledge->number = $i;
                $i++;
            }
            return view('projects.showDonations')->with(compact('pledges', 'project'));

        }else{
            return redirect('/');
        }
    }

    private function saveDonation($donation)
    {

        $pledge = new Pledge();

        $pledge->user_id = $donation['user_id'];
        $pledge->project_id = $donation['project_id'];
        $pledge->pledge = $donation['pledge'];
        $pledge->reward_id = $donation['reward_id'];

        $pledge->save();

        $id = $pledge->id;
        return $id;

    }
}
