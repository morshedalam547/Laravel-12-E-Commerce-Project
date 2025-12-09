<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Surfsidemedia\Shoppingcart\Facades\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use Auth;

class CheckoutController extends Controller
{
    // Checkout Page
    public function index()
    {
        $items = Cart::instance('cart')->content();

        $subtotal = floatval(str_replace(',', '', Cart::instance('cart')->subtotal()));
        $coupon = session()->get('coupon');

        $discount = $coupon
            ? ($coupon['type'] == 'fixed'
                ? $coupon['value']
                : ($subtotal * $coupon['value']) / 100)
            : 0;

        $subtotalAfterDiscount = $subtotal - $discount;
        $vat = $subtotalAfterDiscount * 0.15;
        $total = $subtotalAfterDiscount + $vat;

        return view('checkout.index', compact(
            'items',
            'subtotal',
            'discount',
            'subtotalAfterDiscount',
            'vat',
            'total'
        ));
    }


    // Checkout Submit
  public function store(Request $request)
{
    $request->validate([
        'name' => 'required',
        'phone' => 'required',
        'zip' => 'required',
        'state' => 'required',
        'city' => 'required',
        'address' => 'required',
        'locality' => 'required',
    ]);

    $items = Cart::instance('cart')->content();
    if ($items->isEmpty()) {
        return back()->with('error', 'Your cart is empty');
    }

    $subtotal = floatval(str_replace(',', '', Cart::instance('cart')->subtotal()));
    $coupon = session()->get('coupon');
    $discount = $coupon
        ? ($coupon['type'] == 'fixed' ? $coupon['value'] : ($subtotal * $coupon['value']) / 100)
        : 0;
    $subtotalAfterDiscount = $subtotal - $discount;
    $vat = $subtotalAfterDiscount * 0.15;
    $total = $subtotalAfterDiscount + $vat;

    if ($request->payment_method == 'sslcommerz') {
        session()->put('checkout_data', [
            'name' => $request->name,
            'phone' => $request->phone,
            'zip' => $request->zip,
            'state' => $request->state,
            'city' => $request->city,
            'address' => $request->address,
            'locality' => $request->locality,
            'landmark' => $request->landmark,
            'payment_method' => 'sslcommerz',
            'subtotal' => $subtotalAfterDiscount,
            'discount' => $discount,
            'vat' => $vat,
            'total' => $total,
        ]);

        session()->flash('ssl_redirect', true);
        return redirect()->route('checkout.index'); // reload Blade to trigger hidden POST
    }

    // Other payment methods
    $order = Order::create([
        'order_id' => 'ORD-' . time(),
        'user_id' => Auth::id(),
        'name' => $request->name,
        'phone' => $request->phone,
        'zip' => $request->zip,
        'state' => $request->state,
        'city' => $request->city,
        'address' => $request->address,
        'locality' => $request->locality,
        'landmark' => $request->landmark,
        'payment_method' => $request->payment_method,
        'subtotal' => $subtotalAfterDiscount,
        'discount' => $discount,
        'vat' => $vat,
        'total' => $total,
        'status' => 'ordered',
    ]);

    foreach ($items as $item) {
        OrderItem::create([
            'order_id' => $order->id,
            'product_id' => $item->id,
            'product_name' => $item->name,
            'quantity' => $item->qty,
            'price' => $item->price,
        ]);
    }

    Cart::instance('cart')->destroy();
    session()->forget('coupon');

    return redirect()->route('order.confirmation', $order->order_id)
                     ->with('success', 'Order placed successfully!');
}


    // Confirmation Page
    public function confirmation($order_id)
    {
        $order = Order::where('order_id', $order_id)->with('items')->firstOrFail();
        return view('checkout.order-confirmation', compact('order'));
    }
}
