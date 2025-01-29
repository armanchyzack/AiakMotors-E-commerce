<?php

namespace App\Http\Controllers\BackendController;

use App\Http\Controllers\Controller;
use App\Models\Marquery;
use Illuminate\Http\Request;

class MarqueryTextController extends Controller
{
    function view(){
        $marquery = Marquery::first();

        if($marquery){
            return view('Backend.Marquery.edit', compact('marquery'));
        }else{
            return view('Backend.Marquery.add');
        }

    }

    function insert(Request $request){
        $request->validate([
            'details' => 'required'
        ]);

        $marquery = new Marquery();
        $marquery->details = $request->details;
        $marquery->save();

        return redirect()->route('marquery.update', $marquery->id)
            ->with('success', 'Your marquery details were posted successfully!');
    }

    function update(Request $request, Marquery $marquery){
        $request->validate([
            'details' => 'required'
        ]);

        $marquery->details = $request->details;
        $marquery->update();

        return back()->with('warning', 'your footer update successfully!');
    }
}
