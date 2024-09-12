<?php

namespace App\Application\Services;

use Illuminate\Support\Facades\DB;
use App\Infra\Repositories\OrderRepository;
use App\Application\DTO\Order\StoreOrderDTO;

class OrderService
{
    public function __construct(private OrderRepository $orderRepository) {}
    public function getAllOrders()
    {
        return $this->orderRepository->getAllOrders();
    }
    public function getOrderById(string $id)
    {
        return $this->orderRepository->getOrderById($id);
    }
    public function store(StoreOrderDTO $dto)
    {
        $order = $dto->toEntity();
        DB::beginTransaction();
        try {
            $createdOrder = $this->orderRepository->store($order);
            DB::commit();
            return $createdOrder;
        } catch (\Exception $e) {
            DB::rollBack();
            throw new \Exception($e->getMessage());
        }
    }
    public function getOrderByUserId(string $id)
    {
        return $this->orderRepository->getUserOrdersWithProductsAndToppings($id);
    }
}
