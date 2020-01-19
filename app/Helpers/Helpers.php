<?php

namespace App\Helpers;

class Helpers
{

    public static function view($name, $data = [])
    {
        extract($data);

        return require __DIR__ . './../Resources/views/' . $name . '.view.php';
    }

    public static function redirect($path)
    {
        header("Location: /{$path}");
    }
}
