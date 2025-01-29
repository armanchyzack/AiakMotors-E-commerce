<?php

namespace App\Http\Controllers\BackendController;

use App\Models\Detail;
use App\Models\PopUpMessage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PopUpMessageController extends Controller
{

    // Show the form for editing (or creating if no data exists)
    public function index()
    {
        $details = PopUpMessage::first();
        return view('Backend.PopUp.manage', compact('details'));
    }

    // Store or update a single record
    public function storeOrUpdate(Request $request)
    {
        $request->validate([
            'description' => 'required',
        ]);

        $details = PopUpMessage::first();

        if ($details) {
            // Update existing record
            $details->update([
                'description' => $request->description
            ]);
            $message = 'Details updated successfully!';
        } else {
            // Create new record
            PopUpMessage::create([
                'description' => $request->description
            ]);
            $message = 'Details added successfully!';
        }

        return redirect()->route('popup.message.manage')->with('success', $message);
    }


}
