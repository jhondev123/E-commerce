<?php

namespace App\Application\Services;

use Illuminate\Http\Request;
use App\Domain\Entities\Topping;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\ToppingRequest;
use App\Infra\Repositories\ToppingRepository;

final class ToppingsService
{
    public function __construct(private ToppingRepository $toppingRepository) {}
    public function getAllToppings()
    {
        return $this->toppingRepository->getAllToppings();
    }
    public function getToppingById($id)
    {
        return $this->toppingRepository->getToppingById($id);
    }
    public function store(ToppingRequest $request): Topping

    {
        $topping = new Topping(
            $request->get('price'),
            $request->get('name'),
            $request->get('description')
        );
        DB::beginTransaction();
        try {

            $createdTopping = $this->toppingRepository->store($topping);
            DB::commit();
            return $createdTopping;
        } catch (\PDOException $e) {
            DB::rollBack();
            throw new \Exception('Error storing topping: ' . $e->getMessage());
        }
    }
    public function update(ToppingRequest $request, string $id): Topping
    {
        $topping = new \App\Domain\Entities\Topping(
            $request->get('price'),
            $request->get('name'),
            $request->get('description')
        );
        DB::beginTransaction();
        try {

            $updatedTopping = $this->toppingRepository->update($topping, $id);
            DB::commit();
            return $updatedTopping;
        } catch (\PDOException $e) {
            DB::rollBack();
            throw new \Exception('Error updating topping: ' . $e->getMessage());
        }
    }
    public function destroy(string $id)
    {
        return $this->toppingRepository->destroy($id);
    }
}
