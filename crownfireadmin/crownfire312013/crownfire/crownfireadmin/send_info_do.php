<?php
session_start();
include("includes/init.php");
require_once('../classes/phpmailer/class.phpmailer.php');
///////////////////////////////////////////////////////////
// Let's unset all the errors.
unset($_SESSION['post']);
unset($_SESSION['general_error']);
///////////////////////////////////////////////////////////

////////////// Get our user info /////////////// 
$user_id = $_REQUEST['user_id'];
$userObj = new users();
$userInfo = $userObj->getUserInfo($user_id);
////////////////////////////////////////////////
notification::sendWelcomeEmail($userInfo);

$redirect = (isset($_GET['redirect'])) ? $_GET['redirect'] : 'customers.php';
header('Location: '.$redirect);
?>