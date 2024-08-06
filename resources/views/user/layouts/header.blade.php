    <style>
        header .profile-dropdown ul li {
            display: block;
            padding: 5px 20px;
            border-bottom: 1px solid #ddd;
            line-height: 35px;
        }

        header .profile-dropdown ul li:last-child {
            border-color: #fff;
        }

        header .profile-dropdown ul {
            padding: 10px 0;
            min-width: 250px;
        }

        .name-usr {
            background: #e87316;
            padding: 8px 12px;
            color: #fff;
            font-weight: bold;
            text-transform: uppercase;
            line-height: 24px;
        }

        .name-usr span {
            margin-right: 10px;
        }

        @media (max-width:600px) {
            .h-logo {
                max-width: 150px !important;
            }

            i.sidebar-bar {
                font-size: 22px;
            }

            .mobile-menu ul li a svg {
                width: 20px;
                height: 20px;
            }

            .mobile-menu ul li a span {
                margin-top: 0px;
                font-size: 12px;
            }

            .name-usr {
                padding: 5px 12px;
            }
        }
    </style>
    <header class="header-style-2" id="home">
        <div class="main-header navbar-searchbar">
            <div class="container-fluid-lg">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="main-menu">
                            <div class="menu-left">
                                <div class="brand-logo">
                                    <a href="{{ route('home') }}">
                                        <img src="{{ asset('/') }}assets/users/images/logo.png"
                                            class="h-logo img-fluid blur-up lazyload" alt="logo">
                                    </a>
                                </div>

                            </div>
                            <nav>
                                <div class="main-navbar">
                                    <div id="mainnav">
                                        <div class="toggle-nav">
                                            <i class="fa fa-bars sidebar-bar"></i>
                                        </div>
                                        <ul class="nav-menu">
                                            <li class="back-btn d-xl-none">
                                                <div class="close-btn">
                                                    Menu
                                                    <span class="mobile-back"><i class="fa fa-angle-left"></i>
                                                    </span>
                                                </div>
                                            </li>
                                            <li><a href="index.htm" class="nav-link menu-title">Home</a></li>
                                            <li><a href="shop.html" class="nav-link menu-title">Shop</a></li>
                                            <li><a href="{{ route('cart.list') }}" class="nav-link menu-title">Cart</a>
                                            </li>
                                            <li><a href="about-us.html" class="nav-link menu-title">About Us</a></li>
                                            <li><a href="contact-us.html" class="nav-link menu-title">Contact Us</a>
                                            </li>
                                            <li><a href="blog.html" class="nav-link menu-title">Blog</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </nav>
                            <div class="menu-right">
                                <ul>
                                    <li>
                                        <div class="search-box theme-bg-color">
                                            <i data-feather="search"></i>
                                        </div>
                                    </li>
                                    <li class="onhover-dropdown wislist-dropdown">
                                        <div class="cart-media">
                                            <a href="wishlist/list.html">
                                                <i data-feather="heart"></i>
                                                <span id="wishlist-count" class="label label-theme rounded-pill">
                                                    0
                                                </span>
                                            </a>
                                        </div>
                                    </li>
                                    <li class="onhover-dropdown cart-dropdown">
                                        <a href="{{ route('cart.list') }}">
                                            @php
                                            $total = 0;
                                        @endphp
                                        @foreach ((array) session('cart') as $id => $details)
                                            @php
                                                $total += $details['price'] * $details['quantity'];
                                            @endphp
                                        @endforeach
                                            <span id="cart-count" class="label label-theme ">
                                                <i data-feather="shopping-cart"></i> 
                                                @if (session('cart'))
                                                {{ number_format($total, 3) }}
                                                @else

                                                @endif
                                            </span>
                                        </a>
                                        <div class="onhover-div">
                                            <div class="cart-menu">
                                                <div class="cart-title">
                                                    <h6>
                                                        <i data-feather="shopping-bag"></i>
                                                        <span class="label label-theme rounded-pill">{{ count((array) session('cart')) }}</span>
                                                    </h6>
                                                    <span class="d-md-none d-block">
                                                        <i class="fas fa-arrow-right back-cart"></i>
                                                    </span>
                                                </div>
                                                <ul class="custom-scroll">
                                                   
                                                    @if (session('cart'))
                                                        @foreach ((array) session('cart') as $id => $details)
                                                            <li>
                                                                <div class="media">
                                                                    <img src="{{ asset($details['image']) }}"
                                                                        class="img-fluid blur-up lazyload"
                                                                        alt="">
                                                                    <div class="media-body">
                                                                        <h6>{{ $details['product_name'] }}</h6>
                                                                        <div class="qty-with-price">
                                                                            <span>${{ number_format($details['price'],3) }}</span>
                                                                            <span>
                                                                                quantity: {{ $details['quantity'] }}
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                    
                                                                        <button type="button"
                                                                        class="btn-close d-block d-md-none"
                                                                        aria-label="Close">
                                                                        <i class="fas fa-times"></i>
                                                                    </button>
                                                                    </form>
                                                                </div>
                                                            </li>
                                                        @endforeach
                                                    @endif


                                                </ul>
                                            </div>
                                            <div class="cart-btn">
                                                <h6 class="cart-total"><span class="font-light">Total:</span> $
                                                    {{ number_format($total, 3) }}</h6>
                                                    <a class="btn btn-solid-default btn-block text-light" href="{{ route('checkout') }}">Proceed to payment</a>
                                                
                                            </div>
                                        </div>
                                    </li>
                                    {{-- <li class="onhover-dropdown wislist-dropdown">
                                        <div class="cart-media">
                                            <a href="{{ route('cart.list') }}">
                                                <i data-feather="shopping-cart"></i>
                                                <span id="cart-count" class="label label-theme rounded-pill">
                                                    {{ count((array) session('cart')) }}
                                                </span>
                                            </a>
                                        </div>
                                    </li> --}}
                                    <li class="onhover-dropdown">
                                        <div class="cart-media name-usr">
                                            <i data-feather="user"></i>{{ Auth::user()->name ?? ''}}
                                        </div>
                                        <div class="onhover-div profile-dropdown">
                                            <ul>

                                                @auth
                                                    <li>
                                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                                            onclick="event.preventDefault();
                                                                    document.getElementById('logout-form').submit();">
                                                            {{ __('Logout') }}
                                                        </a>
                                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                            class="d-none">
                                                            @csrf
                                                        </form>
                                                    </li>
                                                @endauth
                                                @guest
                                                    <li>
                                                        <a href="{{ route('login') }}" class="d-block">Login</a>
                                                    </li>
                                                    <li>
                                                        <a href="{{ route('register') }}" class="d-block">Register</a>
                                                    </li>
                                                @endguest
                                            </ul>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="search-full">
                                <form method="GET" class="search-full" action="{{ route('home') }}">
                                    <div class="input-group">

                                        <input type="text" name="search" class="form-control search-type"
                                            placeholder="Search here.." value="{{ isset($search) ? $search : '' }}">
                                        <span class="input-group-text close-search">
                                            <i data-feather="x" class="font-light"></i>
                                        </span>
                                        <span class="input-group-text">
                                            <button style="border: none;background: transparent;" type="submit"><i
                                                    data-feather="search" class="font-light"></i></button>
                                        </span>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
