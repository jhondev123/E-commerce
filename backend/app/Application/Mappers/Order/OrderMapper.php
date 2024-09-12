<?php

namespace App\Application\Mappers\Order;

use App\Domain\Entities\User;
use App\Domain\Enums\OrderStatus;
use App\Domain\Entities\Order\Order;
use App\Domain\Entities\Order\Delivery;
use App\Domain\Entities\Order\OrderPayment;

class OrderMapper
{
    public static function createOrder(Delivery $delivery, array $orderItems, OrderPayment $orderPayment, User $user, OrderStatus $orderStatus): Order
    {
        return new Order($orderItems, $orderPayment, $user, $delivery, $orderStatus);
    }
}
