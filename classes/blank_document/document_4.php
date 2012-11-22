<?php

//include('../blank_document.class.php');
class document_4 extends blank_document {

    public function show($customerInfo) {
        if (!empty($customerInfo)) {
            $document_id = $customerInfo;
            // Report Info
            $document = new document($document_id);
            $reportInfo = $document->getData('document_data_4_report', 'document_id', $document_id, true, null, true);
        }

        $headerTable = array(
            array('Customer Name', @$_POST['customer_name'], 'Technician', @$_POST['technician']),
            array('Address', @$_POST['address'], 'Inspection Date', '&nbsp;'),
            array('City', @$_POST['city'], 'Site', @$_POST['site']),
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
        if (!empty($customerInfo)) {
            $i = 0;
            $max = 0;
            if (is_array($reportInfo) && count($reportInfo) > 0) {
                foreach ($reportInfo as $key => $report) {
                    $html .= '<tr align="center">'
                            .'<td>'. stripslashes($report['report_num']).'</td>'
                            .'<td>&nbsp;</td>'
                            .'<td>&nbsp;</td>'
                            .'<td>'. stripslashes($report["manufacture"]).'</td>'
                            .'<td>'. stripslashes($report["serial"]).'</td>'
                            .'<td>'. stripslashes($report["manufacture_date"]).'</td>'
                            .'<td>'. stripslashes($report["last_h_test"]).'</td>'
                            .'<td>'. stripslashes($report["next_h_test"]).'</td>'
                            .'<td>'. stripslashes($report["next_six_year"]).'</td>'
                            .'<td>&nbsp;</td>'
                          .'</tr>';
                }
            }
        } else {
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
        }
        $html .= '</table>';

        return $html;
    }

}

?>