<?php
 
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

   /**
    * Database configuration
    */
    
    public static function sqlite() : String
    {
        return "sqlite:".__DIR__."/db/database.sqlite";
    }
}