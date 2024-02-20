<?php
declare(strict_types=1);

namespace App\model;

/**
 *
 */
final class DBConfig
{

    private string $host;
    private string $driver;
    private string $dbname;
    private string $user;
    private string $password;
    private int $port;

    public function __construct(string $host, string $driver, string $dbname, string $user, string $password, int $port)
    {
        $this->host     = $host;
        $this->driver   = $driver;
        $this->dbname   = $dbname;
        $this->user     = $user;
        $this->password = $password;
        $this->port     = $port;
    }

    public function getDSN(): string
    {
        return "{$this->driver}:host={$this->host};dbname={$this->dbname};port={$this->port}";
    }

    public function getUsername(): string
    {
        return $this->user;
    }

    public function getPassword(): string
    {
        return $this->password;
    }
}