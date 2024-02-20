<?php
require_once __DIR__ . '/lib/autoload.php';

/**
 *
 */
function index(): void
{
    error_reporting(E_ALL);
    ini_set("display_errors", true);

    (new api\routes\Router())->dispatch();
}

index();