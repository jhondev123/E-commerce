<?php

namespace App\Domain\Entities;

final class Topping
{
    private ?string $id = null;
    private string $name;
    private string $description;
    private float $price;

    public function __construct(string $name, string $description, float $price, ?string $id = null)
    {
        $this->name = $name;
        $this->description = $description;
        $this->price = $price;
        $this->id = $id;
    }

    public function getPrice(): float
    {
        return $this->price;
    }
    public function getName(): string
    {
        return $this->name;
    }
    public function getDescription(): string
    {
        return $this->description;
    }
    public function getId(): string
    {
        return $this->id;
    }
}
