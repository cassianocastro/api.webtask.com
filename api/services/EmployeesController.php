<?php
declare(strict_types=1);

namespace App\controller;

use App\model\{ DBConfig, ConnectionFactory };
use App\model\repository\EmployeeRepository;

/**
 *
 */
final class EmployeesController
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
        // code ...
    }
}