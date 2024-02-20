<?php
declare(strict_types=1);

namespace App\model\entities;

/**
 *
 */
final class Employee
{

    private string $cpf;
    private string $name;
    private string $surname;
    private int $age;
    private int $sons;

    public function __construct($cpf, $name, $surname, $age, $sons)
    {
        $this->cpf     = $cpf;
        $this->name    = $name;
        $this->surname = $surname;
        $this->age     = $age;
        $this->sons    = $sons;
    }

    public function getCPF(): string
    {
        return $this->cpf;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getSurname(): string
    {
        return $this->surname;
    }

    public function getAge(): int
    {
        return $this->age;
    }

    public function getSons(): int
    {
        return $this->sons;
    }
}