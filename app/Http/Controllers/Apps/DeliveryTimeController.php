<?php

namespace App\Http\Controllers\Apps;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Deliverytime;

class DeliveryTimeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $delivery = Deliverytime::all();
       return view('pages.apps.deliverytime.index', compact('delivery'));
       //return view('pages.apps.city.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $delivery = Deliverytime::all();
        return view('pages.apps.deliverytime.index', compact('delivery'));
     //   return view('pages.apps.city.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'day'=>'required',
            'to' => 'required',
            'from' => 'required',

        ]);


        Deliverytime::create([
            'day' => $request->input('day'),
            'to' => $request->input('to'),
            'from' => $request->input('from'),
        ]);

        return redirect()->route('delivery-time.index')->with('success', ' Delivery Time uploaded successfully');
    }

    /**
     * Display the specified resource.
     */
    public function destroy($id)
    {
        $delivery = Deliverytime::find($id);

        // Delete the image record from the database
        $delivery->delete();

        return redirect()->route('delivery-time.index')->with('success', ' Delivery Time deleted successfully');
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $delivery = Deliverytime::find($id);
        return view('pages.apps.deliverytime.edit', compact('delivery'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'to' => 'required',
            'from' => 'required',

        ]);

        $delivery = Deliverytime::find($id);
     //   $delivery->day = $request->input('day');
        $delivery->to = $request->input('to');
        $delivery->from = $request->input('from');

        $delivery->save();

        return redirect()->route('delivery-time.index')->with('success', ' Delivery Time updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */

}
