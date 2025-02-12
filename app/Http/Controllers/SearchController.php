<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\projects;
use App\Models\articles;
use App\Models\gallery;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->input('query');

        // Search projects
        $projects = projects::where('name', 'LIKE', "%{$query}%")
                            ->orWhere('description', 'LIKE', "%{$query}%")
                            ->paginate(10, ['*'], 'projects_page');

        // Search articles
        $articles = articles::where('thumb_nail_title', 'LIKE', "%{$query}%")
                            ->orWhere('thumb_nail_title', 'LIKE', "%{$query}%")
                            ->paginate(10, ['*'], 'articles_page');

        // Search galleries
        $galleries = gallery::where('name', 'LIKE', "%{$query}%")
                            ->paginate(10, ['*'], 'galleries_page');


                            

        return view('search-results', compact('projects', 'articles', 'galleries', 'query'));
    }
}
