<?php
session_start();
include("includes/init.php");
///////////////////////////////////////////////////////////
// Let's unset all the errors.
unset($_SESSION['post']);
unset($_SESSION['general_error']);
unset($_SESSION['type_id']);
///////////////////////////////////////////////////////////
$property_id = $_REQUEST['property_id'];
$user_id	 = $_REQUEST['user_id'];

$property = new property($property_id);
$property->delete();

// Redirect to page
header('Location: view_properties.php?user_id='.$user_id.'&property_id='.$property_id);
?>