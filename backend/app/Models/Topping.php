<?php

namespace App\Models;

use App\Models\OrderProduct;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Topping extends Model
{
    use HasFactory;
    public function orderProducts()
    {
        return $this->belongsToMany(OrderProduct::class, 'order_product_toppings')
            ->withPivot('quantity', 'extra_price'); // Colunas extras da tabela pivot
    }
}
