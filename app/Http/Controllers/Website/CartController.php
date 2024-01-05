<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Deliverytime;
use App\Models\Pickuptime;
use Illuminate\Support\Facades\Validator;

class CartController extends Controller
{
    public function updateCart(Request $request)
    {
        try {
            //code...
            \Cart::update($request->id,
                array(
                    'quantity' => array(
                        'relative' => false,
                        'value' => $request->quantity
                    ),
            ));
            return 'add successfully';
        } catch (\Throwable $th) {
            //throw $th;
            return 'error';
        }
    }

    public function delCart(Request $request)
    {

        \Cart::remove($request->id);
        return 'cart del successfully';
    }
    public function cart(Request $request)
    {
        $data['cart']['item'] = \Cart::getContent();
        $data['cart']['subtotal'] =\Cart::getSubTotal();
        $data['cart']['total'] =\Cart::getTotal();
        $data['cart']['total_item'] =$data['cart']['item']->count();
            return response()->json($data);
        return view('pages.website.includes.cart',compact('data'));
    }
    public function addToCart(Request $request)
    {

        $product = Product::find($request->product_id);

        \Cart::add(array(
            'id' =>  $product->id,
            'name' => $product->name,
            'price' => $product->price,
            'quantity' => $request->qty,
            'attributes' => array(
                'image' => $product->image,
            )
        ));
        return array('status'=>'true','message'=>"Add To Cart");
    }

   // In your controller method
public function addOrder(Request $request)
{
    $now= \Carbon\Carbon::now()->format('g:i') ;
    $day=\Str::upper(\Carbon\Carbon::now()->format('l'));
    $validator = Validator::make($request->all(), [
        'full_name' => 'required',
        'email' => 'required|email',
        'phone_number' => 'required',
        'address' => 'required',
        'order_type' => 'required',
    ]);

    if ($validator->fails()) {
        return response()->json(['type' => 'error', 'message' => $validator->messages()->first()]);
    }
    $delivery_time = Deliverytime::where('day', $day)->where('from','<=',$now)->where('to','>=',$now)->first();
    $pickup_time=Pickuptime::where('day', $day)->where('opening_time','<=',$now)->where('closing_time','>=',$now)->first();

    if (!isset($delivery_time) || !isset($pickup_time) ) {
        //return redirect()->route('website.home')->with('error', ' The Shop is not open yet you cannot place order');
        return response()->json(['type' => 'error', 'message' => 'The Shop is not open yet you cannot place order']);
    }
    // return response()->json(['type' => 'error', 'message' => 'Your order is placed successfully']);


    if (count(\Cart::getContent()) <= 0){
            return response()->json(['type' => 'error', 'message' => 'Cart is Empty']);
        }
        $input = $request->all();

        // Create a new order
        $this->storeOrder($input);
      //  return redirect()->route('website.home')->with('success', ' Your order is place successfully');
       // $data['delivery_status'] = "OPEN NOW";
       return response()->json(['type' => 'error', 'message' => 'Your order is placed successfully']);

    }
public function storeOrder($data){

    $data['total'] = \Cart::getTotal();
    $data['subtotal'] = \Cart::getSubTotal();
    $data['order_number'] ="#".time();
    // return $data;
    $order = Order::create($data);
    $cart_data =  $this->getCart();
    foreach ($cart_data as $key => $value) {

        $order_item['order_id'] = $order->id??0;
        $order_item['product_id'] = $value->id??null;
        $order_item['qty'] = $value->quantity??0;
        OrderItem::create($order_item);
    }

    \Cart::clear();
    return true;
}

public function getCart()
{
    return \Cart::getContent();
}
}
