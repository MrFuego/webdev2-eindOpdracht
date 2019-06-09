<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pledge extends Model
{
    public function projects() {
        return $this->hasOne('App\Models\Project');
    }
}