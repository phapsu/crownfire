<?php
$document_states 	= document::getDocumentStates();
$users = new users();
$techs = $users->getUsers('techs');

if ($validate->is_error()) {
	$documentInfo = $validate->get_error_data();
} else {
	if ($_REQUEST['id']) {
		// Weird
		$documentInfo 		= $document->getData('document_data_10_head','document_id',$_REQUEST['id']);
		$documentInfo 		= array_merge($documentInfo, $document->getData('document_data_10_pump','document_id',$_REQUEST['id']));
		$documentInfo 		= array_merge($documentInfo, $document->getData('document_data_10_test','document_id',$_REQUEST['id']));
		$documentInfo 		= array_merge($documentInfo, $document->getData('document_data_10_piping','document_id',$_REQUEST['id']));
	}
}
?>
<table width="100%" class="dataTable">
 <tr>
  <td>Location:</td>
  <td><input type="text" name="location" value="<?=$documentInfo['location']?>" /></td>
 </tr>
 <tr>
  <td>Date:</td>
  <td><input type="text" name="date" value="<?=$documentInfo['date']?>" /></td>
 </tr>
 <tr>
  <td>Owner:</td>
  <td><input type="text" name="owner" value="<?=$documentInfo['owner']?>" /></td>
 </tr>
 <tr>
  <td>Description of Equiptment:</td>
  <td><input type="text" name="description" value="<?=$documentInfo['description']?>" /></td>
 </tr>
</table>
<br />

<h3>Fire Pump Info</h3>

<table width="100%" class="dataTable" cellpadding="3">
 <tr bgcolor="#EEEEEE" align="center">
  <td colspan="2"><b>Driver</b></td>
  <td colspan="2"><b>Pump</b></td>
 </tr>
 <tr>
  <td>Horsepower:</td>
  <td><input type="text" name="horsepower" value="<?=$documentInfo['horsepower']?>" style="width: 200px;" /></td>
  <td>Manufacturer:</td>
  <td><input type="text" name="manufacturer" value="<?=$documentInfo['manufacturer']?>" style="width: 200px;" /></td>
 </tr>
 <tr>
  <td>Manufacturer:</td>
  <td><input type="text" name="manufacturer_2" value="<?=$documentInfo['manufacturer_2']?>" style="width: 200px;" /></td>
  <td>Sunction:</td>
  <td><input type="text" name="sunction" value="<?=$documentInfo['sunction']?>" style="width: 200px;" /></td>
 </tr>
 <tr>
  <td>Voltage:</td>
  <td><input type="text" name="voltage" value="<?=$documentInfo['voltage']?>" style="width: 200px;" /></td>
  <td>Discharge:</td>
  <td><input type="text" name="discharge" value="<?=$documentInfo['discharge']?>" style="width: 200px;" /></td>
 </tr>
 <tr>
  <td>Rated RPM (Synch):</td>
  <td><input type="text" name="rated" value="<?=$documentInfo['rated']?>" style="width: 200px;" /></td>
  <td>Head Dia:</td>
  <td><input type="text" name="head_dia" value="<?=$documentInfo['head_dia']?>" style="width: 200px;" /></td>
 </tr>
 <tr>
  <td>Full Load Amperage:</td>
  <td><input type="text" name="amperage" value="<?=$documentInfo['amperage']?>" style="width: 200px;" /></td>
  <td>RPM:</td>
  <td><input type="text" name="rpm" value="<?=$documentInfo['rpm']?>" style="width: 200px;" /></td>
 </tr>
 <tr>
  <td>Continuous Amperage:</td>
  <td><input type="text" name="continuous_amperage" value="<?=$documentInfo['continuous_amperage']?>" style="width: 200px;" /></td>
  <td>GPM:</td>
  <td><input type="text" name="gpm" value="<?=$documentInfo['gpm']?>" style="width: 200px;" /></td>
 </tr>
 <tr>
  <td>Model:</td>
  <td><input type="text" name="model" value="<?=$documentInfo['model']?>" style="width: 200px;" /></td>
  <td>Head:</td>
  <td><input type="text" name="head" value="<?=$documentInfo['head']?>" style="width: 200px;" /></td>
 </tr>
 <tr>
  <td>Serial Number:</td>
  <td><input type="text" name="serial_number" value="<?=$documentInfo['serial_number']?>" style="width: 200px;" /></td>
  <td>Model:</td>
  <td><input type="text" name="model2" value="<?=$documentInfo['model2']?>" style="width: 200px;" /></td>
 </tr>
 <tr>
  <td>&nbsp; </td>
  <td>&nbsp; </td>
  <td>Serial Number:</td>
  <td><input type="text" name="serial_number_2" value="<?=$documentInfo['serial_number_2']?>" style="width: 200px;" /></td>
 </tr>
<tr>
 <td colspan="4"><h3>Associated Piping</h3></td>
</tr>
 <tr>
  <td width="20%">Suction Piping:</td>
  <td><input type="text" name="suction_piping" value="<?=$documentInfo['suction_piping']?>" style="width: 200px;" /></td>
  <td>Control Valve:</td>
  <td><input type="text" name="control_valve" value="<?=$documentInfo['control_valve']?>" style="width: 200px;"/></td>
 </tr>
 <tr>
  <td>Discharge Piping:</td>
  <td><input type="text" name="discharge_piping" value="<?=$documentInfo['discharge_piping']?>"  style="width: 200px;"/></td>
  <td>Control Valve:</td>
  <td><input type="text" name="control_valve_2" value="<?=$documentInfo['control_valve_2']?>" style="width: 200px;" /></td>
 </tr>
 <tr>
  <td>Sunction Check Valve:</td>
  <td><input type="text" name="sunction_check_valve" value="<?=$documentInfo['sunction_check_valve']?>"  style="width: 200px;"/></td>
  <td>Discharge Check Valve:</td>
  <td><input type="text" name="discharge_check_valve" value="<?=$documentInfo['discharge_check_valve']?>"  style="width: 200px;"/></td>
 </tr>
 <tr>
  <td>Pressure Relief Valve:</td>
  <td><input type="text" name="pressure_relief" value="<?=$documentInfo['pressure_relief']?>"  style="width: 200px;"/></td>
  <td>Set For:</td>
  <td><input type="text" name="set_for" value="<?=$documentInfo['set_for']?>"  style="width: 200px;"/></td>
 </tr>
<tr>
 <td colspan="4"><h3>Test Data</h3></td>
</tr>
 <tr>
  <td width="40%">Time of Test</td>
  <td colspan="3"><input type="text" name="time_of_test" value="<?=$documentInfo['time_of_test']?>"  style="width: 200px;"/></td>
 </tr>
 <tr>
  <td width="30%">Static Pressure Before Test Sunction:</td>
  <td><input type="text" name="static_before_suction" value="<?=$documentInfo['static_before_suction']?>" style="width: 200px;" /></td>
  <td width="20%">Discharge:</td>
  <td><input type="text" name="test_discharge" value="<?=$documentInfo['test_discharge']?>" style="width: 200px;" /></td>
 </tr>
 <tr>
  <td>Cut in Pressure:</td>
  <td><input type="text" name="cut_in_pressure" value="<?=$documentInfo['cut_in_pressure']?>" style="width: 200px;" /></td>
  <td>Cut Out Pressure</td>
  <td><input type="text" name="cut_out_pressure" value="<?=$documentInfo['cut_out_pressure']?>" style="width: 200px;" /></td>
 </tr>
 <tr>
  <td>Static Pressure After Test: Suction:</td>
  <td><input type="text" name="static_after_test" value="<?=$documentInfo['static_after_test']?>" style="width: 200px;" /></td>
  <td>Discharge:</td>
  <td><input type="text" name="after_discharge" value="<?=$documentInfo['after_discharge']?>" style="width: 200px;" /></td>
 </tr>
 <tr>
  <td>Outlet Used for Testing:</td>
  <td colspan="3"><input type="text" name="outlet_used" value="<?=$documentInfo['outlet_used']?>" style="width: 200px;" /></td>
 </tr>
 <tr>
  <td>Supervisory Valves Checked:</td>
  <td colspan="3">Yes <input type="radio" name="supervisory_checked" value="yes" style="width: 10px;" <?php if ($documentInfo['supervisory_checked'] == 'yes') { echo ' checked="checked"'; } ?> /> &nbsp; No <input type="radio" name="supervisory_checked" value="no" style="width: 10px;" <?php if ($documentInfo['supervisory_checked'] == 'no') { echo ' checked="checked"'; } ?>/></td>
  
 </tr>
 <tr>
  <td>Packings:</td>
  <td><input type="text" name="packings" value="<?=$documentInfo['packings']?>" style="width: 200px;"/></td>
  <td>RPM Measured:</td>
  <td><input type="text" name="rpm_measured" value="<?=$documentInfo['rpm_measured']?>"  style="width: 200px;"/></td>
 </tr>

 <tr>
  <td>Full Load Amperage Meassured:</td>
  <td colspan="3"><input type="text" name="full_load" value="<?=$documentInfo['full_load']?>" style="width: 600px;"/></td>
 </tr> 
 <tr>
  <td>Voltage Drop Across Motor Leads:</td>
  <td colspan="3"><input type="text" name="voltage_drop" value="<?=$documentInfo['voltage_drop']?>" style="width: 600px;"/></td>
 </tr> 
 <tr>
  <td>Vacuum Clean Motor Inside:</td>
  <td colspan="3"><input type="text" name="vacuum_inside" value="<?=$documentInfo['vacuum_inside']?>"  style="width: 600px;"/></td>
 </tr>
 <tr>
  <td>Check Angular Coupling Alignment:</td>
  <td colspan="3"><input type="text" name="angular_alignment" value="<?=$documentInfo['angular_alignment']?>"  style="width: 600px;"/></td>
 </tr>
 <tr>
  <td>Check Parallel Coupling Alignment:</td>
  <td colspan="3"><input type="text" name="parallel_alignment" value="<?=$documentInfo['parallel_alignment']?>"  style="width: 600px;"/></td>
 </tr>
 <tr>
  <td>Pump Level:</td>
  <td><input type="text" name="pump_level" value="<?=$documentInfo['pump_level']?>"  style="width: 200px;"/></td>
  <td>Base Firm:</td>
  <td><input type="text" name="base_firm" value="<?=$documentInfo['base_firm']?>"  style="width: 200px;"/></td>
 </tr>
 <tr valign="top"> 
  <td>Comments:</td>
  <td colspan="3">
  <textarea name="comments" style="width: 600px; height: 150px;"><?=$documentInfo['comments']?></textarea>
  
  
  </td>
 </tr>
</table>
<br /><br />
<table>
 <tr>
  <td>Lead Technicion:</td>
  <td><?=display::getTechs($techs, 'primary_technician', $documentInfo['primary_technician']);?></td>
 </tr>
</table>
