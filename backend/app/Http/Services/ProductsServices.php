<?php

namespace App\Http\Services;

use Illuminate\Http\Request;
use App\Domain\Entities\Group;
use App\Domain\Entities\Product;
use App\Models\Product as ProductModel;
use App\Http\Filters\SearchProductFilter;
use App\Http\Requests\SearchProductRequest;
use App\Http\Repositories\ProductRepository;

final class ProductsServices
{
    public function __construct(private ProductRepository $productRepository) {}
    public function getAllProductsWithGroup(Request $request)
    {
        $productsWithGroup = $this->productRepository->getAllProductsWithGroups();
        return $productsWithGroup;
    }
    public function getAllProducts()
    {
        $products =  $this->productRepository->getAllProducts();
        return $products;
    }
    public function getProductById($id)
    {
        $product =  $this->productRepository->getProductById($id);
        return $product;
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'group' => 'required|numeric|exists:groups,id',
        ]);

        $productData = $validatedData;
        $product = new Product();
        $product->setName($productData['name']);
        $product->setPrice($productData['price']);
        $product->setDescription($productData['description']);
        $product->setGroup(new Group($productData['group']));
        return $this->productRepository->store($product);
    }
    public function update(Request $request, string $id)
    {
        $productData = $request->validate([
            'name' => 'nullable|string',
            'description' => 'nullable|string',
            'price' => 'nullable|numeric',
            'group' => 'nullable|numeric|exists:groups,id',
        ]);

        $product = new Product();
        if ($productData['name']) {
            $product->setName($productData['name']);
        }
        if (isset($productData['price'])) {
            $product->setPrice($productData['price']);
        }
        if (isset($productData['description'])) {
            $product->setDescription($productData['description']);
        }
        if (isset($productData['group'])) {
            $product->setGroup(new Group($productData['group']));
        }

        $updatedProduct = $this->productRepository->update($productData, $id);
        if ($updatedProduct) {
            return $updatedProduct;
        }
        return false;
    }
    public function destroy(string $id)
    {
        return $this->productRepository->destroy($id);
    }
    public function search(Request $request)
    {
        $filter = new SearchProductFilter();
        $data = $request->validate([
            'name' => 'nullable|string',
            'description' => 'nullable|string',
            'group' => 'nullable|numeric|exists:groups,id',
        ]);
        
        $filter->setFilters($data);
        return $this->productRepository->search($filter);
    }
}
