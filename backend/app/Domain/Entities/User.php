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

    public function getId(): string
    {
        return $this->id;
    }
    public function getName(): string
    {
        return $this->name;
    }
    public function getEmail(): Email
    {
        return $this->email;
    }
    public function getAddresses(): array
    {
        return $this->addresses;
    }
    public function getIsAdmin(): bool
    {
        return $this->isAdmin;
    }
    public function getEmailVerifiedAt(): ?\DateTimeInterface
    {
        return $this->emailVerifiedAt;
    }
    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }
    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updatedAt;
    }
    public function getPhone(): Phone
    {
        return $this->phone;
    }
    //create setters
    public function setId(string $id): User
    {
        $this->id = $id;
        return $this;
    }
    public function setName(string $name): User
    {
        $this->name = $name;
        return $this;
    }
    public function setEmail(Email $email): User
    {
        $this->email = $email;
        return $this;
    }
    public function setAddresses(array $addresses): User
    {
        $this->addresses = $addresses;
        return $this;
    }
    public function setIsAdmin(bool $isAdmin): User
    {
        $this->isAdmin = $isAdmin;
        return $this;
    }
    public function setEmailVerifiedAt(?\DateTimeInterface $emailVerifiedAt): User
    {
        $this->emailVerifiedAt = $emailVerifiedAt;
        return $this;
    }
    public function setCreatedAt(?\DateTimeInterface $createdAt): User
    {
        $this->createdAt = $createdAt;
        return $this;
    }
    public function setUpdatedAt(?\DateTimeInterface $updatedAt): User
    {
        $this->updatedAt = $updatedAt;
        return $this;
    }
    public function setPhone(Phone $phone): User
    {
        $this->phone = $phone;
        return $this;
    }
}
