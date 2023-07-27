@extends('admin.layouts.app')
@section('content')

    <section class="content-main">
        <div class="content-header">
            <div>
                <h2 class="content-title card-title">Категории</h2>
                <p>Добавление и удаление категорий</p>
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
                            <input type="hidden" value="{{$id}}" name="parent_id">
                            <div class="mb-4">
                                <label for="product_name" class="form-label">Имя категории</label>
                                <input type="text" placeholder="Type here" class="form-control" id="product_name" name="title"/>
                            </div>
                            <div class="mb-4">
                                <label for="product_slug" class="form-label">Категория</label>
                                <input type="text" placeholder="Type here" class="form-control" id="product_slug" name="slug"/>
                            </div>
                            <div class="mb-4">
                                <label class="form-label">desc-Описание</label>
                                <textarea placeholder="Type here" class="form-control" name="desc_title"></textarea>
                            </div>
                            <div class="mb-4">
                                <label for="product_name" class="form-label">H1 заголовок</label>
                                <input type="text" placeholder="Type here" class="form-control" id="h1_title" name="h1_title"/>
                            </div>
                            <div class="d-grid">
                                <button class="btn btn-primary">Создать категорию</button>
                            </div>

                        </form>
                    </div>
                    <div class="col-md-9">
                        <div class="">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th class="text-center">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" />
                                        </div>
                                    </th>
                                    <th>ID</th>
                                    <th>Имя</th>
                                    <th>Родитель</th>
                                    <th>Сортировка</th>
                                    <th>Раздел</th>
                                    <th>h1-title</th>
                                    <th>desc-title</th>
                                    <th class="text-end">Действие</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($categories as $cat)
                                    <tr>
                                        <td class="text-center">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" />
                                            </div>
                                        </td>
                                        <td>{{$cat->id}}</td>
                                        <td><b><a href="{{$cat->getUrl()}}" >{{$cat->title}}</a></b></td>
                                        <td>{{$cat->parent->title}}</td>
                                        <td>{{$cat->order}}</td>
                                        <td>{{$cat->slug}}</td>
                                        <td>{{$cat->h1_title}}</td>
                                        <td>{{$cat->desc_title}}</td>
                                        <td class="text-end">
                                            <div class="dropdown">
                                                <a href="#" data-bs-toggle="dropdown" class="btn btn-light rounded btn-sm font-sm"> <i class="material-icons md-more_horiz"></i> </a>
                                                <div class="dropdown-menu">

                                                    <form action="{{ route('categories.destroy', $cat->id) }}" method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="dropdown-item text-danger">Удалить</button>
                                                    </form>
                                                </div>
                                            </div>
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
