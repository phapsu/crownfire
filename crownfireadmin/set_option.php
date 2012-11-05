<?php
session_start();
include("includes/init.php");
///////////////////////////////////////////////////////////
// Let's unset all the errors.
unset($_SESSION['post']);
unset($_SESSION['general_error']);
unset($_SESSION['type_id']);
///////////////////////////////////////////////////////////

$user_id			= $_REQUEST['user_id'];
$option_key 		= $_REQUEST['option_key'];
$option_value		= $_REQUEST['option_value'];

$user = new users();
$user->setOption($user_id,$option_key,$option_value);
$_SESSION['showUserWindow'] = $option_value;
?>