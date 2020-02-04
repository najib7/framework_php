<?php

namespace App\Controllers;

use Psr\Http\Message\ServerRequestInterface;

class PagesController extends Controller
{
    public function home()
    {
        
        return $this->view->load('pages/home.html');
    }

    public function about(ServerRequestInterface $request)
    {

        return $this->view->load('pages/about.html');
    }
}