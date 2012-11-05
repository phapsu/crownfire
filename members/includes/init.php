<?php
session_start();
//$_SERVER['DOCUMENT_ROOT'] = $_SERVER['DOCUMENT_ROOT'].'/crownfire';
include($_SERVER['DOCUMENT_ROOT'].'/config/config.php');
include($_SERVER['DOCUMENT_ROOT'].'/classes/db.class.php');
include($_SERVER['DOCUMENT_ROOT'].'/classes/validate.class.php');
$validate = new Validate();

include($_SERVER['DOCUMENT_ROOT'].'/classes/crownfire.class.php');
$crownfire = new crownfire();

include($_SERVER['DOCUMENT_ROOT'].'/classes/display.class.php');
$display = new Display();

include($_SERVER['DOCUMENT_ROOT'].'/classes/user.class.php');
include($_SERVER['DOCUMENT_ROOT'].'/classes/property.class.php');
include($_SERVER['DOCUMENT_ROOT'].'/classes/document.class.php');
include($_SERVER['DOCUMENT_ROOT'].'/classes/error.class.php');
if (in_array(basename($_SERVER['PHP_SELF']), array('view_document.php','view_cert.php'))) {
	require_once($_SERVER['DOCUMENT_ROOT'].'/classes/tcpdf/config/lang/eng.php');
	require_once($_SERVER['DOCUMENT_ROOT'].'/classes/tcpdf/tcpdf.php');
}
include($_SERVER['DOCUMENT_ROOT'].'/classes/logger.class.php');
?>
