<section class="product-tabs section-padding wow fadeIn animated">
    <div class="container">
        <div class="tab-header">
            <a href="{{ url('products') }}" class="view-more d-none d-md-flex">Посмотреть все товары<i
                    class="fi-rs-angle-double-small-right"></i></a>
        </div>
        <!--End nav-tabs-->
        <div class="tab-content wow fadeIn animated" id="myTabContent">
            <div class="tab-pane fade show active" id="tab-one" role="tabpanel" aria-labelledby="tab-one">
                <div class="row product-grid-4">
                    @foreach($productsPopular as $product)
                    <div class="col-lg-3 col-md-4 col-12 col-sm-6">
                        <div class="product-cart-wrap mb-30">
                            <div class="product-img-action-wrap">
                                <div class="product-img product-img-zoom">
                                    <a href="{{ route('index.products.show', $product->id) }}">
                                        <img class="default-img" src="{{$product->link_image}}" alt="">
                                        <img class="hover-img" src="{{$product->link_image}}" alt="">
                                    </a>
                                </div>

                                <div class="product-badges product-badges-position product-badges-mrg">
                                    <span class="best">Best Sell</span>
                                </div>
                            </div>
                            <div class="product-content-wrap">
                                <div class="product-category">
                                    <a href="shop-grid-right.html">{{$product->category->title}}</a>
                                </div>
                                <h2><a href="shop-product-right.html">{{$product->title}}</a></h2>
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
                    </div>
                    @endforeach
                </div>

                <!--End product-grid-4-->
            </div>


        </div>
        <!--End tab-content-->
    </div>
</section>
