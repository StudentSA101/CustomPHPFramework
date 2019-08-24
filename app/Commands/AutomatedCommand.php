<?php

namespace App\Commands;

use App\Contracts\HandleCommandDataInterface;

class AutomatedCommand
{

    private $handle;

    public function __construct(HandleCommandDataInterface $handle)
    {
        $this->handle = $handle;
    }

    public function run(bool $test = false)
    {
        if (count($_SERVER["argv"]) > 2) {
            throw new \Exception('Sorry, please enter only one input file');
        }
        $file = file_get_contents(
            "/" . trim(__DIR__, 'app/Commands') . "/storage/" . $_SERVER["argv"][1]);
        $data = preg_split('/\n/', $file);

        }
        print_r($data);

        if (!$test) {
            print_r(trim("There are " . $_SERVER["argc"] . " arguments"));
            print_r($_SERVER["argv"]);
        }
    }
}
