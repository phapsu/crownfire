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
                        array('Customer Name',$customerInfo['name'], 'Technician 1',''),
                        array('Address','', 'Technician 2',''),
                        array('Inspection Date',''),
                        array('Manufacturer Name & Model Number','')
                );
                $html .= self::tableHeader($headerTable);

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
                $html .= self::getQuestionsHTML(null, $typeID).'<br /><br />';