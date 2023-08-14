@extends('admin.layouts.app')
@section('content')

    <section class="content-main">
        <div class="content-header">
            <div>
                <h2 class="content-title card-title">Products List</h2>
                <p>Lorem ipsum dolor sit amet.</p>
            </div>
            <div>
                <a href="{{ route('products.create') }}" class="btn btn-primary btn-sm rounded">Create new</a>
            </div>
        </div>
        <div class="card mb-4">
            <header class="card-header">
                <div class="row align-items-center">
                    <div class="col col-check flex-grow-0">
                        <div class="form-check ms-2">
                            <input class="form-check-input" type="checkbox" value="">
                        </div>
                    </div>
                    <div class="col-md-3 col-12 me-auto mb-md-0 mb-3">
                        <select class="form-select">
                            <option selected>All category</option>
                            <option>Electronics</option>
                            <option>Clothes</option>
                            <option>Automobile</option>
                        </select>
                    </div>
                    <div class="col-md-2 col-6">
                        <input type="date" value="02.05.2021" class="form-control">
                    </div>
                    <div class="col-md-2 col-6">
                        <select class="form-select">
                            <option selected>Status</option>
                            <option>Active</option>
                            <option>Disabled</option>
                            <option>Show all</option>
                        </select>
                    </div>
                </div>
            </header> <!-- card-header end// -->
            <div class="card-body">

                @foreach($products as $product)
                <article class="itemlist">
                    <div class="row align-items-center">
                        <div class="col col-check flex-grow-0">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="">
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-4 col-8 flex-grow-1 col-name">
                            <a class="itemside" href="#">
                                <div class="left">
                                    <img src="{{$product->link_image}}" class="img-sm img-thumbnail" alt="Item">
                                </div>
                                <div class="info">
                                    <h6 class="mb-0">{{$product->title}}</h6>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-2 col-sm-2 col-4 col-price"> <span>${{ $product->regular_price }}</span> </div>
                        <div class="col-lg-2 col-sm-2 col-4 col-status">
                            @if($product->status == 'active')
                            <span class="badge rounded-pill alert-success">Active</span>
                            @elseif ($product->status == 'archive')
                                <span class="badge rounded-pill alert-warning">Archive</span>
                            @elseif ($product->status == 'disabled')
                                <span class="badge rounded-pill alert-danger">Disabled</span>
                            @endif
                        </div>
                        <div class="col-lg-1 col-sm-2 col-4 col-date">
                            <span>{{ $product->updated_at->format('d.m.Y') }}</span>
                        </div>
                        <div class="col-lg-2 col-sm-2 col-4 col-action text-end">
                            <a href="{{ route('products.edit', $product->id) }}" class="btn btn-sm font-sm rounded btn-success">
                                <i class="material-icons md-edit"></i> Edit
                            </a>
                            <a href="#" class="btn btn-sm font-sm btn-danger rounded">
                                <i class="material-icons md-delete_forever"></i> Delete
                            </a>
                        </div>
                    </div> <!-- row .// -->
                </article> <!-- itemlist  .// -->
                @endforeach

            </div> <!-- card-body end// -->
        </div> <!-- card end// -->
        {{ $products -> links() }}
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
