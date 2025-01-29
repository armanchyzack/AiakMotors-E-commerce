<?php

namespace App\Http\Controllers\BackendController;

use App\Models\Order;
use App\Models\SoldItem;
use Illuminate\Http\Request;
use App\Models\ConfirmedOrder;
use App\Http\Controllers\Controller;

class OrderListController extends Controller
{
    // Show pending orders (latest first)
    public function index()
    {
        $orders = Order::where('status', 'pending')->paginate(8);
        return view('Backend.OrderList.order_list', compact('orders'));
    }

    // Confirm an order
    public function confirmOrder($id)
    {
        $order = Order::find($id);
        if ($order) {
            $order->status = 'approved';
            $order->save();
            return redirect()->route('orders.confirmed')->with('success', 'Order confirmed successfully!');
        }
        return redirect()->route('orders.index')->with('error', 'Order not found!');
    }

    // Ship an order
    public function shipOrder(Request $request)
    {
        // Implement the shipping functionality here.
        return redirect()->route('orders.delivered')->with('success', 'Order marked as shipped!');
    }

    // Show confirmed orders
    public function confirmedOrders()
    {
        $orders = Order::where('status', 'approved')->paginate(8);
        return view('Backend.OrderList.confirm', compact('orders'));
    }

    // Show delivered orders
    public function deliveredOrders()
    {
        $orders = Order::where('status', 'delivered')->paginate(8);
        return view('Backend.OrderList.sold', compact('orders'));
    }

    // Update order status
    public function updateStatus($orderId, Request $request)
    {
        $order = Order::find($orderId);
        if ($order) {
            $validStatuses = ['pending', 'approved', 'delivered'];
            if (in_array($request->status, $validStatuses)) {
                $order->status = $request->status;
                $order->save();
                return redirect()->route('orders.index')->with('success', 'Order status updated!');
            }
            return redirect()->route('orders.index')->with('error', 'Invalid status!');
        }
        return redirect()->route('orders.index')->with('error', 'Order not found!');
    }
}






