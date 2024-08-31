<?php

namespace App\Domain\UseCases\Product;

use App\Application\Mappers\ProductMapper;
use App\Application\DTO\Product\ProductDTO;
use App\Infra\Repositories\ProductRepository;

final class GetAllProductsUseCase
{
    public function __construct(private ProductRepository $repository) {}

    public function execute(): array
    {
        $products = $this->repository->getAllProductsWithGroups();
        if (!$products) {
            throw new \Exception("Produto não encontrado");
        }
        return array_map([ProductMapper::class, 'toDTO'], $products);
    }
}
