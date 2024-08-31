<?php

namespace App\Application\DTO\Product;

readonly class UpdateProductDTO
{

    public function __construct(
        public readonly string|null $id = null,
        public readonly string|null $name = null,
        public readonly float|null $price = null,
        public readonly string|null $description = null,
        public readonly string|null $group = null,
    ) {}
}
