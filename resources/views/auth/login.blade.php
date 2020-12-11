@extends('layouts.app')
@section('title')
	Log In Page
@endsection
@section('content')
<div class="d-flex align-items-center justify-content-center bg-sl-primary ht-100v">       
    <div class="container py-5">
        <div class="row  align-items-center">
            <div class="col-md-6 mb-5 text-center">
                <img src={{asset("public/frontend/images/1.jpg")}} alt="">
            </div>
            <div class=" col-md-6">
                <div class="logIn-area">
                    <div class="mb-3  text-center">
                        <span class="log_title"><strong>Customer Login</strong></span>
                        {{-- <a class="float-right" href="#"><small><b>Are you a patient?</b></small></a> --}}
                    </div>
                    <form action="{{ route('login') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="log_email">Email or Phone</label>
                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="log_email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Enter Email or Phone">
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="log_pass">Password</label>
                            <input type="password" class="form-control  @error('password') is-invalid @enderror" name="password"
                            required autocomplete="current-password"  id="log_pass" placeholder="Password">
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group float-right">
                            <a class="" href="#" title=""><small>Forgot Password?</small></a>
                        </div>
                        <button type="submit" class="btn btn-info btn-block" style="cursor: pointer"><b>Login</b></button>
                    </form>
                    <div class="row log_social">
                        <div class="col-md-12">							
                            <div class="pos_bor">or</div>
                        </div>
                        <div class="col-md-6 mb-2">
                            <a href="" class="btn  btn-sm btn-block" style="background: #3b5998;color:white"><i class="fab fa-facebook-f mr-2"></i><b>Login</b></a>
                        </div>
                        <div class="col-md-6">
                            <a href="{{ url('/google-login') }}" class="btn btn-sm btn-block" style="background: #DB4437;color:white"><i class="fab fa-google mr-2"></i><b>Login</b></a>
                        </div>
                        <div class="col-md-12 mt-3 text-center">
                            <small>Don't hoave an account? <a class="" href="{{ route('register') }}"><b>Register</b></a>	</small>
                        </div>
                    </div>					
                </div>
            </div>
        </div>
    </div>
</div><!-- d-flex -->
@endsection

