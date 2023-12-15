<?php

namespace App\Http\Controllers\Apps;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tag;
use Illuminate\Support\Facades\File;
class TagController extends Controller
{
   /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tags = Tag::all();
        return view('pages.apps.tags.index', compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.apps.tags.index');

    }

    /**
     * Store a newly created resource in storage.
     */
        public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',

        ]);


        Tag::create([
            'name' => $request->input('name'),

        ]);

        return redirect()->route('tags.index')->with('success', 'Tags created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function destroy($id)
    {
        $tags = Tag::find($id);


        $tags->delete();

        return redirect()->route('tags.index')->with('success', 'Tags deleted successfully');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $tags = Tag::find($id);
        return view('pages.apps.tags.edit', compact('tags'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {


        $tags = Tag::find($id);
        $tags->name = $request->input('name');


        $tags->save();

        return redirect()->route('tags.index')->with('success', 'Tags updated successfully');
    }


    public function change_status(Request $request)
    {
        $statusChange = Tag::where('id',$request->id)->update(['status'=>$request->status]);
        if($statusChange)
        {
            return array('message'=>'Tags status  has been changed successfully','type'=>'success');
        }else{
            return array('message'=>'Tags status has not changed please try again','type'=>'error');
        }

    }

    /**
     * Remove the specified resource from storage.
     */

}
