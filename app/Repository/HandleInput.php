<?php

namespace App\Repository;

use App\Contracts\HandleCommandDataInterface;

class HandleInput implements HandleCommandDataInterface
{

    public function determine(string $function, array $input = []): string
    {
        call_user_func_array(lcfirst(trim(preg_replace('/\n/', '', $function))), $input);
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
    function exit(): string {
        return 'Thank you, you have exited the program';

    }

}
