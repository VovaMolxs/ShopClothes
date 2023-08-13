@extends('layouts.layouts')
@section('content')
    @include('layouts.header')
<main class="main">
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                {{ Breadcrumbs::render() }}
            </div>
        </div>
    </div>
    <section class="mt-50 mb-50">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="table-responsive">
                        <table class="table shopping-summery text-center clean">
                            <thead>
                            <tr class="main-heading">
                                <th scope="col">Image</th>
                                <th scope="col">Name</th>
                                <th scope="col">Price</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Subtotal</th>
                                <th scope="col">Remove</th>
                            </tr>
                            </thead>
                            <tbody>

                            @if(count($products) !== 0)
                                @php
                                    $basketCost = 0;
                                @endphp
                            @foreach($products as $product)
                                @php
                                $itemCost = $product->regular_price * $product->pivot->quantity;
                                $basketCost = $basketCost + $itemCost;
                                @endphp
                            <tr class="tr_{{$product->id}}">
                                <td class="image"><img src="{{ asset('storage/') }}/{{$product->link_image}}" alt="#"></td>
                                <td class="product-des">
                                    <h5 class="product-name"><a href="shop-product-right.html">{{$product->title}}</a></h5>
                                    <p class="font-xs">{{$product->description}}</p>
                                </td>
                                <td class="price" data-title="Price"><span>${{$product->regular_price}}</span></td>
                                <td class="text-center" data-title="Stock">
                                    <div class="detail-qty border radius  m-auto" style="max-width: 150px;">

                                            <button id="quantity_minus"
                                                    data-product_id="{{$product->id}}"
                                                    data-token="{{csrf_token()}}"
                                                    data-quantity="{{$product->pivot->quantity}}"
                                                    data-cost="{{$product->regular_price}}"
                                                    class="minus minus_{{$product->id}} border-0 m-0 p-0 "><i class="fas fa-minus-square">---</i></button>

                                        <span  class="qty-val_{{$product->id}}">{{$product->pivot->quantity}}</span>

                                            <button id="quantity_plus"
                                                    data-product_id="{{$product->id}}"
                                                    data-token="{{csrf_token()}}"
                                                    data-quantity="{{$product->pivot->quantity}}"
                                                    data-cost="{{$product->regular_price}}"
                                                    class="plus plus_{{$product->id}} border-0 m-0 p-0 " ><i class="fas fa-plus-square">+++</i></button>



                                    </div>
                                </td>
                                <td class="text-right" data-title="Cart">
                                    <span class="product_cost_{{$product->id}}" >${{$itemCost}} </span>
                                </td>
                                <td class="action" data-title="Remove">
                                        <button class="border-0 remove remove_{{$product->id}}"
                                                data-product_id="{{$product->id}}"
                                                data-quantity="{{$product->pivot->quantity}}"
                                                data-cost="{{$product->regular_price}}"
                                                data-token="{{csrf_token()}}"
                                        ><i class="fi-rs-trash"></i></button>
                                </td>
                            </tr>
                            @endforeach

                            @else
                                <tr>
                                <p>Ваша корзина Пуста!</p>
                                </tr>
                            @endif
                            @if(count($products) !== 0)
                            <tr>
                                <form action="{{route('basket.clear')}}" method="post">
                                    @csrf
                                    <td colspan="6" class="text-end">
                                        <button class="border-0"><i class="fi-rs-cross-small"></i>Clear Cart</button>
                                    </td>
                                </form>

                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="cart-action text-end">
                        <a class="btn " href="{{ URL::previous() }}"><i class="fi-rs-shopping-bag mr-10"></i>Продолжить покупки</a>
                    </div>
                    <div class="divider center_icon mt-50 mb-50"><i class="fi-rs-fingerprint"></i></div>
                    <div class="row mb-50">
                        @if(isset(Auth::user()->name))
                            <div class="col-lg-6 col-md-12">
                            <div class="border p-md-4 p-30 border-radius cart-totals">
                                <div class="heading_s1 mb-3">
                                    <h4>Всего в корзине</h4>
                                </div>
                                <div class="table-responsive">
                                    <table class="table">
                                        <tbody>
                                        <tr>
                                            <td class="cart_total_label">Итого в корзине</td>
                                            <td class="cart_total_amount"><span id="basket_cost" data-basket_cost="{{$basketCost}}" class="font-lg fw-900 text-brand basket_cost">${{$basketCost}}</span></td>
                                        </tr>
                                        <tr>
                                            <td class="cart_total_label">Доставка</td>
                                            <td class="cart_total_amount"> <i class="ti-gift mr-5"></i> Бесплатная доставка</td>
                                        </tr>
                                        <tr>
                                            <td class="cart_total_label">Всего</td>
                                            <td class="cart_total_amount"><strong><span id="basket_cost"  data-basket_cost="{{$basketCost}}" class="font-xl fw-900 text-brand basket_cost">${{$basketCost}}</span></strong></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <a href="{{ route('checkout') }}" class="btn "> <i class="fi-rs-box-alt mr-10"></i>Перейти к оформлению заказа</a>
                            </div>
                        </div>
                        @else
                            <div class="col-lg-6 col-md-12">
                                <div class="border p-md-4 p-30 border-radius cart-totals">
                                    <div class="heading_s1 mb-3">
                                        <h4>Для того чтобы формить покупку, вам необходимо <a href="{{route('login')}}" >авторизироваться</a> или пройти
                                            <a href="{{route('register')}}">регистрацию</a>!</h4>
                                    </div>
                                </div>
                            </div>
                        @endif

                    </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
</main>
    @include('layouts.footer')


@endsection
