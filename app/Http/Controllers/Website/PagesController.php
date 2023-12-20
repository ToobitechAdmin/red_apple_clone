<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\City;
use App\Models\Area;
use App\Models\Branch;

use Illuminate\Support\Facades\Cache;
class PagesController extends Controller
{

    public function index(Request $request)
    {
        if (!Cache::has('cache-data')) {
            return redirect()->route('website.location');
        } else {
            $data = Category::with(['products'])->get();
            return view('pages.website.index',compact('data'));
        }
    }
    public function location(Request $request)
    {
        $data['city'] = City::all();
        $data['area'] = Area::all();
        $data['branch'] = Branch::with('city')->get();
        return view('pages.website.main',compact('data'));
        if (!Cache::has('cache-data')) {
        } else {
            $data = Category::with(['products'])->get();
            return redirect()->route('website.home');
        }

        # code...
    }

    public function checkout(Request $request)
    {
        return view('pages.website.checkout');

    }
    public function profile(Request $request)
    {
        return view('pages.website.profile');

    }
    public function returnPolicy(Request $request)
    {
        return view('pages.website.return_policy');

    }
    public function policyPrivacy(Request $request)
    {
        return view('pages.website.policyPrivacy');

    }
    public function termCondition(Request $request)
    {
        return view('pages.website.term_condition');

    }
    public function contactUs(Request $request)
    {
        return view('pages.website.contact_us');

    }

    public function saveData(Request $request)
    {
        $data = $request->all();
        if ($request->area_id) {
            # code...
            $data['area'] = Area::find($request->area_id);
        }
        if ($request->branch_id) {
            # code...
            $data['branch'] = Branch::find($request->branch_id);
        }

        Cache::put('cache-data', $data, now()->addDays(2));
        $cachedData = Cache::get('cache-data');
        //  return $cachedData['deliverytype'];
        return 'save data';
        # code...
    }

}
