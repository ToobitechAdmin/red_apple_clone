<?php

namespace App\Http\Controllers\Apps;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Privacy;
class PrivacyAndPolicyController extends Controller
{
   /**
    * Display a listing of the resource.
    */
    public function index()
    {
        $privacy = Privacy::all();
        return view('pages.apps.privacy.index', compact('privacy'));

    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $privacy = Privacy::all();
        return view('pages.apps.privacy.index', compact('privacy'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
 {
    $request->validate([
        'paragraph' => 'required',

    ]);


    Privacy::create([
        'paragraph' => $request->input('paragraph'),
    ]);

    return redirect()->route('privacy-policy.index')->with('success', ' Privacy And Policy uploaded successfully');
 }

    /**
     * Display the specified resource.
     */
    public function destroy($id)
    {
        $privacy = Privacy::find($id);

        // Delete the image record from the database
        $privacy->delete();

        return redirect()->route('privacy-policy.index')->with('success', ' Privacy And Policy deleted successfully');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $privacy = Privacy::find($id);
    return view('pages.apps.privacy.edit', compact('privacy'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'paragraph' => 'required',

        ]);

        $privacy = Privacy::find($id);

        $privacy->paragraph = $request->input('paragraph');

        $privacy->save();

        return redirect()->route('privacy-policy.index')->with('success', ' Privacy And Policy updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */

}
