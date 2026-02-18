@extends('layouts.app')

@section('content')

@php
    // Safe gallery images (NO json_decode)
    $galleryImages = is_array($product->images) ? $product->images : [];
@endphp

<main class="pt-90">
<section class="product-single container">
<div class="row">

{{-- ================= LEFT : IMAGE GALLERY ================= --}}
<div class="col-lg-7">
<div class="product-single__media" data-media-type="vertical-thumbnail">

{{-- Main Slider --}}
<div class="product-single__image">
<div class="swiper-container">
<div class="swiper-wrapper">

{{-- Main Image --}}
<div class="swiper-slide product-single__image-item">
    <img src="{{ asset('uploads/products/' . $product->image) }}" width="674" height="674">
    <a data-fancybox="gallery" href="{{ asset('uploads/products/' . $product->image) }}">
        <svg width="16" height="16"><use href="#icon_zoom"/></svg>
    </a>
</div>

{{-- Gallery Images --}}
@foreach($galleryImages as $img)
<div class="swiper-slide product-single__image-item">
    <img src="{{ asset('uploads/products/gallery/' . $img) }}" width="674" height="674">
    <a data-fancybox="gallery" href="{{ asset('uploads/products/gallery/' . $img) }}">
        <svg width="16" height="16"><use href="#icon_zoom"/></svg>
    </a>
</div>
@endforeach

</div>

<div class="swiper-button-prev"><svg><use href="#icon_prev_sm"/></svg></div>
<div class="swiper-button-next"><svg><use href="#icon_next_sm"/></svg></div>

</div>
</div>

{{-- Thumbnails --}}
<div class="product-single__thumbnail">
<div class="swiper-container">
<div class="swiper-wrapper">

<div class="swiper-slide">
    <img src="{{ asset('uploads/products/thumbnails/' . $product->image) }}" width="104">
</div>

@foreach($galleryImages as $img)
<div class="swiper-slide">
    <img src="{{ asset('uploads/products/gallery/' . $img) }}" width="104">
</div>
@endforeach

</div>
</div>
</div>

</div>
</div>

{{-- ================= RIGHT : PRODUCT INFO ================= --}}
<div class="col-lg-5">

<h1 class="product-single__name">{{ $product->name }}</h1>

<div class="product-single__price mb-3">
@if($product->sale_price)
<s>${{ $product->regular_price }}</s> ${{ $product->sale_price }}
@else
${{ $product->regular_price }}
@endif
</div>

<p>{{ $product->short_description }}</p>

{{-- Add to Cart --}}
@if (Cart::instance('cart')->content()->where('id', $product->id)->count() > 0)
<a href="{{ route('cart.index') }}" class="btn btn-warning mb-3">Go to Cart</a>
@else
<form method="POST" action="{{ route('cart.add') }}">
@csrf
<input type="hidden" name="id" value="{{ $product->id }}">
<input type="hidden" name="name" value="{{ $product->name }}">
<input type="hidden" name="price" value="{{ $product->sale_price ?? $product->regular_price }}">
<input type="number" name="quantity" value="1" min="1">
<button class="btn btn-primary">Add to Cart</button>
</form>
@endif

<div class="product-single__meta-info mt-4">
<p><strong>SKU:</strong> {{ $product->SKU }}</p>
<p><strong>Category:</strong> {{ $product->category->name ?? 'N/A' }}</p>
</div>

</div>
</div>
</section>

{{-- ================= RELATED PRODUCTS ================= --}}
<section class="products-carousel container mt-5">
<h2 class="h3 mb-4">Related Products</h2>

<div class="swiper-container">
<div class="swiper-wrapper">

@foreach($rProducts as $rproduct)
<div class="swiper-slide product-card">
<div class="pc__img-wrapper">
<a href="{{ route('product.details', $rproduct->slug) }}">
<img src="{{ asset('uploads/products/' . $rproduct->image) }}" width="330">
</a>
</div>

<div class="pc__info">
<h6>{{ $rproduct->name }}</h6>
@if($rproduct->sale_price)
<span>${{ $rproduct->sale_price }}</span>
@else
<span>${{ $rproduct->regular_price }}</span>
@endif
</div>
</div>
@endforeach

</div>
</div>
</section>

</main>
@endsection
