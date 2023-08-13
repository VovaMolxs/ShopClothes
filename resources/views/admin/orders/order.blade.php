@extends('admin.layouts.app')
@section('content')


    <section class="content-main">
        <div class="content-header">
            <div>
                <h2 class="content-title card-title">Order List </h2>
                <p>Lorem ipsum dolor sit amet.</p>
            </div>
            <div>
                <input type="text" placeholder="Search order ID" class="form-control bg-white">
            </div>
        </div>
        <div class="card mb-4">

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>#ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Total</th>
                            <th scope="col">Status</th>
                            <th scope="col">Date</th>
                            <th scope="col" class="text-end"> Action </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($orders as $order)
                        <tr>
                            <td>{{$order->id}}</td>
                            <td><b>{{$order->first_name}} {{$order->last_name}}</b></td>
                            <td>{{$order->email}}</td>
                            <td>${{$order->amount}}</td>
                            <td>
                                @if($order->status == 'CONFIRMED')
                                    <span class="badge rounded-pill alert-success">Оплачен</span>
                                @elseif($order->status == 'FAILED')
                                    <span class="badge rounded-pill alert-danger">Оплата не прошла</span>
                                @elseif($order->status == 'payment')
                                    <span class="badge rounded-pill alert-warning">Ожидает оплаты</span>
                                @elseif($order->status == 'delivered')
                                    <span class="badge rounded-pill alert-primary">Доставлен</span>
                                @elseif(($order->status == 'sending'))
                                    <span class="badge rounded-pill alert-info">Отправлен</span>
                                @else
                                    <span class="badge rounded-pill alert-danger">Отменен</span>
                                @endif
                            </td>
                            <td>{{$order->created_at}}</td>
                            <td class="text-end">
                                <a href="{{ route('orders.show', $order->id) }}" class="btn btn-md rounded font-sm">Detail</a>
                                <div class="dropdown">
                                    <a href="" data-bs-toggle="dropdown" class="btn btn-light rounded btn-sm font-sm"> <i class="material-icons md-more_horiz"></i> </a>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="{{ route('orders.edit', $order->id) }}">Edit</a>
                                        <a class="dropdown-item text-danger" href="{{ route('orders.destroy', $order->id) }}">Delete</a>
                                    </div>
                                </div> <!-- dropdown //end -->
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div> <!-- table-responsive //end -->
            </div> <!-- card-body end// -->
        </div> <!-- card end// -->
        <div class="pagination-area mt-15 mb-50">
            <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-start">
                    <li class="page-item active"><a class="page-link" href="#">01</a></li>
                    <li class="page-item"><a class="page-link" href="#">02</a></li>
                    <li class="page-item"><a class="page-link" href="#">03</a></li>
                    <li class="page-item"><a class="page-link dot" href="#">...</a></li>
                    <li class="page-item"><a class="page-link" href="#">16</a></li>
                    <li class="page-item"><a class="page-link" href="#"><i class="material-icons md-chevron_right"></i></a></li>
                </ul>
            </nav>
        </div>
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
