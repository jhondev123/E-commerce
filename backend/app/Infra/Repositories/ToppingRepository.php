<?php

namespace App\Infra\Repositories;

use App\Models\Topping as ToppingModel;

final class ToppingRepository
{
    public function getAllToppings(): array
    {
        return ToppingModel::all()->toArray();
    }
    public function getToppingById(string $id): array
    {
        return ToppingModel::findOrFail($id)->toArray();
    }
    public function store(array $toppingData): array
    {
        $toppingModel = new ToppingModel();
        $toppingModel->name = $toppingData['name'];
        $toppingModel->description = $toppingData['description'];
        $toppingModel->price = $toppingData['price'];
        if ($toppingModel->save()) {
            return $toppingModel->toArray();
        }
        return [];
    }
    public function update(array $toppingData, string $id): array
    {
        $toppingModel = ToppingModel::findOrFail($id);
        $toppingModel->name = $toppingData['name'] ?? $toppingModel->name;
        $toppingModel->description = $toppingData['description'] ?? $toppingModel->description;
        $toppingModel->price = $toppingData['price'] ?? $toppingModel->price;
        if ($toppingModel->save()) {
            return $toppingModel->toArray();
        }
        return [];
    }
    public function destroy(string $id): bool
    {
        $toppingModel = ToppingModel::findOrFail($id);
        return $toppingModel->delete();
    }
}
