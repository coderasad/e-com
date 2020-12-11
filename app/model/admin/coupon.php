<?php

namespace App\model\admin;

use Illuminate\Database\Eloquent\Model;

class coupon extends Model
{
    protected $fillable = [
        'coupon','discount'
    ];
}
