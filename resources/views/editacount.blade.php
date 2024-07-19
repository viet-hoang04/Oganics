@extends('index')
@section('content')
    <div id="main-content" class="main-content">
        <div class="container">

            <div class="d-flex justify-content-center row ">

                <!--Form Sign In-->
                <div class=" col-lg-12 col-md-6 col-sm-6 col-xs-12">
                    <div class="signin-container">
                        <form action="{{route('profile.update')}}" method="post">
                            @csrf
                            @method('PUT')
                            <h1>Thay đổi Thông Tin Liên Hệ</h1>
                            @if (session('error'))
                            <span style="color: rgb(255, 1, 1)">{{session('error')}}</span>
                             @endif
                            <div class=" col-lg-12  col-md-6 col-sm-6 col-xs-12">
                                <div class=" register-in-container">
                                    <p class="form-row">
                                        <label for="fid-name">Name:<span class="requite">*</span></label>
                                        <input type="text" id="fid-name" name="name" value="{{ Auth::user()->name }}"
                                            class="txt-input" required>
                                    </p>
                                    <p class="form-row">
                                        <label for="fid-email">Email Address:<span class="requite">*</span></label>
                                        <input type="email" id="fid-email" name="email" value="{{ Auth::user()->email }}" class="txt-input"
                                            required>
                                    </p>
                                    <p class="form-row">
                                        <label for="fid-email">Phone:<span class="requite">*</span></label>
                                        <input type="phone" id="fid-email" name="phone" value="{{ Auth::user()->phone }}" class="txt-input"
                                            required>
                                    </p>
                                    <p class="form-row">
                                        <label for="fid-pass">Old Password:<span class="requite">*</span></label>
                                        <input type="password" id="fid-pass" name="old_password" value=""
                                         class="txt-input" required>
                                    </p>
                                    <p class="form-row">
                                        <label for="fid-pass">New Password:<span class="requite">*</span></label>
                                        <input type="password" id="fid-pass" name="new_password" value=""
                                         class="txt-input" required>
                                    </p>
                                   
                                   
                                        <p class="form-row wrap-btn">
                                            <button  class="btn  btn-bold" type="submit" >Cập nhật thông tin</button>
                                        
                                    </p>
                                   
                                </div>
                            </div>
                        </form>
                       
                        

                          

                    </div>
                </div>

            </div>

        </div>

    </div>
@endsection
