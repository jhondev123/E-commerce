<?php

namespace App\Domain\Entities;

final class Driver
{
    
    public function __construct(private string $name,private ?string $id=null)
    {
        $this->name = $name;
    }
    public function getName(): string
    {
        return $this->name;
    }
}
