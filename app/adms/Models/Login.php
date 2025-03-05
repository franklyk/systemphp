<?php

namespace App\adms\Models;

use \Core\helper\Connection;
use PDO;

class Login extends Connection
{
    private object $connection;
    private array|null $data;

    private $resultSetQuery;

    private $result;

    function getResult()
    {
        return $this->result;
    }

    public function login(array|null $data): void
    {
        $this->data = $data;

        $this->connection = $this->getConnectionDb();

        $queryLogin = " SELECT id, name, nickname, email, password, image 
                    FROM adms_users 
                    WHERE user =:user 
                    LIMIT 1";

        $bindQueryLogin = $this->connection->prepare($queryLogin);
        $bindQueryLogin->bindParam(':user', $this->data['user'], PDO::PARAM_STR);
        $bindQueryLogin->execute();

        $this->resultSetQuery = $bindQueryLogin->fetch();

        if ($this->resultSetQuery) {
            $this->getPassword();
        }
    }

    private function getPassword()
    {
        if (password_verify($this->data['password'], $this->resultSetQuery['password'])) {

            $this->getSession();

            $this->result = true;
        } else {

            $_SESSION['msg'] = "<p style='color: #f00;'>Usuário e/ou Senha Incorretos!</p>";

            $this->result = false;
        }
    }

    private function getSession()
    {
        $_SESSION['user_id'] = $this->resultSetQuery['id'];
        $_SESSION['user_name'] = $this->resultSetQuery['name'];
        $_SESSION['user_nickname'] = $this->resultSetQuery['nickname'];
        $_SESSION['user_email'] = $this->resultSetQuery['email'];
        $_SESSION['user_image'] = $this->resultSetQuery['image'];

        $_SESSION['msg'] = "<p style='color: #0f0;'>Login Realizado com Sucesso!</p>";
    }
}
