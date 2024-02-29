<?php
declare(strict_types=1);

namespace api\models\repository;

use PDO;
use api\models\entities\Contract;

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
                    (NULL, ?, ?, ?, ?)
            SQL
        );
        $statement->bindValue(1, $contract->getRegistration());
        $statement->bindValue(2, $contract->getAdmission());
        $statement->bindValue(3, $contract->getWage());
        $statement->bindValue(4, $contract->getOffice());

        $statement->execute();
    }

    public function update(Contract $contract, int $cpf): void
    {
        $statement = $this->connection->prepare(
            <<<SQL
                UPDATE
                    contract
                SET
                    registration = ?, admission = ?, wage = ?, office = ?
                WHERE
                    ID = (SELECT contract FROM employee WHERE CPF = ?)
            SQL
        );
        $statement->bindValue(1, $contract->getRegistration());
        $statement->bindValue(2, $contract->getAdmission());
        $statement->bindValue(3, $contract->getWage());
        $statement->bindValue(4, $contract->getOffice());
        $statement->bindValue(5, $cpf);

        $statement->execute();
    }

    public function getContractFromEmployee(int $cpf): iterable
    {
        $statement = $this->connection->prepare(
            <<<SQL
                SELECT
                    ID, registration, admission, wage, office
                FROM
                    contract
                WHERE
                    ID = (SELECT contract FROM employee WHERE CPF = ?)
            SQL
        );
        $statement->bindValue(1, $cpf, PDO::PARAM_INT);
        $statement->execute();

        return $statement->fetch();
    }
}