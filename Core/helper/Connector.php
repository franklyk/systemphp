<?php

namespace Core\helper;


use PDO;
use PDOException;

abstract class Connector
{
    private string $host = HOST;
    private string $user = USER;
    private string $pass = PASS;
    private string $dbName = DBNAME;
    private int $port = PORT;
    private object $connection;

    protected function getConnectionDb(): object
    {
        try {
            $this->connection = new PDO("mysql:host={$this->host};port={$this->port};dbname=" . $this->dbName, $this->user, $this->pass);

            return $this->connection;
        } catch (PDOException $err) {
            die("Ops! Ocorreu um erro desconhecido. Por favor tente novamente. Caso o problema persista entre em contato com o administrador através do email " . EMAILADM . "e informe o código 67ca2c39df506");
        }
    }
}
