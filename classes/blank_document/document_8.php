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
$documentInfo = $documentObj->getData('document_data_8_head', 'document_id', $document_id);
                $pumpInfo = $documentObj->getData('document_data_8_pump', 'document_id', $document_id, false);
                $testInfo = $documentObj->getData('document_data_8_test', 'document_id', $document_id, false);
                $waterInfo = $documentObj->getData('document_data_8_water', 'document_id', $document_id, false);

                $html .= '<table style="font-size: 30px;" cellpadding="0" cellspacing="5" width="100%">
						  <tr valign="top">
						   <td width="25%" align="right"><b>Customer Name:</b></td>
						   <td width="25%" align="left">' . $documentInfo['customer_name'] . '</td>
						   <td width="25%" align="right"><b>Technician:</b></td>
						   <td width="25%" align="left">' . $documentInfo['technician'] . '</td>
						  </tr>
						  <tr valign="top">
						   <td width="25%" align="right"><b>Address:</b></td>
						   <td width="25%" align="left">' . $documentInfo['address'] . '</td>
						   <td width="25%" align="right"><b>Inspection Date:</b></td>
						   <td width="25%" align="left">' . $documentInfo['inspection_date'] . '</td>
						  </tr>
						  <tr valign="top">
						   <td width="25%" align="right"><b>City:</b></td>
						   <td width="25%" align="left">' . $documentInfo['city'] . '</td>
						   <td width="25%" width="15%" align="right"><b>Site:</b></td>
						   <td width="25%" align="left">' . $documentInfo['site'] . '</td>
						  </tr>
						  <tr>
						   <td width="25%" align="right"><b>Contact:</b></td>
						   <td colspan="75%" align="left">' . $documentInfo['contact'] . '</td>
						  </tr>
						 </table><br />

						<font size="10"><b>Pump Info</b></font><br />
						<table style="font-size: 30px; border: 1px solid #000000;" width="100%" cellpadding="5">
						 <tr>
						  <td width="30%"><b>Water Supply Source:</b></td>
						  <td width="70%">' . $pumpInfo['water_supply_source'] . '</td>
						 </tr>
						 <tr>
						  <td width="30%"><b>Fire Pump:</b></td>
						  <td width="70%">' . $pumpInfo['fire_pump'] . '</td>
						 </tr>
						 <tr>
						  <td width="30%"><b>Jockey Pump:</b></td>
						  <td width="70%">' . $pumpInfo['jockey_pump'] . '</td>
						 </tr>
						</table><br />

						<font size="10"><b>Test Information</b></font><br />
						<table style="font-size: 30px; border: 1px solid #000000;" width="100%" cellpadding="5">
						 <tr>
						  <td width="30%"><b>Location Of Highest Fire Hose Cabinet:</b></td>
						  <td width="70%">' . $testInfo['location_cabinet'] . '</td>
						 </tr>
						 <tr>
						  <td width="30%"><b>Number of Floors:</b></td>
						  <td width="70%">' . $testInfo['number_floors'] . '</td>
						 </tr>
						 <tr>
						  <td width="30%"><b>Fire Hose Length in Cabnets:</b></td>
						  <td width="70%">' . $testInfo['fire_hose_length'] . '</td>
						 </tr>
						  <tr>
						  <td width="30%"><b>Type of Control Valve:</b></td>
						  <td width="70%">' . $testInfo['type_control_valve'] . '</td>
						 </tr>
						</table><br />';

                $html .= self::getQuestionsHTML($document_id, $typeID);

                $html .= '<br /><font size="10"><b>Water Flow Data</b></font><br />';

                $html .= '<table style="font-size: 30px; border: 1px solid #000000;" width="100%" cellpadding="5">
							 <tr>
							  <td width="30%"><b>Hose Length:</b></td>
							  <td width="70%">' . $waterInfo['hose_length'] . '</td>
							 </tr>
							 <tr>
							  <td width="30%"><b>Flow Location:</b></td>
							  <td width="70%">' . $waterInfo['flow_location'] . '</td>
							 </tr>
							 <tr>
							  <td width="30%"><b>Orifice:</b></td>
							  <td width="70%">' . $waterInfo['orifice'] . '</td>
							 </tr>
							 <tr>
							  <td width="30%"><b># of Hoses Used:</b></td>
							  <td width="70%">' . $waterInfo['num_hoses_used'] . '</td>
							 </tr>
							 <tr>
							  <td width="30%"><b>GPM:</b></td>
							  <td width="70%">' . $waterInfo['gpm'] . ' PSI</td>
							 </tr>
							 <tr>
							  <td width="30%"><b>Pito Tube:</b></td>
							  <td width="70%">' . $waterInfo['pito_tube'] . ' PSI</td>
							 </tr>
							 <tr>
							  <td width="30%"><b>Hose Rack Residual Reading:</b></td>
							  <td width="70%">' . $waterInfo['hose_rack'] . ' PSI</td>
							 </tr>
							</table><br />

							<font size="10"><b>Comments</b></font><br /><br />';

                $html .= $documentInfo['comments'] . '<br /><br />';