<?php

namespace App\Repository;

use App\Contracts\HandleCommandDataInterface;
use App\Helpers\ParkingLotMigrations;
use App\Models\VehicleModal;

/**
 * Class to handle command input
 */
class HandleInput implements HandleCommandDataInterface
{
    /**
     * resolves the particular method based on argument
     *
     * @param string $function
     * @param array $input
     * @return string
     */
    public function determine(string $function, array $input = []): string
    {

        $function = lcfirst(trim(preg_replace('/\n/', '', $function)));

        if (method_exists(HandleInput::class, $function)) {
            return $this->$function($input);
        }

        return "Sorry, unfortunately that command does not exist!\nPlease enter a new command or terminate the shell?\n";

    }
    /**
     * create database with tables
     *
     * @param array $data
     * @return string
     */
    private function create_parking_lot(array $data): string
    {
        if (count($data) === 0) {
            return "Error, Please try again.\n";
        }
        if (!ParkingLotMigrations::checkIfParkingSlotsCreated()) {
            ParkingLotMigrations::createParkingLot();
            ParkingLotMigrations::insertParkingSlots($data[1]);
            return "Created a parking lot with $data[1] slots\n";
        }

        return "Parking Lot already exists. Delete existing parking lot to continue or enter another command.\n";
    }
    /**
     * Create entry in database
     *
     * @param array $data
     * @return string
     */
    private function park(array $data): string
    {
        if (count($data) < 3) {
            return "Error, Please try again.\n";
        }
        $result = VehicleModal::create($data[1], $data[2]);
        if ($result !== "This is an existing vehicle!" && $result !== 'None') {
            return "Allocated slot number: " . $result . "\n";
        }
        return "Allocated slot number: " . VehicleModal::update($data[1], $data[2]) . "\n";

    }
    /**
     * remove entry from table
     *
     * @param array $data
     * @return string
     */

    private function leave(array $data): string
    {
        if (count($data) === 0) {
            return "Error, Please try again.\n";
        }
        $response = VehicleModal::delete($data[1]);
        if ($response !== 'Does not exist') {
            return "Slot number $response is free\n";
        }
        return "The slot number does not exist!\n";
    }
    /**
     * Check first open spot in database
     *
     * @return string
     */
    private function status(): string
    {
        return "Slot number " . VehicleModal::status() . " is free.\n";
    }
    /**
     * Retrieve set of database based on colour
     *
     * @param array $data
     * @return string
     */
    private function registration_numbers_for_cars_with_colour(array $data): string
    {
        if (count($data) === 0) {
            return "Error, Please try again.\n";
        }

        $result = '';
        $retrieved = VehicleModal::Query($data);
        if ($retrieved !== 'None') {
            foreach ($retrieved as $value) {
                $result .= $value['registration_number'] . ', ';
            }
            return $result . "\n";
        }
        return "None\n";

    }
    /**
     * Retrieve set of database based on colour
     *
     * @param array $data
     * @return string
     */
    private function slot_numbers_for_cars_with_colour(array $data): string
    {
        if (count($data) === 0) {
            return "Error, Please try again.\n";
        }
        $result = '';
        $retrieved = VehicleModal::Query($data);
        if ($retrieved !== 'None') {
            foreach ($retrieved as $value) {
                $result .= $value['slots_id'] . ', ';
            }
            return $result . "\n";
        }
        return "None\n";
    }
    /**
     * Retrieve set of data based on registration number
     *
     * @param array $data
     * @return string
     */
    private function slot_number_for_registration_number(array $data): string
    {
        if (count($data) === 0) {
            return "Error, Please try again.\n";
        }
        $retrieved = VehicleModal::Query($data);
        if ($retrieved !== 'None') {
            return $retrieved[0]['slots_id'] . "\n";
        }
        return "None\n";
    }
    /**
     * Drop the tables
     *
     * @return string
     */
    private function reset(): string
    {
        ParkingLotMigrations::dropParkingLot();

        return "Parking Lot Successfully Deleted\n";
    }

}
