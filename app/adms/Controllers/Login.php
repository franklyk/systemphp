<?php 

namespace App\adms\Controllers;

class Login
{
    private array|string|null $data;

    public function index( ): void
    {
        echo 'Página de Login <br><br>';

        $this->data = null;

        $loadView = new \Core\ConfigView("adms/Views/login/login", $this->data);
        $loadView->loadView();
    }
}


?>