<?php

//include('../blank_document.class.php');
class document_6 extends blank_document {

    public function show($customerInfo) {
        $typeID = $_REQUEST['typeId'];
        
        $headerTable = array(
            array('Customer Name', $customerInfo['name'], 'Technician', '&nbsp;'),
            array('Address', '&nbsp;', 'Inspection Date', '&nbsp;'),            
        );
        $html = parent::tableHeader($headerTable);
        

        $html .= '<table style="font-size: 30px;" cellpadding="0" cellspacing="5" width="100%">';
        $html .= '<tr>';
        $html .= '<td width="50%">Fire Hydrant Location</td>';
        $html .= '<td width="50%">Technician Comments</td>';
        $html .= '</tr>';
        $html .= '<tr>';
        $html .= '<td width="50%" style="border: 1px solid #000;">&nbsp;<br/>';
//        $img = document::getDocumentImage($document_id);
//        if ($img) {
//            $html .= '<img src="' . $img . '" />';
//        }
        $html .= '</td>';
        $html .= '<td width="50%" style="border: 1px solid #000;">';
        $html .= '&nbsp;<br/>';
        $html .= '</td>';
        $html .= '</tr></table>';

        $html .= 'Fire Hydrant Make And Model: <br /><br />';

        $html .= '<font size="10"><b>Valve Testing</b></font><br /><br />';

        $html .= '<table style="font-size: 30px; border: 1px solid #000000; width: 100%;" cellpadding="5">
							 <tr align="center" bgcolor="#000000" style="color: #FFFFFF;">
							  <td width="70%">Size of Test Valve</td>
							  <td width="15%">3/4"</td>
							  <td width="15%">1"</td>
							 </tr>';
        
        for ($i=0; $i< 10; $i++) {
            $html .= '<tr align="center">
                        <td style="border: 1px solid #000;">&nbsp;</td>
                        <td style="border: 1px solid #000;">&nbsp;</td>
                        <td style="border: 1px solid #000;">&nbsp;</td>
                      </tr>';
        }
       
        $html .= '</table><br />';

        // Our questions/answers
        $html .= parent::getQuestionsHTML(null, $typeID) . '<br /><br />';

        return $html;
    }

}

?>
