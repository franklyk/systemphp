<?php

namespace Core;

// require 'Core/Config.php';

class ConfigController extends Config
{
    private string|null $url;
    private array $urlArray;
    private string $urlController;
    private string $urlMetodo;

    private object $urlSlug;
    private object $urlClean;
    private string $classLoad;
    private string $urlParametro;

    public function __construct()
    {

        $this->configAdm();
        $this->urlClean = new \Core\helper\CleanUrl();
        $this->urlSlug = new \Core\helper\Slugs();

        if (!empty(filter_input(INPUT_GET, 'url', FILTER_DEFAULT))) {
            $this->url = filter_input(INPUT_GET, 'url', FILTER_DEFAULT);

            $this->url = $this->urlClean->clearUrl($this->url);

            $this->urlArray = explode("/", $this->url);

            if (isset($this->urlArray[0])) {
                $this->urlController = $this->urlSlug->slugController($this->urlArray[0]);
            }
            if (isset($this->urlArray[1])) {
                $this->urlMetodo = $this->urlSlug->slugMetodo($this->urlArray[1]);
            } else {
                $this->urlMetodo = $this->urlSlug->slugMetodo(METODO);
            }
            if (isset($this->urlArray[2])) {
                $this->urlParametro = $this->urlArray[2];
            }else {
                $this->urlParametro = '';
            }
        } else {
            $this->urlController = $this->urlSlug->slugController(HOME);
            $this->urlMetodo = $this->urlSlug->slugMetodo(METODO);
            $this->urlParametro = '';
        }
    }

    public function loadPage(): void
    {

        $loadPage = new \Core\ConfigAccessPg();
        $loadPage->loadPage($this->urlController,$this->urlMetodo,$this->urlParametro);

    }
}
