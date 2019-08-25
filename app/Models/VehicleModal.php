<?php

namespace App\Models;

use Container;

class VehicleModal
{
    public static function create($registration, $colour)
    {
        try {
            $query = "SELECT 'id' FROM slots asc LIMIT 3";
            $statement = Container::get('database')->prepare($query);

            $statement->execute();
            $lotDetails = $statement->fetch();

        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            die();
        }
        $query = "INSERT INTO vehicles(slots_id,registration_number,colour) VALUES($openParking,$registration,$colour)";
        $statement = Container::get('database')->prepare($query)->$statement->execute();

        return $openParking;
    }

}
