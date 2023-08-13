
    <header class="header-area header-style-3 header-height-2">
        <div class="header-top header-top-ptb-1 d-none d-lg-block">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-6 col-lg-4">
                        <div class="header-info">
                            <ul>
                                <li><i class="fi-rs-smartphone"></i> <a href="#">(+01) - 2345 - 6789</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-xl-6 col-lg-4">
                        <div class="header-info header-info-right">
                            <ul>
                                <li>
                                    <a class="language-dropdown-active" href="#"> <i class="fi-rs-world"></i> Pусский <i class="fi-rs-angle-small-down"></i></a>
                                    <ul class="language-dropdown">
                                        <li><a href="#"><img src="{{url('assets/imgs/theme/flag-fr.png')}}" alt="">Français</a></li>
                                        <li><a href="#"><img src="{{ url('assets/imgs/theme/flag-dt.png') }}" alt="">Deutsch</a></li>
                                        <li><a href="#"><img src="{{ url('assets/imgs/theme/flag-ru.png') }}" alt="">Pусский</a></li>
                                    </ul>
                                </li>
                                <li><i class="fi-rs-user"></i>
                                    @if(!isset(Auth::user()->name))
                                        <a href="{{ route('login') }}">Войти на сайт</a>
                                    @else
                                        <a href="{{ route('dashboard') }}">{{Auth::user()->name}} </a>
                                    @endif
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-middle header-middle-ptb-1 d-none d-lg-block">
            <div class="container">
                <div class="header-wrap">
                    <div class="logo logo-width-1">
                        <a href="/"><img src="{{ url('assets/imgs/theme/logo.svg') }}" alt="logo"></a>
                    </div>
                    <div class="header-right">

                        <div class="search-style-2">

                        </div>

                        <div class="header-action-right">
                            <div class="header-action-2">

                                <div class="header-action-icon-2">
                                    <a class="mini-cart-icon" href="{{route('basket')}}">
                                        <img alt="Evara" src="{{ url('assets/imgs/theme/icons/icon-cart.svg') }}">
                                        <span id="basket-count" class="pro-count blue">{{\App\Models\Basket_products::where('basket_id', '=', Illuminate\Support\Facades\Cookie::get('basket_id'))->sum('quantity')}}</span>
                                    </a>
                                    <!--
                                    <div class="cart-dropdown-wrap cart-dropdown-hm2">
                                        <ul>
                                            <li>
                                                <div class="shopping-cart-img">
                                                    <a href="shop-product-right.html"><img alt="Evara" src="{{ url('assets/imgs/shop/thumbnail-3.jpg') }}"></a>
                                                </div>
                                                <div class="shopping-cart-title">
                                                    <h4><a href="shop-product-right.html">Daisy Casual Bag</a></h4>
                                                    <h4><span>1 × </span>$800.00</h4>
                                                </div>
                                                <div class="shopping-cart-delete">
                                                    <a href="#"><i class="fi-rs-cross-small"></i></a>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="shopping-cart-img">
                                                    <a href="shop-product-right.html"><img alt="Evara" src="{{ url('assets/imgs/shop/thumbnail-2.jpg') }}"></a>
                                                </div>
                                                <div class="shopping-cart-title">
                                                    <h4><a href="shop-product-right.html">Corduroy Shirts</a></h4>
                                                    <h4><span>1 × </span>$3200.00</h4>
                                                </div>
                                                <div class="shopping-cart-delete">
                                                    <a href="#"><i class="fi-rs-cross-small"></i></a>
                                                </div>
                                            </li>
                                        </ul>
                                        <div class="shopping-cart-footer">
                                            <div class="shopping-cart-total">
                                                <h4>Total <span>$4000.00</span></h4>
                                            </div>
                                            <div class="shopping-cart-button">
                                                <a href="shop-cart.html" class="outline">View cart</a>
                                                <a href="shop-checkout.html">Checkout</a>
                                            </div>
                                        </div>
                                    </div>
                                    -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
