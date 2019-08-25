<?php

namespace App\Models;

use Container;

class VehicleModal
{
    public static function create($registration, $colour)
    {
        try {
            $query = "SELECT registration_number AS Registration_Number FROM vehicles WHERE registration_number = :existing";
            $statement = Container::get('database')->prepare($query);
            $statement->bindParam(':id', $firstOpenSlot);
            $statement->execute();
            $existing = $statement->fetchAll();
        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            die();
        }
        if (count($existing) > 0) {
            try {
                $query = "SELECT id AS Parking_Slot FROM slots WHERE active = 'TRUE' LIMIT 1 ";
                $statement = Container::get('database')->prepare($query);
                $statement->execute();
                $firstOpenSlot = $statement->fetchAll()[0]['Parking_Slot'];
            } catch (PDOException $e) {
                print "Error!: " . $e->getMessage() . "<br/>";
                die();
            }
            try {
                $query = "INSERT INTO vehicles(slots_id,registration_number,vehicle_colour) VALUES(:id,:registration,:colour)";
                $statement = Container::get('database')->prepare($query);
                $statement->bindParam(':id', $firstOpenSlot);
                $statement->bindParam(':registration', $registration);
                $statement->bindParam(':colour', $colour);
                $statement->execute();
            } catch (PDOException $e) {
                print "Error!: " . $e->getMessage() . "<br/>";
                die();
            }

        }

        return $firstOpenSlot;
    }

}
