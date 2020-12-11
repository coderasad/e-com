@extends('admin.admin_layout')
@section('admin_content')
<div class="d-flex align-items-center justify-content-center ht-100v">

    <div class="login-wrapper wd-300 wd-xs-350 pd-25 pd-xs-40 bg-white">
        <div class="signin-logo tx-center tx-24 tx-bold tx-inverse"><span
                class="tx-info tx-normal">Admin</span></div>
        <div class="tx-center mb-4">Change Password</div>
        <form method="POST" action="{{ route('admin.password_update') }}">
            @csrf
            <div class="form-group">
                <input id="old_password" type="password"
                    class="form-control @error('old_password') is-invalid @enderror" name="old_password" required autocomplete="current-password" placeholder="Old Password">

                @error('old_password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div><!-- form-group -->

            <div class="form-group">
                <input id="password" type="password"
                    class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="New Password">
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div><!-- form-group -->

            <div class="form-group">
                <input id="new_password" type="password"
                    class="form-control @error('new_password') is-invalid @enderror" name="new_password" required autocomplete="current-password" placeholder="Confirm Password">
            </div><!-- form-group -->
            <button type="submit" class="btn btn-info btn-block">Change Password</button>
        </form>
        <!-- <div class="mg-t-60 tx-center">Not yet a member? <a href="page-signup.html" class="tx-info">Sign Up</a></div> -->
    </div><!-- login-wrapper -->
</div><!-- d-flex -->
@endsection
