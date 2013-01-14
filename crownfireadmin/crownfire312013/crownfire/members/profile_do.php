<?php
session_start();
include("includes/init.php");
$db = new database();
///////////////////////////////////////////////////////////
// Let's unset all the errors.
unset($_SESSION['post']);
unset($_SESSION['general_error']);
///////////////////////////////////////////////////////////
$err = false;
$required = array('name','email','username','password');

if ($_POST['email']) {
	if (!$validate->validEmail($_POST['email'])) {
		$_SESSION['general_error'][] = "Invalid email address";
		$_SESSION['post']['errors'][] = 'email';
		$err = true;
	}
}

if ($_POST['username'] && empty($_POST['user_id'])) {
	$query = "SELECT count(*) AS my_c FROM users WHERE username = '".$db->escape_string($_POST['username'])."'";
	$results = $db->dbQuery($query);
	
	if ($db->result($results,0,'my_c') > 0) {
		$_SESSION['general_error'][] = "That username is taken";
		$_SESSION['post']['errors'][] = 'username';
		$err = true;
	}
}

if ($validate->validateForm($required) && !$err) {
	$user = new users();
	$user->setName($_POST['name']);
	$user->setEmail($_POST['email']);
	$user->setPassword($_POST['password']);
	$id = $user->save($_SESSION['user_id']);
	header('Location: index.php?c=profile&a=updated');
} else {
	header('Location: profile.php');	
}
?>