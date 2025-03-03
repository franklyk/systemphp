<?php

namespace App\adms\Controllers;

class Users
{
    private array|string|null $data;

    public function index()
    {
        echo 'Página Users <br><br>';

        $this->data = [];

        $loadView = new \Core\ConfigView("users/users", $this->data);
        $loadView->loadView();
    }
}
