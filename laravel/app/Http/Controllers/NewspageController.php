<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;

class NewspageController extends Controller
{
    public function news()
    {

        $news = News::orderBy('created_at', 'desc')->get();

        return view('news')->with(compact('news'));
    }

    public static function getNews($news_id)
    {
        $news = News::all()->where('id', $news_id);

        return view('singleNews')->with(compact('news'));
    }
}
