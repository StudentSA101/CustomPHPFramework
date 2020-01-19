# Parking_lot Terminal App
### Description : 

  - A Terminal App to allow owners of parking lots to monitor their parking space usage
### Installation
 - Unzip the application
 - Run composer install to install PHPunit and to autoload the application
 
 ### Basic Usage
- The entry point of the application is the **Parking_lot** file found at the root of the project
 - Open a terminal and run `./parking_lot` in order to start the command shell
 - Open a terminal and run `./parking_lot [insert_file_name]` to run commands from a text file.
 - The file has to be structured as follows: 
```reset
create_parking_lot 6 
park KA-01-HH-1234 White
park KA-01-HH-9999 White
park KA-01-BB-0001 Black
park KA-01-HH-7777 Red
park KA-01-HH-2701 Blue
park KA-01-HH-3141 Black
leave 4
status
park KA-01-P-333 White
park DL-12-AA-9999 White
registration_numbers_for_cars_with_colour White
slot_numbers_for_cars_with_colour White
slot_number_for_registration_number KA-01-HH-3141
slot_number_for_registration_number MH-04-AY-1111 
```
- The files are read from the **storage** folder found at the root of the project
- The following commands may be used: 
```
reset - Drops the whole database
create_parking_lot [insert_number_of_slots] - **creates the database**
park [insert_registration_number] [insert_colour] - **parks a vehicle, updates a vehicle or adds vehicle details but does not park**
status - **shows open slots available**
leave [insert_slot_number] - **removes a vehicle from a slot**
registration_numbers_for_cars_with_colour [insert_colour] - ** retrieves registration numbers based on car colour **
slot_numbers_for_cars_with_colour [insert_colour] - ** retrieves slots based on car colour **
slot_number_for_registration_number [insert_registration_number] ** retrives a slot number of a particular vehicle **
```
### Tech

**[PHP]** - 
`Hypertext Preprocessor is a server-side scripting language designed for Web development, and also used as a general-purpose programming language. It was originally created by Rasmus Lerdorf in 1994; the PHP reference implementation is now produced by The PHP Group.`
**[HTML]** -
`HTML enhanced for web apps!`
**[Composer]** -
`A PHP package manager`
**[PHPUnit]** -
`A PHP framework for writing unit/feature tests`
