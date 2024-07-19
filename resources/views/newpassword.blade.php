@extends('index')
@section('content')
<div id="main-content" class="main-content">
    <div class="container">

        <div class="row">

            <!--Form Sign In-->
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="signin-container">
                    <form action="{{route('handle_new_password')}}" name="frm-login" method="post">
                        @csrf
                        @error('token')
                                        <div style="color:red">{{ $message }}</div>
                                    @enderror
                        <p class="form-row">
                            <label for="fid-pass">Token:<span class="requite">*</span></label>
                            <input type="text" id="fid-pass" name="token" value="" class="txt-input">
                        </p>
                        <p class="form-row">
                            <label for="fid-pass">Password:<span class="requite">*</span></label>
                            <input type="password" id="fid-pass" name="password" value="" class="txt-input">
                        </p>
                        <p class="form-row">
                            <label for="fid-pass">Repassword:<span class="requite">*</span></label>
                            <input type="password" id="fid-pass" name="password_confirmation" value="" class="txt-input">
                        </p>
                        <p class="form-row wrap-btn">
                            <button class="btn btn-submit btn-bold" type="submit">submit</button>
                            
                        </p>
                        
                       
                        
                    </form>
                </div>
            </div>
            
        </div>

    </div>

</div>
    
@endsection
