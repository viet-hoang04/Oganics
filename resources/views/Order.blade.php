@extends('index')
@section('content')
<div>
    <div id="main-content" class="main-content">
        <div class="container sm-margin-top-37px">
            <div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 sm-padding-top-48px sm-margin-bottom-0 xs-margin-bottom-15px">
        <div class="order-summary sm-margin-bottom-80px">
            <div class="title-block">
                <h3 class="title">Order Summary</h3>
                <a href="#" class="link-forward">Edit cart</a>
            </div>
           
            <div class="cart-list-box short-type">
                <span class="number">2 items</span>
                <ul class="cart-list">
                  
                    @foreach ($orders as $order )
                    
                    <li class="cart-elem">
                        <div class="cart-item">
                            <div class="product-thumb">
                                
                            </div>
                            <div class="info">
                                <span class="txt-quantity">{{$order['OrderID']}}</span>
                                <
                            </div>
                         
                            <div class="price price-contain">
                                <ins><span class="price-amount"><span class="currencySymbol"></span>{{ number_format($order['total']) }}VND</span></ins>
                              
                            </div>
                            <div class="subtotal-line">
                                
                                <span class="stt-price">{{ number_format($order['total']) }}VND</span>
                            </div>
                        </div>
                    </li>
                   
                    @endforeach
                </ul>
                
            </div>
          
        </div>
    </div>
</div>
</div>
</div>
</div>


@endsection