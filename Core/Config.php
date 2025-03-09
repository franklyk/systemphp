<?php 

namespace Core;

abstract class Config
{
    protected function configAdm()
    {
        define('URLADM', 'http://localhost/systemphp/');

        define('CONTROLLER', 'Login');
        define('METODO', 'index');
        define('HOME', 'Home');
        define('CONTROLLER_ERRO', 'Erro');

        define('EMAILADM', 'adm@email.com');

        define('HOST', 'localhost');
        define('DBNAME', 'systemphp');
        define('PORT', 3306);
        define('USER', 'root');
        define('PASS', '');
    }
}


?>