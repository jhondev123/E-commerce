<?php

namespace App\Domain\UseCases\Product;

use App\Application\Mappers\ProductMapper;
use App\Application\DTO\Product\ProductDTO;
use App\Application\Factories\ProductFactory;
use App\Infra\Repositories\ProductRepository;
use App\Application\DTO\Product\StoreProductDTO;

final class StoreProductUseCase
{
    public function __construct(private ProductRepository $productRepository, private ProductFactory $productFactory) {}
    public function execute(StoreProductDTO $dto): ProductDTO
    {
        $product =  $this->productFactory->createProductFromDtoToStore($dto);
        return ProductMapper::toDTOForStore($this->productRepository->store($product));
    }
}
