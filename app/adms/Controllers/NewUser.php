<?php

namespace App\adms\Controllers;

use \Core\helper\Connector;

class NewUser extends Connector
{

    private array|null $dataForm;
    private array|string|null $data;


    public function index(): void
    {
        $this->dataForm = filter_input_array(INPUT_POST, FILTER_DEFAULT);
        if ($_POST) {
            $createNewUser = new \App\adms\Models\NewUser();
            $createNewUser->create($this->dataForm);
            $this->data = $this->dataForm;
            $this->loadNewUser();

        } else {
            $this->loadNewUser();
        }
    }

    private function loadNewUser()
    {
        $this->data = $this->dataForm;
        $loadView = new \Core\ConfigView("adms/Views/login/newUser", $this->data);
        $loadView->loadView();
    }
}
