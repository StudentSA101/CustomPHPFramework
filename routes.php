<?php 

$checkIfId = ltrim($_SERVER['REQUEST_URI'], '/'); 


if($checkIfId == "" || $checkIfId == 'create')
{
	$router->define([

	'' => 'controllers/index.php',
	'create' => 'controllers/create.php',
	'delete' => 'controller/index.php'

]);
}

else

{
		$router->define([
		$checkIfId => 'controllers/edit.php'
]);
}


