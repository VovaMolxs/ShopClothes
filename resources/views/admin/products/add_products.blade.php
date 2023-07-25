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
        <form action="{{ route('products.store') }}" method="post"  enctype="multipart/form-data">
            @csrf
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
                                <input type="text" placeholder="Type here" class="form-control" id="product_name" name="title">
                            </div>
                            <div class="mb-4">
                                <label class="form-label">Full description</label>
                                <textarea placeholder="Type here" class="form-control" rows="4" name="description"></textarea>
                            </div>
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="mb-4">
                                        <label class="form-label">Regular price</label>
                                        <div class="row gx-2">
                                            <input placeholder="$" type="text" class="form-control" name="regular_price">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="mb-4">
                                        <label class="form-label">Promotional price</label>
                                        <input placeholder="$" type="text" class="form-control" name="promotional_price">
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
                                <input type="text" placeholder="%" class="form-control" id="product_name" name="tax_rate">
                            </div>
                        </form>
                    </div>
                </div> <!-- card end// -->
                <div class="card mb-4">
                    <div class="card-header">
                        <h4>Shipping</h4>
                    </div>
                    <div class="card-body">

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-4">
                                        <label for="product_name" class="form-label">Width</label>
                                        <input type="text" placeholder="inch" class="form-control" id="product_name" name="width">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-4">
                                        <label for="product_name" class="form-label">Height</label>
                                        <input type="text" placeholder="inch" class="form-control" id="product_name" name="height">
                                    </div>
                                </div>
                            </div>
                            <div class="mb-4">
                                <label for="product_name" class="form-label">Weight</label>
                                <input type="text" placeholder="gam" class="form-control" id="product_name" name="weight">
                            </div>
                            <div class="mb-4">
                                <label for="product_name" class="form-label">Shipping fees</label>
                                <input type="text" placeholder="$" class="form-control" id="product_name" name="shipping_fees">
                            </div>
                                <input type="hidden" value="active" name="status">

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
                            <img src="../../../js/assets/imgs/theme/upload.svg" alt="">
                            <input class="form-control" type="file" name="link_image">
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
                                        <option value="{{$categories->id}}"> {{$categories->name}} </option>
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
                                <input type="text" class="form-control" name="tags">
                            </div>
                        </div> <!-- row.// -->
                    </div>
                </div> <!-- card end// -->
            </div>
        </div>
        </form>
    </section> <!-- content-main end// -->
@endsection

