<?php
declare(strict_types=1);

namespace App\controller;

use App\model\{ DBConfig, ConnectionFactory };
use App\model\repository\ContractsRepository;

/**
 *
 */
final class ContractsController
{

    public function addContract(): void
    {
        $contract   = $_POST[""];

        $config     = new DBConfig("localhost", "mysql", "webTask", "php", "php", 3306);
        $connection = (new ConnectionFactory())->create($config);

        (new ContractsRepository($connection))->insert($contract);
    }
}