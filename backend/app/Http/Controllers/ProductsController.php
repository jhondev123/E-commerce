<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UpdateProductRequest;
use App\Application\Services\ProductsServices;
use App\Http\Requests\StoreProductRequest;

class ProductsController extends Controller
{
    public function __construct(private ProductsServices $productService) {}
    public function index(Request $request)
    {
        $products = $this->productService->getAllProductsWithGroup($request);
        return response()->json($products);
    }


    public function store(StoreProductRequest $request)
    {
        try {
            $productData = $this->productService->store($request->validated());
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
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

    public function update(UpdateProductRequest $request, string $id)
    {
        try {
            $productData = $this->productService->update($request->validated(), $id);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
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
