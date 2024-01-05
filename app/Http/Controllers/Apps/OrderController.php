<?php

namespace App\Http\Controllers\Apps;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use Str;
class OrderController extends Controller
{
    public function index()
    {
        $order = Order::all();
        return view('pages.apps.order.index', compact('order'));

    }
    public function change_status(Request $request)
    {

        $statusChange = Order::where('id',$request->id)->update(['status'=>$request->status]);
        if($statusChange)
        {

            return redirect()->back()->with(['message' => 'Order status  has been changed successfully to '.Str::upper($request->status) , 'type' => 'success']);

        }else{
            return redirect()->back()->with(['message' => 'Order status has not changed please try again', 'type' => 'error']);

        }

    }
}
