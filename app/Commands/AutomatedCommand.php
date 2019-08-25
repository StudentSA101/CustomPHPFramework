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

            echo "Please enter a correct input file\n";

        } else {

            echo "\nWelcome to the Parking Lot Terminal\n\n";

            foreach ($this->file->get() as $parameters) {
                $input = lcfirst(trim(preg_replace('/\n/', '', $parameters)));
                $parameters = preg_split('/\s/', $parameters);
                if (count($parameters) > 1) {
                    echo $this->handle->determine($parameters[0], $parameters);
                } else if (count($parameters) === 1) {
                    echo $this->handle->determine($input, []);
                }
            }

        }

    }
}
