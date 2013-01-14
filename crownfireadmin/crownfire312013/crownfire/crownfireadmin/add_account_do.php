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
	$user->setType(2);
	$user->setEmail($_POST['email']);
	$user->setUsername($_POST['username']);
	$user->setPassword($_POST['password']);
        $loginUntil = date('Y-m-d H:i', strtotime($_POST['login_until']));
	$user->setLoginUntil($loginUntil);
	$id = $user->save($_POST['user_id'], true);
	
	if ($_POST['fl_send']) {
		$userObj = new users();
		$userInfo = $userObj->getUserInfo($id);
		notification::sendWelcomeEmail($userInfo);
	}
        
        if(isset($_GET['redirect'])){
            header('Location: '.$_GET['redirect']);
        }else{
            header('Location: users.php');
        }
} else {
	header('Location: add_account.php?user_id='.$_POST['user_id']);	
}
?>