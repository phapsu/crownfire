<?php
session_start();
include("includes/init.php");
///////////////////////////////////////////////////////////
// Let's unset all the errors.
unset($_SESSION['post']);
unset($_SESSION['general_error']);
unset($_SESSION['type_id']);
///////////////////////////////////////////////////////////
$document_id = $_REQUEST['id'];
$document = new document($document_id);
$temp_id = $_REQUEST['temp_id'];
$edit_id = $_REQUEST['edit_id'];
$delete_id = $_REQUEST['delete_id'];

$save_array = array('document_id'           => $document_id,
                    'temp_id'               => $temp_id,
                    'location'              => $_POST['location'],
                    'device'                => $_POST['device'],
                    'correctly_installed'   => $_POST['correctly_installed'],
                    'requires_service'      => $_POST['requires_service'],
                    'alarm'                 => $_POST['alarm'],
                    'confirmed'             => $_POST['confirmed'],
                    'zone_address'          => $_POST['zone_address'],
                    'smoke_sensitivity'     => $_POST['smoke_sensitivity'],
                    'remarks'               => $_POST['remarks']);
if ($edit_id) {
	$document->saveData('document_data_9_device', $save_array, 'id', $edit_id);
} elseif ($delete_id) {
	$document->deleteData('document_data_9_device', 'id', $delete_id);
} else {
	$document->saveData('document_data_9_device', $save_array);	
}
// Redirect to page
header('Location: device_records.php?id='.$document_id.'&temp_id='.$temp_id);
?>