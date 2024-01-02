<?php

namespace App\Http\Controllers\Apps;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pickuptime;

class PickupTimeController extends Controller
{
    public function index()
    {
        $pickup = Pickuptime::all();
       return view('pages.apps.pickuptime.index', compact('pickup'));
       //return view('pages.apps.city.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pickup = Pickuptime::all();
        return view('pages.apps.pickuptime.index', compact('pickup'));
     //   return view('pages.apps.city.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'day'=>'required',
            'opening_time' => 'required',
            'closing_time' => 'required',

        ]);


        Pickuptime::create([
            'day' => $request->input('day'),
            'opening_time' => $request->input('opening_time'),
            'closing_time' => $request->input('closing_time'),
        ]);

        return redirect()->route('pickup-time.index')->with('success', ' Pickup Time uploaded successfully');
    }

    /**
     * Display the specified resource.
     */
    public function destroy($id)
    {
        $pickup = Pickuptime::find($id);

        // Delete the image record from the database
        $pickup->delete();

        return redirect()->route('pickup-time.index')->with('success', ' Pickup Time deleted successfully');
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $pickup = Pickuptime::find($id);
    return view('pages.apps.pickuptime.edit', compact('pickup'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // $request->validate([
        //     'to' => 'required',
        //     'from' => 'required',

        // ]);

        $pickup = Pickuptime::find($id);
        $pickup->day = $request->input('day');
        $pickup->opening_time = $request->input('opening_time');
        $pickup->closing_time = $request->input('closing_time');

        $pickup->save();

        return redirect()->route('pickup-time.index')->with('success', ' Pickup Time updated successfully');
    }

}
