@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center pt-3">
            <div class="col-md-4">
                <div class="card">
                    <div class="text-center mt-4">
                        <div class="mb-4 circleImg"><img src="{{asset("public/frontend/images/author/".Auth::user()->id.'-author'.Auth::user()->img)}}" alt=""></div>
                        <h4><strong>{{Auth::user()->name}}</strong></h4>
                    </div>
                    <div class="customer_table mt-3">
                        <ul>
                            <li><a href="{{route('author.dashboard')}}">Orders</a></li>
                            <li><a href="{{url('author/edit_profile/'.Auth::user()->id)}}">Edit Profile</a></li>
                            <li><a href="{{route('author.password_change')}}">Password Change</a></li>
                        </ul>
                        <div class="px-3">
                            <a class="btn btn-block btn-danger mt-2 mb-3 pointer" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Log Out</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8 card">
                @yield('author_right_content')
            </div>
        </div>
    </div>
@endsection
