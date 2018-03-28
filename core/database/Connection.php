<?php

class Connection
{
	// Make method available globally without needing an object instance 
	public static function make($config)
	{

			// Tries to connect to the database.
		try {

				return new PDO(


					$config['connection']. ';dbname='.$config['name'],

					$config['username'],

					$config['password'],

					$config['options']

				);

			}

			catch(PDOException $e)
			{

			// Place here what to do if you cannot connect. 
			

			} 
		
	}

}
	
