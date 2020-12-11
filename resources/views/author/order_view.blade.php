@extends('author.app')
@section('title')
    Order View
@endsection
@section('author_right_content')

<h6 class="my-3 text-center text-uppercase"><a href="{{url('author/dashboard')}}" class="btn btn-info float-left">Back</a>product Details</h6>
    <table class="table table-striped">
        <tbody>
            @foreach ($order_view as $key => $data)
            <tr>
                <td>Name: </td>
                <td>{{ $data->product_name }}</td>                
            </tr>
            <tr>
                <td>Qty: </td>
                <td>{{ $data->qty }}</td>
            </tr>
            <tr>
                <td>Price: </td>
                <td>{{ $data->price }}</td>
            </tr>
            <tr>
                <td>Details: </td>
                <td>{!! $data->product_details !!}</td>
            </tr>
            <tr>
                <td>Image: </td>
                <td><img width="50px" src={{ asset("public/frontend/images/product/{$data->product_id}-product-img-main{$data->image_one}") }} alt=""></td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection
