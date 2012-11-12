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
$documentInfo = $documentObj->getData('document_data_6_head', 'document_id', $document_id);
                $testingInfo = document::getDataSimple('valve_testing_options');
                $testingOptions = document::getTestingOptions($document_id);

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
						 </table><br />';

                $html .= '<table style="font-size: 30px;" cellpadding="0" cellspacing="5" width="100%">';
                $html .= '<tr>';
                $html .= '<td width="50%">Fire Hydrant Location</td>';
                $html .= '<td width="50%">Technician Comments</td>';
                $html .= '</tr>';
                $html .= '<tr>';
                $html .= '<td width="50%" style="border: 1px solid #000;">';
                $img = document::getDocumentImage($document_id);
                if ($img) {
                    $html .= '<img src="' . $img . '" />';
                }
                $html .= '</td>';
                $html .= '<td width="50%" style="border: 1px solid #000;">';
                $html .= $documentInfo['tech_comments'];
                $html .= '</td>';
                $html .= '</tr></table>';

                $html .= 'Fire Hydrant Make And Model: ' . $documentInfo['hydrant_make'] . '<br /><br />';

                $html .= '<font size="10"><b>Valve Testing</b></font><br /><br />';

                $html .= '<table style="font-size: 30px; border: 1px solid #000000; width: 350px;" cellpadding="5">
							 <tr align="center" bgcolor="#000000" style="color: #FFFFFF;">
							  <td width="70%">Size of Test Valve</td>
							  <td>3/4"</td>
							  <td>1"</td>
							 </tr>';
                if (is_array($testingInfo)) {
                    foreach ($testingInfo as $key => $valueArray) {
                        $html .= '<tr align="center">
								  <td>' . $valueArray['testing_name'] . '</td>
								  <td>' . $testingOptions[$valueArray['id']]['size_a'] . '</td>
								  <td>' . $testingOptions[$valueArray['id']]['size_b'] . '</td>
								</tr>';
                    }
                }
                $html .= '</table><br />';

                // Our questions/answers
                $html .= self::getQuestionsHTML($document_id, $typeID) . '<br /><br />';