<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    public function images() {
        return $this->hasOne('App\Models\Image');
    }

}
