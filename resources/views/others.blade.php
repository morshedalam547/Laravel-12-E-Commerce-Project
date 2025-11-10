<main class="pt-90">
    <section class="shop-main container d-flex pt-4 pt-xl-5">
      <div class="shop-sidebar side-sticky bg-body" id="shopFilter">
        <div class="aside-header d-flex d-lg-none align-items-center">
          <h3 class="text-uppercase fs-6 mb-0">Filter By</h3>
          <button class="btn-close-lg js-close-aside btn-close-aside ms-auto"></button>
        </div>

        <div class="pt-4 pt-lg-0"></div>

        {{-- <div class="accordion" id="categories-list">
          <div class="accordion-item mb-4 pb-3">
            <h5 class="accordion-header" id="accordion-heading-1">
              <button class="accordion-button p-0 border-0 fs-5 text-uppercase" type="button" data-bs-toggle="collapse"
                data-bs-target="#accordion-filter-1" aria-expanded="true" aria-controls="accordion-filter-1">
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
        </div> --}}


        <div class="accordion" id="color-filters">
          <div class="accordion-item mb-4 pb-3">
            <h5 class="accordion-header" id="accordion-heading-1">
              <button class="accordion-button p-0 border-0 fs-5 text-uppercase" type="button" data-bs-toggle="collapse"
                data-bs-target="#accordion-filter-2" aria-expanded="true" aria-controls="accordion-filter-2">
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


        {{-- <div class="accordion" id="size-filters">
          <div class="accordion-item mb-4 pb-3">
            <h5 class="accordion-header" id="accordion-heading-size">
              <button class="accordion-button p-0 border-0 fs-5 text-uppercase" type="button" data-bs-toggle="collapse"
                data-bs-target="#accordion-filter-size" aria-expanded="true" aria-controls="accordion-filter-size">
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
        </div> --}}

{{-- 
        <div class="accordion" id="brand-filters">
          <div class="accordion-item mb-4 pb-3">
            <h5 class="accordion-header" id="accordion-heading-brand">
              <button class="accordion-button p-0 border-0 fs-5 text-uppercase" type="button" data-bs-toggle="collapse"
                data-bs-target="#accordion-filter-brand" aria-expanded="true" aria-controls="accordion-filter-brand">
                Brands
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
                <select class="d-none" multiple name="total-numbers-list">
                  <option value="1">Adidas</option>
                  <option value="2">Balmain</option>
                  <option value="3">Balenciaga</option>
                  <option value="4">Burberry</option>
                  <option value="5">Kenzo</option>
                  <option value="5">Givenchy</option>
                  <option value="5">Zara</option>
                </select>
                <div class="search-field__input-wrapper mb-3">
                  <input type="text" name="search_text"
                    class="search-field__input form-control form-control-sm border-light border-2"
                    placeholder="Search" />
                </div>
                <ul class="multi-select__list list-unstyled">
                  <li class="search-suggestion__item multi-select__item text-primary js-search-select js-multi-select">
                    <span class="me-auto">Adidas</span>
                    <span class="text-secondary">2</span>
                  </li>
                  <li class="search-suggestion__item multi-select__item text-primary js-search-select js-multi-select">
                    <span class="me-auto">Balmain</span>
                    <span class="text-secondary">7</span>
                  </li>
                  <li class="search-suggestion__item multi-select__item text-primary js-search-select js-multi-select">
                    <span class="me-auto">Balenciaga</span>
                    <span class="text-secondary">10</span>
                  </li>
                  <li class="search-suggestion__item multi-select__item text-primary js-search-select js-multi-select">
                    <span class="me-auto">Burberry</span>
                    <span class="text-secondary">39</span>
                  </li>
                  <li class="search-suggestion__item multi-select__item text-primary js-search-select js-multi-select">
                    <span class="me-auto">Kenzo</span>
                    <span class="text-secondary">95</span>
                  </li>
                  <li class="search-suggestion__item multi-select__item text-primary js-search-select js-multi-select">
                    <span class="me-auto">Givenchy</span>
                    <span class="text-secondary">1092</span>
                  </li>
                  <li class="search-suggestion__item multi-select__item text-primary js-search-select js-multi-select">
                    <span class="me-auto">Zara</span>
                    <span class="text-secondary">48</span>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div> --}}


       <div class="accordion" id="brand-filters">
  <div class="accordion-item mb-4 pb-3">
    <h5 class="accordion-header" id="accordion-heading-brand">
      <button class="accordion-button p-0 border-0 fs-5 text-uppercase" type="button" data-bs-toggle="collapse"
        data-bs-target="#accordion-filter-brand" aria-expanded="true" aria-controls="accordion-filter-brand">
        Brands
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
          <input type="text" id="brandSearch" class="search-field__input form-control form-control-sm border-light border-2"
            placeholder="Search brand..." />
        </div>

        <ul id="brandList" class="multi-select__list list-unstyled">
          @foreach($brands as $brand)
            <li class="search-suggestion__item multi-select__item js-search-select js-multi-select">
              <a href="{{ route('shop.index', array_merge(request()->all(), ['brand' => $brand->id])) }}"
                 class="d-flex justify-content-between text-decoration-none @if(request('brand') == $brand->id) text-primary fw-bold @else text-dark @endif">
                <span>{{ $brand->name }}</span>
                <span class="text-secondary">{{ $brand->products_count ?? 0 }}</span>
              </a>
            </li>
          @endforeach
        </ul>
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
                    <p class="mb-0 animate animate_fade animate_btt animate_delay-5">Accessories are the best way to
                      update your look. Add a title edge with new styles and new colors, or go for timeless pieces.</h6>
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
                    <p class="mb-0 animate animate_fade animate_btt animate_delay-5">Accessories are the best way to
                      update your look. Add a title edge with new styles and new colors, or go for timeless pieces.</h6>
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
                    <p class="mb-0 animate animate_fade animate_btt animate_delay-5">Accessories are the best way to
                      update your look. Add a title edge with new styles and new colors, or go for timeless pieces.</h6>
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
            <div class="slideshow-pagination d-flex align-items-center position-absolute bottom-0 mb-4 pb-xl-2"></div>

          </div>
        </div>

        <div class="mb-3 pb-2 pb-xl-3"></div>

        <div class="d-flex justify-content-between mb-4 pb-md-2">
          <div class="breadcrumb mb-0 d-none d-md-block flex-grow-1">
            <a href="#" class="menu-link menu-link_us-s text-uppercase fw-medium">Home</a>
            <span class="breadcrumb-separator menu-link fw-medium ps-1 pe-1">/</span>
            <a href="#" class="menu-link menu-link_us-s text-uppercase fw-medium">The Shop</a>
          </div>

          <div class="shop-acs d-flex align-items-center justify-content-between justify-content-md-end flex-grow-1">
            <select class="shop-acs__select form-select w-auto border-0 py-0 order-1 order-md-0" aria-label="Sort Items"
              name="total-number">
              <option selected>Default Sorting</option>
              <option value="1">Featured</option>
              <option value="2">Best selling</option>
              <option value="3">Alphabetically, A-Z</option>
              <option value="3">Alphabetically, Z-A</option>
              <option value="3">Price, low to high</option>
              <option value="3">Price, high to low</option>
              <option value="3">Date, old to new</option>
              <option value="3">Date, new to old</option>
            </select>

            <div class="shop-asc__seprator mx-3 bg-light d-none d-md-block order-md-0"></div>

            <div class="col-size align-items-center order-1 d-none d-lg-flex">
              <span class="text-uppercase fw-medium me-2">View</span>
              <button class="btn-link fw-medium me-2 js-cols-size" data-target="products-grid" data-cols="2">2</button>
              <button class="btn-link fw-medium me-2 js-cols-size" data-target="products-grid" data-cols="3">3</button>
              <button class="btn-link fw-medium js-cols-size" data-target="products-grid" data-cols="4">4</button>
            </div>

            <div class="shop-filter d-flex align-items-center order-0 order-md-3 d-lg-none">
              <button class="btn-link btn-link_f d-flex align-items-center ps-0 js-open-aside" data-aside="shopFilter">
                <svg class="d-inline-block align-middle me-2" width="14" height="10" viewBox="0 0 14 10" fill="none"
                  xmlns="http://www.w3.org/2000/svg">
                  <use href="#icon_filter" />
                </svg>
                <span class="text-uppercase fw-medium d-inline-block align-middle">Filter</span>
              </button>
            </div>
          </div>
        </div>

        <div class="products-grid row row-cols-2 row-cols-md-3" id="products-grid">
          {{-- <div class="product-card-wrapper">
            <div class="product-card mb-3 mb-md-4 mb-xxl-5">
              <div class="pc__img-wrapper">
                <div class="swiper-container background-img js-swiper-slider" data-settings='{"resizeObserver": true}'>
                  <div class="swiper-wrapper">
                    <div class="swiper-slide">
                      <a href="details.html"><img loading="lazy" src="assets/images/products/product_1.jpg" width="330"
                          height="400" alt="Cropped Faux leather Jacket" class="pc__img"></a>
                    </div>
                    <div class="swiper-slide">
                      <a href="details.html"><img loading="lazy" src="assets/images/products/product_1-1.jpg"
                          width="330" height="400" alt="Cropped Faux leather Jacket" class="pc__img"></a>
                    </div>
                  </div>
                  <span class="pc__img-prev"><svg width="7" height="11" viewBox="0 0 7 11"
                      xmlns="http://www.w3.org/2000/svg">
                      <use href="#icon_prev_sm" />
                    </svg></span>
                  <span class="pc__img-next"><svg width="7" height="11" viewBox="0 0 7 11"
                      xmlns="http://www.w3.org/2000/svg">
                      <use href="#icon_next_sm" />
                    </svg></span>
                </div>
                <button
                  class="pc__atc btn anim_appear-bottom btn position-absolute border-0 text-uppercase fw-medium js-add-cart js-open-aside"
                  data-aside="cartDrawer" title="Add To Cart">Add To Cart</button>
              </div>

              <div class="pc__info position-relative">
                <p class="pc__category">Dresses</p>
                <h6 class="pc__title"><a href="details.html">Cropped Faux Leather Jacket</a></h6>
                <div class="product-card__price d-flex">
                  <span class="money price">$29</span>
                </div>
                <div class="product-card__review d-flex align-items-center">
                  <div class="reviews-group d-flex">
                    <svg class="review-star" viewBox="0 0 9 9" xmlns="http://www.w3.org/2000/svg">
                      <use href="#icon_star" />
                    </svg>
                    <svg class="review-star" viewBox="0 0 9 9" xmlns="http://www.w3.org/2000/svg">
                      <use href="#icon_star" />
                    </svg>
                    <svg class="review-star" viewBox="0 0 9 9" xmlns="http://www.w3.org/2000/svg">
                      <use href="#icon_star" />
                    </svg>
                    <svg class="review-star" viewBox="0 0 9 9" xmlns="http://www.w3.org/2000/svg">
                      <use href="#icon_star" />
                    </svg>
                    <svg class="review-star" viewBox="0 0 9 9" xmlns="http://www.w3.org/2000/svg">
                      <use href="#icon_star" />
                    </svg>
                  </div>
                  <span class="reviews-note text-lowercase text-secondary ms-1">8k+ reviews</span>
                </div>

                <button class="pc__btn-wl position-absolute top-0 end-0 bg-transparent border-0 js-add-wishlist"
                  title="Add To Wishlist">
                  <svg width="16" height="16" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <use href="#icon_heart" />
                  </svg>
                </button>
              </div>
            </div>
          </div> --}}

          {{-- <div class="product-card-wrapper">
            <div class="product-card mb-3 mb-md-4 mb-xxl-5">
              <div class="pc__img-wrapper">
                <div class="swiper-container background-img js-swiper-slider" data-settings='{"resizeObserver": true}'>
                  <div class="swiper-wrapper">
                    <div class="swiper-slide">
                      <a href="details.html"><img loading="lazy" src="assets/images/products/product_2.jpg" width="330"
                          height="400" alt="Cropped Faux leather Jacket" class="pc__img"></a>
                    </div>
                    <div class="swiper-slide">
                      <a href="details.html"><img loading="lazy" src="assets/images/products/product_2-1.jpg"
                          width="330" height="400" alt="Cropped Faux leather Jacket" class="pc__img"></a>
                    </div>
                  </div>
                  <span class="pc__img-prev"><svg width="7" height="11" viewBox="0 0 7 11"
                      xmlns="http://www.w3.org/2000/svg">
                      <use href="#icon_prev_sm" />
                    </svg></span>
                  <span class="pc__img-next"><svg width="7" height="11" viewBox="0 0 7 11"
                      xmlns="http://www.w3.org/2000/svg">
                      <use href="#icon_next_sm" />
                    </svg></span>
                </div>
                <button
                  class="pc__atc btn anim_appear-bottom btn position-absolute border-0 text-uppercase fw-medium js-add-cart js-open-aside"
                  data-aside="cartDrawer" title="Add To Cart">Add To Cart</button>
              </div>

              <div class="pc__info position-relative">
                <p class="pc__category">Dresses</p>
                <h6 class="pc__title"><a href="details.html">Calvin Shorts</a></h6>
                <div class="product-card__price d-flex">
                  <span class="money price">$62</span>
                </div>

                <div class="d-flex align-items-center mt-1">
                  <a href="#" class="swatch-color pc__swatch-color" style="color: #222222"></a>
                  <a href="#" class="swatch-color swatch_active pc__swatch-color" style="color: #b9a16b"></a>
                  <a href="#" class="swatch-color pc__swatch-color" style="color: #f5e6e0"></a>
                </div>

                <button class="pc__btn-wl position-absolute top-0 end-0 bg-transparent border-0 js-add-wishlist"
                  title="Add To Wishlist">
                  <svg width="16" height="16" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <use href="#icon_heart" />
                  </svg>
                </button>
              </div>

              <div class="pc-labels position-absolute top-0 start-0 w-100 d-flex justify-content-between">
                <div class="pc-labels__right ms-auto">
                  <span class="pc-label pc-label_sale d-block text-white">-67%</span>
                </div>
              </div>
            </div>
          </div> --}}

          {{-- <div class="product-card-wrapper">
            <div class="product-card mb-3 mb-md-4 mb-xxl-5">
              <div class="pc__img-wrapper">
                <div class="swiper-container background-img js-swiper-slider" data-settings='{"resizeObserver": true}'>
                  <div class="swiper-wrapper">
                    <div class="swiper-slide">
                      <a href="details.html"><img loading="lazy" src="assets/images/products/product_3.jpg" width="330"
                          height="400" alt="Cropped Faux leather Jacket" class="pc__img"></a>
                    </div>
                    <div class="swiper-slide">
                      <a href="details.html"><img loading="lazy" src="assets/images/products/product_3-1.jpg"
                          width="330" height="400" alt="Cropped Faux leather Jacket" class="pc__img"></a>
                    </div>
                  </div>
                  <span class="pc__img-prev"><svg width="7" height="11" viewBox="0 0 7 11"
                      xmlns="http://www.w3.org/2000/svg">
                      <use href="#icon_prev_sm" />
                    </svg></span>
                  <span class="pc__img-next"><svg width="7" height="11" viewBox="0 0 7 11"
                      xmlns="http://www.w3.org/2000/svg">
                      <use href="#icon_next_sm" />
                    </svg></span>
                </div>
                <button
                  class="pc__atc btn anim_appear-bottom btn position-absolute border-0 text-uppercase fw-medium js-add-cart js-open-aside"
                  data-aside="cartDrawer" title="Add To Cart">Add To Cart</button>
              </div>

              <div class="pc__info position-relative">
                <p class="pc__category">Dresses</p>
                <h6 class="pc__title"><a href="details.html">Kirby T-Shirt</a></h6>
                <div class="product-card__price d-flex">
                  <span class="money price">$17</span>
                </div>

                <button class="pc__btn-wl position-absolute top-0 end-0 bg-transparent border-0 js-add-wishlist"
                  title="Add To Wishlist">
                  <svg width="16" height="16" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <use href="#icon_heart" />
                  </svg>
                </button>
              </div>
            </div>
          </div> --}}

          {{-- <div class="product-card-wrapper">
            <div class="product-card mb-3 mb-md-4 mb-xxl-5">
              <div class="pc__img-wrapper">
                <div class="swiper-container background-img js-swiper-slider" data-settings='{"resizeObserver": true}'>
                  <div class="swiper-wrapper">
                    <div class="swiper-slide">
                      <a href="details.html"><img loading="lazy" src="assets/images/products/product_4.jpg" width="330"
                          height="400" alt="Cropped Faux leather Jacket" class="pc__img"></a>
                    </div>
                    <div class="swiper-slide">
                      <a href="details.html"><img loading="lazy" src="assets/images/products/product_4-1.jpg"
                          width="330" height="400" alt="Cropped Faux leather Jacket" class="pc__img"></a>
                    </div>
                  </div>
                  <span class="pc__img-prev"><svg width="7" height="11" viewBox="0 0 7 11"
                      xmlns="http://www.w3.org/2000/svg">
                      <use href="#icon_prev_sm" />
                    </svg></span>
                  <span class="pc__img-next"><svg width="7" height="11" viewBox="0 0 7 11"
                      xmlns="http://www.w3.org/2000/svg">
                      <use href="#icon_next_sm" />
                    </svg></span>
                </div>
                <button
                  class="pc__atc btn anim_appear-bottom btn position-absolute border-0 text-uppercase fw-medium js-add-cart js-open-aside"
                  data-aside="cartDrawer" title="Add To Cart">Add To Cart</button>
              </div>

              <div class="pc__info position-relative">
                <p class="pc__category">Dresses</p>
                <h6 class="pc__title"><a href="details.html">Cableknit Shawl</a></h6>
                <div class="product-card__price d-flex">
                  <span class="money price price-old">$129</span>
                  <span class="money price price-sale">$99</span>
                </div>

                <button class="pc__btn-wl position-absolute top-0 end-0 bg-transparent border-0 js-add-wishlist"
                  title="Add To Wishlist">
                  <svg width="16" height="16" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <use href="#icon_heart" />
                  </svg>
                </button>
              </div>

              <div class="pc-labels position-absolute top-0 start-0 w-100 d-flex justify-content-between">
                <div class="pc-labels__left">
                  <span class="pc-label pc-label_new d-block bg-white">NEW</span>
                </div>
              </div>
            </div>
          </div> --}}

          {{-- <div class="product-card-wrapper">
            <div class="product-card mb-3 mb-md-4 mb-xxl-5">
              <div class="pc__img-wrapper">
                <div class="swiper-container background-img js-swiper-slider" data-settings='{"resizeObserver": true}'>
                  <div class="swiper-wrapper">
                    <div class="swiper-slide">
                      <a href="details.html"><img loading="lazy" src="assets/images/products/product_5.jpg" width="330"
                          height="400" alt="Cropped Faux leather Jacket" class="pc__img"></a>
                    </div>
                    <div class="swiper-slide">
                      <a href="details.html"><img loading="lazy" src="assets/images/products/product_5-1.jpg"
                          width="330" height="400" alt="Cropped Faux leather Jacket" class="pc__img"></a>
                    </div>
                  </div>
                  <span class="pc__img-prev"><svg width="7" height="11" viewBox="0 0 7 11"
                      xmlns="http://www.w3.org/2000/svg">
                      <use href="#icon_prev_sm" />
                    </svg></span>
                  <span class="pc__img-next"><svg width="7" height="11" viewBox="0 0 7 11"
                      xmlns="http://www.w3.org/2000/svg">
                      <use href="#icon_next_sm" />
                    </svg></span>
                </div>
                <button
                  class="pc__atc btn anim_appear-bottom btn position-absolute border-0 text-uppercase fw-medium js-add-cart js-open-aside"
                  data-aside="cartDrawer" title="Add To Cart">Add To Cart</button>
              </div>

              <div class="pc__info position-relative">
                <p class="pc__category">Dresses</p>
                <h6 class="pc__title"><a href="details.html">Colorful Jacket</a></h6>
                <div class="product-card__price d-flex">
                  <span class="money price">$29</span>
                </div>

                <button class="pc__btn-wl position-absolute top-0 end-0 bg-transparent border-0 js-add-wishlist"
                  title="Add To Wishlist">
                  <svg width="16" height="16" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <use href="#icon_heart" />
                  </svg>
                </button>
              </div>
            </div>
          </div> --}}

          {{-- <div class="product-card-wrapper">
            <div class="product-card mb-3 mb-md-4 mb-xxl-5">
              <div class="pc__img-wrapper">
                <div class="swiper-container background-img js-swiper-slider" data-settings='{"resizeObserver": true}'>
                  <div class="swiper-wrapper">
                    <div class="swiper-slide">
                      <a href="details.html"><img loading="lazy" src="assets/images/products/product_6.jpg" width="330"
                          height="400" alt="Cropped Faux leather Jacket" class="pc__img"></a>
                    </div>
                    <div class="swiper-slide">
                      <a href="details.html"><img loading="lazy" src="assets/images/products/product_6-1.jpg"
                          width="330" height="400" alt="Cropped Faux leather Jacket" class="pc__img"></a>
                    </div>
                  </div>
                  <span class="pc__img-prev"><svg width="7" height="11" viewBox="0 0 7 11"
                      xmlns="http://www.w3.org/2000/svg">
                      <use href="#icon_prev_sm" />
                    </svg></span>
                  <span class="pc__img-next"><svg width="7" height="11" viewBox="0 0 7 11"
                      xmlns="http://www.w3.org/2000/svg">
                      <use href="#icon_next_sm" />
                    </svg></span>
                </div>
                <button
                  class="pc__atc btn anim_appear-bottom btn position-absolute border-0 text-uppercase fw-medium js-add-cart js-open-aside"
                  data-aside="cartDrawer" title="Add To Cart">Add To Cart</button>
              </div>

              <div class="pc__info position-relative">
                <p class="pc__category">Dresses</p>
                <h6 class="pc__title"><a href="details.html">Shirt In Botanical Cheetah Print</a></h6>
                <div class="product-card__price d-flex">
                  <span class="money price">$62</span>
                </div>

                <button class="pc__btn-wl position-absolute top-0 end-0 bg-transparent border-0 js-add-wishlist"
                  title="Add To Wishlist">
                  <svg width="16" height="16" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <use href="#icon_heart" />
                  </svg>
                </button>
              </div>
            </div>
          </div> --}}

          <div class="product-card-wrapper">
            <div class="product-card mb-3 mb-md-4 mb-xxl-5">
              <div class="pc__img-wrapper">
                <div class="swiper-container background-img js-swiper-slider" data-settings='{"resizeObserver": true}'>
                  <div class="swiper-wrapper">
                    <div class="swiper-slide">
                      <a href="details.html"><img loading="lazy" src="assets/images/products/product_7.jpg" width="330"
                          height="400" alt="Cropped Faux leather Jacket" class="pc__img"></a>
                    </div>
                    <div class="swiper-slide">
                      <a href="details.html"><img loading="lazy" src="assets/images/products/product_7-1.jpg"
                          width="330" height="400" alt="Cropped Faux leather Jacket" class="pc__img"></a>
                    </div>
                  </div>
                  <span class="pc__img-prev"><svg width="7" height="11" viewBox="0 0 7 11"
                      xmlns="http://www.w3.org/2000/svg">
                      <use href="#icon_prev_sm" />
                    </svg></span>
                  <span class="pc__img-next"><svg width="7" height="11" viewBox="0 0 7 11"
                      xmlns="http://www.w3.org/2000/svg">
                      <use href="#icon_next_sm" />
                    </svg></span>
                </div>
                <button
                  class="pc__atc btn anim_appear-bottom btn position-absolute border-0 text-uppercase fw-medium js-add-cart js-open-aside"
                  data-aside="cartDrawer" title="Add To Cart">Add To Cart</button>
              </div>

              <div class="pc__info position-relative">
                <p class="pc__category">Dresses</p>
                <h6 class="pc__title"><a href="details.html">Cotton Jersey T-Shirt</a></h6>
                <div class="product-card__price d-flex">
                  <span class="money price">$17</span>
                </div>

                <button class="pc__btn-wl position-absolute top-0 end-0 bg-transparent border-0 js-add-wishlist"
                  title="Add To Wishlist">
                  <svg width="16" height="16" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <use href="#icon_heart" />
                  </svg>
                </button>
              </div>
            </div>
          </div>

          {{-- <div class="product-card-wrapper">
            <div class="product-card mb-3 mb-md-4 mb-xxl-5">
              <div class="pc__img-wrapper">
                <div class="swiper-container background-img js-swiper-slider" data-settings='{"resizeObserver": true}'>
                  <div class="swiper-wrapper">
                    <div class="swiper-slide">
                      <a href="details.html"><img loading="lazy" src="assets/images/products/product_8.jpg" width="330"
                          height="400" alt="Cropped Faux leather Jacket" class="pc__img"></a>
                    </div>
                    <div class="swiper-slide">
                      <a href="details.html"><img loading="lazy" src="assets/images/products/product_8-1.jpg"
                          width="330" height="400" alt="Cropped Faux leather Jacket" class="pc__img"></a>
                    </div>
                  </div>
                  <span class="pc__img-prev"><svg width="7" height="11" viewBox="0 0 7 11"
                      xmlns="http://www.w3.org/2000/svg">
                      <use href="#icon_prev_sm" />
                    </svg></span>
                  <span class="pc__img-next"><svg width="7" height="11" viewBox="0 0 7 11"
                      xmlns="http://www.w3.org/2000/svg">
                      <use href="#icon_next_sm" />
                    </svg></span>
                </div>
                <button
                  class="pc__atc btn anim_appear-bottom btn position-absolute border-0 text-uppercase fw-medium js-add-cart js-open-aside"
                  data-aside="cartDrawer" title="Add To Cart">Add To Cart</button>
              </div>

              <div class="pc__info position-relative">
                <p class="pc__category">Dresses</p>
                <h6 class="pc__title"><a href="details.html">Zessi Dresses</a></h6>
                <div class="product-card__price d-flex">
                  <span class="money price price-old">$129</span>
                  <span class="money price price-sale">$99</span>
                </div>

                <button class="pc__btn-wl position-absolute top-0 end-0 bg-transparent border-0 js-add-wishlist"
                  title="Add To Wishlist">
                  <svg width="16" height="16" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <use href="#icon_heart" />
                  </svg>
                </button>
              </div>
            </div>
          </div> --}}

          {{-- <div class="product-card-wrapper">
            <div class="product-card mb-3 mb-md-4 mb-xxl-5">
              <div class="pc__img-wrapper">
                <div class="swiper-container background-img js-swiper-slider" data-settings='{"resizeObserver": true}'>
                  <div class="swiper-wrapper">
                    <div class="swiper-slide">
                      <a href="details.html"><img loading="lazy" src="assets/images/products/product_9.jpg" width="330"
                          height="400" alt="Cropped Faux leather Jacket" class="pc__img"></a>
                    </div>
                    <div class="swiper-slide">
                      <a href="details.html"><img loading="lazy" src="assets/images/products/product_9-1.jpg"
                          width="330" height="400" alt="Cropped Faux leather Jacket" class="pc__img"></a>
                    </div>
                  </div>
                  <span class="pc__img-prev"><svg width="7" height="11" viewBox="0 0 7 11"
                      xmlns="http://www.w3.org/2000/svg">
                      <use href="#icon_prev_sm" />
                    </svg></span>
                  <span class="pc__img-next"><svg width="7" height="11" viewBox="0 0 7 11"
                      xmlns="http://www.w3.org/2000/svg">
                      <use href="#icon_next_sm" />
                    </svg></span>
                </div>
                <button
                  class="pc__atc btn anim_appear-bottom btn position-absolute border-0 text-uppercase fw-medium js-add-cart js-open-aside"
                  data-aside="cartDrawer" title="Add To Cart">Add To Cart</button>
              </div>

              <div class="pc__info position-relative">
                <p class="pc__category">Dresses</p>
                <h6 class="pc__title"><a href="details.html">Cropped Faux Leather Jacket</a></h6>
                <div class="product-card__price d-flex">
                  <span class="money price">$29</span>
                </div>
                <div class="product-card__review d-flex align-items-center">
                  <div class="reviews-group d-flex">
                    <svg class="review-star" viewBox="0 0 9 9" xmlns="http://www.w3.org/2000/svg">
                      <use href="#icon_star" />
                    </svg>
                    <svg class="review-star" viewBox="0 0 9 9" xmlns="http://www.w3.org/2000/svg">
                      <use href="#icon_star" />
                    </svg>
                    <svg class="review-star" viewBox="0 0 9 9" xmlns="http://www.w3.org/2000/svg">
                      <use href="#icon_star" />
                    </svg>
                    <svg class="review-star" viewBox="0 0 9 9" xmlns="http://www.w3.org/2000/svg">
                      <use href="#icon_star" />
                    </svg>
                    <svg class="review-star" viewBox="0 0 9 9" xmlns="http://www.w3.org/2000/svg">
                      <use href="#icon_star" />
                    </svg>
                  </div>
                  <span class="reviews-note text-lowercase text-secondary ms-1">8k+ reviews</span>
                </div>

                <button class="pc__btn-wl position-absolute top-0 end-0 bg-transparent border-0 js-add-wishlist"
                  title="Add To Wishlist">
                  <svg width="16" height="16" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <use href="#icon_heart" />
                  </svg>
                </button>
              </div>
            </div>
          </div> --}}
        </div>

        <nav class="shop-pages d-flex justify-content-between mt-3" aria-label="Page navigation">
          <a href="#" class="btn-link d-inline-flex align-items-center">
            <svg class="me-1" width="7" height="11" viewBox="0 0 7 11" xmlns="http://www.w3.org/2000/svg">
              <use href="#icon_prev_sm" />
            </svg>
            <span class="fw-medium">PREV</span>
          </a>
          <ul class="pagination mb-0">
            <li class="page-item"><a class="btn-link px-1 mx-2 btn-link_active" href="#">1</a></li>
            <li class="page-item"><a class="btn-link px-1 mx-2" href="#">2</a></li>
            <li class="page-item"><a class="btn-link px-1 mx-2" href="#">3</a></li>
            <li class="page-item"><a class="btn-link px-1 mx-2" href="#">4</a></li>
          </ul>
          <a href="#" class="btn-link d-inline-flex align-items-center">
            <span class="fw-medium me-1">NEXT</span>
            <svg width="7" height="11" viewBox="0 0 7 11" xmlns="http://www.w3.org/2000/svg">
              <use href="#icon_next_sm" />
            </svg>
          </a>
        </nav>
      </div>
    </section>
  </main>










  {{-- Shop 2nd  --}}

  @extends('layouts.app')

@section('content')


<main class="pt-90">
    <section class="shop-main container d-flex pt-4 pt-xl-5">
<div class="container my-5">

    {{-- 🔍 ফিল্টার সেকশন --}}
    <div class="row mb-4">

        {{-- 🏷️ ক্যাটাগরি --}}
        <div class="col-md-2 mb-3">
            <h6>ক্যাটাগরি</h6>
            <ul class="list-unstyled">
                @foreach($categories as $category)
                    <li>
                        <a href="{{ route('shop.index', array_merge(request()->all(), ['category' => $category->id])) }}" 
                           class="@if(request('category') == $category->id) fw-bold text-primary @endif text-decoration-none">
                           {{ $category->name }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>

        {{-- 🏷️ ব্র্যান্ড --}}
<div class="accordion" id="brand-filters">
  <div class="accordion-item mb-4 pb-3">
    <h5 class="accordion-header" id="accordion-heading-brand">
      <button class="accordion-button p-0 border-0 fs-5 text-uppercase" type="button" data-bs-toggle="collapse"
        data-bs-target="#accordion-filter-brand" aria-expanded="true" aria-controls="accordion-filter-brand">
        Brands
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
          <input type="text" id="brandSearch" class="search-field__input form-control form-control-sm border-light border-2"
            placeholder="Search brand..." />
        </div>

        <ul id="brandList" class="multi-select__list list-unstyled">
          @foreach($brands as $brand)
            <li class="search-suggestion__item multi-select__item js-search-select js-multi-select">
              <a href="{{ route('shop.index', array_merge(request()->all(), ['brand' => $brand->id])) }}"
                 class="d-flex justify-content-between text-decoration-none @if(request('brand') == $brand->id) text-primary fw-bold @else text-dark @endif">
                <span>{{ $brand->name }}</span>
                <span class="text-secondary">{{ $brand->products_count ?? 0 }}</span>
              </a>
            </li>
          @endforeach
        </ul>
      </div>
    </div>
  </div>
</div>


        {{-- 🎨 রঙ --}}
        {{-- <div class="col-md-2 mb-3">
            <h6>রঙ</h6>
            <div class="d-flex flex-wrap">
                @foreach($colors as $color)
                    <a href="{{ route('shop.index', array_merge(request()->all(), ['color' => $color->color])) }}" 
                       class="me-2 mb-2 rounded-circle border" 
                       style="width:25px;height:25px;background-color: {{ $color->color }};"></a>
                @endforeach
            </div>
        </div> --}}

        {{-- 📏 সাইজ --}}
        {{-- <div class="col-md-3 mb-3">
            <h6>সাইজ</h6>
            <div class="d-flex flex-wrap">
                @foreach($sizes as $size)
                    <a href="{{ route('shop.index', array_merge(request()->all(), ['size' => $size->size])) }}" 
                       class="btn btn-sm btn-outline-secondary me-2 mb-2 @if(request('size') == $size->size) btn-primary text-white @endif">
                        {{ $size->size }}
                    </a>
                @endforeach
            </div>
        </div> --}}

        {{-- 💰 প্রাইস রেঞ্জ --}}
     <div class="accordion" id="price-filters">
  <div class="accordion-item mb-4 pb-3">
    <h5 class="accordion-header" id="accordion-heading-price">
      <button class="accordion-button p-0 border-0 fs-5 text-uppercase" type="button" data-bs-toggle="collapse"
        data-bs-target="#accordion-filter-price" aria-expanded="true" aria-controls="accordion-filter-price">
        Price Range
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
      <div class="accordion-body px-0 pb-0">

        <form action="{{ route('shop.index') }}" method="GET" class="p-2">
          <div class="d-flex align-items-center mb-2">
            <input type="number" name="price_min" class="form-control form-control-sm me-2"
              placeholder="Min Price" value="{{ request('price_min') }}">
            <input type="number" name="price_max" class="form-control form-control-sm me-2"
              placeholder="Max Price" value="{{ request('price_max') }}">
          </div>

          <button type="submit" class="btn btn-sm btn-primary w-100">Apply</button>

          {{-- পুরোনো ফিল্টার ধরে রাখতে hidden input --}}
          @foreach(request()->except(['price_min','price_max']) as $key => $value)
              <input type="hidden" name="{{ $key }}" value="{{ $value }}">
          @endforeach
        </form>

      </div>
    </div>
  </div>
</div>


    </div>

    {{-- 🛍️ প্রোডাক্ট গ্রিড --}}
    <div class="row">
        @forelse($products as $product)
            <div class="col-6 col-md-4 col-lg-3 mb-4">
                <div class="card h-100 shadow-sm">
                    <a href="{{ route('product.details', $product->id) }}">
                        <img src="{{ asset('uploads/products/' . $product->image) }}" class="card-img-top" alt="{{ $product->name }}">
                    </a>
                    <div class="card-body text-center">
                        <h6 class="card-title mb-1">
                            <a href="{{ route('product.details', $product->id) }}" class="text-decoration-none">{{ $product->name }}</a>
                        </h6>
                        <p class="text-muted small mb-1">{{ $product->category->name }}</p>




                        
                        {{-- 💵 প্রাইস --}}
                        @if($product->sale_price)
                            <p class="fw-bold text-danger mb-0">
                                ৳{{ $product->sale_price }}
                                <span class="text-muted text-decoration-line-through ms-1">৳{{ $product->regular_price }}</span>
                            </p>
                        @else
                            <p class="fw-bold mb-0">৳{{ $product->regular_price }}</p>
                        @endif
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12 text-center py-5">
                ❌ কোনো প্রোডাক্ট পাওয়া যায়নি।
            </div>
        @endforelse
    </div>

    {{-- 📄 পেজিনেশন --}}
    <div class="d-flex justify-content-center">
        {{ $products->links() }}
    </div>

</div>
</div>
   </section>
  </main>

@endsection



  {{-- Shop 3rd  --}}

@extends('layouts.app')

@section('content')
<!-- 🧭 Swiper & Fancybox CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui/dist/fancybox.css"/>

<main class="pt-90">
  <section class="product-single container py-5">
    <div class="row">
      <!-- 🖼️ Image Gallery -->
      <div class="col-lg-6">
        <!-- Main Image Slider -->
        <div class="swiper mySwiperMain mb-3">
          <div class="swiper-wrapper">
            <div class="swiper-slide">
              <a data-fancybox="gallery" href="{{ asset('uploads/products/' . $product->image) }}">
                <img src="{{ asset('uploads/products/' . $product->image) }}"
                     alt="{{ $product->name }}"
                     class="img-fluid rounded shadow-sm w-100"
                     style="object-fit: cover; max-height: 700px;">
              </a>
            </div>

            @if(!empty($product->images))
              @foreach(json_decode($product->images, true) as $galleryImage)
                <div class="swiper-slide">
                  <a data-fancybox="gallery" href="{{ asset('uploads/products/gallery/' . $galleryImage) }}">
                    <img src="{{ asset('uploads/products/gallery/' . $galleryImage) }}"
                         class="img-fluid rounded shadow-sm w-100"
                         style="object-fit: cover; max-height: 700px;">
                  </a>
                </div>
              @endforeach
            @endif
          </div>
          <div class="swiper-button-next"></div>
          <div class="swiper-button-prev"></div>
        </div>

        <!-- Horizontal Thumbnails Slider -->
        <div class="swiper mySwiperThumbs">
          <div class="swiper-wrapper">
            @if(!empty($product->images))
              @foreach(json_decode($product->images, true) as $galleryImage)
                <div class="swiper-slide">
                  <img src="{{ asset('uploads/products/gallery/' . $galleryImage) }}"
                       class="img-fluid rounded border"
                       style="width: 100px; height: 100px; object-fit: cover; cursor: pointer;">
                </div>
              @endforeach
            @endif
          </div>
        </div>
      </div>

      <!-- 📋 Product Info -->
      <div class="col-lg-6 mt-4 mt-lg-0">
        <h2 class="fw-bold">{{ $product->name }}</h2>
        <p class="text-muted">SKU: {{ $product->SKU }}</p>

        <div class="mb-3">
          @if($product->sale_price)
             <span class="fw-bold fs-4" style="color: #FF0000;">৳{{ $product->sale_price }}</span>
            <span class="fw-bold fs-4 text-muted text-decoration-line-through">৳{{ $product->regular_price }}</span>
          @else
            <span class="fw-bold fs-5">৳{{ $product->regular_price }}</span>
          @endif
        </div>

        <p><strong>স্টক:</strong>
          @if($product->stock_status == 'instock')
            <span class="badge bg-success">মজুদ আছে</span>
          @else
            <span class="badge bg-danger">স্টক শেষ</span>
          @endif
        </p>

        <p><strong>ব্র্যান্ড:</strong> {{ $product->brand->name ?? 'N/A' }}</p>
        <p><strong>ক্যাটাগরি:</strong> {{ $product->category->name ?? 'N/A' }}</p>

        <p class="text-secondary">{{ $product->short_description }}</p>

        <div class="mt-4">
          <a href="#" class="btn btn-primary me-2">🛒 কার্টে যোগ করুন</a>
          <a href="{{ route('shop.index') }}" class="btn btn-outline-secondary">⬅️ শপে ফিরে যান</a>
        </div>
      </div>
    </div>

    <!-- 📝 Product Description -->
    <div class="row mt-5">
      <div class="col-12">
        <h4 class="fw-bold mb-3">পণ্যের বিস্তারিত</h4>
        <p>{{ $product->description }}</p>
      </div>
    </div>
  </section>
</main>

<!-- 🧭 Swiper JS -->
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<!-- 🧭 Fancybox JS -->
<script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui/dist/fancybox.umd.js"></script>

<script>
  // Horizontal Thumbnails Slider
  var swiperThumbs = new Swiper(".mySwiperThumbs", {
    spaceBetween: 10,
    slidesPerView: 4,
    freeMode: true,
    watchSlidesProgress: true,
    breakpoints: {
      768: {
        slidesPerView: 3
      },
      576: {
        slidesPerView: 2
      }
    }
  });

  // Main slider with thumbs
  var swiperMain = new Swiper(".mySwiperMain", {
    spaceBetween: 10,
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
    thumbs: {
      swiper: swiperThumbs,
    },
  });
</script>
@endsection
