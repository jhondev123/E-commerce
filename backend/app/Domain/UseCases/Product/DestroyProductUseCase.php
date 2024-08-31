<?php

namespace App\Domain\UseCases\Product;

use App\Infra\Repositories\ProductRepository;

final class DestroyProductUseCase
{
    public function __construct(private ProductRepository $repository) {}
    public function execute($id): bool
    {
        return $this->repository->destroy($id);
    }
}
