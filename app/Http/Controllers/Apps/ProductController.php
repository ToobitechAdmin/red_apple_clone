<?php

namespace App\Http\Controllers\Apps;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\File;
use Validator;
class ProductController extends Controller
{
    public function productList()
    {
        $data = Category::with(['products'])->get();
        return view('pages.website.ajax.products_cart',compact('data'));
        # code...
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['product'] = Product::all();
        $data['categories'] = Category::get();
        return view('pages.apps.product.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // $categories = Category::get();

        // return view('pages.apps.product.index',compact('categories'));

    }

    /**
     * Store a newly created resource in storage.
     */
        public function store(Request $request)
    {
         
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'title' => 'nullable',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            'description' => 'nullable',
            'price' => 'required|numeric',
            ]);

            if($validator->fails()){
                return redirect()->back()->with(['message'=>$validator->errors()->first(),'type'=>'error']); 

            }

        if ($request->hasFile('image')) {
            $img = time() . $request->file('image')->getClientOriginalName();
            $file_path = "documents/product/" . $img;
            $request->image->move(public_path("documents/product/"), $img);
        }

        Product::create([
            'name' => $request->input('name'),
            'title' => $request->input('title'),
            'image' => $file_path ?? 'documents/product/default.svg',
            'description' => $request->input('description'),
            'price' => $request->input('price'),
            'category_id'=>$request->input('category_id'),

        ]);

        return redirect()->route('products.index')
         ->with(['message'=>'Product created successfully','type'=>'success']);
        
    }

    /**
     * Display the specified resource.
     */
    public function destroy($id)
    {
        $product = Product::find($id);

        $imagePath = public_path($product->image);
//dd($imagePath);
        // Check if the file exists before attempting to delete
        if (File::exists($imagePath)) {
            // Delete the image file
            File::delete($imagePath);
        }

        // Delete the image record from the database
        $product->delete();

        return redirect()->route('products.index')->with(['message'=>'Product deleted successfully','type'=>'success']);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $categories = Category::get();

        $product = Product::find($id);
        return view('pages.apps.product.edit', compact('product','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {


        $product = Product::find($id);
        if(!isset($product)){
            return redirect()->back()->with(['message'=>'Data Not Found','type'=>'error']);
        }
        $product->name = $request->input('name');

        $product->title = $request->input('title');
        if ($request->hasFile('image')) {
            // Delete the existing image file
            $existingImagePath = public_path($product->image);

            if (File::exists($existingImagePath)) {
                File::delete($existingImagePath);
            }

            $img = time() . $request->file('image')->getClientOriginalName();
            $file_path = "documents/product/{$img}";

            // Move the new image file to the specified directory
            $request->file('image')->move(public_path("documents/product/"), $img);

            $product->image = $file_path; // Update the image attribute in the database
        }
        $product->description = $request->input('description');
        $product->price = $request->input('price');
        $product->category_id=$request->input('category_id');
        $product->save();

        return redirect()->route('products.index')->with(['message'=>'Product updated successfully','type'=>'success']);
    }


    public function change_status(Request $request)
    {
        $statusChange = Product::where('id',$request->id)->update(['status'=>$request->status]);
        if($statusChange)
        {
            return array('message'=>'Product status  has been changed successfully','type'=>'success');
        }else{
            return array('message'=>'Product status has not changed please try again','type'=>'error');
        }

    }

    /**
     * Remove the specified resource from storage.
     */

}
