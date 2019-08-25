<?php

namespace App\Models;

use Container;

class VehicleModal
{
    public static function create($registration, $colour)
    {
        $firstOpenSlot;
        try {
            $query = "SELECT id AS Parking_Slot FROM slots WHERE active = 'FALSE' LIMIT 1 ";
            $statement = Container::get('database')->prepare($query);
            $statement->execute();
            $retrieved = $statement->fetchAll();
            if (count($retrieved) > 0) {
                $firstOpenSlot = $retrieved[0]['Parking_Slot'];
            } else {
                return "None\n";
            }

        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            die();
        }

        try {
            $query = "SELECT registration_number FROM vehicles WHERE registration_number = :id";
            $statement = Container::get('database')->prepare($query);
            $statement->bindParam(':id', $firstOpenSlot);
            $statement->execute();
            $existing = $statement->fetchAll();
        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            die();
        }

        if (count($existing) === 0) {
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

        } else {
            return 'This is an existing vehicle!';
        }

        try {
            $query = "UPDATE slots SET active = 'TRUE' WHERE id = :id";
            $statement = Container::get('database')->prepare($query);
            $statement->bindParam(':id', $firstOpenSlot);
            $statement->execute();
            $existing = $statement->fetchAll();
        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            die();
        }

        return $firstOpenSlot;
    }

    public static function update($registration, $colour)
    {
        $firstOpenSlot;
        try {
            $query = "SELECT id AS Parking_Slot FROM slots WHERE active = 'FALSE' LIMIT 1 ";
            $statement = Container::get('database')->prepare($query);
            $statement->execute();
            $retrieved = $statement->fetchAll();
            if (count($retrieved) > 0) {
                $firstOpenSlot = $retrieved[0]['Parking_Slot'];
            } else {
                return "None\n";
            }

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
        try {
            $query = "UPDATE slots SET active = 'TRUE' WHERE id = :id";
            $statement = Container::get('database')->prepare($query);
            $statement->bindParam(':id', $firstOpenSlot);
            $statement->execute();
            $existing = $statement->fetchAll();
        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            die();
        }

    }

    public static function delete($id)
    {
        $numberExists = false;
        try {
            $query = "SELECT id FROM slots WHERE id = :id";
            $statement = Container::get('database')->prepare($query);
            $statement->bindParam(':id', $id);
            $statement->execute();
            $retrieved = $statement->fetchAll();
            if (count($retrieved) > 0) {
                $numberExists = true;
            } else {
                return "Does not exist";
            }

        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            die();
        }
        if ($numberExists) {
            try {
                $query = "UPDATE vehicles SET slots_id = NULL WHERE Slots_id = :id";
                $statement = Container::get('database')->prepare($query);
                $statement->bindParam(':id', $id);
                $statement->execute();
                $existing = $statement->fetchAll();
            } catch (PDOException $e) {
                print "Error!: " . $e->getMessage() . "<br/>";
                die();
            }

            try {
                $query = "UPDATE slots SET active = 'FALSE' WHERE id = :id";
                $statement = Container::get('database')->prepare($query);
                $statement->bindParam(':id', $id);
                $statement->execute();
            } catch (PDOException $e) {
                print "Error!: " . $e->getMessage() . "<br/>";
                die();
            }
            return $id;
        }

    }

}
