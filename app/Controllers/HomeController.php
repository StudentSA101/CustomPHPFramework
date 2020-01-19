<?php

namespace App\controllers;

use App\Helpers\Helpers;

/**
 * Home controller for Request Response handling
 */
class HomeController
{
    /**
     * The main url called
     *
     * @return void
     */
    public function index()
    {
        return Helpers::view('home');
    }
    /**
     * Url with subsection called
     *
     * @return void
     */
    public function fourOhFour()
    {
        return Helpers::view('404');
    }
}
