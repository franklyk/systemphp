<?php

namespace App\adms\Controllers;

class NewUser
{
    private array|null $dataForm;
    private array|string|null $data;

    public function index()
    {
        $this->dataForm = filter_input_array(INPUT_POST, FILTER_DEFAULT);



        if($_POST){
            $createNewUser = new \App\adms\Models\NewUser();
            $createNewUser->create($this->dataForm);
        }
        $this->viewNewUser();
    }

    private function viewNewUser()
    {
        $this->data = $this->dataForm;
        $viewNewUser = new \Core\ConfigView('adms/Views/login/newUser', $this->data);
        $viewNewUser->loadView();
    }
}
