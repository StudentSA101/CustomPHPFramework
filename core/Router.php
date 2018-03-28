<?php 

class Router
{

	protected $routes = [];

	public function define($routes)
	{

		$this->routes = $routes;

	}


	public function direct($uri)

	{
		//looks through the array for key value pairs.  If they match the uri is returned. 
		if(array_key_exists($uri, $this->routes))
		{

			return $this->routes[$uri];

		}

		throw new Exception('No route defined for this URI');	

	}


}

