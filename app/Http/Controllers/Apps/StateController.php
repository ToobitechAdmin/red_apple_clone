<?php

namespace App\Http\Controllers\Apps;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\State;
use Illuminate\Support\Str;
class StateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $state = State::all();
        return view('pages.apps.state.index', compact('state'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $state = State::all();
        return view('pages.apps.state.index', compact('state'));
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',

        ]);


        State::create([
            'name' => $request->input('name'),
            'slug' => Str::slug($request->input('name'))
        ]);

        return redirect()->route('state.index')->with('success', ' State uploaded successfully');
    }

    /**
     * Display the specified resource.
     */
    public function destroy($id)
    {
        $state = State::find($id);

        // Delete the image record from the database
        $state->delete();

        return redirect()->route('state.index')->with('success', 'State deleted successfully');
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $state = State::find($id);
        return view('pages.apps.state.edit', compact('state'));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',

        ]);

        $state = State::find($id);

        $state->name = $request->input('name');
        $state->slug = Str::slug($request->input('name'));

        $state->save();

        return redirect()->route('state.index')->with('success', 'State updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */

}
