<?php
$form_count = 250;
$users = new users();
$techs = $users->getUsers('techs');
$document_states 	= document::getDocumentStates();

if ($validate->is_error()) {
	$documentInfo = $validate->get_error_data();
} else {
	if ($_REQUEST['id']) {
		// Weird
		$documentInfo 		= $document->getData('document_data_9_head','document_id',$_REQUEST['id']);
		$documentInfo 		= array_merge($documentInfo, $document->getData('document_data_9_e_2_1','document_id',$_REQUEST['id']));
		$documentInfo 		= array_merge($documentInfo, $document->getData('document_data_9_e_2_3','document_id',$_REQUEST['id']));
		$documentInfo 		= array_merge($documentInfo, $document->getData('document_data_9_e_2_4','document_id',$_REQUEST['id']));
		$documentInfo 		= array_merge($documentInfo, $document->getData('document_data_9_e_2_5','document_id',$_REQUEST['id']));
		$documentInfo 		= array_merge($documentInfo, $document->getData('document_data_9_e_2_6','document_id',$_REQUEST['id']));
		$documentInfo 		= array_merge($documentInfo, $document->getData('document_data_9_e_2_7','document_id',$_REQUEST['id']));
		$documentInfo 		= array_merge($documentInfo, $document->getData('document_data_9_e_2_8','document_id',$_REQUEST['id']));
		$documentInfo 		= array_merge($documentInfo, $document->getData('document_data_9_e_2_9','document_id',$_REQUEST['id']));
		$documentInfo 		= array_merge($documentInfo, $document->getData('document_data_9_e_2_10','document_id',$_REQUEST['id']));
		$documentInfo 		= array_merge($documentInfo, $document->getData('document_data_9_e_2_11','document_id',$_REQUEST['id']));
		$documentInfo 		= array_merge($documentInfo, $document->getData('document_data_9_e_3_1','document_id',$_REQUEST['id']));
		
		// Device Record 
		$formInfo 	 	 	= $document->getData('document_data_9_device','document_id',$_REQUEST['id'],true);
	}
}
?>

<h3>E1. Fire Alarm System Annual Test and Inspection Report - CAN/ULC S536-04</h3>

<table class="dataTable">
 <tr>
  <td>Building Name:</td>
  <td><input type="text" name="building_name" class="required" value="<?=@$documentInfo['building_name']?>" /></td>
 </tr>
 <tr>
  <td>Address:</td>
  <td><input type="text" name="address" class="required" value="<?=@$documentInfo['address']?>" /></td>
 </tr>
 <tr>
  <td>Date:</td>
  <td><input type="text" name="date" class="required" value="<?=@$documentInfo['date']?>" /></td>
 </tr>
 <tr>
  <td>System Manufacturer:</td>
  <td><input type="text" name="system_manufacturer" class="required" value="<?=@$documentInfo['system_manufacturer']?>" /></td>
 </tr>
 <tr>
  <td>Model Number:</td>
  <td><input type="text" name="model_number" class="required" value="<?=@$documentInfo['model_number']?>" /></td>
 </tr> 
</table>

<hr />

<?php
display::displayQuestionsByTypeId($_REQUEST['type_id'], 1, array(1 => 'Yes', 0 => 'No', 'N/A' => 'N/A'), false, 'letters');
?>

<h3>Comments</h3>
<textarea name="comments" style="width: 800px; height:100px;"><?=$documentInfo['comments']?></textarea>

<br /><br />
This is to certify that the information contained in this Fire Alarm SYstems Annual Test and Inspection Report is correct and complete.
<br /><br />

<table width="100%" border="0">
 <tr>
  <td width="35%" align="left"><?=display::getTechs($techs, 'primary_technician', $documentInfo['primary_technician']);?></td>
  <td width="20%" align="left"><input type="text" name="primary_company" value="<?=$documentInfo['primary_company']?>" style="width: 120px;" /></td>
  <td width="20%" align="left"><input type="text" name="primary_telephone" value="<?=$documentInfo['primary_telephone']?>" style="width: 120px;" /></td>
  <td width="25%" align="left"><?=display::getCFAA($techs, 'primary_identification', $documentInfo['primary_identification']);?></td>
 </tr>
 <tr align="left">
  <td width="35%" style="border-top: 1px solid #000;">Printed Name of Primary or Supervising<br />Technician Conducting the Test and Inspection</td>
  <td width="20%" style="border-top: 1px solid #000;">Company</td>
  <td width="20%" style="border-top: 1px solid #000;">Telephone</td>
  <td width="25%" style="border-top: 1px solid #000;">CFAA Number</td>
 </tr>
 <tr>
  <td colspan="4">&nbsp; </td>
 </tr>
 <tr>
  <td width="35%" align="left"><?=display::getTechs($techs, 'technician', $documentInfo['technician']);?></td>
  <td width="20%" align="left"><input type="text" name="company" value="<?=$documentInfo['company']?>" style="width: 120px;" /></td>
  <td width="20%" align="left"><input type="text" name="telephone" value="<?=$documentInfo['telephone']?>" style="width: 120px;" /></td>
  <td width="25%" align="left"><?=display::getCFAA($techs, 'identification', $documentInfo['identification']);?></td>
 </tr>
 <tr align="left">
  <td width="35%" style="border-top: 1px solid #000;">Printed Name of Technician Conducting the Test<br /> and Inspection</td>
  <td width="20%" style="border-top: 1px solid #000;">Company</td>
  <td width="20%" style="border-top: 1px solid #000;">Telephone</td>
  <td width="25%" style="border-top: 1px solid #000;">CFAA Number</td>
 </tr>
</table>
<br /><br />
<h3>E2.1 Control Unit or Transponder Test - CAN/ULC S536-04</h3>
<table width="100%">
 <tr>
  <td width="80%">Control unit or transponder location:</td>
  <td><input type="text" name="e21_transponder_location" value="<?=$documentInfo['e21_transponder_location']?>" style="width: 230px;" /></td>
 </tr>
 <tr>
  <td>Control unit or transponder identification:</td>
  <td><input type="text" name="e21_identification" value="<?=$documentInfo['e21_identification']?>" style="width: 230px;" /></td>
 </tr>
</table>

<hr />
<?php
display::displayQuestionsByTypeId($_REQUEST['type_id'], 2, array(1 => 'Yes', 0 => 'No', 'N/A' => 'N/A'), null, 'letters');
?>

<h3>E2.2 Voice Communication Test - CAN/ULC S536-04</h3>
<?php
display::displayQuestionsByTypeId($_REQUEST['type_id'], 3, array(1 => 'Yes', 0 => 'No', 'N/A' => 'N/A'), null, 'letters');
?>

<h3>E2.3 Control Unit or Transponder Inspection - CAN/ULC S536-04</h3>

<table width="100%">
 <tr>
  <td width="80%">Control unit or transponder location:</td>
  <td><input type="text" name="e23_transponder_location" value="<?=$documentInfo['e23_transponder_location']?>" style="width: 230px;"  /></td>
 </tr>
 <tr>
  <td>Control unit or transponder identification:</td>
  <td><input type="text" name="e23_address" value="<?=$documentInfo['e23_address']?>" style="width: 230px;"  /></td>
 </tr>
</table>
<?php
display::displayQuestionsByTypeId($_REQUEST['type_id'], 4, array(1 => 'Yes', 0 => 'No', 'N/A' => 'N/A'), false, 'letters');
?>

<h3>E2.4 Power Supply Inspection - CAN/ULC S536-04</h3>

<table width="100%">
 <tr>
  <td width="80%">Control unit or transponder location:</td>
  <td><input type="text" name="e24_transponder_location" value="<?=$documentInfo['e24_transponder_location']?>" style="width: 230px;"  /></td>
 </tr>
 <tr>
  <td>Control unit or transponder identification:</td>
  <td><input type="text" name="e24_transponder_identification" value="<?=$documentInfo['e24_transponder_identification']?>" style="width: 230px;"  /></td>
 </tr>
</table>
<?php
display::displayQuestionsByTypeId($_REQUEST['type_id'], 5, array(1 => 'Yes', 0 => 'No', 'N/A' => 'N/A'), null, 'letters');
?>

<?php
$display_2 = 'none';
$display_3 = 'none';
$display_4 = 'none';

$display_link_1 = 'block';
$display_link_2 = 'none';
$display_link_3 = 'none';
$display_link_4 = 'none';

if ($_REQUEST['id']) {
	if (!empty($documentInfo['e25_transponder_location_2'])) {
		$display_link_1 = 'none';
		$display_2 = 'block';
		$display_link_2 = 'block';
	}
	
	if (!empty($documentInfo['e25_transponder_location_3'])) {
		$display_3 = 'block';
		$display_link_2 = 'none';
		$display_link_4 = 'block';
	}
		
	if (!empty($documentInfo['e25_transponder_location_4'])) {
		$display_4 = 'block';
		$display_link_2 = 'none';
		$display_link_4 = 'none';
	}
} else {
	$display_link_1 = 'block';
}
?>
<h3>E2.5 (a) Emergency Power Supply Test and Inspection - CAN/ULC S536-04</h3>

<table width="100%">
 <tr>
  <td width="80%">Control unit or transponder location:</td>
  <td><input type="text" name="e25_transponder_location" value="<?=$documentInfo['e25_transponder_location']?>" style="width: 230px;"/></td>
 </tr>
 <tr>
  <td width="80%">Control unit or transponder identification:</td>
  <td><input type="text" name="e25_transponder_identification" value="<?=$documentInfo['e25_transponder_identification']?>" style="width: 230px;"/></td>
 </tr>
</table>
<?php
display::displayQuestionsByTypeId($_REQUEST['type_id'], 6, array(1 => 'Yes', 0 => 'No', 'N/A' => 'N/A'), false, 'letters');
?>

<div id="section_link_1" style="display: <?=$display_link_1?>;">
<hr color="navy" />
	<a href="#section25_b" onClick="showIt('section_2'); hideIt('section_link_1'); showIt('section_link_2');">Add another Section 2.5 (B)</a>
<hr color="navy" />
</div>
<br />

<div id="section_2" style="display: <?=$display_2?>;">
<h3>E2.5 (b) Emergency Power Supply Test and Inspection - CAN/ULC S536-04</h3>

<table width="100%">
 <tr>
  <td width="80%">Control unit or transponder location:</td>
  <td><input type="text" name="e25_transponder_location_2" value="<?=$documentInfo['e25_transponder_location_2']?>" style="width: 230px;"/></td>
 </tr>
 <tr>
  <td width="80%">Control unit or transponder identification:</td>
  <td><input type="text" name="e25_transponder_identification_2" value="<?=$documentInfo['e25_transponder_identification_2']?>" style="width: 230px;"/></td>
 </tr>
</table>

<?php
display::displayQuestionsByTypeId($_REQUEST['type_id'], 15, array(1 => 'Yes', 0 => 'No', 'N/A' => 'N/A'), false, 'letters');
?>
</div>
<div id="section_link_2" style="display:  <?=$display_link_2?>;">
<hr color="navy" />
	<a href="javascript:void(0);" onClick="showIt('section_3'); hideIt('section_link_2'); showIt('section_link_4');">Add another Section 2.5 (C)</a>
<hr color="navy" />	
</div>
<div id="section_3" style="display: <?=$display_3?>;">

<h3>E2.5 (c) Emergency Power Supply Test and Inspection - CAN/ULC S536-04</h3>

<table width="100%">
 <tr>
  <td width="80%">Control unit or transponder location:</td>
  <td><input type="text" name="e25_transponder_location_3" value="<?=$documentInfo['e25_transponder_location_3']?>" style="width: 230px;"/></td>
 </tr>
 <tr>
  <td width="80%">Control unit or transponder identification:</td>
  <td><input type="text" name="e25_transponder_identification_3" value="<?=$documentInfo['e25_transponder_identification_3']?>" style="width: 230px;"/></td>
 </tr>
</table>
<?php
display::displayQuestionsByTypeId($_REQUEST['type_id'], 16, array(1 => 'Yes', 0 => 'No', 'N/A' => 'N/A'), false, 'letters');
?>
</div>
<div id="section_link_4" style="display: <?=$display_link_4?>;">
<hr color="navy" />
	<a href="javascript:void(0);" onClick="showIt('section_4'); hideIt('section_link_4');">Add another Section 2.5 (D)</a>
<hr color="navy" />
</div>
<div id="section_4" style="display:<?=$display_4?>;">
<h3>E2.5 (d) Emergency Power Supply Test and Inspection - CAN/ULC S536-04</h3>

<table width="100%">
 <tr>
  <td width="80%">Control unit or transponder location:</td>
  <td><input type="text" name="e25_transponder_location_4" value="<?=$documentInfo['e25_transponder_location_4']?>" style="width: 230px;"/></td>
 </tr>
 <tr>
  <td width="80%">Control unit or transponder identification:</td>
  <td><input type="text" name="e25_transponder_identification_4" value="<?=$documentInfo['e25_transponder_identification_4']?>" style="width: 230px;"/></td>
 </tr>
</table>
<?php
display::displayQuestionsByTypeId($_REQUEST['type_id'], 17, array(1 => 'Yes', 0 => 'No', 'N/A' => 'N/A'), false, 'letters');
?>
</div>


<h3>E2.6 Annunciator and Remote Trouble Signal Unit Test and Inspection - CAN/ULC S536-04</h3>

<table width="100%">
 <tr>
  <td width="80%">Annunciator or remote trouble signal unit location:</td>
  <td><input type="text" name="e26_annunciator_location" value="<?=$documentInfo['e26_annunciator_location']?>" style="width: 230px;" /></td>
 </tr>
 <tr>
  <td>Annunciator or remote trouble signal unit identification:</td>
  <td><input type="text" name="e26_annunciator_identification" value="<?=$documentInfo['e26_annunciator_identification']?>" style="width: 230px;" /></td>
 </tr>
</table>
<?php
display::displayQuestionsByTypeId($_REQUEST['type_id'], 9, array(1 => 'Yes', 0 => 'No', 'N/A' => 'N/A'), false, 'letters');
?>

<h3>E2.7 Annunciator or Sequential Displays - CAN/ULC S536-04</h3>

<table width="100%">
 <tr>
  <td width="80%">Annunciator or remote trouble signal unit location:</td>
  <td><input type="text" name="e27_annunciator_location" value="<?=$documentInfo['e27_annunciator_location']?>" style="width: 230px;"/></td>
 </tr>
 <tr>
  <td>Annunciator or remote trouble signal unit identification:</td>
  <td><input type="text" name="e27_annunciator_identification" value="<?=$documentInfo['e27_annunciator_identification']?>" style="width: 230px;"/></td>
 </tr>
</table>
<?php
display::displayQuestionsByTypeId($_REQUEST['type_id'], 10, array(1 => 'Yes', 0 => 'No', 'N/A' => 'N/A'), false, 'letters');
?>

<h3>E2.8 Remote Trouble Signal Unit Test and Inspection - CAN/ULC S536-04</h3>

<table width="100%">
 <tr>
  <td width="80%">Remote trouble signal unit location:</td>
  <td><input type="text" name="e28_remote_location" value="<?=$documentInfo['e28_remote_location']?>" style="width: 230px;" /></td>
 </tr>
 <tr>
  <td>Remote trouble signal unit identification:</td>
  <td><input type="text" name="e28_remote_identification" value="<?=$documentInfo['e28_remote_identification']?>" style="width: 230px;" /></td>
 </tr>
</table>
<?php
display::displayQuestionsByTypeId($_REQUEST['type_id'], 11, array(1 => 'Yes', 0 => 'No', 'N/A' => 'N/A'), false, 'letters');
?>

<h3>E2.9 Printer Test - CAN/ULC S536-04</h3>

<table width="100%" class="dataTable">
 <tr>
  <td width="80%">Printer location:</td>
  <td><input type="text" name="e29_printer_location" value="<?=$documentInfo['e29_printer_location']?>" style="width: 230px;"/></td>
 </tr>
 <tr>
  <td>Printer identification:</td>
  <td><input type="text" name="e29_printer_identification" value="<?=$documentInfo['e29_printer_identification']?>" style="width: 230px;"/></td>
 </tr>
</table>
<?php
display::displayQuestionsByTypeId($_REQUEST['type_id'], 12, array(1 => 'Yes', 0 => 'No', 'N/A' => 'N/A'), false, 'letters');
?>

<h3>E2.10 Communication Link Test - CAN/ULC S536-04</h3>

<table width="100%" class="dataTable">
 <tr>
  <td width="80%">Control unit or transponder location:</td>
  <td><input type="text" name="e210_transponder_location" value="<?=$documentInfo['e210_transponder_location']?>" style="width: 230px;" /></td>
 </tr>
 <tr>
  <td>Control unit or transponder identification:</td>
  <td><input type="text" name="e210_transponder_identification" value="<?=$documentInfo['e210_transponder_identification']?>"style="width: 230px;" /></td>
 </tr>
 <tr>
  <td>Data communication link identification:</td>
  <td><input type="text" name="e210_data_identification" value="<?=$documentInfo['e210_data_identification']?>" style="width: 230px;"/></td>
 </tr> 
</table>
<?php
display::displayQuestionsByTypeId($_REQUEST['type_id'], 13, array(1 => 'Yes', 0 => 'No', 'N/A' => 'N/A'), false, 'letters');
?>

<h3>E2.11 Ancillary Device Circuit Test - CAN/ULC S536-04</h3>

<table style="border: 1px solid #000000;" width="50%" class="dataTable">
 <tr bgcolor="#EEEEEE">
  <td colspan="4">Record Specific Type of Ancillary Circuit</td>
 </tr>
 <tr>
  <td><input type="text" name="record_1" value="<?=$documentInfo['record_1']?>" style="width: 150px;" /></td> 
  <td>Yes <input type="radio" name="record_1_option" value="Yes" style="width: 10px;" <?php echo (strtolower($documentInfo['record_1_option'])) == 'yes' ? ' checked="checked"' : ''; ?> /></td>
  <td>No <input type="radio" name="record_1_option" value="No" style="width: 10px;"   <?php echo (strtolower($documentInfo['record_1_option']))  == 'no' ? ' checked="checked"' : ''; ?> /></td>
  <td>N/A <input type="radio" name="record_1_option" value="N/A" style="width: 10px;" <?php echo (strtolower($documentInfo['record_1_option']))  == 'n/a' ? ' checked="checked"' : ''; ?> /></td>
 </tr>
 <tr>
  <td><input type="text" name="record_2" value="<?=$documentInfo['record_2']?>"  style="width: 150px;" /></td> 
  <td>Yes <input type="radio" name="record_2_option" value="Yes" style="width: 10px;"   <?php echo (strtolower($documentInfo['record_2_option'])) == 'yes' ? ' checked="checked"' : ''; ?> /></td>
  <td>No <input type="radio" name="record_2_option" value="No" style="width: 10px;"   <?php echo (strtolower($documentInfo['record_2_option']))  == 'no' ? ' checked="checked"' : ''; ?> /></td>
  <td>N/A <input type="radio" name="record_2_option" value="N/A" style="width: 10px;"  <?php echo (strtolower($documentInfo['record_2_option']))  == 'n/a' ? ' checked="checked"' : ''; ?>  /></td>
 </tr>
 <tr>
  <td><input type="text" name="record_3" value="<?=$documentInfo['record_3']?>"  style="width: 150px;" /></td> 
  <td>Yes <input type="radio" name="record_3_option" value="Yes" style="width: 10px;"   <?php echo (strtolower($documentInfo['record_3_option'])) == 'yes' ? ' checked="checked"' : ''; ?> /></td>
  <td>No <input type="radio" name="record_3_option" value="No" style="width: 10px;"   <?php echo (strtolower($documentInfo['record_3_option']))  == 'no' ? ' checked="checked"' : ''; ?> /></td>
  <td>N/A <input type="radio" name="record_3_option" value="N/A" style="width: 10px;"   <?php echo (strtolower($documentInfo['record_3_option']))  == 'n/a' ? ' checked="checked"' : ''; ?> /></td>
 </tr>
</table>
<br />
Note: The tests reported on this Form do not include the actual operational test of acillary devices
<br />

<h3>E2.12 Remarks - CAN/ULC S536-04</h3>

<table>
 <tr valign="top">
  <td width="15%">Remarks:</td>
  <td><textarea name="remarks_e12" style="width: 500px; height: 100px;"><?=$documentInfo['remarks_e12']?></textarea>
 </tr> 
</table>

<h3>E3.1 Field Device Testing - Legend and Notes - CAN/ULC S536-04</h3>

<table class="dataTable" cellpadding="3">
 <tr bgcolor="#EEEEEE" style="font-weight: bold;" align="center">
  <td>Device</td>
  <td>Description</td>
  <td>Type</td>
  <td>Model No</td>
 </tr>
 <tr>
  <td>M</td>
  <td>Manual Pull Station</td>
  <td><input type="text" name="type_1" value="<?=$documentInfo['type_1']?>" /></td>
  <td><input type="text" name="model_1" value="<?=$documentInfo['model_1']?>" /></td>
 </tr>
 <tr>
  <td>RHT</td>
  <td>Heat Detector, Restorable</td>
  <td><input type="text" name="type_2" value="<?=$documentInfo['type_2']?>" /></td>
  <td><input type="text" name="model_2" value="<?=$documentInfo['model_2']?>" /></td>
 </tr>
 <tr>
  <td>HT</td>
  <td>Heat Detector, Non-restoreable</td>
  <td><input type="text" name="type_19" value="<?=$documentInfo['type_19']?>" /></td>
  <td><input type="text" name="model_19" value="<?=$documentInfo['model_19']?>" /></td>
 </tr> 
 <tr valign="top">
  <td>S</td>
  <td>
  	Smoke Detector
  	<br /><br />
  	Sensitivity test method or test equiptment:<br />
  	Model/Method: <input type="text" name="model_method" value="<?=$documentInfo['model_method']?>" style="width: 100px;" />
  	<br /><br />
  	Manufacturer Sensitivity Range:<br />
  	Sensitivity Range: <input type="text" name="range_2" value="<?=$documentInfo['range_2']?>" style="width: 100px;" />
  </td>
  <td align="center">N/A<br /><input type="text" name="na_value1" value="<?=$documentInfo['na_value1']?>" style="width: 100px;" /><br /></td>
  <td align="center">N/A<br /><input type="text" name="na_value2" value="<?=$documentInfo['na_value2']?>" style="width: 100px;" /><br /></td>
 </tr>
 <tr>
  <td>RI</td>
  <td>Remote Indicator Unit</td>
  <td><input type="text" name="type_4" value="<?=$documentInfo['type_4']?>" /></td>
  <td><input type="text" name="model_4" value="<?=$documentInfo['model_4']?>" /></td>
 </tr>
 <tr>
  <td>DS</td>
  <td>Duct Smoke Detector</td>
  <td><input type="text" name="type_5" value="<?=$documentInfo['type_5']?>" /></td>
  <td><input type="text" name="model_5" value="<?=$documentInfo['model_5']?>" /></td>
 </tr>
 <tr>
  <td>--</td>
  <td>Other type of Detector</td>
  <td><input type="text" name="type_6" value="<?=$documentInfo['type_6']?>" /></td>
  <td><input type="text" name="model_6" value="<?=$documentInfo['model_6']?>" /></td>
 </tr>
 <tr>
  <td>SFD</td>
  <td>Supporting Field Device (Monitor)</td>
  <td><input type="text" name="type_7" value="<?=$documentInfo['type_7']?>" /></td>
  <td><input type="text" name="model_7" value="<?=$documentInfo['model_7']?>" /></td>
 </tr>
  <tr>
  <td>FS</td>
  <td>Sprinkler Flow Switch</td>
  <td><input type="text" name="type_20" value="<?=$documentInfo['type_20']?>" /></td>
  <td><input type="text" name="model_20" value="<?=$documentInfo['model_20']?>" /></td>
 </tr>
 <tr>
  <td>SS</td>
  <td>Sprinkler Supervisory Device</td>
  <td><input type="text" name="type_8" value="<?=$documentInfo['type_8']?>" /></td>
  <td><input type="text" name="model_8" value="<?=$documentInfo['model_8']?>" /></td>
 </tr>
 <tr>
  <td>--</td>
  <td>Other Supervisory Devices (low pressure, low water,low temp,power loss etc.)</td>
  <td><input type="text" name="type_9" value="<?=$documentInfo['type_9']?>" /></td>
  <td><input type="text" name="model_9" value="<?=$documentInfo['model_9']?>" /></td>
 </tr>
 <tr>
  <td>EM</td>
  <td>Fault Isolation Module</td>
  <td><input type="text" name="type_10" value="<?=$documentInfo['type_10']?>" /></td>
  <td><input type="text" name="model_10" value="<?=$documentInfo['model_10']?>" /></td>
 </tr>
 <tr>
  <td>B</td>
  <td>Bell</td>
  <td><input type="text" name="type_11" value="<?=$documentInfo['type_11']?>" /></td>
  <td><input type="text" name="model_11" value="<?=$documentInfo['model_11']?>" /></td>
 </tr>
 <tr>
  <td>H</td>
  <td>Horn</td>
  <td><input type="text" name="type_12" value="<?=$documentInfo['type_12']?>" /></td>
  <td><input type="text" name="model_12" value="<?=$documentInfo['model_12']?>" /></td>
 </tr> 
 <tr>
  <td>V</td>
  <td>Visible Signal Device</td>
  <td><input type="text" name="type_13" value="<?=$documentInfo['type_13']?>" /></td>
  <td><input type="text" name="model_13" value="<?=$documentInfo['model_13']?>" /></td>
 </tr>
 <tr>
  <td>SP</td>
  <td>Cone Type Speaker</td>
  <td><input type="text" name="type_14" value="<?=$documentInfo['type_14']?>" /></td>
  <td><input type="text" name="model_14" value="<?=$documentInfo['model_14']?>" /></td>
 </tr>
 <tr>
  <td>HSP</td>
  <td>Horn Type Speaker</td>
  <td><input type="text" name="type_15" value="<?=$documentInfo['type_15']?>" /></td>
  <td><input type="text" name="model_15" value="<?=$documentInfo['model_15']?>" /></td>
 </tr>
 <tr>
  <td>AD</td>
  <td>Ancillary Device</td>
  <td><input type="text" name="type_16" value="<?=$documentInfo['type_16']?>" /></td>
  <td><input type="text" name="model_16" value="<?=$documentInfo['model_16']?>" /></td>
 </tr>
 <tr>
  <td>ET</td>
  <td>Emergency Telephone</td>
  <td><input type="text" name="type_17" value="<?=$documentInfo['type_17']?>" /></td>
  <td><input type="text" name="model_17" value="<?=$documentInfo['model_17']?>" /></td>
 </tr>
 <tr>
  <td>EOL</td>
  <td>End of Line Resistor</td>
  <td><input type="text" name="type_18" value="<?=$documentInfo['type_18']?>" /></td>
  <td><input type="text" name="model_18" value="<?=$documentInfo['model_18']?>" /></td>
 </tr>   
</table>
<br />

<h3>E3.2 Device Record - S536-04</h3>
<?php
$temp_id = md5(time());
if ($_REQUEST['existing_id']) {
    $devices = $document->getData('document_data_9_device','document_id',$_REQUEST['existing_id'],true);
    document::copyDevices($devices, $temp_id);
    $id = null;
} else {
    $id = $_REQUEST['id'];
}
?>
<input type="hidden" name="device_temp_id" value="<?=$temp_id;?>" />
<iframe src="device_records.php?id=<?=$id?>&temp_id=<?=$temp_id;?>" width="100%" height="400">
  <p>Your browser does not support iframes.</p>
</iframe>