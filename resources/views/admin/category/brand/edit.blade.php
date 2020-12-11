@extends('admin.admin_layout')
@section('admin_content')
  <div class="sl-mainpanel">
    <div class="sl-page-body modal-dialog pt-5">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="insertModalLabe">Brand Update</h5>
          <a href="{{ url('admin/brand')}} " class="btn rounded btn-primary float-right font-weight-bold"><i class="fa fa-reply mr-2"></i>back</a>
        </div>        
       
        <form action="{{ url('admin/brand/'.$db->id) }}" method="post" enctype="multipart/form-data">
          @csrf
          @method('patch')
          <div class="modal-body">
            <div class="form-group">
              <label for="recipient-name" class="col-form-label">Brand Name</label>
              <input type="text" class="form-control @error('brand_name') is-invalid @enderror" id="recipient-name" name="brand_name" value="{{ $db->brand_name }}">
              @error('brand_name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group">
              <label for="imgInp" class="col-form-label">Brand Name</label>
              <input type="file" class="form-control @error('brand_logo') is-invalid @enderror" id="imgInp"  name="brand_logo">

              <input type="hidden" class="form-control" name="old_logo" value="public/frontend/images/brand/brand_logo-{{$db->id}}{{$db->brand_logo}}">
              @error('brand_logo')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group">
              <img src={{asset("public/frontend/images/brand/brand_logo-{$db->id}{$db->brand_logo}")}} alt="Brand_Logo" id="img_show" width="80px">
            </div>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-warning rounded">Update</button>
          </div>
        </form>
      </div>
    </div>
  </div>

@endsection
