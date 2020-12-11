<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\model\admin\Product;
use App\model\admin\category;
use App\model\admin\subcategory;
use App\model\admin\brand;

class ProductController extends Controller
{
    public function ProductView($product_slug){        
        $data['brand'] = brand::orderBy('id','DESC')->get(); 
        $data['product'] = product::where('status',1)->where('product_slug',$product_slug)->orderBy('id','DESC')->first();  
        $data['sub_product'] = product::where('status',1)->where('category_id',$data['product']->category_id)->orderBy('id','DESC')->get();
        $data['product_color'] = explode(',' , $data['product'] ->product_color);
        $data['product_size'] = explode(',' , $data['product'] ->product_size);
        return view('pages.product_details')->with($data);
    }
    public function searchProduct(Request $request){
        $data['category'] = category::orderBy('category_name','ASC')->get();
        $data['subcategory'] = subcategory::orderBy('subcategory_name','ASC')->get();
        $data['brand'] = brand::orderBy('brand_name','ASC')->get();
        $item = $request->search;
        $data['product'] = product::where('product_name','LIKE',"%{$item}%")->Paginate(8); 
        return view('pages.shop')->with($data);
    }
}
