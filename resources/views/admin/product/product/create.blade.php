@extends('admin.admin_layout')
@push('css')
  <link href="{{asset('public/backend/lib/summernote/summernote-bs4.css')}}" rel="stylesheet">
  <link href="{{asset('public/backend/css/jquery.tagsinput-revisited.css')}}" rel="stylesheet">    
@endpush
@section('admin_content')
<div class="sl-mainpanel">
  <nav class="breadcrumb sl-breadcrumb">
    <a class="breadcrumb-item" href="{{ route('admin.dashboard') }}">Starlight</a>
    <span class="breadcrumb-item active">Product Section</span>
  </nav>

  <div class="sl-pagebody">   
    <div class="card pd-20 pd-sm-40">
      <h6 class="card-body-title">New Product Add
      <a href="{{ url('admin/product') }}" class="btn rounded btn-warning float-right font-weight-bold">All Product</a>
      </h6>
      <form action="{{ url('admin/product') }}" method="POST" enctype="multipart/form-data" data-parsley-validate>
        @csrf
        <div class="row">
          <div class="col-lg-4">
            <div class="form-group">
              <label>Product Name <span class="tx-danger">*</span><strong class="uniqueName tx-danger"></strong></label>
              <input id="title" required type="text" name="product_name" class="form-control" placeholder="Enter Product Name">
            </div><!-- form-group -->
          </div><!-- col-lg -->
          <div class="col-lg-4">
            <div class="form-group">
              <label>Slug <span class="tx-danger">*</span></label>
              <input id="slug" readonly type="text" name="product_slug" class="form-control" placeholder="Slug">
            </div><!-- form-group -->
          </div><!-- col-lg -->
          <div class="col-lg-2">
            <div class="form-group">
              <label>Product Code <span class="tx-danger">*</span></label>              
              <input required type="text" name="product_code" class="form-control" placeholder="Enter Product Code">
            </div><!-- form-group -->
          </div><!-- col-lg -->
          <div class="col-lg-2">
            <div class="form-group">
              <label>Quantity <span class="tx-danger">*</span></label>              
              <input required type="number" name="product_quantity" class="form-control" placeholder="Enter Quantity">
            </div><!-- form-group -->
          </div><!-- col-lg -->
          <div class="col-lg-4">
            <div class="form-group">
              <label>Category <span class="tx-danger">*</span></label>
              <select name="category_id" required class="form-control" >
                <option label="Select Category"></option>
                @foreach ($category as $data)
                  <option value="{{ $data->id }}">{{ $data->category_name }}</option>
                @endforeach
              </select>
            </div><!-- form-group -->
          </div><!-- col-lg -->
          <div class="col-lg-4">
            <div class="form-group">
              <label>Sub Category <span class="tx-danger">*</span></label>
              <select name="subcategory_id" class="form-control" required>
                <option lavel="Select Sub Category"></option>
              </select>
            </div><!-- form-group -->
          </div><!-- col-lg -->
          <div class="col-lg-4">
            <div class="form-group">
              <label>Brand <span class="tx-danger">*</span></label>
              <select name="brand_id" class="form-control" required>
                <option lavel="Select Brand"></option>
                @foreach ($brand as $data)
                  <option value="{{ $data->id }}">{{ $data->brand_name }}</option>
                @endforeach
              </select>
            </div><!-- form-group -->
          </div><!-- col-lg -->
          <div class="col-lg-4">
            <div class="form-group">
              <label>Product Size <span class="tx-danger"></span></label>              
              <input id="form-tags-4" name="product_size" type="text" class="form-control" >
            </div><!-- form-group -->
          </div><!-- col-lg -->
          <div class="col-lg-4">
            <div class="form-group">
              <label>Product Color <span class="tx-danger"></span></label>              
              <input id="form-tags-3" type="text" name="product_color" class="form-control" placeholder="Enter Product Color">
            </div><!-- form-group -->
          </div><!-- col-lg -->
          <div class="col-lg-4">
            <div class="form-group">
              <label>Selling Price <span class="tx-danger">*</span></label>              
              <input required type="number" name="selling_price" class="form-control" placeholder="Enter Selling Price">
            </div><!-- form-group -->
          </div><!-- col-lg -->
          <div class="col-lg-12">
            <div class="form-group">
              <label>Product Details <span class="tx-danger">*</span></label>  
              <textarea required id="summernote" class="form-control" name="product_details"></textarea>     
            </div><!-- form-group -->
          </div><!-- col-lg -->
          <div class="col-lg-12">
            <div class="form-group">
              <label>Video Link <span class="tx-danger"></span></label>              
              <input type="text" name="video_link" class="form-control" placeholder="Enter Video Link">
            </div><!-- form-group -->
          </div><!-- col-lg -->
          <div class="col-lg-4">
            <div class="form-group">
              <label>Image One (Main Thumbnail) <span class="tx-danger">*</span></label>  
              <label class="custom-file">            
                <input type="file" name="image_one" id="inputImgOne" class="custom-file-input">
                <span class="custom-file-control"></span>
              </label>
              <div>
                <img class="mt-2" src="" id="showImgOne" width="80"/>
              </div>
            </div><!-- form-group -->
          </div><!-- col-lg -->
          <div class="col-lg-4">
            <label>Image Two <span class="tx-danger">*</span></label>              
            <label class="custom-file">
              <input type="file" name="image_two" id="inputImgTwo" class="custom-file-input">
              <span class="custom-file-control"></span>
            </label>
            <div>
              <img class="mt-2" src="" id="showImgTwo" width="80"/>
            </div>
          </div><!-- col-lg -->
          <div class="col-lg-4">
            <label>Image Three <span class="tx-danger">*</span></label>              
            <label class="custom-file">
              <input type="file" name="image_three" id="inputImgThree" class="custom-file-input">
              <span class="custom-file-control"></span>
            </label>
            <div>
              <img class="mt-2" src="" id="showImgThree" width="80"/>
            </div>
          </div><!-- col-lg -->          
          <div class="col-lg-12">          
            <hr>
          </div><!-- col-lg --> 
          <div class="col-lg-4">          
            <label class="ckbox">
              <input name="main_slider" type="checkbox" value="1">
              <span>Main Slider</span>
            </label>
          </div><!-- col-lg -->
          <div class="col-lg-4">          
            <label class="ckbox">
              <input name="hot_deal" type="checkbox" value="1">
              <span>Hot Deal</span>
            </label>
          </div><!-- col-lg -->
          <div class="col-lg-4">          
            <label class="ckbox">
              <input name="best_rated" type="checkbox" value="1">
              <span>Best Rated</span>
            </label>
          </div><!-- col-lg -->
          <div class="col-lg-4">          
            <label class="ckbox">
              <input name="mid_slider" type="checkbox" value="1">
              <span>Mid Slider</span>
            </label>
          </div><!-- col-lg -->
          <div class="col-lg-4">          
            <label class="ckbox">
              <input name="hot_new" type="checkbox" value="1">
              <span>Hot New</span>
            </label>
          </div><!-- col-lg -->
          <div class="col-lg-4">          
            <label class="ckbox">
              <input name="trend" type="checkbox" value="1">
              <span>Trand Product</span>
            </label>
          </div><!-- col-lg -->
          <div class="col-lg-12">          
            <hr>
          </div><!-- col-lg -->  
          <div class="col-lg-12">          
            <button type="submit" disabled id='disableButton' class="btn btn-warning rounded">Submit</button>
          </div><!-- col-lg -->        
        </div><!-- row -->        
      </form>
    </div><!-- card -->
  </div><!-- sl-pagebody -->
</div><!-- sl-mainpanel -->

@endsection
@push('js')
  <script src="{{asset('public/backend/lib/parsleyjs/parsley.js')}}"></script> 
  <script src="{{asset('public/backend/lib/summernote/summernote-bs4.min.js')}}"></script> 
  <script src="{{asset('public/backend/lib/medium-editor/medium-editor.js')}}"></script> 
  <script src="{{asset('public/backend/js/jquery.tagsinput-revisited.js')}}"></script> 
  <script>
    $(function(){  
      // ajax product slug here ========
      $("#title").keyup(function(){
        var title = $.trim($(this).val().toLowerCase());
        var rep = title.replace(/ /g, "-");
        var slug = rep.replace(/\_/g, "-");
        $("#slug").val(slug); 
        if(slug){
          $.ajax({
            type : 'post',
            url : "{{URL::to('admin/unique_name')}}",
            data : {
              title : title,
            }, 
            success : function(data){
              $(".uniqueName").text(data);
            }
          })
        }
      })

      // ajax product slug here ========
      $("body").click(function(){
        var uniqueName = $('.uniqueName').text();
          if(uniqueName != ''){ 
            $('#disableButton').attr('disabled','disabled');
          }else{            
            $('#disableButton').removeAttr('disabled','disabled');
          }
        })

      // ajax sub category here ========
      $("select[name='category_id']").on('change',function(){
        var category_id = parseInt($(this).val());
        if (category_id >= 1) {
          $.ajax({   
            type : "post",                
            url : "{{URL::to('admin/select_subcategory')}}",
            data : {
              category_id : category_id,
            }, 
            success : function(data){
              $("select[name='subcategory_id']").html(data);
            }
          })
        }
        else {
          $("select[name='subcategory_id']").html("<option>Choose Category first</option>");
        }
      })

      // tag input 
      $('#form-tags-4').tagsInput({
          'autocomplete': {
            source: [
              'M',
              'L',
              'XL'
            ]
          }
        });
      $('#form-tags-3').tagsInput({
          'autocomplete': {
            source: [
              'M',
              'L',
              'XL'
            ]
          }
        });

      // Summernote editor
      'use strict';
      // Inline editor
      var editor = new MediumEditor('.editable');
      $('#summernote').summernote({
        height: 150,
        tooltip: false
      })

      // Image show instant start============
      function readURLa(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#showImgOne').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
      }
      $("#inputImgOne").change(function () {
          readURLa(this);
      });
      
      function readURLaTwo(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#showImgTwo').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
      }
      $("#inputImgTwo").change(function () {
          readURLaTwo(this);
      }); 

      function readURLaThree(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#showImgThree').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
      }
      $("#inputImgThree").change(function () {
          readURLaThree(this);
      });
  
    });
  </script>
@endpush