<?php

namespace App\model\admin;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'product_name',
        'product_slug',
        'category_id',
        'subcategory_id',
        'brand_id',
        'product_code',
        'product_quantity',
        'product_details',
        'product_color',
        'product_size',
        'selling_price',
        'discount_price',
        'video_link',
        'main_slider',
        'hot_deal',
        'best_rated',
        'mid_slider',
        'hot_new',
        'trend',
        'image_one',
        'image_two',
        'image_three',
        'status'
    ];

    public function category()
    {
        return $this->belongsTo(category::class, 'category_id');
    }
    public function subcategory()
    {
        return $this->belongsTo(subcategory::class, 'subcategory_id');
    }
    public function brand()
    {
        return $this->belongsTo(brand::class, 'brand_id');
    }

    
}
