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
                        <form action="{{ url('admin/categories') }}" method="post">
                            @csrf
                            <div class="mb-4">
                                <label for="product_name" class="form-label">Name</label>
                                <input type="text" placeholder="Type here" class="form-control" id="product_name" name="name"/>
                            </div>
                            <div class="mb-4">
                                <label for="product_slug" class="form-label">Slug</label>
                                <input type="text" placeholder="Type here" class="form-control" id="product_slug" name="slug"/>
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
                                <textarea placeholder="Type here" class="form-control" name="description"></textarea>
                            </div>

                            <div class="d-grid">
                                <button class="btn btn-primary">Create category</button>
                            </div>

                        </form>
                    </div>
                    <div class="col-md-9">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th class="text-center">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" />
                                        </div>
                                    </th>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Slug</th>
                                    <th>Order</th>
                                    <th class="text-end">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($categories as $categories)
                                <tr>
                                    <td class="text-center">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" />
                                        </div>
                                    </td>
                                    <td>{{$categories->id}}</td>
                                    <td><b>{{$categories->name}}</b></td>
                                    <td>{{$categories->description}}</td>
                                    <td>{{$categories->slug}}</td>
                                    <td>1</td>
                                    <td class="text-end">
                                        <div class="dropdown">
                                            <a href="#" data-bs-toggle="dropdown" class="btn btn-light rounded btn-sm font-sm"> <i class="material-icons md-more_horiz"></i> </a>
                                            <div class="dropdown-menu">

                                                <form action="{{ route('categories.destroy', $categories->id) }}" method="post">
                                                    <a class="dropdown-item" href="{{ route('categories.edit', $categories->id) }}">Edit</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="dropdown-item text-danger">DELETE</button>

                                                </form>

                                                  <!-- <a class="dropdown-item text-danger" href="{{-- action('CategoriesController@destroyMe', ['id' => $categories->id]) --}}" >DELETE</a> -->



                                            </div>
                                        </div> <!-- dropdown //end -->
                                    </td>
                                </tr>
                                @endforeach
                                    </td>
                                </tr>
                                </tbody>
                            </table>
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
