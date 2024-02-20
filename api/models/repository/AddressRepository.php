<?php
declare(strict_types=1);

namespace App\model\repository;

use PDO;
use App\model\entities\Address;

/**
 *
 */
final class AddressRepository
{

    private PDO $connection;

    public function __construct(PDO $connection)
    {
        $this->connection = $connection;
    }

    public function insertAddressFromEmployee(Address $address, int $employee): void
    {
        $statement = $this->connection->prepare(
            <<<SQL
                INSERT INTO
                    address -- (employeeID, uf, city, district, street, number, cep, complement)
                VALUES
                    (?, ?, ?, ?, ?, ?, ?, ?)
            SQL
        );
        $statement->bindValue(1, $employee);
        $statement->bindValue(2, $address->getUF());
        $statement->bindValue(3, $address->getCity());
        $statement->bindValue(4, $address->getDistrict());
        $statement->bindValue(5, $address->getStreet());
        $statement->bindValue(6, $address->getNumber());
        $statement->bindValue(7, $address->getCEP());
        $statement->bindValue(8, $address->getComplement());

        $statement->execute();
    }

    public function updateAddressFromEmployee(Address $address, int $employee): void
    {
        $statement = $this->connection->prepare(
            <<<SQL
                UPDATE
                    address
                SET
                    uf = ?, city = ?, district = ?, street = ?, number = ?, cep = ?, complement = ?
                WHERE
                    employeeID = ?
            SQL
        );
        $statement->bindValue(1, $address->getUF());
        $statement->bindValue(2, $address->getCity());
        $statement->bindValue(3, $address->getDistrict());
        $statement->bindValue(4, $address->getStreet());
        $statement->bindValue(5, $address->getNumber());
        $statement->bindValue(6, $address->getCEP());
        $statement->bindValue(7, $address->getComplement());
        $statement->bindValue(8, $employee);

        $statement->execute();
    }

    public function deleteAddressFromEmployee(): void
    {
        $statement = $this->connection->prepare(
            <<<SQL
                DELETE FROM
                    address
                WHERE
                    employeeID = ?
            SQL
        );

        // $statement->bindValue(1, $employee);

        $statement->execute();
    }

    public function getAddressesFromEmployee(): iterable
    {
        $statement = $this->connection->query(
            <<<SQL
                SELECT
                    employeeID, uf, city, district, street, number, cep, complement
                FROM
                    address
            SQL
        );

        return $statement->fetchAll();
    }

    public function findByID()
    {

    }
}