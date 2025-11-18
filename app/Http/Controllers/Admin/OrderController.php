<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\order;

class OrderController extends Controller
{  // Search
         public function index(Request $request)
    {
        // Search
        $search = $request->input('name');

        $orders = Order::withCount('items')  // total items
            ->when($search, function ($query) use ($search) {
                $query->where('name', 'like', '%' . $search . '%')
                      ->orWhere('order_no', 'like', '%' . $search . '%')
                      ->orWhere('phone', 'like', '%' . $search . '%');
            })
            ->orderBy('id', 'DESC')
            ->paginate(10);

        return view('admin.orders.order-index', compact('orders', 'search'));
    }


public function orderDetails($id)
{
    $order = Order::with([
        'items.product.category',
        'items.product.brand'
    ])->findOrFail($id);

    return view('admin.orders.order-details', compact('order'));
}



// public function updateStatus(Request $request, $id)
// {
//     $request->validate([
//         'status' => 'required|in:ordered,processing,delivered,canceled',
//     ]);

//     $order = Order::findOrFail($id);
//     $order->status = $request->status;
//     $order->save();

//     return back()->with('success', 'Order status updated successfully!');
// }


public function updateStatus(Request $request, $id)
{
    $request->validate([
        'status' => 'required|string'
    ]);

    $order = Order::findOrFail($id);

    $newStatus = strtolower($request->status);
    $order->status = $newStatus;

    if ($newStatus === 'delivered') {
        $order->delivered_date = now();
        $order->canceled_date = null;
    }

    if ($newStatus === 'canceled') {
        $order->canceled_date = now();
        $order->delivered_date = null;
    }

    if (in_array($newStatus, ['ordered', 'processing'])) {
        $order->delivered_date = null;
    
    }

    $order->save();

    return back()->with('success', 'Order status updated successfully.');
}


}


