@extends('admin.layouts.app')
@section('content')

    <section class="content-main">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('products.update', $products->id) }}" method="post"  enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">

                <div class="col-9">
                    <div class="content-header">
                        <h2 class="content-title">Add New Product</h2>
                        <div>
                            <!-- <button class="btn btn-light rounded font-sm mr-5 text-body hover-up">Save to draft</button> -->
                            <button class="btn btn-md rounded font-sm hover-up">Publich</button>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card mb-4">
                        <div class="card-header">
                            <h4>Basic</h4>
                        </div>
                        <div class="card-body">
                            <form>
                                <div class="mb-4">
                                    <label for="product_name" class="form-label">Product title</label>
                                    <input type="text" value="{{$products->title}}" placeholder="Type here" class="form-control" id="product_name" name="title">
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Full description</label>
                                    <textarea placeholder="Type here" class="form-control" rows="4" name="description">{{$products->description}}</textarea>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="mb-4">
                                            <label class="form-label">Regular price</label>
                                            <div class="row gx-2">
                                                <input placeholder="$" value="{{$products->regular_price}}" type="text" class="form-control" name="regular_price">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="mb-4">
                                            <label class="form-label">Promotional price</label>
                                            <input placeholder="$" value="{{$products->promotional_price}}" type="text" class="form-control" name="promotional_price">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <label class="form-label">Currency</label>
                                        <select class="form-select" name="currency">
                                            <option value="usd"> USD </option>
                                            <option value="eur"> EUR </option>
                                            <option value="rubl"> RUBL </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Tax rate</label>
                                    <input type="text" value="{{$products->tax_rate}}" placeholder="%" class="form-control" id="product_name" name="tax_rate">
                                </div>
                            </form>
                        </div>
                    </div> <!-- card end// -->
                    <div class="card mb-4">
                        <div class="card-header">
                            <h4>Status</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <select class="form-select" name="status">
                                    <option value="active"> Active </option>
                                    <option value="disabled"> Disabled </option>
                                    <option value="archive"> Archive </option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="card mb-4">
                        <div class="card-header">
                            <h4>Shipping</h4>
                        </div>
                        <div class="card-body">

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-4">
                                        <label for="product_name" class="form-label">Width</label>
                                        <input type="text" value="{{$products->width}}" placeholder="inch" class="form-control" id="product_name" name="width">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-4">
                                        <label for="product_name" class="form-label">Height</label>
                                        <input type="text" value="{{$products->height}}" placeholder="inch" class="form-control" id="product_name" name="height">
                                    </div>
                                </div>
                            </div>
                            <div class="mb-4">
                                <label for="product_name" class="form-label">Weight</label>
                                <input type="text" value="{{$products->weight}}" placeholder="gam" class="form-control" id="product_name" name="weight">
                            </div>
                            <div class="mb-4">
                                <label for="product_name" class="form-label">Shipping fees</label>
                                <input type="text" value="{{$products->shipping_fees}}" placeholder="$" class="form-control" id="product_name" name="shipping_fees">
                            </div>



                        </div>
                    </div> <!-- card end// -->
                </div>
                <div class="col-lg-3">
                    <div class="card mb-4">
                        <div class="card-header">
                            <h4>Media</h4>
                        </div>
                        <div class="card-body">
                            <div class="input-upload">
                                <img src="{{$products->link_image}}" alt="">
                                <input class="form-control" type="file" name="link_image">
                                <input type="hidden" value="{{$products->link_image}}" name="older_link_image">
                            </div>
                        </div>
                    </div> <!-- card end// -->
                    <div class="card mb-4">
                        <div class="card-header">
                            <h4>Organization</h4>
                        </div>
                        <div class="card-body">
                            <div class="row gx-2">
                                <div class="col-sm-12 mb-3">
                                    <label class="form-label">Category</label>
                                    <select class="form-select" name="category_id">
                                        @foreach($categories as $categories)
                                            <option value="{{$categories->id}}"> {{$categories->title}} </option>
                                        @endforeach
                                    </select>
                                </div>
                                <!-- <div class="col-sm-6 mb-3">
                                    <label class="form-label">Sub-category</label>
                                    <select class="form-select">
                                        <option> Nissan </option>
                                        <option> Honda </option>
                                        <option> Mercedes </option>
                                        <option> Chevrolet </option>
                                    </select>
                                </div> -->
                                <div class="mb-4">
                                    <label for="product_name" class="form-label">Tags</label>
                                    <input type="text" value="{{$products->tags}}" class="form-control" name="tags">
                                </div>
                            </div> <!-- row.// -->
                        </div>
                    </div> <!-- card end// -->
                </div>
            </div>
        </form>
    </section> <!-- content-main end// -->
@endsection

