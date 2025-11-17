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
    // Checkout page দেখানোর জন্য
    public function index()
    {
        $items = Cart::instance('cart')->content();

        // মূল Subtotal
        $subtotal = floatval(str_replace(',', '', Cart::instance('cart')->subtotal()));

        // Coupon তথ্য বের করা
        $coupon = session()->get('coupon');
        $discount = 0;
        if ($coupon) {
            if ($coupon['type'] == 'fixed') {
                $discount = $coupon['value'];
            } else {
                $discount = ($subtotal * $coupon['value']) / 100;
            }
        }

        $subtotalAfterDiscount = $subtotal - $discount;
        $vat = $subtotalAfterDiscount * 0.15;
        $total = $subtotalAfterDiscount + $vat;

        return view('checkout.index', compact('items', 'subtotal', 'discount', 'subtotalAfterDiscount', 'vat', 'total'));
    }

    // Checkout form submit handling
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

        // Subtotal, discount, VAT, total
        $subtotal = floatval(str_replace(',', '', Cart::instance('cart')->subtotal()));
        $coupon = session()->get('coupon');
        $discount = $coupon ? ($coupon['type'] == 'fixed' ? $coupon['value'] : ($subtotal * $coupon['value'] / 100)) : 0;
        $subtotalAfterDiscount = $subtotal - $discount;
        $vat = $subtotalAfterDiscount * 0.15;
        $total = $subtotalAfterDiscount + $vat;

        // Order create
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
           'payment_method' => $request->payment_method ?? 'cod',

            'subtotal' => $subtotalAfterDiscount,
              'discount' => $discount,      // ← ★★★ FIX ADDED ★★★
            'vat' => $vat,
            'total' => $total,
             'status' => 'ordered',   // এখানে add করা হলো
        ]);

        // Order Items save
$items = Cart::instance('cart')->content();

foreach ($items as $item) {
    OrderItem::create([
        'order_id'     => $order->id,
        'product_id'   => $item->id,
        'product_name' => $item->name,
        'quantity'     => $item->qty,
        'price'        => $item->price,
    ]);
}



        // Clear cart & coupon
        Cart::instance('cart')->destroy();
        session()->forget('coupon');

        // Redirect to confirmation page
        return redirect()->route('order.confirmation', $order->order_id)
                         ->with('success', 'Order placed successfully!');
    }

    // Order confirmation page
    public function confirmation($order_id)
    {
        $order = Order::where('order_id', $order_id)->with('items')->firstOrFail();
        return view('checkout.order-confirmation', compact('order'));
    }
}
