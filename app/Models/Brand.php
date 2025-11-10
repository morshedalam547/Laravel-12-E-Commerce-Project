<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{

    use HasFactory;
    protected $fillable =['name','slug','image'];

       // ✅ Relationship: এক ব্র্যান্ডের অনেক প্রোডাক্ট থাকতে পারে
    public function products()
    {
        return $this->hasMany(Product::class, 'brand_id');
    }

    public function product(){
        return $this->hasMany(Product::class);
    }

}
