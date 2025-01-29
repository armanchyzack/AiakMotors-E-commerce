<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Cart;
use App\Models\Spin;
use App\Models\Order;
use App\Models\Coupon;
use App\Models\Accessory;
use App\Models\OrderItem;
use App\Models\Discountcode;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{





    public function addToCart($id)
{
    if (Auth::check()) {
        // The user is authenticated, proceed with adding to cart
        $cart = new Cart();
        $cart->user_id = Auth::user()->id;
        $cart->accessory_id = $id;
        $cart->quantity = 1;
        $cart->save();
        return back();
    } else {
        // The user is not authenticated, redirect to login page
        return redirect()->route('user.login');
    }
}




public function goToCart() {
    if (!Auth::check()) {
        return redirect()->route('user.login'); // Redirect to login page if not authenticated
    }

    $carts = Cart::where('user_id', Auth::user()->id)->with('accessory')->get();
    $latestSpin = Spin::where('user_id', Auth::user()->id)
        ->orderBy('created_at', 'desc')
        ->first();

    $accessories = Accessory::orderBy('price', 'asc')->select('id', 'image_url', 'name','price', 'discount_price')->get();

    $subtotal = $carts->sum(fn($cart) => $cart->accessory->discount_price ?? $cart->accessory->price);

    // Check if the spin prize is valid (expires_at is in the future)
    $isPrizeValid = $latestSpin && $latestSpin->expires_at && $latestSpin->expires_at->isFuture();
    $discount = $isPrizeValid ? $latestSpin->discount : null;
    $latestSpin = Spin::where('user_id', Auth::user()->id)
                ->orderBy('created_at', 'desc')
                ->first();
$isExpired = $latestSpin && now()->greaterThan($latestSpin->expires_at);
    return view('Frontend.cart', compact('carts', 'accessories', 'subtotal', 'latestSpin', 'isPrizeValid', 'discount','isExpired'));
}
public function applyPrize(Request $request)
{
    // $prize = $request->input('prize'); // The prize percentage
    // $subtotal = $request->input('subtotal'); // The current subtotal

    // // Check if the prize is valid and apply the discount
    // if ($prize && $subtotal) {
    //     // Calculate the discounted total
    //     $discountedTotal = $subtotal - (($prize / 100) * $subtotal);

    //     return response()->json([
    //         'message' => 'Prize applied successfully.',
    //         'discounted_total' => $discountedTotal
    //     ]);
    // }

    // return response()->json([
    //     'error' => 'Failed to apply prize.'
    // ], 400);




    $prize = $request->input('prize'); // The prize percentage
    $subtotal = $request->input('subtotal'); // The current subtotal

    // Get the latest prize for the user
    $latestSpin = Spin::where('user_id', Auth::id())
                      ->latest()
                      ->first();

    // Check if the prize is valid (not expired and not used)
    if ($latestSpin && !now()->greaterThan($latestSpin->expires_at) && !$latestSpin->is_used) {
        // Calculate the discounted total
        $discountedTotal = $subtotal - (($prize / 100) * $subtotal);

        // Mark the prize as used
        $latestSpin->is_used = true;
        $latestSpin->save();

        return response()->json([
            'message' => 'Prize applied successfully.',
            'discounted_total' => $discountedTotal
        ]);
    }

    return response()->json([
        'error' => 'Prize is either expired or already used.'
    ], 400);
}







    public function applyCoupon(Request $request)
{
    $user = Auth::user(); // Get the authenticated user
    $couponCode = $request->input('coupon_code'); // Get coupon code from the request

    // Check if coupon exists and is active
    $coupon = Coupon::where('code', $couponCode)
                    ->where('status', 'active')
                    ->where('valid_from', '<=', now())
                    ->where('valid_until', '>=', now())
                    ->first();

    if (!$coupon) {
        return response()->json(['error' => 'Invalid or expired coupon.'], 400);
    }

    // Check if the coupon usage limit has been reached
    if ($coupon->usage_limit_total <= 0) {
        return response()->json(['error' => 'Coupon usage limit has been reached.'], 400);
    }

    // Check if the user has exceeded their coupon usage limit
    $usageCount = $user->coupons()->where('coupon_id', $coupon->id)->count();

    if ($usageCount >= $coupon->usage_limit_per_user) {
        return response()->json(['error' => 'You have already used this coupon the maximum allowed number of times.'], 400);
    }

    // Apply the discount and store the coupon usage
    $user->coupons()->attach($coupon->id); // Attach coupon to user

    // Update the coupon's total usage count
    $coupon->usage_limit_total -= 1; // Decrement total usage
    $coupon->save();

    // Get the cart and calculate the subtotal
    $carts = Cart::where('user_id', $user->id)->with('accessory')->get();
    $subtotal = $carts->sum(fn($cart) => $cart->accessory->discount_price ?? $cart->accessory->price);

    // Apply the coupon discount
    $discountedTotal = $subtotal - ($subtotal * ($coupon->discount / 100));

    return response()->json([
        'message' => 'Coupon applied successfully.',
        'coupon_discount' => $coupon->discount,
        'discounted_total' => $discountedTotal
    ]);
}

    public function remove($id)
{
    $cartItem = Cart::find($id);

    if ($cartItem) {
        $cartItem->delete();
        return response()->json(['success' => true, 'message' => 'Item removed from cart']);
    }

    return response()->json(['success' => false, 'message' => 'Item not found'], 404);
}



}
