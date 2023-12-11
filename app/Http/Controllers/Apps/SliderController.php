<?php

namespace App\Http\Controllers\Apps;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;
use Illuminate\Support\Facades\File;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $slider = Slider::all();
        return view('pages.apps.sliders.index', compact('slider'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.apps.sliders.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $request->validate([
        'title' => 'required',
        'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
    ]);

    // $imageFile = $request->file('image');
    // $file_path = $imageFile->store('image_files', 'public');
    if($request->hasFile('image'))
    {
        $img = time().$request->file('image')->getClientOriginalName();
        $file_path = "documents/slider/".$img;
        $request->image->move(public_path("documents/slider/"), $img);
    }
    Slider::create([
        'title' => $request->input('title'),
        'image' => $file_path,
    ]);

    return redirect()->route('slider.index')->with('success', ' Slider Image uploaded successfully');
}

    /**
     * Display the specified resource.
     */
    public function destroy($id)
    {
        $slider = Slider::find($id);

        $imagePath = public_path($slider->image);

        // Check if the file exists before attempting to delete
        if (File::exists($imagePath)) {
            // Delete the image file
            File::delete($imagePath);
        }

        // Delete the image record from the database
        $slider->delete();

        return redirect()->route('slider.index')->with('success', 'Slider Image deleted successfully');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $slider = Slider::find($id);
    return view('pages.apps.sliders.edit', compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     */

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        $slider = Slider::find($id);

        $slider->title = $request->input('title');

        if ($request->hasFile('image')) {
            // Delete the existing image file
            $existingImagePath = public_path($slider->image);

            if (File::exists($existingImagePath)) {
                File::delete($existingImagePath);
            }

            $img = time() . $request->file('image')->getClientOriginalName();
            $file_path = "documents/slider/{$img}";

            // Move the new image file to the specified directory
            $request->file('image')->move(public_path("documents/slider/"), $img);

            $slider->image = $file_path; // Update the image attribute in the database
        }

        $slider->save();

        return redirect()->route('slider.index')->with('success', 'Slider updated successfully');
    }


    public function change_status(Request $request)
    {
        $statusChange = Slider::where('id',$request->id)->update(['status'=>$request->status]);
        if($statusChange)
        {
            return array('message'=>'Slider status  has been changed successfully','type'=>'success');
        }else{
            return array('message'=>'Slider status has not changed please try again','type'=>'error');
        }

    }

}
