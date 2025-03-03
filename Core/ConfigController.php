<?php

namespace Core;

// require 'Core/Config.php';

class ConfigController extends Config
{
    private string $url;
    private array $urlArray;
    private string $urlController;
    private string $urlMetodo;
    private string $urlParametro;
    private string $classLoad;
    private string $urlSlugController;
    private string $urlSlugMetodo;

    public function __construct()
    {
        $this->configAdm();
        if (!empty(filter_input(INPUT_GET, 'url', FILTER_DEFAULT))) {
            $this->url = filter_input(INPUT_GET, 'url', FILTER_DEFAULT);

            var_dump($this->url);
            $this->clearUrl();
            $this->urlArray = explode("/", $this->url);
            var_dump($this->urlArray);

            if (isset($this->urlArray[0])) {
                $this->urlController = $this->slugController($this->urlArray[0]);
            } else {
                $this->urlController = $this->slugController(CONTROLLER);
            }
            if (isset($this->urlArray[1])) {
                $this->urlMetodo = $this->slugMetodo($this->urlArray[1]);
            } else {
                $this->urlMetodo = $this->slugMetodo(METODO);
            }
            if (isset($this->urlArray[2])) {
                $this->urlParametro = $this->urlArray[2];
            } else {
                $this->urlParametro = '';
            }
        } else {
            $this->urlController = $this->slugController(CONTROLLER_ERRO);
            $this->urlMetodo = $this->slugMetodo(METODO);
            $this->urlParametro = '';
        }

        echo "Controller = {$this->urlController} <br><br>";
        echo "Metodo = {$this->urlMetodo} <br><br>";
        echo "Parametro = {$this->urlParametro} <br><br>";

        echo "<hr>";

    }

    private function clearUrl()
    {

        // Array de caracteres não aceitos
        $unaccepted_characters = [
            'À',
            'Á',
            'Â',
            'Ã',
            'Ä',
            'Å',
            'Æ',
            'Ç',
            'È',
            'É',
            'Ê',
            'Ë',
            'Ì',
            'Í',
            'Î',
            'Ï',
            'Ð',
            'Ñ',
            'Ò',
            'Ó',
            'Ô',
            'Õ',
            'Ö',
            'Ø',
            'Ù',
            'Ú',
            'Û',
            'Ü',
            'ü',
            'Ý',
            'Þ',
            'ß',
            'à',
            'á',
            'â',
            'ã',
            'ä',
            'å',
            'æ',
            'ç',
            'è',
            'é',
            'ê',
            'ë',
            'ì',
            'í',
            'î',
            'ï',
            'ð',
            'ñ',
            'ò',
            'ó',
            'ô',
            'õ',
            'ö',
            'ø',
            'ù',
            'ú',
            'û',
            'ý',
            'ý',
            'þ',
            'ÿ',
            '"',
            "'",
            '!',
            '@',
            '#',
            '$',
            '%',
            '&',
            '*',
            '(',
            ')',
            '_',
            '+',
            '=',
            '{',
            '[',
            '}',
            ']',
            '?',
            ';',
            ':',
            '.',
            ',',
            '\\',
            '\'',
            '<',
            '>',
            '°',
            'º',
            'ª',
            ' '
        ];

        // Array de caracteres aceitos
        $accepted_characters = [
            'a',
            'a',
            'a',
            'a',
            'a',
            'a',
            'a',
            'c',
            'e',
            'e',
            'e',
            'e',
            'i',
            'i',
            'i',
            'i',
            'd',
            'n',
            'o',
            'o',
            'o',
            'o',
            'o',
            'o',
            'u',
            'u',
            'u',
            'u',
            'u',
            'y',
            'b',
            's',
            'a',
            'a',
            'a',
            'a',
            'a',
            'a',
            'a',
            'c',
            'e',
            'e',
            'e',
            'e',
            'i',
            'i',
            'i',
            'i',
            'd',
            'n',
            'o',
            'o',
            'o',
            'o',
            'o',
            'o',
            'u',
            'u',
            'u',
            'y',
            'y',
            'y',
            'y',
            '',
            '',
            '',
            '',
            '',
            '',
            '',
            '',
            '',
            '',
            '',
            '',
            '',
            '',
            '',
            '',
            '',
            '',
            '',
            '',
            '',
            '',
            '',
            '',
            '',
            '',
            '',
            '',
            '',
            '',
            '',
            '',
            ''
        ];

        // Substituir os caracteres não aceitos pelos caraters aceitos

        $this->url = str_replace(mb_convert_encoding($unaccepted_characters, 'ISO-8859-1', 'UTF-8'), $accepted_characters, mb_convert_encoding(strip_tags(trim(rtrim($this->url, "/"))), 'ISO-8859-1', 'UTF-8'));
    }

    private function slugController(string $slugController) :string
    {

        $this->urlSlugController = str_replace(" ", "",ucwords(str_replace("-", " ", $slugController)));

        return $this->urlSlugController;
        
    }

    private function slugMetodo(string $slugMetodo):string
    {

        $this->urlSlugMetodo =  lcfirst($this->slugController($slugMetodo));

        return $this->urlSlugMetodo;
    }

    public function loadPage(): void
    {

        $this->urlController = ucwords($this->urlController);

        $this->classLoad = "\\App\\adms\\Controllers\\" . $this->urlController;
        $classPage = new $this->classLoad();
        $classPage->{$this->urlMetodo}();

    }
}
