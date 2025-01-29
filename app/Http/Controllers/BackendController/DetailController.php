<?php

namespace App\Http\Controllers\BackendController;

use App\Models\Detail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DetailController extends Controller
{
     // Show the form to create a new record
     public function create()
     {
        $detail = Detail::first();

         if($detail){
            return view('Backend.WheelSlice.Details.edit', compact('detail'));

        }else{
            return view('Backend.WheelSlice.Details.add');

        }

     }

     // Store the new record in the database
     public function store(Request $request)
     {
         $request->validate([
             'title' => 'required|max:255',
             'description' => 'required',
         ]);

         Detail::create($request->only(['title', 'description']));

         return redirect()->route('details.create')->with('success', 'Detail added successfully!');
     }

     // Show the form to edit an existing record
     public function edit($id)
     {

     }

     // Update the record in the database
     public function update(Request $request, $id)
     {
         $request->validate([
             'title' => 'required|max:255',
             'description' => 'required',
         ]);

         $detail = Detail::findOrFail($id);
         $detail->update($request->only(['title', 'description']));

         return redirect()->back()->with('success', 'Detail updated successfully!');
     }
}
