@extends('layouts.app')

@section('content')


    <section class="shop-main container d-flex pt-4 pt-xl-3">
        <div class="shop-sidebar side-sticky bg-body" id="shopFilter">
            <div class="aside-header d-flex d-lg-none align-items-center">
                <h3 class="text-uppercase fs-6 mb-0">Filter By</h3>
                <button class="btn-close-lg js-close-aside btn-close-aside ms-auto"></button>
            </div>

            <div class="pt-4 pt-lg-0"></div>

            {{-- Product Categories --}}
            <div class="accordion" id="categories-list">
                <div class="accordion-item mb-4 pb-3">
                    <h5 class="accordion-header" id="accordion-heading-1">
                        <button class="accordion-button p-0 border-0 fs-5 text-uppercase" type="button"
                            data-bs-toggle="collapse" data-bs-target="#accordion-filter-1" aria-expanded="true"
                            aria-controls="accordion-filter-1">
                            Product Categories
                            <svg class="accordion-button__icon type2" viewBox="0 0 10 6" xmlns="http://www.w3.org/2000/svg">
                                <g aria-hidden="true" stroke="none" fill-rule="evenodd">
                                    <path
                                        d="M5.35668 0.159286C5.16235 -0.053094 4.83769 -0.0530941 4.64287 0.159286L0.147611 5.05963C-0.0492049 5.27473 -0.049205 5.62357 0.147611 5.83813C0.344427 6.05323 0.664108 6.05323 0.860924 5.83813L5 1.32706L9.13858 5.83867C9.33589 6.05378 9.65507 6.05378 9.85239 5.83867C10.0492 5.62357 10.0492 5.27473 9.85239 5.06018L5.35668 0.159286Z" />
                                </g>
                            </svg>
                        </button>
                    </h5>
                    <div id="accordion-filter-1" class="accordion-collapse collapse show border-0"
                        aria-labelledby="accordion-heading-1" data-bs-parent="#categories-list">
                        <div class="accordion-body px-0 pb-0 pt-3">
                            <ul class="list list-inline mb-0">
                                <li class="list-item">
                                    <a href="#" class="menu-link py-1">Dresses</a>
                                </li>
                                <li class="list-item">
                                    <a href="#" class="menu-link py-1">Shorts</a>
                                </li>
                                <li class="list-item">
                                    <a href="#" class="menu-link py-1">Sweatshirts</a>
                                </li>
                                <li class="list-item">
                                    <a href="#" class="menu-link py-1">Swimwear</a>
                                </li>
                                <li class="list-item">
                                    <a href="#" class="menu-link py-1">Jackets</a>
                                </li>
                                <li class="list-item">
                                    <a href="#" class="menu-link py-1">T-Shirts & Tops</a>
                                </li>
                                <li class="list-item">
                                    <a href="#" class="menu-link py-1">Jeans</a>
                                </li>
                                <li class="list-item">
                                    <a href="#" class="menu-link py-1">Trousers</a>
                                </li>
                                <li class="list-item">
                                    <a href="#" class="menu-link py-1">Men</a>
                                </li>
                                <li class="list-item">
                                    <a href="#" class="menu-link py-1">Jumpers & Cardigans</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>


            {{-- Colors --}}
            <div class="accordion" id="color-filters">
                <div class="accordion-item mb-4 pb-3">
                    <h5 class="accordion-header" id="accordion-heading-1">
                        <button class="accordion-button p-0 border-0 fs-5 text-uppercase" type="button"
                            data-bs-toggle="collapse" data-bs-target="#accordion-filter-2" aria-expanded="true"
                            aria-controls="accordion-filter-2">
                            Color
                            <svg class="accordion-button__icon type2" viewBox="0 0 10 6" xmlns="http://www.w3.org/2000/svg">
                                <g aria-hidden="true" stroke="none" fill-rule="evenodd">
                                    <path
                                        d="M5.35668 0.159286C5.16235 -0.053094 4.83769 -0.0530941 4.64287 0.159286L0.147611 5.05963C-0.0492049 5.27473 -0.049205 5.62357 0.147611 5.83813C0.344427 6.05323 0.664108 6.05323 0.860924 5.83813L5 1.32706L9.13858 5.83867C9.33589 6.05378 9.65507 6.05378 9.85239 5.83867C10.0492 5.62357 10.0492 5.27473 9.85239 5.06018L5.35668 0.159286Z" />
                                </g>
                            </svg>
                        </button>
                    </h5>
                    <div id="accordion-filter-2" class="accordion-collapse collapse show border-0"
                        aria-labelledby="accordion-heading-1" data-bs-parent="#color-filters">
                        <div class="accordion-body px-0 pb-0">
                            <div class="d-flex flex-wrap">
                                <a href="#" class="swatch-color js-filter" style="color: #0a2472"></a>
                                <a href="#" class="swatch-color js-filter" style="color: #d7bb4f"></a>
                                <a href="#" class="swatch-color js-filter" style="color: #282828"></a>
                                <a href="#" class="swatch-color js-filter" style="color: #b1d6e8"></a>
                                <a href="#" class="swatch-color js-filter" style="color: #9c7539"></a>
                                <a href="#" class="swatch-color js-filter" style="color: #d29b48"></a>
                                <a href="#" class="swatch-color js-filter" style="color: #e6ae95"></a>
                                <a href="#" class="swatch-color js-filter" style="color: #d76b67"></a>
                                <a href="#" class="swatch-color swatch_active js-filter" style="color: #bababa"></a>
                                <a href="#" class="swatch-color js-filter" style="color: #bfdcc4"></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



            {{-- Size --}}
            <div class="accordion" id="size-filters">
                <div class="accordion-item mb-4 pb-3">
                    <h5 class="accordion-header" id="accordion-heading-size">
                        <button class="accordion-button p-0 border-0 fs-5 text-uppercase" type="button"
                            data-bs-toggle="collapse" data-bs-target="#accordion-filter-size" aria-expanded="true"
                            aria-controls="accordion-filter-size">
                            Sizes
                            <svg class="accordion-button__icon type2" viewBox="0 0 10 6" xmlns="http://www.w3.org/2000/svg">
                                <g aria-hidden="true" stroke="none" fill-rule="evenodd">
                                    <path
                                        d="M5.35668 0.159286C5.16235 -0.053094 4.83769 -0.0530941 4.64287 0.159286L0.147611 5.05963C-0.0492049 5.27473 -0.049205 5.62357 0.147611 5.83813C0.344427 6.05323 0.664108 6.05323 0.860924 5.83813L5 1.32706L9.13858 5.83867C9.33589 6.05378 9.65507 6.05378 9.85239 5.83867C10.0492 5.62357 10.0492 5.27473 9.85239 5.06018L5.35668 0.159286Z" />
                                </g>
                            </svg>
                        </button>
                    </h5>
                    <div id="accordion-filter-size" class="accordion-collapse collapse show border-0"
                        aria-labelledby="accordion-heading-size" data-bs-parent="#size-filters">
                        <div class="accordion-body px-0 pb-0">
                            <div class="d-flex flex-wrap">
                                <a href="#" class="swatch-size btn btn-sm btn-outline-light mb-3 me-3 js-filter">XS</a>
                                <a href="#" class="swatch-size btn btn-sm btn-outline-light mb-3 me-3 js-filter">S</a>
                                <a href="#" class="swatch-size btn btn-sm btn-outline-light mb-3 me-3 js-filter">M</a>
                                <a href="#" class="swatch-size btn btn-sm btn-outline-light mb-3 me-3 js-filter">L</a>
                                <a href="#" class="swatch-size btn btn-sm btn-outline-light mb-3 me-3 js-filter">XL</a>
                                <a href="#" class="swatch-size btn btn-sm btn-outline-light mb-3 me-3 js-filter">XXL</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>




            <div class="accordion" id="brand-filters">
                <div class="accordion-item mb-4 pb-3">
                    <h5 class="accordion-header" id="accordion-heading-brand">
                        <button class="accordion-button p-0 border-0 fs-5 text-uppercase" type="button"
                            data-bs-toggle="collapse" data-bs-target="#accordion-filter-brand" aria-expanded="true"
                            aria-controls="accordion-filter-brand">
                            Brandss
                            <svg class="accordion-button__icon type2" viewBox="0 0 10 6" xmlns="http://www.w3.org/2000/svg">
                                <g aria-hidden="true" stroke="none" fill-rule="evenodd">
                                    <path
                                        d="M5.35668 0.159286C5.16235 -0.053094 4.83769 -0.0530941 4.64287 0.159286L0.147611 5.05963C-0.0492049 5.27473 -0.049205 5.62357 0.147611 5.83813C0.344427 6.05323 0.664108 6.05323 0.860924 5.83813L5 1.32706L9.13858 5.83867C9.33589 6.05378 9.65507 6.05378 9.85239 5.83867C10.0492 5.62357 10.0492 5.27473 9.85239 5.06018L5.35668 0.159286Z" />
                                </g>
                            </svg>
                        </button>
                    </h5>

                    <div id="accordion-filter-brand" class="accordion-collapse collapse show border-0"
                        aria-labelledby="accordion-heading-brand" data-bs-parent="#brand-filters">
                        <div class="search-field multi-select accordion-body px-0 pb-0">
                            <div class="search-field__input-wrapper mb-3">
                                <input type="text" id="brandSearch"
                                    class="search-field__input form-control form-control-sm border-light border-2"
                                    placeholder="Search brand..." />
                            </div>

                            {{-- <ul id="brandList" class="multi-select__list list-unstyled">
                                @foreach($brands as $brand)
                                    <li class="search-suggestion__item multi-select__item js-search-select js-multi-select">
                                        <a href="{{ route('shop.index', array_merge(request()->all(), ['brand' => $brand->id])) }}"
                                            class="d-flex justify-content-between text-decoration-none @if(request('brand') == $brand->id) text-primary fw-bold @else text-dark @endif">
                                            <span>{{ $brand->name }}</span>
                                            <span class="text-secondary">{{ $brand->products_count ?? 0 }}</span>
                                        </a>
                                    </li>
                                @endforeach
                            </ul> --}}
                        </div>
                    </div>
                </div>
            </div>


            {{-- Price --}}

            <div class="accordion" id="price-filters">
                <div class="accordion-item mb-4">
                    <h5 class="accordion-header mb-2" id="accordion-heading-price">
                        <button class="accordion-button p-0 border-0 fs-5 text-uppercase" type="button"
                            data-bs-toggle="collapse" data-bs-target="#accordion-filter-price" aria-expanded="true"
                            aria-controls="accordion-filter-price">
                            Price
                            <svg class="accordion-button__icon type2" viewBox="0 0 10 6" xmlns="http://www.w3.org/2000/svg">
                                <g aria-hidden="true" stroke="none" fill-rule="evenodd">
                                    <path
                                        d="M5.35668 0.159286C5.16235 -0.053094 4.83769 -0.0530941 4.64287 0.159286L0.147611 5.05963C-0.0492049 5.27473 -0.049205 5.62357 0.147611 5.83813C0.344427 6.05323 0.664108 6.05323 0.860924 5.83813L5 1.32706L9.13858 5.83867C9.33589 6.05378 9.65507 6.05378 9.85239 5.83867C10.0492 5.62357 10.0492 5.27473 9.85239 5.06018L5.35668 0.159286Z" />
                                </g>
                            </svg>
                        </button>
                    </h5>
                    <div id="accordion-filter-price" class="accordion-collapse collapse show border-0"
                        aria-labelledby="accordion-heading-price" data-bs-parent="#price-filters">
                        <input class="price-range-slider" type="text" name="price_range" value="" data-slider-min="10"
                            data-slider-max="1000" data-slider-step="5" data-slider-value="[250,450]" data-currency="$" />
                        <div class="price-range__info d-flex align-items-center mt-2">
                            <div class="me-auto">
                                <span class="text-secondary">Min Price: </span>
                                <span class="price-range__min">$250</span>
                            </div>
                            <div>
                                <span class="text-secondary">Max Price: </span>
                                <span class="price-range__max">$450</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="shop-list flex-grow-1">
            <div class="swiper-container js-swiper-slider slideshow slideshow_small slideshow_split" data-settings='{
                            "autoplay": {
                              "delay": 5000
                            },
                            "slidesPerView": 1,
                            "effect": "fade",
                            "loop": true,
                            "pagination": {
                              "el": ".slideshow-pagination",
                              "type": "bullets",
                              "clickable": true
                            }
                          }'>
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="slide-split h-100 d-block d-md-flex overflow-hidden">
                            <div class="slide-split_text position-relative d-flex align-items-center"
                                style="background-color: #f5e6e0;">
                                <div class="slideshow-text container p-3 p-xl-5">
                                    <h2
                                        class="text-uppercase section-title fw-normal mb-3 animate animate_fade animate_btt animate_delay-2">
                                        Women's <br /><strong>ACCESSORIES</strong></h2>
                                    <p class="mb-0 animate animate_fade animate_btt animate_delay-5">Accessories are the
                                        best way to
                                        update your look. Add a title edge with new styles and new colors, or go for
                                        timeless pieces.</h6>
                                </div>
                            </div>
                            <div class="slide-split_media position-relative">
                                <div class="slideshow-bg" style="background-color: #f5e6e0;">
                                    <img loading="lazy" src="assets/images/shop/shop_banner3.jpg" width="630" height="450"
                                        alt="Women's accessories" class="slideshow-bg__img object-fit-cover" />
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="swiper-slide">
                        <div class="slide-split h-100 d-block d-md-flex overflow-hidden">
                            <div class="slide-split_text position-relative d-flex align-items-center"
                                style="background-color: #f5e6e0;">
                                <div class="slideshow-text container p-3 p-xl-5">
                                    <h2
                                        class="text-uppercase section-title fw-normal mb-3 animate animate_fade animate_btt animate_delay-2">
                                        Women's <br /><strong>ACCESSORIES</strong></h2>
                                    <p class="mb-0 animate animate_fade animate_btt animate_delay-5">Accessories are the
                                        best way to
                                        update your look. Add a title edge with new styles and new colors, or go for
                                        timeless pieces.</h6>
                                </div>
                            </div>
                            <div class="slide-split_media position-relative">
                                <div class="slideshow-bg" style="background-color: #f5e6e0;">
                                    <img loading="lazy" src="assets/images/shop/shop_banner3.jpg" width="630" height="450"
                                        alt="Women's accessories" class="slideshow-bg__img object-fit-cover" />
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="swiper-slide">
                        <div class="slide-split h-100 d-block d-md-flex overflow-hidden">
                            <div class="slide-split_text position-relative d-flex align-items-center"
                                style="background-color: #f5e6e0;">
                                <div class="slideshow-text container p-3 p-xl-5">
                                    <h2
                                        class="text-uppercase section-title fw-normal mb-3 animate animate_fade animate_btt animate_delay-2">
                                        Women's <br /><strong>ACCESSORIES</strong></h2>
                                    <p class="mb-0 animate animate_fade animate_btt animate_delay-5">Accessories are the
                                        best way to
                                        update your look. Add a title edge with new styles and new colors, or go for
                                        timeless pieces.</h6>
                                </div>
                            </div>
                            <div class="slide-split_media position-relative">
                                <div class="slideshow-bg" style="background-color: #f5e6e0;">
                                    <img loading="lazy" src="assets/images/shop/shop_banner3.jpg" width="630" height="450"
                                        alt="Women's accessories" class="slideshow-bg__img object-fit-cover" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="container p-3 p-xl-5">
                    <div class="slideshow-pagination d-flex align-items-center position-absolute bottom-0 mb-4 pb-xl-2">
                    </div>

                </div>
            </div>

            <div class="mb-3 pb-2 pb-xl-3"></div>

            <div class="d-flex justify-content-between mb-4 pb-md-2">
                <div class="breadcrumb mb-0 d-none d-md-block flex-grow-1">
                    <a href="{{ route('home') }}" class="menu-link menu-link_us-s text-uppercase fw-medium">Home</a>
                    <span class="breadcrumb-separator menu-link fw-medium ps-1 pe-1">/</span>
                    <a href="#" class="menu-link menu-link_us-s text-uppercase fw-medium">The Shop</a>
                </div>

                <div class="shop-acs d-flex align-items-center justify-content-between justify-content-md-end flex-grow-1 gap-3">
                    
             <form method="GET" id="filterForm" class="d-flex justify-content-between mb-3 gap-3">
                

    <!-- 🔽 Sorting -->
  <select name="sort" onchange="document.getElementById('filterForm').submit();" class="form-select w-auto">
        <option value="">Default Sorting</option>
        <option value="new_to_old" {{ request('sort')=='new_to_old' ? 'selected' : '' }}>Newest to Oldest</option>
        <option value="old_to_new" {{ request('sort')=='old_to_new' ? 'selected' : '' }}>Oldest to Newest</option>
        <option value="price_asc" {{ request('sort')=='price_asc' ? 'selected' : '' }}>Price: Low to High</option>
        <option value="price_desc" {{ request('sort')=='price_desc' ? 'selected' : '' }}>Price: High to Low</option>
        <option value="name_asc" {{ request('sort')=='name_asc' ? 'selected' : '' }}>Name: A to Z</option>
        <option value="name_desc" {{ request('sort')=='name_desc' ? 'selected' : '' }}>Name: Z to A</option>
    </select>
    
    <!-- 🔽 Per page -->
    <select name="size" onchange="document.getElementById('filterForm').submit();" class="form-select w-auto">
        <option value="4" {{ request('size')==4 ? 'selected' : '' }}>4 per page</option>
        <option value="8" {{ request('size')==8 ? 'selected' : '' }}>8 per page</option>
        <option value="12" {{ request('size')==12 ? 'selected' : '' }}>12 per page</option>
        <option value="16" {{ request('size')==16 ? 'selected' : '' }}>16 per page</option>
    </select>
</form>

                    <div class="shop-asc__seprator mx-3 bg-light d-none d-md-block order-md-0"></div>

                    <div class="col-size align-items-center order-1 d-none d-lg-flex">
                        <span class="text-uppercase fw-medium me-2">View</span>
                        <button class="btn-link fw-medium me-2 js-cols-size" data-target="products-grid"
                            data-cols="2">2</button>
                        <button class="btn-link fw-medium me-2 js-cols-size" data-target="products-grid"
                            data-cols="3">3</button>
                        <button class="btn-link fw-medium js-cols-size" data-target="products-grid" data-cols="4">4</button>
                    </div>

                    <div class="shop-filter d-flex align-items-center order-0 order-md-3 d-lg-none">
                        <button class="btn-link btn-link_f d-flex align-items-center ps-0 js-open-aside"
                            data-aside="shopFilter">
                            <svg class="d-inline-block align-middle me-2" width="14" height="10" viewBox="0 0 14 10"
                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                <use href="#icon_filter" />
                            </svg>
                            <span class="text-uppercase fw-medium d-inline-block align-middle">Filter</span>
                        </button>
                    </div>
                </div>
            </div>

            {{-- products-grid --}}
            <div class="products-grid row row-cols-2 row-cols-md-3" id="products-grid">
 
                @foreach($products as $product)
                    <div class="col-lg-3 col-md-6 col-sm-8 mb-4">
                        <div class="product-card-wrapper h-100">
                            <div class="product-card h-80 d-flex flex-column">

                                {{-- Image Section --}}
                                <div class="pc__img-wrapper position-relative" style="height: 400px; overflow: hidden;">
                                    <div class="swiper-container background-img js-swiper-slider"
                                        data-settings='{"resizeObserver": true, "slidesPerView": 1}'>
                                        <div class="swiper-wrapper h-80">

                                            {{-- Main Product Image --}}
                                            <div class="swiper-slide h-100 d-flex justify-content-center align-items-center">
                                                <a href="{{ route('product.details', $product->slug) }}"
                                                    class="d-block h-50 w-50">
                                                    <img loading="lazy" src="{{ asset('uploads/products/' . $product->image) }}"
                                                        alt="{{ $product->name }}"
                                                        class="pc__img img-fluid h-80 w-auto mx-auto">
                                                </a>
                                            </div>

                                            {{-- Gallery Images --}}
                                            @if(!empty($product->images))
                                                @foreach(json_decode($product->images, true) as $galleryImage)
                                                    <div class="swiper-slide h-100 d-flex justify-content-center align-items-center">
                                                        <a href="{{ route('product.details', $product->slug) }}"
                                                            class="d-block h-80 w-80">
                                                            <img loading="lazy"
                                                                src="{{ asset('uploads/products/gallery/' . $galleryImage) }}"
                                                                alt="{{ $product->name }}"
                                                                class="pc__img img-fluid h-100 w-auto mx-auto">
                                                        </a>
                                                    </div>
                                                @endforeach
                                            @endif
                                        </div>

                                        {{-- Swiper Navigation --}}
                                        <span class="pc__img-prev"><svg width="14" height="22" viewBox="0 0 7 11">
                                                <use href="#icon_prev_sm" />
                                            </svg></span>
                                        <span class="pc__img-next"><svg width="14" height="22" viewBox="0 0 7 11">
                                                <use href="#icon_next_sm" />
                                            </svg></span>
                                    </div>

                                    {{-- Add to card or Go to Cart --}}
                                        @if (Cart::instance('cart')->content()->where('id',$product->id)->count()>0)
                                    <a href="{{ route('cart.index') }}" class="pc__atc btn anim_appear-bottom btn position-absolute border-0 text-uppercase fw-medium btn-warning mb-3">Go to Cart</a>
                                    @else
                                      <form name="addtocart-form" method="post" action="{{ route('cart.add') }}">
                                        @csrf
                                <input type="hidden" name="id" value="{{ $product->id }}"/>
                                <input type="hidden" name="quantity" value="1"/>
                            <input type="hidden" name="name" value="{{ $product->name }}"/>
                            <input type="hidden" name="price" value="{{ $product->sale_price == '' ?  $product->regular_price: $product->sale_price }}"/>
                 
                                       <button type="sumbit" class="pc__atc btn anim_appear-bottom btn position-absolute border-0 text-uppercase fw-medium  "
                                        title="Add To Cart" data-aside="cartDrawer"> Add To Cart </button>
                                        </form>
                                        @endif

                                </div>

                                {{-- Info Section --}}
                                <div class="pc__info position-relative">

                                    <div class="product-card__price d-flex">

                                        <div class="pc__info  mt-1">
                                            <p class="pc__category text-muted small">
                                                {{ $product->category->name ?? 'No Category' }}
                                            </p>

                                            <h6 class="pc__title mb-1">
                                                <a href="{{ route('product.details', $product->slug) }}"
                                                    class="text-decoration-none text-dark">
                                                    {{ $product->name }}
                                                </a>
                                            </h6>
                                            @if($product->sale_price)
                                            <span class="money price price-old">${{ $product->regular_price }}</span>

                                                <span class="money price price-sale">${{ $product->sale_price }}</span>
                                                
                                            @else
                                                <span class="money price price-old">${{ $product->regular_price }}</span>
                                            @endif

                                            <button
                                                class="pc__btn-wl position-absolute top-0 end-0 bg-transparent border-0 js-add-wishlist"
                                                title="Add To Wishlist">
                                                <svg width="16" height="16" viewBox="0 0 20 20" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <use href="#icon_heart" />
                                                </svg>
                                            </button>


                                        </div>
                                    </div>


                                    {{-- Review Section --}}
                                    <div class="product-card__review d-flex align-items-center">
                                        <div class="reviews-group d-flex">
                                            @for($i = 1; $i <= 5; $i++)
                                                <svg class="review-star me-1" width="14" height="14" viewBox="0 0 9 9"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <use href="#icon_star" />
                                                </svg>
                                            @endfor
                                        </div>
                                        <span class="reviews-note text-lowercase text-secondary ms-2">8k+ reviews</span>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                @endforeach

            </div>


            <div class="divider"></div>
            <!-- Pagination -->
            <div class="flex items-center justify-between flex-wrap gap10 wgp-pagination">
                {{ $products->links('pagination::bootstrap-5') }}
            </div>


        </div>
    </section>


    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const sliders = document.querySelectorAll('.js-swiper-slider');

            sliders.forEach(function (slider) {
                new Swiper(slider, {
                    loop: true, // Infinite loop
                    slidesPerView: 1,
                    autoHeight: true, // স্বয়ংক্রিয় height adjust
                    navigation: {
                        nextEl: slider.querySelector('.pc__img-next'),
                        prevEl: slider.querySelector('.pc__img-prev'),
                    },
                });
            });
        });
    </script>


@endsection