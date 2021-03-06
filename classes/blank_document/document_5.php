<?php

//include('../blank_document.class.php');
class document_5 extends blank_document {

    public function show($customerInfo) {
        
        $headerTable = array(
            array('Customer Name', @$_POST['customer_name'], 'Technician', @$_POST['technician']),
            array('Address', @$_POST['address'], 'Inspection Date', @$_POST['inspection_date']),
            array('City', @$_POST['city'], 'Site', '&nbsp;'),
            array('Contact', @$_POST['contact'])
        );
        $html = parent::tableHeader($headerTable);        
        $html .= '<table width="100%" style="border: 1px solid #000; font-size: 22px;" cellpadding="4">
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
                </table>';

        
            $html .= '<font size="10"><b>Emergency Lighting Annual Inspection Form</b></font><br /><br />';

            $html .= '<table border="1" style="font-size: 25px; border: 1px solid #000000; width: 100%;" cellpadding="5">
							 <tr bgcolor="#000000" style="color: #fff;">
							  <td width="10%"><b>Type:</b></td>
							  <td width="25%">( U ) = Emergency Light Unit</td>
							  <td width="20%">( C ) = Combo Unit</td>
							  <td width="25%">( R ) = Remote Head</td>
							  <td width="20%">( X ) = Exit Sign</td>
							 </tr>
							</table><br />';

            $html .= '<table border="1" style="font-size: 25px; border: 1px solid #000000; width: 100%;" cellpadding="5">
                        <tr align="center" bgcolor="#000000" style="color: #FFFFFF;">
                                <td width="10%">Unit Type</td>
                                <td width="20%">Location</td>
                                <td width="10%">Time Illuminated</td>
                                <td width="10%">Pass or Fail</td>
                                <td width="10%">Unit Voltage</td>
                                <td width="10%">Unit Watts</td>
                                <td width="10%"># Of Batteries</td>
                                <td width="20%">Size Of Batteries</td>
                        </tr>';
            
            $document = new document($_REQUEST['id']);
            $formInfo = $document->getData('document_data_5_form','document_id',$_REQUEST['id'],true);
            
            if (is_array($formInfo) && count($formInfo) > 0) {
		foreach($formInfo as $key => $form) {
                    $unit_voltage = (!empty($form['unit_voltage']) ? $form['unit_voltage'] : '&nbsp;');
                    $unit_watts = (!empty($form['unit_watts']) ? $form['unit_watts'] : '&nbsp;');
                    $num_batteries = (!empty($form['num_batteries']) ? $form['num_batteries'] : '&nbsp;');
                    $size_batteries = (!empty($form['size_batteries']) ? $form['size_batteries'] : '&nbsp;');
                    
                   $html.=  '<tr align="center">
                              <td>'.$form['unit_type'].'</td>
                              <td>'.$form['location'].'</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>'.$unit_voltage.'</td>
                              <td>'.$unit_watts.'</td>
                              <td>'.$num_batteries.'</td>
                              <td>'.$size_batteries.'</td>			  
                            </tr>';
                }
            }            
           
            $html .= '</table><br /><br />';
        

        $html .= '<font size="10"><b>Remarks</b></font><br />
                    ' . parent::dottedLine(30) . '<br /><br />';

        $html .= '<table width="100%"><tr><td align="center"><font size="10">Records Must Be Available Upon Fire Departments Request for Min 2 Years</font></td></tr></table>';


        return $html;
    }

}
?>