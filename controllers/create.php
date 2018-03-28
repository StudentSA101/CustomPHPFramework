<?php

	//tests to see if data is submitted.  If it is, the submitted data is inserted into the database.  
	$testSubmit = !empty($_POST);
	$insert = '';
	if($testSubmit)
	{
		$table = 'users';
		$data = $_POST;
		$data = array_filter($data);
		$insert = $query->set_users($table,$data);
	}

	require 'views/create.view.php';
