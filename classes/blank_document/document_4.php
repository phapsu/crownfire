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

$headerTable = array(
                        array('Customer Name',$customerInfo['name'], 'Technician',''),
                        array('Address','', 'Inspection Date',''),
                        array('City','', 'Site',''),
                        array('Contact','')
                    );
                $html .= self::tableHeader($headerTable);
                $html .= '<table width="100%">
						   <tr>						   	
							<td width="25%">
								<table width="100%" style="border: 1px solid #000; font-size: 22px;" cellpadding="4">
								   <tr>
								    <td colspan="2"><u><b>Lengend</b></u></td>
								   </tr>
								   <tr>
								    <td>R/C</td>
								    <td>Re-Charge</td>
								   </tr>
								   <tr>
								    <td>6YR</td>
								    <td>6YR Maintenance</td>
								   </tr>
								   <tr>
								    <td>H/T</td>
								    <td>Hydro-Static Testing</td>
								   </tr>
								   <tr>
								    <td>I/R</td>
								    <td>Inspect & Re-Rack</td>
								   </tr>
								   <tr>
								    <td>P</td>
								    <td>Pulled For Service</td>
								   </tr>
								   <tr>
								    <td>C</td>
								    <td>Condemned</td>
								   </tr>
								  </table>
							</td>
							</tr></table>';


                
                    $html .= '<table style="font-size: 20px; border: 1px solid #000000; width: 680px;" cellpadding="5" border="1">
								 <tr align="center" bgcolor="#000000" style="color: #FFFFFF;">
								  <td width="5%">No.#</td>
								  <td width="20%">Hose Location</td>
								  <td width="10%">Size &amp; Type</td>
								  <td width="10%">Manufacture</td>
								  <td width="10%">Extinguisher #</td>
								  <td width="10%">Manufacture Date</td>
								  <td width="5%">Last <br />H-Test</td>
								  <td width="5%">Next <br />H-Test</td>
								  <td width="10%">Next <br />6 Year</td>
								  <td width="15%">Remarks</td>
								 </tr>';
                    for ($i=0; $i<10; $i++) {
                        $html .= '<tr align="center">
									  <td width="5%"></td>
									  <td width="20%"></td>
									  <td width="10%"></td>
									  <td width="10%"></td>
									  <td width="10%"></td>
									  <td width="10%"></td>
									  <td width="5%"></td>
									  <td width="5%"></td>
									  <td width="10%"></td>
									  <td width="15%"></td>
									</tr>';
                    }
                    $html .= '</table>';