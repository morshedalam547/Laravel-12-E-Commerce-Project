@extends('layouts.app')

@section('content')
  <main class="pt-90">
    <section class="my-account container">
      <h2 class="page-title">Wishlist</h2>
      <div class="row">
        <div class="col-lg-3">
          {{-- Sidebar --}}
        </div>

        <div class="col-lg-9">
          <div class="page-content my-account__wishlist">
            <div class="products-grid row row-cols-2 row-cols-lg-3" id="products-grid">

              @forelse($wishlists as $item)
                @php
                  $product = $item->product;
                @endphp

                <div class="product-card-wrapper">
                  <div class="product-card mb-3 mb-md-4 mb-xxl-5">
                    <div class="pc__img-wrapper">
                      <img src="{{ asset('uploads/products/' . $product->image) }}" width="330" height="400"
                        alt="{{ $product->name }}" class="pc__img">
                     <form action="{{ route('wishlist.remove', $item->product_id) }}" method="POST">
                      @csrf
                      @method('DELETE')
                      <button class="btn-remove-from-wishlist">
                          <svg width="12" height="12" viewBox="0 0 12 12" fill="none">
                              <use href="#icon_close" />
                          </svg>
                      </button>
                  </form>

                             {{-- ✅ Add to Cart / Go to Cart button নিচে থাকবে --}}
                    <div class="mt-auto">
                      @if (Cart::instance('cart')->content()->where('id', $product->id)->count() > 0)
                        <a href="{{ route('cart.index') }}"
                          class="pc__atc btn anim_appear-bottom btn position-absolute border-0 text-uppercase fw-medium btn-warning mb-1">Go
                          to Cart</a>
                      @else
                        <form method="POST" action="{{ route('wishlist.moveToCart',$product->id) }}">
                          @csrf
                          <input type="hidden" name="id" value="{{ $product->id }}">
                          <input type="hidden" name="name" value="{{ $product->name }}">
                          <input type="hidden" name="price" value="{{ $product->sale_price ?: $product->regular_price }}">
                          <input type="hidden" name="quantity" value="1">

                          <button type="sumbit"
                            class="pc__atc btn anim_appear-bottom btn position-absolute border-0 text-uppercase fw-medium  "
                            title="Move To Cart" data-aside="cartDrawer"> Move To Cart </button>
                        </form>
                      @endif
                    </div>
                    </div>                    
                    <div class="mt-2">
                      <p class="pc__category">{{ $product->category->name ?? 'Category' }}</p>
                      <h6 class="pc__title ">{{ $product->name }}</h6>

                      <div class="product-card__price d-flex ">
                        @if($product->sale_price)
                          <span class="money price price-sale">${{ $product->sale_price }}</span>
                          <span class="money price price-old ms-2">${{ $product->regular_price }}</span>
                        @else
                          <span class="money price">${{ $product->regular_price }}</span>
                        @endif
                      </div>
                    </div>


                  </div>
           
                </div>
              @empty
                <h3>No items in your wishlist.</h3>
              @endforelse

            </div>
          </div>
        </div>
      </div>
    </section>
  </main>
@endsection