<?php

namespace Core;

class ConfigView
{

    public function __construct(private string $nameView, private array|string|null $data)
    {
    }

    public function loadView()
    {
        if(file_exists("app/". $this->nameView. ".php")){
            include "app/adms/Views/includes/header.php";
            include "app/". $this->nameView. ".php";
            include "app/adms/Views/includes/footer.php";
        }else{
            die("Erro: Por favor tente novamente. Caso o problema persista entre em contato com o administrador através do email " . EMAILADM);
        }
    }
}
