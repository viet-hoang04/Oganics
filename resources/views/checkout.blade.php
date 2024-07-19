@extends('index')
@section('content')
<div id="main-content" class="main-content">
    <div class="container sm-margin-top-37px">
        <form action="{{route('insert_order')}}" method="POST">
            @csrf
        <div class="row">

            <!--checkout progress box-->
           
            
                        <!--Form Sign In-->
                        <div class=" col-lg-6 col-md-6 col-sm-6 col-xs-12 p-0 m-0">
                            <div class="signin-container  p-0 m-0">
                                <h2>THông tin khách hàng</h2>
                              
                                   
                                    
                                    <div class=" col-lg-6 col-md-6 col-sm-6 col-xs-12  p-0 m-0">
                                        <div class=" register-in-container p-0 m-0 ">
                                            <p class="form-row">
                                                <label for="fid-name">Name:<span class="requite">*</span></label>
                                                <input type="text" id="fid-name" name="name" value="{{Auth::user()->name}}" class="txt-input" required>
                                            </p>
                                            <p class="form-row">
                                                <label for="fid-email">Email Address:<span class="requite">*</span></label>
                                                <input type="email" id="fid-email" name="email" value="{{Auth::user()->email}}" class="txt-input" required>
                                            </p>
                                            <p class="form-row">
                                                <label for="fid-email">Phone:<span class="requite">*</span></label>
                                                <input type="phone" id="fid-email" name="phone" value="{{Auth::user()->phone}}" class="txt-input" required>
                                            </p>
                                           
                                            {{-- <p class="form-row">
                                                <label for="fid-role">Role:<span class="requite">*</span></label>
                                                <select id="fid-role" name="role" class="txt-input" required>
                                                    <option value="">Select Role</option>
                                                    <option value="user">User</option>
                                                    <option value="admin">Admin</option>
                                                </select>
                                            </p> --}}
                                            <p class="form-row wrap-btn">
                                                <button class="btn btn-submit btn-bold" type="submit">Đặt Hàng</button>
                                            </p>
                                        </div>
                                    </div>
                              
            </div>
            </div>
            
            <!--Order Summary-->
            <div class="col-lg-5 col-md-5 col-sm-6 col-xs-12 sm-padding-top-48px sm-margin-bottom-0 xs-margin-bottom-15px">
                <div class="order-summary sm-margin-bottom-80px">
                    <div class="title-block">
                        <h3 class="title">Order Summary</h3>
                        <a href="#" class="link-forward">Edit cart</a>
                    </div>
                   
                    <div class="cart-list-box short-type">
                        <span class="number">2 items</span>
                        <ul class="cart-list">
                            @php $total = 0; @endphp
                            @foreach ($cart as $productId => $product)
                            
                            <li class="cart-elem">
                                <div class="cart-item">
                                    <div class="product-thumb">
                                        
                                    </div>
                                    <div class="info">
                                        <span class="txt-quantity">{{$product['quantity']}}</span>
                                        <a href="#" class="pr-name">{{ $product['name'] }}</a>
                                    </div>
                                    @php
                                    $total+= ($product['price'] * $product['quantity']);
                               @endphp
                                    <div class="price price-contain">
                                        <ins><span class="price-amount"><span class="currencySymbol"></span>{{ number_format($product['price']) }}VND</span></ins>
                                      
                                    </div>
                                </div>
                            </li>
                           
                            @endforeach
                        </ul>
                        <ul class="subtotal">
                            <li>
                                <div class="subtotal-line">
                                    <b class="stt-name">Subtotal</b>
                                    <span class="stt-price">{{ number_format($total) }}VND</span>
                                </div>
                            </li>
                            <li>
                                <div class="subtotal-line">
                                    <b class="stt-name">Shipping</b>
                                    <span class="stt-price">£20.00</span>
                                </div>
                            </li>
                            <li>
                                <div class="subtotal-line">
                                    <b class="stt-name">Tax</b>
                                    <span class="stt-price">£0.00</span>
                                </div>
                            </li>
                            <li>
                                <div class="subtotal-line">
                                    <a href="#" class="link-forward">Promo/Gift Certificate</a>
                                </div>
                            </li>
                            <li>
                                <div class="subtotal-line">
                                    <b class="stt-name">total:</b>
                                    <span class="stt-price">{{ number_format($total) }}VND</span>
                                   <input type="hidden" name="total" value="{{$total}}">
                                </div>
                            </li>
                        </ul>
                    </div>
                  
                </div>
            </div>

        </div>
        </form>
    </div>
</div>
@endsection
