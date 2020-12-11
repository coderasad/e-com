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
      <span class="breadcrumb-item active">Orders Table</span>
    </nav>
    <div class="sl-pagebody">
      <div class="card pd-20 pd-sm-40">
        <h6 class="card-body-title">New Orders List</h6>
        <div class="table-wrapper">
          <table id="datatable1" class="table display responsive nowrap text-center">
            <thead>
              <tr>
                <th>Sl No</th>
                <th>Payment Type</th>
                <th>Transection ID</th>
                <th>Discount</th>
                <th>Shipping</th>
                <th>Total</th>
                <th>Date</th>
                <th>Status</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($order as $key => $data)
                <tr>
                  <td>{{ $key+1 }}</td>
                  <td>{{ $data->payment_type }}</td>
                  <td>{{ $data->payment_id }}</td>
                  <td>{{ $data->discount }}</td>
                  <td>{{ $data->shipping }}</td>
                  <td>{{ $data->total }}</td>
                  <td>{{ $data->date }}</td>
                  <td>
                    @if ($data->status == 0)
                          <span class="badge badge-warning">Pending</span>
                        @elseif ($data->status == 1)
                          <span class="badge badge-primary">Payment Accept</span>
                        @elseif ($data->status == 2)
                          <span class="badge badge-info">Progress</span>
                        @elseif ($data->status == 3)
                          <span class="badge badge-success">Delevered</span>
                        @else
                          <span class="badge badge-danger">Cancel</span>                            
                        @endif
                  </td>
                  
                  <td>
                    <div class="btn-group-sm" style="float: none;">
                      <a href="{{ url('admin/report/view/'.$data->id) }}" class="btn btn-sm btn-warning" style="float: none; margin: 5px;" title="View"><span class="fa fa-eye text-light"></span></a>
                    </div>
                  </td>
                </tr>
              @endforeach  
            </tbody>
          </table>
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
