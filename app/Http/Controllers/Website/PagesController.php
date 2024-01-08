<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\City;
use App\Models\Area;
use App\Models\Branch;
use App\Models\Privacy;
use App\Models\Term;
use App\Models\Refund;
use App\Models\Pickuptime;
use App\Models\Deliverytime;
use Illuminate\Support\Facades\Cache;
class PagesController extends Controller
{

    public function index(Request $request)
    {
        if (!Cache::has('cache-data')) {
            return redirect()->route('website.location');
        } else {
            $data = Category::with(['products'])->get();
             $now= \Carbon\Carbon::now()->format('g:i') ;
             $day=\Str::upper(\Carbon\Carbon::now()->format('l'));
            // $next_day = \Str::upper(\Carbon\Carbon::now()->addDays(1)->format('l'));
             $pickup_time=Pickuptime::where('day', $day)->where('opening_time','<=',$now)->where('closing_time','>=',$now)->first();
            // $next_pickup_time=Pickuptime::where('day', $next_day)->first();
            // if (!isset($pickup_time)) {
            //     $status['store_status'] = "close";
            //     $status['reverse_status'] = "open";
            //     $status['time'] = $next_pickup_time->opening_time;
            // } else {
            //     $status['store_status'] = "open";
            //     $status['reverse_status'] = "close";
            //     $status['time'] = $pickup_time->closing_time;
            // }

            return view('pages.website.index',compact('data','pickup_time'));
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

        $data =$this->getCart()->count();
        if ($data <= 0) {
            return  redirect()->route('website.home');
        }

        return view('pages.website.checkout');

    }
    public function profile(Request $request)
    {

        return view('pages.website.profile');

    }
    public function returnPolicy(Request $request)
    {
        $data = Refund::first();

        return view('pages.website.return_policy',compact('data'));

    }
    public function policyPrivacy(Request $request)
    {
        $data = Privacy::first();
        return view('pages.website.policyPrivacy',compact('data'));

    }
    public function termCondition(Request $request)
    {
        $data = Term::first();
        return view('pages.website.term_condition',compact('data'));

    }
    public function contactUs(Request $request)
    {
        $cachedData = cache('cache-data');
        $now= \Carbon\Carbon::now()->format('g:i') ;
        $day=\Str::upper(\Carbon\Carbon::now()->format('l'));
        $data['city'] = City::all();
        $data['area'] = Area::all();
        $data['branch'] = Branch::with('city')->get();
        $data['pickup'] = Pickuptime::all();
        $data['delivery'] = Deliverytime::all();
        // $delivery_time= $data['delivery']->where('day', $day)->where('from','<=',$now)->where('to','>=',$now);
        // return $now;
        $delivery_time = Deliverytime::where('day', $day)->where('from','<=',$now)->where('to','>=',$now)->first();
        // $data['delivery_status'] = $delivery_time->isEmpty() ? "CLOSE NOW" : "OPEN NOW";
        if (!isset($delivery_time)) {
            $data['delivery_status'] = "CLOSE NOW";
        } else {
            $data['delivery_status'] = "OPEN NOW";
        }
        $pickup_time=Pickuptime::where('day', $day)->where('opening_time','<=',$now)->where('closing_time','>=',$now)->first();
        if (!isset($pickup_time)) {
            $data['pickup_status'] = "CLOSE NOW";
        } else {
            $data['pickup_status'] = "OPEN NOW";
        }

        if ($cachedData['city_id']) {
            # code...
            $data['myCity']=City::where('id',$cachedData['city_id'])->with('area')->first();
        }

        if (isset($cachedData['branch']->city_id)) {
            # code...
            $data['cityBranch']=City::where('id',$cachedData['branch']->city_id)->with('branch')->first();
        }

        return view('pages.website.contact_us',compact('data'));

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

    public function getCart()
{
    return \Cart::getContent();
}
}
