@extends('admin.admin_layout')
@section('admin_content')
  <div class="sl-mainpanel">
    <div class="sl-page-body modal-dialog pt-5">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="insertModalLabe">Sub-Category Update</h5>
          <a href="{{ url('admin/subcategory')}} " class="btn rounded btn-primary float-right font-weight-bold"><i class="fa fa-reply mr-2"></i>Back</a>
        </div>   
        <form action="{{ url('admin/subcategory/'.$subcategory->id) }}" method="post">
          @csrf
          @method('patch')
          <div class="modal-body">
            <div class="form-group">
              <label for="recipient-name" class="col-form-label">Sub-Category Name</label>
              <input type="text" class="form-control  @error ('subcategory_name') is-invalid @enderror" id="recipient-name" name="subcategory_name" value="{{ $subcategory->subcategory_name }}">
              @error('subcategory_name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
            <div class="form-group">
              <label for="category-name" class="col-form-label">Category Name</label>
              <select name="category_name" id="category-name" class="form-control @error ('category_name') is-invalid @enderror">
                @foreach ($category as $data)
                  <option value="{{ $data->id }}" <?php
                    if ($subcategory->category_id == $data->id) {echo 'selected';}?> >{{ $data->category_name }}
                  </option>  
                @endforeach
              </select>
              @error('category_name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
              @enderror
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
