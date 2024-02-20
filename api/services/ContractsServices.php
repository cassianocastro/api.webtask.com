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
}