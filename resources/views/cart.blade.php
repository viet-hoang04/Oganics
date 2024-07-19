@extends('index')
@section('content')
    <div id="main-content" class="main-content">
        <div class="container">

            {{-- <!--Top banner-->
        <div class="top-banner background-top-banner-for-shopping min-height-346px">
            <h3 class="title">Save $50!*</h3>
            <p class="subtitle">Save $50 when you open an account online & spen $50 on your first online purchase to day</p>
            <ul class="list">
                <li>
                    <div class="price-less">
                        <span class="desc">Purchase amount</span>
                        <span class="cost">$0.00</span>
                    </div>
                </li>
                <li>
                    <div class="price-less">
                        <span class="desc">Credit on billing statement</span>
                        <span class="cost">$0.00</span>
                    </div>
                </li>
                <li>
                    <div class="price-less sum">
                        <span class="desc">Cost affter statemen credit</span>
                        <span class="cost">$0.00</span>
                    </div>
                </li>
            </ul>
            <p class="btns">
                <a href="#" class="btn">Open Account</a>
                <a href="#" class="btn">Learn more</a>
            </p>
        </div> --}}

            <!--Cart Table-->
            <div class="shopping-cart-container">
                <div class="row">
                    <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
                        <h3 class="box-title">Your cart items</h3>
                        <form class="shopping-cart-form" action="{{ route('cart.update') }}" method="post">
                            @csrf
                            {{-- @foreach ($cart as $productId => $product)
                                <p>{{ $product['name'] }} - {{ $product['price'] }} x {{ $product['quantity'] }}</p>
                                <form action="{{ route('cart.remove') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $productId }}">
                                    <button type="submit">Remove</button>
                                </form>
                            @endforeach --}}
                            <table class="shop_table cart-form">
                                <thead>
                                    <tr>
                                        <th class="product-name">Product Name</th>
                                        <th class="product-price">Price</th>
                                        <th class="product-quantity">Quantity</th>
                                        <th class="product-subtotal">Total</th>
                                        <th class="product-edit">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $total = 0; @endphp
                                  
                                    @foreach ($cart as $productId => $product)
                                        <tr class="cart_item">
                                        
                                            <td class="product-thumbnail" data-title="Product Name">
                                                <a class="prd-thumb" href="#">
                                                    {{-- <figure><img width="113" height="113"
                                                        src="{{asset('frontend/images/products/'.$product['image'])}}" alt="shipping cart">
                                                </figure> --}} {{$productId}}
                                                </a>
                                                <a class="prd-name" href="#">{{ $product['name'] }}</a>

                                            </td>
                                            <td class="product-price" data-title="Price">
                                                <div class="price price-contain">
                                                    <ins><span class="price-amount"><span
                                                                class="currencySymbol"></span>{{ number_format($product['price']) }}VND</span></ins>

                                                </div>
                                            </td>
                                            <td class="product-quantity" data-title="Quantity">
                                                <div class="quantity-box type1">
                                                    <div class="qty-input">
                                                        <input type="number" name="quantities[{{ $productId }}]"
                                                            value="{{ $product['quantity'] }}" data-max_value="20"
                                                            data-min_value="1" data-step="1" class="quantity-input">
                                                        <a href="#" class="qty-btn btn-up"
                                                            data-id="{{ $productId }}"><i class="fa fa-caret-up"
                                                                aria-hidden="true"></i></a>
                                                        <a href="#" class="qty-btn btn-down"
                                                            data-id="{{ $productId }}"><i class="fa fa-caret-down"
                                                                aria-hidden="true"></i></a>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="product-subtotal" data-title="Total">
                                                <div class="price price-contain">
                                                    @php
                                                         $total+= ($product['price'] * $product['quantity']);
                                                    @endphp
                                                    <ins><span class="price-amount"><span
                                                                class="currencySymbol"></span>{{ number_format(($product['price'] * $product['quantity'])) }}VND</span></ins>

                                                </div>
                                            </td>
                                            <td class="product-edit">
                                               
                                                <div class="action">
                                                    {{-- <form action="{{route('cart.remove')}}" method="GET">
                                                        @csrf
                                                        <input type="hidden" name="productid" value="{{$productId }}">
                                                        <button type="submit"  class="remove"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                                                    </form> --}}
                                                    <a href="{{route('cart.remove', $productId)}}"  class="remove"><i class="fa fa-trash-o" aria-hidden="true"></i></a>

                                                </div>
                                            </td> 
                                    @endforeach
                                    <tr class="cart_item wrap-buttons">
                                        <td class="wrap-btn-control" colspan="4">
                                            <a class="btn back-to-shop">Back to Shop</a>
                                            <button class="btn btn-update" type="submit">update</button>
                                            {{-- <form action="{{route('cart.clear')}}" method="GET" style="display: inline;">
                                                @csrf
                                                <button class="btn btn-clear" type="submit">Clear All</button>
                                            </form> --}}
                                            <a href="{{route('cart.clear')}}" class="btn btn-clear" type="submit">Clear All</a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </form>
                    </div>
                    <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
                        <div class="shpcart-subtotal-block">
                            <div class="subtotal-line">
                                @php
                                    $totals;
                                @endphp
                                <b class="stt-name">Subtotal <span class="sub">(2ittems)</span></b>
                                <span class="stt-price">{{ number_format($total) }}VND</span>
                            </div>
                            <div class="subtotal-line">
                                <b class="stt-name">Shipping</b>
                                <span class="stt-price">£0.00</span>
                            </div>
                            <div class="tax-fee">
                                <p class="title">Est. Taxes & Fees</p>
                                <p class="desc">Based on 56789</p>
                            </div>
                            <div class="btn-checkout">
                                <a href="{{route('checkout')}}" class="btn checkout">Check out</a>
                            </div>
                            <div class="biolife-progress-bar">
                                <table>
                                    <tr>
                                        <td class="first-position">
                                            <span class="index">$0</span>
                                        </td>
                                        <td class="mid-position">
                                            <div class="progress">
                                                <div class="progress-bar" role="progressbar" style="width: 25%"
                                                    aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </td>
                                        <td class="last-position">
                                            <span class="index">$99</span>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <p class="pickup-info"><b>Free Pickup</b> is available as soon as today More about shipping and
                                pickup</p>
                        </div>
                    </div>
                </div>
            </div>

            <!--Related Product-->
            <div class="product-related-box single-layout">
                <div class="biolife-title-box lg-margin-bottom-26px-im">
                    <span class="biolife-icon icon-organic"></span>
                    <span class="subtitle">All the best item for You</span>
                    <h3 class="main-title">Related Products</h3>
                </div>
                <ul class="products-list biolife-carousel nav-center-02 nav-none-on-mobile"
                    data-slick='{"rows":1,"arrows":true,"dots":false,"infinite":false,"speed":400,"slidesMargin":0,"slidesToShow":5, "responsive":[{"breakpoint":1200, "settings":{ "slidesToShow": 4}},{"breakpoint":992, "settings":{ "slidesToShow": 3, "slidesMargin":20}},{"breakpoint":768, "settings":{ "slidesToShow": 2, "slidesMargin":10}}]}'>
                    <li class="product-item">
                        <div class="contain-product layout-default">
                            <div class="product-thumb">
                                <a href="#" class="link-to-product">
                                    <img src="assets/images/products/p-13.jpg" alt="dd" width="270"
                                        height="270" class="product-thumnail">
                                </a>
                            </div>
                            <div class="info">
                                <b class="categories">Fresh Fruit</b>
                                <h4 class="product-title"><a href="#" class="pr-name">National Fresh Fruit</a></h4>
                                <div class="price ">
                                    <ins><span class="price-amount"><span
                                                class="currencySymbol">£</span>85.00</span></ins>
                                    <del><span class="price-amount"><span
                                                class="currencySymbol">£</span>95.00</span></del>
                                </div>
                                <div class="slide-down-box">
                                    <p class="message">All products are carefully selected to ensure food safety.</p>
                                    <div class="buttons">
                                        <a href="#" class="btn wishlist-btn"><i class="fa fa-heart"
                                                aria-hidden="true"></i></a>
                                        <a href="#" class="btn add-to-cart-btn"><i class="fa fa-cart-arrow-down"
                                                aria-hidden="true"></i>add to cart</a>
                                        <a href="#" class="btn compare-btn"><i class="fa fa-random"
                                                aria-hidden="true"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="product-item">
                        <div class="contain-product layout-default">
                            <div class="product-thumb">
                                <a href="#" class="link-to-product">
                                    <img src="assets/images/products/p-14.jpg" alt="dd" width="270"
                                        height="270" class="product-thumnail">
                                </a>
                            </div>
                            <div class="info">
                                <b class="categories">Fresh Fruit</b>
                                <h4 class="product-title"><a href="#" class="pr-name">National Fresh Fruit</a></h4>
                                <div class="price">
                                    <ins><span class="price-amount"><span
                                                class="currencySymbol">£</span>85.00</span></ins>
                                    <del><span class="price-amount"><span
                                                class="currencySymbol">£</span>95.00</span></del>
                                </div>
                                <div class="slide-down-box">
                                    <p class="message">All products are carefully selected to ensure food safety.</p>
                                    <div class="buttons">
                                        <a href="#" class="btn wishlist-btn"><i class="fa fa-heart"
                                                aria-hidden="true"></i></a>
                                        <a href="#" class="btn add-to-cart-btn"><i class="fa fa-cart-arrow-down"
                                                aria-hidden="true"></i>add to cart</a>
                                        <a href="#" class="btn compare-btn"><i class="fa fa-random"
                                                aria-hidden="true"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="product-item">
                        <div class="contain-product layout-default">
                            <div class="product-thumb">
                                <a href="#" class="link-to-product">
                                    <img src="assets/images/products/p-15.jpg" alt="dd" width="270"
                                        height="270" class="product-thumnail">
                                </a>
                            </div>
                            <div class="info">
                                <b class="categories">Fresh Fruit</b>
                                <h4 class="product-title"><a href="#" class="pr-name">National Fresh Fruit</a></h4>
                                <div class="price">
                                    <ins><span class="price-amount"><span
                                                class="currencySymbol">£</span>85.00</span></ins>
                                    <del><span class="price-amount"><span
                                                class="currencySymbol">£</span>95.00</span></del>
                                </div>
                                <div class="slide-down-box">
                                    <p class="message">All products are carefully selected to ensure food safety.</p>
                                    <div class="buttons">
                                        <a href="#" class="btn wishlist-btn"><i class="fa fa-heart"
                                                aria-hidden="true"></i></a>
                                        <a href="#" class="btn add-to-cart-btn"><i class="fa fa-cart-arrow-down"
                                                aria-hidden="true"></i>add to cart</a>
                                        <a href="#" class="btn compare-btn"><i class="fa fa-random"
                                                aria-hidden="true"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="product-item">
                        <div class="contain-product layout-default">
                            <div class="product-thumb">
                                <a href="#" class="link-to-product">
                                    <img src="assets/images/products/p-10.jpg" alt="dd" width="270"
                                        height="270" class="product-thumnail">
                                </a>
                            </div>
                            <div class="info">
                                <b class="categories">Fresh Fruit</b>
                                <h4 class="product-title"><a href="#" class="pr-name">National Fresh Fruit</a></h4>
                                <div class="price">
                                    <ins><span class="price-amount"><span
                                                class="currencySymbol">£</span>85.00</span></ins>
                                    <del><span class="price-amount"><span
                                                class="currencySymbol">£</span>95.00</span></del>
                                </div>
                                <div class="slide-down-box">
                                    <p class="message">All products are carefully selected to ensure food safety.</p>
                                    <div class="buttons">
                                        <a href="#" class="btn wishlist-btn"><i class="fa fa-heart"
                                                aria-hidden="true"></i></a>
                                        <a href="#" class="btn add-to-cart-btn"><i class="fa fa-cart-arrow-down"
                                                aria-hidden="true"></i>add to cart</a>
                                        <a href="#" class="btn compare-btn"><i class="fa fa-random"
                                                aria-hidden="true"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="product-item">
                        <div class="contain-product layout-default">
                            <div class="product-thumb">
                                <a href="#" class="link-to-product">
                                    <img src="assets/images/products/p-08.jpg" alt="dd" width="270"
                                        height="270" class="product-thumnail">
                                </a>
                            </div>
                            <div class="info">
                                <b class="categories">Fresh Fruit</b>
                                <h4 class="product-title"><a href="#" class="pr-name">National Fresh Fruit</a></h4>
                                <div class="price">
                                    <ins><span class="price-amount"><span
                                                class="currencySymbol">£</span>85.00</span></ins>
                                    <del><span class="price-amount"><span
                                                class="currencySymbol">£</span>95.00</span></del>
                                </div>
                                <div class="slide-down-box">
                                    <p class="message">All products are carefully selected to ensure food safety.</p>
                                    <div class="buttons">
                                        <a href="#" class="btn wishlist-btn"><i class="fa fa-heart"
                                                aria-hidden="true"></i></a>
                                        <a href="#" class="btn add-to-cart-btn"><i class="fa fa-cart-arrow-down"
                                                aria-hidden="true"></i>add to cart</a>
                                        <a href="#" class="btn compare-btn"><i class="fa fa-random"
                                                aria-hidden="true"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="product-item">
                        <div class="contain-product layout-default">
                            <div class="product-thumb">
                                <a href="#" class="link-to-product">
                                    <img src="assets/images/products/p-21.jpg" alt="dd" width="270"
                                        height="270" class="product-thumnail">
                                </a>
                            </div>
                            <div class="info">
                                <b class="categories">Fresh Fruit</b>
                                <h4 class="product-title"><a href="#" class="pr-name">National Fresh Fruit</a></h4>
                                <div class="price">
                                    <ins><span class="price-amount"><span
                                                class="currencySymbol">£</span>85.00</span></ins>
                                    <del><span class="price-amount"><span
                                                class="currencySymbol">£</span>95.00</span></del>
                                </div>
                                <div class="slide-down-box">
                                    <p class="message">All products are carefully selected to ensure food safety.</p>
                                    <div class="buttons">
                                        <a href="#" class="btn wishlist-btn"><i class="fa fa-heart"
                                                aria-hidden="true"></i></a>
                                        <a href="#" class="btn add-to-cart-btn"><i class="fa fa-cart-arrow-down"
                                                aria-hidden="true"></i>add to cart</a>
                                        <a href="#" class="btn compare-btn"><i class="fa fa-random"
                                                aria-hidden="true"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="product-item">
                        <div class="contain-product layout-default">
                            <div class="product-thumb">
                                <a href="#" class="link-to-product">
                                    <img src="assets/images/products/p-18.jpg" alt="dd" width="270"
                                        height="270" class="product-thumnail">
                                </a>
                            </div>
                            <div class="info">
                                <b class="categories">Fresh Fruit</b>
                                <h4 class="product-title"><a href="#" class="pr-name">National Fresh Fruit</a></h4>
                                <div class="price">
                                    <ins><span class="price-amount"><span
                                                class="currencySymbol">£</span>85.00</span></ins>
                                    <del><span class="price-amount"><span
                                                class="currencySymbol">£</span>95.00</span></del>
                                </div>
                                <div class="slide-down-box">
                                    <p class="message">All products are carefully selected to ensure food safety.</p>
                                    <div class="buttons">
                                        <a href="#" class="btn wishlist-btn"><i class="fa fa-heart"
                                                aria-hidden="true"></i></a>
                                        <a href="#" class="btn add-to-cart-btn"><i class="fa fa-cart-arrow-down"
                                                aria-hidden="true"></i>add to cart</a>
                                        <a href="#" class="btn compare-btn"><i class="fa fa-random"
                                                aria-hidden="true"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>

        </div>
    </div>



    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('.btn-up').forEach(button => {
                button.addEventListener('click', function(event) {
                    event.preventDefault();
                    let input = this.closest('.qty-input').querySelector('input');
                    let currentValue = parseInt(input.value);
                    let maxValue = parseInt(input.getAttribute('data-max_value'));
                    if (currentValue < maxValue) {
                        input.value = currentValue + 1;
                    }
                });
            });

            document.querySelectorAll('.btn-down').forEach(button => {
                button.addEventListener('click', function(event) {
                    event.preventDefault();
                    let input = this.closest('.qty-input').querySelector('input');
                    let currentValue = parseInt(input.value);
                    let minValue = parseInt(input.getAttribute('data-min_value'));
                    if (currentValue > minValue) {
                        input.value = currentValue - 1;
                    }
                });
            });
        });
    </script>
@endsection
