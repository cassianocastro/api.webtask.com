<?php
require_once __DIR__ . '/lib/autoload.php';

error_reporting(E_ALL);
ini_set("display_errors", true);

/**
 *
 */
function index(): void
{
    (new api\services\EmployeesServices())->showEmployees();
}

index();