<?php

namespace App\adms\Controllers;

class Home
{
    private array|string|null $data;

    public function index( ): void
    {
        echo 'CONTROLLER => Página de Home! <br><br>';

        $this->data = '<p style=color:#f00;>Pagina não encontrada!</p>';

        $loadView = new \Core\ConfigView("adms/Views/home/home", $this->data);
        $loadView->loadView();
    }
}