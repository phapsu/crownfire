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
$documentInfo = $documentObj->getData('document_data_12_head', 'document_id', $document_id);
                $documentInfo = array_merge($documentInfo, $documentObj->getData('document_data_12_data', 'document_id', $document_id));
                $documentInfo = array_merge($documentInfo, $documentObj->getData('document_data_12_location', 'document_id', $document_id));

                $html .= '<table style="font-size: 25px; border: 1px solid #000000;" cellpadding="0" cellspacing="5" width="99%">
							 <tr valign="top">
							  <td width="40%">
								<table width="100%" cellpadding="5">
								 <tr>
								  <td width="40%"><b>Name:</b></td>
								  <td width="60%">' . $documentInfo['customer_name'] . '</td>
								 </tr>
								 <tr>
								  <td width="40%"><b>Address:</b></td>
								  <td width="60%">' . $documentInfo['address'] . '</td>
								 </tr>
								 <tr>
								  <td width="40%"><b>City:</b></td>
								  <td width="60%">' . $documentInfo['city'] . '</td>
								 </tr>
								 <tr>
								  <td width="40%"><b>State:</b></td>
								  <td width="60%">' . $documentInfo['state'] . '</td>
								 </tr>
								  <tr>
								  <td width="40%"><b>Zip:</b></td>
								  <td width="60%">' . $documentInfo['zip'] . '</td>
								 </tr>
								 <tr>
								  <td width="40%"><b>Telephone:</b></td>
								  <td width="60%">' . $documentInfo['telephone'] . '</td>
								 </tr>
								 <tr>
								  <td width="40%"><b>Store No.:</b></td>
								  <td width="60%">' . $documentInfo['store'] . '</td>
								 </tr>
								 <tr>
								  <td width="40%"><b>Owner or Manager:</b></td>
								  <td width="60%">' . $documentInfo['owner'] . '</td>
								 </tr>
								</table>
							  </td>
							  <td width="60%">
								<table width="100%" border="1" cellpadding="5">
								 <tr bgcolor="#000000" style="color: #ffffff;">
								  <td colspan="2">Date of Service</td>
								  <td>Time</td>
								  <td>A.M.</td>
								  <td>P.M.</td>
								 </tr>
								 <tr>
								  <td colspan="2">' . $documentInfo['date_service'] . '</td>
								  <td>' . $documentInfo['time_service'] . '</td>
								  <td>' . $documentInfo['am'] . '</td>
								  <td>' . $documentInfo['pm'] . '</td>
								 </tr>
								 <tr bgcolor="#000000" style="color: #ffffff;">
								  <td>Annual</td>
								  <td>Semi-Annual</td>
								  <td>Recharge</td>
								  <td>Installation</td>
								  <td>Renovation</td>
								 </tr>
								 <tr>
								  <td>' . $documentInfo['annual'] . '</td>
								  <td>' . $documentInfo['semi_annual'] . '</td>
								  <td>' . $documentInfo['recharge'] . '</td>
								  <td>' . $documentInfo['installation'] . '</td>
								  <td>' . $documentInfo['renovation'] . '</td>
								 </tr>
								 <tr bgcolor="#000000" style="color: #ffffff;">
								  <td colspan="4">Location of System Cynlinders</td>
								  <td>UL 300</td>
								 </tr>
								 <tr>
								  <td colspan="4">' . $documentInfo['loc_cynlinders'] . '</td>
								  <td>' . $documentInfo['ul_300'] . '</td>
								 </tr>
								 <tr bgcolor="#000000" style="color: #ffffff;">
								  <td colspan="2">Manufacturer</td>
								  <td>Model #</td>
								  <td>Wet</td>
								  <td>Dry Chemical</td>
								 </tr>
								 <tr>
								  <td colspan="2">' . $documentInfo['manufacturer'] . '</td>
								  <td>' . $documentInfo['model_number'] . '</td>
								  <td>' . $documentInfo['wet'] . '</td>
								  <td>' . $documentInfo['dry_chemical'] . '</td>
								 </tr>
								 <tr bgcolor="#000000" style="color: #ffffff;" align="center">
								  <td colspan="2">Cylinder Size Master</td>
								  <td>Cylinder Size Slave</td>
								  <td colspan="2">Cylinder Size Slave</td>
								 </tr>
								 <tr align="center">
								  <td colspan="2">' . $documentInfo['cylinder_master'] . '</td>
								  <td>' . $documentInfo['cylinder_slave'] . '</td>
								  <td colspan="2">' . $documentInfo['cylinder_slave_2'] . '</td>
								 </tr>
								 <tr bgcolor="#000000" style="color: #ffffff;">
								  <td colspan="2">Fuel Shut-Off</td>
								  <td>Electric</td>
								  <td>Gas</td>
								  <td>Size</td>
								 </tr>
								 <tr>
								  <td colspan="2">' . $documentInfo['fuel'] . '</td>
								  <td>' . $documentInfo['electric'] . '</td>
								  <td>' . $documentInfo['gas'] . '</td>
								  <td>' . $documentInfo['size'] . '</td>
								 </tr>
								 <tr bgcolor="#000000" style="color: #ffffff;" align="center">
								  <td colspan="2">Serial Number</td>
								  <td>Last Hydro Test Date</td>
								  <td colspan="2">Last Recharge Date</td>
								 </tr>
								 <tr align="center">
								  <td colspan="2">' . $documentInfo['serial_number'] . '</td>
								  <td>' . $documentInfo['last_hydro'] . '</td>
								  <td colspan="2">' . $documentInfo['last_recharge'] . '</td>
								 </tr>
								 <tr bgcolor="#000000" style="color: #ffffff;">
								  <td colspan="5">Manufacturer\'s Manual Reference</td>
								 </tr>
								 <tr>
								  <td width="33%" colspan="2">Page No.: ' . $documentInfo['page_number'] . '</td>
								  <td width="33%">Drawing No.: ' . $documentInfo['drawing_number'] . '</td>
								  <td width="33%" colspan="2">Date: ' . $documentInfo['final_date'] . '</td>
								 </tr>
								</table>
							  </td>
							 </tr>
							</table>

							<h3>Cooking Appliance Locations: Left to Right</h3>
							<table style="font-size: 30px; border: 1px solid #000000;" cellpadding="5" cellspacing="0" width="99%" border="1">
							 <tr align="center">
							  <td width="25%">' . $documentInfo['appliance1'] . '</td>
							  <td width="25%">' . $documentInfo['appliance2'] . '</td>
							  <td width="25%">' . $documentInfo['appliance3'] . '</td>
							  <td width="25%">' . $documentInfo['appliance4'] . '</td>
							 </tr>
							  <tr align="center">
							  <td width="25%">' . $documentInfo['appliance5'] . '</td>
							  <td width="25%">' . $documentInfo['appliance6'] . '</td>
							  <td width="25%">' . $documentInfo['appliance7'] . '</td>
							  <td width="25%">' . $documentInfo['appliance8'] . '</td>
							 </tr>
							</table>&nbsp; <br />';

                $html .= self::getQuestionsHTML($document_id, $typeID, null, array(1 => 'Yes'), false, 'numbers');

                $html .= '<h3>Comments</h3>
							<font size="10">' . $documentInfo['comments'] . '</font>

							<br /><br />
							<font size="5">On this date, this range hood fire supporession system was inspected and operationally tested in accoredance with the fire suppression system reaquirements of NFPA17 or 17A, 96
							and the manufacturer\'s manual, with the results indicted above.</font>
							<br /><br />

							<table border="1" style="font-size: 30px; border: 1px solid #000000;" cellpadding="3" cellspacing="0" width="99%">
							 <tr>
							  <td align="left">' . $documentInfo['technician'] . '</td>
							  <td>' . $documentInfo['permit_no'] . '</td>
							  <td>' . $documentInfo['date_2'] . '</td>
							  <td>' . $documentInfo['time_2'] . '</td>
							  <td>' . $documentInfo['am_2'] . '</td>
							  <td>' . $documentInfo['pm_2'] . '</td>
							  <td>' . $documentInfo['agent'] . '</td>
							 </tr>
							 <tr bgcolor="#000000" style="color: #ffffff;">
							  <td align="left">Service Technician</td>
							  <td>Permit No.</td>
							  <td>Date</td>
							  <td>Time</td>
							  <td>AM</td>
							  <td>PM</td>
							  <td>Customer\'s Authorized Agent</td>
							 </tr>
							</table>';