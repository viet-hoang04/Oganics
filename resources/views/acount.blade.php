@extends('index')
@section('content')
    <div id="main-content" class="main-content">
        <div class="container">

            <div class="d-flex justify-content-center row ">

                <!--Form Sign In-->
                <div class=" col-lg-12 col-md-6 col-sm-6 col-xs-12">
                    <div class="signin-container">
                        <form action="" method="post">
                            @csrf
                            <h1> Thông Tin Liên Hệ</h1><a class="btn btn-action bg-primary" href="{{route('order')}}">Order</a>
                            
                            @if (session('success'))
                                <span style="color: rgb(1, 255, 1)">{{session('success')}}</span>
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
                                        <label for="fid-pass">Password:<span class="requite">*</span></label>
                                        <input type="password" id="fid-pass" name="password" value="{{ Auth::user()->name }}"
                                            class="txt-input" required>
                                    </p>
                                   
                                    {{-- <p class="form-row">
                                <label for="fid-role">Role:<span class="requite">*</span></label>
                                <select id="fid-role" name="role" class="txt-input" required>
                                    <option value="">Select Role</option>
                                    <option value="user">User</option>
                                    <option value="admin">Admin</option>
                                </select>
                            </p> --}}
                                   
                                </div>
                            </div>
                        </form>
                        <p class="form-row wrap-btn">
                            <a href="{{route('profile.edit')}}">  <button  class="btn  btn-bold"  >Sửa thông tin</button></a>
                           
                        </p>
                        

                          

                    </div>
                </div>

            </div>

        </div>

    </div>
@endsection
