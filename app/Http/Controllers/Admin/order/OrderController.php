<?php

namespace App\Http\Controllers\admin\order;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class OrderController extends Controller
{
    // NEW ORDERS========
    public function ordernew(){
        $order = DB::table('orders')->where('status',0)->orderBy('id','DESC')->get();
        return view('admin.order.pending', compact('order'));
    }

    // VIEW ORDER=======
    public function vieworder($id){
        $data = [
            'order' => DB::table('orders')->join('users','orders.user_id','users.id')->select('users.name','users.phone','orders.*')->where('orders.id',$id)->first(),
        
            'shipping' => DB::table('order_shippings')->where('order_id',$id)->first(),

            'details' => DB::table('order_details')->join('products','order_details.product_id','products.id')->select('order_details.*','products.product_code','products.image_one','products.product_name')->where('order_details.order_id',$id)->get()
        ];
        return view('admin.order.order_view')->with($data);
    }

    // paymentAccept 
    public function acceptPayment($id){
        DB::table('orders')->where('id',$id)->update(['status'=>1]);

        toast('Payment Accept','toast_success')->position('top-end')->width('auto')->padding('5px')->persistent(false)->autoClose(3000)->background('#28a745')->animation('tada faster','fadeInUp faster')->timerProgressBar();
        return redirect()->route('admin.neworder');
    }
    // progressDeleveryUpdate 
    public function progressDeleveryUpdate($id){
        DB::table('orders')->where('id',$id)->update(['status'=>2]);

        toast('Delivery Progress','toast_success')->position('top-end')->width('auto')->padding('5px')->persistent(false)->autoClose(3000)->background('#28a745')->animation('tada faster','fadeInUp faster')->timerProgressBar();
        return redirect()->route('admin.neworder');
    }
    // successDeleveryUpdate 
    public function successDeleveryUpdate($id){
        $product = DB::table('order_details')->where('order_id',$id)->get();
        // dd($product);
        foreach($product as $row){
            $a = $row->qty;
            $b = DB::table('products')->where('id',$row->product_id)->first();
            $c = $b->product_quantity;
            $d = DB::table('products')
                ->where('id',$row->product_id)
                ->update(['product_quantity'=> $c - $a]);
        }
        // dd($d);
        DB::table('orders')->where('id',$id)->update(['status'=>3]);
        DB::table('order_shippings')->where('order_id',$id)->update(['delivery_date'=>date('d-m-y')]);

        toast('Delivery Success','toast_success')->position('top-end')->width('auto')->padding('5px')->persistent(false)->autoClose(3000)->background('#28a745')->animation('tada faster','fadeInUp faster')->timerProgressBar();
        return redirect()->route('admin.neworder');
    }

    // paymentCancel 
    public function paymentCancel($id){
        DB::table('orders')->where('id',$id)->update(['status'=>4]);
        
        toast('Payment Cancel','toast_success')->position('top-end')->width('auto')->padding('5px')->persistent(false)->autoClose(3000)->background('#28a745')->animation('tada faster','fadeInUp faster')->timerProgressBar();
        return redirect()->route('admin.neworder');
    }

    // acceptPayment 
    public function paymentAccept(){
        $order = DB::table('orders')->where('status',1)->orderBy('id','DESC')->get();
        return view('admin.order.pending', compact('order'));
    }

    // progressDelevery 
    public function progressDelevery(){
        $order = DB::table('orders')->where('status',2)->orderBy('id','DESC')->get();
        return view('admin.order.pending', compact('order'));
    }

    // successDelevery 
    public function successDelevery(){
        $order = DB::table('orders')->where('status',3)->orderBy('id','DESC')->get();
        return view('admin.order.pending', compact('order'));
    }

    // cancelOrder 
    public function cancelOrder(){
        $order = DB::table('orders')->where('status',4)->orderBy('id','DESC')->get();
        return view('admin.order.pending', compact('order'));
    }
}
