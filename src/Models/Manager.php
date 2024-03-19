<?php
namespace Project\Models;

abstract class Manager
{
    protected \PDO $bdd;
    // Se connecte a la bdd
    public function __construct()
    {
        $this->bdd = new \PDO('mysql:host=' . HOST . ';dbname=' . DATABASE . ';charset=utf8;', USER, PASSWORD);
        $this->bdd->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
    }
    // Reccupere la base de donnee
    public function getBdd(): \PDO
    {
        return $this->bdd;
    }
}