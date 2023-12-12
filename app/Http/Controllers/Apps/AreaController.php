<?php

namespace App\Http\Controllers\Apps;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Area;
use App\Models\City;

class AreaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['city'] = City::all();
        $data['area'] = Area::with('city')->get();
        return view('pages.apps.area.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'city_id'=>'required',

        ]);


        Area::create([
            'name' => $request->input('name'),
            'city_id'=>$request->input('city_id'),

        ]);

        return redirect()->route('area.index')->with('success', 'Area created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function destroy($id)
    {
        $data = Area::find($id);

        // Delete the image record from the database
        $data->delete();

        return redirect()->route('area.index')->with('success', 'area deleted successfully');
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data['city'] = City::all();
        $data['area'] = Area::with('city')->where('id',$id)->first();
        return view('pages.apps.area.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'city_id'=>'required',

        ]);

        $area = Area::find($id);
        $area->name = $request->input('name');


        $area->city_id=$request->input('city_id');
        $area->save();

        return redirect()->route('area.index')->with('success', 'Area updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
}
