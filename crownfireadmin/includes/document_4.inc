<?php
$document_states = document::getDocumentStates();
$report_count = 275;

if ($validate->is_error()) {
	$documentInfo = $validate->get_error_data();
} else {
	if ($_REQUEST['id']) {
		// Header info
		$documentInfo 		= $document->getData('document_data_4_head','document_id',$_REQUEST['id']);
		
		// Report Info
		$reportInfo 	  	= $document->getData('document_data_4_report','document_id',$_REQUEST['id'],true, null, true);
		//$report_count = 30-count($reportInfo);
	}
}
?>

	<table width="100%">
	 <tr>
	  <td width="20%">Customer Name:</td>
	  <td><input type="text" name="customer_name" class="required" value="<?=@stripslashes($documentInfo['customer_name']);?>" /></td>
	 </tr>
	 <tr>
	  <td>Technician:</td>
	  <td><input type="text" name="technician" class="required" value="<?=@stripslashes($documentInfo['technician']);?>" /></td>
	 </tr>
	 <tr>
	  <td>Address:</td>
	  <td><input type="text" name="address" class="required" value="<?=@stripslashes($documentInfo['address']);?>" /></td>
	 </tr>
	 <tr>
	  <td>Inspection Date:</td>
	  <td><input type="text" name="inspection_date" class="required" value="<?=@stripslashes($documentInfo['inspection_date']);?>" /></td>
	 </tr>
	 <tr>
	  <td>City:</td>
	  <td><input type="text" name="city" class="required" value="<?=@stripslashes($documentInfo['city']);?>" /></td>
	 </tr>
	 <tr>
	  <td>Site:</td>
	  <td><input type="text" name="site" class="required" value="<?=@stripslashes($documentInfo['site']);?>" /></td>
	 </tr>
	 <tr>
	  <td>Contact:</td>
	  <td><input type="text" name="contact" class="required" value="<?=@stripslashes($documentInfo['contact']);?>" /></td>
	 </tr>
	</table>
	<br />
	<table width="100%">
	 <tr bgcolor="Gainsboro" align="center" style="font-weight: bold;">
	  <td width="5%">No.#</td>
	  <td width="15%">Extinguisher / Hose Location</td>
	  <td width="10%">Size &amp; Type</td>
	  <td width="10%">Manufacture</td>
	  <td width="10%">Extinguisher Serial #</td>
	  <td width="10%">Manufacture Date</td>
	  <td width="5%">Last H-Test</td>
	  <td width="5%">Next H-Test</td>
	  <td width="5%">Next 6 Year</td>
	  <td width="20%">Remarks</td>
	  <td width="5%">&nbsp; </td>
	 </tr>
	</table>
        <ul id="sortable">
	<?php
	$i = 0;
        $max = 0;
	if (is_array($reportInfo) && count($reportInfo) > 0) {
		foreach($reportInfo as $key => $report) {
			$i++;
                        if ($report['id'] > $max) {
                            $max = $report['id'];
                        }
			?>
                        <li id="<?php echo $report['weight']; ?>">
			<div id="zone-<?=$i?>" style="display: block;">
			 <table width="100%">
			  <tr align="center">
			  <td width="5%"><input type="text" id="zone_num<?=$i?>" name="report_num[<?=$report['id']?>]" value="<?=stripslashes($report['report_num'])?>" style="width: 25px;" /></td>
			  <td width="15%"><input type="text" id="zone_name<?=$i?>" name="location[<?=$report['id']?>]" value="<?=stripslashes($report['location'])?>" style="width: 80px;" /></td>
			  <td width="10%"><input type="text" id="zone_name<?=$i?>" name="size_type[<?=$report['id']?>]" value="<?=stripslashes($report['size_type'])?>" style="width: 40px;" /></td>
			  <td width="10%"><input type="text" id="zone_name<?=$i?>" name="manufacture[<?=$report['id']?>]" value="<?=stripslashes($report['manufacture'])?>" style="width: 60px;" /></td>
			  <td width="10%"><input type="text" id="zone_name<?=$i?>" name="serial[<?=$report['id']?>]" value="<?=stripslashes($report['serial'])?>" style="width: 60px;" /></td>
			  <td width="10%"><input type="text" id="zone_name<?=$i?>" name="manufacture_date[<?=$report['id']?>]" value="<?=stripslashes($report['manufacture_date'])?>" style="width: 60px;" /></td>
			  <td width="5%"><input type="text" id="zone_name<?=$i?>" name="last_h_test[<?=$report['id']?>]" value="<?=stripslashes($report['last_h_test'])?>" style="width: 30px;" /></td>
			  <td width="5%"><input type="text" id="zone_name<?=$i?>" name="next_h_test[<?=$report['id']?>]" value="<?=stripslashes($report['next_h_test'])?>" style="width: 30px;" /></td>
			  <td width="5%"><input type="text" id="zone_name<?=$i?>" name="next_six_year[<?=$report['id']?>]" value="<?=stripslashes($report['next_six_year'])?>" style="width: 30px;" /></td>
			  <td width="20%"><input type="text" id="zone_name<?=$i?>" name="remarks[<?=$report['id']?>]" value="<?=stripslashes($report['remarks'])?>" style="width: 120px;" /></td>
			  <td width="5%">
			   <div id="zone_link<?=$i?>" style="display: block;">
		   		 <a href="javascript:void(0);" onClick="hideIt('zone-<?=$i?>'); document.getElementById('zone_num<?=$i?>').value='';"><img src="img/icons/cancel.png" border="0" /></a>
		   	   </div>
			   </td>
			  </tr>
			 </table>
			 <hr>
			</div>
                        </li>
		<?php
		}
	}
        
	for($i=count($reportInfo)+1;$i<=$report_count-count($reportInfo);$i++) {
                $max++;
		if (count($reportInfo)+1 == $i) {
			$display='block';
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
		  <td width="5%"><input type="text" id="zone_num<?=$i?>" class="zone_num<?=$i?>" name="report_num[<?php echo $max;?>]" value="" style="width: 25px;" <?=$disabled;?> /></td>
		  <td width="15%"><input type="text" id="zone_name<?=$i?>" class="zone_name<?=$i?>" name="location[<?php echo $max;?>]" value="" style="width: 80px;" <?=$disabled;?> /></td>
		  <td width="10%"><input type="text" id="zone_name<?=$i?>" class="zone_name<?=$i?>" name="size_type[<?php echo $max;?>]" value="" style="width: 40px;" <?=$disabled;?> /></td>
		  <td width="10%"><input type="text" id="zone_name<?=$i?>" class="zone_name<?=$i?>" name="manufacture[<?php echo $max;?>]" value="" style="width: 60px;" <?=$disabled;?> /></td>
		  <td width="10%"><input type="text" id="zone_name<?=$i?>" class="zone_name<?=$i?>" name="serial[<?php echo $max;?>]" value="" style="width: 60px;" <?=$disabled;?> /></td>
		  <td width="10%"><input type="text" id="zone_name<?=$i?>" class="zone_name<?=$i?>" name="manufacture_date[<?php echo $max;?>]" value="" style="width: 60px;" <?=$disabled;?> /></td>
		  <td width="5%"><input type="text" id="zone_name<?=$i?>" class="zone_name<?=$i?>" name="last_h_test[<?php echo $max;?>]" value="" style="width: 30px;" <?=$disabled;?> /></td>
		  <td width="5%"><input type="text" id="zone_name<?=$i?>" class="zone_name<?=$i?>" name="next_h_test[<?php echo $max;?>]" value="" style="width: 30px;" <?=$disabled;?> /></td>
		  <td width="5%"><input type="text" id="zone_name<?=$i?>" class="zone_name<?=$i?>" name="next_six_year[<?php echo $max;?>]" value="" style="width: 30px;" <?=$disabled;?> /></td>
		  <td width="20%"><input type="text" id="zone_name<?=$i?>" class="zone_name<?=$i?>" name="remarks[<?php echo $max;?>]" value="" style="width: 120px;" <?=$disabled;?> /></td>
		  <td width="5%">
		   	<div id="zone_link<?=$i?>" style="display: block;">
	   			<a href="javascript:void(0);" onClick="showIt('zone-<?=$i+1?>'); hideIt('zone_link<?=$i?>'); showIt('zone_delete<?=$i?>'); "><img src="img/icons/add.png" border="0" /></a>
	   		</div>
	   		<div id="zone_delete<?=$i?>" style="display: none;">
				<a href="javascript:void(0);" onClick="hideIt('zone-<?=$i?>'); document.getElementById('zone_num<?=$i?>').value='';"><img src="img/icons/cancel.png" border="0" /></a>
	   		</div>
		   </td>
		  </tr>
		 </table>
		 <hr>
		</div>
                
		<?php
	}
	?>
        </ul>