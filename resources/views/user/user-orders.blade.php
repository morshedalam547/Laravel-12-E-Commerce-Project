
@extends('layouts.app')

@section('content')
  <style>
    .table> :not(caption)>tr>th {
      padding: 0.625rem 1.5rem .625rem !important;
      background-color: #6a6e51 !important;
    }

    .table>tr>td {
      padding: 0.625rem 1.5rem .625rem !important;
    }

    .table-bordered> :not(caption)>tr>th,
    .table-bordered> :not(caption)>tr>td {
      border-width: 1px 1px;
      border-color: #6a6e51;
    }

    .table> :not(caption)>tr>td {
      padding: .8rem 1rem !important;
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
  </style>

<main class="pt-90" style="padding-top: 0px;">
    <div class="mb-4 pb-4"></div>

    <section class="my-account container">
        <h2 class="page-title">Orders</h2>

        <div class="row">

            {{-- Sidebar --}}
            <div class="col-lg-2">
                @include('user.account-nav')
            </div>

            {{-- Orders Table --}}
            <div class="col-lg-10">
                <div class="wg-table table-all-user">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered">
                            <thead >
                                <tr>
                                    <th style="width: 80px">OrderNo</th>
                                    <th>Name</th>
                                    <th class="text-center">Phone</th>
                                    <th class="text-center">Subtotal</th>
                                    <th class="text-center">Tax</th>
                                    <th class="text-center">Total</th>
                                    <th class="text-center">Status</th>
                                    <th class="text-center">Order Date</th>
                                    <th class="text-center">Items</th>
                                    <th class="text-center">Delivered On</th>
                                    <th class="text-center">View</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($orders as $order)
                                    <tr>
                                        <td class="text-center">{{ $order->order_id }}</td>
                                        <td class="text-center">{{ $order->name }}</td>
                                        <td class="text-center">{{ $order->phone }}</td>
                                        <td class="text-center">৳{{ number_format($order->subtotal, 2) }}</td>
                                        <td class="text-center">৳{{ number_format($order->vat, 2) }}</td>
                                        <td class="text-center">৳{{ number_format($order->total, 2) }}</td>

                                        <td class="text-center">
                                            @if($order->status == 'canceled')
                                                <span class="badge bg-danger">Canceled</span>
                                            @elseif($order->status == 'delivered')
                                                <span class="badge bg-success">Delivered</span>
                                            @else
                                                <span class="badge bg-warning text-dark">{{ ucfirst($order->status) }}</span>
                                            @endif
                                        </td>

                                        <td class="text-center">{{ $order->created_at->format('F j, Y h:i A') }}</td>
                                        <td class="text-center">{{ $order->items_count }}</td>
                                        <td class="text-center">
                                            {{ $order->delivered_date?->format('F j, Y h:i A') }}
                                        </td>
                                        <td class="text-center">
                                            <a href="{{ route('user.orders.show', $order->id) }}">
                                                <div class="list-icon-function view-icon">
                                                    <div class="item eye">
                                                        <i class="fa fa-eye"></i>
                                                    </div>
                                                </div>
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="11" class="text-center text-danger py-3">
                                            No Orders Found
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <div class="divider"></div>
                    <div class="flex items-center justify-between flex-wrap gap10 wgp-pagination">
                       {{ $orders->links('pagination::bootstrap-5') }}
                    </div>
                </div>
            </div>

        </div>
    </section>
</main>

@endsection
