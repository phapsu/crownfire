<?php
session_start();
include('includes/init.php');
if (!isset($_SESSION['user_id']) && basename($_SERVER['PHP_SELF']) != 'login.php') {
	echo "You must be logged in to view this page";
	exit();
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<title>Crownfire</title>
	<meta http-equiv="Content-Type" content="application/xhtml+xml; charset=utf-8" />
	<link href="css/styles.css" rel="stylesheet" />
 	<script type="text/javascript" src="css/iepngfix_tilebg.js"></script>
	<script type="text/javascript" src="js/jquery-1.4.4.min.js"></script>
 	<script type="text/javascript" src="js/functions.js"></script>
	<script type="text/javascript" src="js/jquery.validate.js"></script>
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
</head>
<body>
<div id="tupperware">