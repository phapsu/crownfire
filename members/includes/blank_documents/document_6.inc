<?php
$document_states = document::getDocumentStates();
$form_count = 30;
$testingInfo		= document::getDataSimple('valve_testing_options');
if ($validate->is_error()) {
	$documentInfo = $validate->get_error_data();
} else {
	if ($_REQUEST['id']) {
		// Header info
		$documentInfo 		= $document->getData('document_data_6_head','document_id',$_REQUEST['id']);
	}
}
?>
<table width="100%">
 <tr>
  <td width="20%">Customer Name:</td>
  <td><input type="text" name="customer_name" value="<?=$documentInfo['customer_name']?>" /></td>
 </tr>
 <tr>
  <td>Technician:</td>
  <td><input type="text" name="technician" value="<?=$documentInfo['technician']?>" /></td>
 </tr>
 <tr>
  <td>Address:</td>
  <td><input type="text" name="address" value="<?=$documentInfo['address']?>" /></td>
 </tr>
 <tr>
  <td>Inspection Date:</td>
  <td><input type="text" name="inspection_date" value="<?=$documentInfo['inspection_date']?>" /></td>
 </tr>
</table>



<table width="100%">
 <tr valign="top">
  <td width="50%"><h3>Fire Hydrant Location</h3></td>
  <td width="50%"><h3>Technicians Comments</h3></td>
 </tr>
 <tr valign="top">
  <td width="50%">
  	  <?php
  	  if (!empty($_REQUEST['id']) && $img = document::getDocumentImage($_REQUEST['id'])) {
  	  	?>
  	  	<table style="width: 490px; border: 1px solid #000;">
	  	 <tr>
	  	  <td>
	  	  	<div id="hydrantImage">
	  	  		<img src="<?=$img?>" />
	  	  	</div>
	  	  	<br />
	  	  	<a href="javascript:void(0);" onClick="openDrawWindow('<?=$_REQUEST['id']?>');">Change Image</a>
	  	  </td>
  		 </tr>
  		</table>
  	  	<?php
  	  } else {
  	  	?>
  	  	<div id="hydrantImage">
	  	</div>
  	  	<a href="javascript:void(0);" onClick="openDrawWindow('<?=$_REQUEST['id']?>');">Create New Image</a>
  	  	<?php
  	  }
  	  ?>
  	 </td>
  <td><textarea name="tech_comments" style="width: 400px; height: 220px;"><?=$documentInfo['tech_comments']?></textarea></td>
 </tr>
</table>

<br /><br />
Fire Hydrant Make And Model: <input type="text" name="hydrant_make" size="40" value="<?=$documentInfo['hydrant_make']?>" />
<br />
<h3>Valve Testing</h3>

<table width="40%">
 <tr bgcolor="Gainsboro" align="center" style="font-weight: bold;">
  <td width="70%">Size of Test Valve</td>
  <td>3/4"</td>
  <td>1"</td>
 </tr>
 
 <?php
 if (is_array($testingInfo)) {
 	
 	// Fetch our options (if any)
 	if ($_REQUEST['id']) {
 		$testingOptions = document::getTestingOptions($_REQUEST['id']);
 	} else {
 		$testingOptions = array();
 	}
 	
 	foreach($testingInfo as $key => $valueArray) {
 		?>
 		<tr>
		  <td><?=$valueArray['testing_name']?></td>
		  <td><input type="text" name="testingOption[<?=$valueArray['id']?>][size_a]" value="<?=$testingOptions[$valueArray['id']]['size_a']?>" style="width: 40px;" /></td>
		  <td><input type="text" name="testingOption[<?=$valueArray['id']?>][size_b]" value="<?=$testingOptions[$valueArray['id']]['size_b']?>" style="width: 40px;" /></td>
		</tr>
 		<?php
 	}
 }
 ?>
</table>

<h3>Questions</h3>
<?php
display::displayQuestionsByTypeId($_REQUEST['type_id'], null, array(1 => 'Yes', 0 => 'No'), false, null, false);
?>
