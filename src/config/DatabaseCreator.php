<?php
namespace Project;

use PDO;
use PDOException;

class DatabaseCreator
{
    protected PDO|null $_connection;

    public function __construct()
    {
        try {
            $this->_connection = new PDO("mysql:host=" . HOST, USER, PASSWORD);
            $this->_connection->exec('set names utf8');
        } catch (PDOException $e) {
            echo "Erreur de connexion : " . $e->getMessage();
        }
    }

    public function checkDatabase(): void
    {
        $sql = "SELECT SCHEMA_NAME FROM INFORMATION_SCHEMA.SCHEMATA WHERE SCHEMA_NAME = :db;";

        $query = $this->_connection->prepare($sql);

        $query->execute(['db' => DATABASE]);

        if (!$query->fetch()) {
            $this->createDatabase();
        }
    }

    protected function createDatabase(): void
    {
        $sql = file_get_contents('../cca-rillieux-vancia.sql');

        $this->_connection->exec($sql);

    }
}