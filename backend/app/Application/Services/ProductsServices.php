<?php

namespace App\Application\Services;

use Illuminate\Http\Request;
use App\Domain\Entities\Group;
use App\Domain\Entities\Product;
use App\Http\Filters\SearchProductFilter;
use App\Http\Requests\UpdateProductRequest;
use App\Application\Factories\ProductFactory;
use App\Infra\Repositories\ProductRepository;
use App\Application\DTO\Product\UpdateProductDTO;
use App\Domain\UseCases\Product\UpdateProductUseCase;

final class ProductsServices
{
    public function __construct() {}
    public function getAllProductsWithGroup(Request $request) {}
    public function getAllProducts() {}
    public function getProductById($id) {}
    public function store(array $productData)
    {

    }
    public function update(array $productData, string $id)
    {

        $useCase = new UpdateProductUseCase(new ProductRepository(), new ProductFactory());
        $dto = new UpdateProductDTO(
            id: $id,
            name: $productData['name'] ?? null,
            price: $productData['price'] ?? null,
            description: $productData['description'] ?? null,
            group: $productData['group'] ?? null,
        );
        
        dd($useCase->execute($dto));
    }
    public function destroy(string $id) {}
    public function search(Request $request) {}
}
