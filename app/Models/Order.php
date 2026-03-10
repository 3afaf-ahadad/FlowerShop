<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'reference', 'customer_name', 'customer_email', 
        'address', 'total_price', 'status'
    ];

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }
}