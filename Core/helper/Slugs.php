<?php

namespace Core\helper;

class Slugs
{

    private string $urlSlugController;
    private string $urlSlugMetodo;


    public function slugController(string $slugController): string
    {

        $this->urlSlugController = str_replace(" ", "", ucwords(str_replace("-", " ", $slugController)));

        return $this->urlSlugController;
    }

    public function slugMetodo(string $slugMetodo): string
    {

        $this->urlSlugMetodo =  lcfirst($this->slugController($slugMetodo));

        return $this->urlSlugMetodo;
    }
}
