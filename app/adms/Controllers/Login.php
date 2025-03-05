<?php

namespace App\adms\Controllers;

class Login
{
    private object $connect;
    private array|string|null $data = null;
    private array|null $formData;

    public function index(): void
    {
        if ($_POST) {
            $this->valLogin();
        } else {
            $loadView = new \Core\ConfigView("adms/Views/login/login", $this->data);
            $loadView->loadView();
        }
    }

    private function valLogin()
    {
        $this->formData = filter_input_array(INPUT_POST, FILTER_DEFAULT);

        $this->connect = new \App\adms\Models\Login();
        $this->connect->login($this->formData);

        if ($this->connect->getResult()) {

            $urlRedirect = URLADM . "dashboard/index";
            header("Location: $urlRedirect");
        } else {
            $this->data = $this->formData;

            $loadView = new \Core\ConfigView("adms/Views/login/login", $this->data);
            $loadView->loadView();
        }
    }
}
