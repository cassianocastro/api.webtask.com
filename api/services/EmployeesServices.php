<?php
declare(strict_types=1);

namespace api\services;

use api\models\{ DBConfig, ConnectionFactory };
use api\models\repository\EmployeeRepository;

/**
 *
 */
final class EmployeesServices
{

    public function addEmployee(): void
    {
        $employee = $_POST[""];
        $contract = $_POST[""];

        $config     = new DBConfig("localhost", "mysql", "webTask", "php", "php", 3306);
        $connection = (new ConnectionFactory())->create($config);

        (new EmployeeRepository($connection))->insert($employee, $contract);
    }

    public function updateEmployee(): void
    {
        // code ...
    }

    public function deleteEmployee(): void
    {
        // code ...
    }

    public function showEmployees(): void
    {
        $config     = new DBConfig("localhost", "mysql", "webtask", "php", "php", 3306);
        $connection = (new ConnectionFactory())->create($config);

        $employees  = (new EmployeeRepository($connection))->getAll();

        header("Content-Type: application/json; charset=UTF-8");

        print json_encode($employees, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_NUMERIC_CHECK);
    }

    public function showEmployee(): void
    {
        echo __METHOD__;
    }
}