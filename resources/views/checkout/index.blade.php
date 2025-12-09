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
        <form id="checkout-form" method="POST" action="{{ route('ssl.pay') }}">
            @csrf

            <div class="row mt-5">
                <div class="col-md-8">
                  

                    <div class="row mt-4">
                        <div class="col-md-6">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="name" required value="{{ old('name') }}">
                                <label>Full Name *</label>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-floating mb-3">
                                <input type="tel" class="form-control" name="customer_mobile" required value="{{ old('customer_mobile') }}">
                                <label>Phone Number *</label>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="zip" required value="{{ old('zip') }}">
                                <label>Pincode *</label>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="state" required value="{{ old('state') }}">
                                <label>State *</label>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="city" required value="{{ old('city') }}">
                                <label>Town / City *</label>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="customer_address" required value="{{ old('customer_address') }}">
                                <label>House no, Building Name *</label>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="locality" value="{{ old('locality') }}">
                                <label>Road Name, Area, Colony</label>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="landmark" value="{{ old('landmark') }}">
                                <label>Landmark</label>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- ORDER SUMMARY -->
                <div class="col-md-4">
                    <h3>Your Order</h3>

                    <table class="checkout-cart-items table">
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

                    <table class="table">
                        <tr>
                            <th>SUBTOTAL</th>
                            <td class="text-end">${{ number_format($subtotalAfterDiscount, 2) }}</td>
                        </tr>
                        <tr>
                            <th>VAT</th>
                            <td class="text-end">${{ number_format($vat, 2) }}</td>
                        </tr>
                        <tr>
                            <th>TOTAL</th>
                            <td class="text-end"><strong>${{ number_format($total, 2) }}</strong></td>
                        </tr>
                    </table>

                    <h5>Select Payment Method</h5>

                    <div class="form-check">
                        <input type="radio" class="form-check-input" name="payment_method" value="cod" checked id="pm-cod">
                        <label class="form-check-label" for="pm-cod">Cash on Delivery</label>
                    </div>

                    <div class="form-check mt-2">
                        <input type="radio" class="form-check-input" name="payment_method" value="ssl" id="pm-ssl">
                        <label class="form-check-label" for="pm-ssl">SSLCommerz Payment</label>
                    </div>

                    <hr>

                    <!-- COD BUTTON -->
                    <button type="submit" class="btn btn-success btn-lg w-100 mb-2" id="codBtn" name="action" value="cod">
                        Confirm Order (COD)
                    </button>

                    <!-- SSL BUTTON (submit; controller will handle hosted payment) -->
                    <button type="submit" class="btn btn-primary btn-lg w-100" id="sslczPayBtn" name="action" value="ssl" style="display:none;">
                        Pay Now (SSLCommerz)
                    </button>

                    <!-- pass computed total to server -->
                    <input type="hidden" name="amount" value="{{ $total }}">
                </div>
            </div>
        </form>
    </section>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        // Toggle payment buttons visually
        function togglePaymentBtns() {
            if ($('input[name="payment_method"]:checked').val() === 'cod') {
                $('#codBtn').show();
                $('#sslczPayBtn').hide();
            } else {
                $('#codBtn').hide();
                $('#sslczPayBtn').show();
            }
        }
        $(document).ready(function(){
            togglePaymentBtns();
            $('input[name="payment_method"]').on('change', togglePaymentBtns);
        });
    </script>

</main>
@endsection
