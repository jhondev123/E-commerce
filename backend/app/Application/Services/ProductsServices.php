<?php

namespace App\Application\Services;

use Illuminate\Http\Request;
use App\Http\Filters\SearchProductFilter;
use App\Application\DTO\Product\ProductDTO;
use App\Application\DTO\Product\StoreProductDTO;
use App\Application\Factories\ProductFactory;
use App\Infra\Repositories\ProductRepository;
use App\Application\DTO\Product\UpdateProductDTO;
use App\Domain\UseCases\Product\DestroyProductUseCase;
use App\Domain\UseCases\Product\UpdateProductUseCase;
use App\Domain\UseCases\Product\GetAllProductsUseCase;
use App\Domain\UseCases\Product\GetProductByIdUseCase;
use App\Domain\UseCases\Product\StoreProductUseCase;
use PhpParser\Node\Expr\Cast\Bool_;

final class ProductsServices
{
    public function __construct(private ProductRepository $repository, private ProductFactory $factory) {}
    public function getAllProductsWithGroup(): array
    {
        $useCase = new GetAllProductsUseCase($this->repository);
        return $useCase->execute();
    }
    public function getProductById($id): ProductDTO
    {
        $usecase = new GetProductByIdUseCase($this->repository);
        return $usecase->execute($id);
    }
    public function store(array $productData): ProductDTO
    {
        $usecase = new StoreProductUseCase($this->repository, $this->factory);
        $dto = new StoreProductDTO(
            name: $productData['name'],
            price: $productData['price'],
            description: $productData['description'],
            group: $productData['group'] ?? null,
        );
        return $usecase->execute($dto);
    }
    public function update(array $productData, string $id): ProductDTO
    {

        $useCase = new UpdateProductUseCase($this->repository, $this->factory);
        $dto = new UpdateProductDTO(
            id: $id,
            name: $productData['name'] ?? null,
            price: $productData['price'] ?? null,
            description: $productData['description'] ?? null,
            group: $productData['group'] ?? null,
        );
        return $useCase->execute($dto);
    }
    public function destroy(string $id): bool
    {
        $usecase = new DestroyProductUseCase($this->repository);
        return $usecase->execute($id);
    }
    public function search(Request $request) {}
}
