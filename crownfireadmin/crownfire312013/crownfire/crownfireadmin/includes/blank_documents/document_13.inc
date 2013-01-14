<?php
$form_count = 30;
$users = new users();
$techs = $users->getUsers('techs');
$document_states 	= document::getDocumentStates();

// This one is a bit different.  I got lazy.
$fields = array();
$fields = array('building_address' 		=> 'Building Address',
				'information_date'		=> 'Date of Information',
				'manufacturer_name'		=> 'C1. MANUFACTURER NAME AND MODEL NUMBER',
				'system_operation'		=> 'C2. SYSTEM OPERATION (zoned, non zoned, single or two stage) - supervised circuits',
				'location_control'		=> 'C3. LOCATION OF CONTROL UNIT OR TRANSPONDERS, DISPLAY AND CONTROL CENTERS,ANNUNCIATORS, AND REMOTE TROUBLE SIGNAL UNITS.',
				'description'			=> 'C4. DESCRIPTION OF DEGRADED MODE CAPABILITY OPERATION, IF APPLICABLE',
				'sequence'				=> 'C5. SEQUENCE OF OPERATION, INCLUDING, BUT NOT LIMITED TO THE FOLLOWING BRIEFLY DESCRIBED',
				'general_description'	=> 'C6. GENERAL DESCRIPTION OF LOCATION OF DEVICES CONNECTED TO CONTROL UNIT OR TRANSPONDER.',
				'voice_communication'	=> 'C7. VOICE COMMUNICATION SYSTEM AND OPERATION.',
				'emergency_telephone'	=> 'C8. EMERGENCY TELEPHONE EQUIPMENT AND OPERATION.',
				'emergency_power'		=> 'C9. EMERGENCY POWER SUPPLY (IE. BATTERIES IN ONE CENTRAL LOCATION OR DISTRIBUTED IN CONTROL UNITS OR TRANSPONDERS, EMERGENCY GENERATOR OR A COMBINATION OF BOTH) - DISTRIBUTION OF BATTERY TYPE, CHARGING PROCEDURE AND MAINTENANCE.',
				'system_battery'		=> 'C10. SYSTEM BATTERY LOAD CALCULATIONS');

$questions = array('sequence' 		 		=> 1,
				   'general_description' 	=> 2,
				   'system_battery' 		=> 3);

if ($validate->is_error()) {
	$documentInfo = $validate->get_error_data();
} else {
	if ($_REQUEST['id']) {
		$documentInfo = $document->getData('document_data_13_data','document_id',$_REQUEST['id']);
	}
}

foreach($fields as $field_name => $title) {
	?>
	<b><?=$title?></b><br />
	<textarea name="<?=$field_name?>" style="width: 800px; height:150px;"><?=$documentInfo[$field_name]?></textarea>
	<br /><br />
	<?php
	if (!empty($questions[$field_name])) {
		display::displayQuestionsByTypeId($_REQUEST['type_id'], $questions[$field_name], array(1 => 'Yes', 0 => 'No', 'n/a' => 'N/A'), false, 'letters', false);
	}
	?>
	<br />
	<?php
	$keys[] = $field_name;
}
?>

<input type="hidden" name="saveFields" value="<?=implode(',',$keys);?>" />