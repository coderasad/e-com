<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\model\admin\Product;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function testApi(){
        $product = Product::all();
        return json_encode($product);
    }
}
