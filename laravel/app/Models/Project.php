<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DateTime;

class Project extends Model
{
    public function images() {
        return $this->hasMany('App\Models\Image');
    }

    public function rewards() {
        return $this->hasMany('App\Models\Reward');
    }

    public function pledges() {
        return $this->hasMany('App\Models\Pledge');
    }

    public static function calculateDaysToGo($date)
    {
        $datetime1 = new DateTime(date("Y-m-d"));
        $datetime2 = new DateTime(date('Y-m-d', strtotime($date)));
        $interval = ($datetime1->diff($datetime2))->format('%a');

        return $interval;
    }

    public static function calculateSumOfPledges($pledges)
    {
        $totalPledges = 0;
        foreach ($pledges as $pledge){
            $totalPledges += $pledge['pledge'];
        }
        return $totalPledges;
    }
}
