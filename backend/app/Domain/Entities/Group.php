<?php

namespace App\Domain\Entities;

final class Group
{
    public function __construct(private string $name, private ?string $id = null) {}
    public function getId(): string
    {
        return $this->id;
    }
    public function getName(): string
    {
        return $this->name;
    }
}
