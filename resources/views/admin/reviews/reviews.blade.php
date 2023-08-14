@extends('admin.layouts.app')
@section('content')

    <section class="content-main">
        <div class="content-header">
            <div>
                <h2 class="content-title card-title">Reviews</h2>
                <p>Lorem ipsum dolor sit amet.</p>
            </div>
            <div>
                <input type="text" placeholder="Search by name" class="form-control bg-white">
            </div>
        </div>
        <div class="card mb-4">
            <header class="card-header">
                <div class="row gx-3">


                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif
                </div>
            </header>
            <!-- card-header end// -->
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" />
                                </div>
                            </th>
                            <th>#ID</th>
                            <th>Product</th>
                            <th>Name</th>
                            <th>Rating</th>
                            <th>Date</th>
                            <th>Text comment</th>
                            <th class="text-end">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($reviews as $review)
                        <tr>
                            <td>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" />
                                </div>
                            </td>
                            <td>{{$review->id}}</td>
                            <td><b>{{$review->title}}</b></td>
                            <td>{{ $review->name }}</td>
                            <td>
                                <ul class="rating-stars">
                                    <li style="width: {{$review->mark}}0%;" class="stars-active">
                                        <img src="{{url('../assets/imgs/icons/stars-active.svg')}} " alt="stars" />
                                    </li>
                                    <li>
                                        <img src="{{url('../assets/imgs/icons/starts-disable.svg')}}" alt="stars" />
                                    </li>
                                </ul>
                            </td>
                            <td>{{$review->updated_at}}</td>
                            <td>{{$review->text}}</td>
                            <td class="text-end">
                                <a href="{{route('index.products.show', $review->product_id)}}" class="btn btn-md rounded font-sm">Detail</a>
                                <div class="dropdown">
                                    <a href="#" data-bs-toggle="dropdown" class="btn btn-light rounded btn-sm font-sm"> <i class="material-icons md-more_horiz"></i> </a>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item text-danger" href="{{route('reviews.destroy', $review->id)}}">Delete</a>
                                    </div>
                                </div> <!-- dropdown //end -->
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {{$reviews->links()}}
                </div> <!-- table-responsive//end -->
            </div>
            <!-- card-body end// -->
        </div>
        <div class="pagination-area mt-30 mb-50">

        </div>
    </section> <!-- content-main end// -->


@endsection
