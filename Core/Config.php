<?php 

namespace Core;

abstract class Config
{
    protected function configAdm()
    {
        define('URLADM', 'http://localhost/testes/sistemphp/');

        define('CONTROLLER', 'Login');
        define('METODO', 'index');
        define('HOME', 'Home');
        define('CONTROLLER_ERRO', 'ErroHome');

        define('EMAILADM', 'adm@email.com');
    }
}


?>