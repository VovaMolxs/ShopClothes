@extends('layouts.layouts')
@section('content')
    @include('layouts.header')
    <!-- Quick view -->

    <main class="main">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">

                </div>
            </div>
        </div>
        <section class="mt-50 mb-50">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="product-detail accordion-detail">
                            <div class="row mb-50">
                                <div class="col-md-6 col-sm-12 col-xs-12">
                                    <div class="detail-gallery">
                                        <span class="zoom-icon"><i class="fi-rs-search"></i></span>
                                        <!-- MAIN SLIDES -->
                                        <div class="product-image-slider">
                                            <figure class="border-radius-10">
                                                <img src="{{$products->link_image}}"
                                                     alt="product image">
                                            </figure>
                                            <figure class="border-radius-10">
                                                <img src="{{$products->link_image}}"
                                                     alt="product image">
                                            </figure>
                                            <figure class="border-radius-10">
                                                <img src="{{$products->link_image}}"
                                                     alt="product image">
                                            </figure>
                                            <figure class="border-radius-10">
                                                <img src="{{$products->link_image}}"
                                                     alt="product image">
                                            </figure>
                                            <figure class="border-radius-10">
                                                <img src="{{$products->link_image}}"
                                                     alt="product image">
                                            </figure>

                                        </div>
                                        <!-- THUMBNAILS -->
                                        <div class="slider-nav-thumbnails pl-15 pr-15">
                                            <div><img src="{{$products->link_image}}"
                                                      alt="product image"></div>
                                            <div><img src="{{$products->link_image}}"
                                                      alt="product image"></div>
                                            <div><img src="{{$products->link_image}}"
                                                      alt="product image"></div>
                                            <div><img src="{{$products->link_image}}"
                                                      alt="product image"></div>
                                            <div><img src="{{$products->link_image}}"
                                                      alt="product image"></div>

                                        </div>
                                    </div>
                                    <!-- End Gallery -->
                                </div>
                                <div class="col-md-6 col-sm-12 col-xs-12">
                                    <div class="detail-info">
                                        <h2 class="title-detail">{{$products->title}}</h2>
                                        <div class="product-detail-rating">
                                            <div class="pro-details-brand">

                                            </div>
                                            <div class="product-rate-cover text-end">
                                                <div class="product-rate d-inline-block">
                                                    <div class="product-rating" style="width:{{$products->rating}}0%">
                                                    </div>
                                                </div>
                                                <span class="font-small ml-5 text-muted">{{$products->count_reviews}} Reviews</span>
                                            </div>
                                        </div>
                                        <div class="clearfix product-price-cover">
                                            <div class="product-price primary-color float-left">
                                                <ins><span class="text-brand">${{$products->promotional_price}}</span>
                                                </ins>
                                                <ins><span
                                                        class="old-price font-md ml-15">${{$products->regular_price}}</span>
                                                </ins>
                                                <span class="save-price  font-md color3 ml-15">{{$products->tax_rate}}% Off</span>
                                            </div>
                                        </div>
                                        <div class="bt-1 border-color-1 mt-15 mb-15"></div>
                                        <div class="short-desc mb-30">
                                            <p>{{$products->description}}</p>
                                        </div>
                                        <div class="product_sort_info font-xs mb-30">
                                            <ul>
                                                <li class="mb-10"><i class="fi-rs-crown mr-5"></i> 1 Year AL Jazeera
                                                    Brand Warranty
                                                </li>
                                                <li class="mb-10"><i class="fi-rs-refresh mr-5"></i> 30 Day Return
                                                    Policy
                                                </li>
                                                <li><i class="fi-rs-credit-card mr-5"></i> Cash on Delivery available
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="attr-detail attr-color mb-15">
                                            <strong class="mr-10">Color</strong>
                                            <ul class="list-filter color-filter">
                                                <li><a href="#" data-color="Red"><span class="product-color-red"></span></a>
                                                </li>
                                                <li><a href="#" data-color="Yellow"><span
                                                            class="product-color-yellow"></span></a></li>
                                                <li class="active"><a href="#" data-color="White"><span
                                                            class="product-color-white"></span></a></li>
                                                <li><a href="#" data-color="Orange"><span
                                                            class="product-color-orange"></span></a></li>
                                                <li><a href="#" data-color="Cyan"><span
                                                            class="product-color-cyan"></span></a></li>
                                                <li><a href="#" data-color="Green"><span
                                                            class="product-color-green"></span></a></li>
                                                <li><a href="#" data-color="Purple"><span
                                                            class="product-color-purple"></span></a></li>
                                            </ul>
                                        </div>
                                        <div class="attr-detail attr-size">
                                            <strong class="mr-10">Size</strong>
                                            <ul class="list-filter size-filter font-small">
                                                <li><a href="#">S</a></li>
                                                <li class="active"><a href="#">M</a></li>
                                                <li><a href="#">L</a></li>
                                                <li><a href="#">XL</a></li>
                                                <li><a href="#">XXL</a></li>
                                            </ul>
                                        </div>
                                        <div class="bt-1 border-color-1 mt-30 mb-30"></div>
                                        <div class="detail-extralink">

                                            <div class="product-extra-link2">
                                                <input type="hidden" id="token" value="{{csrf_token()}}">
                                                <button id="add_product" data-id="{{$products->id}}" type="submit" class="button button-add-to-cart">Add to cart
                                                </button>
                                            </div>
                                        </div>
                                        <ul class="product-meta font-xs color-grey mt-50">
                                            <li class="mb-5">SKU: <a href="#">FWM15VKT</a></li>
                                            <li class="mb-5">Tags: {{$products->tags}} </li>
                                            <li>Availability:<span
                                                    class="in-stock text-success ml-5">8 Items In Stock</span></li>
                                        </ul>
                                    </div>
                                    <!-- Detail Info -->
                                </div>
                            </div>

                            <!--Comments-->
                            <div class="comments-area style-2">
                                <div class="row">
                                    <div class="col-lg-8">
                                        <h4 class="mb-30">Customer questions & answers</h4>
                                        <div class="comment-list" id="comment-list">
                                            @foreach($comments as $comments)
                                                <div class="single-comment justify-content-between d-flex"
                                                     id="comments">
                                                    <div class="user justify-content-between d-flex">
                                                        <div class="thumb text-center">
                                                            <!-- <img src="{{ asset('/storage') }}/assets/imgs/page/avatar-6.jpg" alt=""> -->
                                                            <h6><a id="user_name" href="#">{{$comments->name}}</a></h6>
                                                        </div>
                                                        <div class="desc">
                                                            <div class="product-rate d-inline-block">
                                                                <div class="product-rating"
                                                                     style="width:{{$comments->mark}}0%">
                                                                </div>
                                                            </div>
                                                            <p>{{$comments->text}}</p>
                                                            <div class="d-flex justify-content-between">
                                                                <div class="d-flex align-items-center">
                                                                    <p class="font-xs mr-30">{{$comments->updated_at}} </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>


                                    <div class="col-xs-12 col-sm-12 col-md-12">


                                    </div>
                                </div>
                                @if (Auth::user() !== null)
                                    @if(isset(Auth::user()->name) && (!isset($comments->id)))
                                        <!--comment form-->
                                        <div class="comment-form">
                                            <h4 class="mb-15">Add a review</h4>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-8 col-md-12">
                                                <form action="{{route('addComment', $products->id)}}" method="post">

                                                    <input type="hidden" name="_token" id="token"
                                                           value="{{ csrf_token() }}">
                                                    <input type="hidden" name="product_id" id="product_id"
                                                           value="{{ $products->id }}">
                                                    <input type="hidden" name="user_id" id="user_id"
                                                           value="{{ Auth::user()->id}}">
                                                    <select class="form-select" name="mark" id="review_mark"
                                                            aria-label="Default select example">
                                                        <option value="0">0</option>
                                                        <option value="1">0.5</option>
                                                        <option value="2">1</option>
                                                        <option value="3">1.5</option>
                                                        <option value="4">2</option>
                                                        <option value="5">2.5</option>
                                                        <option value="6">3</option>
                                                        <option value="7">3.5</option>
                                                        <option value="8">4</option>
                                                        <option value="9">4.5</option>
                                                        <option value="10">5</option>
                                                    </select>

                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <textarea class="form-control w-100" name="text"
                                                                          id="review_text" cols="30" rows="9"
                                                                          placeholder="Write Comment"></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <button type="submit" id="send_review"
                                                                class="button button-contactForm">Submit
                                                            Review
                                                        </button>
                                                    </div>
                                                </form>

                                            </div>
                                        </div>
                            </div>
                            @elseif (Auth::user()->id !== $comments->user_id)
                                <!--comment form-->
                                <div class="comment-form">
                                    <h4 class="mb-15">Add a review</h4>
                                </div>
                                <div class="row">
                                    <div class="col-lg-8 col-md-12">
                                        <form action="{{route('addComment', $products->id)}}" method="post">

                                            <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                                            <input type="hidden" name="product_id" id="product_id"
                                                   value="{{ $products->id }}">
                                            <input type="hidden" name="user_id" id="user_id"
                                                   value="{{ Auth::user()->id}}">
                                            <select class="form-select" name="mark" id="review_mark"
                                                    aria-label="Default select example">
                                                <option value="0">0</option>
                                                <option value="1">0.5</option>
                                                <option value="2">1</option>
                                                <option value="3">1.5</option>
                                                <option value="4">2</option>
                                                <option value="5">2.5</option>
                                                <option value="6">3</option>
                                                <option value="7">3.5</option>
                                                <option value="8">4</option>
                                                <option value="9">4.5</option>
                                                <option value="10">5</option>
                                            </select>

                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <textarea class="form-control w-100" name="text"
                                                                  id="review_text" cols="30" rows="9"
                                                                  placeholder="Write Comment"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <button type="submit" id="send_review"
                                                        class="button button-contactForm">Submit
                                                    Review
                                                </button>
                                            </div>
                                        </form>

                                    </div>
                                </div>
                        </div>


                        @endif
                        @endif
                    </div>
                </div>


            </div>
            </div>
            </div>
            </div>
        </section>
    </main>
    <footer class="main">
        <section class="newsletter p-30 text-white wow fadeIn animated">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-7 mb-md-3 mb-lg-0">
                        <div class="row align-items-center">
                            <div class="col flex-horizontal-center">
                                <img class="icon-email" src="assets/imgs/theme/icons/icon-email.svg" alt="">
                                <h4 class="font-size-20 mb-0 ml-3">Sign up to Newsletter</h4>
                            </div>
                            <div class="col my-4 my-md-0 des">
                                <h5 class="font-size-15 ml-4 mb-0">...and receive <strong>$25 coupon for first
                                        shopping.</strong></h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <!-- Subscribe Form -->
                        <form class="form-subcriber d-flex wow fadeIn animated">
                            <input type="email" class="form-control bg-white font-small" placeholder="Enter your email">
                            <button class="btn bg-dark text-white" type="submit">Subscribe</button>
                        </form>
                        <!-- End Subscribe Form -->
                    </div>
                </div>
            </div>
        </section>
        <section class="section-padding footer-mid">
            <div class="container pt-15 pb-20">
                <div class="row">
                    <div class="col-lg-4 col-md-6">
                        <div class="widget-about font-md mb-md-5 mb-lg-0">
                            <div class="logo logo-width-1 wow fadeIn animated">
                                <a href="index.html"><img src="assets/imgs/theme/logo.svg" alt="logo"></a>
                            </div>
                            <h5 class="mt-20 mb-10 fw-600 text-grey-4 wow fadeIn animated">Contact</h5>
                            <p class="wow fadeIn animated">
                                <strong>Address: </strong>562 Wellington Road, Street 32, San Francisco
                            </p>
                            <p class="wow fadeIn animated">
                                <strong>Phone: </strong>+01 2222 365 /(+91) 01 2345 6789
                            </p>
                            <p class="wow fadeIn animated">
                                <strong>Hours: </strong>10:00 - 18:00, Mon - Sat
                            </p>
                            <h5 class="mb-10 mt-30 fw-600 text-grey-4 wow fadeIn animated">Follow Us</h5>
                            <div class="mobile-social-icon wow fadeIn animated mb-sm-5 mb-md-0">
                                <a href="#"><img src="assets/imgs/theme/icons/icon-facebook.svg" alt=""></a>
                                <a href="#"><img src="assets/imgs/theme/icons/icon-twitter.svg" alt=""></a>
                                <a href="#"><img src="assets/imgs/theme/icons/icon-instagram.svg" alt=""></a>
                                <a href="#"><img src="assets/imgs/theme/icons/icon-pinterest.svg" alt=""></a>
                                <a href="#"><img src="assets/imgs/theme/icons/icon-youtube.svg" alt=""></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-3">
                        <h5 class="widget-title wow fadeIn animated">About</h5>
                        <ul class="footer-list wow fadeIn animated mb-sm-5 mb-md-0">
                            <li><a href="#">About Us</a></li>
                            <li><a href="#">Delivery Information</a></li>
                            <li><a href="#">Privacy Policy</a></li>
                            <li><a href="#">Terms &amp; Conditions</a></li>
                            <li><a href="#">Contact Us</a></li>
                            <li><a href="#">Support Center</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-2  col-md-3">
                        <h5 class="widget-title wow fadeIn animated">My Account</h5>
                        <ul class="footer-list wow fadeIn animated">
                            <li><a href="#">Sign In</a></li>
                            <li><a href="#">View Cart</a></li>
                            <li><a href="#">My Wishlist</a></li>
                            <li><a href="#">Track My Order</a></li>
                            <li><a href="#">Help</a></li>
                            <li><a href="#">Order</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-4">
                        <h5 class="widget-title wow fadeIn animated">Install App</h5>
                        <div class="row">
                            <div class="col-md-8 col-lg-12">
                                <p class="wow fadeIn animated">From App Store or Google Play</p>
                                <div class="download-app wow fadeIn animated">
                                    <a href="#" class="hover-up mb-sm-4 mb-lg-0"><img class="active"
                                                                                      src="assets/imgs/theme/app-store.jpg"
                                                                                      alt=""></a>
                                    <a href="#" class="hover-up"><img src="assets/imgs/theme/google-play.jpg"
                                                                      alt=""></a>
                                </div>
                            </div>
                            <div class="col-md-4 col-lg-12 mt-md-3 mt-lg-0">
                                <p class="mb-20 wow fadeIn animated">Secured Payment Gateways</p>
                                <img class="wow fadeIn animated" src="assets/imgs/theme/payment-method.png" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div class="container pb-20 wow fadeIn animated">
            <div class="row">
                <div class="col-12 mb-20">
                    <div class="footer-bottom"></div>
                </div>
                <div class="col-lg-6">
                    <p class="float-md-left font-sm text-muted mb-0">&copy; 2021, <strong
                            class="text-brand">Evara</strong> - HTML Ecommerce Template </p>
                </div>
                <div class="col-lg-6">
                    <p class="text-lg-end text-start font-sm text-muted mb-0">
                        Designed by <a href="http://alithemes.com/" target="_blank">Alithemes.com</a>. All rights
                        reserved
                    </p>
                </div>
            </div>
        </div>
    </footer>
    <!-- Preloader Start -->
    <div id="preloader-active">
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="text-center">
                    <h5 class="mb-5">Now Loading</h5>
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
