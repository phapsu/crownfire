<?php
session_start();
include("includes/init.php");
///////////////////////////////////////////////////////////
// Let's unset all the errors.
unset($_SESSION['post']);
unset($_SESSION['general_error']);
unset($_SESSION['type_id']);
///////////////////////////////////////////////////////////
$document_id 	= $_REQUEST['id'];
$user_id 		= $_REQUEST['user_id'];
$property_id 	= $_REQUEST['property_id'];

$documentObj = new document($document_id);
$documentObj->delete();

// Redirect to next page
header('Location: blank_documents.php?user_id='.$user_id.'&property_id='.$property_id);
?>