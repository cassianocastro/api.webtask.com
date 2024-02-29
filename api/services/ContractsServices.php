<?php
declare(strict_types=1);

namespace api\services;

use api\models\{ DBConfig, ConnectionFactory };
use api\models\repository\ContractsRepository;

/**
 *
 */
final class ContractsServices
{

    public function addContract(): void
    {
        $contract   = $_POST[""];

        $config     = new DBConfig("localhost", "mysql", "webTask", "php", "php", 3306);
        $connection = (new ConnectionFactory())->create($config);

        (new ContractsRepository($connection))->insert($contract);
    }

    public function updateContract(): void
    {
        $config     = new DBConfig("localhost", "mysql", "webTask", "php", "php", 3306);
        $connection = (new ConnectionFactory())->create($config);

        // (new ContractsRepository($connection))->updateContract($contract);
    }

    public function deleteContract(): void
    {
        $config     = new DBConfig("localhost", "mysql", "webTask", "php", "php", 3306);
        $connection = (new ConnectionFactory())->create($config);

        // (new ContractsRepository($connection))->deleteContract($contract);
    }

    public function showContract(): void
    {
        $config     = new DBConfig("localhost", "mysql", "webTask", "php", "php", 3306);
        $connection = (new ConnectionFactory())->create($config);

        // (new ContractsRepository($connection))->get();
    }
}