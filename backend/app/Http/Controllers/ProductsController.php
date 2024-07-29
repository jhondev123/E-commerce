<?php

namespace App\Http\Controllers;

use App\Http\Services\ProductsServices;

use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function __construct(private ProductsServices $productsServices)
    {
    }
    public function index()
    {
        return response()->json($this->productsServices->allProducts());
    }


    public function store(Request $request)
    {
    }


    public function show(string $id)
    {
    }

    public function update(Request $request, string $id)
    {
    }

    public function destroy(string $id)
    {
    }
    public function search(Request $request)
    {
    }
}
