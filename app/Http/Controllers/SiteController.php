<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\model\admin\Subscriber;

use App\model\admin\Product;
use App\model\admin\category;
use App\model\admin\subcategory;
use App\model\admin\brand;
use App\model\author\wishlist;
use Auth;
use DB;


class SiteController extends Controller
{
    public function index()
    {
        $data['category'] = category::orderBy('category_name','ASC')->get();
        $data['subcategory'] = subcategory::orderBy('subcategory_name','ASC')->get();
        $data['product'] = product::where('status',1)->orderBy('id','DESC')->get();  
        return view('pages.index')->with($data); 

    }
    // Shop page 
    public function shop()
    {
        $data['category'] = category::orderBy('category_name','ASC')->get();
        $data['subcategory'] = subcategory::orderBy('subcategory_name','ASC')->get();
        $data['brand'] = brand::orderBy('brand_name','ASC')->get();
        $data['product'] = product::where('status',1)->orderBy('id','DESC')->Paginate(8);  
        return view('pages.shop')->with($data); 

    }
    // Shop category page 
    public function categoryPage($name,$id)
    {
        $data['category'] = category::orderBy('category_name','ASC')->get();
        $data['subcategory'] = subcategory::orderBy('subcategory_name','ASC')->get();
        $data['brand'] = brand::orderBy('brand_name','ASC')->get();
        $data['product'] = product::where('status',1)->where('category_id',$id)->orderBy('id','DESC')->Paginate(8); 
        return view('pages.shop')->with($data); 

    }
    // Shop subcat page 
    public function subcatPage($name,$id)
    {
        $data['category'] = category::orderBy('category_name','ASC')->get();
        $data['subcategory'] = subcategory::orderBy('subcategory_name','ASC')->get();
        $data['brand'] = brand::orderBy('brand_name','ASC')->get();
        $data['product'] = product::where('status',1)->where('subcategory_id',$id)->orderBy('id','DESC')->Paginate(8);
        return view('pages.shop')->with($data); 

    }
    // Shop brand page 
    public function brandPage($name,$id)
    {
        $data['category'] = category::orderBy('category_name','ASC')->get();
        $data['subcategory'] = subcategory::orderBy('subcategory_name','ASC')->get();
        $data['brand'] = brand::orderBy('brand_name','ASC')->get();
        $data['product'] = product::where('status',1)->where('brand_id',$id)->orderBy('id','DESC')->Paginate(8);
        return view('pages.shop')->with($data); 

    }
    
    // subscriber============
    public function subscriber(Request $request)
    {
        $validatedData = $request->validate([
            'email' => 'required|unique:subscribers|max:55',
        ]);        
        $data = [
            'email'=>$request['email']
        ];
        $db = DB::table('subscribers')->insert($data);   
        if($db){            
            toast('Thanks for Subscribing','toast_success')->position('top-end')->width('auto')->padding('5px')->persistent(false)->autoClose(3000)->background('#28a745')->animation('tada faster','fadeInUp faster')->timerProgressBar();
            return redirect()->back();
        }
        else{            
            toast('Email already Subscribe','toast_success')->position('top-end')->width('auto')->padding('5px')->persistent(false)->autoClose(3000)->background('#28a745')->animation('tada faster','fadeInUp faster')->timerProgressBar();
            return redirect()->back();
        }
    }

    public function chat_store(Request $request){
        $arr = [
            "chat" => $request->input("chat"),
        ];
            if(DB::table('chats')->insert($arr)){
            return\Response::json(['success'=>'done']);
        }
    }
}
