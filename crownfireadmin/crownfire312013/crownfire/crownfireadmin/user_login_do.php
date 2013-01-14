<?php
include("includes/init.php");
///////////////////////////////////////////////////////////
// Let's unset all the errors.
unset($_SESSION['post']);
unset($_SESSION['general_error']);
unset($_SESSION['user_id']);
///////////////////////////////////////////////////////////
$err = false;
$required_fields = array('user_id','password');

if ($validate->validateForm($required_fields)) {
	
	$users = new Users();
	$user_id = $users->login($_REQUEST['user_id'],$_REQUEST['password'],2);
	
	if ($user_id) {
		if ($_SESSION['redirect']) {
			$redirect = $_SESSION['redirect'];
			$_SESSION['redirect'] = '';
			unset($_SESSION['redirect']);
		} else {
			$redirect = '../members/index.php?t='.time();
		}
		header('Location: '.$redirect);
	} else {
		$_SESSION['general_error'][] = "Your username and password is not valid.  Please try again.";
		$_SESSION['post']['errors'][] = '1';	
		$err = true;
		header('Location: ../members/login.php');
	}
} else {
	header('Location: ../members/login.php');	
}