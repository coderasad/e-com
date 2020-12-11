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
      <span class="breadcrumb-item active">Product Table</span>
    </nav>
    <div class="sl-pagebody">
      <div class="card pd-20 pd-sm-40">
        <h6 class="card-body-title">Product List
          <a href="{{url('admin/product/create')}}" class="btn rounded btn-warning float-right font-weight-bold">Add New</a>
        </h6>
        <div class="table-wrapper">
          <table id="datatable1" class="table display responsive nowrap text-center">
            <thead>
              <tr>
                <th>Sl No</th>
                <th>Product Name</th>
                <th>Product Code</th>
                <th>Category</th>
                <th>Brand</th>
                <th>Quantity</th>
                <th>Image</th>
                <th>Status</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($product as $data)
                <tr>
                  <td>{{ $count++ }}</td>
                  <td>{{ $data->product_name }}</td>
                  <td>{{ $data->product_code }}</td>
                  <td>{{ $data->category->category_name }}</td>
                  <td>{{ $data->brand->brand_name }}</td>
                  <td>{{ $data->product_quantity }}</td>
                  <td><img width="50px" src={{ asset("public/frontend/images/product/{$data->id}-product-img-main{$data->image_one}") }} alt=""></td>
                  <td>
                    @if ($data->status == 1 )
                      <span class="badge badge-success">Active</span>
                    @else
                      <span class="badge badge-danger">Unactive</span>
                    @endif
                  </td>
                  
                  <td>
                    <div class="btn-group-sm" style="float: none;">
                      <a href="{{ url('admin/product/'.$data->id) }}" class="btn btn-sm btn-warning" style="float: none; margin: 5px;" title="View"><span class="fa fa-eye text-light"></span></a>

                      @if ($data->status == 1 )
                        <a href="{{ url('admin/product/'.$data->id.'/unactive') }}" title="Unactive" class="btn btn-sm btn-success" style="float: none; margin: 5px;"><span class="fa fa-thumbs-up text-light"></span></a>
                      @else
                        <a href="{{ url('admin/product/'.$data->id.'/active') }}" title="Active" class="btn btn-sm btn-danger" style="float: none; margin: 5px;"><span class="fa fa-thumbs-down text-light"></span></a>
                      @endif  

                      <a href="{{ url('admin/product/'.$data->id.'/edit') }}" title="Edit" class="btn btn-sm btn-info" style="float: none; margin: 5px;"><span class="fa fa-pencil text-light"></span></a>

                      <a data-toggle="modal" data-target="#deleteModal" href=" {{URL::to('admin/product/'.$data->id.'/destroy')}} " title="Delete" class="btn btn-sm btn-danger deleteModal" style="float: none; margin: 5px;"><span class="fa fa-trash text-light"></span></a>
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
