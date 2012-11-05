<?php
session_start();
include('config/config.php');
include('classes/db.class.php');
include('classes/crownfire.class.php');
include('classes/user.class.php');
include('classes/display.class.php');

$display = new Display();
$crownfire = new crownfire();

if (!$cfg['site_up'] && basename($_SERVER['PHP_SELF']) != 'site_down.php') {
	header('Location: site_down.php');
}


