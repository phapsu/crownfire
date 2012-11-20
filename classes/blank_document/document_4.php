<?php

//include('../blank_document.class.php');
class document_4 extends blank_document {

    public function show($customerInfo) {
        $headerTable = array(
            array('Customer Name', @$_POST['customer_name'], 'Technician', @$_POST['technician']),
            array('Address', @$_POST['address'], 'Inspection Date', '&nbsp;'),
            array('City',@$_POST['city'], 'Site', @$_POST['site']),
            array('Contact', @$_POST['contact'])
        );
        $html = parent::tableHeader($headerTable);
        $html .= '<table width="100%" style="border: 1px solid #000; font-size: 22px;" cellpadding="4">
                            <tr>
                             <td colspan="2"><u><b>Lengend</b></u></td>
                            </tr>
                            <tr>
                             <td width="15%">R/C</td>
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
                           </table><br/>';



        $html .= '<table style="font-size: 20px; border: 1px solid #000000; width: 100%;" cellpadding="5" border="1">
								 <tr align="center" bgcolor="#000000" style="color: #FFFFFF;">
								  <td width="5%">No.#</td>
								  <td width="15%">Hose Location</td>
								  <td width="10%">Size &amp; Type</td>
								  <td width="10%">Manufacture</td>
								  <td width="10%">Extinguisher #</td>
								  <td width="10%">Manufacture Date</td>
								  <td width="7%">Last H-Test</td>
								  <td width="7%">Next H-Test</td>
								  <td width="10%">Next 6 Year</td>
								  <td width="15%">Remarks</td>
								 </tr>';
        for ($i = 0; $i < 10; $i++) {
            $html .= '<tr align="center">
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                      </tr>';
        }
        $html .= '</table>';

        return $html;
    }

}

?>