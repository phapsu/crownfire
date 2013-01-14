<?php
session_start();
include("includes/init.php");
///////////////////////////////////////////////////////////
// Let's unset all the errors.
unset($_SESSION['post']);
unset($_SESSION['general_error']);
///////////////////////////////////////////////////////////

$required = array('address1','name','city','province','country','postal_code');

if ($validate->validateForm($required) && $err != 1) {
	$property = new property($_POST['id']);
	$property->setUserId($_POST['user_id']);
	$property->setName($_POST['name']);
	$property->setAddress1($_POST['address1']);
	$property->setAddress2($_POST['address2']);
	$property->setCity($_POST['city']);
	$property->setPostal($_POST['postal_code']);
	$property->setProvince($_POST['province']);
	$property->setCountry($_POST['country']);
	$id = $property->save();
	
	if ($_POST['id']) {
		logger::log('property', 'changed', $_POST['id'], $_SESSION['user_id']);
	} else {
		logger::log('property', 'added', $id, $_SESSION['user_id']);
	}
	header('Location: view_properties.php?user_id='.$_POST['user_id'].'&ps=1');
} else {
	header('Location: edit_property.php?id='.$_POST['id'].'&user_id='.$_POST['user_id']);	
}
?>