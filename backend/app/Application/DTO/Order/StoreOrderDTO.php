<?php

namespace App\Application\DTO\Order;

use App\Domain\Entities\User;
use App\Domain\Enums\OrderStatus;
use App\Domain\Entities\Order\Delivery;
use App\Domain\Entities\Order\Order;
use App\Domain\Entities\Order\OrderPayment;

class StoreOrderDTO
{
    public array $orderItems;
    public OrderPayment $payment;
    public User $customer;
    public Delivery $delivery;
    public OrderStatus $status;
    public ?string $id = null;
    public function __construct(
        array $orderItems,
        OrderPayment $payment,
        User $customer,
        Delivery $delivery,
        OrderStatus $status,
        ?string $id = null
    ) {
        $this->orderItems = $orderItems;
        $this->payment = $payment;
        $this->customer = $customer;
        $this->delivery = $delivery;
        $this->status = $status;
        $this->id = $id;
    }
   
    public function toEntity():Order
    {
        return new Order(
            $this->orderItems,
            $this->payment,
            $this->customer,
            $this->delivery,
            $this->status,
            $this->id
        );
    }
 
}
