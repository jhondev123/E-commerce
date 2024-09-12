<?php

namespace App\Infra\Repositories;

use App\Models\OrderProduct;
use Illuminate\Support\Facades\DB;
use App\Models\Order as OrderModel;
use App\Domain\Entities\Order\Order;
use App\Application\DTO\Order\StoreOrderDTO;
use App\Application\DTO\Order\UpdateOrderDTO;

class OrderRepository
{
    public function getAllOrders()
    {
        return OrderModel::with('products')->get();
    }
    public function getOrderById(string $id)
    {
        return OrderModel::with('products')->find($id);
    }
    public function getUserOrdersWithProductsAndToppings($userId)
    {
        $orders = OrderModel::with(['products'])
            ->where('user_id', $userId)
            ->get();
        return $orders;
    }
    public function store(Order $order)
    {
        $orderModel = new OrderModel();
        $orderModel->user_id = $order->getCustomer()->getId();
        $orderModel->status = $order->getStatus()->getValue();
        $orderModel->total = $order->getTotal();
        $orderModel->save();
        $this->storeProductsInOrder($orderModel, $order->getOrderItems());
        return $orderModel;
    }

    public function storeProductsInOrder(OrderModel $orderModel, array $orderItems)
    {
        foreach ($orderItems as $product) {
            $orderModel->products()->attach($product->getProduct()->getId(), [
                'quantity' => $product->getQuantity(),
                'price' => $product->getProduct()->getPrice(),
                "total" => $product->calculateTotalPriceItem()
            ]);

            $this->attachToppingsToOrderProduct($orderModel, $product);
        }
    }

    public function attachToppingsToOrderProduct(OrderModel $orderModel, $product)
    {
        $orderProduct = OrderProduct::where('order_id', $orderModel->id)
            ->where('product_id', $product->getProduct()->getId())
            ->latest('id')
            ->first();

        if ($orderProduct) {
            foreach ($product->getToppings() as $topping) {
                $orderProduct->toppings()->attach($topping->getId());
            }
        }
    }




    public function delete(string $id) {}
}
