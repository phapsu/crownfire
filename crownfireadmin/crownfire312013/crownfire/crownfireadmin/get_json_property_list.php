<?php
session_start();
include('includes/init.php');
$property = new property();
echo $property->getJsonListByUserId($_GET['user_id']);
?>