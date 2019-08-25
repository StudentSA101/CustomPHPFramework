<?php

namespace App\Commands;

use App\Contracts\GetFileContentsInterface;
use App\Contracts\HandleCommandDataInterface;

class AutomatedCommand
{

    private $handle;
    private $file;

    public function __construct(HandleCommandDataInterface $handle, GetFileContentsInterface $file)
    {
        $this->handle = $handle;
        $this->file = $file;
    }

    public function run(bool $test = false): void
    {

        if (count($_SERVER["argv"]) > 2) {
            throw new \Exception('Sorry, please enter only one input file');
        }

        foreach ($this->file->get() as $parameter) {
            print_r($handle->determine($parameter[0], $parameter[1]));
        }

        if (!$test) {
            print_r(trim("There are " . $_SERVER["argc"] . " arguments"));
            print_r($_SERVER["argv"]);
        }
    }
}
