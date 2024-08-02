
    @extends('user.layouts.app')

    @section('body')
    <!-- Cart Section Start -->
    <section class="cart-section section-b-space">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <table class="table cart-table">
                        <thead>
                            <tr class="table-head">
                                <th scope="col">image</th>
                                <th scope="col">product name</th>
                                <th scope="col">price</th>
                                <th scope="col">quantity</th>
                                <th scope="col">total</th>
                                <th scope="col">action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (session('cart'))
                                @foreach (session('cart') as $id => $details)
                             
                                <tr data-id="{{ $id }}">
                                    <td data-th="Product">
                                        <a href="">
                                            <img src="{{ asset($details['image']) }}" class="blur-up lazyloaded"
                                                alt="">
                                        </a>
                                    </td>
                                    <td>
                                        <a href="{{ asset('/') }}assets/users/product/details.html">{{ $details['name'] }}</a>
                                        <div class="mobile-cart-content row">
                                           
                                            <div class="col">
                                                <h2>${{ $details['price'] }}</h2>
                                            </div>
                                            <div class="col">
                                                <h2 class="td-color">
                                                    <a href="javascript:void(0)">
                                                        <i class="fas fa-times"></i>
                                                    </a>
                                                </h2>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <h2>${{ $details['price'] }}</h2>
                                    </td>
                                    <td>
                                        <div class="qty-box">
                                            <div class="input-group">
                                                <input type="number" name="quantity"
                                                    class="form-control input-number cart_update" value="{{ $details['quantity'] }}" min="1">
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <h2 class="td-color">${{ $details['price'] * $details['quantity'] }}</h2>
                                    </td>
                                    <td>
                                        <a  href="{{ route('cart_delete',$details['id'])  }}">
                                            <i class="fas fa-times"></i>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            @endif
                           

                            
                        </tbody>
                    </table>
                </div>
                <div class="col-12 mt-md-5 mt-4">
                    <div class="row">
                        <div class="col-sm-7 col-5 order-1">
                            <div class="left-side-button text-end d-flex d-block justify-content-end">
                                <a href="javascript:void(0)"
                                    class="text-decoration-underline theme-color d-block text-capitalize">clear
                                    all items</a>
                            </div>
                        </div>
                        <div class="col-sm-5 col-7">
                            <div class="left-side-button float-start">
                                <a href="{{ asset('/') }}assets/users/shop.html" class="btn btn-solid-default btn fw-bold mb-0 ms-0">
                                    <i class="fas fa-arrow-left"></i> Continue Shopping</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="cart-checkout-section">
                    <div class="row g-4">
                        <div class="col-lg-4 col-sm-6">
                            <div class="promo-section">
                                <form class="row g-3">
                                    <div class="col-7">
                                        <input type="text" class="form-control" id="number" placeholder="Coupon Code">
                                    </div>
                                    <div class="col-5">
                                        <button class="btn btn-solid-default rounded btn">Apply Coupon</button>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <div class="col-lg-4 col-sm-6 ">
                            <div class="checkout-button">
                                <a href="checkout" class="btn btn-solid-default btn fw-bold">
                                    Check Out <i class="fas fa-arrow-right ms-1"></i></a>
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="cart-box">
                                <div class="cart-box-details">
                                    <div class="total-details">
                                        <div class="top-details">
                                            <h3>Cart Totals</h3>
                                            @if (session('cart'))
                                             @php $totals = 0;  @endphp      
                                                @foreach (session('cart') as $id => $details)
                                                    @php
                                                    $totals += $details['price'] * $details['quantity'];
                                                    @endphp
                                                    <h6>{{ $details['name'] }} <span>${{ $details['price'] * $details['quantity'] }}</span></h6>
                                                @endforeach
                                                <h6>Total <span>${{ $totals }}</span></h6>
                                            @endif
                                        </div>
                                        <div class="bottom-details">
                                            <a href="checkout">Process Checkout</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @endsection

    @section('scripts')
        <script type="text/javascript">
             $(".cart_update").change(function (e) {
        e.preventDefault();
    
        var ele = $(this);
    
        $.ajax({
            url: '{{ route('update_cart') }}',
            method: "patch",
            data: {
                _token: '{{ csrf_token() }}', 
                id: ele.parents("tr").attr("data-id"), 
                quantity: ele.parents("tr").find(".input-number").val()
            },
            success: function (response) {
               window.location.reload();
            }
        });
    });
        </script>
    @endsection