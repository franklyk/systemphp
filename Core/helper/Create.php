<?php
namespace Core\helper;
use \Core\helper\Connector;
use PDOException;

class Create  extends Connector
{

    private string $table;
    private array $data;
    private string $query;
    private object $insert;
    private string|null $result;
    private object $connection;

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

    public function replaceElements()
    {
        $columns = implode(',', array_keys($this->data));

        $values = ':' . implode(', :', array_keys($this->data));

        $this->query = "INSERT INTO {$this->table} ($columns) VALUES ($values)";

        $this->execInstrutions();
        
    }

    private function execInstrutions()
    {
        $this->connection();

        try {
            $this->insert->execute($this->data);
            $this->result = $this->connection->lastInsertId();
        } catch (PDOException) {
            $this->result = null;
        }
    }

    private function connection()
    {
        $this->connection = $this->getConnectionDb();
        $this->insert = $this->connection->prepare($this->query);

    }
}