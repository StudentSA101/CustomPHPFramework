<?php

// database query 
$users = $query->get_users('users');
// delete set to 1 so that it is initiated. 
$delete = 1;
if($_POST == TRUE)
{
	$id=array_keys($_POST);
	$delete = $query->delete_user('users',$id);
}
require 'views/index.view.php';

