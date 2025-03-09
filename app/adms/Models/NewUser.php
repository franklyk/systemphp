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
        
        $createNewUser = new \Core\helper\Create();
        $createNewUser->create('adms_users',$this->data);
    }
    
}