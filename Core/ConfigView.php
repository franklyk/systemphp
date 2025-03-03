<?php

namespace Core;

class ConfigView
{
    // private string $nameView;

    // public function __construct(string $nameView)
    // {
    //     $this->nameView = $nameView;
    //     var_dump($this->nameView);
    // }

    public function __construct(private string $nameView, private array|string|null $data)
    {
    }

    public function loadView()
    {
        if(file_exists("app/adms/Views/". $this->nameView. ".php")){
            include "app/adms/Views/". $this->nameView. ".php";
        }else{
            die("Erro: Por favor tente novamente. Caso o problema persista entre em contato com o administrador através do email " . EMAILADM);
        }
    }
}
