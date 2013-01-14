<?php
$document_states = document::getDocumentStates();
$zoneInfo = 0;
$zone_count = 70;

if ($validate->is_error()) {
	$documentInfo = $validate->get_error_data();
	
} else {
	if (isset($_REQUEST['id'])) {
		
		// Header info
		$documentInfo = $document->getData('document_data_1_head','document_id',$_REQUEST['id']);
		
		// Zone info
		$zoneInfo 	  = $document->getData('document_data_1_zones','document_id',$_REQUEST['id'],true);
		
		//$zone_count   = 30-count($zoneInfo);
	}
}
?>


<table width="100%">
 <tr>
  <td width="30%">Customer Name:</td>
  <td><input type="text" name="customer_name" value="<?=@$documentInfo['customer_name']?>" /></td>
 </tr>
 <tr>
  <td>Technician:</td>
  <td><input type="text" name="technician" value="<?=@$documentInfo['technician']?>" /></td>
 </tr>
 <tr>
  <td>Address:</td>
  <td><input type="text" name="address" value="<?=@$documentInfo['address']?>" /></td>
 </tr>
 <tr>
  <td>Inspection Date:</td>
  <td><input type="text" name="inspection_date" value="<?=@$documentInfo['inspection_date']?>" /></td>
 </tr>
 <tr>
  <td>City:</td>
  <td><input type="text" name="city" value="<?=@$documentInfo['city']?>" /></td>
 </tr>
 <tr>
  <td>Manufacturer Name &amp; Model Number:</td>
  <td><input type="text" name="man_name_model" value="<?=@$documentInfo['man_name_model']?>" /></td>
 </tr>
</table>

<h3>Zones</h3>
<?php
$i = 0;
if (is_array($zoneInfo) && count($zoneInfo) > 0) {
	foreach($zoneInfo as $key => $zone) {
		$i++;
		?>
		<div id="zone<?=$i?>" style="display: block;">
		 <table>
		  <tr>
		   <td>Zone Name:</td>
		   <td><input type="text" id="zone_name<?=$i?>" name="zone_name[<?=$zone['id']?>]" value="<?=$zone['zone_name']?>" style="width: 150px;" /></td>
		   <td>Zone #:</td>
		   <td><input type="text"  id="zone_num<?=$i?>" name="zone_num[<?=$zone['id']?>]" value="<?=$zone['zone_num']?>" style="width: 100px;" /></td>
		   <td>Alarm Circuit #:</td>
		   <td><input type="text"  id="alarm_circuit<?=$i?>" name="alarm_circuit[<?=$zone['id']?>]" value="<?=$zone['alarm_circuit']?>" style="width: 50px;" /></td>
		   <td>Supervisory Circuit:</td>
		   <td><input type="text"  id="super_circuit<?=$i?>" name="supervisory_circuit[<?=$zone['id']?>]" value="<?=$zone['supervisory_circuit']?>" style="width: 50px;" /></td>
		   <td>
		   	<div id="zone_link<?=$i?>" style="display: block;">
		   	 <a href="javascript:void(0);" onClick="hideIt('zone<?=$i?>'); document.getElementById('zone_name<?=$i?>').value='';"><img src="img/icons/cancel.png" border="0" /></a>
		   	</div>
		   </td>
		  </tr>
		 </table>
		 <hr>
		</div>	
	<?php
	}
}

for($i=count($zoneInfo)+1;$i<=$zone_count;$i++) {
	if (count($zoneInfo)+1 == $i) {
		$display = 'block';
	} else {
		$display = 'none';
	}
	?>
	<div id="zone<?=$i?>" style="display: <?=$display?>">
	 <table>
	  <tr>
	   <td>Zone Name:</td>
	   <td><input type="text" id="zone_name<?=$i?>" name="zone_name[]" value="" style="width: 150px;" /></td>
	   <td>Zone #:</td>
	   <td><input type="text"  id="zone_num<?=$i?>" name="zone_num[]" value="" style="width: 100px;" /></td>
	   <td>Alarm Circuit #:</td>
	   <td><input type="text"  id="alarm_circuit<?=$i?>" name="alarm_circuit[]" value="" style="width: 50px;" /></td>
	   <td>Supervisory Circuit:</td>
	   <td><input type="text"  id="super_circuit<?=$i?>" name="supervisory_circuit[]" value="" style="width: 50px;" /></td>
	   <td>
	   	<div id="zone_link<?=$i?>" style="display: block;">
	   		<a href="javascript:void(0);" onClick="showIt('zone<?=$i+1?>'); hideIt('zone_link<?=$i?>'); showIt('zone_delete<?=$i?>'); "><img src="img/icons/add.png" border="0" /></a>
	   	</div>
	   	<div id="zone_delete<?=$i?>" style="display: none;">
			<a href="javascript:void(0);" onClick="hideIt('zone<?=$i?>'); document.getElementById('zone_name<?=$i?>').value='';"><img src="img/icons/cancel.png" border="0" /></a>
	   	</div>
	   </td>
	  </tr>
	 </table>
	 <hr>
	</div>
	<?php
}
?>

