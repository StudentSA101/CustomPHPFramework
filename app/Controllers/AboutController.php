<?php

namespace App\controllers;

use App\Helpers\Helpers;

class AboutController 
{
    public function index()
    {
        return Helpers::view('about');
    }
}