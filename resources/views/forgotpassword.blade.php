@extends('index')
@section('content')
<div id="main-content" class="main-content">
    <div class="container">

        <div class="row">

            <!--Form Sign In-->
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="signin-container">
                    <form action="{{route('new_password')}}" name="frm-login" method="post">
                      @csrf
                        <p class="form-row">
                            <label for="fid-pass">Email Adress:<span class="requite">*</span></label>
                            <input type="email" id="fid-pass" name="email" value="" class="txt-input">
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
