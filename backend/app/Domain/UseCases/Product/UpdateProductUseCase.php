<?php

namespace App\Domain\UseCases\Product;

use App\Domain\Entities\Product;
use App\Application\Mappers\ProductMapper;
use App\Application\DTO\Product\ProductDTO;
use App\Application\Factories\ProductFactory;
use App\Infra\Repositories\ProductRepository;
use App\Application\DTO\Product\UpdateProductDTO;

final class UpdateProductUseCase
{

    public function __construct(private ProductRepository $productRepository, private ProductFactory $productFactory) {}

    public function execute(UpdateProductDTO $dto): ProductDTO
    {
        $existingProduct = $this->productRepository->getProductById($dto->id);
        $updatedProduct = $this->productFactory->createProductFromDtoToUpdate($dto, $existingProduct);
        return ProductMapper::toDTOForUpdate($this->productRepository->update($updatedProduct));
    }
}
