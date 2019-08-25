<?php

namespace App\Models;

use Container;

class VehicleModal
{
    public static function create($registration, $colour)
    {
        $openParking = Container::get('database')->exec("SELECT id FROM Users WHERE username='$name' limit 1");
        Container::get('database')
            ->exec("INSERT INTO vehicles(slots_id,registration_number,colour) VALUES($openParking,$registration,$colour)");
    }

}
