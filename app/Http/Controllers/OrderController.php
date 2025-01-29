<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Spin;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\ConfirmedOrder;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{



    public function show(Request $request)
    {
        $items = Cart::with('accessory')->where('user_id', auth()->id())->get(); // Eager load accessory

        $subtotal = $request->input('subtotal');
        $discount = $request->input('discount');
        $total = $request->input('total');

        // Pass the data to the view
        return view('Frontend.order', compact('subtotal', 'discount', 'total', 'items'));
    }

    //











    // Show the checkout form with order details
    public function checkoutForm(Request $request)
    {
        // Retrieve the cart items from the database
        $items = Cart::where('user_id', Auth::id())->get(); // Retrieve cart items for the logged-in user
        $subtotal = $request->input('subtotal');
        $discount = $request->input('discount');
        $total = $request->input('total');
        // // Calculate the subtotal (or any other logic as needed)
        // $subtotal = $items->sum(function ($item) {
        //     return $item->price * $item->quantity; // Adjust the field names as needed
        // });

        // Return the view with the items and subtotal
        return view('Frontend.order', compact('items', 'subtotal', 'discount', 'total'));
    }


    // Confirm the order and save to database
    public function orderConfirm(Request $request)
    {
        if (Auth::check()) {
            // Validate the request
            $request->validate([
                'customer_name' => 'required|string|max:255',
                'customer_phone' => 'required|string|max:15',
                'customer_address' => 'required|string|max:500',
                'total' => 'required|numeric',
            ]);

            // Create the order
            $order = new Order();
            $order->user_id = Auth::id();
            $order->name = $request->customer_name;
            $order->phone = $request->customer_phone;
            $order->address = $request->customer_address;
            $order->total = $request->total; // Original total amount
            $order->discount_amount = $request->discount; // Discount amount
            $order->discounted_total = $request->total - $request->discount; // Apply discount to total
            $order->payment_method = 'Cash on Delivery'; // Default for this example
            $order->status = 'pending'; // Order status

            // Collect product names from the cart and save them in the order
            $cartItems = Cart::where('user_id', Auth::id())->get();

            foreach ($cartItems as $cartItem) {
                // Access the related accessory's name using the relationship
                $productNames[] = $cartItem->accessory->name;  // 'name' is the attribute in the Accessory model
            }

            // Debug to see the product names
            $order->product_names = implode(', ', $productNames);  // Join the product names as a string

            $order->save();  // Save the order


            // Mark the prize as used
        $latestSpin = Spin::where('user_id', Auth::id())->latest()->first();
        if ($latestSpin) {
            $latestSpin->is_used = true; // Mark as used
            $latestSpin->save();
        }

        Cart::where('user_id', Auth::id())->delete();
            // Redirect to the order confirmation page or order list
            return redirect()->route('car')->with('success', 'Order placed successfully!');
        } else {
            return redirect()->route('user.login');
        }
    }


    // List all orders for the user
    public function orderList()
    {
        // Paginate orders, 10 per page (you can adjust the number)
        $orders = Order::where('user_id', Auth::id())->all();

        return view('your-view-name', compact('orders'));
    }
}
