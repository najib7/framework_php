<?php

namespace App\Controllers;

use App\Views\View;
use Doctrine\ORM\EntityManager;

abstract class Controller
{
    protected $view;
    protected $entity;

    public function __construct(View $view, EntityManager $entity)
    {
        $this->view = $view;
        $this->entity = $entity;
    }
}