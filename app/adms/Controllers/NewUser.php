<?php

namespace App\adms\Controllers;

class NewUser
{
    private array|null $dataForm;
    private array|string|null $data;

    public function index()
    {
        $this->dataForm = filter_input_array(INPUT_POST, FILTER_DEFAULT);

        $valEmptyField = new \Core\helper\EmptyFieldValidator();
        $valEmptyField->fieldValidated($this->dataForm);
        var_dump($this->dataForm);

        if ($valEmptyField->getResult()) {

            if ($_POST) {
                $createNewUser = new \App\adms\Models\NewUser();
                $createNewUser->create($this->dataForm);
                if ($createNewUser->getResult()) {
                    $urlRedirect = URLADM . "login";
                    header("Location: $urlRedirect");
                } else {

                    $this->viewNewUser();
                }
            } else {

                $this->viewNewUser();
            }
        }else{
            
            $this->viewNewUser();
        }
    }

    private function viewNewUser()
    {
        $this->data['form'] = $this->dataForm;
        $viewNewUser = new \Core\ConfigView('adms/Views/login/newUser', $this->data);
        $viewNewUser->loadView();
    }
}
