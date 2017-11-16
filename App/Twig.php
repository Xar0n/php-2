<?php

namespace App;

class Twig
{
    protected $twig;

    public function __construct()
    {
        $loader = new \Twig_Loader_Filesystem(__DIR__ . '/Views');
        $this->twig = new \Twig_Environment($loader);
    }

    public function display(string $template, array $params = [])
    {
        echo $this->twig->render($template, $params);
    }
}
