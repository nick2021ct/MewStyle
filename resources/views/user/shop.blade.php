@extends('user.layouts.app')

@section('body')
  <!-- Shop Section start -->
 
  <section class="section-b-space">
    <div class="container">
        <div class="row">
            {{-- <div class="col-lg-3 category-side col-md-4">
                <div class="category-option">
                    <div class="button-close mb-3">
                        <button class="btn p-0"><i data-feather="arrow-left"></i> Close</button>
                    </div>
                    <div class="accordion category-name" id="accordionExample">
                       

                      
                        <form method="GET" action="" class="mb-4">

                            <!-- Price Filter -->
                            <div class="accordion-item category-price">
                                <h2 class="accordion-header" id="headingFour">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour">
                                        Price
                                    </button>
                                </h2>
                                <div id="collapseFour" class="accordion-collapse collapse show" aria-labelledby="headingFour">
                                    <div class="accordion-body">
                                        <div class="range-slider category-list">
                                            <input type="text" class="js-range-slider" id="js-range-price" value="" data-min="0" data-max="1000" data-from="{{ request('price_min', 0) }}" data-to="{{ request('price_max', 1000) }}">
                                        </div>
                                        <input type="hidden" name="price_min" id="price_min" value="{{ request('price_min', 0) }}">
                                        <input type="hidden" name="price_max" id="price_max" value="{{ request('price_max', 1000) }}">
                                    </div>
                                </div>
                            </div>
                            <!-- Category Filter -->
                            <div class="accordion-item category-rating">
                                <h2 class="accordion-header" id="headingOne">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSix">
                                        Category
                                    </button>
                                </h2>
                                <div id="collapseSix" class="accordion-collapse collapse show" aria-labelledby="headingOne">
                                    <div class="accordion-body category-scroll">
                                        <ul class="category-list">
                                            @foreach ($categories as $category)
                                            <li>
                                                <div class="form-check ps-0 custome-form-check">
                                                    <input class="checkbox_animated check-it" id="cat{{ $category->id }}" name="categories[]" type="checkbox" value="{{ $category->id }}" {{ in_array($category->id, request('categories', [])) ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="cat{{ $category->id }}">{{ $category->name }}</label>
                                                </div>
                                            </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        
                            
                        
                            <!-- Discount Filter -->
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingSeven">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSeven">
                                        Discount Range
                                    </button>
                                </h2>
                                <div id="collapseSeven" class="accordion-collapse collapse show" aria-labelledby="headingSeven">
                                    <div class="accordion-body">
                                        <ul class="category-list">
                                            <li>
                                                <div class="form-check ps-0 custome-form-check">
                                                    <input class="checkbox_animated check-it" id="discount5" name="discounts[]" type="checkbox" value="5" {{ in_array(5, request('discounts', [])) ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="discount5">5% and above</label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="form-check ps-0 custome-form-check">
                                                    <input class="checkbox_animated check-it" id="discount10" name="discounts[]" type="checkbox" value="10" {{ in_array(10, request('discounts', [])) ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="discount10">10% and above</label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="form-check ps-0 custome-form-check">
                                                    <input class="checkbox_animated check-it" id="discount20" name="discounts[]" type="checkbox" value="20" {{ in_array(20, request('discounts', [])) ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="discount20">20% and above</label>
                                                </div>
                                            </li>
                                        </ul>
                                        <button type="submit" class="btn btn-primary mt-2">Filter</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div> --}}

            <div class="category-product  col-12 ratio_30">
                {{-- col-lg-9 --}}
                {{-- <div class="row g-4">
                    <!-- label and featured section -->
                    <div class="col-md-12">
                        <ul class="short-name">


                        </ul>
                    </div>

                    <div class="col-12">
                        <div class="filter-options">
                            <div class="select-options">
                                <div class="page-view-filter">
                                    <div class="dropdown select-featured">
                                        <select class="form-select" name="orderby" id="orderby">
                                            <option value="-1" selected="">Default</option>
                                            <option value="1">Date, New To Old</option>
                                            <option value="2">Date, Old To New</option>
                                            <option value="3">Price, Low To High</option>
                                            <option value="4">Price, High To Low</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="dropdown select-featured">
                                    <select class="form-select" name="size" id="pagesize">
                                        <option value="12" selected="">12 Products Per Page</option>
                                        <option value="24">24 Products Per Page</option>
                                        <option value="52">52 Products Per Page</option>
                                        <option value="100">100 Products Per Page</option>
                                    </select>
                                </div>
                            </div>
                            <div class="grid-options d-sm-inline-block d-none">
                                <ul class="d-flex">
                                    <li class="two-grid">
                                        <a href="javascript:void(0)">
                                            <img src="{{ asset('/') }}assets/users/svg/grid-2.svg" class="img-fluid blur-up lazyload"
                                                alt="">
                                        </a>
                                    </li>
                                    <li class="three-grid d-md-inline-block d-none">
                                        <a href="javascript:void(0)">
                                            <img src="{{ asset('/') }}assets/users/svg/grid-3.svg" class="img-fluid blur-up lazyload"
                                                alt="">
                                        </a>
                                    </li>
                                    <li class="grid-btn active d-lg-inline-block d-none">
                                        <a href="javascript:void(0)">
                                            <img src="{{ asset('/') }}assets/users/svg/grid.svg" class="img-fluid blur-up lazyload"
                                                alt="">
                                        </a>
                                    </li>
                                    <li class="list-btn">
                                        <a href="javascript:void(0)">
                                            <img src="{{ asset('/') }}assets/users/svg/list.svg" class="img-fluid blur-up lazyload"
                                                alt="">
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div> --}}
                <!-- label and featured section -->

                <div
                    class="row g-sm-4 g-3 row-cols-lg-4 row-cols-md-3 row-cols-2 mt-1 custom-gy-5 product-style-2 ratio_asos product-list-section">
                    <!-- prodduct section -->
                    @foreach ($products as $product)
                    <div>
                        <div class="product-box">
                            <div class="img-wrapper">
                             
                                <div class="font">
                                    <a href="{{ route('detail',$product->id) }}">
                                        <img src="{{ asset($product->images->first()->image) }}"
                                            class="bg-img blur-up lazyload" alt="">
                                    </a>
                                </div>
                                <div class="cart-wrap">
                                    <ul>
                                        <li>
                                            <a href="javascript:void(0)" class="addtocart-btn">
                                                <i data-feather="shopping-cart"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0)">
                                                <i data-feather="eye"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0)" class="wishlist">
                                                <i data-feather="heart"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product-details">
                                <div class="rating-details">
                                    <span class="font-light grid-content">{{ $product->category->name }}</span>
                                    <ul class="rating mt-0">
                                        <li>
                                            <i class="fas fa-star theme-color"></i>
                                        </li>
                                        <li>
                                            <i class="fas fa-star theme-color"></i>
                                        </li>
                                        <li>
                                            <i class="fas fa-star"></i>
                                        </li>
                                        <li>
                                            <i class="fas fa-star"></i>
                                        </li>
                                        <li>
                                            <i class="fas fa-star"></i>
                                        </li>
                                    </ul>
                                </div>
                                <div class="main-price">
                                    <a href="{{ route('detail',$product->id) }}" class="font-default">
                                        <h5 class="ms-0">{{ $product->name }}</h5>
                                    </a>
                                        @if (isset($product->sale_price))
                                        <del>{{ $product->price }}</del>
                                        @endif
                                     
                                    <h3 class="theme-color">${{ $product->sale_price ?? $product->price}}</h3>
                                    <button class="btn listing-content">Add To Cart</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    
                <!-- prodduct section -->

                </div>




                
                <nav class="page-section">
                    <ul class="pagination">
                        <li class="page-item">
                            <a class="page-link" href="javascript:void(0)" aria-label="Previous"
                                style="color:#6c757d;">
                                <span aria-hidden="true">
                                    <i class="fas fa-chevron-left"></i>
                                </span>
                            </a>
                        </li>


                        <li class="page-item active">
                            <a class="page-link" href="javascript:void(0)">1</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="shop-1.html?page=2">2</a>
                        </li>

                        <li class="page-item">
                            <a href="shop-1.html?page=2" class="page-link" aria-label="Next">
                                <span aria-hidden="true">
                                    <i class="fas fa-chevron-right"></i>
                                </span>
                            </a>
                        </li>

                    </ul>
                </nav>

            </div>
        </div>
    </div>
</section>
<!-- Shop Section end -->
@endsection
