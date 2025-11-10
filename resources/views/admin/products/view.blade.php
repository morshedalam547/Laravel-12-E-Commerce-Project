@extends('layouts.admin')



@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="fw-bold text-primary">Product Details</h3>
        <a href="{{ route('admin.products') }}" class="btn btn-outline-primary btn-lg">
            <i class="bi bi-arrow-left-circle"></i> Back
        </a>
    </div>

    <div class="card shadow-lg border-0 rounded-4 p-4">
        <div class="row">
            <div class="col-md-4 text-center">
                <img src="{{ asset('uploads/products/thumbnails/' . $product->image) }}" 
                     alt="{{ $product->name }}" 
                     class="img-fluid rounded-3 shadow-sm mb-3">

                <!-- Edit & Delete Buttons -->
                <div class="d-flex justify-content-center gap-2 mt-3">
                    <a href="{{ route('admin.products.edit', $product->id) }}" class="btn btn-primary btn-lg">
                        <i class="bi bi-pencil-square"></i> Edit
                    </a>
                    <form action="{{ route('admin.products.delete', $product->id) }}" method="POST" 
                          onsubmit="return confirm('Are you sure you want to delete this product?')" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-lg">
                            <i class="bi bi-trash3"></i> Delete
                        </button>
                    </form>
                </div>
            </div>

            <div class="col-md-8">
                <h4 class="fw-semibold mb-2">{{ $product->name }}</h4>
                <p class="text-muted">{{ $product->short_description }}</p>

                <table class="table table-bordered mt-3">
                    <tbody>
                        <tr>
                            <th width="30%">Category</th>
                            <td>{{ $product->category->name ?? 'N/A' }}</td>
                        </tr>
                        <tr>
                            <th>Brand</th>
                            <td>{{ $product->brand->name ?? 'N/A' }}</td>
                        </tr>
                        <tr>
                            <th>Regular Price</th>
                            <td>${{ $product->regular_price }}</td>
                        </tr>
                        @if ($product->sale_price)
                        <tr>
                            <th>Sale Price</th>
                            <td><span class="text-success fw-bold">${{ $product->sale_price }}</span></td>
                        </tr>
                        @endif
                        <tr>
                            <th>Stock</th>
                            <td>
                                @if ($product->stock_status == 'instock')
                                    <span class="badge bg-success">In Stock</span>
                                @else
                                    <span class="badge bg-danger">Out of Stock</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>Quantity</th>
                            <td>{{ $product->quantity }}</td>
                        </tr>
                        <tr>
                            <th>Featured</th>
                            <td>{{ $product->featured ? 'Yes' : 'No' }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        @if ($product->images)
        <div class="mt-5">
            <h5 class="fw-semibold mb-3">Gallery Images</h5>
            <div class="row">
                @foreach (json_decode($product->images) as $img)
                    <div class="col-md-3 mb-3">
                        <img src="{{ asset('uploads/products/gallery/' . $img) }}" 
                             alt="Gallery Image" 
                             class="img-fluid rounded-3 shadow-sm">
                    </div>
                @endforeach
            </div>
        </div>
        @endif


    </div>
</div>
@endsection