<?php

namespace App\Helpers;

use Container;

class ParkingLotMigrations
{
    public static function createParkingLot()
    {
        $command = [
            'CREATE TABLE IF NOT EXISTS slots (
                id INTEGER PRIMARY KEY,
                active BOOLEAN DEFAULT FALSE
            )',
            'CREATE TABLE IF NOT EXISTS vehicles (
                id INTEGER PRIMARY KEY,
                slots_id VARCHAR (255) DEFAULT NULL,
                registration_number VARCHAR (255),
                vehicle_colour VARCHAR (255)
            )',
        ];

        Container::get('database')->exec($command[0]);
        Container::get('database')->exec($command[1]);

    }

    public static function insertParkingSlots($constant)
    {
        for ($i = 1; $i <= $constant; $i++) {
            Container::get('database')
                ->exec("INSERT INTO slots(id) VALUES($i)");
        }
    }

    public static function checkIfParkingSlotsCreated()
    {
        $check = Container::get('database')->exec("SELECT * from 'slots'");
        if (!$check && $check !== 0) {
            return false;
        }
        return true;

    }

    public static function dropParkingLot()
    {
        Container::get('database')->exec('DROP TABLE vehicles');
        Container::get('database')->exec('DROP TABLE slots');

    }

}
