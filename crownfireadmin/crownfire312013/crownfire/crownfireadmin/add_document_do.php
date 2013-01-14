<?php
session_start();
include("includes/init.php");
///////////////////////////////////////////////////////////
// Let's unset all the errors.
unset($_SESSION['post']);
unset($_SESSION['general_error']);
unset($_SESSION['type_id']);
///////////////////////////////////////////////////////////

$type_id 		= $_POST['type_id'];
$_SESSION['type_id'] 	= $type_id;

// Redirect to next page
if ($type_id) {
	header('Location: add_document_2.php?user_id='.$_POST['user_id'].'&property_id='.$_POST['property_id'].'&type_id='.$type_id);
} else {
	header('Location: add_document.php?user_id='.$_POST['user_id'].'&property_id='.$_POST['property_id']);
}
?>