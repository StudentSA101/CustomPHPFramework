<?php 

namespace App\Helpers;

function view($name, $data = []) 
{
    extract($data);

    return require '../resources/views/'.$name.'.view.php';
}

function redirect($path) 
{
    header("Location: /{$path}");
}