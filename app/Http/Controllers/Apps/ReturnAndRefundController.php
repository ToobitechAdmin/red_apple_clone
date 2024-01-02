<?php

namespace App\Http\Controllers\Apps;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Refund;
class ReturnAndRefundController extends Controller
{
   /**
    * Display a listing of the resource.
    */
    public function index()
    {
        $refund = Refund::all();
        return view('pages.apps.refund.index', compact('refund'));

    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $refund = Refund::all();
        return view('pages.apps.refund.index', compact('refund'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
 {
    $request->validate([
        'paragraph' => 'required',

    ]);


    Refund::create([
        'paragraph' => $request->input('paragraph'),
    ]);

    return redirect()->route('return-refund.index')->with('success', ' Refund And Return uploaded successfully');
 }

    /**
     * Display the specified resource.
     */
    public function destroy($id)
    {
        $refund = Refund::find($id);

        // Delete the image record from the database
        $refund->delete();

        return redirect()->route('return-refund.index')->with('success', ' Refund And Return deleted successfully');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $refund = Refund::find($id);
    return view('pages.apps.refund.edit', compact('refund'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'paragraph' => 'required',

        ]);

        $refund = Refund::find($id);

        $refund->paragraph = $request->input('paragraph');

        $refund->save();

        return redirect()->route('return-refund.index')->with('success', ' Refund And Return updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */

}
