@extends('layouts.app')
@section('title')
    Register Page
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
                        <span class="log_title"><strong>Customer Registration</strong></span>
                    </div>
                    <form action="{{ route('register') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="userName">Full Name</label>
                                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="userName" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Enter Full Name">
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-6">                                
                                <div class="form-group">
                                    <label for="phone">Enter Phone Number</label>
                                    <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror" id="phone" value="{{ old('phone') }}" required autocomplete="phone" autofocus placeholder="01xxxxxxxxx">
                                    @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="log_email">Email</label>
                                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="log_email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Enter Email">
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-6">
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
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="con_pass">Confirm Password</label>
                                    <input type="password" class="form-control" name="password_confirmation"
                                    required autocomplete="current-password"  id="con_pass" placeholder="Confirm Password">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-info btn-block" style="cursor: pointer"><b>Register</b></button>
                        </div>
                    </form>
                    <div class="row log_social">
                        {{-- <div class="col-md-12">							
                            <div class="pos_bor">or</div>
                        </div>
                        <div class="col-md-6 mb-2">
                            <a href="#" class="btn  btn-sm btn-block" style="background: #3b5998;color:white"><i class="fab fa-facebook-f mr-2"></i><b>Login</b></a>
                        </div>
                        <div class="col-md-6">
                            <a href="#" class="btn btn-sm btn-block" style="background: #DB4437;color:white"><i class="fab fa-google mr-2"></i><b>Login</b></a>
                        </div> --}}
                        <div class="col-md-12 mt-3 text-center">
                            <small>Have an account? <a class="" href="{{ route('login') }}"><b>Login</b></a>	</small>
                        </div>
                    </div>					
                </div>
            </div>
        </div>
    </div>
</div><!-- d-flex -->
@endsection
