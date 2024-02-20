<?php
declare(strict_types=1);

namespace App\model\entities;

/**
 *
 */
final class Contract
{

    private int $id;
    private string $register;
    private string $office;
    private string $admission;
    private float $wage;

    public function __construct($id, $register, $office, $admission, $wage)
    {
        $this->id        = $id;
        $this->register  = $register;
        $this->office    = $office;
        $this->admission = $admission;
        $this->wage      = $wage;
    }

    public function getID(): int
    {
        return $this->id;
    }

    public function getRegistration(): string
    {
        return $this->register;
    }

    public function getOffice(): string
    {
        return $this->office;
    }

    public function getAdmission(): string
    {
        return $this->admission;
    }

    public function getWage(): float
    {
        return $this->wage;
    }
}