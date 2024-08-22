<?php

namespace App\Domain\Entities;

final class Driver
{
    private string $id;
    private string $name;
    private string $phone;
    private string $vehicle;
    private string $plate;


    public function getId(): string
    {
        return $this->id;
    }
    public function getName(): string
    {
        return $this->name;
    }
    public function getPhone(): string
    {
        return $this->phone;
    }
    public function getVehicle(): string
    {
        return $this->vehicle;
    }
    public function getPlate(): string
    {
        return $this->plate;
    }
    public function setName(string $name): Driver
    {
        $this->name = $name;
        return $this;
    }
    public function setId(string $id): Driver
    {
        $this->id = $id;
        return $this;
    }
    public function setPhone(string $phone): Driver
    {
        $this->phone = $phone;
        return $this;
    }
    public function setVehicle(string $vehicle): Driver
    {
        $this->vehicle = $vehicle;
        return $this;
    }
    public function setPlate(string $plate): Driver
    {
        $this->plate = $plate;
        return $this;
    }
}
