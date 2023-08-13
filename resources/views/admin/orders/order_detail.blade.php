@extends('admin.layouts.app')
@section('content')


    <section class="content-main">
        <div class="content-header">
            <div>
                <h2 class="content-title card-title">Order detail</h2>
                <p>Details for Order ID: {{$order->id}}</p>
            </div>
        </div>
        <div class="card">
            <header class="card-header">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-6 mb-lg-0 mb-15">
                            <span>
                                <i class="material-icons md-calendar_today"></i> <b>{{ $order->created_at }}</b>
                            </span> <br>
                        <small class="text-muted">Order ID: {{$order->id}}</small>
                    </div>
                    <div class="col-lg-6 col-md-6 ms-auto text-md-end">
                        <form action="{{route('orders.update', $order->id)}}" method="post">
                            @method('PATCH')
                            @csrf

                            <select class="form-select d-inline-block mb-lg-0 mb-15 mw-200" name="status">
                                <option selected>Изменить статус</option>
                                <option value="payment">Ожидает оплаты</option>
                                <option value="CONFIRMED">Подтверждена оплата</option>
                                <option value="sending">Отправлено</option>
                                <option value="canceling">Отменен</option>
                                <option value="delivered">Доставлено</option>
                            </select>
                            <button class="btn btn-primary" href="">Сохранить</button>
                        </form>

                    </div>
                </div>
            </header> <!-- card-header end// -->
            <div class="card-body">
                <div class="row mb-50 mt-20 order-info-wrap">
                    <div class="col-md-4">
                        <article class="icontext align-items-start">
                                <span class="icon icon-sm rounded-circle bg-primary-light">
                                    <i class="text-primary material-icons md-person"></i>
                                </span>
                            <div class="text">
                                <h6 class="mb-1">Customer</h6>
                                <p class="mb-1">
                                    {{$order->first_name }} {{$order->last_name}} <br> {{$order->email}}
                                <br> {{$order->phone}}
                                </p>
                            </div>
                        </article>
                    </div> <!-- col// -->
                    <div class="col-md-4">
                        <article class="icontext align-items-start">
                                <span class="icon icon-sm rounded-circle bg-primary-light">
                                    <i class="text-primary material-icons md-local_shipping"></i>
                                </span>
                            <div class="text">
                                <h6 class="mb-1">Order info</h6>
                                <p class="mb-1">
                                    Shipping: Fargo express <br> Pay method: card <br> Status:
                                    @if($order->status == 'pending')
                                        Ожидает оплаты
                                    @elseif($order->status == 'canceled')
                                        Отменен
                                    @elseif($order->status == 'received')
                                        Оплачен
                                    @elseif($order->status == 'delivered')
                                        Доставлен
                                    @else
                                        Отправлен
                                    @endif
                                </p>
                            </div>
                        </article>
                    </div> <!-- col// -->
                    <div class="col-md-4">
                        <article class="icontext align-items-start">
                                <span class="icon icon-sm rounded-circle bg-primary-light">
                                    <i class="text-primary material-icons md-place"></i>
                                </span>
                            <div class="text">
                                <h6 class="mb-1">Deliver to</h6>
                                <p class="mb-1">
                                    City: {{$order->city}}, {{$order->state}} <br>{{$order->billing_address}} {{$order->billing_address2}} <br> Index
                                    {{$order->zipcode}}
                                </p>

                            </div>
                        </article>
                    </div> <!-- col// -->
                </div> <!-- row // -->
                <div class="row">
                    <div class="col-lg-7">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th width="40%">Product</th>
                                    <th width="20%">Unit Price</th>
                                    <th width="20%">Quantity</th>
                                    <th width="20%" class="text-end">Total</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($orderItems as $orderItem)
                                <tr>
                                    <td>
                                        <a class="itemside" href="#">

                                            <div class="info"> {{$orderItem->name}} </div>
                                        </a>
                                    </td>
                                    <td> ${{$orderItem->price}} </td>
                                    <td> {{$orderItem->quantity}} </td>
                                    <td class="text-end"> ${{$orderItem->cost}} </td>
                                </tr>

                                @endforeach
                                <tr>
                                    <td colspan="4">
                                        <article class="float-end">
                                            <dl class="dlist">
                                                <dt>Subtotal:</dt>
                                                <dd>${{$order->amount}}</dd>
                                            </dl>

                                            <dl class="dlist">
                                                <dt>Grand total:</dt>
                                                <dd> <b class="h5">${{$order->amount}}</b> </dd>
                                            </dl>
                                            <dl class="dlist">
                                                <dt class="text-muted">Status:</dt>
                                                <dd>
                                                    @if($order->status == 'pending')
                                                        <span class="badge rounded-pill alert-success text-success">Ожидает оплаты</span>
                                                    @elseif($order->status == 'canceled')
                                                        <span class="badge rounded-pill alert-success text-success"> Отменен</span>
                                                    @elseif($order->status == 'received')
                                                        <span class="badge rounded-pill alert-success text-success">Оплачен</span>
                                                    @elseif($order->status == 'delivered')
                                                        <span class="badge rounded-pill alert-success text-success">Доставлен</span>
                                                    @else
                                                        <span class="badge rounded-pill alert-success text-success">Отправлен</span>
                                                    @endif

                                                </dd>
                                            </dl>
                                        </article>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div> <!-- table-responsive// -->
                    </div> <!-- col// -->
                    <div class="col-lg-1"></div>
                    <div class="col-lg-4">
                        <div class="box shadow-sm bg-light">
                            <h6 class="mb-15">Payment info</h6>

                            @if($order->status == 'received')
                                Заказ ожидает оплаты!
                            @elseif($order->status == 'canceled')
                                Заказ был отменен!
                            @else
                                <p>
                                    <img src="assets/imgs/card-brands/2.png" class="border" height="20"> Master Card **** **** 4768 <br>
                                    Business name: Grand Market LLC <br>
                                    Phone: +1 (800) 555-154-52
                                </p>
                            @endif

                        </div>
                        <div class="h-25 pt-4">
                            <div class="mb-3">
                                <label>Notes</label>
                                <textarea class="form-control" name="notes" id="notes" placeholder="Type some note"></textarea>
                            </div>
                            <button class="btn btn-primary">Save note</button>
                        </div>
                    </div> <!-- col// -->
                </div>
            </div> <!-- card-body end// -->
        </div> <!-- card end// -->
    </section> <!-- content-main end// -->
    <footer class="main-footer font-xs">
        <div class="row pb-30 pt-15">
            <div class="col-sm-6">
                <script>
                    document.write(new Date().getFullYear())
                </script> ©, Evara - HTML Ecommerce Template .
            </div>
            <div class="col-sm-6">
                <div class="text-sm-end">
                    All rights reserved
                </div>
            </div>
        </div>
    </footer>

@endsection
