@extends('admin.admin_layout')
@section('admin_content')
  <div class="sl-mainpanel">
    <div class="sl-page-body modal-dialog pt-5">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="insertModalLabe">Coupon Update</h5>
          <a href="{{ url('admin/coupon')}} " class="btn rounded btn-primary float-right font-weight-bold"><i class="fa fa-reply mr-2"></i>Back</a>
        </div>   
        <form action="{{ url('admin/coupon/'.$db->id) }}" method="post">
          @csrf
          @method('patch')
          <div class="modal-body">
            <div class="form-group">
              <label for="recipient-name" class="col-form-label">Coupon</label>
              <input type="text" class="form-control  @error ('coupon') is-invalid @enderror" id="recipient-name" name="coupon" value="{{ $db->coupon }}">
              @error('coupon')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
            <div class="form-group">
              <label for="recipient-name2" class="col-form-label">Coupon</label>
              <input type="text" class="form-control  @error ('discount') is-invalid @enderror" id="recipient-name2" name="discount" value="{{ $db->discount }}">
              @error('discount')
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
