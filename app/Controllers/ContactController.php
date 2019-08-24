<?php

namespace App\controllers;

use App\Helpers\Helpers;

class ContactController 
{
    public function index()
    {
        return Helpers::view('contact');
    }
}