@extends('layouts.admin');
@section('content');

       <div class="main-content-inner">

                            <div class="main-content-wrap">
                                <div class="tf-section-2 mb-30">
                                    <div class="flex gap20 flex-wrap-mobile">
                                        <div class="w-half">

                                            <div class="wg-chart-default mb-20">
                                                <div class="flex items-center justify-between">
                                                    <div class="flex items-center gap14">
                                                        <div class="image ic-bg">
                                                            <i class="icon-shopping-bag"></i>
                                                        </div>
                                                        <div>
                                                            <div class="body-text mb-2">Total Orders</div>
                                                            <h4>{{ $totalOrders }}</h4>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="wg-chart-default mb-20">
                                                <div class="flex items-center justify-between">
                                                    <div class="flex items-center gap14">
                                                        <div class="image ic-bg">
                                                            <i class="icon-dollar-sign"></i>
                                                        </div>
                                                        <div>
                                                            <div class="body-text mb-2">Total Amount</div>
                                                            <h4>{{ $total }}</h4>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="wg-chart-default mb-20">
                                                <div class="flex items-center justify-between">
                                                    <div class="flex items-center gap14">
                                                        <div class="image ic-bg">
                                                            <i class="icon-shopping-bag"></i>
                                                        </div>
                                                        <div>
                                                            <div class="body-text mb-2">pending Orders</div>
                                                            <h4>{{  $processingOrders }}</h4>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="wg-chart-default">
                                                <div class="flex items-center justify-between">
                                                    <div class="flex items-center gap14">
                                                        <div class="image ic-bg">
                                                            <i class="icon-dollar-sign"></i>
                                                        </div>
                                                        <div>
                                                            <div class="body-text mb-2">processing Orders Amount</div>
                                                            <h4>{{ $processingAmount }}</h4>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="w-half">

                                            <div class="wg-chart-default mb-20">
                                                <div class="flex items-center justify-between">
                                                    <div class="flex items-center gap14">
                                                        <div class="image ic-bg">
                                                            <i class="icon-shopping-bag"></i>
                                                        </div>
                                                        <div>
                                                            <div class="body-text mb-2">Delivered Orders</div>
                                                            <h4>{{ $deliveredOrder }}</h4>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="wg-chart-default mb-20">
                                                <div class="flex items-center justify-between">
                                                    <div class="flex items-center gap14">
                                                        <div class="image ic-bg">
                                                            <i class="icon-dollar-sign"></i>
                                                        </div>
                                                        <div>
                                                            <div class="body-text mb-2">Delivered Orders Amount</div>
                                                            <h4>{{ $deliveredAmount }}</h4>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="wg-chart-default mb-20">
                                                <div class="flex items-center justify-between">
                                                    <div class="flex items-center gap14">
                                                        <div class="image ic-bg">
                                                            <i class="icon-shopping-bag"></i>
                                                        </div>
                                                        <div>
                                                            <div class="body-text mb-2">Canceled Orders</div>
                                                            <h4>{{ $canceledOrder }}</h4>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="wg-chart-default">
                                                <div class="flex items-center justify-between">
                                                    <div class="flex items-center gap14">
                                                        <div class="image ic-bg">
                                                            <i class="icon-dollar-sign"></i>
                                                        </div>
                                                        <div>
                                                            <div class="body-text mb-2">Canceled Orders Amount</div>
                                                            <h4>{{ $canceledAmount }}</h4>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                    </div>

                                   <div class="wg-box">
    <div class="flex items-center justify-between">
        <h5>Monthely revenue</h5>
        <div class="dropdown default">
            <button class="btn btn-secondary dropdown-toggle" type="button"
                data-bs-toggle="dropdown" aria-haspopup="true"
                aria-expanded="false">
                <span class="icon-more"><i class="icon-more-horizontal"></i></span>
            </button>
            <ul class="dropdown-menu dropdown-menu-end">
                <li><a href="javascript:void(0);">This Week</a></li>
                <li><a href="javascript:void(0);">Last Week</a></li>
            </ul>
        </div>
    </div>

    <div class="flex flex-wrap gap40">

        {{-- Revenue --}}
        <div>
            <div class="mb-2">
                <div class="block-legend">
                    <div class="dot t1"></div>
                    <div class="text-tiny">Total</div>
                </div>
            </div>
            <div class="flex items-center gap10">
                <h4>${{ number_format($totalRevenue, 2) }}</h4>

                
            </div>
        </div>

        {{-- Order Amount --}}
        <div>
            <div class="mb-2">
                <div class="block-legend">
                    <div class="dot t2"></div>
                    <div class="text-tiny">pending</div>
                </div>
            </div>
            <div class="flex items-center gap10">
                 <h4>${{  $processingOrders }}</h4>

               
            </div>
        </div>
        <div>
            <div class="mb-2">
                <div class="block-legend">
                    <div class="dot t2"></div>
                    <div class="text-tiny">Delivered</div>
                </div>
            </div>
            <div class="flex items-center gap10">
                <h4>${{ number_format($deliveredAmount, 2) }}</h4>

            
            </div>
        </div>
        <div>
            <div class="mb-2">
                <div class="block-legend">
                    <div class="dot t2"></div>
                    <div class="text-tiny">Canceled</div>
                </div>
            </div>
            <div class="flex items-center gap10">
                <h4>${{ number_format( $canceledAmount) }}</h4>

            
            </div>
        </div>

    </div>

    <div id="line-chart-8"></div>
                                </div>

                                </div>
                                <div class="tf-section mb-30">
<div class="wg-box">
    <div class="flex items-center justify-between">
        <h5>Recent orders</h5>
        <div class="dropdown default">
            <a href="{{ route('admin.orders.index') }}" class="btn btn-secondary dropdown-toggle">
                <span class="view-all">View all</span>
            </a>
        </div>
    </div>

    <div class="wg-table table-all-user">
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th style="width: 80px">OrderNo</th>
                        <th>Name</th>
                        <th class="text-center">Phone</th>
                        <th class="text-center">Subtotal</th>
                        <th class="text-center">Tax</th>
                        <th class="text-center">Total</th>
                        <th class="text-center">Status</th>
                        <th class="text-center">Order Date</th>
                        <th class="text-center">Total Items</th>
                        <th class="text-center">Delivered On</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($recentOrders as $order)
                        <tr>
                            <td class="text-center">{{ $order->id }}</td>

                            <td class="text-center">{{ $order->name }}</td>

                            <td class="text-center">{{ $order->phone }}</td>

                            <td class="text-center">${{ number_format($order->subtotal, 2) }}</td>

                            <td class="text-center">${{ number_format($order->vat, 2) }}</td>

                            <td class="text-center">${{ number_format($order->total, 2) }}</td>

                            <td class="text-center">
                                <span class="badge 
                                    @if($order->status == 'delivered') bg-success 
                                    @elseif($order->status == 'canceled') bg-danger 
                                    @else bg-warning @endif">
                                    {{ ucfirst($order->status) }}
                                </span>
                            </td>

                            <td class="text-center">{{ $order->created_at->format('Y-m-d h:i A') }}</td>
{{-- 
                            <td class="text-center">{{ $order->quantity ?? $orderitems->quantity }}</td> --}}
                            <td class="text-center">{{ $order->items->sum('quantity') }}</td>


                            <td class="text-center">
                                {{ $order->delivered_date ? \Carbon\Carbon::parse($order->delivered_date)->format('Y-m-d h:i A') : '--' }}
                            </td>

                            <td class="text-center">
                            <a href="{{ route('admin.orders.details', $order->id) }}">
                                        <div class="list-icon-function view-icon">
                                        <div class="item eye">
                                            <i class="icon-eye"></i>
                                        </div>
                                    </div>
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="11" class="text-center">No recent orders found</td>
                        </tr>
                    @endforelse
                </tbody>

            </table>
        </div>
    </div>
</div>

                                </div>
                            </div>

                        </div>

@endsection


@push('scripts')
  <script>
(function ($) {

    var tfLineChart = (function () {

        var chartBar = function () {

            var options = {
                series: [{
                    name: 'Total',
                    data: @json($monthlyTotalArray)
                }, {
                    name: 'pending',
                    data: @json($monthlyProcessingArray)
                }, {
                    name: 'Delivered',
                    data: @json($monthlyDeliveredArray)
                }, {
                    name: 'Canceled',
                    data: @json($monthlyCanceledArray)
                }],
                chart: {
                    type: 'bar',
                    height: 325,
                    toolbar: { show: false },
                },
                plotOptions: {
                    bar: {
                        horizontal: false,
                        columnWidth: '10px',
                        endingShape: 'rounded'
                    },
                },
                dataLabels: { enabled: false },
                legend: { show: true },
                colors: ['#2377FC', '#FFA500', '#078407', '#FF0000'],
                xaxis: {
                    categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 
                                 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                },
                tooltip: {
                    y: {
                        formatter: function (val) {
                            return "$ " + val;
                        }
                    }
                }
            };

            var chart = new ApexCharts(
                document.querySelector("#line-chart-8"),
                options
            );

            if ($("#line-chart-8").length > 0) {
                chart.render();
            }
        };

        return {
            load: function () { chartBar(); }
        };

    })();

    jQuery(window).on("load", function () {
        tfLineChart.load();
    });

})(jQuery);
</script>

    
@endpush