<?php

namespace App\controllers;

use App\core\Container;

class HomeController 
{
    public function index()
    {
        return view('home');
    }

    public function fourOhFour()
    {
        return view('404');
    }
}