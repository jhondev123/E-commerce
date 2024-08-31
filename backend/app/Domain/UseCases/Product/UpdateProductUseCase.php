<?php

namespace App\Domain\UseCases\Product;

use App\Domain\Entities\Product;
use App\Application\Factories\ProductFactory;
use App\Infra\Repositories\ProductRepository;
use App\Application\DTO\Product\UpdateProductDTO;

final class UpdateProductUseCase
{

    public function __construct(private ProductRepository $productRepository, private ProductFactory $productFactory)
    {
    }

    public function execute(UpdateProductDTO $dto): Product
    {
        $existingProduct = $this->productRepository->getProductById($dto->id);
        $updatedProduct = $this->productFactory->createProductFromDtoToUpdate($dto, $existingProduct);
        return $this->productRepository->update($updatedProduct);
    }
}
