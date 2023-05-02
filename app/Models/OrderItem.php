<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;

    function orders(){
        return $this->belongsTo(Order::class, 'order_id','id'); // model , foreignkey, local key of the other table  
    }
    function products(){
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }
}
