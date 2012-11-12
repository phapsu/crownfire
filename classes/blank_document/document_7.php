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

$documentInfo = $documentObj->getData('document_data_7_head', 'document_id', $document_id);
                $switchInfo = $documentObj->getData('document_data_7_switches', 'document_id', $document_id);
                $reportInfo = $documentObj->getData('document_data_7_report', 'document_id', $document_id);
                $componentInfo = document::getDataSimple('component_options');
                $componentOptions = document::getDataSimple('document_data_7_component');

                $html .= '<table style="font-size: 30px;" cellpadding="0" cellspacing="5" width="100%">
						 <tr>
						  <td width="25%">Inspection Date:</td>
						  <td>' . $documentInfo['inspection_date'] . '</td>
						 </tr>
						 <tr>
						  <td>Technician:</td>
						  <td>' . $documentInfo['technician'] . '</td>
						 </tr>
						 <tr>
						  <td>Job Name:</td>
						  <td>' . $documentInfo['job_name'] . '</td>
						 </tr>
						  <tr>
						  <td>Job Address:</td>
						  <td>' . $documentInfo['job_address'] . '</td>
						 </tr>
						 <tr>
						  <td>Site Contact:</td>
						  <td>' . $documentInfo['site_contact'] . '</td>
						 </tr>
						</table>';

                // Our questions/answers
                $html .= self::getQuestionsHTML($document_id, $typeID);

                $html .= '<br /><font size="10"><b>Valve Info</b></font><br />
						<table style="font-size: 30px;" cellpadding="0" width="100%">
						 <tr align="center" bgcolor="#000000" style="color: #fff; font-weight: bold;">
						  <td width="16%">Type of Valve</td>
						  <td width="16%">Make of Valve</td>
						  <td width="16%">Valve Model</td>
						  <td width="16%">Year</td>
						  <td width="16%">System #</td>
						  <td width="16%">Serial Number</td>
						 </tr>
						 <tr align="center">
						  <td>' . $documentInfo['valve_type'] . '</td>
						  <td>' . $documentInfo['valve_make'] . '</td>
						  <td>' . $documentInfo['valve_model'] . '</td>
						  <td>' . $documentInfo['valve_year'] . '</td>
						  <td>' . $documentInfo['valve_system'] . '</td>
						  <td>' . $documentInfo['valve_serial'] . '</td>
						 </tr>
						</table>';

                if (is_array($componentInfo) && is_array($componentOptions)) {
                    // Fetch our options (if any)

                    $html .= '<br /><font size="10"><b>System Components</b></font><br />
								<table border="1" style="font-size: 30px; border: 1px solid #000000;" cellpadding="5" width="100%">
								 <tr align="center" bgcolor="#000000" style="color: #fff; font-weight: bold;">
								  <td>System Component</td>
								  <td>OK</td>
								  <td>Needs Work</td>
								  <td>N/A</td>
								 </tr>';
                    foreach ($componentInfo as $key => $valueArray) {
                        $html .= '<tr align="center">
						  		  <td align="left">' . $valueArray['component_option'] . '</td>';
                        $checked = false;
                        for ($i = 1; $i <= 3; $i++) {
                            $html .= '<td>';
                            if (($i == $componentOptions[$valueArray['id']]['option_value'] || ($i == 3 && $checked == false)) && $blank == false) {
                                $html .= '<img src="' . $cfg['site_url'] . '/images/red_checkmark.gif" width="8" height="8" />';
                                $checked = true;
                            }
                            $html .= '</td>';
                        }
                        $html .= '</tr>';
                    }
                    $html .= '</table><br />';
                }

                $html .= '<font size="10"><b>Make &amp; Model Switches</b></font><br />
						<table style="font-size: 30px; border: 1px solid #000000;" cellpadding="0" cellspacing="5" width="100%">
						 <tr>
						  <td><b>Pressure Switches:</b></td>
						  <td>' . $switchInfo['pressure_switches'] . '</td>
						 </tr>
						 <tr>
						  <td><b>Flow Switches:</b></td>
						  <td>' . $switchInfo['flow_switches'] . '</td>
						 </tr>
						 <tr>
						  <td><b>Supervistory Switches:</b></td>
						  <td>' . $switchInfo['supervistory_switches'] . '</td>
						 </tr>
						</table><br />

						<font size="10"><b>Flow Test Report</b></font><br />
						<table style="font-size: 30px; border: 1px solid #000000;" cellpadding="0" cellspacing="5" width="100%">
						 <tr>
						  <td width="25%"><b>City Pressure PSI:</b></td>
						  <td>' . $reportInfo['city_pressure'] . '</td>
						  <td width="25%"><b>System Static Pressure PSI:</b></td>
						  <td>' . $reportInfo['system_pressure'] . '</td>
						 </tr>
						 <tr>
						  <td width="25%"><b>Air Pressure PSI:</b></td>
						  <td>' . $reportInfo['air_pressure'] . '</td>
						  <td width="25%"><b>Flow Residual Pressure PSI:</b></td>
						  <td>' . $reportInfo['flow_pressure'] . '</td>
						 </tr>
						</table><br />

						<font size="10"><b>Time &amp; Trip Test Report</b><br />

						<table style="font-size: 30px; border: 1px solid #000000;" cellpadding="0" cellspacing="5" width="100%">
						 <tr>
						  <td width="25%"><b>Trip Pressure PSI:</b></td>
						  <td>' . $reportInfo['trip_pressure'] . '</td>
						  <td width="25%"><b>Trip Time:</b></td>
						  <td>' . $reportInfo['trip_time_min'] . ' min. ' . $reportInfo['trip_time_sec'] . ' sec.</td>
						 </tr>
						 <tr>
						  <td width="25%"><b>Inspectors Test Time:</b></td>
						  <td>' . $reportInfo['test_time_min'] . ' min. ' . $reportInfo['test_time_sec'] . ' sec</td>
						  <td width="25%"><b>Trip Time (Q.O.D.):</b></td>
						  <td>' . $reportInfo['trip_time_qod_min'] . ' min. ' . $reportInfo['trip_time_qod_sec'] . ' sec</td>
						 </tr>
						</table><br />

						<font size="10"><b>Comments</b></font><br />
						' . $documentInfo['comments'] . '<br /><br />';