<?php
session_start();
include("includes/init.php");
///////////////////////////////////////////////////////////
// Let's unset all the errors.
unset($_SESSION['post']);
unset($_SESSION['general_error']);
unset($_SESSION['type_id']);
///////////////////////////////////////////////////////////
$user_id = $_REQUEST['user_id'];

$userObj = new users();
$userObj->deleteUser($user_id);

// Redirect to next page
header('Location: customers.php');
?>