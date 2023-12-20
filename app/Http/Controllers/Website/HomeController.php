<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Area;

class HomeController extends Controller
{
    public function areas(Request $request)
    {

        $data = Area::where('city_id',$request->city_id)->get();
        return $data;
        # code...
    }
    //
}
