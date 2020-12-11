<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;
use Cart;
use DB;

class PaymentController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function payment_process(Request $request){
        $data = [
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'address' => $request->address,
            'city' => $request->city,
            'payment' => $request->payment
        ];
        $dbt = DB::table('shipping_cost')->latest()->first();
        $data['charge'] = $dbt->shipping_charge;
        $data['fixedPrice'] = Session::get('fixedPrice');
        if($request->payment == 'stripe'){
            return view('pages.payment.stripe')->with($data);
        }else{
            return view('pages.payment.stripe')->with($data);
        }
    }
    public function stripeCharge(Request $request){
        $total = $request->total;
        // Set your secret key. Remember to switch to your live secret key in production!
        // See your keys here: https://dashboard.stripe.com/account/apikeys
        \Stripe\Stripe::setApiKey('sk_test_51HpCHCDHXnolxYEmAucNYDs5mAqchpduGBtCu0WCiQa7ehd2f3OFJjLwHQUS6xkqnn3JvztilfihZFLAH2kOZmyb00IGffdc1i');
        $token = $_POST['stripeToken'];

        $charge = \Stripe\Charge::create([
            'amount' => $total*100,
            'currency' => 'usd',
            'description' => 'Big Onlineshop',
            'source' => $token,
            'metadata' => [
                'order_id' => uniqid(),
            ],
        ]);
        
        $data = [
            'user_id' => Auth::id(),
            'payment_id' => $charge->payment_method,
            'paying_amount' => $charge->amount/100,
            'bln_transection' => $charge->balance_transaction,
            'stripe_order_id' => $charge->metadata->order_id,
            'shipping' => $request->shipping,
            'vat' => $request->vat,
            'total' => $request->total,
            'payment_type' => $request->payment_type,
            'status' => 0,
            'date' => date('d-m-y'),
            'month' => date('M'),
            'year' => date('Y'),
        ];
        if(Session::has('coupon')){
            $data['discount'] = Session::get('coupon')['discount'];
        }
        else{
            $data['discount'] = 0;
        }
        $order_id = DB::table('orders')->insertGetId($data);
        // insert Shipping table
        $shipping = [
            'order_id' => $order_id,
            'ship_name' => $request->ship_name,
            'ship_email' => $request->ship_email,
            'ship_phone' => $request->ship_phone,
            'ship_address' => $request->ship_address,
            'ship_city' => $request->ship_city,
        ]; 
        DB::table('order_shippings')->insert($shipping);

        // insert order details table 
        $content = Cart::content();
        $details = [];
        foreach($content as $data){
            $details['order_id'] = $order_id;
            $details['product_id'] = $data->id;
            $details['color'] = $data->options->color;
            $details['size'] = $data->options->size;
            $details['qty'] = $data->qty;
            $details['price'] = $data->price;
            $details['total'] = $data->price * $data->qty;
            DB::table('order_details')->insert($details);
        }

        Cart::destroy();
        if(Session::has('coupon')){
            Session::forget('coupon');
            Session::forget('fixedPrice');
        }
        toast('Payment Successfully','toast_success')->position('top-end')->width('auto')->padding('5px')->background('#28a745')->timerProgressBar();  
        return redirect('');
    }
}
