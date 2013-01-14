<?php
$document_states 	= document::getDocumentStates();
$componentInfo		= document::getDataSimple('component_options');
$form_count = 30;
if ($validate->is_error()) {
	$documentInfo = $validate->get_error_data();
} else {
	if ($_REQUEST['id']) {
		// Header info
		$documentInfo 		= $document->getData('document_data_7_head','document_id',$_REQUEST['id']);
		$switchInfo 		= $document->getData('document_data_7_switches','document_id',$_REQUEST['id']);
		$reportInfo 		= $document->getData('document_data_7_report','document_id',$_REQUEST['id']);
	}
}
?>
<table width="100%">
 <tr>
  <td>Inspection Date:</td>
  <td><input type="text" name="inspection_date" class="required" value="<?=@$documentInfo['inspection_date']?>" /></td>
 </tr>
 <tr>
  <td>Technician:</td>
  <td><input type="text" name="technician" class="required" value="<?=@$documentInfo['technician']?>" /></td>
 </tr>
 <tr>
  <td>Job Name:</td>
  <td><input type="text" name="job_name" class="required" value="<?=@$documentInfo['job_name']?>" /></td>
 </tr>
  <tr>
  <td>Job Address:</td>
  <td><input type="text" name="job_address" class="required" value="<?=@$documentInfo['job_address']?>" /></td>
 </tr>
 <tr>
  <td>Site Contact:</td>
  <td><input type="text" name="site_contact" class="required" value="<?=@$documentInfo['site_contact']?>" /></td>
 </tr>
</table>

<h3>Questions</h3>
<?php
display::displayQuestionsByTypeId($_REQUEST['type_id'], null, array(1 => 'Yes', 0 => 'No'));
?>

<h3>Valve Info</h3>

<table width="100%">
 <tr align="center" bgcolor="#000000" style="color: #fff; font-weight: bold;">
  <td width="16%">Type of Valve</td>
  <td width="16%">Make of Valve</td>
  <td width="16%">Valve Model</td>
  <td width="16%">Year</td>
  <td width="16%">System #</td>
  <td width="16%">Serial Number</td>
 </tr>
 <tr align="center">
  <td><input type="text" name="valve_type" value="<?=$documentInfo['valve_type']?>" style="width: 100px;"/></td>
  <td><input type="text" name="valve_make" value="<?=$documentInfo['valve_make']?>" style="width: 100px;"/></td>
  <td><input type="text" name="valve_model" value="<?=$documentInfo['valve_model']?>" style="width: 100px;"/></td>
  <td><input type="text" name="valve_year" value="<?=$documentInfo['valve_year']?>" style="width: 100px;"/></td>
  <td><input type="text" name="valve_system" value="<?=$documentInfo['valve_system']?>" style="width: 100px;"/></td>
  <td><input type="text" name="valve_serial" value="<?=$documentInfo['valve_serial']?>" style="width: 100px;"/></td>
 </tr>
</table>

<h3>System Components</h3>
<table>
 <tr align="center" bgcolor="#000000" style="color: #fff; font-weight: bold;">
  <td>System Component</td>
  <td>OK</td>
  <td>Needs Work</td>
  <td>N/A</td>
 </tr>
 <?php
 if (is_array($componentInfo)) {
 	
 	// Fetch our options (if any)
 	if ($_REQUEST['id']) {
 		$componentOptions		= document::getData('document_data_7_component', 'document_id', $_REQUEST['id'], true, 'option_id');
 	} else {
 		$componentOptions 		= array();
 	}
 	
 	foreach($componentInfo as $key => $valueArray) {
 		?>
 		<tr align="center">
		  <td align="left"><?=$valueArray['component_option']?></td>
		  <?php
		  $checked = false;
		  for($i=1;$i<=3;$i++) {
		  	?>
		  	<td><input type="radio" name="component_option[<?=$valueArray['id']?>][]" value="<?=$i?>" style="width: 45px;" 
		  	<?php
		  	if($i==$componentOptions[$valueArray['id']]['option_value'] || ($i==3 && $checked == false)) {
		  		echo ' checked';
		  		$checked = true;
		  	}
		  	?>/></td>
		  	<?php
		  }
		  ?>
		</tr>
 		<?php
 	}
 }
 ?>
</table>

<h3>Make &amp; Model Switches</h3>

<table>
 <tr>
  <td>Pressure Switches:</td>
  <td><input type="text" name="pressure_switches" value="<?=$switchInfo['pressure_switches']?>" /></td>
 </tr>
 <tr>
  <td>Flow Switches:</td>
  <td><input type="text" name="flow_switches" value="<?=$switchInfo['flow_switches']?>" /></td>
 </tr>
 <tr>
  <td>Supervistory Switches:</td>
  <td><input type="text" name="supervistory_switches" value="<?=$switchInfo['supervistory_switches']?>" /></td>
 </tr>
</table>

<h3>Flow Test Report</h3>
<table width="80%">
 <tr>
  <td width="25%">City Pressure PSI:</td>
  <td><input type="text" name="city_pressure" value="<?=$reportInfo['city_pressure']?>" style="width: 100px;" /></td>
  <td width="25%">System Static Pressure PSI:</td>
  <td><input type="text" name="system_pressure" value="<?=$reportInfo['system_pressure']?>" style="width: 100px;" /></td>
 </tr>
 <tr>
  <td width="25%">Air Pressure PSI:</td>
  <td><input type="text" name="air_pressure" value="<?=$reportInfo['air_pressure']?>" style="width: 100px;" /></td>
  <td width="25%">Flow Residual Pressure PSI:</td>
  <td><input type="text" name="flow_pressure" value="<?=$reportInfo['flow_pressure']?>" style="width: 100px;" /></td>
 </tr>
</table>

<h3>Time &amp; Trip Test Report</h3>

<table width="80%">
 <tr>
  <td width="25%">Trip Pressure PSI:</td>
  <td><input type="text" name="trip_pressure" value="<?=$reportInfo['trip_pressure']?>" style="width: 140px;" /></td>
  <td width="25%">Trip Time:</td>
  <td><input type="text" name="trip_time_min" value="<?=$reportInfo['trip_time_min']?>" style="width: 50px;" /> min. <input type="text" name="trip_time_sec" value="<?=$reportInfo['trip_time_sec']?>" style="width: 50px;" /> sec.</td>
 </tr>
 <tr>
  <td width="25%">Inspectors Test Time:</td>
  <td><input type="text" name="test_time_min" value="<?=$reportInfo['test_time_min']?>" style="width: 50px;" /> min.  <input type="text" name="test_time_sec" value="<?=$reportInfo['test_time_sec']?>" style="width: 50px;" /> sec.</td>
  <td width="25%">Trip Time (Q.O.D.):</td>
  <td><input type="text" name="trip_time_qod_min" value="<?=$reportInfo['trip_time_qod_min']?>" style="width: 50px;" /> min. <input type="text" name="trip_time_qod_sec" value="<?=$reportInfo['trip_time_qod_sec']?>" style="width: 50px;" /> sec.</td>
 </tr>
</table>

<h3>Comments</h3>

<textarea name="comments" style="width: 600px; height:200px;"><?=$documentInfo['comments']?></textarea>


