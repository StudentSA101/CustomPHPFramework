<?php

namespace App\controllers;

use App\Helpers\Helpers;
use Container;

class HomeController
{
    public function index()
    {

        $statement = Container::get('database')->prepare('select * from slots');

        $statement->exec();

        var_dump($statement->fetchAll());

        return Helpers::view('home');
    }

    public function fourOhFour()
    {
        return Helpers::view('404');
    }
}
