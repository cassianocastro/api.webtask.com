<?php
declare(strict_types=1);

namespace App\model\repository;

use PDO;
use App\model\entities\Employee;

/**
 *
 */
final class EmployeeRepository
{

    private PDO $connection;

    public function __construct(PDO $connection)
    {
        $this->connection = $connection;
    }

    public function insert(Employee $employee, int $contract): void
    {
        $statement = $this->connection->prepare(
            <<<SQL
                INSERT INTO
                    employee -- (CPF, name, surname, age, sons, contract)
                VALUES
                    (?, ?, ?, ?, ?, ?)
            SQL
        );
        $statement->bindParam(1, $employee->getCPF());
        $statement->bindParam(2, $employee->getName());
        $statement->bindParam(3, $employee->getSurname());
        $statement->bindParam(4, $employee->getAge());
        $statement->bindParam(5, $employee->getSons());
        $statement->bindParam(6, $contract);

        $statement->execute();
    }

    public function getAll(): iterable
    {
        $statement = $this->connection->query(
            <<<SQL
                SELECT
                    CPF, name, surname, age, sons, contract
                FROM
                    employee
            SQL
        );

        return $statement->fetchAll();
    }
}