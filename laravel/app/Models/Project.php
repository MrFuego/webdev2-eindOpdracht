<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DateTime;

class Project extends Model
{
    public function images() {
        return $this->hasMany('App\Models\Image');
    }

    public static function calculateDaysToGo($date)
    {
        $datetime1 = new DateTime(date("Y-m-d"));
        $datetime2 = new DateTime(date('Y-m-d', strtotime($date)));
        $interval = ($datetime1->diff($datetime2))->format('%a');

        return $interval;
    }
}
