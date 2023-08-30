<?php

namespace DB\Connectors;

use DB\Interfaces\ConnectorInterface;
use PDO;

class MySQLConnector implements ConnectorInterface
{
    private string $host = 'mysql';
    private string $db = 'test';
    private string $user = 'test';
    private string $pass = 'root';
    private string $charset = 'utf8mb4';

    /**
     * @return PDO
     */
    public function connect(): PDO
    {
        $dsn = "mysql:host=$this->host;dbname=$this->db;charset=$this->charset";
        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false,
        ];

        try {
            return new PDO($dsn, $this->user, $this->pass, $options);
        } catch (\PDOException $e) {
            throw new \PDOException($e->getMessage(), (int)$e->getCode());
        }
    }
}