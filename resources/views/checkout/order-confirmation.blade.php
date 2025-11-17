@extends('layouts.app')

@section('content')
  <main class="pt-90">
    <div class="mb-4 pb-4"></div>
    <section class="shop-checkout container">
      <h2 class="page-title">Order Received</h2>
      <div class="checkout-steps">
        <a href="cart.html" class="checkout-steps__item active">
          <span class="checkout-steps__item-number">01</span>
          <span class="checkout-steps__item-title">
            <span>Shopping Bag</span>
            <em>Manage Your Items List</em>
          </span>
        </a>
        <a href="checkout.html" class="checkout-steps__item active">
          <span class="checkout-steps__item-number">02</span>
          <span class="checkout-steps__item-title">
            <span>Shipping and Checkout</span>
            <em>Checkout Your Items List</em>
          </span>
        </a>
        <a href="order-confirmation.html" class="checkout-steps__item active">
          <span class="checkout-steps__item-number">03</span>
          <span class="checkout-steps__item-title">
            <span>Confirmation</span>
            <em>Review And Submit Your Order</em>
          </span>
        </a>
      </div>
      <div class="order-complete">
         {{-- Success Message --}}
        <div class="order-complete text-center bg-light p-5 rounded shadow-sm mb-5">
            <div class="mb-3">
                <svg width="80" height="80" viewBox="0 0 80 80" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <circle cx="40" cy="40" r="40" fill="#B9A16B" />
                    <path d="M52.9743 35.7612C52.9743 35.3426 52.8069 34.9241 52.5056 34.6228L50.2288 32.346C49.9275 32.0446 49.5089 31.8772 49.0904 31.8772C48.6719 31.8772 48.2533 32.0446 47.952 32.346L36.9699 43.3449L32.048 38.4062C31.7467 38.1049 31.3281 37.9375 30.9096 37.9375C30.4911 37.9375 30.0725 38.1049 29.7712 38.4062L27.4944 40.683C27.1931 40.9844 27.0257 41.4029 27.0257 41.8214C27.0257 42.24 27.1931 42.6585 27.4944 42.9598L33.5547 49.0201L35.8315 51.2969C36.1328 51.5982 36.5513 51.7656 36.9699 51.7656C37.3884 51.7656 37.8069 51.5982 38.1083 51.2969L40.385 49.0201L52.5056 36.8996C52.8069 36.5982 52.9743 36.1797 52.9743 35.7612Z" fill="white" />
                </svg>
            </div>
            <h3 class="fw-bold mb-2">Your order is completed!</h3>
            <p class="text-muted mb-0">Thank you. Your order has been received.</p>
        </div>

        {{-- Order Info Cards --}}
        <div class="row g-4 mb-5">
            <div class="col-md-3">
                <div class="card text-center p-3 shadow-sm">
                    <small class="text-muted">Order Number</small>
                    <div class="fw-bold">{{ $order->order_id }}</div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card text-center p-3 shadow-sm">
                    <small class="text-muted">Date</small>
                    <div class="fw-bold">{{ $order->created_at->format('d/m/Y') }}</div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card text-center p-3 shadow-sm">
                    <small class="text-muted">Total</small>
                    <div class="fw-bold">${{ number_format($order->total, 2) }}</div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card text-center p-3 shadow-sm">
                    <small class="text-muted">Payment Method</small>
                    <div class="fw-bold">{{ ucfirst($order->payment_method) }}</div>
                </div>
            </div>
        </div>

        {{-- Order Details Card --}}
    <div class="card p-4 mb-5 shadow-sm" style="background-color: #ffffff; border: 1px solid #e3e3e3; border-radius: 0.5rem;">
    <h4 class="mb-3">Order Details</h4>

    <div class="table-responsive">
        <!-- Items Table -->
        <table class="table mb-3" style="background-color: #ffffff; border: 1px solid #e3e3e3;">
            <thead>
                <tr>
                    <th style="border-bottom: 2px solid #e3e3e3;">Product</th>
                    <th class="text-end" style="border-bottom: 2px solid #e3e3e3;">Subtotal</th>
                </tr>
            </thead>
          
  <tbody>
                        @foreach ($order->items as $item)
                            <tr>
                                <td>{{ $item->product_name ?? $item->product->name ?? 'Product' }} x {{ $item->quantity }}</td>
                                <td class="text-end">${{ number_format($item->price * $item->quantity, 2) }}</td>
                            </tr>
                        @endforeach
                    </tbody>
        </table>

        <!-- Summary Table -->
        <table class="table mb-0" style="background-color: #ffffff; border: 1px solid #e3e3e3;">
            <tbody>
        
                <tr>
                    <th style="border-top: 1px solid #e3e3e3;">Subtotal</th>
                    <td style="border-top: 1px solid #e3e3e3;">${{ number_format($order->subtotal, 2) }}</td>
                </tr>
                <tr>
                    <th style="border-top: 1px solid #e3e3e3;">Shipping</th>
                    <td style="border-top: 1px solid #e3e3e3;">Free shipping</td>
                </tr>
                <tr>
                    <th style="border-top: 1px solid #e3e3e3;">VAT</th>
                    <td style="border-top: 1px solid #e3e3e3;">${{ number_format($order->vat, 2) }}</td>
                </tr>
                <tr>
                    <th style="border-top: 1px solid #e3e3e3;">Total</th>
                    <td class="fw-bold" style="border-top: 1px solid #e3e3e3;">${{ number_format($order->total, 2) }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

        {{-- Back to Home --}}
        <div class="text-center mb-5">
            <a href="{{ route('home') }}" class="btn btn-dark btn-lg">Back to Home</a>
        </div>

    </section>
</main>

@endsection

