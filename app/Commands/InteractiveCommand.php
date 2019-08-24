<?php

namespace App\Commands;

use App\Contracts\HandleCommandDataInterface;

class InteractiveCommand
{
    private $handle;

    public function __construct(HandleCommandDataInterface $handle)
    {
        $this->handle = $handle;
    }

    public function run(): void
    {
        echo "Welcome, how many parking lots do you have? ";
        $input = lcfirst(trim(preg_replace('/\n/', '', fread(STDIN, 80))));
        $parameters = explode($input, '');
        while ($input !== 'exit') {
            if (count($parameters) === 1) {
                print_r($this->handle->determine($input));
            } else {
                print_r($this->handle->determine($parameters[0], $parameters[1]));
            }
            $input = lcfirst(trim(preg_replace('/\n/', '', fread(STDIN, 80))));
        }
        echo "The Command Shell has been terminated ";
    }

}
