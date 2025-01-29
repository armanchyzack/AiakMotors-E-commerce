<?php

namespace App\Http\Controllers\BackendController;

use App\Models\WheelSlice;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class WheelSliceController extends Controller
{






    function view()
    {
        $wheelSlice = WheelSlice::first();

        if ($wheelSlice) {
            return view('Backend.WheelSlice.edit', compact('wheelSlice'));
        } else {
            return view('Backend.WheelSlice.add');
        }
    }
    public function insert(Request $request)
    {
        $request->validate([
            'One' => 'required|string|max:255',
            'Two' => 'required|string|max:255',
            'Three' => 'required|string|max:255',
            'four' => 'required|string|max:255',
            'five' => 'required|string|max:255',
            'six' => 'required|string|max:255',
            'seven' => 'required|string|max:255',
            'eight' => 'required|string|max:255',
        ]);

        WheelSlice::create([
            'slice_one' => $request->One,
            'slice_two' => $request->Two,
            'slice_three' => $request->Three,
            'slice_four' => $request->four,
            'slice_five' => $request->five,
            'slice_six' => $request->six,
            'slice_seven' => $request->seven,
            'slice_eight' => $request->eight,
        ]);

        return redirect()->back()->with('success', 'Wheel Slice created successfully.');
    }

    // Update the sticky data
    public function update(Request $request)
    {
        // Validation
        $request->validate([
            'One' => 'required|string|max:255',
            'Two' => 'required|string|max:255',
            'Three' => 'required|string|max:255',
            'four' => 'required|string|max:255',
            'five' => 'required|string|max:255',
            'six' => 'required|string|max:255',
            'seven' => 'required|string|max:255',
            'eight' => 'required|string|max:255',
        ]);

        // Get the sticky record (assuming it always exists)
        $wheelSlice = WheelSlice::first(); // Since only one row exists

        // Update the record
        $wheelSlice->update([
            'slice_one' => $request->One,
            'slice_two' => $request->Two,
            'slice_three' => $request->Three,
            'slice_four' => $request->four,
            'slice_five' => $request->five,
            'slice_six' => $request->six,
            'slice_seven' => $request->seven,
            'slice_eight' => $request->eight,
        ]);
        // Redirect back with success message
        return redirect()->back()->with('success', 'Wheel Slice updated successfully.');
    }
}
