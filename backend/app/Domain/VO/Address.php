<?php

namespace App\Domain\VO;

final class Address
{
    public function __construct(
        private string $street,
        private string $city,
        private string $state,
        private string $zipCode,
        private string $number,
        private string $country,
    ) {}
    public function getStreet(): string
    {
        return $this->street;
    }
    public function getCity(): string
    {
        return $this->city;
    }
    public function getState(): string
    {
        return $this->state;
    }
    public function getZipCode(): string
    {
        return $this->zipCode;
    }
    public function getNumber(): string
    {
        return $this->number;
    }
    public function getCountry(): string
    {
        return $this->country;
    }
}
