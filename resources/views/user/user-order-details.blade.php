
@extends('layouts.app')

@section('content')
  <style>
    .pt-90 {
      padding-top: 90px !important;
    }

    .pr-6px {
      padding-right: 6px;
      text-transform: uppercase;
    }

    .my-account .page-title {
      font-size: 1.5rem;
      font-weight: 700;
      text-transform: uppercase;
      margin-bottom: 40px;
      border-bottom: 1px solid;
      padding-bottom: 13px;
    }

    .my-account .wg-box {
      display: -webkit-box;
      display: -moz-box;
      display: -ms-flexbox;
      display: -webkit-flex;
      display: flex;
      padding: 24px;
      flex-direction: column;
      gap: 24px;
      border-radius: 12px;
      background: var(--White);
      box-shadow: 0px 4px 24px 2px rgba(20, 25, 38, 0.05);
    }

    .bg-success {
      background-color: #40c710 !important;
    }

    .bg-danger {
      background-color: #f44032 !important;
    }

    .bg-warning {
      background-color: #f5d700 !important;
      color: #000;
    }

    .table-transaction>tbody>tr:nth-of-type(odd) {
      --bs-table-accent-bg: #fff !important;

    }

     .table-transaction th,
    .table-transaction td,
    .table-bordered> :not(caption)>tr>th,
    .table-bordered> :not(caption)>tr>td {
        padding: 8px 12px !important;
        color: #000 !important;
        vertical-align: middle;
        font-size: 14px;
        line-height: 1.5;
    }
    .table> :not(caption)>tr>th {
       padding: 8px 10px !important; /* Header padding reduce */
      background-color: #7a7a66ff !important;
    }

    .table-bordered>:not(caption)>*>* {
      border-width: inherit;
      line-height: 24px;
      font-size: 14px;
      border: 1px solid #e1e1e1;
      vertical-align: middle;
    }

    .table-striped .image {
      display: flex;
      align-items: center;
      justify-content: center;
      width: 50px;
      height: 50px;
      flex-shrink: 0;
      border-radius: 10px;
      overflow: hidden;
    }

    .table-striped td:nth-child(1) {
      min-width: 200px;
      padding-bottom: 4px;
    }

    .pname {
      display: flex;
      gap: 13px;
    }

    .table-bordered> :not(caption)>tr>th,
    .table-bordered> :not(caption)>tr>td {
      border-width: 1px 1px;
    border-color: #6a6e51;
    }
    
  </style>

<main class="pt-90" style="padding-top: 0px;">
    <div class="mb-4 pb-4"></div>

    <section class="my-account container">
        <h2 class="page-title mb-4">Order Details</h2>

        <div class="row">

            {{-- Sidebar --}}
            <div class="col-lg-3 mb-4">
                @include('user.account-nav')
            </div>

            {{-- Order Details Content --}}
            <div class="col-lg-9">

                {{-- Ordered Details --}}
                <div class="card mb-4 shadow-sm border-0 rounded-3">
                    <div class="card-header bg-light py-2 d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Order Info</h5>
                        <a href="{{ route('user.orders') }}" class="btn btn-sm btn-danger">Back</a>
                    </div>
                    <div class="card-body p-3">
                        <div class="table-responsive">
                            <table class="table table-bordered ">
                                <tbody>
                                    <tr>
                                        <th>Order No</th>
                                        <td>{{ $order->order_id }}</td>
                                        <th>Mobile</th>
                                        <td>{{ $order->phone }}</td>
                                        <th>Pin/Zip</th>
                                        <td>{{ $order->zip }}</td>
                                    </tr>
                                    <tr>
                                        <th>Order Date</th>
                                        <td>{{ $order->created_at->format('F j, Y h:i A') }}</td>
                                        <th>Delivered Date</th>
                                        <td>{{ $order->delivered_date?->format('F j, Y h:i A') }}</td>
                                        <th>Canceled Date</th>
                                        <td>{{ $order->canceled_date ?? '—' }}</td>
                                    </tr>
                                    <tr>
                                        <th>Order Status</th>
                                        <td colspan="5">
                                            @if($order->status == 'canceled')
                                                <span class="badge bg-danger">Canceled</span>
                                            @elseif($order->status == 'delivered')
                                                <span class="badge bg-success">Delivered</span>
                                            @else
                                                <span class="badge bg-warning text-dark">{{ ucfirst($order->status) }}</span>
                                            @endif
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                {{-- Ordered Items --}}
                <div class="card mb-4 shadow-sm border-0 rounded-3">
                    <div class="card-header bg-light py-2">
                        <h5 class="mb-0">Ordered Items</h5>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-bordered mb-0 ">
                                <thead class="table-light">
                                    <tr>
                                        <th>Name</th>
                                        <th class="text-center">Price</th>
                                        <th class="text-center">Quantity</th>
                                        <th class="text-center">SKU</th>
                                        <th class="text-center">Category</th>
                                        <th class="text-center">Brand</th>
                                        <th class="text-center">Options</th>
                                        <th class="text-center">Return Status</th>
                                        <th class="text-center">View</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($order->items as $item)
                                        <tr>
                                            <td class="d-flex align-items-center">
                                                <div class="me-2">
                                                    <img src="{{ asset('uploads/products/thumbnails/' . $item->product->image) }}" 
                                                         alt="{{ $item->product_name }}" width="50" class="rounded">
                                                </div>
                                                <div>
                                                    <a href="{{ route('user.orders.show', $item->product_id) }}" target="_blank">
                                                        {{ $item->product_name }}
                                                    </a>
                                                </div>
                                            </td>
                                            <td class="text-center">${{ number_format($item->price,2) }}</td>
                                            <td class="text-center">{{ $item->quantity }}</td>
                                            <td class="text-center">{{ $item->product->SKU ?? '—' }}</td>
                                            <td class="text-center">{{ $item->product->category->name ?? '—' }}</td>
                                            <td class="text-center">{{ $item->product->brand->name ?? '—' }}</td>
                                            <td class="text-center">{{ $item->options ?? '—' }}</td>
                                            <td class="text-center">{{ $item->return_status ?? 'No' }}</td>
                                            <td class="text-center">
                                                <a href="{{ route('user.orders.show', $item->product_id) }}" target="_blank" class="btn btn-sm btn-primary">
                                                    <i class="fa fa-eye"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="9" class="text-center py-3 text-muted">
                                                No Items Found
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                {{-- Shipping Address --}}
                <div class="card mb-4 shadow-sm border-0 rounded-3">
                    <div class="card-header bg-light py-2">
                        <h5 class="mb-0">Shipping Address</h5>
                    </div>
                    <div class="card-body">
                        <p>{{ $order->name }}</p>
                        <p>{{ $order->address }}</p>
                        <p>{{ $order->locality }}, {{ $order->city }}</p>
                        <p>{{ $order->state }}, {{ $order->country ?? '—' }}</p>
                        <p>Pin/Zip: {{ $order->zip }}</p>
                        <p>Mobile: {{ $order->phone }}</p>
                    </div>
                </div>

                {{-- Transactions --}}
                <div class="card mb-4 shadow-sm border-0 rounded-3">
                    <div class="card-header bg-light py-2">
                        <h5 class="mb-0">Transactions</h5>
                    </div>
                    <div class="card-body p-0">
                        <table class="table table-bordered ">
                            <tbody>
                                <tr>
                                    <th>Subtotal</th>
                                    <td>${{ number_format($order->subtotal,2) }}</td>
                                    <th>Tax</th>
                                    <td>${{ number_format($order->vat,2) }}</td>
                                    <th>Discountss</th>
                                    <td>${{ number_format($order->discount,2) }}</td>
                                </tr>
                                <tr>
                                    <th>Total</th>
                                    <td>${{ number_format($order->total,2) }}</td>
                                    <th>Payment Mode</th>
                                    <td>{{ strtoupper($order->payment_method) }}</td>
                                    <th >Status</th>
                                    <td>
                                        <span class="badge bg-{{ $order->status=='canceled' ? 'danger' : ($order->status=='delivered' ? 'success' : 'warning') }}">
                                            {{ ucfirst($order->status) }}
                                        </span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>                </div>

                {{-- Cancel Order Button --}}
                @if($order->status == 'ordered')
                <div class="text-end mb-5">
                    <form action="{{ route('user.orders.cancel', $order->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <button type="submit" class="text-dark btn btn-danger">Cancel Order</button>
                    </form>
                </div>
                @endif

            </div>
        </div>
    </section>
</main>

@endsection

