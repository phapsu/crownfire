<?php
//include('../blank_document.class.php');
class document_3 extends blank_document {
 
    public function show($customerInfo){
       $typeID = $_REQUEST['typeId'];
       $headerTable = array(
                        array('Customer Name',@$_POST['customer_name'], 'Technician 1',@$_POST['technician_1']),
                        array('Address',@$_POST['address'], 'Technician 2',@$_POST['technician_2']),
                        array('Inspection Date',@$_POST['inspection_date']),
                        array('City',@$_POST['city'])
                );
        $html = parent::tableHeader($headerTable);

        $html .= '<h1>Summary</h1></font><br /><br>';
        $html .= '<table border="0" style="font-size: 30px; width: 100%;" cellpadding="0">';

        $html .= '<tr valign="top"><td><h3>Deficiencies:</h3></td></tr>';
        $html .= '<tr valign="top"><td> '.self::dottedLine(7).'</td></tr>';
        $html .= '<tr valign="top"><td><h3>Recommendations:</h3></td></tr>';
        $html .= '<tr valign="top"><td> '.self::dottedLine(7).'</td></tr>';
        $html .= '<tr valign="top"><td><h3>Remarks:</h3></td></tr>';
        $html .= '<tr valign="top"><td> '.self::dottedLine(7).'</td></tr>';

        $html .= '</table><br />';

        // Our questions/answers
        $html .= '<table width="100%" cellpadding="5" border="1" style="font-size: 25px; border: 1px solid #000000;">
                    <tr bgcolor="#000000" align="center">
                        <td width="70%">&nbsp; </td>
                        <td width="15%" align="center" style="color: #ffffff;">Yes</td>
                        <td width="15%" align="center" style="color: #ffffff;">No</td>                        
                    </tr>
                    <tr>
                        <td>System in trouble on arrival</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>Does System Require Fire Watch </td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>System left clear and operational </td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>Has Customer & Fire Department been notified</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                </table>';
                
        return $html;
    }
}
?>              