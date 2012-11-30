<?php
//include('../blank_document.class.php');
class document_1 extends blank_document {
 
    public function show($customerInfo){
        $headerTable = array(
                        array('Customer Name',@$_POST['customer_name'], 'Technician',@$_POST['technician']),
                        array('Address',@$_POST['address']),
                        array('Inspection Date', @$_POST['inspection_date']),
                        array('Manufacturer Name & Model Number',@$_POST['man_name_model'])
                );
        $html = parent::tableHeader($headerTable);

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
