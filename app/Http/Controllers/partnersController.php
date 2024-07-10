<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\partners;

class PartnersController extends Controller
{
    public function Frontpage_partners()
    {
        $partners = partners::all();
        return view('partners', ['partners_list' => $partners]);
    }
}
