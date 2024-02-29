<?php
declare(strict_types=1);

namespace api\services;

use api\models\{ DBConfig, ConnectionFactory };
use api\models\repository\AddressRepository;

/**
 *
 */
final class AddressesServices
{

    public function addAddress(): void
    {
        $address    = $_POST[""];
        $employeeID = $_POST[""];

        $config     = new DBConfig("localhost", "mysql", "webTask", "php", "php", 3306);
        $connection = (new ConnectionFactory())->create($config);

        // (new AddressRepository($connection))->insertAddressFromEmployee($address, $employeeID);
    }

    public function updateAddress(): void
    {
        $address    = $_POST[""];
        $employeeID = $_POST[""];

        $config     = new DBConfig("localhost", "mysql", "webTask", "php", "php", 3306);
        $connection = (new ConnectionFactory())->create($config);

        // (new AddressRepository($connection))->updateAddressFromEmployee($address, $employeeID);

        // echo ( $updated ) ? "Updated register." : "Couldn't update!";
    }

    public function deleteAddress(): void
    {
        echo __METHOD__;
    }

    public function showAddresses(): void
    {
        $config     = new DBConfig("localhost", "mysql", "webTask", "php", "php", 3306);
        $connection = (new ConnectionFactory())->create($config);

        // $addresses  = (new AddressRepository($connection))->getAddressesFromEmployee();

        // (new View())->render();
    }

    public function showAddress(): void
    {
        echo __METHOD__;
    }
}