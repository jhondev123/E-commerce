<?php

namespace App\Domain\Entities;

final class Topping
{
    private string $id;
    private string $name;
    private string $description;
    private float $price;
    // private Product $product;
    private \DateTimeInterface|null $createdAt;
    private \DateTimeInterface|null $updatedAt;
    public function getId(): string
    {
        return $this->id;
    }
    public function getName(): string
    {
        return $this->name;
    }
    public function getDescription(): string
    {
        return $this->description;
    }
    public function getPrice(): float
    {
        return $this->price;
    }
    public function getCreatedAt():?\DateTimeInterface
    {
        return $this->createdAt;
    }
    public function getUpdatedAt():?\DateTimeInterface
    {
        return $this->updatedAt;
    }
    public function setName(string $name): Topping
    {
        $this->name = $name;
        return $this;
    }
    public function setDescription(string $description): Topping
    {
        $this->description = $description;
        return $this;
    }
    public function setPrice(float $price): Topping
    {
        $this->price = $price;
        return $this;
    }
    public function setCreatedAt(?\DateTimeInterface $createdAt): Topping
    {
        $this->createdAt = $createdAt;
        return $this;
    }
    public function setUpdatedAt(?\DateTimeInterface $updatedAt): Topping
    {
        $this->updatedAt = $updatedAt;
        return $this;
    }
}
