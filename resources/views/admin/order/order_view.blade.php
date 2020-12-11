@extends('admin.admin_layout')
@push('css')
  <link href="{{asset('public/backend/lib/datatables/jquery.dataTables.css')}}" rel="stylesheet">
  <link href="{{asset('public/backend/lib/select2/css/select2.min.css')}}" rel="stylesheet">
@endpush
@section('admin_content')

  <!-- ########## START: MAIN PANEL ########## -->
  <div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
      <a class="breadcrumb-item" href="{{ route('admin.dashboard') }}">Starlight</a>
      <span class="breadcrumb-item active">Single Order Table</span>
    </nav>
    <div class="sl-pagebody">
      <div class="card pd-20 pd-sm-40">
        <div class="table-wrapper">
          <div class="row">
            <div class="col-6">
              <table class="table display responsive nowrap text-center">
                <thead>
                  <tr>
                    <th colspan="2" class="text-center"><h6>Order Details</h6></th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th>Name</th>
                    <th>{{$order->name}}</th>
                  </tr>
                  <tr>
                    <th>Phone</th>
                    <th>{{$order->phone}}</th>
                  </tr>
                  <tr>
                    <th>Payment</th>
                    <th>{{$order->payment_type}}</th>
                  </tr>
                  <tr>
                    <th>Payment ID</th>
                    <th>{{$order->payment_id}}</th>
                  </tr>
                  <tr>
                    <th>Total</th>
                    <th>{{$order->total}}</th>
                  </tr>
                  <tr>
                    <th>Month</th>
                    <th>{{$order->month}}</th>
                  </tr>
                  <tr>
                    <th>Date</th>
                    <th>{{$order->date}}</th>
                  </tr>

                </tbody>
              </table>
            </div>
            <div class="col-6">
              <table class="table display responsive nowrap text-center">
                <thead>
                  <tr>
                    <th colspan="2" class="text-center"><h6>Shipping Details</h6></th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th>Name</th>
                    <th>{{$shipping->ship_name}}</th>
                  </tr>
                  <tr>
                    <th>Phone</th>
                    <th>{{$shipping->ship_phone}}</th>
                  </tr>
                  <tr>
                    <th>Email</th>
                    <th>{{$shipping->ship_email}}</th>
                  </tr>
                  <tr>
                    <th>Address</th>
                    <th>{{$shipping->ship_address}}</th>
                  </tr>
                  <tr>
                    <th>City</th>
                    <th>{{$shipping->ship_city}}</th>
                  </tr>
                  <tr>
                    <th>Country</th>
                    <th>Bangladesh</th>
                  </tr>
                  <tr>
                    <th>Status</th>
                    <th>
                        @if ($order->status == 0)
                          <span class="badge badge-warning">Pending</span>
                        @elseif ($order->status == 1)
                          <span class="badge badge-primary">Payment Accept</span>
                        @elseif ($order->status == 2)
                          <span class="badge badge-info">Progress</span>
                        @elseif ($order->status == 3)
                          <span class="badge badge-success">Delevered</span>
                        @else
                          <span class="badge badge-danger">Cancel</span>                            
                        @endif
                    </th>
                  </tr>
                </tbody>
              </table>
            </div>
            <div class="col-12">
              <div class="table-wrapper">
                <h6 class="card-body-title mt-3">Product Details List</h6>
                <table class="table display responsive nowrap text-center">
                  <thead>
                    <tr>
                      <th>Sl No</th>
                      <th>Product Code</th>
                      <th>Product Name</th>
                      <th>Image</th>
                      <th>Color</th>
                      <th>Size</th>
                      <th>Qty</th>
                      <th>Price</th>
                      <th>Total</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($details as $key => $data)
                      <tr>
                        <td>{{ $key+1 }}</td>
                        <td>{{ $data->product_code }}</td>
                        <td>{{ $data->product_name }}</td>
                        <td><img width="50px" src={{ asset("public/frontend/images/product/{$data->product_id}-product-img-main{$data->image_one}") }} alt=""></td>
                        <td>{{ $data->color }}</td>
                        <td>{{ $data->size }}</td>
                        <td>{{ $data->qty }}</td>
                        <td>{{ $data->price }}</td>
                        <td>{{ $data->total }}</td>
                    @endforeach  
                  </tbody>
                </table>
                @if ($order->status == 0)
                  <a href="{{url('admin/payment/accept/'.$order->id)}}" class="btn btn-info">Payment Accept</a>
                  <a href="{{url('admin/payment/cancel/'.$order->id)}}" class="btn btn-danger">Cancel Order</a>
                @elseif ($order->status == 1)
                  <a href="{{url('admin/delevery/progress/'.$order->id)}}" class="btn btn-info">Delevery Progress</a>
                  <div class="text-danger">*Payment Already Checked and Pass here for delevery request.</div>
                @elseif ($order->status == 2)
                  <a href="{{url('admin/delevery/success/'.$order->id)}}" class="btn btn-info">Delevery Success</a>
                @else
                    
                @endif
              </div><!-- table-wrapper -->
            </div>
          </div>
        </div><!-- table-wrapper -->
      </div><!-- card -->      
    </div><!-- sl-mainpanel -->
  </div>
  <!-- ########## END: MAIN PANEL ########## -->


@endsection
@push('js')
  <script src="{{asset('public/backend/lib/datatables/jquery.dataTables.js')}}"></script>
  <script src="{{asset('public/backend/lib/select2/js/select2.min.js')}}"></script> 
  <script>
    $(function(){
      'use strict';

      $('#datatable1').DataTable({
        responsive: true,
        language: {
          searchPlaceholder: 'Search...',
          sSearch: '',
          lengthMenu: '_MENU_ items/page',
        }
      });

      // Select2
      $('.dataTables_length select').select2({ minimumResultsForSearch: Infinity });

    });
  </script>
@endpush
