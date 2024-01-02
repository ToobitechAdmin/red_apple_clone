<?php

namespace App\Http\Controllers\Apps;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Term;
class TermAndConditionController extends Controller
{ /**
    * Display a listing of the resource.
    */
   public function index()
   {
       $term = Term::all();
       return view('pages.apps.term.index', compact('term'));

   }


   /**
    * Show the form for creating a new resource.
    */
   public function create()
   {
       $term = Term::all();
       return view('pages.apps.term.index', compact('term'));
   }

   /**
    * Store a newly created resource in storage.
    */
   public function store(Request $request)
{
   $request->validate([
       'paragraph' => 'required',

   ]);


   Term::create([
       'paragraph' => $request->input('paragraph'),
   ]);

   return redirect()->route('term-condition.index')->with('success', ' Term And Condition uploaded successfully');
}

   /**
    * Display the specified resource.
    */
   public function destroy($id)
   {
       $term = Term::find($id);

       // Delete the image record from the database
       $term->delete();

       return redirect()->route('term-condition.index')->with('success', ' Term And Condition deleted successfully');
   }


   /**
    * Show the form for editing the specified resource.
    */
   public function edit(string $id)
   {
       $term = Term::find($id);
   return view('pages.apps.term.edit', compact('term'));
   }

   /**
    * Update the specified resource in storage.
    */
   public function update(Request $request, $id)
   {
       $request->validate([
           'paragraph' => 'required',

       ]);

       $term = Term::find($id);

       $term->paragraph = $request->input('paragraph');

       $term->save();

       return redirect()->route('term-condition.index')->with('success', ' Term And Condition updated successfully');
   }

   /**
    * Remove the specified resource from storage.
    */

}
