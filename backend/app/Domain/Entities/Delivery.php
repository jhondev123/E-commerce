<?php

namespace App\Domain\Entities;

use App\Domain\VO\Address;
use App\Domain\Entities\Driver;

final class Delivery
{
    private string $id;
    private \DateTimeInterface $estimatedDeliveryTime;
    private float $price;
    private Order $order;
    private Address $address;
    private Driver $driver;

    private \DateTimeInterface|null $createdAt;
    private \DateTimeInterface|null $updatedAt;

    public function getId(): string
    {
        return $this->id;
    }
    public function getEstimatedDeliveryTime(): \DateTimeInterface
    {
        return $this->estimatedDeliveryTime;
    }
    public function getPrice(): float
    {
        return $this->price;
    }
    public function getOrder(): Order
    {
        return $this->order;
    }
    public function getAddress(): Address
    {
        return $this->address;
    }
    public function getDriver(): Driver
    {
        return $this->driver;
    }
    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }
    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updatedAt;
    }

    public function setEstimatedDeliveryTime(\DateTimeInterface $estimatedDeliveryTime): Delivery
    {
        $this->estimatedDeliveryTime = $estimatedDeliveryTime;
        return $this;
    }
    public function setPrice(float $price): Delivery
    {
        $this->price = $price;
        return $this;
    }
    public function setOrder(Order $order): Delivery
    {
        $this->order = $order;
        return $this;
    }
    public function setAddress(Address $address): Delivery
    {
        $this->address = $address;
        return $this;
    }
    public function setDriver(Driver $driver): Delivery
    {
        $this->driver = $driver;
        return $this;
    }
    public function setCreatedAt(?\DateTimeInterface $createdAt): Delivery
    {
        $this->createdAt = $createdAt;
        return $this;
    }
    public function setUpdatedAt(?\DateTimeInterface $updatedAt): Delivery
    {
        $this->updatedAt = $updatedAt;
        return $this;
    }
}
