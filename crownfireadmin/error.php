<?php
session_start();
include("includes/init.php");
///////////////////////////////////////////////////////////
// Let's unset all the errors.
unset($_SESSION['post']);
unset($_SESSION['general_error']);
unset($_SESSION['type_id']);
///////////////////////////////////////////////////////////
$db = new database();
$q = "INSERT INTO errors SET error = '".$db->escape_string($_POST['error_desc'])."', vars= '".$db->escape_string(urldecode($_POST['vars']))."', page='".$db->escape_string(urldecode($_POST['return']))."', date_added = UNIX_TIMESTAMP();";
$db->dbQuery($q);

mail('npoole@gmail.com','New Crownfire Bug', $_POST['error_desc']);

if (!empty($_POST['return2'])) {
    $return = urldecode($_POST['return2'].'?'.$_POST['vars2']);
} else {
    $return = 'index.php';
}

header("Location: ".$return);
?>