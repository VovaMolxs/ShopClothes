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

                        <div class="col-md-12">
                            <div class="order_review">
                                <div class="mb-20">
                                    <h4>Your Orders</h4>
                                </div>
                                <div class="table-responsive order_table text-center">
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th>№</th>
                                            <th>Наименование</th>
                                            <th>Цена</th>
                                            <th>Кол-во</th>
                                            <th>Стоимость</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($orderItems as $item)

                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $item->name }}</td>
                                                <td>{{ number_format($item->price, 2, '.', '') }}</td>
                                                <td>{{ $item->quantity }}</td>
                                                <td>{{ number_format($item->cost, 2, '.', '') }}</td>
                                            </tr>
                                        @endforeach
                                            <tr>
                                                <th colspan="4" class="text-right">Итого</th>
                                                <th>{{ number_format($order->amount, 2, '.', '') }}</th>
                                            </tr>



                                        </tbody>
                                    </table>

                                    </table>

                                    <h2>Ваши данные</h2>
                                    <p>Имя, фамилия: {{ $order->first_name }} {{$order->last_name}}</p>
                                    <p>Адрес почты: <a href="mailto:{{ $order->email }}">{{ $order->email }}</a></p>
                                    <p>Номер телефона: {{ $order->phone }}</p>
                                    <p>Адрес доставки: {{ $order->billing_address }} {{$order->billing_address2}}</p>
                                    @isset ($order->comment)
                                        <p>Комментарий: {{ $order->comment }}</p>
                                    @endisset
                                </div>



                            </div>
                        </div>
                    </div>

            </div>
        </section>
    </main>


    @include('layouts.footer')


@endsection
