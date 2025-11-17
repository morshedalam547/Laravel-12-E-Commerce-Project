<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'order_id','name','phone','zip','state','city','address','locality','landmark',
        'subtotal','vat','total','payment_method', 'status',   'discount',   // ← ★★★ ADD THIS ★★★
    ];

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }
}


