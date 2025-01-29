<?php

namespace App\Http\Controllers\BackendController;

use App\Http\Controllers\Controller;
use App\Models\DiscountText;
use Illuminate\Http\Request;

class DiscountTextController extends Controller
{
    function view(){
        $discountText = DiscountText::first();

        if($discountText){
            return view('Backend.DiscountText.edit', compact('discountText'));
        }else{
            return view('Backend.DiscountText.add');
        }

    }

    function insert(Request $request){

        $request->validate([
            'details' => 'required'
        ]);

        $discountText = new DiscountText();
        $discountText->details = $request->details;
        $discountText->save();

        return redirect()->route('discount.text.update', $discountText->id)
            ->with('success', 'Your discount details were posted successfully!');
    }

    function update(Request $request, DiscountText $discountText){

        $request->validate([
            'details' => 'required'
        ]);

        $discountText->details = $request->details;
        $discountText->update();

        return back()->with('warning', 'your discount text update successfully!');
    }
}
