<?php
$document_states = document::getDocumentStates();

if ($validate->is_error()) {
	$documentInfo = $validate->get_error_data();
} else {
	if ($_REQUEST['id']) {
		// Header info
		$documentInfo = $document->getData('document_data_3_head','document_id',$_REQUEST['id']);
		
		$summaryInfo = $document->getData('document_data_3_summary','document_id',$_REQUEST['id']);
	}
}
?>
	
	<table width="100%">
	 <tr>
	  <td width="15%">Customer Name:</td>
	  <td><input type="text" name="customer_name" value="<?=$documentInfo['customer_name']?>" /></td>
	 </tr>
	 <tr>
	  <td>Technician 1:</td>
	  <td><input type="text" name="technician_1" value="<?=$documentInfo['technician_1']?>" /></td>
	 </tr>
	 <tr>
	  <td>Technician 2:</td>
	  <td><input type="text" name="technician_2" value="<?=$documentInfo['technician_2']?>" /></td>
	 </tr>
	 <tr>
	  <td>Address:</td>
	  <td><input type="text" name="address" value="<?=$documentInfo['address']?>" /></td>
	 </tr>
	 <tr>
	  <td>Inspection Date:</td>
	  <td><input type="text" name="inspection_date" value="<?=$documentInfo['inspection_date']?>" /></td>
	 </tr>
	 <tr>
	  <td>City:</td>
	  <td><input type="text" name="city" value="<?=$documentInfo['city']?>" /></td>
	 </tr>
	</table>
	
	<h3>Summary</h3>
	
	<table width="100%">
	 <tr valign="top">
	  <td width="15%">Deficiencies:</td>
	  <td><textarea name="deficiencies" style="width: 500px; height: 100px;"><?=$summaryInfo['deficiencies']?></textarea>
	 </tr>
	 <tr valign="top">
	  <td width="15%">Recommendations:</td>
	  <td><textarea name="recommendations" style="width: 500px; height: 100px;"><?=$summaryInfo['recommendations']?></textarea>
	 </tr>
	 <tr valign="top">
	  <td width="15%">Remarks:</td>
	  <td><textarea name="remarks" style="width: 500px; height: 100px;"><?=$summaryInfo['remarks']?></textarea>
	 </tr>	 
	</table>
	
<h3>Questions</h3>
<?php
display::displayQuestionsByTypeId($_REQUEST['type_id'], null, array(1 => 'Yes', 0 => 'No'));
?>