<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index(Request $request)
    {
        return view('pages.website.index');
        # code...
    }
    public function address(Request $request)
    {
        return view('pages.website.main');
        # code...
    }
}
