<?php
//session_start();
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
include('../classes/notification.class.php');
include('../classes/logger.class.php');

if (in_array(basename($_SERVER['PHP_SELF']),array('view_document.php','view_document_all.php'))) {
	require_once('../classes/tcpdf/config/lang/eng.php');
	require_once('../classes/tcpdf/tcpdf.php');
}

// Pull in an option or two ...
$user = new users();
if(isset($_SESSION['user_id'])){
    $showUserWindow = $user->getSiteOption($_SESSION['user_id'],'show_user_window');
    $_SESSION['showUserWindow'] = $showUserWindow;
}
?>
