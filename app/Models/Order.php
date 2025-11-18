<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'order_id', 'user_id', 'name', 'phone', 'zip', 'state', 'city', 'address',
        'locality','landmark','subtotal','vat','total','payment_method','status','discount','delivered_date','canceled_date'
    ];

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    protected $casts = [
    'delivered_date' => 'datetime',
    'canceled_date' => 'datetime',
];

}
