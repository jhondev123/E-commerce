<?php

namespace App\Infra\Repositories;

use App\Domain\Entities\Topping;
use App\Models\Topping as ToppingModel;

final class ToppingRepository
{
    public function getAllToppings(): array
    {
        return ToppingModel::all()->toArray();
    }
    public function getToppingById(string $id): Topping
    {
        $topping = ToppingModel::findOrFail($id);
        return new Topping(
            $topping->price,
            $topping->id,
            $topping->name,
            $topping->description,
            $topping->created_at,
            $topping->updated_at
        );
    }
    public function store(Topping $topping): Topping
    {
        $toppingModel = new ToppingModel();
        $toppingModel->name = $topping->name;
        $toppingModel->description = $topping->description;
        $toppingModel->price = $topping->getPrice();
        $toppingModel->save();
        return $topping;
    }
    public function update(Topping $topping, string $id): Topping
    {
        $toppingModel = ToppingModel::findOrFail($id);
        $toppingModel->name = $topping->name;
        $toppingModel->description = $topping->description;
        $toppingModel->price = $topping->getPrice();
        return $topping;
    }
    public function destroy(string $id): bool
    {
        $toppingModel = ToppingModel::findOrFail($id);
        return $toppingModel->delete();
    }
}
