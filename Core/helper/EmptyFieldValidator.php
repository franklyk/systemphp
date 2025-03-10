<?php

namespace Core\helper;

class EmptyFieldValidator
{
    private array|string|null $data;
    private $result;

    function getResult()
    {
        return $this->result;
    }

    public function fieldValidated(array $data)
    {
        $this->data = $data;


        $this->data = array_map('strip_tags', $this->data);
        $this->data = array_map('trim', $this->data);

        if (in_array('', $this->data)) {
            $_SESSION['msg'] = "<p style='color: #f00'>Erro: Necessário preencher todos os campos!</p>";
            $this->result = false;
        }else{
            $this->result = true;
        }
    }
}