@extends('admin.admin_layout')
@section('admin_content')

  <!-- ########## START: MAIN PANEL ########## -->
  <div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
      <a class="breadcrumb-item" href="{{ route('admin.dashboard') }}">Starlight</a>
      <span class="breadcrumb-item active">Single Product Details</span>
    </nav>
    <div class="sl-pagebody">
      <div class="card pd-20 pd-sm-40">
        <h6 class="card-body-title">{{ $data->product_name }}
          <a href="{{url('admin/product')}}" class="btn rounded btn-warning float-right font-weight-bold">Back</a>
        </h6>
        <div class="table-wrapper">
          <table class="table display responsive nowrap">
            <tbody>
              <tr>
                <th style="width:12%">Product Name</th>
                <td style="width:1%" >:</td>
                <td>{{ $data->product_name }}</td>
                <th style="width:12%">Product Code</th>
                <td style="width:1%" >:</td>
                <td>{{ $data->product_code }}</td>
                <th style="width:12%">Product Quantity</th>
                <td style="width:1%" >:</td>
                <td>{{ $data->product_quantity }}</td>
              </tr>
              <tr>
                <th>Product Color</th>
                <td>:</td>
                <td>
                @if ($data->product_color != null)                  
                  {{ $data->product_color }}
                @else
                  <i class="fa fa-close font-italic" aria-hidden="true"></i>                    
                @endif
                </td>
                <th>Product Size</th>
                <td>:</td>
                <td>
                @if ($data->product_size != null)                  
                  {{ $data->product_size }}
                @else
                  <i class="fa fa-close font-italic" aria-hidden="true"></i>                    
                @endif
                </td>
                <th>Product Price</th>
                <td>:</td>
                <td>{{ $data->selling_price }}</td>
              </tr>              
              <tr>
                <th>Product Details</th>
                <td>:</td>
                <td colspan="4">{!! $data->product_details !!}</td>
                <th>Discount Price</th>
                <td>:</td>
                <td>
                @if ($data->discount_price != null)                  
                  {{ $data->discount_price }}
                @else
                  <i class="fa fa-close font-italic" aria-hidden="true"></i>                    
                @endif
                </td>
              </tr>
              <tr>
                <th>Video Link</th>
                <td>:</td>
                <td>
                @if ($data->video_link != null)                  
                  {{ $data->video_link }}
                @else
                  <i class="fa fa-close font-italic" aria-hidden="true"></i>                    
                @endif
                </td>
                <th>Main Slider</th>
                <td>:</td>
                <td>
                  @if ($data->main_slider == 1)
                    <i class="fa fa-check-square font-italic" aria-hidden="true"></i>
                  @else
                    <i class="fa fa-close font-italic" aria-hidden="true"></i>                    
                  @endif
                </td>
                <th>Hot Deal</th>
                <td>:</td>
                <td>
                  @if ($data->hot_deal == 1)
                    <i class="fa fa-check-square font-italic" aria-hidden="true"></i>
                  @else
                  <i class="fa fa-close font-italic" aria-hidden="true"></i>                    
                  @endif
                </td>
              </tr>
              <tr>
                <th>Best Rated</th>
                <td>:</td>
                <td>
                  @if ($data->best_rated == 1)
                    <i class="fa fa-check-square font-italic" aria-hidden="true"></i>
                  @else
                  <i class="fa fa-close font-italic" aria-hidden="true"></i>                    
                  @endif
                </td>
                <th>Mid Slider</th>
                <td>:</td>
                <td>
                  @if ($data->mid_slider == 1)
                    <i class="fa fa-check-square font-italic" aria-hidden="true"></i>
                  @else
                  <i class="fa fa-close font-italic" aria-hidden="true"></i>                    
                  @endif
                </td>
                <th>Hot New</th>
                <td>:</td>
                <td>
                  @if ($data->hot_new == 1)
                    <i class="fa fa-check-square font-italic" aria-hidden="true"></i>
                  @else
                  <i class="fa fa-close font-italic" aria-hidden="true"></i>                    
                  @endif
                </td>
              </tr>
              <tr>
                <th>trend</th>
                <td>:</td>
                <td>
                  @if ($data->trend == 1)
                    <i class="fa fa-check-square font-italic" aria-hidden="true"></i>
                  @else
                  <i class="fa fa-close font-italic" aria-hidden="true"></i>                    
                  @endif
                </td>
                <th>Category</th>
                <td>:</td>
                <td>{{ $data->category->category_name }}</td>
                <th>Brand</th>
                <td>:</td>
                <td>{{ $data->brand->brand_name }}</td>
              </tr>
              <tr>
                <th>Main Image</th>
                <td>:</td>
                <td><img width="50px" src={{ asset("public/frontend/images/product/{$data->id}-product-img-main{$data->image_one}") }} alt=""></td>
                <th>Image Two</th>
                <td>:</td>
                <td><img width="50px" src={{ asset("public/frontend/images/product/{$data->id}-product-img-two{$data->image_two}") }} alt=""></td>
                <th>Image Three</th>
                <td>:</td>
                <td><img width="50px" src={{ asset("public/frontend/images/product/{$data->id}-product-img-three{$data->image_three}") }} alt=""></td>
              </tr>
            </tbody>
          </table>
        </div><!-- table-wrapper -->

      </div><!-- card -->      
    </div><!-- sl-mainpanel -->
  </div>
  <!-- ########## END: MAIN PANEL ########## -->


@endsection

