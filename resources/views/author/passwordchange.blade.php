@extends('author.app')
@section('title')
    Password Change
@endsection
@section('author_right_content')
    <div class="p-5">
        <h4 class="text-center pb-3 text-uppercase"><strong>Change Password</strong></h4>
        <form method="POST" action="{{ route('author.password_update') }}">
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
            <button type="submit" class="btn btn-info btn-block pointer">Change Password</button>
        </form>
    </div>
@endsection
