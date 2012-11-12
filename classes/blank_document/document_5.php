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

$documentInfo = $documentObj->getData('document_data_5_head', 'document_id', $document_id);

                $formInfo = $documentObj->getData('document_data_5_form', 'document_id', $document_id, true);

                $html .= '<table width="100%">
						   <tr>
						   	 <td width="75%">
						   	 <table style="font-size: 30px;" cellpadding="0" cellspacing="5" width="100%">
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
							   <td width="25%" align="right"><b>Site:</b></td>
							   <td width="25%" align="left">' . $documentInfo['site'] . '</td>
							  </tr>
							  <tr>
							   <td width="25%" align="right"><b>Contact:</b></td>
							   <td width="75%" colspan="3" align="left">' . $documentInfo['contact'] . '</td>
							  </tr>
							 </table>
							</td>
							<td width="25%">
							  <table width="100%" style="border: 1px solid #000; font-size: 22px;" cellpadding="4">
							   <tr>
							    <td colspan="2"><u><b>Lengend</b></u></td>
							   </tr>
							   <tr>
							    <td>-</td>
							    <td>Less / Greater</td>
							   </tr>
							   <tr>
							    <td>P</td>
							    <td>Pass</td>
							   </tr>
							   <tr>
							    <td>F</td>
							    <td>Fail</td>
							   </tr>
							   <tr>
							    <td>RB</td>
							    <td>Requires Batteries</td>
							   </tr>
							   <tr>
							    <td>NR</td>
							    <td>Unit Needs Replacing</td>
							   </tr>
							  </table>
							</td>
						   </tr>
						  </table>';

                if (is_array($formInfo) && count($formInfo) > 0) {
                    $html .= '<font size="10"><b>Emergency Lighting Annual Inspection Form</b></font><br /><br />';

                    $html .= '<table border="1" style="font-size: 25px; border: 1px solid #000000; width: 650px;" cellpadding="5">
							 <tr bgcolor="#000000" style="color: #fff;">
							  <td width="10%"><b>Type:</b></td>
							  <td width="25%">( U ) = Emergency Light Unit</td>
							  <td width="20%">( C ) = Combo Unit</td>
							  <td width="25%">( R ) = Remote Head</td>
							  <td width="20%">( X ) = Exit Sign</td>
							 </tr>
							</table><br />';

                    $html .= '<table border="1" style="font-size: 25px; border: 1px solid #000000; width: 650px;" cellpadding="5">
							  <tr align="center" bgcolor="#000000" style="color: #FFFFFF;">
							   <td width="10%">Unit Type</td>
							   <td width="30%">Location</td>
							   <td width="5%">Time Illuminated</td>
							   <td width="10%">Pass or Fail</td>
							   <td width="10%">Unit Voltage</td>
							   <td width="10%">Unit Watts</td>
							   <td width="5%"># Of Batteries</td>
							   <td width="20%">Size Of Batteries</td>
							  </tr>';
                    foreach ($formInfo as $key => $form) {
                        $html .= '<tr align="center">
                                                    <td width="10%">' . $form['unit_type'] . '</td>
                                                    <td width="30%">' . $form['location'] . '</td>
                                                    <td width="5%">' . $form['time_illuminated'] . '</td>
                                                    <td width="10%">' . $form['pass_or_fail'] . '</td>
                                                    <td width="10%">' . $form['unit_voltage'] . '</td>
                                                    <td width="10%">' . $form['unit_watts'] . '</td>
                                                    <td width="5%">' . $form['num_batteries'] . '</td>
                                                    <td width="20%">' . $form['size_batteries'] . '</td>
                                            </tr>';
                    }
                    $html .= '</table><br /><br />';
                }

                $html .= '<font size="10"><b>Remarks</b></font><br />
						' . $documentInfo['comments'] . '<br /><br />';

                $html .= '<table width="100%"><tr><td align="center"><font size="6">Records Must Be Available Upon Fire Departments Request for Min 2 Years</font></td></tr></table>';
                