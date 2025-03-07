<?php

namespace Core;

class ConfigAccessPg
{
    private string|null $urlController;
    private string|null $urlMetodo;
    private string|null $urlParametro;
    private object $urlSlug;

    private string $classLoad;

    private array $listPgPublic;
    private array $listPgPrivate;

    public function loadPage(string|null $urlController, string|null $urlMetodo, string|null $urlParametro,): void
    {
        $this->urlController = $urlController;
        $this->urlMetodo = $urlMetodo;
        $this->urlParametro = $urlParametro;

        $this->pgPublic();

        if (class_exists($this->classLoad)) {
            $this->loadMetodo();
        }
    }

    private function pgPublic()
    {
        $this->listPgPublic = ["Login", "Error404"];

        if (in_array($this->urlController, $this->listPgPublic)) {

            $this->classLoad = "\\App\\adms\\Controllers\\" . $this->urlController;
        } else {

            $this->pgPrivate();
        }
    }

    private function pgPrivate()
    {
        $this->listPgPrivate = ["Dashboard"];
        if (in_array($this->urlController, $this->listPgPrivate)) {

            $this->classLoad = "\\App\\adms\\Controllers\\" . $this->urlController;
        } else {

            $urlRedirect = URLADM . "error404";
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
