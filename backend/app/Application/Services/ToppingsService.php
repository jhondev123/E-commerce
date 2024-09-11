<?php

namespace App\Application\Services;

use Illuminate\Support\Facades\DB;
use App\Application\DTO\Topping\ToppingDTO;
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
    public function store(ToppingDTO $dto): ToppingDTO

    {
        $topping = $dto->toEntity();
        DB::beginTransaction();
        try {

            $createdTopping = $this->toppingRepository->store($topping);
            DB::commit();
            return $dto->entityToDto($createdTopping);
        } catch (\PDOException $e) {
            DB::rollBack();
            throw new \Exception('Error storing topping: ' . $e->getMessage());
        }
    }
    public function update(ToppingDTO $dto, string $id): ToppingDTO
    {
        $topping = $dto->toEntity();
        DB::beginTransaction();
        try {
            $updatedTopping = $this->toppingRepository->update($topping, $id);
            DB::commit();
            return $dto->entityToDto($updatedTopping);
        } catch (\Exception $e) {
            DB::rollBack();
            throw new \Exception('Error updating topping: ' . $e->getMessage());
        }
    }
    public function destroy(string $id)
    {
        return $this->toppingRepository->destroy($id);
    }
}
