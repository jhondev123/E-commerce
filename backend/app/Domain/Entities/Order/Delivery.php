<?php

namespace App\Domain\Entities\Order;

use App\Domain\VO\Address;
use App\Domain\Entities\Driver;

final class Delivery
{
    private string $id;
    private float $price;
    private Driver $driver;
    private Address $address;
    private \DateTimeInterface $deliveryForeCast;
    public function __construct(string $id, float $price, Driver $driver, Address $address, \DateTimeInterface $deliveryForeCast)
    {
        $this->id = $id;
        $this->price = $price;
        $this->driver = $driver;
        $this->address = $address;
        $this->deliveryForeCast = $deliveryForeCast;
    }
    public function getPrice(): float
    {
        return $this->price;
    }
    public function getDriver(): Driver
    {
        return $this->driver;
    }
    public function getAddress(): Address
    {
        return $this->address;
    }
    public function getDeliveryForeCast(): \DateTimeInterface
    {
        return $this->deliveryForeCast;
    }
}
