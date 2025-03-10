<?php

namespace App\adms\Models;

class NewUser
{
    private array|string|null $data;
    private bool $result;

    function getResult()
    {
        return $this->result;
    }


    public function create(array|null $data)
    {
        $this->data = $data;

        
        $this->data['password'] = password_hash($this->data['password'], PASSWORD_DEFAULT);
        $this->data['user'] = $this->data['email'];
        $this->data['created_at'] = date("Y-m-d H:i:s");


        $createNewUser = new \Core\helper\Create();
        $createNewUser->create('adms_users', $this->data);

        if($createNewUser->getResult()){
            $_SESSION['msg'] = "<p style='color: #0f0;'>Usuário cadastrado com sucesso!</p>";
            $this->result = true;
        }else{
            $_SESSION['msg'] = "<p style='color: #f00;'>Usuário não cadastrado com sucesso!</p>";
            $this->result = true;
        }
    }
    
}