<?php

namespace App\controllers;

use App\Helpers\Helpers;

class PortfolioController 
{
    public function index()
    {
        return Helpers::view('portfolio');
    }
}