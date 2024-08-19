<?php

namespace App\Domain\Entities;

use App\Domain\VO\Email;

final class User
{
    private string $id;
    private string $name;
    private Email $email;
    /**
     * @var Address[]
     */
    private array $addresses;
}
