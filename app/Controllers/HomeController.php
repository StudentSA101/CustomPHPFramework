<?php

namespace App\controllers;

use App\Helpers\Helpers;

class HomeController
{
    public function index()
    {
        return Helpers::view('home');
    }

    public function fourOhFour()
    {
        return Helpers::view('404');
    }
}
