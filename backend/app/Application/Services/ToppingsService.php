<?php

namespace App\Application\Services;

use Illuminate\Http\Request;
use App\Infra\Repositories\ToppingRepository;

final class ToppingsService
{
    public function __construct(private ToppingRepository $toppingRepository) {}
    public function getAllToppings()
    {
        return $this->toppingRepository->getAllToppings();
    }
    public function getToppingById($id) {}
    public function store(Request $request) {}
    public function update(Request $request, string $id) {}
    public function destroy(string $id) {}
}
