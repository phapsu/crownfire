<?php
session_start();
include("includes/init.php");
///////////////////////////////////////////////////////////
// Let's unset all the errors.
unset($_SESSION['post']);
unset($_SESSION['general_error']);
///////////////////////////////////////////////////////////

$required_fields = array('email','password');

if ($_REQUEST['logout'] == 1) {
	$_SESSION['admin_id'] = "";
	unset($_SESSION['admin_id']);
	header('Location: login.php');
} else {
	
	if ($validate->validateForm($required_fields) && !$err) {
		
		$users = new Users();
		$user_id = $users->login($_POST['email'],$_POST['password'],2,true);
		
		if ($user_id) {
			if ($_SESSION['redirect']) {
				$redirect = $_SESSION['redirect'];
				$_SESSION['redirect'] = '';
				unset($_SESSION['redirect']);
			} else {
				$redirect = 'aindex.php?t='.time();
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
}