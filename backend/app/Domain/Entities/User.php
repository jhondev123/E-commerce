<?php

namespace App\Domain\Entities;

use App\Domain\VO\Email;
use App\Domain\VO\Phone;

final class User
{
    private string $id;
    private string $name;
    private Email $email;
    /**
     * @var Address[]
     */
    private array $addresses;
    private bool $isAdmin;
    private \DateTimeInterface|null $emailVerifiedAt;
    private \DateTimeInterface|null $createdAt;
    private \DateTimeInterface|null $updatedAt;
    private Phone $phone;
}
