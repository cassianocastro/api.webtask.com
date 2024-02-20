<?php
declare(strict_types=1);

namespace api\models;

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
                $config->getPassword(),
                [
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
                ]
            );
        }
        catch ( PDOException $e )
        {
            die($e->getMessage());
        }
    }
}