<?php

namespace App\Commands;

use App\Commands\AutomatedCommand;
use App\Commands\InteractiveCommand;

class ParkingLotCommand
{

    public function run(): void
    {
        $output = shell_exec('vendor/bin/phpunit tests/*');

        if (count($_SERVER["argv"]) > 1) {
            print_r((new AutomatedCommand())->run());
        } else {
            print_r((new InteractiveCommand())->run());
        }

    }

}
