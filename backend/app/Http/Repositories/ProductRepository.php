<?php

namespace App\Http\Repositories;

use App\Domain\Entities\Product;
use App\Http\Filters\SearchProductFilter;
use App\Models\Product as ProductModel;

class ProductRepository
{
    public function getAllProductsWithGroups()
    {
        $productsWithGroups = ProductModel::join('groups', 'products.group_id', '=', 'groups.id')
            ->select('products.*', 'groups.name as group_name')
            ->get();

        return $productsWithGroups;
    }
    public function getAllProducts()
    {
        $productsWithGroups = ProductModel::all();
        return $productsWithGroups;
    }
    public function getProductById($id)
    {
        $product = ProductModel::find($id)->join('groups', 'products.group_id', '=', 'groups.id')
            ->select('products.*', 'groups.name as group_name');
        return $product;
    }
    public function store(Product $product): array|bool
    {
        $productModel = new ProductModel();
        $productModel->name = $product->getName();
        $productModel->price = $product->getPrice();
        $productModel->description = $product->getDescription();
        $productModel->group_id = $product->getGroup()->getId();
        if ($productModel->save()) {
            return $productModel->toArray();
        }
        return false;
    }
    public function update(array $productData, string $id): bool|array
    {
        $productModel = new ProductModel();
        $productModel = ProductModel::findOrFail($id);
        if (!$productModel) {
            return false;
        }
        if (isset($productData['name'])) {
            $productModel->name = $productData['name'];
        }
        if (isset($productData['price'])) {
            $productModel->price = $productData['price'];
        }
        if (isset($productData['description'])) {
            $productModel->description = $productData['description'];
        }
        if (isset($productData['group'])) {
            $productModel->group_id = $productData['group'];
        }

        if ($productModel->save()) {
            return $productModel->toArray();
        }
        return false;
    }
    public function destroy(string $id): bool
    {
        $productModel = ProductModel::findOrFail($id);
        if ($productModel) {
            return $productModel->delete();
        }
        return false;
    }
    public function search(SearchProductFilter $filter): array
    {
        $query = ProductModel::join('groups', 'products.group_id', '=', 'groups.id')
            ->select('products.*', 'groups.name as group_name');

        if ($filter->getSearchByName()) {
            $query->where('products.name', 'LIKE', "%{$filter->getSearchByName()}%");
        }
        if ($filter->getSearchByDescription()) {
            $query->where('products.description', 'LIKE', "%{$filter->getSearchByDescription()}%");
        }
        if ($filter->getSearchByGroup()) {
            $query->where('products.group_id', $filter->getSearchByGroup());
        }

        return $query->get()->toArray();
    }
}
