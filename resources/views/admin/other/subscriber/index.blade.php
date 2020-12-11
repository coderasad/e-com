@extends('admin.admin_layout')
@push('css')
  <link href="{{asset('public/backend/lib/datatables/jquery.dataTables.css')}}" rel="stylesheet">
  <link href="{{asset('public/backend/lib/select2/css/select2.min.css')}}" rel="stylesheet">
@endpush
@section('admin_content')

  <!-- ########## START: MAIN PANEL ########## -->
  <div class="sl-mainpanel">
    <div class="sl-pagebody">
      <div class="sl-page-title">
        <h5>Subscribe Table</h5>
      </div><!-- sl-page-title -->
      <div class="card pd-20 pd-sm-40">
        <h6 class="card-body-title">Subscribe List
          <a href="#" class="btn rounded btn-danger float-right font-weight-bold">All Delete</a>
        </h6>
        <div class="table-wrapper">
          <table id="datatable1" class="table display responsive nowrap text-center">
            <thead>
              <tr>
                <th style="width:10%">Sl No</th>
                <th style="width:70%">Email</th>
                <th style="width:70%">Subscribing Time</th>
                <th style="width:20%">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($subscriber as $data)
                <tr>
                  <td><input name="" type="checkbox"> {{ $count++ }}</td>
                  <td>{{ $data->email}}</td>
                  <td>{{ \Carbon\Carbon::parse($data->created_at)->diffForHumans() }}</td>
                  <td>
                    <div class="btn-group-sm" style="float: none;">
                      <a data-toggle="modal" data-target="#deleteModal" href=" {{URL::to('admin/subscriber/'.$data->id.'/destroy')}} " class="btn btn-sm btn-danger deleteModal" style="float: none; margin: 5px;"><span class="fa fa-trash text-light"></span></a>
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

 {{-- <!-- Model Insert -->
 <div class="modal fade" id="insert" tabindex="-1" role="dialog" aria-labelledby="insertModalLabe" aria-hidden="true">
  <div class="modal-dialog w-100" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="insertModalLabe">subscriber Add</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>     
      <form action="subscriber" method="post">
        @csrf
        <div class="modal-body">
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">subscriber Code</label>
            <input type="text" class="form-control @error ('email') is-invalid @enderror" value="{{ old ('email') }}" id="recipient-name" name="email">
            @error('email')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
              @enderror
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-warning rounded">Add</button>
          <button type="button" class="btn btn-secondary rounded" data-dismiss="modal">Close</button>
        </div>
      </form>
    </div>
  </div>
</div> --}}


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
