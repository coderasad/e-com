@extends('admin.admin_layout')
@section('admin_content')
  <div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
      <a class="breadcrumb-item" href="{{ route('admin.dashboard') }}">Starlight</a>
      <span class="breadcrumb-item active">Site setting Section</span>
    </nav>
    <div class="sl-pagebody">
      <div class="card pd-20 pd-sm-40">
        <h6 class="card-body-title">SEO setting
          <a href="{{ url('admin') }}" class="btn rounded btn-warning float-right font-weight-bold">Back</a>
        </h6>  
       
        <form action="{{ url('admin/update/site/setting') }}" method="post">
          @csrf
            @foreach ($site as $data)
              <div class="row">
                <div class="col-lg-6">
                  <div class="form-group">
                    <label>Phone One <span class="tx-danger">*</span><strong class="tx-danger"></strong></label>
                    <input id="title" required type="text" name="phone_one" class="form-control" value="{{$data->phone_one}}">
                  </div>
                </div> 
                <div class="col-lg-6">
                  <div class="form-group">
                    <label>Phone Two <span class="tx-danger">*</span><strong class="tx-danger"></strong></label>
                    <input id="title" required type="text" name="phone_two" class="form-control" value="{{$data->phone_two}}">
                  </div>
                </div> 
                <div class="col-lg-6">
                  <div class="form-group">
                    <label>Email <span class="tx-danger">*</span><strong class="tx-danger"></strong></label>
                    <input id="title" required type="text" name="email" class="form-control" value="{{$data->email}}">
                  </div>
                </div> 
                <div class="col-lg-6">
                  <div class="form-group">
                    <label>company_name <span class="tx-danger">*</span><strong class="tx-danger"></strong></label>
                    <input id="title" required type="text" name="company_name" class="form-control" value="{{$data->company_name}}">
                  </div>
                </div> 
                <div class="col-lg-6">
                  <div class="form-group">
                    <label>Company Address<span class="tx-danger">*</span><strong class="tx-danger"></strong></label>
                    <input id="title" required type="text" name="company_address" class="form-control" value="{{$data->company_address}}">
                  </div>
                </div> 
                <div class="col-lg-6">
                  <div class="form-group">
                    <label>Facebook<span class="tx-danger">*</span><strong class="tx-danger"></strong></label>
                    <input id="title" required type="text" name="facebook" class="form-control" value="{{$data->facebook}}">
                  </div>
                </div> 
                <div class="col-lg-6">
                  <div class="form-group">
                    <label>Youtube<span class="tx-danger">*</span><strong class="tx-danger"></strong></label>
                    <input id="title" required type="text" name="youtube" class="form-control" value="{{$data->youtube}}">
                  </div>
                </div> 
                <div class="col-lg-6">
                  <div class="form-group">
                    <label>Instragram<span class="tx-danger">*</span><strong class="tx-danger"></strong></label>
                    <input id="title" required type="text" name="instragram" class="form-control" value="{{$data->instragram}}">
                  </div>
                </div>  
                <div class="col-lg-6">
                  <div class="form-group">
                    <label>Twitter<span class="tx-danger">*</span><strong class="tx-danger"></strong></label>
                    <input id="title" required type="text" name="twitter" class="form-control" value="{{$data->twitter}}">
                  </div>
                </div>  
                <input type="hidden" name="id" value="{{$data->id}}">         
                <div class="col-lg-12">          
                  <button type="submit" class="btn btn-warning rounded">Update</button>
                </div><!-- col-lg -->        
              </div><!-- row --> 
            @endforeach
        </form>
      </div><!-- card -->
    </div><!-- sl-pagebody -->
  </div><!-- sl-mainpanel -->

@endsection
