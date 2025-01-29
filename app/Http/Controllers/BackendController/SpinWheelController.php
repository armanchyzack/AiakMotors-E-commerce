<?php

namespace App\Http\Controllers\BackendController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SpinWheel;
use App\Models\SpinWheelData;

class SpinWheelController extends Controller
{
    function view()
    {
        $spinewheel = SpinWheelData::first();

        if ($spinewheel) {
            return view('Backend.SpinWheel.edit', compact('spinewheel'));
        } else {
            return view('Backend.SpinWheel.index');
        }
    }
    function datastore($request, $spinewheel)
    {
        $spinewheel->prize_one = $request->prize_one;
        $spinewheel->prize_two = $request->prize_two;
        $spinewheel->prize_three = $request->prize_three;
    }

    function insert(Request $request)
    {
        $request->validate([
            'prize_one' => 'required',
            'prize_two' => 'required',
            'prize_three' => 'required',
        ]);
        $spinewheel = new SpinWheelData();
        $this->datastore($request, $spinewheel);
        $spinewheel->save();
        return back()->with('success', 'your Spine Wheel text Update successfully!');
    }
    public function update(Request $request, SpinWheelData $spinewheel)
    {
        // Validate the incoming request
        $request->validate([
            'prize_one' => 'required|string',
            'prize_two' => 'required|string',
            'prize_three' => 'required|string',
        ]);

        // Populate the SpinWheelData model with validated data
        $this->datastore($request, $spinewheel);

        // Save the updated data to the database
        $spinewheel->save();

        // Redirect back with a success message
        return back()->with('success', 'Your Spin Wheel data was updated successfully!');
    }




}
