<?php

namespace App\Domain\UseCases\Product;

use App\Application\DTO\Product\ProductDTO;
use App\Application\Mappers\ProductMapper;
use App\Infra\Repositories\ProductRepository;

final class GetProductByIdUseCase
{
    public function __construct(private ProductRepository $repository) {}

    public function execute(string $id): ProductDTO
    {
        $product = $this->repository->getProductById($id);
        return ProductMapper::toDTO($product);
    }
}
