<?php

namespace App\commands;

final class AutomatedCommand
{
    public function run(bool $test = false)
    {
        if (!$test) {
            print_r(trim("There are " . $_SERVER["argc"] . " arguments"));
            print_r($_SERVER["argv"]);
        }
    }
}
