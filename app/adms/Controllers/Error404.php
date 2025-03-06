<?php

namespace App\adms\Controllers;

class Error404
{
    private string|null $data = null;

    public function index( ): void
    {

        $this->data = '<p style=color:#f00;>Pagina não encontrada!</p>';

        $loadView = new \Core\ConfigView("adms/Views/erro404/erro404", $this->data);
        $loadView->loadView();
    }
}