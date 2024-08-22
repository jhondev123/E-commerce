<?php

namespace App\Domain\Entities;

final class Group
{

    private string $name;
    public function __construct(private string $id) {}

    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
        ];
    }
    public function getName(): string
    {
        return $this->name;
    }
    public function getId(): string
    {
        return $this->id;
    }
    public function setName(string $name): Group
    {
        $this->name = $name;
        return $this;
    }
    public function setId(string $id): Group
    {
        $this->id = $id;
        return $this;
    }
}
