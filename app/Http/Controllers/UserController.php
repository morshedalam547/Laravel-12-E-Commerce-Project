<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function userDashboard()
    {
        return view('user.index');
    }

    public function index()
    {
        $orders = Order::withCount('items')
            ->where('user_id', Auth::id())
            ->orderBy('id', 'DESC')
            ->paginate(10);

        return view('user.user-orders', compact('orders'));
    }

    public function show(Order $order)
    {
        if ($order->user_id != Auth::id()) {
            abort(403, 'Unauthorized Access!');
        }

        $order->load('items.product');

        return view('user.user-order-details', compact('order'));
    }



    // UserController.php
public function cancelOrder(Order $order)
{
    // শুধু order এর মালিক user এই action করতে পারবে
    if ($order->user_id != Auth::id()) {
        abort(403, 'Unauthorized Access!');
    }

    // কেবলমাত্র "ordered" status এর order cancel করা যাবে
    if ($order->status != 'ordered') {
        return redirect()->back()->with('error', 'Order cannot be canceled!');
    }

    $order->status = 'canceled';
    $order->canceled_date = now();
    $order->save();

    return redirect()->back()->with('success', 'Order canceled successfully.');
}

}
