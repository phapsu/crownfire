<?php
$form_count = 30;
$users = new users();
$techs = $users->getUsers('techs');
$document_states 	= document::getDocumentStates();
if ($validate->is_error()) {
	$documentInfo = $validate->get_error_data();
} else {
	if ($_REQUEST['id']) {
		// Weird
		$documentInfo 		= $document->getData('document_data_12_head','document_id',$_REQUEST['id']);
		$documentInfo 		= array_merge($documentInfo, $document->getData('document_data_12_data','document_id', $_REQUEST['id']));
		$documentInfo 		= array_merge($documentInfo, $document->getData('document_data_12_location','document_id', $_REQUEST['id']));
	}
}
?>
<table width="100%">
 <tr valign="top">
  <td width="45%">
	<table width="100%">
	 <tr>
	  <td width="40%">Name:</td>
	  <td><input type="text" name="customer_name" class="required" value="<?=@stripslashes($documentInfo['customer_name'])?>" style="width: 200px;" /></td>
	 </tr>
	 <tr>
	  <td>Address:</td>
	  <td><input type="text" name="address" class="required" value="<?=@stripslashes($documentInfo['address'])?>" style="width: 200px;" /></td>
	 </tr>
	 <tr>
	  <td>City:</td>
	  <td><input type="text" name="city" class="required" value="<?=@stripslashes($documentInfo['city'])?>" style="width: 200px;" /></td>
	 </tr>
	 <tr>
	  <td>State:</td>
	  <td><input type="text" name="state" class="required" value="<?=@stripslashes($documentInfo['state'])?>" style="width: 200px;" /></td>
	 </tr>
	  <tr>
	 <td>Zip:</td>
	  <td><input type="text" name="zip" class="required" value="<?=@stripslashes($documentInfo['zip'])?>" style="width: 200px;" /></td>
	 </tr>
	 <tr>
	  <td>Telephone:</td>
	  <td><input type="text" name="telephone" class="required" value="<?=@stripslashes($documentInfo['telephone'])?>" style="width: 200px;" /></td>
	 </tr>
	 <tr>
	  <td>Store No.:</td>
	  <td><input type="text" name="store" class="required" value="<?=@stripslashes($documentInfo['store'])?>" style="width: 200px;" /></td>
	 </tr>
	 <tr>
	  <td>Owner or Manager:</td>
	  <td><input type="text" name="owner" class="required" value="<?=@stripslashes($documentInfo['owner'])?>" style="width: 200px;" /></td>
	 </tr> 
	</table>
  </td>
  <td>
	<table width="100%" border="0">
	 <tr>
	  <td colspan="2">Date of Service</td>
	  <td>Time</td>
	  <td>A.M.</td>
	  <td>P.M.</td>
	 </tr>
	 <tr>
	  <td colspan="2"><input type="text" name="date_service" value="<?=stripslashes($documentInfo['date_service'])?>" style="width: 90%;" /></td>
	  <td><input type="text" name="time_service" value="<?=stripslashes($documentInfo['time_service'])?>" style="width: 90%;" /></td>
	  <td><input type="text" name="am" value="<?=stripslashes($documentInfo['am'])?>" style="width: 90%;" /></td>
	  <td><input type="text" name="pm" value="<?=stripslashes($documentInfo['pm'])?>" style="width: 90%;" /></td>
	 </tr>
	 <tr>
	  <td>Annual</td>
	  <td>Semi-Annual</td>
	  <td>Recharge</td>
	  <td>Installation</td>
	  <td>Renovation</td>
	 </tr>
	 <tr>
	  <td><input type="text" name="annual" value="<?=stripslashes($documentInfo['annual'])?>" style="width: 90%;" /></td>
	  <td><input type="text" name="semi_annual" value="<?=stripslashes($documentInfo['semi_annual'])?>" style="width: 90%;" /></td>
	  <td><input type="text" name="recharge" value="<?=stripslashes($documentInfo['recharge'])?>" style="width: 90%;" /></td>
	  <td><input type="text" name="installation" value="<?=stripslashes($documentInfo['installation'])?>" style="width: 90%;" /></td>
	  <td><input type="text" name="renovation" value="<?=stripslashes($documentInfo['renovation'])?>" style="width: 90%;" /></td>
	 </tr>
	 <tr>
	  <td colspan="4">Location of System Cynlinders</td>
	  <td>UL 300</td>
	 </tr>
	 <tr>
	  <td colspan="4"><input type="text" name="loc_cynlinders" value="<?=stripslashes($documentInfo['loc_cynlinders'])?>" style="width: 90%;" /></td>
	  <td><input type="text" name="ul_300" value="<?=stripslashes($documentInfo['ul_300'])?>" style="width: 90%;" /></td>
	 </tr>
	 <tr>
	  <td colspan="2">Manufacturer</td>
	  <td>Model Number</td>
	  <td>Wet</td>
	  <td>Dry Chemical</td>
	 </tr>
	 <tr>
	  <td colspan="2"><input type="text" name="manufacturer" value="<?=$documentInfo['manufacturer']?>" style="width: 130px;" /></td>
	  <td><input type="text" name="model_number" value="<?=$documentInfo['model_number']?>" style="width: 90%;" /></td>
	  <td><input type="text" name="wet" value="<?=$documentInfo['wet']?>" style="width: 90%;" /></td>
	  <td><input type="text" name="dry_chemical" value="<?=$documentInfo['dry_chemical']?>" style="width: 90%;" /></td>
	 </tr>
	 <tr align="center">
	  <td colspan="2">Cylinder Size Master</td>
	  <td>Cylinder Size Slave</td>
	  <td colspan="2">Cylinder Size Slave</td>
	 </tr>
	 <tr align="center">
	  <td colspan="2"><input type="text" name="cylinder_master" value="<?=$documentInfo['cylinder_master']?>" style="width: 90%;" /></td>
	  <td><input type="text" name="cylinder_slave" value="<?=$documentInfo['cylinder_slave']?>" style="width: 90%;" /></td>
	  <td colspan="2"><input type="text" name="cylinder_slave_2" value="<?=$documentInfo['cylinder_slave_2']?>" style="width: 90%;" /></td>
	 </tr>
	 <tr>
	  <td colspan="2">Fuel Shut-Off</td>
	  <td>Electric</td>
	  <td>Gas</td>
	  <td>Size</td>
	 </tr>
	 <tr>
	  <td colspan="2"><input type="text" name="fuel" value="<?=$documentInfo['fuel']?>" style="width: 90%;" /></td>
	  <td><input type="text" name="electric" value="<?=$documentInfo['electric']?>" style="width: 90%;" /></td>
	  <td><input type="text" name="gas" value="<?=$documentInfo['gas']?>" style="width: 90%;" /></td>
	  <td><input type="text" name="size" value="<?=$documentInfo['size']?>" style="width: 90%;" /></td>
	 </tr>
	 <tr align="center">
	  <td colspan="2">Serial Number</td>
	  <td>Last Hydro Test Date</td>
	  <td colspan="2">Last Recharge Date</td>
	 </tr>
	 <tr align="center">
	  <td colspan="2"><input type="text" name="serial_number" value="<?=$documentInfo['serial_number']?>" style="width: 90%;" /></td>
	  <td><input type="text" name="last_hydro" value="<?=$documentInfo['last_hydro']?>" style="width: 90%;" /></td>
	  <td colspan="2"><input type="text" name="last_recharge" value="<?=$documentInfo['last_recharge']?>" style="width: 90%;" /></td>
	 </tr>
	 <tr>
	  <td colspan="5">Manufacturer's Manual Reference</td>
	 </tr>
	 <tr>
	  <td colspan="2" width="33%">Page Number: <input type="text" name="page_number" value="<?=$documentInfo['page_number']?>" style="width: 90%;" /></td>
	  <td width="33%">Drawing Number: <input type="text" name="drawing_number" value="<?=$documentInfo['drawing_number']?>" style="width: 90%;" /></td>
	  <td colspan="2" width="33%">Date: <input type="text" name="final_date" value="<?=$documentInfo['final_date']?>" style="width: 90%;" /></td>
	 </tr>
	</table>
  </td>
 </tr>
</table>

<h3>Cooking Appliance Locations: Left to Right</h3>
<table width="100%" border="1" cellspacing="0" cellpadding="10">
 <tr align="center">
  <td width="25%"><input type="text" name="appliance1" value="<?=$documentInfo['appliance1']?>" style="width: 90%;" /></td>
  <td width="25%"><input type="text" name="appliance2" value="<?=$documentInfo['appliance2']?>" style="width: 90%;" /></td>
  <td width="25%"><input type="text" name="appliance3" value="<?=stripslashes($documentInfo['appliance3'])?>" style="width: 90%;" /></td>
  <td width="25%"><input type="text" name="appliance4" value="<?=stripslashes($documentInfo['appliance4'])?>" style="width: 90%;" /></td>
 </tr>
  <tr align="center">
  <td width="25%"><input type="text" name="appliance5" value="<?=stripslashes($documentInfo['appliance5'])?>" style="width: 90%;" /></td>
  <td width="25%"><input type="text" name="appliance6" value="<?=stripslashes($documentInfo['appliance6'])?>" style="width: 90%;" /></td>
  <td width="25%"><input type="text" name="appliance7" value="<?=stripslashes($documentInfo['appliance7'])?>" style="width: 90%;" /></td>
  <td width="25%"><input type="text" name="appliance8" value="<?=stripslashes($documentInfo['appliance8'])?>" style="width: 90%;" /></td>
 </tr>
</table>
<br />
<table width="70%">
 <tr>
  <td>
	<?php
	display::displayQuestionsByTypeId($_REQUEST['type_id'], null, array(1 => 'Yes', 0 => 'N/A'), false, 'numbers');
	?>
  </td>
 </tr>
</table>
<h3>Comments</h3>

<textarea name="comments" style="width: 800px; height:100px;"><?=stripslashes($documentInfo['comments'])?></textarea>
<br /><br />
On this date, this range hood fire supporession system was inspected and operationally tested in accoredance with the fire suppression system reaquirements of NFPA17 or 17A, 96
and the manufacturer's manual, with the results indicted above.
<br /><br />

<table width="100%">
 <tr>
  <td align="left"><?=display::getTechs($techs, 'technician', $documentInfo['technician']);?></td>
  <td><input type="text" name="permit_no" value="<?=$documentInfo['permit_no']?>" style="width: 90%;"/></td>
  <td><input type="text" name="date_2" value="<?=$documentInfo['date_2']?>" style="width: 90%;"/></td>
  <td><input type="text" name="time_2" value="<?=$documentInfo['time_2']?>" style="width: 90%;"/></td>
  <td><input type="text" name="am_2" value="<?=$documentInfo['am_2']?>" style="width: 90%;"/></td>
  <td><input type="text" name="pm_2" value="<?=$documentInfo['pm_2']?>" style="width: 90%;"/></td>
  <td><input type="text" name="agent" value="<?=$documentInfo['agent']?>" style="width: 90%;"/></td>
 </tr>
 <tr>
  <td align="left">Service Technician</td>
  <td>Permit No.</td>
  <td>Date</td>
  <td>Time</td>
  <td>AM</td> 
  <td>PM</td>
  <td>Customer's Authorized Agent</td>
 </tr>
</table>