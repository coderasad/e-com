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
        <h5>Brand Table</h5>
      </div><!-- sl-page-title -->
      <div class="card pd-20 pd-sm-40">
        <h6 class="card-body-title">Brand List
          <a data-toggle="modal" data-target="#insert" href="#" class="btn rounded btn-warning float-right font-weight-bold">Add New</a>
        </h6>
        <div class="table-wrapper">
          <table id="datatable1" class="table display responsive nowrap text-center">
            <thead>
              <tr>
                <th style="width:10%">Sl No</th>
                <th style="width:30%">Brand Name</th>
                <th style="width:40%">Brand Logo</th>
                <th style="width:20%">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($brand as $data)
                <tr>
                  <td>{{ $count++ }}</td>
                  <td>{{ $data->brand_name }}</td>
                  <td><img src={{asset("public/frontend/images/brand/brand_logo-{$data->id}{$data->brand_logo}")}} alt="Brand_Logo" width="80px"></td>
                  <td>
                    <div class="btn-group-sm" style="float: none;">
                      <a href="{{ url('admin/brand/'.$data->id.'/edit') }}" class="btn btn-sm btn-info" style="float: none; margin: 5px;"><span class="fa fa-pencil text-light"></span></a>

                      <a data-toggle="modal" data-target="#deleteModal" href=" {{URL::to('admin/brand/'.$data->id.'/destroy')}} " class="btn btn-sm btn-danger deleteModal" style="float: none; margin: 5px;"><span class="fa fa-trash text-light"></span></a>
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

  <!-- Model Insert -->
  <div class="modal fade" id="insert" tabindex="-1" role="dialog" aria-labelledby="insertModalLabe" aria-hidden="true">
    <div class="modal-dialog w-100" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="insertModalLabe">Brand Add</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>    
        <form action="brand" method="post" enctype="multipart/form-data">
          @csrf
          <div class="modal-body">
            <div class="form-group">
              <label for="recipient-name" class="col-form-label">Brand Name</label>
              <input type="text" class="form-control @error('brand_name') is-invalid @enderror" value="{{ old('brand_name') }}" id="recipient-name" name="brand_name">
              @error('brand_name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group">
              <label for="imgInp" class="col-form-label">Brand Logo</label>
              <input type="file" class="form-control @error('brand_logo') is-invalid @enderror" id="imgInp" name="brand_logo">
              @error('brand_logo')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group">
              <img class="mb-3" src="" id="img_show" width="80"/>
            </div>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-warning rounded">Add</button>
            <button type="button" class="btn btn-secondary rounded" data-dismiss="modal">Close</button>
          </div>
        </form>
      </div>
    </div>
  </div>


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
