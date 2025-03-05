<?php

namespace App\adms\Controllers;

class Dashboard
{
    private array|string|null $data = null;

    public function index( ): void
    {

        $loadView = new \Core\ConfigView("adms/Views/dashboard/dashboard", $this->data);
        $loadView->loadView();
    }
}