<?php 

namespace Core;

abstract class Config
{
    protected function configAdm()
    {
        define('URLADM', 'http://localhost/testes/sistemphp/');

        define('CONTROLLER', 'Login');
        define('METODO', 'index');
        define('CONTROLLER_ERRO', 'Erro');

        define('EMAILADM', 'adm@email.com');
    }
}


?>