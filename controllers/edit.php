<?php
	
	// the uri is trimmed to retrieve the id. 
	$id = ltrim($_SERVER['REQUEST_URI'], '/edit/');
	$user = $query->update_users('users',$id);
	$testSubmit = !empty($_POST);
	$update = ''; //otherwise undefined error
	if($testSubmit)
	{

		$table = 'users';
		$data = $_POST;
		$data = array_filter($data);
		$update = $query->edit_users($table,$data,$id);
		
	}

	require 'views/edit.view.php';
