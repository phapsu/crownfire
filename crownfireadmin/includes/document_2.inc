<table width="100%">
 <tr>
  <td width="30%">Facility Address:</td>
  <td><input type="text" name="facility_address" class="required" value="<?=@$userInfo['facility_address']?>" /></td>
 </tr>
 <tr>
  <td>UPS Region (Name):</td>
  <td><input type="text" name="region_name" class="required" value="<?=@$userInfo['region_name']?>" /></td>
 </tr>
 <tr>
  <td>UPS District (Name):</td>
  <td><input type="text" name="district_name" class="required" value="<?=@$userInfo['district_name']?>" /></td>
 </tr>
 <tr>
  <td>Inspector Name:</td>
  <td><input type="text" name="inspector_name" class="required" value="<?=@$userInfo['inspector_name']?>" /></td>
 </tr>
 <tr>
  <td>Date:</td>
  <td><input type="text" name="inspection_date" class="required" value="<?=@$userInfo['inspection_date']?>" /></td>
 </tr>
 <tr>
  <td>Obtain the Site Fire Inspection Map.  Is it updated?:</td>
  <td><input type="text" name="inspection_updated" class="required" value="<?=@$userInfo['inspection_updated']?>" /></td>
 </tr>
</table>

<h3>Valves</h3>
<table width="100%">
 <tr bgcolor="Gainsboro" align="center" style="font-weight: bold;">
  <td width="10%">(7)<br />Valve ID No.</td>
  <td width="10%">(8)<br />Zone No.</td>
  <td width="10%">(9)<br />Open</td>
  <td width="10%">(10)<br />Shut</td>
  <td width="10%">(11)<br />Valve ID No.</td>
  <td width="10%">(12)<br />Valve ID No.</td>
  <td width="30%">Comments</td>
  <td width="10%">&nbsp; </td>
 </tr>
</table>
<?php
for($i=1;$i<=30;$i++) {
	if (1==$i) {
		$display='block';
	} else {
		$display = 'none';
	}
	?>
	<div id="zone<?=$i?>" style="display: <?=$display?>">
	 <table width="100%">
	  <tr align="center">
	   <td width="10%"><input type="text" id="zone_name<?=$i?>" name="zone_name[]" value="" style="width: 40px;" /></td>
	   <td width="10%"><input type="text" id="zone_name<?=$i?>" name="zone_name[]" value="" style="width: 40px;" /></td>
	   <td width="10%"><input type="text" id="zone_name<?=$i?>" name="zone_name[]" value="" style="width: 40px;" /></td>
	   <td width="10%"><input type="text" id="zone_name<?=$i?>" name="zone_name[]" value="" style="width: 40px;" /></td>
	   <td width="10%"><input type="text" id="zone_name<?=$i?>" name="zone_name[]" value="" style="width: 40px;" /></td>
	   <td width="10%"><input type="text" id="zone_name<?=$i?>" name="zone_name[]" value="" style="width: 40px;" /></td>
	   <td width="30%"><input type="text" id="zone_name<?=$i?>" name="zone_name[]" value="" style="width: 150px;" /></td>
	   <td width="10%">
	   	<div id="zone_link<?=$i?>" style="display: block;">
	   		<a href="javascript:void(0);" onClick="showIt('zone<?=$i+1?>'); hideIt('zone_link<?=$i?>'); "><img src="img/icons/add.png" border="0" /></a>
	   		<?php
	   		if (1!=$i) {
	   			?>
	   			<a href="javascript:void(0);" onClick="showIt('zone_link<?=$i-1?>'); hideIt('zone<?=$i?>'); "><img src="img/icons/cancel.png" border="0" /></a>
	   			<?php
	   		}
	   		?>
	   	</div>
	   </td>
	  </tr>
	 </table>
	 <hr>
	</div>
	<?php
}
?>

<h3>Public Water Supply</h3>

<table width="60%" border="0">
 <tr>
  <td width="40%">Public Water Supply in Service (13):</td>
  <td width="1%"><input type="radio" name="fl_water" value="1" style="width: 10px;" /></td> 
  <td width="1%">Yes</td>
  <td width="1%"> <input type="radio" name="fl_water" value="0"  style="width: 10px;" /></td> 
  <td>No</td>
 </tr>
 <tr>
  <td>Pressure (PSI) (14):</td>
  <td colspan="4"><input type="text" name="pressure" value="<?=$userInfo['inspection_updated']?>" style="width: 100px;" /></td>
 </tr>  
</table>

<h3>Fire Pumps</h3>

<table width="100%">
 <tr bgcolor="Gainsboro" align="center" style="font-weight: bold;">
  <td width="10%">(15)<br />Fire Pump ID No.</td>
  <td width="15%">(16)<br />Fire Pump Set for Automatic.</td>
  <td width="15%">(17)<br />Fire Pump Operated Today</td>
  <td width="30%">Comments</td>
  <td width="10%">&nbsp; </td>
 </tr>
</table>
<?php
for($i=1;$i<=30;$i++) {
	if (1==$i) {
		$display='block';
	} else {
		$display = 'none';
	}
	?>
	<div id="pump<?=$i?>" style="display: <?=$display?>">
	 <table width="100%">
	  <tr align="center">
	  <td width="10%"><input type="text" id="zone_name<?=$i?>" name="zone_name[]" value="" style="width: 40px;" /></td>
	   <td width="15%" align="center">
	   <table width="60%" border="0">
		 <tr>
		  <td width="1%"><input type="radio" name="fl_water" value="1" style="width: 10px;" /></td> 
		  <td width="1%">Yes</td>
		  <td width="1%"> <input type="radio" name="fl_water" value="0"  style="width: 10px;" /></td> 
		  <td>No</td>
		 </tr>
		</table>
	   </td>
	   <td width="15%" align="center">
	   	 <table width="60%" border="0">
		 <tr>
		  <td width="1%"><input type="radio" name="fl_water" value="1" style="width: 10px;" /></td> 
		  <td width="1%">Yes</td>
		  <td width="1%"> <input type="radio" name="fl_water" value="0"  style="width: 10px;" /></td> 
		  <td>No</td>
		 </tr>
		</table>
	   
	   </td>
	   <td width="30%"><input type="text" id="zone_name<?=$i?>" name="zone_name[]" value="" style="width: 150px;" /></td>
	   <td width="10%">
	   	<div id="pump_link<?=$i?>" style="display: block;">
	   		<a href="javascript:void(0);" onClick="showIt('pump<?=$i+1?>'); hideIt('pump_link<?=$i?>'); "><img src="img/icons/add.png" border="0" /></a>
	   		<?php
	   		if (1!=$i) {
	   			?>
	   			<a href="javascript:void(0);" onClick="showIt('pump_link<?=$i-1?>'); hideIt('pump<?=$i?>'); "><img src="img/icons/cancel.png" border="0" /></a>
	   			<?php
	   		}
	   		?>
	   	</div>
	   </td>
	  </tr>
	 </table>
	 <hr>
	</div>
	<?php
}

$questions = document::getDocumentQuestionsByTypeId($_REQUEST['type_id']);

if (is_array($questions)) {
	echo '<table>';
	foreach($questions as $questionArray) {
		?>
		<tr>
		<td><?=$questionArray['question']?></td>
		<td><input type="radio" name="question[<?=$questionArray['id']?>]" value="1"  style="width: 10px;" /></td>
		<td>Yes</td>
		<td><input type="radio" name="question[<?=$questionArray['id']?>]" value="0"  style="width: 10px;" /></td>
		<td>No</td>
		</tr>
		<?php
	}
	echo '</table>';
}
?>
<h3>Splinkler Systems</h3>

<table width="100%" border="0" style="border: 1px solid #000;" cellspacing="0">
 <tr bgcolor="Gainsboro" valign="top">
  <th width="10%" rowspan="2">Sprinkler System ID No.</th>
  <th width="10%" colspan="2">Was Alarm tested flowing the Insp.  Test conn?</th>
  <th width="20%" colspan="3">Water Pressure 2-inch Drain Test</th>
  <th width="10%" colspan="2">Is Heat Adaquate?</th>
  <th width="10%">Gas Pressure Dry/Pre-action Only</th>
  <th width="40%">Comments</th>
 </tr>
 <tr align="center">
  <td>Yes</td>
  <td>No</td>
  <td>Static</td>
  <td>Flow</td>
  <td>Diff.  Tial</td>
  <td>Yes</td>
  <td>No</td>
  <td>&nbsp; </td>
  <td>&nbsp; </td>
 </tr>
<?php
for ($i=1;$i<=15;$i++) {
 	?>
	 <tr align="center">
	  <td><input type="text" name="sprinkler_id[]" value="" style="width: 100px;" /> </td>
	  <td><input type="checkbox" name="question[<?=$questionArray['id']?>]" value="1"  style="width: 5px; padding: 0;" /></td>
	  <td><input type="checkbox" name="question[<?=$questionArray['id']?>]" value="1"  style="width: 10px;" /></td>
	  <td><input type="checkbox" name="question[<?=$questionArray['id']?>]" value="1"  style="width: 10px;" /></td>
	  <td><input type="checkbox" name="question[<?=$questionArray['id']?>]" value="1"  style="width: 10px;" /></td>
	  <td><input type="checkbox" name="question[<?=$questionArray['id']?>]" value="1"  style="width: 10px;" /></td>
	  <td><input type="checkbox" name="question[<?=$questionArray['id']?>]" value="1"  style="width: 10px;" /></td>
	  <td><input type="checkbox" name="question[<?=$questionArray['id']?>]" value="1"  style="width: 10px;" /></td>
	  <td><input type="text" name="sprinkler_id[]" value="" style="width: 100px;" /> </td>
	  <td><input type="text" name="sprinkler_id[]" value="" style="width: 180px;" /> </td>
	 </tr>
	 <?php
}
?>
</table>

