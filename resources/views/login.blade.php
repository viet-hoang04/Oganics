@extends('index')
@section('content')
<div id="main-content" class="main-content">
    <div class="container">

        <div class="row">

            <!--Form Sign In-->
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="signin-container">
                    <form action="{{route('handlelogin')}}" name="frm-login" method="post">
                        @csrf
                        <p class="form-row">
                            <label for="fid-name">Email Address:<span class="requite">*</span></label>
                            <input type="email" id="fid-name" name="email" value="" class="txt-input">
                        </p>
                        <p class="form-row">
                            <label for="fid-pass">Password:<span class="requite">*</span></label>
                            <input type="password" id="fid-pass" name="password" value="" class="txt-input">
                        </p>
                        <p class="form-row wrap-btn">
                            <button class="btn btn-submit btn-bold" type="submit">sign in</button>
                            <a href="{{route('forgotpassword')}}" class="link-to-help">Quên mật khẩu</a>
                        </p>
                        <p>
                            <a href="{{route('register')}}" class="link-to-help"> Create Account</a>
                        </p>
                       
                        @if (Session::has('message'))
                        <div class="alert alert-warning" role="alert">
                            {{ Session::get('message') }}
                        </div>
                        @php
                            Session::forget('message');
                        @endphp
                    @endif
                    </form>
                </div>
            </div>
            
        </div>

    </div>

</div>
    
@endsection
