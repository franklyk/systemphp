<?php

namespace Core;

class ConfigAccessPg
{
    private string|null $urlController;
    private string|null $urlMetodo;
    private string|null $urlParametro;
    private object $urlSlug;

    private string $classLoad;

    public function loadPage(string|null $urlController, string|null $urlMetodo, string|null $urlParametro,): void
    {
        $this->urlController = $urlController;
        $this->urlMetodo = $urlMetodo;
        $this->urlParametro = $urlParametro;

        $this->classLoad = "\\App\\adms\\Controllers\\" . $this->urlController;

        if (class_exists($this->classLoad)) {

            $this->loadMetodo();
            
        } else {

            $urlRedirect = URLADM . "error404";
            header("Location: $urlRedirect");
            
        }
    }
    private function loadMetodo()
    {
        $classLoad = new $this->classLoad();
        if(method_exists($classLoad, $this->urlMetodo)){
            $classLoad->{$this->urlMetodo}();
        }
    }
}