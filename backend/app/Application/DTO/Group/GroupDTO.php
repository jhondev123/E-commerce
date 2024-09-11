<?php

namespace App\Application\DTO\Group;

class GroupDTO
{
    public function __construct(
        public string $name,
        public ?string $id = null
    )
    {
        
    }
}
