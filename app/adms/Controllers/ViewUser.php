<?php

namespace App\adms\Controllers;

class ViewUser
{
    private array|string|null $data;

    public function index(): void
    {
        echo 'CONTROLLER - Página ViewUser <br><br>';

        $this->data = [];

        $loadView = new \Core\ConfigView("users/viewUser", $this->data);
        $loadView->loadView();
    }
}
