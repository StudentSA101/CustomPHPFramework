<?php

namespace App\Helpers;

use Container;

class ParkingLotMigrations
{
    public static function createParkingLot()
    {
        $command = [
            'CREATE TABLE IF NOT EXISTS vehicles (
                id INTEGER PRIMARY KEY,
                registration_number TEXT NOT NULL,
                vehicle_colour TEXT NOT NULL,
                slot INTEGER NOT NULL
            )',
            'CREATE TABLE IF NOT EXISTS slots (
                id INTEGER PRIMARY KEY,
                vehicle_id VARCHAR (255),
                active BOOLEAN,
                FOREIGN KEY (vehicle_id)
                REFERENCES vehicles(id)
                ON UPDATE CASCADE
                ON DELETE CASCADE
            )',
        ];

        Container::get('database')->exec($command[0]);
        Container::get('database')->exec($command[1]);

    }

    public static function insertParkingSlots($constant)
    {
        for ($i = 0; $i < $constant; $i++) {
            Container::get('database')
                ->exec('INSERT INTO slots (active)
            VALUES (false)');
        }
    }

    public static function checkIfParkingSlotsCreated()
    {
        var_dump(Container::get('database')->exec('SHOW TABLE slots'));
        if (empty(Container::get('database')->exec('SHOW TABLES'))) {
            return false;
        }
        return true;

    }

    public static function dropParkingLot()
    {
        return [
            'DROP TABLE vehicles',
            'DROP TABLE slots',
        ];

    }

}
