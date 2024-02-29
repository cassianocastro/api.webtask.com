<?php
declare(strict_types=1);

namespace api\services;

use api\models\{ DBConfig, ConnectionFactory, InputReader};
use api\models\entities\Contract;
use api\models\repository\ContractsRepository;

/**
 *
 */
final class ContractsServices
{

    public function addContract(): void
    {
        $array      = (new InputReader())->read();

        $config     = new DBConfig("localhost", "mysql", "webtask", "php", "php", 3306);
        $connection = (new ConnectionFactory())->create($config);

        try
        {
            (new ContractsRepository($connection))->insert(
                new Contract(0, $array["register"], $array["office"], $array["admission"], $array["wage"])
            );

            echo 200;
        }
        catch ( \Exception $e )
        {
            echo 500;
        }
    }

    public function updateContract(): void
    {
        $array      = (new InputReader())->read();

        $contract   = new Contract(0, $array["register"], $array["office"], $array["admission"], $array["wage"]);
        $cpf        = 12345678900;

        $config     = new DBConfig("localhost", "mysql", "webtask", "php", "php", 3306);
        $connection = (new ConnectionFactory())->create($config);

        try
        {
            (new ContractsRepository($connection))->update($contract, $cpf);

            echo 200;
        }
        catch ( \Exception $e )
        {
            echo 500;
        }
    }

    public function deleteContract(): void
    {
        $config     = new DBConfig("localhost", "mysql", "webtask", "php", "php", 3306);
        $connection = (new ConnectionFactory())->create($config);

        // (new ContractsRepository($connection))->deleteContract($contract);
    }

    public function showContract(): void
    {
        $config     = new DBConfig("localhost", "mysql", "webtask", "php", "php", 3306);
        $connection = (new ConnectionFactory())->create($config);

        $cpf = 12345678900;

        try
        {
            $contract = (new ContractsRepository($connection))->getContractFromEmployee($cpf);

            header("Content-Type: application/json;charset=utf-8", false, 200);

            echo json_encode($contract);
        }
        catch ( \Exception $e )
        {
            echo $e->getMessage() . PHP_EOL, 500;
        }
    }
}