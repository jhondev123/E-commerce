<?php

namespace App\Domain\Entities;

use App\Domain\Enums\OrderStatusEnum;
use App\Domain\Enums\PaymentStatusEnum;
use App\Domain\Enums\PaymentMethodsEnum;
use App\Domain\VO\Address;
final class Order
{
    private string $id;
    /**
     * @var Product[]
     * */
    private array $products;
    private User $user;
    private PaymentStatusEnum $paymentStatus;
    private PaymentMethodsEnum $paymentMethod;
    private OrderStatusEnum $status;
    private float $totalPrice;
    private Address $address;
    private \DateTimeInterface $delivery_time;
    private \DateTimeInterface|null $createdAt;
    private \DateTimeInterface|null $updatedAt;
 
    public function getId(): string
    {
        return $this->id;
    }
    public function getProducts(): array
    {
        return $this->products;
    }
    public function getUser(): User
    {
        return $this->user;
    }
    public function getPaymentStatus(): PaymentStatusEnum
    {
        return $this->paymentStatus;
    }
    public function getPaymentMethod(): PaymentMethodsEnum
    {
        return $this->paymentMethod;
    }
    public function getStatus(): OrderStatusEnum
    {
        return $this->status;
    }
    public function getTotalPrice(): float
    {
        return $this->totalPrice;
    }
    public function getAddress(): Address
    {
        return $this->address;
    }
    public function getDeliveryTime(): \DateTimeInterface
    {
        return $this->delivery_time;
    }
    public function getCreatedAt():?\DateTimeInterface
    {
        return $this->createdAt;
    }
    public function getUpdatedAt():?\DateTimeInterface
    {
        return $this->updatedAt;
    }

    public function setProducts(array $products): Order
    {
        $this->products = $products;
        return $this;
    }
    public function setUser(User $user): Order
    {
        $this->user = $user;
        return $this;
    }
    public function setPaymentStatus(PaymentStatusEnum $paymentStatus): Order
    {
        $this->paymentStatus = $paymentStatus;
        return $this;
    }
    public function setPaymentMethod(PaymentMethodsEnum $paymentMethod): Order
    {
        $this->paymentMethod = $paymentMethod;
        return $this;
    }
    public function setStatus(OrderStatusEnum $status): Order
    {
        $this->status = $status;
        return $this;
    }
    public function setTotalPrice(float $totalPrice): Order
    {
        $this->totalPrice = $totalPrice;
        return $this;
    }
    public function setAddress(Address $address): Order
    {
        $this->address = $address;
        return $this;
    }
    public function setDeliveryTime(\DateTimeInterface $delivery_time): Order
    {
        $this->delivery_time = $delivery_time;
        return $this;
    }
    public function setCreatedAt(?\DateTimeInterface $createdAt): Order
    {
        $this->createdAt = $createdAt;
        return $this;
    }
    public function setUpdatedAt(?\DateTimeInterface $updatedAt): Order
    {
        $this->updatedAt = $updatedAt;
        return $this;
    }
    

}
