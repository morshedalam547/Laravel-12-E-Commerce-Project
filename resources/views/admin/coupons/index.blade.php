@extends('layouts.admin')

@section('content')
   <div class="main-content-inner">
                            <div class="main-content-wrap">
                                <div class="flex items-center flex-wrap justify-between gap20 mb-27">
                                    <h3>Coupons</h3>
                                    <ul class="breadcrumbs flex items-center flex-wrap justify-start gap10">
                                        <li>
                                            <a href="index.html">
                                                <div class="text-tiny">Dashboard</div>
                                            </a>
                                        </li>
                                        <li>
                                            <i class="icon-chevron-right"></i>
                                        </li>
                                        <li>
                                            <div class="text-tiny">Coupons</div>
                                        </li>
                                    </ul>
                                </div>

                                <div class="wg-box">
                                    <div class="flex items-center justify-between gap10 flex-wrap">
                                        <div class="wg-filter flex-grow">
                                            <form class="form-search">
                                                <fieldset class="name">
                                                    <input type="text" placeholder="Search here..." class="" name="name"
                                                        tabindex="2" value="" aria-required="true" required="">
                                                </fieldset>
                                                <div class="button-submit">
                                                    <button class="" type="submit"><i class="icon-search"></i></button>
                                                </div>
                                            </form>
                                        </div>
                                        <a class="tf-button style-1 w208" href="{{ route('admin.coupons.create') }}"><i
                                                class="icon-plus"></i>Add new</a>
                                    </div>
                                    <div class="wg-table table-all-user">
                                        <div class="table-responsive">
                                            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Code</th>
                        <th>Type</th>
                        <th>Value</th>
                        <th>Cart Value</th>
                        <th>Expiry Date</th>
                        <th>Status</th>
                        <th width="150">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($coupons as $coupon)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td><strong>{{ $coupon->code }}</strong></td>
                            <td>{{ ucfirst($coupon->type) }}</td>
                            <td>{{ $coupon->value }}</td>
                            <td>{{ $coupon->cart_value }}</td>
                            <td>{{ $coupon->expires_at ? $coupon->expires_at->format('d/m/Y') : 'N/A' }}</td>
                            <td>
                                @if($coupon->status)
                                    <span class="badge bg-success">Active</span>
                                @else
                                    <span class="badge bg-secondary">Inactive</span>
                                @endif
                            </td>
                            <td>
                                  <div class="list-icon-function">
                                         
                                <a href="{{ route('admin.coupons.edit', $coupon->id) }}" class="item text-success edit"> <i class="icon-edit-3"></i></a>
                              
                                <form action="{{ route('admin.coupons.destroy', $coupon->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button class="item text-danger delete" onclick="return confirm('Are you sure?')"><i class="icon-trash-2"></i></button>
                                </form>
                                </div>

                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="8" class="text-center">No coupons found</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-3">
            {{ $coupons->links() }}
        </div>
    </div>
</div>
@endsection
