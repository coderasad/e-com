@extends('author.app')
@section('title')
    Edit Profile
@endsection
@section('author_right_content')
<div class="p-5">
    <h4 class="text-center pb-3 text-uppercase"><strong>Update Profile</strong></h4>
    <form method="POST" action="{{ url('author/profile_update/'.$user->id) }}" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <input id="name" type="text"
                        class="form-control @error('name') is-invalid @enderror" name="name" required value="{{ $user->name }}" autocomplete="name" placeholder="Full Name">
        
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div><!-- form-group -->
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <input id="email" type="text"
                        class="form-control @error('email') is-invalid @enderror" name="email" required value="{{ $user->email }}" autocomplete="email" placeholder="Email">
        
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div><!-- form-group -->
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <input type="file" class="form-control @error('img') is-invalid @enderror" id="imgInp" name="img">
                    @error('img')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div><!-- form-group -->
                <div class="form-group">
                    @if (Auth::user()->img != NULL)
                        <img class="mb-3" src={{asset('public/frontend/images/author/'.Auth::user()->id.'-author'.Auth::user()->img)}} id="img_show" width="80"/>
                    @else
                        <img class="mb-3" src={{asset("public/frontend/images/author/default.jpg")}} id="img_show" width="80"/>
                    @endif
                </div>
            </div>
            <div class="col-md-12">            
                <button type="submit" class="btn btn-info btn-block pointer">Updata</button>
            </div>
        </div>
    </form>
</div>
@endsection
