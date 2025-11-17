@extends('layouts.app')

@section('content')
<main class="pt-90">
    <div class="mb-4 pb-4"></div>
    <section class="shop-checkout container">
        <h2 class="page-title">Shipping and Checkout</h2>
        <div class="checkout-steps">
            <a href="{{ route('cart.index') }}" class="checkout-steps__item active">
                <span class="checkout-steps__item-number">01</span>
                <span class="checkout-steps__item-title">
                    <span>Shopping Bag</span>
                    <em>Manage Your Items List</em>
                </span>
            </a>
            <a href="{{ route('checkout.index') }}" class="checkout-steps__item active">
                <span class="checkout-steps__item-number">02</span>
                <span class="checkout-steps__item-title">
                    <span>Shipping and Checkout</span>
                    <em>Checkout Your Items List</em>
                </span>
            </a>
            <a href="#" class="checkout-steps__item">
                <span class="checkout-steps__item-number">03</span>
                <span class="checkout-steps__item-title">
                    <span>Confirmation</span>
                    <em>Review And Submit Your Order</em>
                </span>
            </a>
        </div>

        <form name="checkout-form" method="POST" action="{{ route('checkout.store') }}">
            @csrf
            <div class="checkout-form">
                <div class="billing-info__wrapper">
                    <div class="row">
                        <div class="col-6">
                            <h4>SHIPPING DETAILS</h4>
                        </div>
                    </div>

                    <div class="row mt-5">
                        <div class="col-md-6">
                            <div class="form-floating my-3">
                                <input type="text" class="form-control" name="name" required>
                                <label for="name">Full Name *</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating my-3">
                                <input type="text" class="form-control" name="phone" required>
                                <label for="phone">Phone Number *</label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-floating my-3">
                                <input type="text" class="form-control" name="zip" required>
                                <label for="zip">Pincode *</label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-floating my-3">
                                <input type="text" class="form-control" name="state" required>
                                <label for="state">State *</label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-floating my-3">
                                <input type="text" class="form-control" name="city" required>
                                <label for="city">Town / City *</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating my-3">
                                <input type="text" class="form-control" name="address" required>
                                <label for="address">House no, Building Name *</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating my-3">
                                <input type="text" class="form-control" name="locality" required>
                                <label for="locality">Road Name, Area, Colony *</label>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-floating my-3">
                                <input type="text" class="form-control" name="landmark">
                                <label for="landmark">Landmark</label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="checkout__totals-wrapper">
                    <div class="sticky-content">
                        <div class="checkout__totals">
                            <h3>Your Order</h3>
                            <table class="checkout-cart-items">
                                <thead>
                                    <tr>
                                        <th>PRODUCT</th>
                                        <th class="text-end">SUBTOTAL</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($items as $item)
                                        <tr>
                                            <td>{{ $item->name }} x {{ $item->qty }}</td>
                                            <td class="text-end">${{ number_format($item->price * $item->qty, 2) }}</td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="2" class="text-center text-muted py-3">
                                                Your cart is empty.
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>

                            @if(count($items) > 0)
                                <table class="checkout-totals mt-4">
                                    <tbody>
                                        <tr>
                                            <th>SUBTOTAL</th>
                                            <td class="text-end">${{ number_format($subtotalAfterDiscount, 2) }}</td>
                                        </tr>
                                        <tr>
                                            <th>SHIPPING</th>
                                            <td class="text-end">Free shipping</td>
                                        </tr>
                                        <tr>
                                            <th>VAT</th>
                                            <td class="text-end">${{ number_format($vat, 2) }}</td>
                                        </tr>
                                        <tr>
                                            <th>TOTAL</th>
                                            <td class="text-end"><strong>${{ number_format($total, 2) }}</strong></td>
                                        </tr>
                                    </tbody>
                                </table>
                            @endif
                        </div>

                        <!-- Payment Methods -->
                     <div class="checkout__payment-methods">

    <!-- Direct Bank Transfer -->
    <div class="form-check">
        <input 
            class="form-check-input form-check-input_fill" 
            type="radio"
            name="payment_method" 
            id="payment_method_bank"
            value="bank" 
            checked
        >
        <label class="form-check-label" for="payment_method_bank">
            Direct bank transfer
            <p class="option-detail">
                Make your payment directly into our bank account. Please use your Order ID
                as the payment reference. Your order will not be shipped until the funds
                have cleared in our account.
            </p>
        </label>
    </div>

    <!-- Check Payments -->
    <div class="form-check">
        <input 
            class="form-check-input form-check-input_fill" 
            type="radio"
            name="payment_method" 
            id="payment_method_check"
            value="check"
        >
        <label class="form-check-label" for="payment_method_check">
            Check payments
            <p class="option-detail">
                You can pay using a check. Your order will be processed once the check clears.
            </p>
        </label>
    </div>

    <!-- Cash On Delivery -->
    <div class="form-check">
        <input 
            class="form-check-input form-check-input_fill" 
            type="radio"
            name="payment_method" 
            id="payment_method_cod"
            value="cash"
        >
        <label class="form-check-label" for="payment_method_cash">
            Cash on delivery
            <p class="option-detail">
                Pay with cash when your order is delivered to your doorstep.
            </p>
        </label>
    </div>

    <!-- Paypal -->
    <div class="form-check">
        <input 
            class="form-check-input form-check-input_fill" 
            type="radio"
            name="payment_method" 
            id="payment_method_paypal"
            value="paypal"
        >
        <label class="form-check-label" for="payment_method_paypal">
            Paypal
            <p class="option-detail">
                Pay easily and securely using your Paypal account.
            </p>
        </label>
    </div>

    <div class="policy-text">
        Your personal data will be used to process your order and support your experience
        throughout this website, according to our 
        <a href="terms.html" target="_blank">privacy policy</a>.
    </div>
</div>




                        <button type="submit" class="btn btn-primary btn-checkout">PLACE ORDER</button>
                    </div>
                </div>
            </div>
        </form>
    </section>
</main>
@endsection
