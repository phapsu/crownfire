<?php
$document_states = document::getDocumentStates();
$form_count = 30;
if ($validate->is_error()) {
	$documentInfo = $validate->get_error_data();
} else {
	if ($_REQUEST['id']) {
		// Header info
		$documentInfo 		= $document->getData('document_data_8_head','document_id',$_REQUEST['id']);

		$pumpInfo 	 	 	= $document->getData('document_data_8_pump','document_id',$_REQUEST['id'],false);
		$testInfo 	 	 	= $document->getData('document_data_8_test','document_id',$_REQUEST['id'],false);
		$waterInfo 	 	 	= $document->getData('document_data_8_water','document_id',$_REQUEST['id'],false);
	}
}
?>
<table width="100%">
 <tr>
  <td width="20%">Customer Name:</td>
  <td><input type="text" name="customer_name" class="required" value="<?=@$documentInfo['customer_name']?>" /></td>
 </tr>
 <tr>
  <td>Technician:</td>
  <td><input type="text" name="technician" class="required" value="<?=@$documentInfo['technician']?>" /></td>
 </tr>
 <tr>
  <td>Address:</td>
  <td><input type="text" name="address" class="required" value="<?=@$documentInfo['address']?>" /></td>
 </tr>
 <tr>
  <td>Inspection Date:</td>
  <td><input type="text" name="inspection_date" class="required" value="<?=@$documentInfo['inspection_date']?>" /></td>
 </tr>
 <tr>
  <td>City:</td>
  <td><input type="text" name="city" class="required" value="<?=@$documentInfo['city']?>" /></td>
 </tr>
 <tr>
  <td>Site:</td>
  <td><input type="text" name="site" class="required" value="<?=@$documentInfo['site']?>" /></td>
 </tr>
 <tr>
  <td>Contact:</td>
  <td><input type="text" name="contact" class="required" value="<?=@$documentInfo['contact']?>" /></td>
 </tr>
</table>

<h3>Pump Info</h3>
<table width="100%">
 <tr>
  <td width="20%">Water Supply Source:</td>
  <td><input type="text" name="water_supply_source" value="<?=$pumpInfo['water_supply_source']?>" /></td>
 </tr>
 <tr>
  <td>Fire Pump:</td>
  <td><input type="text" name="fire_pump" value="<?=$pumpInfo['fire_pump']?>" /></td>
 </tr>
 <tr>
  <td>Jockey Pump</td>
  <td><input type="text" name="jockey_pump" value="<?=$pumpInfo['jockey_pump']?>" /></td>
 </tr>
</table>

<h3>Test Information</h3>

<table>
 <tr>
  <td>Location Of Highest Fire Hose Cabinet:</td>
  <td><input type="text" name="location_cabinet" value="<?=$testInfo['location_cabinet']?>" /></td>
 </tr>
 <tr>
  <td>Number of Floors:</td>
  <td><input type="text" name="number_floors" value="<?=$testInfo['number_floors']?>" /></td>
 </tr>
 <tr>
  <td>Fire Hose Length in Cabnets:</td>
  <td><input type="text" name="fire_hose_length" value="<?=$testInfo['fire_hose_length']?>" /></td>
 </tr>
  <tr>
  <td>Type of Control Valve:</td>
  <td><input type="text" name="type_control_valve" value="<?=$testInfo['type_control_valve']?>" /></td>
 </tr>
</table>

<?php
display::displayQuestionsByTypeId($_REQUEST['type_id'], null, array(1 => 'Yes', 0 => 'No'));
?>

<h3>Water Flow Data</h3>

<table>
 <tr>
  <td>Hose Length:</td>
  <td><input type="text" name="hose_length" value="<?=$waterInfo['hose_length']?>" /></td>
 </tr>
 <tr>
  <td>Flow Location:</td>
  <td><input type="text" name="flow_location" value="<?=$waterInfo['flow_location']?>" /></td>
 </tr>
 <tr>
  <td>Orifice:</td>
  <td><input type="text" name="orifice" value="<?=$waterInfo['orifice']?>" /></td>
 </tr>
 <tr>
  <td># of Hoses Used:</td>
  <td><input type="text" name="num_hoses_used" value="<?=$waterInfo['num_hoses_used']?>" /></td>
 </tr>
 <tr>
  <td>GPM:</td>
  <td><input type="text" name="gpm" value="<?=$waterInfo['gpm']?>" /> PSI</td>
 </tr>
 <tr>
  <td>Pito Tube:</td>
  <td><input type="text" name="pito_tube" value="<?=$waterInfo['pito_tube']?>" /> PSI</td>
 </tr>
 <tr>
  <td>Hose Rack Residual Reading:</td>
  <td><input type="text" name="hose_rack" value="<?=$waterInfo['hose_rack']?>" /> PSI</td>
 </tr>
</table>

<h3>Comments</h3>

<textarea name="comments" style="width: 600px; height:200px;"><?=$documentInfo['comments']?></textarea>