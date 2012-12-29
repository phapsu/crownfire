<?php

//include('../blank_document.class.php');
class document_6 extends blank_document {

    public function show($customerInfo) {
        $typeID = $_REQUEST['typeId'];
        
        $headerTable = array(
            array('Customer Name', @$_POST['customer_name'], 'Technician', @$_POST['technician']),
            array('Address', @$_POST['address'], 'Inspection Date', @$_POST['inspection_date']),            
        );
        
        $html = parent::tableHeader($headerTable);
        
        $html .= '<font size="10"><b>Fire Hydrant Location</b></font><br /><br />';        
        
        $html .= '<br pagebreak="true"/>';
        
        $html .= '<br /><b>Technicians Comments</b>: ' . parent::dottedLine(7);

        $html .= '<br /><br />Fire Hydrant Make And Model: <br /><br />';

        $html .= '<font size="10"><b>Valve Testing</b></font><br /><br />';

        $html .= '<table width="100%" cellpadding="5" border="1" style="font-size: 25px; border: 1px solid #000000;">
                     <tr align="center" bgcolor="#000000" style="color: #FFFFFF;">
                      <td width="70%">Size of Test Valve</td>
                      <td width="15%">3/4"</td>
                      <td width="15%">1"</td>
                 </tr>';
        
        $html .= '<tr>
                    <td>Static Pressure</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                  </tr>
                  <tr>
                    <td>Residual Pressure</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                  </tr>
                  <tr>
                    <td>Pito Pressure</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                  </tr>
                  <tr>
                    <td>G.P.M. Pressure</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                  </tr>
                  <tr>
                    <td>Gaskets OK or Replace</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                  </tr>
                  <tr>
                    <td>2 1/2" Coupling</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                  </tr>
                  <tr>
                    <td>3" Coupling</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                  </tr>
                  <tr>
                    <td>Hub</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                  </tr>';        
       
        $html .= '</table><br /><br />';

        // Our questions/answers
        
        $html .= '<font size="10"><b>Questions</b></font><br /><br />';
        
        $html .= '<table width="100%" cellpadding="5" border="1" style="font-size: 25px; border: 1px solid #000000;">
                    <tr bgcolor="#000000" align="center">                        
                        <td width="70%">&nbsp; </td>
                        <td width="15%" align="center" style="color: #ffffff;">Yes</td>
                        <td width="15%" align="center" style="color: #ffffff;">No</td>                        
                    </tr>
                    <tr>
                        <td>Hydrant Outlets are slightly more than hand tight </td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>Nozzle Threads are not damaged and lubricated </td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>Operation Nut shows signs of wear </td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>Cracks visually appear in the Hydrant Barrel </td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>There are leaks under caps due to worn gaskets </td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>There are leaks in the top of hydrant </td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>Barrel drains satisfactory </td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                </table>';

        return $html;
    }

}
?>