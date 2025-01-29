<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Coupon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class ValidateCoupon
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle($request, Closure $next)
{
    $coupon = Coupon::where('code', $request->coupon_code)
    ->where('status', 'active')
    ->where('valid_from', '<=', now())
    ->where('valid_until', '>=', now())
    ->first();

if (!$coupon) {
return redirect()->back()->withErrors('Invalid or expired coupon.');
}

// Check if the user meets the usage limit per coupon
$usage_count = $coupon->usages()->where('user_id', Auth::id())->count();

if ($usage_count >= $coupon->usage_limit_per_user) {
return redirect()->back()->withErrors('Coupon usage limit reached.');
}

// Check cart total if necessary
if ($request->cart_total < $coupon->discount) {
return redirect()->back()->withErrors('Minimum cart amount not met.');
}

return $next($request);
}

}
