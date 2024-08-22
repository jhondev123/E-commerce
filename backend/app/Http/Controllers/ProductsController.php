<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Services\ProductsServices;

class ProductsController extends Controller
{
    public function __construct(private ProductsServices $productService) {}
    public function index(Request $request)
    {
        $products = $this->productService->getAllProductsWithGroup($request);
        return response()->json($products);
    }


    public function store(Request $request)
    {
        $productData = $this->productService->store($request);

        if (!$productData) {
            return response()->json(['error' => 'Could not create product'], 500);
        }
        return response()->json([
            'message' => 'Product created successfully',
            'data' => $productData,
        ], 201);
    }


    public function show(string $id)
    {
        $product = $this->productService->getProductById($id);
        return response()->json($product);
    }

    public function update(Request $request, string $id)
    {
        $productData = $this->productService->update($request, $id);

        if (!$productData) {
            return response()->json(['error' => 'Could not update product'], 500);
        }
        return response()->json([
            'message' => 'Product updated successfully',
            'data' => $productData,
        ], 200);
    }

    public function destroy(string $id)
    {
        $deleted = $this->productService->destroy($id);

        if (!$deleted) {
            return response()->json(['error' => 'Could not delete product'], 500);
        }
        return response()->json(['message' => 'Product deleted successfully'], 200);
    }
    public function search(Request $request)
    {
        $products = $this->productService->search($request);
        return response()->json($products);
    }
}
