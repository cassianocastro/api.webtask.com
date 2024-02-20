<?php
declare(strict_types=1);

namespace App\model\repository;

use PDO;
use App\model\entities\Contract;

/**
 *
 */
final class ContractsRepository
{

    private PDO $connection;

    public function __construct(PDO $connection)
    {
        $this->connection = $connection;
    }

    public function insert(Contract $contract): void
    {
        $statement = $this->connection->prepare(
            <<<SQL
                INSERT INTO
                    contract -- (registration, admission, wage, office)
                VALUES
                    (?, ?, ?, ?)
            SQL
        );
        $statement->bindParam(1, $contract->getRegistration());
        $statement->bindParam(2, $contract->getAdmission());
        $statement->bindParam(3, $contract->getWage());
        $statement->bindParam(4, $contract->getOffice());

        $statement->execute();
    }

    public function getAll(): iterable
    {
        $statement = $this->connection->query(
            <<<SQL
                SELECT
                    ID, registration, admission, wage, office
                FROM
                    contract
            SQL
        );

        return $statement->fetchAll();
    }
}