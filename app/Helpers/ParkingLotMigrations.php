<?php

namespace App\Helpers;

use Container;

/**
 * Class setup as a helper to create the database.
 */
class ParkingLotMigrations
{
    /**
     * static method used to create the database
     *
     * @return void
     */
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
    /**
     * static method used to insert parking bays in slots table
     *
     * @param String $constant
     * @return void
     */
    public static function insertParkingSlots($constant)
    {
        for ($i = 1; $i <= $constant; $i++) {
            Container::get('database')
                ->exec("INSERT INTO slots(id) VALUES($i)");
        }
    }
    /**
     * Method to check whether the database exists or not
     *
     * @return void
     */
    public static function checkIfParkingSlotsCreated()
    {
        $check = Container::get('database')->exec("SELECT * from 'slots'");
        if (!$check && $check !== 0) {
            return false;
        }
        return true;

    }
    /**
     * Static method to drop the tables in database
     *
     * @return void
     */
    public static function dropParkingLot()
    {
        Container::get('database')->exec('DROP TABLE vehicles');
        Container::get('database')->exec('DROP TABLE slots');

    }

}
