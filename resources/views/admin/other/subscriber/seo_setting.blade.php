@extends('admin.admin_layout')
@section('admin_content')
  <div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
      <a class="breadcrumb-item" href="{{ route('admin.dashboard') }}">Starlight</a>
      <span class="breadcrumb-item active">SEO setting Section</span>
    </nav>
    <div class="sl-pagebody">
      <div class="card pd-20 pd-sm-40">
        <h6 class="card-body-title">SEO setting
          <a href="{{ url('admin') }}" class="btn rounded btn-warning float-right font-weight-bold">Back</a>
        </h6>  
       
        <form action="{{ url('admin/update/seo') }}" method="post">
          @csrf
            @foreach ($seo as $data)
              <div class="row">
                <div class="col-lg-6">
                  <div class="form-group">
                    <label>Meta Title <span class="tx-danger">*</span><strong class="tx-danger"></strong></label>
                    <input id="title" required type="text" name="meta_title" class="form-control" value="{{$data->meta_title}}">
                  </div>
                </div> 
                <div class="col-lg-6">
                  <div class="form-group">
                    <label>Meta Author <span class="tx-danger">*</span><strong class="tx-danger"></strong></label>
                    <input id="title" required type="text" name="meta_author" class="form-control" value="{{$data->meta_author}}">
                  </div>
                </div> 
                <div class="col-lg-12">
                  <div class="form-group">
                    <label>Meta Tag <span class="tx-danger">*</span><strong class="tx-danger"></strong></label>
                    <input id="title" required type="text" name="meta_tag" class="form-control" value="{{$data->meta_tag}}">
                  </div>
                </div> 
                <div class="col-lg-12">
                  <div class="form-group">
                    <label>Meta Description <span class="tx-danger">*</span><strong class="tx-danger"></strong></label>
                    <textarea id="title" required type="text" name="meta_description" class="form-control">{{$data->meta_description}}</textarea>
                  </div>
                </div> 
                <div class="col-lg-6">
                  <div class="form-group">
                    <label>Google Analytics<span class="tx-danger">*</span><strong class="tx-danger"></strong></label>
                    <input id="title" required type="text" name="google_analytics" class="form-control" value="{{$data->google_analytics}}">
                  </div>
                </div> 
                <div class="col-lg-6">
                  <div class="form-group">
                    <label>Bing Analytics<span class="tx-danger">*</span><strong class="tx-danger"></strong></label>
                    <input id="title" required type="text" name="bing_analytics" class="form-control" value="{{$data->bing_analytics}}">
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
