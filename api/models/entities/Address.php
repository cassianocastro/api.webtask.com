<?php
declare(strict_types=1);

namespace App\model\entities;

/**
 *
 */
final class Address
{

    private string $uf;
    private string $city;
    private string $district;
    private string $street;
    private int $number;
    private string $cep;
    private string $complement;

    public function __construct($uf, $city, $district, $street, $number, $cep, $complement)
    {
        $this->uf         = $uf;
        $this->city       = $city;
        $this->district   = $district;
        $this->street     = $street;
        $this->number     = $number;
        $this->cep        = $cep;
        $this->complement = $complement;
    }

    public function getUF(): string
    {
        return $this->uf;
    }

    public function getCity(): string
    {
        return $this->city;
    }

    public function getDistrict(): string
    {
        return $this->district;
    }

    public function getStreet(): string
    {
        return $this->street;
    }

    public function getNumber(): int
    {
        return $this->number;
    }

    public function getCEP(): string
    {
        return $this->cep;
    }

    public function getComplement(): string
    {
        return $this->complement;
    }
}