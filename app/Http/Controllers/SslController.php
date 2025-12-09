<?php

namespace App\Http\Controllers;

use Surfsidemedia\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Library\SslCommerz\SslCommerzNotification;
use App\Models\OrderItem;
use Auth;
class SslController extends Controller
{
    public function index(Request $request)
    {
        // VALIDATION
        $request->validate([
            'name' => 'required',
            'customer_mobile' => 'required',
            'zip' => 'required',
            'state' => 'required',
            'city' => 'required',
            'customer_address' => 'required',
            'payment_method' => 'required|in:cod,ssl',
            'amount' => 'required|numeric',
        ]);

        // CART TOTAL
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


        // ORDER ID
        $publicOrderId = 'ORD-' . time();

        // INSERT ORDER BEFORE PAYMENT
        $orderDbId = DB::table('orders')->insertGetId([
            'order_id' => $publicOrderId,
             'user_id' => Auth::id(),
            'name' => $request->name,
            'phone' => $request->customer_mobile,
            'zip' => $request->zip,
            'state' => $request->state,
            'city' => $request->city,
            'address' => $request->customer_address,
            'locality' => $request->locality ?? '',
            'landmark' => $request->landmark ?? null,
            'subtotal' => $subtotal,
            'vat' => $vat,
            'total' => $total,
            'payment_method' => $request->payment_method == 'cod' ? 'Cash On Delivery' : 'SSLCommerz',
            'status' => 'ordered',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // SAVE ORDER ITEMS
        foreach ($items as $item) {
            OrderItem::create([
                'order_id' => $orderDbId,
                'product_id' => $item->id,
                'product_name' => $item->name,
                'quantity' => $item->qty,
                'price' => $item->price,
            ]);
        }

        // IF COD (NO SSL PAYMENT)
        if ($request->payment_method == 'cod') {

            Cart::instance('cart')->destroy();
            session()->forget('coupon');

            return redirect('/my-orders')->with('success', 'Order placed successfully (Cash on Delivery).');
        }

        // ******** SSL PAYMENT ********

        $tran_id = uniqid('tran_');

        // UPDATE ORDER TRANSACTION ID
        DB::table('orders')->where('id', $orderDbId)->update([
            'payment_method' => 'SSLCommerz',
        ]);

        // MANDATORY SSL DATA
        $post_data = [];
        $post_data['total_amount'] = $total;
        $post_data['currency'] = "BDT";
        $post_data['tran_id'] = $tran_id;

        // CUSTOMER INFO
        $post_data['cus_name'] = $request->name;
        $post_data['cus_email'] = $request->email ?? "demo@mail.com";
        $post_data['cus_phone'] = $request->customer_mobile;
        $post_data['cus_add1'] = $request->customer_address;
        $post_data['cus_city'] = $request->city;
        $post_data['cus_country'] = "Bangladesh";

        // SHIPPING INFO
        $post_data['ship_name'] = $request->name;
        $post_data['ship_add1'] = $request->customer_address;
        $post_data['ship_city'] = $request->city;
        $post_data['ship_country'] = "Bangladesh";

        $post_data['shipping_method'] = "NO";
        $post_data['product_name'] = "Order Payment";
        $post_data['product_category'] = "Ecommerce";
        $post_data['product_profile'] = "general";

        // SSL REDIRECT URLs
        $post_data['success_url'] = url('/ssl-success');
        $post_data['fail_url'] = url('/ssl-fail');
        $post_data['cancel_url'] = url('/ssl-cancel');
        $post_data['ipn_url'] = url('/ipn');

        // CALL SSLCommerz
        $sslc = new SslCommerzNotification();
        return $sslc->makePayment($post_data, 'hosted');
    }



public function success(Request $request)
{
    
    
return redirect('/shop')->with('success','Payment Completed Successfully!');

}


}


