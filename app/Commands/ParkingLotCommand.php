<?php

namespace App\Commands;

use App\Commands\AutomatedCommand;
use App\Commands\InteractiveCommand;

class ParkingLotCommand
{

    public function run()
    {
        $output = shell_exec('vendor/bin/phpunit tests/*');

        print_r($_SERVER["argv"]);

        if (count($_SERVER["argv"]) > 1) {
            return (new InteractiveCommand())->run();
        }

        return (new AutomatedCommand())->run();

    }

}
