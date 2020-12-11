<?php

namespace App\Http\Controllers\admin\product;
use App\Http\Controllers\Controller;
use App\model\admin\Product;
use App\model\admin\category;
use App\model\admin\subcategory;
use App\model\admin\brand;
use Illuminate\Http\Request;
use DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['count'] = 1;
        $data['product'] = product::orderBy('id', 'DESC')->get();
        return view('admin.product.product.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {        
        $data['category'] = category::orderBy('category_name', 'ASC')->get();
        $data['brand'] = brand::orderBy('brand_name', 'ASC')->get();
        return view('admin.product.product.create')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {  
        $imageOne = $request->file('image_one');
        $imageTwo = $request->file('image_two');
        $imageThree = $request->file('image_three');
        $extOne = '.'.strtolower($imageOne->getClientOriginalExtension());
        $extTwo = '.'.strtolower($imageTwo->getClientOriginalExtension());
        $extThree = '.'.strtolower($imageThree->getClientOriginalExtension());
        $product = new product();
        $product->category_id = $request->category_id;
        $product->subcategory_id = $request->subcategory_id;
        $product->brand_id = $request->brand_id;
        $product->product_name = trim($request->product_name);
        $product->product_slug = $request->product_slug;
        $product->product_code = $request->product_code;
        $product->product_quantity = $request->product_quantity;
        $product->product_details = $request->product_details;
        $product->product_color = $request->product_color;
        $product->product_size = $request->product_size;
        $product->selling_price = $request->selling_price;
        $product->video_link = $request->video_link;
        $product->main_slider = $request->main_slider;
        $product->hot_deal = $request->hot_deal;
        $product->best_rated = $request->best_rated;
        $product->mid_slider = $request->mid_slider;
        $product->hot_new = $request->hot_new;
        $product->trend = $request->trend;
        $product->status = 1;
        $product->image_one = $extOne;
        $product->image_two = $extTwo;
        $product->image_three = $extThree;
        $product->save();
        $id = $product->id;        
        $image_nameOne = $id.'-product-img-main'.$extOne;
        $image_nameTwo = $id.'-product-img-two'.$extTwo;
        $image_nameThree = $id.'-product-img-three'.$extThree;
        $upload_path = 'public/frontend/images/product/';
        $success = $imageOne->move($upload_path,$image_nameOne); 
        $success = $imageTwo->move($upload_path,$image_nameTwo); 
        $success = $imageThree->move($upload_path,$image_nameThree); 
        toast('Product Inserted Successfully','toast_success')->position('top-end')->width('auto')->padding('5px')->background('#28a745')->timerProgressBar();
        return redirect()->to('admin/product');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\model\admin\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = product::findorfail($id);
        return view ('admin.product.product.show',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\model\admin\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['product'] = product::findorfail($id);
        $data['category'] = category::orderBy('category_name', 'ASC')->get();
        $data['subcategory'] = subcategory::orderBy('subcategory_name', 'ASC')->get();
        $data['brand'] = brand::orderBy('brand_name', 'ASC')->get();
        return view('admin.product.product.edit')->with($data);    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\model\admin\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $imageOne = $request->file('image_one');
        $imageTwo = $request->file('image_two');
        $imageThree = $request->file('image_three');
        $product = product::findorfail($id);
        if($imageOne){
            $extOne = '.'.strtolower($imageOne->getClientOriginalExtension());
            unlink($request->old_main_img);   
        }
        else{
            echo $extOne = $product->image_one;
        }
        if($imageTwo){
            $extTwo = '.'.strtolower($imageTwo->getClientOriginalExtension()); 
            unlink($request->old_two_img);    
        }
        else{
            echo $extTwo = $product->image_two;
        }
        if($imageThree){
            $extThree = '.'.strtolower($imageThree->getClientOriginalExtension());
            unlink($request->old_three_img);   
        }
        else{
            echo $extThree = $product->image_three;
        }
  
        $product->category_id = $request->category_id;
        $product->subcategory_id = $request->subcategory_id;
        $product->brand_id = $request->brand_id;
        $product->product_name = trim($request->product_name);
        $product->product_slug = $request->product_slug;
        $product->product_code = $request->product_code;
        $product->product_quantity = $request->product_quantity;
        $product->product_details = $request->product_details;
        $product->product_color = $request->product_color;
        $product->product_size = $request->product_size;
        $product->selling_price = $request->selling_price;
        $product->discount_price = $request->discount_price;
        $product->video_link = $request->video_link;
        $product->main_slider = $request->main_slider;
        $product->hot_deal = $request->hot_deal;
        $product->best_rated = $request->best_rated;
        $product->mid_slider = $request->mid_slider;
        $product->hot_new = $request->hot_new;
        $product->trend = $request->trend;
        $product->image_one = $extOne;
        $product->image_two = $extTwo;
        $product->image_three = $extThree;
        $product->save();
        $id = $product->id;        
        $image_nameOne = $id.'-product-img-main'.$extOne;
        $image_nameTwo = $id.'-product-img-two'.$extTwo;
        $image_nameThree = $id.'-product-img-three'.$extThree;        
        $upload_path = 'public/frontend/images/product/';

        if($imageOne){
            $success = $imageOne->move($upload_path,$image_nameOne); 
        }
        if($imageTwo){
            $success = $imageTwo->move($upload_path,$image_nameTwo); 
        }
        if($imageThree){
            $success = $imageThree->move($upload_path,$image_nameThree);
        }
 
        toast('Product Update Successfully','toast_success')->position('top-end')->width('auto')->padding('5px')->background('#28a745')->timerProgressBar();
        return redirect()->to('admin/product'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\model\admin\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $db = product::findorfail($id);
        $imageone = $db->image_one;
        $imagetwo = $db->image_two;
        $imagethree = $db->image_three;
        $db->delete();
        unlink("public/frontend/images/product/$id-product-img-main$imageone");
        unlink("public/frontend/images/product/$id-product-img-two$imagetwo");
        unlink("public/frontend/images/product/$id-product-img-three$imagethree");
        
        toast('Product Deleted Successfully','toast_success')->position('top-end')->width('auto')->padding('5px')->persistent(false)->autoClose(3000)->background('#dc3545')->animation('tada faster','fadeInUp faster')->timerProgressBar();
        return redirect()->back();
    }

    // active unactive route 
    public function active($id)
    {
        DB::table('products')->where('id',$id)->update(['status'=>1]);
        toast('Product Active','toast_success')->position('top-end')->width('auto')->padding('5px')->background('#28a745')->timerProgressBar();
        return redirect()->back();
    }
    public function unactive($id)
    {
        DB::table('products')->where('id',$id)->update(['status'=>0]);
        toast('Product Unactive','toast_success')->position('top-end')->width('auto')->padding('5px')->background('#dc3545')->timerProgressBar();
        return redirect()->back();
    }

    /**
    * ajax sub-category storage
    */
    public function select_subcategory(Request $request)
    {
        if($request->category_id){
            $subcategory = subcategory::where('category_id', $request->category_id)->orderBy('subcategory_name', 'ASC')->get();
            if($subcategory){
                foreach($subcategory as $data){
                    echo "<option value='{$data->id}'>$data->subcategory_name</option>";
                }
            }
        }
    }
    /**
    * ajax product-slug storage
    */
    public function unique_name(Request $request)
    {
        $title = $request->title;        
        $all_product = product::where('product_name',$title)->count();  
        if($all_product > 0){
            echo "Name has already used";
        }       
    } 
    public function unique_name_edit(Request $request)
    {
        $title = $request->title;        
        $id = $request->id;        
        $all_product = product::where('product_name',$title)->where('id','!=',$id)->count();  
        if($all_product > 0){
            echo "Name has already used";
        }    
    }               
}
