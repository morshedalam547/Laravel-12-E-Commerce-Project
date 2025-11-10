@extends('layouts.admin')

@section('content')
    <div class="main-content-inner">
        <div class="main-content-wrap">
            <div class="flex items-center flex-wrap justify-between gap-5 mb-6">
                <h3>All Products</h3>
                <ul class="breadcrumbs flex items-center flex-wrap gap-2">
                    <li><a href="{{ route('admin.dashboard') }}">
                            <div class="text-tiny">Dashboard</div>
                        </a></li>
                    <li><i class="icon-chevron-right"></i></li>
                    <li>
                        <div class="text-tiny">All Products</div>
                    </li>
                </ul>
            </div>

<div class="wg-box">
               <div class="flex items-center justify-between gap10 flex-wrap">
                    <div class="wg-filter flex-grow">
                        <form class="form-search">
                            <fieldset class="name">
                                <input type="text" placeholder="Search here..." class="" name="name" tabindex="2" value=""
                                    aria-required="true" required="">
                            </fieldset>
                            <div class="button-submit">
                                <button class="" type="submit"><i class="icon-search"></i></button>
                            </div>
                        </form>
                    </div>
                    <a class="tf-button style-1 w208" href="{{ route('admin.products.add') }}"><i class="icon-plus"></i>Add
                        new</a>
                </div>

            <!-- Products Table -->
            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Product</th>
                            <th>Price</th>
                            <th>Sale Price</th>
                            <th>SKU</th>
                            <th>Category</th>
                            <th>Brand</th>
                            <th>Featured</th>
                            <th>Stock</th>
                            <th>Quantity</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($products as $product)
                            <tr>
                                <td>{{ $loop->iteration + ($products->currentPage() - 1) * $products->perPage() }}</td>
                                <td class="d-flex gap-2 align-items-center">
                                    <!-- Main Image -->
                                    <div class="image">
                                        <img src="{{ asset('uploads/products/thumbnails/' . $product->image) }}"
                                            alt="{{ $product->name }}" class="image">

                                    </div>

                                    <!-- Product Name + Slug -->
                                    <div class="name">
                                        <a href="#" class="body-title-2">{{ $product->name }}</a>
                                        <div class="text-tiny mt-1 text-muted">{{ $product->slug }}</div>
                                    </div>
                                </td>
                                <td>${{ $product->regular_price }}</td>
                                <td>${{ $product->sale_price ?? '-' }}</td>
                                <td>{{ $product->SKU }}</td>
                                <td>{{ $product->category?->name ?? '-' }}</td>
                                <td>{{ $product->brand?->name ?? '-' }}</td>
                                <td>{{ $product->featured ? 'Yes' : 'No' }}</td>
                                <td>{{ $product->stock_status }}</td>
                                <td>{{ $product->quantity }}</td>
                                <td>
                                    <div class="list-icon-function" style="display: flex; align-items: center; gap: 15px;">
                                        <a href="{{ route('admin.products.view', $product->id) }}" class="item eye">
                                            <i class="icon-eye"></i>
                                        </a>

                                        <a href="{{ route('admin.products.edit', $product->id) }}" class="item edit">
                                            <i class="icon-edit-3"></i>
                                        </a>

                                        <form action="{{ route('admin.products.delete', $product->id) }}" method="POST"
                                            style="margin: 0; padding: 0; display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="item text-danger delete"
                                                style="border: none; background: none; padding: 0; margin: 0; cursor: pointer;">
                                                <i class="icon-trash-2"></i>
                                            </button>
                                        </form>
                                    </div>

                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="11" class="text-center">No products found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            </div>

            <!-- Pagination -->
            <div class="mt-3">
                {{ $products->links('pagination::bootstrap-5') }}
            </div>
        </div>
    </div>
@endsection