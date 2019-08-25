<?php

namespace App\Commands;

use App\Contracts\HandleCommandDataInterface;

/**
 * Command Class setup for testing purposes
 */
class TestCommand
{
    /**
     * Datahandler
     *
     * @var HandleCommandDataInterface
     */
    private $handle;
    /**
     * Inject dependecies
     *
     * @param HandleCommandDataInterface $handle
     */
    public function __construct(HandleCommandDataInterface $handle)
    {
        $this->handle = $handle;
    }
    /**
     * Initiate the commands
     *
     * @param [type] $input
     * @return void
     */
    public function run($input)
    {
        $input = lcfirst(trim(preg_replace('/\n/', '', $input)));
        $parameters = preg_split('/\s/', $input);

        while ($input !== 'exit') {
            if (count($parameters) > 1) {
                return $this->handle->determine($parameters[0], $parameters);
            } else if (count($parameters) === 1) {
                return $this->handle->determine($input, []);
            }
            $input = lcfirst(trim(preg_replace('/\n/', '', fread(STDIN, 80))));
            $parameters = preg_split('/\s/', $input);
        }
        return 'exit';

    }
}
