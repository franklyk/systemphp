<?php

namespace App\adms\Controllers;

class Erro
{
    private array|string|null $data;

    public function index( ): void
    {
        echo 'Página de Erro! <br><br>';

        $this->data = '<p style=color:#f00;>Pagina não encontrada!</p>';

        $loadView = new \Core\ConfigView("erro/erro", $this->data);
        $loadView->loadView();
    }
}