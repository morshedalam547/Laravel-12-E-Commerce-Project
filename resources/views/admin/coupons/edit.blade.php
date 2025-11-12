@extends('layouts.admin')

@section('content')

       <div class="main-content-inner">
                            <div class="main-content-wrap">
                                <div class="flex items-center flex-wrap justify-between gap20 mb-27">
                                    <h3>Coupon infomation</h3>
                                    <ul class="breadcrumbs flex items-center flex-wrap justify-start gap10">
                                        <li>
                                            <a href="#">
                                                <div class="text-tiny">Dashboard</div>
                                            </a>
                                        </li>
                                        <li>
                                            <i class="icon-chevron-right"></i>
                                        </li>
                                        <li>
                                            <a href="{{ route('admin.coupons.index') }}">
                                                <div class="text-tiny">Coupons</div>
                                            </a>
                                        </li>
                                        <li>
                                            <i class="icon-chevron-right"></i>
                                        </li>
                                        <li>
                                            <div class="text-tiny">New Coupon</div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="wg-box">
                                    
                                    <form action="{{ route('admin.coupons.update', $coupon->id) }}" method="POST" class="form-new-product form-style-1">
                                        @csrf
                                        @method('PUT')
                                        <fieldset class="name">
                                            <div class="body-title">Coupon Code <span class="tf-color-1">*</span></div>
                                            <input class="flex-grow" type="text" placeholder="Coupon Code" name="code"
                                                tabindex="0" value="{{ $coupon->code }}" aria-required="true" required="">
                                        </fieldset>
                                        <fieldset class="category">
                                            <div class="body-title">Coupon Type</div>
                                            <div class="select flex-grow">
                                                <select class="" name="type">
                                                    <option value="">Select</option>
                                                    <option value="percent" {{ $coupon->type == 'percent' ? 'selected' : '' }}>Percent</option>
                                                    <option value="fixed" {{ $coupon->type == 'fixed' ? 'selected' : '' }}>Fixed</option>
                                                </select>
                                            </div>
                                        </fieldset>
                                        <fieldset class="name">
                                            <div class="body-title">Value <span class="tf-color-1">*</span></div>
                                            <input class="flex-grow" type="text" placeholder="Coupon Value" name="value"
                                                tabindex="0" value="{{ $coupon->value }}" aria-required="true" required="">
                                        </fieldset>
                                        <fieldset class="name">
                                            <div class="body-title">Cart Value <span class="tf-color-1">*</span></div>
                                            <input class="flex-grow" type="text" placeholder="Cart Value"
                                                name="cart_value" tabindex="0" value="{{ $coupon->cart_value }}"aria-required="true"
                                                required="">
                                        </fieldset>
                                        <fieldset class="name">
                                            <div class="body-title">Expiry Date <span class="tf-color-1">*</span></div>
                                            <input class="flex-grow" type="date" placeholder="Expiry Date"
                                                name="expires_at" tabindex="0" value="{{ optional($coupon->expires_at)->format('Y-m-d') }}"aria-required="true"
                                                required="">
                                        </fieldset>
                                        
        

                                         <fieldset class="category">
                                            <div class="body-title">Status</div>
                                            <div class="select flex-grow">
                                                <select name="status">
                                                    <option value="">Select</option>
                                                    <option value="1" {{ old('status', $coupon->status ?? '') == 1 ? 'selected' : '' }}>Active</option>
                                                    <option value="0" {{ old('status', $coupon->status ?? '') == 0 ? 'selected' : '' }}>Inactive</option>
                                                </select>
                                            </div>
                                        </fieldset>

             
                                        <div class="bot">
                                            <div></div>
                                            <button class="tf-button w208" type="submit">Save</button>
                                            <a href="{{ route('admin.coupons.index') }}" class="tf-button w208  ">Cancel</a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        @endsection






