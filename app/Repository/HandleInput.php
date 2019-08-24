<?php

namespace App\Repository;

class HandleInput implements HandleCommandDataInterface
{

    public function determine(string $function, array $input = []): string
    {
        call_user_func_array($function, $input);
    }

    private function create_parking_lot()
    {
        return 'create_parking_lot';
    }
    private function park()
    {
        return 'park';
    }
    private function leave()
    {
        return 'leave';
    }
    private function status()
    {
        return 'status';
    }
    private function registration_numbers_for_cars_with_colour()
    {
        return 'registration_numbers_for_cars_with_colour';

    }
    private function slot_numbers_for_cars_with_colour()
    {
        return 'slot_numbers_for_cars_with_colour';

    }
    private function slot_number_for_registration_number()
    {
        return 'slot_number_for_registration_number';

    }
    private function reset()
    {
        return 'reset';

    }
}
