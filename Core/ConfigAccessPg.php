<?php

namespace Core;

class ConfigAccessPg
{
    private string|null $urlController;
    private string|null $urlMetodo;
    private string|null $urlParametro;
    private object $urlSlug;

    private string $classLoad;

    private array $listPgPublic = ["Home","Login", "Error404"];
    private array $listPgPrivate = ["Dashboard", "Users", "ViewUser", "Logout"];

    public function loadPage(string|null $urlController, string|null $urlMetodo, string|null $urlParametro,): void
    {
        $this->urlController = $urlController;
        $this->urlMetodo = $urlMetodo;
        $this->urlParametro = $urlParametro;

        $this->pgPublic();

        if (class_exists($this->classLoad)) {
            $this->loadMetodo();
        }else{
            $this->urlSlug = new \Core\helper\Slugs();
            $this->urlController = $this->urlSlug->slugController(CONTROLLER);
            $this->urlMetodo = $this->urlSlug->slugMetodo(METODO);
            $this->urlParametro = '';
        }
    }

    private function pgPublic()
    {
        $listPgPublic = $this->listPgPublic;

        if (in_array($this->urlController, $listPgPublic)) {

            $this->classLoad = "\\App\\adms\\Controllers\\" . $this->urlController;
        } else {

            $this->pgPrivate();
        }
    }

    private function pgPrivate()
    {
        $listPgPrivate = $this->listPgPrivate;

        if (in_array($this->urlController, $listPgPrivate)) {

            $this->checkLoginValidation();
        } else {

            $urlRedirect = URLADM . "error404";
            header("Location: $urlRedirect");
        }
    }

    private function checkLoginValidation()
    {
        if((isset($_SESSION['user_id'])) and (isset($_SESSION['user_name'])) and (isset($_SESSION['user_email']))){

            $this->classLoad = "\\App\\adms\\Controllers\\" . $this->urlController;
        }else{

            $_SESSION['msg'] = "<p style='color: #f00;'>Login necessário para acessar a página!</p>";

            $urlRedirect = URLADM . "login/index";
            header("Location: $urlRedirect");
        }
    }

    private function loadMetodo()
    {
        $classLoad = new $this->classLoad();
        if (method_exists($classLoad, $this->urlMetodo)) {
            $classLoad->{$this->urlMetodo}();
        }
    }
}
