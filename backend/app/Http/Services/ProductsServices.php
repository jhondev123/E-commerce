<?php

namespace App\Http\Services;

use Illuminate\Http\Request;
use App\Http\Requests\SearchProductRequest;
use App\Models\Product;

class ProductsServices
{
    public function allProducts()
    {
        return Product::all();
    }
    public function searchProduct()
    {
        
    }
}
