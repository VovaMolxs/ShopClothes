@extends('layouts.layouts')
@section('content')
    @include('layouts.header')
    <main class="main">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    {{ Breadcrumbs::render() }}
                </div>
            </div>
        </div>
        @include('main_index.main_promo')
        @include('main_index.section_feature')
        @include('main_index.section_products')
        @include('main_index.main_promo_2')
        <!-- @include('main_index.section_popular') -->
        <section class="section-padding">
            <div class="container pb-20">
                <h3 class="section-title mb-20 wow fadeIn animated"><span>Featured</span> Brands</h3>
                <div class="carausel-6-columns-cover position-relative wow fadeIn animated">
                    <div class="slider-arrow slider-arrow-2 carausel-6-columns-arrow"
                         id="carausel-6-columns-3-arrows"></div>
                    <div class="carausel-6-columns text-center" id="carausel-6-columns-3">
                        <div class="brand-logo">
                            <img class="img-grey-hover" src="assets/imgs/banner/brand-1.png" alt="">
                        </div>
                        <div class="brand-logo">
                            <img class="img-grey-hover" src="assets/imgs/banner/brand-2.png" alt="">
                        </div>
                        <div class="brand-logo">
                            <img class="img-grey-hover" src="assets/imgs/banner/brand-3.png" alt="">
                        </div>
                        <div class="brand-logo">
                            <img class="img-grey-hover" src="assets/imgs/banner/brand-4.png" alt="">
                        </div>
                        <div class="brand-logo">
                            <img class="img-grey-hover" src="assets/imgs/banner/brand-5.png" alt="">
                        </div>
                        <div class="brand-logo">
                            <img class="img-grey-hover" src="assets/imgs/banner/brand-6.png" alt="">
                        </div>
                        <div class="brand-logo">
                            <img class="img-grey-hover" src="assets/imgs/banner/brand-3.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="bg-grey-9 section-padding">
            <div class="container pt-15 pb-25">
                <div class="heading-tab d-flex">
                    <div class="heading-tab-left wow fadeIn animated">
                        <h3 class="section-title mb-20"><span>Monthly</span> Best Sell</h3>
                    </div>
                    <div class="heading-tab-right wow fadeIn animated">
                        <ul class="nav nav-tabs right no-border" id="myTab-1" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="nav-tab-one-1" data-bs-toggle="tab"
                                        data-bs-target="#tab-one-1" type="button" role="tab" aria-controls="tab-one"
                                        aria-selected="true">Featured
                                </button>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div class="tab-content wow fadeIn animated" id="myTabContent-1">
                            <div class="tab-pane fade show active" id="tab-one-1" role="tabpanel"
                                 aria-labelledby="tab-one-1">
                                <div class="carausel-4-columns-cover arrow-center position-relative">
                                    <div class="slider-arrow slider-arrow-2 carausel-4-columns-arrow"
                                         id="carausel-4-columns-arrows"></div>
                                    <div class="carausel-4-columns carausel-arrow-center" id="carausel-4-columns">
                                        @foreach($productsBest as $product)
                                        <div class="product-cart-wrap">
                                            <div class="product-img-action-wrap">
                                                <div class="product-img product-img-zoom">
                                                    <a href="{{ route('index.products.show', $product->id) }}">
                                                        <img class="default-img" src="{{$product->link_image}}"
                                                             alt="">
                                                        <img class="hover-img" src="{{$product->link_image}}"
                                                             alt="">
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="product-content-wrap">
                                                <div class="product-category">
                                                    <a href="#">{{$product->category->title}}</a>
                                                </div>
                                                <h2><a href="{{ route('index.products.show', $product->id) }}">{{ $product->title }}</a></h2>
                                                <div class="rating-result" title="90%">
                                                    <span>
                                                        <span>{{$product->rating * 10}}%</span>
                                                    </span>
                                                </div>
                                                <div class="product-price">
                                                    <span>$ {{ $product->promotional_price }}</span>
                                                    <span class="old-price">${{ $product->regular_price }}</span>
                                                </div>
                                                <div class="product-action-1 show">
                                                    <input type="hidden" id="token" value="{{csrf_token()}}">
                                                    <button id="add_product" data-id="{{$product->id}}" aria-label="В корзину"  class="action-btn hover-up"><i class="fi-rs-shopping-bag-add"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--End tab-content-->
                    </div>
                    <!--End Col-lg-9-->
                </div>
            </div>
        </section>
        @include('main_index.section_blog')
        @include('main_index.section_stat')
    </main>
@include('layouts.footer')
    <!-- Preloader Start -->
    <div id="preloader-active">
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="text-center">
                    <h5 class="mb-5">Идет загрузка</h5>
                    <div class="loader">
                        <div class="bar bar1"></div>
                        <div class="bar bar2"></div>
                        <div class="bar bar3"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection


