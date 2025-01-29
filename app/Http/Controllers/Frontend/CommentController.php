<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Car;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CommentController extends Controller
{
    public function storeCar(Request $request, Car $car)
    {
    $request->validate([
        'comment' => 'required|string|max:1000',
        'rating' => 'nullable|integer|min:1|max:5',
    ]);

    $car->comments()->create([
        'user_id' => auth()->id(),
        'comment' => $request->comment,
        'rating' => $request->rating,
    ]);

    return response()->json(['message' => 'Comment added successfully.'], 201);
    }

}
