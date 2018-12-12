<?php
 
namespace App;
 
class Config {
   /**
    * Database configuration
    */

    public static function mysql() : array
    {
        return [
            'connection' => 'mysql:host=127.0.0.1;dbname=bleh',
            'username' => 'asdf',
            'password' => 'asdfasdf',
            'options' => ''
        ];
    }

    public static function sqlite() : String
    {
        return 'sqlite:db/phpsqlite.db';
    }
}