<?php

namespace App\Commands;

use App\Commands\AutomatedCommand;
use App\Commands\InteractiveCommand;
use App\Repository\GetFileContent;
use App\Repository\HandleInput;

class ParkingLotCommand
{

    public function run(): void
    {
        echo shell_exec('vendor/bin/phpunit tests/*');

        if (count($_SERVER["argv"]) > 1) {
            (new AutomatedCommand(new HandleInput, new GetFileContent))->run();
        } else {
            (new InteractiveCommand(new HandleInput))->run();
        }

    }

}
