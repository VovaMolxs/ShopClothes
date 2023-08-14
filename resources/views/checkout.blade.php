@extends('layouts.layouts')
@section('content')
    @include('layouts.header')

    <main class="main">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="index.html" rel="nofollow">Home</a>
                    <span></span> Shop
                    <span></span> Checkout
                </div>
            </div>
        </div>
        <section class="mt-50 mb-50">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 mb-sm-15">
                        <div class="">
                            @if ($message = Session::get('success'))
                                <div class="alert alert-success alert-dismissible mt-0" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Закрыть">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    {{ $message }}
                                </div>
                            @endif

                            @if ($errors->any())
                                <div class="alert alert-danger alert-dismissible mt-0" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Закрыть">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    <ul class="mb-0">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                        </div>
                    </div>


                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="divider mt-50 mb-50"></div>
                    </div>
                </div>
                <form method="post" action="{{ route('addOrder') }}">
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-25">
                            <h4>Детали заказа</h4>
                        </div>

                            @csrf
                            <div class="form-group">
                                <input type="text"  name="first_name" placeholder="First name *">
                            </div>
                            <div class="form-group">
                                <input type="text"  name="last_name" placeholder="Last name *">
                            </div>
                            <div class="form-group">
                                <input  type="text" name="cname" placeholder="Company Name">
                            </div>

                            <div class="form-group">
                                <input type="text" name="billing_address"  placeholder="Address *">
                            </div>
                            <div class="form-group">
                                <input type="text" name="billing_address2"  placeholder="Address line2">
                            </div>
                            <div class="form-group">
                                <input  type="text" name="city" placeholder="City / Town *">
                            </div>
                            <div class="form-group">
                                <input  type="text" name="state" placeholder="State / County *">
                            </div>
                            <div class="form-group">
                                <input  type="text" name="zipcode" placeholder="Postcode / ZIP *">
                            </div>
                            <div class="form-group">
                                <input  type="text" name="phone" placeholder="Phone *">
                            </div>
                            <div class="form-group">
                                <input  type="text" name="email" placeholder="Email address *">
                            </div>

                            <div class="mb-20">
                                <h5>Additional information</h5>
                            </div>
                            <div class="form-group mb-30">
                                <textarea rows="5" placeholder="Order notes" name="comment"></textarea>
                            </div>

                    </div>
                    <div class="col-md-6">
                        <div class="order_review">
                            <div class="mb-20">
                                <h4>Your Orders</h4>
                            </div>
                            <div class="table-responsive order_table text-center">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th colspan="2">Product</th>
                                        <th>Total</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @php
                                    $total = 0;
                                    @endphp
                                    @foreach($products as $product)
                                        @php
                                        $total += ($product->regular_price*$product->pivot->quantity);
                                        @endphp
                                    <tr>
                                        <td class="image product-thumbnail"><img src="{{$product->link_image}}" alt="#"></td>
                                        <td>
                                            <h5><a href="shop-product-full.html">{{$product->title}}</a></h5> <span class="product-qty">x {{$product->pivot->quantity}}</span>
                                        </td>
                                        <td>${{$product->regular_price*$product->pivot->quantity}}</td>
                                    </tr>

                                    @endforeach
                                    <tr>
                                        <th>SubTotal</th>
                                        <td class="product-subtotal" colspan="2">${{$total}}</td>
                                    </tr>
                                    <tr>
                                        <th>Shipping</th>
                                        <td colspan="2"><em>Free Shipping</em></td>
                                    </tr>
                                    <tr>
                                        <th>Total</th>
                                        <td colspan="2" class="product-subtotal"><span class="font-xl text-brand fw-900">${{$total}}</span></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="bt-1 border-color-1 mt-30 mb-30"></div>
                            <div class="payment_method">
                                <div class="mb-25">
                                    <h5>Payment</h5>
                                </div>
                                <div class="payment_option">
                                    <div class="custome-radio">
                                        <input class="form-check-input"  type="radio" name="payment_option" id="exampleRadios5" checked="">
                                        <label class="form-check-label" for="exampleRadios5" data-bs-toggle="collapse" data-target="#paypal" aria-controls="paypal">YooKassa</label>
                                        <div class="form-group collapse in" id="paypal">
                                            <p class="text-muted mt-5">YooKassa</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-fill-out btn-block mt-30">Place Order</button>
                        </div>
                    </div>
                </div>
                </form>
            </div>
        </section>
    </main>


    @include('layouts.footer')


@endsection
