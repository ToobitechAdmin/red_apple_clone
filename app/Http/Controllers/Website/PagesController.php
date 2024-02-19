<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Slider;
use App\Models\City;
use App\Models\Area;
use App\Models\Branch;
use App\Models\Privacy;
use App\Models\Product;
use App\Models\Term;
use App\Models\Refund;
use App\Models\Pickuptime;
use App\Models\Deliverytime;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Session;

use Illuminate\Support\Facades\Artisan;
class PagesController extends Controller
{
    public function searchProduct(Request $request){

        $data = Product::with('variants')->where('name', 'like', '%' . $request->search . '%')
        ->take(10)
        ->get();
        return $data;
    }

    public function index(Request $request)
    {
        $expirationTime = now()->addDays(2);
        if (now()->gt($expirationTime)) {
            session()->forget('cached-data');
            session()->forget('cached-data-expiration');


        }
        if (!session()->has('cached-data')) {

            return redirect()->route('website.location');
        } else {
            $data = Category::with(['products','products.variants'])->get();
            $now= \Carbon\Carbon::now()->format('g:i') ;
            $day=\Str::upper(\Carbon\Carbon::now()->format('l'));
            // $next_day = \Str::upper(\Carbon\Carbon::now()->addDays(1)->format('l'));
            $pickup_time_home=Pickuptime::where('day', $day)->first();
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
            $slider = Slider::where('status',1)->get();

            return view('pages.website.index',compact('data','pickup_time_home','slider'));
        }
    }
    public function location(Request $request)
    {
        $data['city'] = City::all();
        $data['area'] = Area::all();
        $data['branch'] = Branch::with('city')->get();
        Artisan::call('cache:clear');
        return view('pages.website.main',compact('data'));
        if (!session()->has('cached-data')) {
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
        // $cachedData = cache('cache-data');
        $cachedData = session()->get('cached-data');
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

        // Cache::put('cache-data', $data, now()->addDays(2));
        // $cachedData = Cache::get('cache-data');
        $expirationTime = now()->addDays(2);

        session()->put('cached-data', $data);
        session()->put('cached-data-expiration', $expirationTime);



        return 'save data';

    }

    public function getCart()
{
    return \Cart::getContent();
}
}
