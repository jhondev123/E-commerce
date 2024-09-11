<?php

namespace App\Application\Services;

use Illuminate\Http\Request;
use App\Domain\Entities\Product;
use Illuminate\Support\Facades\DB;
use App\Application\DTO\Product\StoreProductDTO;
use App\Application\Factories\ProductFactory;
use App\Infra\Repositories\ProductRepository;
use App\Application\DTO\Product\UpdateProductDTO;
use Exception;

final class ProductsServices
{
    public function __construct(private ProductRepository $repository, private ProductFactory $factory) {}
    public function getAllProductsWithGroup(): array
    {
        return $this->repository->getAllProductsWithGroups();
    }
    public function getProductById($id): Product
    {
        return $this->repository->getProductById($id);
    }
    public function store(StoreProductDTO $dto): Product
    {
        $product = $dto->toEntity();
        DB::beginTransaction();
        try {
            $productStored = $this->repository->store($product);
            DB::commit();
            return $productStored;
        } catch (\PDOexception $e) {
            DB::rollBack();
            throw new Exception("Failed to store product: " . $e->getMessage());
        }
    }
    public function update(UpdateProductDTO $dto, string $id): Product
    {

        $product = $dto->toEntity();
        DB::beginTransaction();

        try {
            $productUpdated = $this->repository->update($product);
            DB::commit();
            return $productUpdated;
        } catch (\PDOexception $e) {
            DB::rollBack();
            throw new Exception("Failed to update product: " . $e->getMessage());
        }
    }
    public function destroy(string $id): bool
    {
        return $this->repository->destroy($id);
    }
    public function search(Request $request) {}
}
