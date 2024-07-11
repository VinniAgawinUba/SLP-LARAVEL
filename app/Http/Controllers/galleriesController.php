<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\gallery;

class GalleriesController extends Controller
{
    public function gallery(Request $request)
    {
        $itemsPerPage = 3;
        $currentPage = $request->query('page', 1);
        
        $galleries = gallery::orderBy('id', 'desc')->paginate($itemsPerPage);

        return view('gallery', compact('galleries', 'currentPage'));
    }
}
