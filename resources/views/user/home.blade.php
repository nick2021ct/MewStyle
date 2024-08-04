
@extends('user.layouts.app')

@section('body')
<style>
    .carousel-item {
    position: relative;
}

.additional-image {
    position: absolute;
    bottom: 10px; 
    right: 10px; 
    width: 100px;
    height: auto; 
}

.additional-image img {
    width: 100%; 
    height: auto; 
}
</style>
<div class="mobile-menu d-sm-none">
    <ul>
        <li>
            <a href="demo3.php" class="active">
                <i data-feather="home"></i>
                <span>Home</span>
            </a>
        </li>
        <li>
            <a href="javascript:void(0)">
                <i data-feather="align-justify"></i>
                <span>Category</span>
            </a>
        </li>
        <li>
            <a href="javascript:void(0)">
                <i data-feather="shopping-bag"></i>
                <span>Cart</span>
            </a>
        </li>
        <li>
            <a href="javascript:void(0)">
                <i data-feather="heart"></i>
                <span>Wishlist</span>
            </a>
        </li>
        <li>
            <a href="user-dashboard.php">
                <i data-feather="user"></i>
                <span>Account</span>
            </a>
        </li>
    </ul>
</div>
{{-- banner --}}
<div id="carouselExampleCaptions" class="carousel slide">
 
    <div class="carousel-inner">
        @foreach ($banners as $index => $banner)
        <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
            <img src="{{ asset($banner->image) }}" style="height: 480px" class="d-block w-100" alt="Main image {{ $index + 1 }}">
            <div class="carousel-caption d-none d-md-block">
                <h2>{{ $banner->title }}</h2>
                <h3>{{ $banner->content }}</h3>
                <h3>${{ $banner->sale_price ?? $banner->price }}</h3>
                <p>{{ $banner->description }}</p>
                <div class="additional-image">
                    <img src="{{ asset($banner->product_image) }}" alt="Additional image {{ $index + 1 }}">
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>

   
<section class="ratio_asos overflow-hidden">
    <div class="container p-sm-0">
        <div class="row m-0">
            <div class="col-12 p-0">
                <div class="title-3 text-center">
                    <h2>Our Products</h2>
                    <h5 class="theme-color">Our Collection</h5>
                </div>
            </div>
        </div>
        <style>
            .r-price {
                display: flex;
                flex-direction: row;
                gap: 20px;
            }

            .r-price .main-price {
                width: 100%;
            }

            .r-price .rating {
                padding-left: auto;
            }

            .product-style-3.product-style-chair .product-title {
                text-align: left;
                width: 100%;
            }

            @media (max-width:600px) {

                .product-box p,
                .product-box a {
                    text-align: left;
                }

                .product-style-3.product-style-chair .main-price {
                    text-align: right !important;
                }
            }
        </style>
        <div class="row g-sm-4 g-3">

           {{-- product items --}}
          
               <div class="row">
               
                   @foreach ($products as $product)
                       <div class="col-xl-2 col-lg-2 col-6">
                           <div class="product-box">
                               <div class="img-wrapper">
                                   <a href="{{ route('detail', $product->id) }}">
                                       <img class="w-100 bg-img blur-up lazyload" src="{{ asset($product->main_image) }}" alt="Product Image">
                                   </a>
                                   <div class="circle-shape"></div>
                                   <span class="background-text">Furniture</span>
                                   <div class="label-block">
                                       @if(isset($product->sale_price))
                                           <span class="label label-theme">{{ number_format((($product->price - $product->sale_price) / $product->price) * 100) }}% Off</span>
                                       @endif
                                   </div>
                                   <div class="cart-wrap">
                                       <ul>
                                           <li>
                                               <a href="#" class="addtocart-btn">
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
                               <div class="product-style-3 product-style-chair">
                                   <div class="product-title d-block mb-0">
                                       <p class="font-light mb-sm-2 mb-0">
                                           @if (isset($product->sale_price))
                                               <del>{{ $product->price }}</del>
                                           @endif
                                       </p>
                                       <div class="r-price">
                                           <div class="theme-color">{{ $product->sale_price ?? $product->price }}</div>
                                           <div class="main-price">
                                               <ul class="rating mb-1 mt-0">
                                                   <li><i class="fas fa-star theme-color"></i></li>
                                                   <li><i class="fas fa-star theme-color"></i></li>
                                                   <li><i class="fas fa-star"></i></li>
                                                   <li><i class="fas fa-star"></i></li>
                                                   <li><i class="fas fa-star"></i></li>
                                               </ul>
                                           </div>
                                       </div>
                                       <p class="font-light mb-sm-2 mb-0">{{ $product->category->name }}</p>
                                       <a href="{{ route('detail', $product->id) }}" class="font-default">
                                           <h5>{{ $product->name }}</h5>
                                       </a>
                                   </div>
                               </div>
                           </div>
                       </div>
                   @endforeach
                  
               </div>
        </div>
    </div>
</section>


<!-- category section start -->
<section class="category-section ratio_40">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="title title-2 text-center">
                    <h2>Our Category</h2>
                    <h5 class="text-color">Our collection</h5>
                </div>
            </div>
        </div>
        <div class="row gy-3">
            <div class="col-xxl-2 col-lg-3">
                <div class="category-wrap category-padding category-block theme-bg-color">
                    <div>
                        <h2 class="light-text">Top</h2>
                        <h2 class="top-spacing">Our Top</h2>
                        <span>Categories</span>
                    </div>
                </div>
            </div>
            <div class="col-xxl-10 col-lg-9">
                <div class="category-wrapper category-slider1 white-arrow category-arrow">
                    {{-- CATEGORIES --}}
                   @foreach ($categories as $category)
                   <div>
                    <a href="{{ route('shop',$category->id) }}" class="category-wrap category-padding">
                        <img src="{{ asset($category->image) }}" class="bg-img blur-up lazyload"
                            alt="category image">
                        <div class="category-content category-text-1">
                            <h3 class="theme-color">{{ $category->name }}</h3>
                        </div>
                    </a>
                </div>
                   @endforeach
                    {{-- CATEGORIES --}}
                </div>
            </div>
        </div>
    </div>
</section>
<!-- category section end -->

<div id="qvmodal"></div>
<script>
    $(document).ready(function() {
    $('.slider-for').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: true,
        asNavFor: '.slider-nav'
    });
    $('.slider-nav').slick({
        slidesToShow: 3,
        slidesToScroll: 1,
        asNavFor: '.slider-for',
        focusOnSelect: true
    });

    $('.slider-for').on('afterChange', function(event, slick, currentSlide) {
        var slide = $(slick.$slides[currentSlide]);
        $('#banner-title').text(slide.data('title'));
        $('#banner-subtitle').text(slide.data('subtitle'));
        $('#banner-price').html('$' + slide.data('price') + ' <span class="theme-color"><del>$' + slide.data('original-price') + '</del></span>');
        $('#banner-details').text(slide.data('details'));
    });

    $('.slider-for').slick('slickGoTo', 0);
});
</script>

@endsection

    