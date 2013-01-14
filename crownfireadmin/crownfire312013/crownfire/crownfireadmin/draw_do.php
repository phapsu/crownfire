<?php
session_start();
include("includes/init.php");
///////////////////////////////////////////////////////////
// Let's unset all the errors.
unset($_SESSION['post']);
unset($_SESSION['general_error']);
unset($_SESSION['type_id']);
///////////////////////////////////////////////////////////
if (isset($GLOBALS["HTTP_RAW_POST_DATA"]))
{
	// Get the data
	$imageData=$GLOBALS['HTTP_RAW_POST_DATA'];
	
	$data = explode('||',$imageData);
	
	$image = $data[0];
	$id = $data[1];
	
	// Remove the headers (data:,) part.  
	// A real application should use them according to needs such as to check image type
	$filteredData=substr($image, strpos($image, ",")+1);

	// Need to decode before saving since the data we received is already base64 encoded
	$unencodedData=base64_decode($filteredData);

	//echo "unencodedData".$unencodedData;
	
	$filename = time().'.png';
	
	// Save file.  This example uses a hard coded filename for testing, 
	// but a real application can specify filename in POST variable
	$fp = fopen( $cfg['image_save_directory'].'/'.$filename, 'wb' );
	fwrite( $fp, $unencodedData);
	fclose( $fp );
	
	$db = new database();
	
	$query = "DELETE FROM document_images WHERE document_id = $id";
	$db->dbQuery($query);
	
	$query = "INSERT INTO document_images SET document_id = $id, image = '$filename'";
	$db->dbQuery($query);
	echo $cfg['image_save_url'].'/'.$filename;
}
?>
