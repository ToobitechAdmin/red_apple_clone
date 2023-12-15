<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

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

    public function delCart()
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
}
