<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Surfsidemedia\Shoppingcart\Facades\Cart;
use App\Models\Coupon;

class CartController extends Controller
{
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
                // percent হলে
                $discount = ($subtotal * $coupon['value']) / 100;
            }
        }

        // Subtotal থেকে discount বাদ দেওয়া
        $subtotalAfterDiscount = $subtotal - $discount;

        // VAT 5%
        $vat = ($subtotalAfterDiscount * 0.15);

        // Final Total
        $total = $subtotalAfterDiscount + $vat;

        return view('shopping-cart.cart-index', compact('items', 'subtotal', 'discount', 'subtotalAfterDiscount', 'vat', 'total'));
    }



    public function applyCoupon(Request $request)
    {
        $coupon = Coupon::where('code', $request->coupon_code)
                        ->where('status', 1)
                        ->where('expires_at', '>=', now())
                        ->first();

        if (!$coupon) {
            return back()->with('error', 'Invalid or expired coupon code.');
        }

        session()->put('coupon', [
            'code' => $coupon->code,
            'type' => $coupon->type,
            'value' => $coupon->value,
        ]);

        return back()->with('success', 'Coupon applied successfully!');
    }




    public function removeCoupon()
    {
        session()->forget('coupon');
        return back()->with('success', 'Coupon removed.');
    }

    // 🛒 অন্যান্য cart ফাংশনগুলো (add, update, remove, etc.)
public function add_to_cart(Request $request)
{
    Cart::instance('cart')->add([
        'id'    => $request->id,
        'name'  => $request->name,
        'qty'   => $request->quantity,
        'price' => $request->price,
        'options' => [
            'product_name' => $request->name,
        ]
    ])->associate('App\Models\Product');

    return back();
}



    public function increase_cart_quantity($rowId)
    {
        $product = Cart::instance('cart')->get($rowId);
        Cart::instance('cart')->update($rowId, $product->qty + 1);
        return back();
    }

    public function decrease_cart_quantity($rowId)
    {
        $product = Cart::instance('cart')->get($rowId);
        Cart::instance('cart')->update($rowId, $product->qty - 1);
        return back();
    }



    public function removeItem($rowId)
    {
        Cart::instance('cart')->remove($rowId);
        return back();
    }


    public function empty_cart()
    {
        Cart::instance('cart')->destroy();
        session()->forget('coupon');
        return back();
    }

}
