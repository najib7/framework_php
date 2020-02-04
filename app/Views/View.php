<?php

namespace App\Views;

class View
{
    public $twig;

    public function __construct(\Twig\Environment $twig)
    {   
        $this->twig = $twig;
    }

    public function load($view, $data = [])
    {
        $response = new \Zend\Diactoros\Response;
        $template = $this->twig->load($view);

        $response->getBody()->write($template->render($data));

        return $response;
    }
}