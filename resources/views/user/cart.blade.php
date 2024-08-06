@extends('user.layouts.app')

@section('body')
    <section class="cart-section section-b-space">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    @if (session('cart'))
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
                           
                                @foreach (session('cart') as $id => $details)
                                    <tr data-id="{{ $id }}">
                                        <td data-th="Product">
                                            <a href="../product/details.html">
                                                <img src="{{ asset($details['image']) }}" class="blur-up lazyloaded"
                                                    alt="">
                                            </a>
                                        </td>
                                        <td>
                                            <a href="../product/details.html">{{ $details['product_name'] }}</a>
                                        </td>
                                        <td data-th="Price">
                                            <h2>${{ $details['price'] }}</h2>
                                        </td>
                                        <td>
                                            <div class="qty-box">
                                                <div class="input-group">
                                                    <input type="number" name="quantity"
                                                        class="form-control input-number quantity cart_update"
                                                        value="{{ $details['quantity'] }}" min="1">
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <h2 class="td-color">${{ $details['price'] * $details['quantity'] }}</h2>
                                        </td>
                                        <td>
                                            <a href="{{ route('cart.delete', $id) }}">
                                                <i class="fas fa-times"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                        </tbody>
                    </table>
                    @else
                    <h3>There nothing here. Plese add something to cart</h3>
                    @endif
                </div>
                <div class="col-12 mt-md-5 mt-4">
                    <div class="row">
                        <div class="col-md-8">


                            {{-- <form class="needs-validation" method="POST" action="{{ route('order.place') }}">
                                @csrf
                                <div id="billingAddress" class="row g-4">
                                    <h3 class="mb-3 theme-color">Billing address</h3>
                                    <div class="col-md-6">
                                        <label for="name" class="form-label">Name</label>
                                        <input type="text" class="form-control" id="name" name="name"
                                            placeholder="Enter Full Name" value="{{ $users->name }}">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="phone" class="form-label">Phone</label>
                                        <input type="text" class="form-control" id="phone" name="phone"
                                            placeholder="Enter Phone Number" value="{{ $users->phone }}">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="text" class="form-control" id="email" name="email"
                                            placeholder="Locality" value="{{ $users->email }}">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="address" class="form-label">Address</label>
                                        <input type="text" class="form-control" id="address" name="address"
                                            placeholder="address" value="{{ $users->address }}">
                                    </div>

                                    <div class="col-md-12">
                                        <label for="note" class="form-label">Note</label>
                                        <textarea class="form-control" id="note" name="note"></textarea>

                                    </div>


                                </div>




                                <hr class="my-lg-5 my-4">

                                <h3 class="mb-3">Payment</h3>

                                <div class="d-block my-3">
                                    <div class="form-check custome-radio-box">
                                        <input class="form-check-input" type="radio" name="payment_method" value="COD"
                                            checked="" id="cod">
                                        <label class="form-check-label" for="cod">COD</label>
                                    </div>
                                    <div class="form-check custome-radio-box">
                                        <input class="form-check-input" type="radio" name="payment_method" value="Momo"
                                            id="debit">
                                        <label class="form-check-label" for="debit">Momo</label>
                                    </div>

                                   
                                </div>
                               
                                <button class="btn btn-solid-default mt-4" type="submit">Place Order</button>
                            </form> --}}
                            <div class="col-sm-5 col-7">
                                <div class="left-side-button float-start">
                                <a href="{{ route('home') }}" class="btn btn-solid-default btn fw-bold mb-0 ms-0">
                                    <i class="fas fa-arrow-left"></i> Continue Shopping</a>
                            </div>

                            </div>
                        </div>
                        @if (session('cart'))
                        <div class="cart-checkout-section col-md-4">
                            <div class="cart-box">
                                <div class="cart-box-details">
                                    <div class="total-details">
                                        <div class="top-details">
                                            <h3>Cart Totals</h3>
                                            @php $total = 0; @endphp
                                            @foreach ((array) session('cart') as $id => $details)
                                                @php
                                                    $total += $details['price'] * $details['quantity'];
                                                @endphp
                                                <h6>{{ $details['product_name'] }}
                                                    <span>${{ $details['price'] * $details['quantity'] }}</span></h6>
                                            @endforeach

                                            <h6 style="color: orange">Total <span
                                                    style="color: orange">${{ $total }}</span></h6>
                                        </div>
                                        <div class="bottom-details">
                                        <a href="{{ route('checkout') }}">Process Checkout</a>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @else
                       
                        @endif
                    </div>
                </div>

                <div class="cart-checkout-section">
                    <div class="row g-4">
                        {{-- <div class="col-lg-4 col-sm-6">
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
                        </div> --}}

                        {{-- <div class="col-lg-4 col-sm-6 ">
                            <div class="checkout-button">
                                <a href="checkout" class="btn btn-solid-default btn fw-bold">
                                    Check Out <i class="fas fa-arrow-right ms-1"></i></a>
                            </div>
                        </div> --}}


                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection



@section('scripts')
    <script type="text/javascript">
        $('.cart_update').change(function(e) {
            e.preventDefault();
            var ele = $(this);

            $.ajax({
                url: '{{ route('cart.update') }}',
                method: 'patch',
                data: {
                    _token: '{{ csrf_token() }}',
                    id: ele.parents('tr').attr('data-id'),
                    quantity: ele.parents('tr').find('.quantity').val()
                },
                success: function(response) {
                    window.location.reload();
                }
            });
        });
    </script>
@endsection
