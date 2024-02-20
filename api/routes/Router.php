<?php
declare(strict_types=1);

namespace api\routes;

/**
 *
 */
final class Router
{

    private const MAP = [
        "GET"    => [
            // "/^\/$/" => "",
            "/^\/employees$/" => "EmployeesServices.showEmployees",
            "/^\/employees\/(\d+)$/" => "EmployeesServices.showEmployee",
            "/^\/employees\/(\d+)\/contract$/" => "ContractsServices.showContract",
            "/^\/employees\/(\d+)\/address$/" => "AddressesServices.showAddress"
        ],
        "POST"   => [

        ],
        "PUT"    => [

        ],
        "DELETE" => [

        ]
    ];

    public function dispatch(): void
    {
        $method = $_SERVER["REQUEST_METHOD"];
        $path   = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);

        if ( $path != '/' )
        {
            $path = rtrim($path, '/');
        }

        foreach ( self::MAP as $http_method => $routes )
        {
            if ( $method !== $http_method ) continue;

            foreach ( $routes as $pattern => $action )
            {
                if ( preg_match($pattern, $path) )
                {
                    [ $controller, $service ] = explode('.', $action);

                    $controller = "api\\services\\$controller";

                    (new $controller())->$service();

                    // print "Called $controller::$service()";

                    return;
                }
            }
        }
    }
}