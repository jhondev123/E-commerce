<?php

namespace App\Domain\Entities;

use App\Domain\Enums\OrderStatusEnum;
use App\Domain\Enums\PaymentStatusEnum;
use App\Domain\Enums\PaymentMethodsEnum;

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
    private Delivery $delivery;
    private float $totalPrice;
    private \DateTimeInterface|null $createdAt;
    private \DateTimeInterface|null $updatedAt;


    public function calculateTotalPrice(): float
    {
        $total = 0;
        foreach ($this->products as $product) {
            $total += $product->getPrice();
        }
        $total += $this->delivery->getPrice();
        return $total;
    }

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
        $this->totalPrice = $this->calculateTotalPrice();
        return $this->totalPrice;
    }
    public function getDelivery(): Delivery
    {
        return $this->delivery;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }
    public function getUpdatedAt(): ?\DateTimeInterface
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

    public function setAddress(Delivery $delivery): Order
    {
        $this->delivery = $delivery;
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
