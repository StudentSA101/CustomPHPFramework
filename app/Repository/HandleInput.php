<?php

namespace App\Repository;

use App\Contracts\HandleCommandDataInterface;

class HandleInput implements HandleCommandDataInterface
{

    public function determine(string $function, array $input = []): string
    {

        $function = lcfirst(trim(preg_replace('/\n/', '', $function)));
        if (function_exists($function) === true) {
            return $this->$function();
        }
        return "Sorry, unfortunately that command does not exist!\nPlease enter a new command or terminate the shell?\n";

    }

    private function create_parking_lot(): string
    {
        return 'create_parking_lot';
    }
    private function park(): string
    {
        return 'park';
    }
    private function leave(): string
    {
        return 'leave';
    }
    private function status(): string
    {
        return 'status';
    }
    private function registration_numbers_for_cars_with_colour(): string
    {
        return 'registration_numbers_for_cars_with_colour';

    }
    private function slot_numbers_for_cars_with_colour(): string
    {
        return 'slot_numbers_for_cars_with_colour';

    }
    private function slot_number_for_registration_number(): string
    {
        return 'slot_number_for_registration_number';

    }
    private function reset(): string
    {
        return 'reset';

    }

}
