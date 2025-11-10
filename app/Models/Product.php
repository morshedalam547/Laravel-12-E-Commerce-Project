<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{

     use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'category_id',
        'brand_id',
        'short_description',
        'description',
        'regular_price',
        'sale_price',
        'quantity',
        'stock_status',
        'featured',
        'image',
        'images'
    ];
   public function category()
{
    return $this->belongsTo(Category::class,'category_id');
}  
public function brand()
{
    return $this->belongsTo(Brand::class,'brand_id');
}


}
