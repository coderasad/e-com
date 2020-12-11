@extends('author.app')
@section('title')
    Dashboard
@endsection
@section('author_right_content')
    <table class="table table-striped">
        <thead class="thead-inverse">
            <tr>
                <th>Sl No.</th>
                <th>Payment Type</th>
                <th>Amount</th>
                <th>Date</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($order as $key => $data)
            <tr>
                <th scope="row">{{$key+1}}</th>
                <td>{{$data->payment_type}}</td>
                <td>{{$data->total}}</td>
                <td>{{$data->date}}</td>
                <td>
                    @if ($data->status == 0)
                        <span class="badge badge-warning">Pending</span>
                    @elseif ($data->status == 1)
                        <span class="badge badge-primary">Payment Accept</span>
                    @elseif ($data->status == 2)
                        <span class="badge badge-info">On the way</span>
                    @elseif ($data->status == 3)
                        <span class="badge badge-success">Delevered</span>
                    @else
                        <span class="badge badge-danger">Cancel</span>                            
                    @endif    
                </td>
                <td>
                    <a href="{{ url('author/order/view/'.$data->id) }}" class="btn btn-sm btn-info" style="float: none; margin: 5px;" title="View"><span class="fa fa-eye text-light"></span></a>
                </td>
            </tr>
            @endforeach
        </tbody>        
    </table>
    <div>
        <div class="float-right">{{ $order->links() }}</div>
    </div>
@endsection
