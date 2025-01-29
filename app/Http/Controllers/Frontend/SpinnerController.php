<?php

namespace App\Http\Controllers\Frontend;

use Carbon\Carbon;
use App\Models\Spin;
use App\Models\Coupon;
use Illuminate\Http\Request;
use App\Models\SpinWheelData;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class SpinnerController extends Controller
{

    // public function show()
    // {
    //     // Fetch spin data and create weighted prizes
    //     $spinData = SpinWheelData::first();
    //     $prizes = [];
    //     if ($spinData) {
    //         $prizes = [
    //             $spinData->prize_one,
    //             $spinData->prize_two,
    //             $spinData->prize_three,
    //         ];
    //     }

    //     // Fetch active coupons
    //     $coupons = Coupon::where('status', 'active')->inRandomOrder()->limit(5)->get();
    //     foreach ($coupons as $coupon) {
    //         $prizes[] = $coupon->code;
    //     }
    //     dd($prizes);
    //     return view('Frontend.spinewheel',compact('prizes'));
    // }

    // public function spin(Request $request)
    // {
    //     $user = Auth::user();

    //     // Check if the user has already spun this month
    //     $lastSpin = Spin::where('user_id', $user->id)
    //                     ->whereMonth('created_at', now()->month)
    //                     ->first();

    //     if ($lastSpin) {
    //         return redirect()->route('spinner')->with('message', 'Action completed successfully!');

    //         return response()->json(['message' => 'You have already spun this month!'], 403);
    //     }

    //     // Fetch spin data and create weighted prizes
    //     $spinData = SpinWheelData::first();
    //     $prizes = [];
    //     if ($spinData) {
    //         $prizes = [
    //             ['value' => $spinData->prize_one, 'weight' => 1],
    //             ['value' => $spinData->prize_two, 'weight' => 1],
    //             ['value' => $spinData->prize_three, 'weight' => 1],
    //         ];
    //     }

    //     $coupons = Coupon::where('status', 'active')->inRandomOrder()->limit(5)->get();
    //     foreach ($coupons as $coupon) {
    //         $prizes[] = ['value' => $coupon->code, 'weight' => 1000];
    //     }

    //     // Weighted random selection
    //     $totalWeight = array_sum(array_column($prizes, 'weight'));
    //     $randomWeight = rand(1, $totalWeight);

    //     $cumulativeWeight = 0;
    //     foreach ($prizes as $prize) {
    //         $cumulativeWeight += $prize['weight'];
    //         if ($randomWeight <= $cumulativeWeight) {
    //             $selectedPrize = $prize['value'];
    //             break;
    //         }
    //     }

    //     // Save spin result
    //     Spin::create([
    //         'user_id' => $user->id,
    //         'prize' => $selectedPrize,
    //         'won_at' => Carbon::now(),
    //         'expires_at' => Carbon::now()->addDays(30),
    //     ]);

    //     return response()->json(['prize' => $selectedPrize, 'user' => $user]);
    // }
    public function spin(Request $request)
{
    $user = Auth::user();

    // Check if the user has already spun this month
    $lastSpin = Spin::where('user_id', $user->id)
                    ->whereMonth('created_at', now()->month)
                    ->first();

    if ($lastSpin) {
        return redirect()->route('user.profile')->with([
            'alert-type' => 'info',
            'message' => "You have already spun the wheel this month and won: {$lastSpin->prize}!",
        ]);
    }

    // Fetch spin data and create weighted prizes
    $spinData = SpinWheelData::first();
    $prizes = [];
    if ($spinData) {
        $prizes = [
            ['value' => $spinData->prize_one, 'weight' => 1],
            ['value' => $spinData->prize_two, 'weight' => 1],
            ['value' => $spinData->prize_three, 'weight' => 1],
        ];
    }

    // Fetch active coupons
    $coupons = Coupon::where('status', 'active')->inRandomOrder()->limit(5)->get();
    foreach ($coupons as $coupon) {
        $prizes[] = [
            'value' => $coupon->code,
            'weight' => 1000,
            'discount' => $coupon->discount, // Store discount value for coupon prizes
        ];
    }

    // Weighted random selection
    $totalWeight = array_sum(array_column($prizes, 'weight'));
    $randomWeight = rand(1, $totalWeight);

    $cumulativeWeight = 0;
    $selectedPrize = '';
    $selectedDiscount = null;

    foreach ($prizes as $prize) {
        $cumulativeWeight += $prize['weight'];
        if ($randomWeight <= $cumulativeWeight) {
            $selectedPrize = $prize['value'];
            $selectedDiscount = $prize['discount'] ?? null; // Get discount if it exists
            break;
        }
    }

    // Save spin result based on whether it's a discount coupon or not
    if ($selectedDiscount !== null) {
        // If the prize is a discount coupon, store the discount value
        Spin::create([
            'user_id' => $user->id,
            'prize' => $selectedDiscount, // Store a description of the prize
            'discount' => $selectedDiscount, // Store the discount value
            'won_at' => now(),
            'expires_at' => now()->addDays(30),
        ]);
    } else {
        // Otherwise, store the prize normally
        Spin::create([
            'user_id' => $user->id,
            'prize' => $selectedPrize,
            'won_at' => now(),
            'expires_at' => now()->addDays(30),
        ]);
    }

    // Redirect with success message
    return redirect()->route('user.profile')->with([
        'alert-type' => 'success',
        'message' => "Congratulations! You won {$selectedPrize}.",
    ]);
}


}
