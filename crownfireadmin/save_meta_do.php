<?php
session_start();
include("includes/init.php");
///////////////////////////////////////////////////////////
// Let's unset all the errors.
unset($_SESSION['post']);
unset($_SESSION['general_error']);
///////////////////////////////////////////////////////////

$crownfire->saveMeta($_SESSION['page'],$_POST['description'],$_POST['keywords']);

header('Location: aindex.php');
?>