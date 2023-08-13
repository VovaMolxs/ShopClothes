@extends('admin.layouts.app')
@section('content')


    <section class="content-main">
        <div class="content-header">
            <h2 class="content-title">Transactions </h2>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-9">
                        <header class="border-bottom mb-4 pb-4">
                                з
                        </header> <!-- card-header end// -->
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th>Transaction ID</th>
                                    <th>Paid</th>
                                    <th>Status</th>
                                    <th>Date</th>
                                    <th class="text-end"> Action </th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($transactions as $transaction)
                                <tr>
                                    <td><b>#{{$transaction->id}}</b></td>
                                    <td>${{$transaction->amount}}</td>
                                    <td>
                                        <div class="icontext">
                                            <span class="text text-muted">{{$transaction->status}}</span>
                                        </div>
                                    </td>
                                    <td>{{$transaction->updated_at}}</td>
                                    <td class="text-end">
                                        <a href="#" class="btn btn-sm btn-light font-sm rounded">Details</a>
                                    </td>
                                </tr>
                                @endforeach

                                </tbody>
                            </table>
                        </div> <!-- table-responsive.// -->
                    </div> <!-- col end// -->
                    <aside class="col-lg-3">
                        <div class="box bg-light" style="min-height:80%">
                            <p class="text-center text-muted my-5">Please select transaction <br> to see details Еще не работает</p>
                        </div>
                    </aside> <!-- col end// -->
                </div> <!-- row end// -->
            </div> <!-- card-body // -->
        </div> <!-- card end// -->
        <div class="pagination-area mt-30 mb-50">
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
