<?php

error_reporting(E_ALL); ini_set('display_errors', 1);
// require our database connection and query builder file that acts as our model. 
$query = require 'core/bootstrap.php';

// instantiate a new instance of the object class. 
$router = new Router;

//require our set routes that are accepted. 
require 'routes.php';

// use trim to trim off the excess forward slash. 
$uri = trim($_SERVER['REQUEST_URI'], '/');

// because you require this, it requires the specific pages you selected. 
require $router->direct($uri);



