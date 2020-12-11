<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\model\admin\Product;
use App\model\admin\coupon;
use Cart;
use Auth;
use Session;
use DB;

class CartController extends Controller
{
    public function addCart(Request $request, $id){
        $product = product::where('id', $id)->first();
        $qty = $request->qty;
        
            if($product->discount_price == NULL){
                Cart::add([
                    'id' => $product->id, 
                    'name' => $product->product_name, 
                    'qty' => $qty,
                    'price' => $product->selling_price,
                    'weight' => 1, 
                    'options' => [
                        'image' => $product->image_one,
                        'color' => $product->product_color
                        ]
                ]);
            }else{
                Cart::add([
                    'id' => $product->id, 
                    'name' => $product->product_name, 
                    'qty' => 1,
                    'price' => $product->discount_price,
                    'weight' => 1, 
                    'options' => [
                        'image' => $product->image_one,
                        'color' => $product->product_color
                        ]
                ]);
            }
      
            // echo "$product->id";
            return response()->json([
                'total' => Cart::subtotal(),
                'count' => Cart::count(),
                'msg' => "<div class='alert alert-success' role='alert'>
                <button type='button' class='close ml-3' data-dismiss='alert' aria-label='Close'>
                <span aria-hidden='true' class='pointer'>&times;</span>
                </button>
                <div class='d-flex align-items-center justify-content-start'>
                    <i class='fas fa-info-circle mr-2'></i>
                    <span><strong>Product Added Successfully</strong></span>
                </div>
            </div>"
            ]);
        
    }
    public function remove($id){
        $rowId = $id;
        Cart::remove($rowId);
        
        return response()->json(
            "<div class='alert alert-danger' role='alert'>
                <button type='button' class='close ml-3' data-dismiss='alert' aria-label='Close'>
                    <span aria-hidden='true' class='pointer'>&times;</span>
                </button>
                <div class='d-flex align-items-center justify-content-start'>
                    <i class='fas fa-info-circle mr-2'></i>
                    <span><strong>Product Removed Successfully</strong></span>
                </div>
            </div>"
        );
    }
    // cart view============
    public function cartView(){
        return view('pages.cart');
    }
    // cart update============
    public function cartUpdate(Request $request){
        $rowId = $request->rowId;
        $qty = $request->qty;
        Cart::update($rowId,$qty);
        return redirect()->back();
    }
    // check out ================
    public function checkOut(){  
        if(Auth::check()){
            $dbt = DB::table('shipping_cost')->latest()->first();
            $data['shipping_cost'] = $dbt->shipping_charge;
            Session::put('fixedPrice',Cart::Subtotal() + $data['shipping_cost']);

            return view('pages.checkout')->with($data);
        }else{
            toast('At first login your account','toast_success')->position('top-end')->width('auto')->padding('5px')->background('#28a745')->timerProgressBar();  
            return view("auth.login");              
        }   
    }
    // coupon ==============
    public function coupon_code(Request $request){  
        $coupon = $request->coupon;
        $check = coupon::where('coupon',$coupon)->first();        
        
        if($check){
            $dbt = DB::table('shipping_cost')->latest()->first();
            $data = [
                'discounts' => ($check->discount),
                'shipping_cost' => $dbt->shipping_charge
            ];
            Session::put('coupon',[
               'name' => $check->coupon, 
               'discount' => $check->discount, 
            ]);            
            Session::put('fixedPrice',Cart::Subtotal() + $data['shipping_cost'] - $data['discounts']);
            toast('Successfully Coupon Applied','toast_success')->position('top-end')->width('auto')->padding('5px')->background('#28a745')->timerProgressBar();  
            return view('pages.checkout_coupon')->with($data); 
        }else{
            toast('Invalid Coupon Applied','toast_error')->position('top-end')->width('auto')->padding('5px')->background('#f27373')->timerProgressBar();  
            return redirect()->back();
        }

    }
}
