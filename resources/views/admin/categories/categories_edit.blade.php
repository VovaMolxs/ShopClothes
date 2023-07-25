@extends('admin.layouts.app')
@section('content')


    <section class="content-main">
        <div class="content-header">
            <div>
                <h2 class="content-title card-title">Categories </h2>
                <p>Add, edit or delete a category</p>
            </div>
            <div>
                <input type="text" placeholder="Search Categories" class="form-control bg-white">
            </div>
            @if($errors->count())
                <div class="alert alert-danger mt-4">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif
        </div>
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-3">

                        <form action="{{ route('categories.update', $categories->id) }}" method="post">
                            @csrf
                            @method('PATCH')

                            <div class="mb-4">
                                <label for="product_name" class="form-label">Name</label>
                                <input type="text" value="{{$categories->name}}" placeholder="Type here" class="form-control" id="product_name" name="name"/>
                            </div>
                            <div class="mb-4">
                                <label for="product_slug" class="form-label">Slug</label>
                                <input type="text" value="{{$categories->slug}}" placeholder="Type here" class="form-control" id="product_slug" name="slug"/>
                            </div>
                            <!-- <div class="mb-4">
                                <label class="form-label">Parent</label>
                                <select class="form-select">
                                    <option>Clothes</option>
                                    <option>T-Shirts</option>
                                </select>
                            </div> -->
                            <div class="mb-4">
                                <label class="form-label">Description</label>
                                <textarea placeholder="Type here" class="form-control" name="description">{{$categories->description}}</textarea>
                            </div>

                            <div class="d-grid">
                                <button class="btn btn-primary">Edit category</button>
                            </div>

                        </form>
                    </div>
                    <div class="col-md-9">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                <tr>

                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Slug</th>
                                    <th>Order</th>

                                </tr>
                                </thead>
                                <tbody>

                                    <tr>
                                        <td>{{$categories->id}}</td>
                                        <td><b>{{$categories->name}}</b></td>
                                        <td>{{$categories->description}}</td>
                                        <td>{{$categories->slug}}</td>
                                        <td>1</td>
                                    </tr>

                                    </td>
                                    </tr>
                                </tbody>
                            </table>

                            <hr>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <strong>Reviews:</strong>
                                @foreach($comments as $comment)
                                    <div class="form-group" id="comments">
                                        <p>Mark   :{{ $comment['mark'] }}</p>
                                        <p>Comment:{{ $comment['text'] }}</p>
                                    </div>
                                @endforeach
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Mark:</strong>
                                    <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                                    <input type="hidden" name="categories_id" id="categories_id" value="{{ $categories->id }}">
                                    <input type="text" id="review_mark" name="mark">
                                    <strong>Text:</strong>
                                    <input type="text" id="review_text" name="text">
                                    <button id="send_review">Add a review</button>
                                </div>
                                <div id="comments"></div>
                            </div>
                        </div>
                    </div> <!-- .col// -->
                </div> <!-- .row // -->
            </div> <!-- card body .// -->
        </div> <!-- card .// -->
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
