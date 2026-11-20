<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OrderItem extends Model
{
    use HasFactory;
    protected $fillable = ['order_id', 'product_id', 'product_name', 'unit_price', 'quantity'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    //el subtotal de los productos
    public function getSubtotalAttribute(): float
    {
        return  $this->unit_price * $this->quantity;
    }
}
