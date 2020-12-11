<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\user;
use Illuminate\Support\facades\Auth;
use Hash;
use DB;


class DashboardController extends Controller
{
    public function index(){
        $date = date('d-m-y');
        $year = date('Y');
        $month = date('F');
        $month = substr($month,0,3);
        $data = [
            'todayOrder' => DB::table('orders')->where('date',$date)->sum('total'),
            'todayDelivery' => DB::table('orders')->where('date',$date)->where('status',3)->sum('total'),
            'monthOrder' => DB::table('orders')->where('month',$month)->sum('total'),
            'yearlyOrder' => DB::table('orders')->where('year',$year)->sum('total'),
            'product' => DB::table('products')->get(),
            'category' => DB::table('categories')->get(),
            'brand' => DB::table('brands')->get(),
            'users' => DB::table('users')->get(),
        ];
        return view('admin.dashboard')->with($data);
    }
    
}
