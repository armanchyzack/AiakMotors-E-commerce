<?php

namespace App\Http\Controllers\BackendController;

use App\Models\Coupon;
use Illuminate\Support\Str;
use App\Models\DiscountCode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\CouponUser;

class DiscountCodeController extends Controller
{


    public function allDiscountCode()
    {
        $coupons = Coupon::all();
        return view('Backend.Discount.all_discount', compact('coupons'));
    }

    public function view()
    {
        return view('Backend.Discount.add_discount_code');
    }

    public function insert(Request $request)
    {
        $validated = $request->validate([
            'code' => 'required|string|unique:coupons,code',
            'discount' => 'required|numeric|min:0|max:100', // Discount is a percentage
            'section' => 'required|in:accessory,car',
            'status' => 'required|in:active,inactive',
            'usage_limit_per_user' => 'required|integer|min:1',
            'usage_limit_total' => 'required|integer|min:1',
            'valid_from' => 'required|date',
            'valid_until' => 'required|date|after:valid_from',
        ]);

        Coupon::create($validated);
        return redirect()->route('discount.code.all')->with('success', 'Coupon created successfully.');
    }

    public function editdiscountCode(Coupon $coupon)
{
    return view('Backend.Discount.edit_discount_code', compact('coupon'));
}

public function updateDiscountCode(Request $request, Coupon $coupon)
{
    $validated = $request->validate([
        'code' => 'required|string|unique:coupons,code,' . $coupon->id,
        'discount' => 'required|numeric|min:0|max:100', // Discount is a percentage
        'section' => 'required|in:accessory,car',
        'status' => 'required|in:active,inactive',
        'usage_limit_per_user' => 'required|integer|min:1',
        'usage_limit_total' => 'required|integer|min:1',
        'valid_from' => 'required|date',
        'valid_until' => 'required|date|after:valid_from',
    ]);

    $coupon->update($validated);

    return redirect()->route('discount.code.all')->with('success', 'Coupon updated successfully.');
}


    public function deleteDiscountCode(Coupon $coupon)
    {
        $coupon->delete();
        return redirect()->route('discount.code.all');
    }



    public function cuponuser()
    {
        $couponUsageData = CouponUser::select('user_id', 'coupon_id', DB::raw('count(*) as total_usage'), DB::raw('max(created_at) as last_used'))
            ->groupBy('user_id', 'coupon_id')
            ->get();

        return view('Backend.Discount.cupon_user', compact('couponUsageData'));
    }
}
