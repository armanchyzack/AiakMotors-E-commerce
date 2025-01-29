<?php

namespace App\Http\Controllers\BackendController;

use App\Http\Controllers\Controller;
use App\Models\footer;
use Illuminate\Http\Request;

class FooterController extends Controller
{
    function view(){
        $footer = footer::first();

        if($footer){
            return view('Backend.Footer.edit', compact('footer'));
        }else{
            return view('Backend.Footer.index');
        }

    }

    function insert(Request $request){
        $request->validate([
            'details' => 'required'
        ]);

        $footer = new footer();
        $footer->details = $request->details;
        $footer->save();
        return back();
        return redirect()->route('footer.update' , $footer->id)->with('success', 'your footer deatils post successfully!');


    }

    function update(Request $request, footer $footer){
        $footer->details = $request->details;
        $footer->save();
        return back()->with('warning', 'your footer update successfully!');
    }
}
