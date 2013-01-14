<?php
$document_states = document::getDocumentStates();
$form_count = 80;
if ($validate->is_error()) {
	$documentInfo = $validate->get_error_data();
} else {
	if ($_REQUEST['id']) {
		// Header info
		$documentInfo 		= $document->getData('document_data_5_head','document_id',$_REQUEST['id']);

		// Zone info
		$formInfo 	 	 	= $document->getData('document_data_5_form','document_id',$_REQUEST['id'],true);
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
	
	<h3>Emergency Lighting Annual Inspection Form</h3>
	
	<table cellspacing="0" cellpadding="4" width="100%">
	 <tr bgcolor="#000000" style="color: #fff;">
	  <td><b>Type:</b></td> 
	  <td>( U ) = Emergency Light Unit</td>
	  <td>( C ) = Combo Unit</td>			     
	  <td>( R ) = Remote Head</td>
	  <td>( X ) = Exit Sign</td>
	 </tr>			
	</table>
	<br />
	<table width="100%">
	 <tr bgcolor="Gainsboro" align="center" style="font-weight: bold;">
	  <td width="10%">Unit Type</td>
	  <td width="25%">Location Of Unit Or Remote Lamp</td>
	  <td width="10%">Time Illuminated</td>
	  <td width="10%">Pass or Fail</td>
	  <td width="10%">Unit Voltage</td>
	  <td width="10%">Unit Watts</td>
	  <td width="5%">Number Of Batteries</td>
	  <td width="5%">Size Of Batteries</td>
	  <td width="5%">&nbsp; </td>
	 </tr>
	</table>
        <ul id="sortable">
	<?php
	$i = 0;
	if (is_array($formInfo) && count($formInfo) > 0) {
		foreach($formInfo as $key => $form) {
			$i++;
                        if ($i != 1) {
                            $j = $i-1;
                        } else {
                            $j = 1;
                        }
			?>
                        <li id="<?php echo $formInfo['weight']; ?>">
			<div id="zone-<?=$i?>" style="display: block;">
			 <table width="100%">
			  <tr align="center">
			  <td width="10%"><input type="text" id="unit_type<?=$i?>" name="unit_type[]" value="<?=$form['unit_type']?>" style="width: 45px;" /></td>
			  <td width="25%"><input type="text" id="zone_name<?=$i?>" name="location[]" value="<?=$form['location']?>" style="width: 180px;" /></td>
			  <td width="10%"><input type="text" id="zone_name<?=$i?>" name="time_illuminated[]" value="<?=$form['time_illuminated']?>" style="width: 60px;" /></td>
			  <td width="10%"><input type="text" id="zone_name<?=$i?>" name="pass_or_fail[]" value="<?=$form['pass_or_fail']?>" style="width: 60px;" /></td>
			  <td width="10%"><input type="text" id="zone_name<?=$i?>" name="unit_voltage[]" value="<?=$form['unit_voltage']?>" style="width: 60px;" /></td>
			  <td width="10%"><input type="text" id="zone_name<?=$i?>" name="unit_watts[]" value="<?=$form['unit_watts']?>" style="width: 60px;" /></td>
			  <td width="5%"><input type="text" id="zone_name<?=$i?>" name="num_batteries[]" value="<?=$form['num_batteries']?>" style="width: 45px;" /></td>
			  <td width="5%"><input type="text" id="zone_name<?=$i?>" name="size_batteries[]" value="<?=$form['size_batteries']?>" style="width: 40px;" /></td>
			  <td width="5%">
                            <div id="zone_link<?=$i?>" style="display: block;">
                                            <a href="javascript:void(0);" onClick="showIt('zone_link<?=$j?>'); hideIt('zone-<?=$i?>'); document.getElementById('unit_type<?=$i?>').value='';"><img src="img/icons/cancel.png" border="0" /></a>
                            </div>
			   </td>
			  </tr>
			 </table>
		 	
		   </div>
                        </li>
		<?php
		}
	}
	$x = 0;
	for($i=count($formInfo)+1;$i<=$form_count;$i++) {
		$x++;
		if (count($formInfo)+1==$i) {
			$display = 'block';
                        $disabled ="";
		} else {
			$display = 'none';
                        $disabled ="disabled='disabled'";
		}
		?>
                <li>
		<div id="zone-<?=$i?>" style="display: <?=$display?>">
		 <table width="100%">
		  <tr align="center">
		  <td width="10%"><input type="text" id="unit_type<?=$i?>" class="unit_type<?=$i?>" name="unit_type[]" value="" style="width: 45px;" <?=$disabled;?> /></td>
		  <td width="25%"><input type="text" id="zone_name<?=$i?>" class="zone_name<?=$i?>" name="location[]" value="" style="width: 180px;"<?=$disabled;?> /></td>
		  <td width="10%"><input type="text" id="zone_name<?=$i?>" class="zone_name<?=$i?>" name="time_illuminated[]" value="" style="width: 60px;" <?=$disabled;?> /></td>
		  <td width="10%"><input type="text" id="zone_name<?=$i?>" class="zone_name<?=$i?>" name="pass_or_fail[]" value="" style="width: 60px;" <?=$disabled;?> /></td>
		  <td width="10%"><input type="text" id="zone_name<?=$i?>" class="zone_name<?=$i?>" name="unit_voltage[]" value="" style="width: 60px;" <?=$disabled;?> /></td>
		  <td width="10%"><input type="text" id="zone_name<?=$i?>" class="zone_name<?=$i?>" name="unit_watts[]" value="" style="width: 60px;" <?=$disabled;?> /></td>
		  <td width="5%"><input type="text" id="zone_name<?=$i?>" class="zone_name<?=$i?>" name="num_batteries[]" value="" style="width: 45px;" <?=$disabled;?> /></td>
		  <td width="5%"><input type="text" id="zone_name<?=$i?>" class="zone_name<?=$i?>" name="size_batteries[]" value="" style="width: 40px;" <?=$disabled;?> /></td>
		  <td width="5%">
		   	<div id="zone_link<?=$i?>" style="display: block;">
   				<a href="javascript:void(0);" onClick="showIt('zone-<?=$i+1?>'); hideIt('zone_link<?=$i?>'); showIt('zone_delete<?=$i?>'); "><img src="img/icons/add.png" border="0" /></a>
	   		</div>
	   		<div id="zone_delete<?=$i?>" style="display: none;">
				<a href="javascript:void(0);" onClick="hideIt('zone-<?=$i?>'); document.getElementById('unit_type<?=$i?>').value='';"><img src="img/icons/cancel.png" border="0" /></a>
	   		</div>
		   </td>
		  </tr>
		 </table>
		 
		</div>
                </li>
		<?php
	}
	?>
        </ul>
	
<h3>Remarks</h3>

<textarea name="comments" style="width: 800px; height:150px;"><?=$documentInfo['comments']?></textarea>