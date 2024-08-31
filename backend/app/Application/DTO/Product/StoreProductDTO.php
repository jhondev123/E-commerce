<?php

namespace App\Application\DTO\Product;

final class StoreProductDTO
{
    public function __construct(
        public readonly ?string $name,
        public readonly ?float $price,
        public readonly ?string $description,
        public readonly ?string $group
    ) {}
}
