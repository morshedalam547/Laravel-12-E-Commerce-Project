@extends('layouts.admin')

@section('content')


    <div class="main-content-inner">
        <div class="main-content-wrap">

            <div class="flex items-center flex-wrap justify-between gap20 mb-27">
                <h3>Order Details</h3>
                <ul class="breadcrumbs flex items-center flex-wrap gap10">
                    <li>
                        <a href="#">
                            <div class="text-tiny">Dashboard</div>
                        </a>
                    </li>
                    <li><i class="icon-chevron-right"></i></li>
                    <li>
                        <div class="text-tiny">Order Items</div>
                    </li>
                </ul>
            </div>

            <div class="wg-box">
                @if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif


                <div class="flex items-center justify-between gap10 flex-wrap">
                    <div class="wg-filter flex-grow">
                        <h5>Ordered Details</h5>
                    </div>
                    <a class="tf-button style-1 w208" href="{{ route('admin.orders.index') }}">Back</a>
                </div>

                <!-- ITEMS TABLE -->
            <div class="table-responsive">
    <table class="table table-bordered">

        <tbody>
            <tr>
                <th>Order No</th>
                <td>{{ $order->order_id }}</td>
                <th>Mobile</th>
                <td>{{ $order->phone }}</td>
                <th>Zip Code</th>
                <td>{{ $order->zip }}</td>
            </tr>
            <tr>
                <th>Order Date</th>
                <td>{{ $order->created_at->format('F j, Y h:i A') }}</td>
                <th>Delivered Date</th>
                <td>{{ $order->delivered_date?->format('F j, Y h:i A') }}
</td>
                <th>Canceled Date</th>
                <td>{{ $order->canceled_date ?->format('F j, Y h:i A') }}</td>
            </tr>
            <tr>
                <th>Status</th>
                <td colspan="5">
                    @if($order->status == 'ordered')
                        <span class="badge bg-warning text-dark px-3 py-2">Ordered</span>
                    @elseif($order->status == 'processing')
                        <span class="badge bg-info text-white px-3 py-2">Processing</span>
                    @elseif($order->status == 'delivered')
                        <span class="badge bg-success text-white px-3 py-2">Delivered</span>
                    @elseif($order->status == 'canceled')
                        <span class="badge bg-danger text-white px-3 py-2">Canceled</span>
                    @else
                        <span class="badge bg-secondary text-white px-3 py-2">{{ $order->status }}</span>
                    @endif
                </td>
            </tr>
        </tbody>
    </table>
</div>


                <div class="divider"></div>
            </div>





            <div class="wg-box">

                <div class="flex items-center justify-between gap10 flex-wrap">
                    <div class="wg-filter flex-grow">
                        <h5>Ordered Items</h5>
                    </div>

                </div>

                <!-- ITEMS TABLE -->
                <div class="table-responsive">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th class="text-center">Price</th>
                                <th class="text-center">Quantity</th>
                                <th class="text-center">SKU</th>
                                <th class="text-center">Category</th>
                                <th class="text-center">Brand</th>
                                <th class="text-center">Options</th>
                                <th class="text-center">Return Status</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach($order->items as $item)
                                <tr>

                                    <td>
                                        <div class="d-flex align-items-center gap-2">
                                            <img src="{{ $item->product ? asset('uploads/products/' . $item->product->image) : '' }}"
                                                width="50" alt="">
                                            <span>{{ $item->product_name ?? $item->product->name ?? 'Product' }}</span>
                                        </div>
                                    </td>

                                    <td class="text-center">${{ number_format($item->price, 2) }}</td>

                                    <td class="text-center">{{ $item->quantity }}</td>
                                    <td class="text-center">{{ $item->product->SKU ?? '-' }}</td>

                                    <td class="text-center">{{ $item->product->category->name ?? '-' }}</td>

                                    <td class="text-center">{{ $item->product->brand->name ?? '-' }}</td>

                                    <td class="text-center"></td>

                                    <td class="text-center">No</td>

                                    <td class="text-center">
                                        <div class="list-icon-function view-icon">
                                            <div class="item eye"><i class="icon-eye"></i></div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>

                <div class="divider"></div>
            </div>



            <!-- SHIPPING ADDRESS -->
            <div class="wg-box mt-5">
                <h5>Shipping Address</h5>
                <div class="my-account__address-item col-md-6">
                    <div class="my-account__address-item__detail">
                        <p>{{ $order->name }}</p>
                        <p>{{ $order->address }}</p>
                        <p>{{ $order->city }}</p>
                        <p>{{ $order->state }}</p>
                        <p>{{ $order->country }}</p>
                        <p>{{ $order->zip }}</p>
                        <br>
                        <p>Mobile : {{ $order->phone }}</p>
                    </div>
                </div>
            </div>


            <!-- TRANSACTIONS -->

            <div class="wg-box mt-5">
                <h5>Transactions</h5>
                <table class="table table-striped table-bordered">
                    <tbody>
                        <tr>
                            <th>Subtotal</th>
                            <td>${{ number_format($order->subtotal, 2) }}</td>
                            <th>Tax</th>
                            <td>${{ number_format($order->vat, 2) }}</td>
                            <th>Discount</th>
                            <td>${{ number_format($order->discount ?? 0, 2) }}</td>

                        </tr>
                        <tr>
                            <th>Total</th>
                            <td>${{ number_format($order->total, 2) }}</td>
                            <th>Payment Method</th>
                            <td>{{ $order->payment_method }}</td>
                            <th>Order Status</th>
                            <td>
                                @if($order->status == 'ordered')
                                    <span class="badge bg-warning text-dark px-3 py-2">pending</span>
                                @elseif($order->status == 'processing')
                                    <span class="badge bg-info text-white px-3 py-2">Processing</span>
                                @elseif($order->status == 'delivered')
                                    <span class="badge bg-success text-white px-3 py-2">Approved</span>
                                @elseif($order->status == 'canceled')
                                    <span class="badge bg-danger text-white px-3 py-2">Canceled</span>
                                @else
                                    <span class="badge bg-secondary text-white px-3 py-2">{{ $order->status }}</span>
                                @endif
                            </td>
                        </tr>

                    </tbody>

                </table>
                <div class="card mb-4 shadow-sm border-0 rounded-3 p-4">
                    <h4 class="mb-3">Update Order Status</h4>

                    <form action="{{ route('admin.orders.updateStatus', $order->id) }}" method="POST"
                        class="d-flex flex-wrap gap-3 align-items-center">
                        @csrf

                        <select name="status" class="form-select form-select-lg w-50">
                            <option value="ordered" {{ $order->status == 'ordered' ? 'selected' : '' }}>Ordered</option>
                            <option value="processing" {{ $order->status == 'processing' ? 'selected' : '' }}>Processing
                            </option>
                            <option value="delivered" {{ $order->status == 'delivered' ? 'selected' : '' }}>Delivered</option>
                            <option value="canceled" {{ $order->status == 'canceled' ? 'selected' : '' }}>Canceled</option>
                        </select>

                        <button type="submit" class="tf-button style-1 w208">Update</button>
                    </form>
                </div>


            </div>


        </div>
    </div>

@endsection