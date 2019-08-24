<?php

namespace App\Commands;

class InteractiveCommand
{

    public function run(): void
    {
        echo "Welcome, how many parking lots do you have? ";
        $input = fread(STDIN, 80);
        $parameters = explode($input, '');
        while ($input !== 'Exit' && $input !== 'exit') {
            if (count($parameters) === 0) {
                print_r($handle->determine($input));
            } else {
                print_r($handle->determine($parameters[0], $parameters[1]));
            }
            $input = fread(STDIN, 80);
        }

    }

}
