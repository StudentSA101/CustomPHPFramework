<?php

namespace App\controllers;

use Container;

use App\Helpers\Helpers;

class HomeController 
{
    public function index()
    {
        
        $statement = Container::get('pdo')->prepare('select * from projects');

        $statement->execute();

        var_dump($statement->fetchAll());

        return Helpers::view('home');
    }

    public function fourOhFour()
    {
        return Helpers::view('404');
    }
}