@extends('admin.admin_layout')
@section('admin_content')
  <div class="sl-mainpanel">
    <div class="sl-page-body modal-dialog pt-5">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="insertModalLabe">Category Update</h5>
          <a href="{{ url('admin/category')}} " class="btn rounded btn-primary float-right font-weight-bold"><i class="fa fa-reply mr-2"></i>Back</a>
        </div>   
        <form action="{{ url('admin/category/'.$db->id) }}" method="post" enctype="multipart/form-data">
          @csrf
          @method('patch')
          <div class="modal-body">
            <div class="form-group">
              <label for="recipient-name" class="col-form-label">Category Name</label>
              <input type="text" class="form-control  @error ('category_name') is-invalid @enderror" id="recipient-name" name="category_name" value="{{ $db->category_name }}">
              @error('category_name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
            <div class="form-group">
              <label for="imgInp" class="col-form-label">Category Image</label>
              <input type="file" class="form-control @error('img') is-invalid @enderror" id="imgInp"  name="img">

              @if ($db->img != NULL)
                <input type="hidden" class="form-control" name="old_logo" value="public/frontend/images/category/{{$db->img}}">
              @endif
              @error('img')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            @if ($db->img != NULL)
              <div class="form-group">
                <img src={{asset("public/frontend/images/category/{$db->img}")}} alt="logo" id="img_show" width="80px">
              </div>
            @else              
              <div class="form-group">
                {{-- <img class="mb-3" src="" id="img_show" width="80"/> --}}
                <img src="" id="img_show" width="80px">
              </div>
            @endif
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-warning rounded">Update</button>
          </div>
        </form>
      </div>
    </div>
  </div>

@endsection
