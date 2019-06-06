<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewspageController extends Controller
{
    public function news()
    {
        return view('news');
    }
}
