<?php
namespace Core\helper;
use \Core\helper\Connector;
use PDOException;

class Create  extends Connector
{
    private string $table;
    private array|null $data;
    private string $query;
    private object $insert;
    private object $connection;
    private string|null $result;

    function getResult()
    {
        return $this->result;
    }



    public function create(string $table, array $data)
    {
        $this->table = $table;
        $this->data = $data;

        $this->replaceElements();
        
    }

    private function replaceElements()
    {
        $columns = implode(', ', array_keys($this->data));

        $values = ':' . implode(', :', array_keys($this->data));

        $this->query = "INSERT INTO {$this->table} ($columns) VALUES ($values)";

        $this->execInstrution();

    }

    private function execInstrution()
    {
        $this->getConnection();
        try {
            $this->insert->execute($this->data);
            $this->result = $this->connection->lastInsertId();
            
        } catch (PDOException) {
            $this->result = null;
        }
    }
    
    private function getConnection()
    {
        $this->connection  = $this->getConnectionDb();
        $this->insert = $this->connection->prepare($this->query);
    }
}