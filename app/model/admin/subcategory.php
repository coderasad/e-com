<?php

namespace App\model\admin;

use Illuminate\Database\Eloquent\Model;

class subcategory extends Model
{
    protected $fillable = [
        'subcategory_name', 'category_id'
    ];
    public function cat()
    {
        return $this->belongsTo(category::class, 'category_id');
    }
}
