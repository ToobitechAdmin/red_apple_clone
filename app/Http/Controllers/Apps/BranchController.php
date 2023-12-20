<?php

namespace App\Http\Controllers\Apps;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Area;
use App\Models\City;
use App\Models\Branch;

class BranchController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['city'] = City::all();
        $data['area'] = Area::all();
        $data['branch'] = Branch::with('city')->get();
        return view('pages.apps.branch.index',compact('data'));
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
        Branch::create([
            'name' => $request->input('name'),
            'address' => $request->input('address'),
            'number' => $request->input('number'),
            'city_id' => $request->input('city_id'),

        ]);

        return redirect()->route('branch.index')->with('success', 'Branch created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data['city'] = City::all();
        $data['area'] = Area::all();
        $data['branch'] = Branch::with('city')->find($id);

        return view('pages.apps.branch.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data= Branch::find($id);

        $item = [
            'name' => $request->input('name'),
            'address' => $request->input('address'),
            'number' => $request->input('number'),
            'city_id' => $request->input('city_id'),
        ];
        $data->update($item);
        return redirect()->route('branch.index')->with('success', 'Branch Update successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Branch::find($id);

        // Delete the image record from the database
        $data->delete();

        return redirect()->route('branch.index')->with('success', 'Branch deleted successfully');
    }
}
