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

$documentInfo = $documentObj->getData('document_data_9_head', 'document_id', $document_id);
                $documentInfo = array_merge($documentInfo, $documentObj->getData('document_data_9_e_2_1', 'document_id', $document_id));
                $documentInfo = array_merge($documentInfo, $documentObj->getData('document_data_9_e_2_3', 'document_id', $document_id));
                $documentInfo = array_merge($documentInfo, $documentObj->getData('document_data_9_e_2_4', 'document_id', $document_id));
                $documentInfo = array_merge($documentInfo, $documentObj->getData('document_data_9_e_2_5', 'document_id', $document_id));
                $documentInfo = array_merge($documentInfo, $documentObj->getData('document_data_9_e_2_6', 'document_id', $document_id));
                $documentInfo = array_merge($documentInfo, $documentObj->getData('document_data_9_e_2_7', 'document_id', $document_id));
                $documentInfo = array_merge($documentInfo, $documentObj->getData('document_data_9_e_2_8', 'document_id', $document_id));
                $documentInfo = array_merge($documentInfo, $documentObj->getData('document_data_9_e_2_9', 'document_id', $document_id));
                $documentInfo = array_merge($documentInfo, $documentObj->getData('document_data_9_e_2_10', 'document_id', $document_id));
                $documentInfo = array_merge($documentInfo, $documentObj->getData('document_data_9_e_2_11', 'document_id', $document_id));
                $documentInfo = array_merge($documentInfo, $documentObj->getData('document_data_9_e_3_1', 'document_id', $document_id));
                $formInfo = $documentObj->getData('document_data_9_device', 'document_id', $document_id, true);
//echo '<pre>';print_r($documentInfo);echo '</pre>';exit;
                $notes_array = array(
                    1 => 'Smoke detector sensitivity confirmation or measurement should be recorded in the remarks column',
                    2 => 'Smoke detector cleaning or replacement date should also be recorded in the remarks column',
                    3 => 'Status Change, including time delay, should be recorded in the remarks column',
                    4 => 'Duct smoke detector pressure differential should be confirmed and recorded in the remarks column',
                    5 => 'Time delay setting of water flow switch should be recorded in the remarks column',
                    6 => 'Sprinkler supervisory switches cause trouble condition to be annunciated but not an alarm condition',
                    7 => 'Upper and lower pressure setting of supervisory devices should be recorded in the remarks column',
                    8 => 'Low temperature setting should be recorded in the remarks column',
                    9 => 'Identify the specific ancillary devices in the remarks column',
                    10 => 'Identify date field device changed in the remarks column',
                    11 => 'Identify correct field device operation (e.g, alarm, trouble, supervisory, annunciation indication',
                    12 => 'Identify zone, circuit number or address',
                    13 => 'Identify conventional field device locations',
                    14 => 'Identify active field device and supporting field device, data communication link (DCL), address and location',
                    15 => 'Test and confirm conventional field device supervision of wiring',
                    16 => 'Confirm field device free of damage',
                    17 => 'Confirm field device free of foreign substance (e.g. paint)',
                    18 => 'Confirm field device mechanically supported independently of the wiring',
                    19 => 'Confirm field device protective dust shield of covers removed');

                $html .= '<font size="10"><b>E1. Fire Alarm System Annual Test and Inspection Report - CAN/ULC S536-04</b></font><br /><br />';
                $header = '<table style="font-size: 30px; border: 1px solid #000000;" cellpadding="5" width="100%">
						 <tr>
						  <td width="30%"><b>Building Name:</b></td>
						  <td width="70%">' . $documentInfo['building_name'] . '</td>
						 </tr>
						 <tr>
						  <td width="30%"><b>Address:</b></td>
						  <td width="70%">' . $documentInfo['address'] . '</td>
						 </tr>
						 <tr>
						  <td width="30%"><b>Date:</b></td>
						  <td width="70%">' . $documentInfo['date'] . '</td>
						 </tr>
						 <tr>
						  <td width="30%"><b>System Manufacturer:</b></td>
						  <td width="70%">' . $documentInfo['system_manufacturer'] . '</td>
						 </tr>
						 <tr>
						  <td width="30%"><b>Model Number:</b></td>
						  <td width="70%">' . $documentInfo['model_number'] . '</td>
						 </tr>
						</table><br /><br />';
                $html .= $header;
                $html .= self::getQuestionsHTML($document_id, $typeID, 1, array(1 => 'Yes', 0 => 'No', 'N/A' => 'N/A'), false);

                $html .= '<br /><b>Comments</b>: ' . $documentInfo['comments'];

                $html .= '<br /> <br /><table style="font-size: 30px;" cellpadding="0" cellspacing="5" width="100%">
							 <tr>
							  <td width="35%" align="left" style="border-bottom:0.5px solid #000;">' . $documentInfo['primary_technician'] . '</td>
							  <td width="20%" align="left" style="border-bottom:0.5px solid #000;">' . $documentInfo['primary_company'] . '</td>
							  <td width="20%" align="left" style="border-bottom:0.5px solid #000;">' . $documentInfo['primary_telephone'] . '</td>
							  <td width="25%" align="left" style="border-bottom:0.5px solid #000;">' . $documentInfo['primary_identification'] . '</td>
							 </tr>
							 <tr align="left" style="font-size: 12px;">
							  <td width="35%">Printed Name of Primary or Supervising<br />Technition Conducting the Test and Inspection</td>
							  <td width="20%">Company</td>
							  <td width="20%">Telephone</td>
							  <td width="25%">CFAA Identification Number</td>
							 </tr>
							 <tr>
							  <td width="35%" align="left" style="border-bottom:0.5px solid #000;">' . $documentInfo['technician'] . '</td>
							  <td width="20%" align="left" style="border-bottom:0.5px solid #000;">' . $documentInfo['company'] . '</td>
							  <td width="20%" align="left" style="border-bottom:0.5px solid #000;">' . $documentInfo['telephone'] . '</td>
							  <td width="25%" align="left" style="border-bottom:0.5px solid #000;">' . $documentInfo['identification'] . '</td>
							 </tr>
							 <tr align="left" style="font-size: 12px;">
							  <td width="35%">Printed Name of Primary or Supervising<br />Technition Conducting the Test and Inspection</td>
							  <td width="20%">Company</td>
							  <td width="20%">Telephone</td>
							  <td width="25%">CFAA Identification Number</td>
							 </tr>
						  </table>
						  <br /><br />';

                $html .= '<br pagebreak="true"/>';
                $html .= $header;
                $html .= '<font size="10"><b>E2.1 Control Unit or Transponder Test - CAN/ULC S536-04</b></font><br /><br />
							<table style="font-size: 30px; border: 1px solid #000000;" cellpadding="5" width="100%">
							 <tr>
							  <td width="40%"><b>Control unit or transponder location:</b></td>
							  <td width="60%">' . $documentInfo['e21_transponder_location'] . '</td>
							 </tr>
							 <tr>
							  <td width="40%"><b>Control unit or transponder identification:</b></td>
							  <td width="60%">' . $documentInfo['e21_identification'] . '</td>
							 </tr>
							</table>';

                $html .= self::getQuestionsHTML($document_id, $typeID, 2, array(1 => 'Yes', 0 => 'No', 'N/A' => 'N/A'), false);

                $html .= '<br pagebreak="true"/>';
                $html .= $header;
                $html .= '<font size="10"><b>E2.2 Voice Communication Test - CAN/ULC S536-04</b></font><br />';

                $html .= self::getQuestionsHTML($document_id, $typeID, 3, array(1 => 'Yes', 0 => 'No', 'N/A' => 'N/A'), false);

                $html .= '<br pagebreak="true"/>';
                $html .= $header;
                $html .= '<font size="10"><b>E2.3 Control Unit or Transponder Inspection - CAN/ULC S536-04</b></font><br /><br />
							<table style="font-size: 30px; border: 1px solid #000000;" cellpadding="5" width="100%">
							 <tr>
							  <td width="40%">Control unit or transponder location:</td>
							  <td width="60%">' . $documentInfo['e23_transponder_location'] . '</td>
							 </tr>
							 <tr>
							  <td width="40%">Control unit or transponder identification:</td>
							  <td width="60%">' . $documentInfo['e23_address'] . '</td>
							 </tr>
							</table>';

                $html .= self::getQuestionsHTML($document_id, $typeID, 4, array(1 => 'Yes', 0 => 'No', 'N/A' => 'N/A'), false);

                $html .= '<br pagebreak="true"/>';
                $html .= $header;
                $html .= '<font size="10"><b>E2.4 Power Supply Inspection - CAN/ULC S536-04</b></font><br /><br />
							<table style="font-size: 30px; border: 1px solid #000000;" width="100%" cellpadding="5">
							 <tr>
							  <td width="40%">Control unit or transponder location:</td>
							  <td width="60%">' . $documentInfo['e24_transponder_location'] . '</td>
							 </tr>
							 <tr>
							  <td width="40%">Control unit or transponder identification:</td>
							  <td width="60%">' . $documentInfo['e24_transponder_identification'] . '</td>
							 </tr>
							</table>';
                $html .= self::getQuestionsHTML($document_id, $typeID, 5, array(1 => 'Yes', 0 => 'No', 'N/A' => 'N/A'), false);

                $html .= '<br pagebreak="true"/>';
                $html .= $header;
                $html .= '<font size="10"><b>E2.5 Emergency Power Supply Test and Inspection - CAN/ULC S536-04</b></font><br /><br />
							<table style="font-size: 30px;" cellpadding="0" cellspacing="5" width="100%">
							 <tr>
							  <td width="40%">Control unit or transponder location:</td>
							  <td width="60%">' . $documentInfo['e25_transponder_location'] . '</td>
							 </tr>
							 <tr>
							  <td width="40%">Control unit or transponder identification:</td>
							  <td width="60%">' . $documentInfo['e25_transponder_identification'] . '</td>
							 </tr>
							</table>';

                $html .= self::getQuestionsHTML($document_id, $typeID, 6, array(1 => 'Yes', 0 => 'No', 'N/A' => 'N/A'), false);
                $html .= '<br pagebreak="true"/>';

                if (!empty($documentInfo['e25_transponder_location_2'])) {
                    $html .= $header;
                    $html .= '<font size="10"><b>E2.5 (B) Emergency Power Supply Test and Inspection - CAN/ULC S536-04</b></font><br /><br />
							<table style="font-size: 30px;" cellpadding="0" cellspacing="5" width="100%">
							 <tr>
							  <td width="40%">Control unit or transponder location:</td>
							  <td width="60%">' . $documentInfo['e25_transponder_location_2'] . '</td>
							 </tr>
							 <tr>
							  <td width="40%">Control unit or transponder identification:</td>
							  <td width="60%">' . $documentInfo['e25_transponder_identification_2'] . '</td>
							 </tr>
							</table>';

                    $html .= self::getQuestionsHTML($document_id, $typeID, 15, array(1 => 'Yes', 0 => 'No', 'N/A' => 'N/A'), false);
                    $html .= '<br pagebreak="true"/>';
                }

                if (!empty($documentInfo['e25_transponder_location_3'])) {
                    $html .= $header;
                    $html .= '<font size="10"><b>E2.5 (C) Emergency Power Supply Test and Inspection - CAN/ULC S536-04</b></font><br /><br />
							<table style="font-size: 30px;" cellpadding="0" cellspacing="5" width="100%">
							 <tr>
							  <td width="40%">Control unit or transponder location:</td>
							  <td width="60%">' . $documentInfo['e25_transponder_location_3'] . '</td>
							 </tr>
							 <tr>
							  <td width="40%">Control unit or transponder identification:</td>
							  <td width="60%">' . $documentInfo['e25_transponder_identification_3'] . '</td>
							 </tr>
							</table>';

                    $html .= self::getQuestionsHTML($document_id, $typeID, 16, array(1 => 'Yes', 0 => 'No', 'N/A' => 'N/A'), false);
                    $html .= '<br pagebreak="true"/>';
                }

                if (!empty($documentInfo['e25_transponder_location_4'])) {
                    $html .= $header;
                    $html .= '<font size="10"><b>E2.5 (D) Emergency Power Supply Test and Inspection - CAN/ULC S536-04</b></font><br /><br />
							<table style="font-size: 30px;" cellpadding="0" cellspacing="5" width="100%">
							 <tr>
							  <td width="40%">Control unit or transponder location:</td>
							  <td width="60%">' . $documentInfo['e25_transponder_location_4'] . '</td>
							 </tr>
							 <tr>
							  <td width="40%">Control unit or transponder identification:</td>
							  <td width="60%">' . $documentInfo['e25_transponder_identification_4'] . '</td>
							 </tr>
							</table>';

                    $html .= self::getQuestionsHTML($document_id, $typeID, 17, array(1 => 'Yes', 0 => 'No', 'N/A' => 'N/A'), false);
                    $html .= '<br pagebreak="true"/>';
                }


                $html .= $header;
                $html .= '<font size="10"><b>E2.6 Annunciator and Remote Trouble Signal Unit Test and Inspection - CAN/ULC S536-04</b></font><br /><br />
							<table style="font-size: 30px; border: 1px solid #000000;" width="100%" cellpadding="5">
							 <tr>
							  <td width="40%">Annunciator or remote trouble signal unit location:</td>
							  <td width="60%">' . $documentInfo['e26_annunciator_location'] . '</td>
							 </tr>
							 <tr>
							  <td width="40%">Annunciator or remote trouble signal unit identification:</td>
							  <td width="60%">' . $documentInfo['e26_annunciator_identification'] . '</td>
							 </tr>
							</table>';

                $html .= self::getQuestionsHTML($document_id, $typeID, 9, array(1 => 'Yes', 0 => 'No', 'N/A' => 'N/A'), false);

                $html .= '<br pagebreak="true"/>';
                $html .= $header;
                $html .= '<font size="10"><b>E2.7 Annunciator or Sequential Displays - CAN/ULC S536-04</b></font><br /><br />
							<table style="font-size: 30px; border: 1px solid #000000;" width="100%" cellpadding="5">
							 <tr>
							  <td width="40%">Annunciator or remote trouble signal unit location:</td>
							  <td width="60%">' . $documentInfo['e27_annunciator_location'] . '</td>
							 </tr>
							 <tr>
							  <td width="40%">Annunciator or remote trouble signal unit identification:</td>
							  <td width="60%">' . $documentInfo['e27_annunciator_identification'] . '</td>
							 </tr>
							</table>';

                $html .= self::getQuestionsHTML($document_id, $typeID, 9, array(1 => 'Yes', 0 => 'No', 'N/A' => 'N/A'), false);

                $html .= '<br pagebreak="true"/>';
                $html .= $header;
                $html .= '<font size="10"><b>E2.8 Remote Trouble Signal Unit Test and Inspection - CAN/ULC S536-04</b></font><br /><br />
							<table style="font-size: 30px; border: 1px solid #000000;" width="100%" cellpadding="5">
							 <tr>
							  <td width="40%">Remote trouble signal unit location:</td>
							  <td width="60%">' . $documentInfo['e28_remote_location'] . '</td>
							 </tr>
							 <tr>
							  <td width="40%">Remote trouble signal unit identification:</td>
							  <td width="60%">' . $documentInfo['e28_remote_identification'] . '</td>
							 </tr>
							</table>';

                $html .= self::getQuestionsHTML($document_id, $typeID, 11, array(1 => 'Yes', 0 => 'No', 'N/A' => 'N/A'), false);

                $html .= '<br pagebreak="true"/>';
                $html .= $header;
                $html .= '<font size="10"><b>E2.9 Printer Test - CAN/ULC S536-04</b></font><br /><br />
							<table style="font-size: 30px; border: 1px solid #000000;" width="100%" cellpadding="5">
							 <tr>
							  <td width="40%">Printer location:</td>
							  <td width="60%">' . $documentInfo['e29_printer_location'] . '</td>
							 </tr>
							 <tr>
							  <td width="40%">Printer identification:</td>
							  <td width="60%">' . $documentInfo['e29_printer_identification'] . '</td>
							 </tr>
							</table>';

                $html .= self::getQuestionsHTML($document_id, $typeID, 12, array(1 => 'Yes', 0 => 'No', 'N/A' => 'N/A'), false);

                $html .= '<br pagebreak="true"/>';
                $html .= $header;
                $html .= '<font size="10"><b>E2.10 Communication Link Test - CAN/ULC S536-04</b></font><br /><br />
							<table style="font-size: 30px; border: 1px solid #000000;" width="100%" cellpadding="5">
							 <tr>
							  <td width="40%">Control unit or transponder location:</td>
							  <td width="60%">' . $documentInfo['e210_transponder_location'] . '</td>
							 </tr>
							 <tr>
							  <td width="40%">Control unit or transponder identification:</td>
							  <td width="60%">' . $documentInfo['e210_transponder_identification'] . '</td>
							 </tr>
							 <tr>
							  <td width="40%">Data communication link identification:</td>
							  <td width="60%">' . $documentInfo['e210_data_identification'] . '</td>
							 </tr>
							</table>';
                $html .= self::getQuestionsHTML($document_id, $typeID, 13, array(1 => 'Yes', 0 => 'No', 'N/A' => 'N/A'), false);

                $html .= '<br pagebreak="true"/>';
                $html .= $header;
                $html .= '<font size="10"><b>E2.11 Ancillary Device Circuit Test - CAN/ULC S536-04</b></font><br /><br />
							<table style="font-size: 25px; border: 1px solid #000;" cellpadding="3" cellspacing="0" width="100%" border="1">
							 <tr bgcolor="#000000">
							  <td colspan="2" style="color: #ffffff;">Record Specific Type of Ancillary Circuit</td>
							 </tr>
							 <tr>
							  <td>' . $documentInfo['record_1'] . '</td>
							  <td>' . $documentInfo['record_1_option'] . '</td>
							 </tr>
							 <tr>
							  <td>' . $documentInfo['record_2'] . '</td>
							  <td>' . $documentInfo['record_2_option'] . '</td>
							 </tr>
							 <tr>
							  <td>' . $documentInfo['record_3'] . '</td>
							  <td>' . $documentInfo['record_3_option'] . '</td>
							 </tr>
							</table>
							<br />
							<font size="5">Note: The tests reported on this Form do not include the actual operational test of acillary devices</font>';

                $html .= '<br pagebreak="true"/>';
                $html .= $header;
                $html .= '<font size="10"><b>E2.12 Remarks - CAN/ULC S536-04</b></font><br /><br />';

                $html .= $documentInfo['remarks_e12'];

                $html .= '<br pagebreak="true"/>';
                $html .= $header;
                $html .= '<font size="10"><b>E3.1 Field Device Testing - Legend and Notes - CAN/ULC S536-04</b></font><br /><br />
							<table style="font-size: 25px; border: 1px solid #000;" cellpadding="3" cellspacing="0" width="100%" border="1">
							 <tr bgcolor="#000000" style="font-weight: bold; color: #ffffff;" align="center">
							  <td width="10%">Device</td>
							  <td width="30%">Description</td>
							  <td width="30%">Type</td>
							  <td width="30%">Model No</td>
							 </tr>
							 <tr>
							  <td width="10%">M</td>
							  <td width="30%">Manual Pull Station</td>
							  <td width="30%" align="center">' . $documentInfo['type_1'] . '</td>
							  <td width="30%" align="center">' . $documentInfo['model_1'] . '</td>
							 </tr>
							 <tr>
							  <td width="10%">RHT</td>
							  <td width="30%">Heat Detector, Restorable</td>
							  <td width="30%" align="center">' . $documentInfo['type_2'] . '</td>
							  <td width="30%" align="center">' . $documentInfo['model_2'] . '</td>
							 </tr>
							  <tr>
							  <td width="10%">HT</td>
							  <td width="30%" align="center">Heat Detector, Non-restoreable</td>
							  <td width="30%" align="center">' . $documentInfo['type_19'] . '</td>
							  <td width="30%" align="center">' . $documentInfo['model_19'] . '</td>
							 </tr>
							 <tr valign="top">
							  <td>S</td>
							  <td>
							  	Smoke Detector
							  	<br /><br />
							  	Sensitivity test method or test equiptment:<br />
							  	Model/Method: ' . $documentInfo['model_method'] . '
							  	<br /><br />
							  	Manufacturer Sensitivity Range:<br />
							  	Sensitivity Range: ' . $documentInfo['range_2'] . '
							  </td>
							  <td width="30%" align="center">N/A<br />' . $documentInfo['na_value1'] . '</td>
							  <td width="30%" align="center">N/A<br />' . $documentInfo['na_value2'] . '</td>
							 </tr>
							 <tr>
							  <td width="10%">RI</td>
							  <td width="30%">Remote Indicator Unit</td>
							  <td width="30%" align="center">' . $documentInfo['type_4'] . '</td>
							  <td width="30%" align="center">' . $documentInfo['model_4'] . '</td>
							 </tr>
							 <tr>
							  <td width="10%">DS</td>
							  <td width="30%">Duct Smoke Detector</td>
							  <td width="30%" align="center">' . $documentInfo['type_5'] . '</td>
							  <td width="30%" align="center">' . $documentInfo['model_5'] . '</td>
							 </tr>
							 <tr>
							  <td width="10%">--</td>
							  <td width="30%">Other type of Detector</td>
							  <td width="30%" align="center">' . $documentInfo['type_6'] . '</td>
							  <td width="30%" align="center">' . $documentInfo['model_6'] . '</td>
							 </tr>
							 <tr>
							  <td width="10%">SFD</td>
							  <td width="30%">Supporting Field Device</td>
							  <td width="30%" align="center">' . $documentInfo['type_7'] . '</td>
							  <td width="30%" align="center">' . $documentInfo['model_7'] . '</td>
							 </tr>
							 <tr>
							  <td width="10%">FS</td>
							  <td width="30%">Sprinkler Flow Switch</td>
							  <td width="30%" align="center">' . $documentInfo['type_20'] . '</td>
							  <td width="30%" align="center">' . $documentInfo['model_20'] . '</td>
							 </tr>
							 <tr>
							  <td width="10%">SS</td>
							  <td>Sprinkler Supervisory Device</td>
							  <td width="30%" align="center">' . $documentInfo['type_8'] . '</td>
							  <td width="30%" align="center">' . $documentInfo['model_8'] . '</td>
							 </tr>
							 <tr>
							  <td width="10%">--</td>
							  <td width="30%">Other Supervisory Devices (low pressure, low water,low temp,power loss etc.)</td>
							  <td width="30%" align="center">' . $documentInfo['type_9'] . '</td>
							  <td width="30%" align="center">' . $documentInfo['model_9'] . '</td>
							 </tr>
							 <tr>
							  <td width="10%">EM</td>
							  <td width="30%">Fault Isolation Module</td>
							  <td width="30%" align="center">' . $documentInfo['type_10'] . '</td>
							  <td width="30%" align="center">' . $documentInfo['model_10'] . '</td>
							 </tr>
							 <tr>
							  <td width="10%">B</td>
							  <td width="30%">Bell</td>
							  <td width="30%" align="center">' . $documentInfo['type_11'] . '</td>
							  <td width="30%" align="center">' . $documentInfo['model_11'] . '</td>
							 </tr>
							 <tr>
							  <td width="10%">H</td>
							  <td width="30%">Horn</td>
							  <td width="30%" align="center">' . $documentInfo['type_12'] . '</td>
							  <td width="30%" align="center">' . $documentInfo['model_12'] . '</td>
							 </tr>
							 <tr>
							  <td width="10%">V</td>
							  <td width="30%">Visible Signal Device</td>
							  <td width="30%" align="center">' . $documentInfo['type_13'] . '</td>
							  <td width="30%" align="center">' . $documentInfo['model_13'] . '</td>
							 </tr>
							 <tr>
							  <td width="10%">SP</td>
							  <td width="30%">Cone Type Speaker</td>
							  <td width="30%" align="center">' . $documentInfo['type_14'] . '</td>
							  <td width="30%" align="center">' . $documentInfo['model_14'] . '</td>
							 </tr>
							 <tr>
							  <td width="10%">HSP</td>
							  <td width="30%">Horn Type Speaker</td>
							  <td width="30%" align="center">' . $documentInfo['type_15'] . '</td>
							  <td width="30%" align="center">' . $documentInfo['model_15'] . '</td>
							 </tr>
							 <tr>
							  <td width="10%">AD</td>
							  <td width="30%">Ancillary Device</td>
							  <td width="30%" align="center">' . $documentInfo['type_16'] . '</td>
							  <td width="30%" align="center">' . $documentInfo['model_16'] . '</td>
							 </tr>
							 <tr>
							  <td width="10%">ET</td>
							  <td width="30%">Emergency Telephone</td>
							  <td width="30%" align="center">' . $documentInfo['type_17'] . '</td>
							  <td width="30%" align="center">' . $documentInfo['model_17'] . '</td>
							 </tr>
							 <tr>
							  <td width="10%">EOL</td>
							  <td width="30%">End of Line Resistor</td>
							  <td width="30%" align="center">' . $documentInfo['type_18'] . '</td>
							  <td width="30%" align="center">' . $documentInfo['model_18'] . '</td>
							 </tr>
							</table><br />

							<font size="7"><b>The following notes apply to Appendix E3.2, Individual Device Record:</b></font><br />
							<table style="font-size: 30px;" cellpadding="0" cellspacing="5" width="100%" border="0">';
                foreach ($notes_array as $num => $note) {
                    $html .= '<tr>
										   <td width="11%"><b>Note ' . $num . '.</b></td>
										   <td width="91%">' . $note . '</td>
										  </tr>';
                }

                $html .= '</table>';
                $html .= '<br pagebreak="true"/>';
                $html .= $header;
                if (is_array($formInfo)) {
                    $html .= '<h3>E3.2 Device Record - CAN/ULC S536-04</h3>
								<table style="font-size: 25px; border: 1px solid #000;" cellpadding="3" cellspacing="0" width="100%" border="1">
								 <tr bgcolor="#000000" style="font-weight: bold; color: #ffffff;" align="center">
								  <td width="20%">Location</td>
								  <td width="10%">Device Type</td>
								  <td width="10%">Correctly Installed</td>
								  <td width="10%">Requires Service</td>
								  <td width="10%">Alarm Operation Confirmed</td>
								  <td width="10%">Annunciator Indication Confirmed</td>
								  <td width="10%">Zone Address</td>
                                                                  <td width="10%">Smoke Sensitivity</td>
								  <td width="10%">Remarks</td>
								 </tr>';
                    $printed = 0;
                    $page = 1;
                    foreach ($formInfo as $form) {
                        $printed++;
                        $html .= '<tr align="center">
								  <td width="10%">' . $form['location'] . '</td>
								  <td width="10%">' . $form['device'] . '</td>';
                        $html .= '<td width="10%">';
                        if (strtoupper($form['correctly_installed']) == 'YES') {
                            $html .= '<img src="' . $cfg['site_url'] . '/images/red_checkmark.gif" width="8" height="8" />';
                        } else {
                            $html .= ' &nbsp; ';
                        }
                        $html .= '</td>';
                        $html .= '<td width="10%">';
                        if (strtoupper($form['requires_service']) == 'YES') {
                            $html .= '<img src="' . $cfg['site_url'] . '/images/red_checkmark.gif" width="8" height="8" />';
                        } else {
                            $html .= ' &nbsp; ';
                        }
                        $html .= '</td>';
                        $html .= '<td width="15%">';
                        if (strtoupper($form['alarm']) == 'YES') {
                            $html .= '<img src="' . $cfg['site_url'] . '/images/red_checkmark.gif" width="8" height="8" />';
                        } else {
                            $html .= ' &nbsp; ';
                        }
                        $html .= '</td>';
                        $html .= '<td width="15%">';
                        if (strtoupper($form['confirmed']) == 'YES') {
                            $html .= '<img src="' . $cfg['site_url'] . '/images/red_checkmark.gif" width="8" height="8" />';
                        } else {
                            $html .= ' &nbsp; ';
                        }
                        $form['remarks'] = (!empty($form['remarks'])) ? $form['remarks'] : '&nbsp;';
                        $html .= '</td>
								  <td width="10%">' . $form['zone_address'] . '</td>
                                                                  <td width="10%">' . $form['smoke_sensitivity'] . '</td>
								  <td width="10%">' . $form['remarks'] . '</td>
								  </tr>';
                        if (25 == $printed) {
                            $printed = 0;
                            $page++;
                            $html .= '</table>';
                            $html .= '<br pagebreak="true"/>';
                            $html .= $header;
                            $html .= ' <br /> <h3>E3.2 Device Record - CAN/ULC S536-04 (Page ' . $page . ')</h3>
								<table style="font-size: 25px; border: 1px solid #000;" cellpadding="3" cellspacing="0" width="100%" border="1">
								 <tr bgcolor="#000000" style="font-weight: bold; color: #ffffff;" align="center">
								  <td width="20%">Location</td>
								  <td width="10%">Device Type</td>
								  <td width="10%">Correctly Installed</td>
								  <td width="10%">Requires Service</td>
								  <td width="10%">Alarm Operation Confirmed</td>
								  <td width="10%">Annunciator Indication Confirmed</td>
								  <td width="10%">Zone Address</td>
                                                                  <td width="10%">Smoke Sensitivity</td>
								  <td width="10%">Remarks</td>
								 </tr>';
                        }
                    }
                    $html .= '</table>';
                }
