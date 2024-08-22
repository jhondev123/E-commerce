<?php

namespace App\Domain\Entities;

final class Product
{
    private ?string $id = null;

    private string $name;
    private float $price;
    private string $description;
    private Group $group;

    /**
     * @var ProductVariant[]
     *  */
    private array $productVariants;

    /**
     * @var Topping[]
     *  */
    private array $toppings;
    private \DateTimeInterface|null $createdAt;
    private \DateTimeInterface|null $updatedAt;
    private \DateTimeInterface|null $deletedAt;

    public function __construct() {}

    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'price' => $this->price,
            'description' => $this->description,
            'group' => $this->group->toArray(),
            'createdAt' => $this->createdAt,
            'updatedAt' => $this->updatedAt,
            'deletedAt' => $this->deletedAt,
        ];
    }
    public function getId(): string
    {
        return $this->id;
    }
    public function getName(): string
    {
        return $this->name;
    }
    public function getPrice(): float
    {
        return $this->price;
    }
    public function getDescription(): string
    {
        return $this->description;
    }
    public function getGroup(): Group
    {
        return $this->group;
    }
    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }
    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updatedAt;
    }
    public function getDeletedAt(): ?\DateTimeInterface
    {
        return $this->deletedAt;
    }
    public function getProductVariants(): array
    {
        return $this->productVariants;
    }
    public function getToppings(): array
    {
        return $this->toppings;
    }
    public function setName(string $name): Product
    {
        $this->name = $name;
        return $this;
    }
    public function setPrice(float $price): Product
    {
        $this->price = $price;
        return $this;
    }
    public function setDescription(string $description): Product
    {
        $this->description = $description;
        return $this;
    }
    public function setGroup(Group $group): Product
    {
        $this->group = $group;
        return $this;
    }
    public function setCreatedAt(?\DateTimeInterface $createdAt): Product
    {
        $this->createdAt = $createdAt;
        return $this;
    }
    public function setUpdatedAt(?\DateTimeInterface $updatedAt): Product
    {
        $this->updatedAt = $updatedAt;
        return $this;
    }
    public function setDeletedAt(?\DateTimeInterface $deletedAt): Product
    {
        $this->deletedAt = $deletedAt;
        return $this;
    }
    public function setProductVariants(array $productVariants): Product
    {
        $this->productVariants = $productVariants;
        return $this;
    }
    public function setToppings(array $toppings): Product
    {
        $this->toppings = $toppings;
        return $this;
    }
}
