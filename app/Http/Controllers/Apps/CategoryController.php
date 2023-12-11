<?php

namespace App\Http\Controllers\Apps;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\File;

class CategoryController extends Controller
{
     /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $category = Category::all();
        return view('pages.apps.category.index', compact('category'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.apps.category.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $request->validate([
        'name' => 'required',
        'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
    ]);

    // $imageFile = $request->file('image');
    // $file_path = $imageFile->store('image_files', 'public');
    if($request->hasFile('image'))
    {
        $img = time().$request->file('image')->getClientOriginalName();
        $file_path = "documents/category/".$img;
        $request->image->move(public_path("documents/category/"), $img);
    }
    Category::create([
        'name' => $request->input('name'),
        'image' => $file_path,
    ]);

    return redirect()->route('category.index')->with('success', ' category uploaded successfully');
}

    /**
     * Display the specified resource.
     */
    public function destroy($id)
    {
        $category = Category::find($id);

        $imagePath = public_path($category->image);

        // Check if the file exists before attempting to delete
        if (File::exists($imagePath)) {
            // Delete the image file
            File::delete($imagePath);
        }

        // Delete the image record from the database
        $category->delete();

        return redirect()->route('category.index')->with('success', 'Category Image deleted successfully');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category = Category::find($id);
    return view('pages.apps.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        $category = Category::find($id);

        $category->name = $request->input('name');

        if ($request->hasFile('image')) {
            // Delete the existing image file
            $existingImagePath = public_path($category->image);

            if (File::exists($existingImagePath)) {
                File::delete($existingImagePath);
            }

            $img = time() . $request->file('image')->getClientOriginalName();
            $file_path = "documents/category/{$img}";

            // Move the new image file to the specified directory
            $request->file('image')->move(public_path("documents/category/"), $img);

            $category->image = $file_path; // Update the image attribute in the database
        }

        $category->save();

        return redirect()->route('category.index')->with('success', 'Category updated successfully');
    }


    public function change_status(Request $request)
    {
        $statusChange = Category::where('id',$request->id)->update(['status'=>$request->status]);
        if($statusChange)
        {
            return array('message'=>'Category status  has been changed successfully','type'=>'success');
        }else{
            return array('message'=>'Category status has not changed please try again','type'=>'error');
        }

    }

}
