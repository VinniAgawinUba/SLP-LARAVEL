<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ArticlesController extends Controller
{
    public function articles()
    {
        return view('articles');
    }

    public function article($article_id)
    {
        //pass the article_id to the view
        return view('article-view', ['article_id' => $article_id]);
    }
}
