<?php
session_start();
include('includes/init.php');
if (!$_SESSION['admin_id'] && basename($_SERVER['PHP_SELF']) != 'login.php') {
	header('Location: login.php');
	exit();
} elseif($_SESSION['admin_id'] && basename($_SERVER['PHP_SELF']) != 'login.php') {
	// Verify they have permission to be here.
	$user = new users();
	/*
	if (!$user->isAdmin($_SESSION['user_id'])) {
		echo "You do not have permission to be here.  Please login using a proper username and password with administrative permissions";
		$_SESSION['user_id'] = '';
		unset($_SESSION['user_id']);
		exit();
	}
	*/
}
if (!isset($title)) {
	$title = 'Home';
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<title>Crownfire</title>
	<meta http-equiv="Content-Type" content="application/xhtml+xml; charset=utf-8" />
	<link href="css/styles.css" rel="stylesheet" />
	<script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>
        <script type="text/javascript" src="js/jquery-ui-1.8.20.custom.min.js"></script>
 	<script type="text/javascript" src="js/functions.js"></script>
	<script type="text/javascript" src="js/jquery.validate.js"></script>
 	<!--[if IE]><script type="text/javascript" src="excanvas.js"></script><![endif]-->
        <script type="text/javascript" src="js/html5-canvas-drawing-app.js"></script>
 	</script>
	<link rel='shortcut icon' href="img/favicon.ico" type="image/x-icon" />
	<!--[if IE 6]>
	<link href="css/ie6.css" rel="stylesheet" />
	<style type="text/css">
		.logo a, .toolbar a, .gift a, .mini_toolbar a, h4, h3, .calendardetails, .steps li, img, .editLink {
			behavior: url(css/iepngfix.htc)
		}
	</style>
	<![endif]-->
	<!--[if IE 7]>
	<link href="css/ie7.css" rel="stylesheet" />
	<![endif]-->
	<script>
	$(function() {
		$( "#sortable" ).sortable();
	});
	</script>
</head>
<body>
<!--<center>
 <h1 style="color: #000; background-color: yellow;">Crownfire Admin Sandbox</h1>
</center>-->
<div id="tupperware">
<div id="status">
	<a href="aindex.php" style="color: #fff;">Home</a> | <a href="login_do.php?logout=1" style="color: #fff;">Logout</a>
</div>
