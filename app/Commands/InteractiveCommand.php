<?php

namespace App\Commands;

use App\Contracts\HandleCommandDataInterface;

/**
 * Command Class that receives input interactively and serves response to user
 */
class InteractiveCommand
{
    /**
     * Datahandler object
     *
     * @var HandleCommandDataInterface
     */
    private $handle;

    public function __construct(HandleCommandDataInterface $handle)
    {
        $this->handle = $handle;
    }

    public function run(bool $test = false): void
    {
        echo "\nWelcome to the Parking Lot Terminal\n\n";

        $input = lcfirst(trim(preg_replace('/\n/', '', fread(STDIN, 80))));
        $parameters = preg_split('/\s/', $input);

        while ($input !== 'exit') {
            if (count($parameters) > 1) {
                echo $this->handle->determine($parameters[0], $parameters);
            } else if (count($parameters) === 1) {
                echo $this->handle->determine($input, []);
            }
            $input = lcfirst(trim(preg_replace('/\n/', '', fread(STDIN, 80))));
            $parameters = preg_split('/\s/', $input);

        }
        echo "\nThe Command Shell has been terminated\n\n";
    }

}
