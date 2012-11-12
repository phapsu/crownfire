<?php
//include('../blank_document.class.php');
class document_1 extends blank_document {
 
    public function show($customerInfo){
        $html = parent::tableDottedHeader($customerInfo['name']);

        $html .= '<font size="10"><b>Alarm Panel Information</b></font><br /><br />';
        $html .= '<table border="1" style="font-size: 25px; width: 100%;" cellpadding="5">';
        $html .= '<tr bgcolor="#000000" style="color: #FFFFFF;">
                                                                                <td colspan="4" width="50%">&nbsp; </td>
                                                                                <td width="25%">Alarm Circuit</td>
                                                                                <td width="25%">Supervisory Circuit</td>
                                                                          </tr>';
        for ($i = 0; $i < 20; $i++) {
            $html .= '<tr>
                                                                                   <td width="15%">Zone Name:</td>
                                                                                   <td width="15%"></td>
                                                                                   <td width="10%">Zone #:</td>
                                                                                   <td width="10%"></td>
                                                                                   <td width="25%"></td>
                                                                                   <td width="25%"></td>
                                                                                  </tr>';
        }
        $html .= '</table>';

        $html .= '<br /><br />';    
        
        return $html;
    }
}
?>
 // This one is a bit different.  I got lazy.
                $fields = array();
                $fields = array('building_address' => 'Building Address',
                    'information_date' => 'Date of Information',
                    'manufacturer_name' => 'C1. MANUFACTURER NAME AND MODEL NUMBER',
                    'system_operation' => 'C2. SYSTEM OPERATION (zoned, non zoned, single or two stage) - supervised circuits',
                    'location_control' => 'C3. LOCATION OF CONTROL UNIT OR TRANSPONDERS, DISPLAY AND CONTROL CENTERS,ANNUNCIATORS, AND REMOTE TROUBLE SIGNAL UNITS.',
                    'description' => 'C4. DESCRIPTION OF DEGRADED MODE CAPABILITY OPERATION, IF APPLICABLE',
                    'sequence' => 'C5. SEQUENCE OF OPERATION, INCLUDING, BUT NOT LIMITED TO THE FOLLOWING BRIEFLY DESCRIBED',
                    'general_description' => 'C6. GENERAL DESCRIPTION OF LOCATION OF DEVICES CONNECTED TO CONTROL UNIT OR TRANSPONDER.',
                    'voice_communication' => 'C7. VOICE COMMUNICATION SYSTEM AND OPERATION.',
                    'emergency_telephone' => 'C8. EMERGENCY TELEPHONE EQUIPMENT AND OPERATION.',
                    'emergency_power' => 'C9. EMERGENCY POWER SUPPLY (IE. BATTERIES IN ONE CENTRAL LOCATION OR DISTRIBUTED IN CONTROL UNITS OR TRANSPONDERS, EMERGENCY GENERATOR OR A COMBINATION OF BOTH) - DISTRIBUTION OF BATTERY TYPE, CHARGING PROCEDURE AND MAINTENANCE.',
                    'system_battery' => 'C10. SYSTEM BATTERY LOAD CALCULATIONS');

                $questions = array('sequence' => array(1, false),
                    'general_description' => array(2, false),
                    'system_battery' => array(3, true));
                $documentInfo = $documentObj->getData('document_data_13_data', 'document_id', $document_id);
                foreach ($fields as $field_name => $title) {
                    $html .= '<font size="8"><u><b>' . $title . '</b></u></font><br />';
                    $html .= '<font size="6">' . $documentInfo[$field_name] . '</font><br /><br />';
                    if (!empty($questions[$field_name][0])) {
                        $html .= self::getQuestionsHTML($document_id, $typeID, $questions[$field_name][0], array(1 => 'Yes', 0 => 'No', 'n/a' => 'N/A'), false, 'letters', $questions[$field_name][1]);
                        $html .= '<br />';
                    }
                }