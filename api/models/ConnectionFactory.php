<?php
declare(strict_types=1);

namespace App\model;

use PDO, PDOException;

/**
 *
 */
final class ConnectionFactory
{

    public function create(DBConfig $config): PDO
    {
        try
        {
            return new PDO(
                $config->getDSN(),
                $config->getUsername(),
                $config->getPassword()
            );
        }
        catch ( PDOException $e )
        {
            die($e->getMessage());
        }
    }
}