@extends('index')
@section('content')
<div id="main-content" class="main-content">
    <div class="container">

        <div class="d-flex justify-content-center row ">

            <!--Form Sign In-->
            <div class=" col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="signin-container">
                    <form action="{{ route('handleregister') }}" method="post">
                        @csrf
                        
                        <div class=" col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class=" register-in-container">
                                <p class="form-row">
                                    <label for="fid-name">Name:<span class="requite">*</span></label>
                                    <input type="text" id="fid-name" name="name" value="" class="txt-input" required>
                                </p>
                                <p class="form-row">
                                    <label for="fid-email">Email Address:<span class="requite">*</span></label>
                                    <input type="email" id="fid-email" name="email" value="" class="txt-input" required>
                                </p>
                                <p class="form-row">
                                    <label for="fid-email">Phone:<span class="requite">*</span></label>
                                    <input type="phone" id="fid-email" name="phone" value="" class="txt-input" required>
                                </p>
                                <p class="form-row">
                                    <label for="fid-pass">Password:<span class="requite">*</span></label>
                                    <input type="password" id="fid-pass" name="password" value="" class="txt-input" required>
                                </p>
                                <p class="form-row">
                                    <label for="fid-repass">Confirm Password:<span class="requite">*</span></label>
                                    <input type="password" id="fid-repass" name="repassword" value="" class="txt-input" required>
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
                                    <button class="btn btn-submit btn-bold" type="submit">Register</button>
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