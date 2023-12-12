<?php

namespace App\Http\Controllers\Apps;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\City;
use Illuminate\Support\Str;
class CityController extends Controller
{
   /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $city = City::all();
        return view('pages.apps.city.index', compact('city'));

    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $city = City::all();
        return view('pages.apps.city.index', compact('city'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $request->validate([
        'name' => 'required',

    ]);


    City::create([
        'name' => $request->input('name'),
        'slug' => Str::slug($request->input('name'))
    ]);

    return redirect()->route('city.index')->with('success', ' City uploaded successfully');
}

    /**
     * Display the specified resource.
     */
    public function destroy($id)
    {
        $city = City::find($id);

        // Delete the image record from the database
        $city->delete();

        return redirect()->route('city.index')->with('success', 'City deleted successfully');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $city = City::find($id);
    return view('pages.apps.city.edit', compact('city'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',

        ]);

        $city = City::find($id);

        $city->name = $request->input('name');
        $city->slug = Str::slug($request->input('name'));

        $city->save();

        return redirect()->route('city.index')->with('success', 'City updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */

}
