<?php

namespace App\Application\Factories;

use App\Domain\Entities\Group;
use App\Domain\Entities\Product;
use App\Application\DTO\Product\UpdateProductDTO;

final class ProductFactory
{
    public function createProductFromDtoToUpdate(UpdateProductDTO $dto, Product $existingProduct): Product
    {
        $product = new Product();
        $product->setId($dto->id);
        $product->setName($dto->name ?? $existingProduct->getName());
        $product->setDescription($dto->description ?? $existingProduct->getDescription());
        $product->setPrice($dto->price ?? $existingProduct->getPrice());
        $groupId = $dto->group ?? $existingProduct->getGroup()->getId();
        $product->setGroup(new Group($groupId));

        return $product;
    }
}
