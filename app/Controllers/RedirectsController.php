<?php

namespace App\Controllers;

class RedirectsController extends Controller
{
    public function github()
    {
        return redirect('https://github.com/najib7');
    }


}