<?php

namespace App\Repository;

class HandleInput implements HandleCommandDataInterface
{

    private $handler = [
        'create_parking_lot',
    ];

    public function determine(array $data): string
    {
        foreach ($data as $value) {
            $explode = explode($value);
            call_user_func_array($explode[0], $explode[1]);
        }
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

    }
    private function slot_numbers_for_cars_with_colour()
    {

    }
    private function slot_number_for_registration_number()
    {

    }
    private function reset()
    {

    }
}
