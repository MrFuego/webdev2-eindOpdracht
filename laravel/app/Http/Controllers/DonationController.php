<?php

namespace App\Http\Controllers;

use App\Models\Pledge;
use Illuminate\Http\Request;
use App\Models\Reward;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class DonationController extends Controller
{
    public function makeDonation($id)
    {
        $reward = Reward::where('id', $id)->first();
        $user = Auth::user();
        $user_credits = $user->credits;

        if($reward->price > $user_credits){
            return Redirect::back()->with([
                'notification' => 'danger',
                'message' => 'Oeps, u heeft niet genoeg credits! Koop eerst extra credits voordat u het nog eens probeerd'
            ]);
        }else{
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
                    'message' => 'U heeft met succes een donatie gemaakt'
                ]);
            }

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
