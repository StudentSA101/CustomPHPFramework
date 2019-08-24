<?php

echo "Welcome, how many parking lots do you have?";

$parkingLot = fread(STDIN, 80);

$parkingLot = trim($site);

if (count($parkingLot) > 0 && ctype_digit($parkingLot)) {

    echo "Are you sure that one is your favorite?n";

} else {

    throw new Exception('Sorry, please try again and enter an amount bigger than 1');

}
