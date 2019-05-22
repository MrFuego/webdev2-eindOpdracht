<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    public function images() {
        return $this->hasMany('App\Models\Image');
    }

    public function pledges() {
        return $this->hasMany('App\Models\Pledge');
    }
}
