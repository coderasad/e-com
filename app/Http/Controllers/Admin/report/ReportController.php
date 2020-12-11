<?php

namespace App\Http\Controllers\admin\report;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\model\admin\Product;
use DB;
use Session;

class ReportController extends Controller
{
    public function todayReport(){
        $today = date('d-m-y');       
        $order = DB::table('orders')->where('status',0)->where('date',$today)->orderBy('id','DESC')->get();
        return view('admin.report.daily_order', compact('order')); 
    }
    public function todayDelivered(){
        $today = date('d-m-y');       
        $order = DB::table('orders')->join('order_shippings', 'orders.id','order_shippings.order_id')->select('orders.*')->where('orders.status',3)->where('order_shippings.delivery_date',$today)->orderBy('id','DESC')->get();
        return view('admin.report.daily_order', compact('order')); 
    }

    // Report VIEW ORDER=======
    public function dailyReportView($id){
        $data = [
            'order' => DB::table('orders')->join('users','orders.user_id','users.id')->select('users.name','users.phone','orders.*')->where('orders.id',$id)->first(),
        
            'shipping' => DB::table('order_shippings')->where('order_id',$id)->first(),

            'details' => DB::table('order_details')->join('products','order_details.product_id','products.id')->select('order_details.*','products.product_code','products.image_one','products.product_name')->where('order_details.order_id',$id)->get()
        ];
        return view('admin.report.order_view')->with($data);
    }

    // stockProduct=======
    public function stockProduct(){
        $data['product'] = product::orderBy('id', 'DESC')->get();
        return view('admin.report.stock')->with($data);
    }

}
