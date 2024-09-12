<?php

namespace App\Infra\Repositories;

use App\Domain\Entities\Group;
use App\Domain\Entities\Product;
use App\Models\Product as ProductModel;
use App\Http\Filters\SearchProductFilter;
use App\Application\Mappers\ProductMapper;

class ProductRepository
{

    public function getAllProductsWithGroups(): ProductModel
    {
        return ProductModel::join('groups', 'products.group_id', '=', 'groups.id')
            ->select('products.*', 'groups.name as group_name')
            ->get();
    }
    public function getAllProducts()
    {
        $productsWithGroups = ProductModel::all();
        return $productsWithGroups;
    }
    public function getProductById($id): ProductModel
    {
        return ProductModel::join('groups', 'products.group_id', '=', 'groups.id')
            ->select('products.*', 'groups.name as group_name')
            ->where('products.id', $id)
            ->firstOrFail();
    }
    public function store(Product $product): Product|bool
    {

        $productModel = new ProductModel();
        $productModel->name = $product->getName();
        $productModel->price = $product->getPrice();
        $productModel->description = $product->getDescription();
        $productModel->group_id = $product->getGroup()->getId();
        if ($productModel->save()) {
            return $product;
        }
        return false;
    }
    public function update(Product $product): bool|Product
    {
        $productModel = new ProductModel();
        $productModel = ProductModel::findOrFail($product->getId());
        $productModel->name = $product->getName();
        $productModel->price = $product->getPrice();
        $productModel->description = $product->getDescription();
        $productModel->group_id = $product->getGroup()->getId();
        if ($productModel->save()) {
            return $product;
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
