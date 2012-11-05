<?php
//session_start();
include("includes/init.php");
///////////////////////////////////////////////////////////
// Let's unset all the errors.
unset($_SESSION['post']);
unset($_SESSION['general_error']);
///////////////////////////////////////////////////////////
$err = false;
$required_fields = array('user_id','password');

// First unset any other session
$_SESSION['user_id'] = '';
unset($_SESSION['user_id']);

if ($validate->validateForm($required_fields) && !$err) {
	
	$users = new Users();
	$user_id = $users->login($_POST['user_id'],$_POST['password'],2);
	
	if ($user_id) {
		if ($_SESSION['redirect']) {
			$redirect = $_SESSION['redirect'];
			$_SESSION['redirect'] = '';
			unset($_SESSION['redirect']);
		} else {
			$redirect = 'index.php?t='.time();
		}
		header('Location: '.$redirect);
	} else {
		$_SESSION['general_error'][] = "Your username and password is not valid.  Please try again.";
		$_SESSION['post']['errors'][] = '1';	
		$err = true;
		header('Location: login.php');
	}
} else {
	header('Location: login.php');	
}