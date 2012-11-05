<?php
session_start();
//$_SERVER['DOCUMENT_ROOT'] = '../crownfire';
include('../config/config.php');
include('../classes/db.class.php');
include('../classes/validate.class.php');
$validate = new Validate();

include('../classes/crownfire.class.php');
$crownfire = new crownfire();

include('../classes/display.class.php');
$display = new Display();

include('../classes/user.class.php');
include('../classes/property.class.php');
include('../classes/document.class.php');
include('../classes/error.class.php');
if (in_array(basename($_SERVER['PHP_SELF']), array('view_document.php','view_cert.php'))) {
	require_once('../classes/tcpdf/config/lang/eng.php');
	require_once('../classes/tcpdf/tcpdf.php');
}
include('../classes/logger.class.php');
?>
