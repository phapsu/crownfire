<?php
//include('../blank_document.class.php');
class document_3 extends blank_document {
 
    public function show($customerInfo){
       $typeID = $_REQUEST['typeId'];
       $headerTable = array(
                        array('Customer Name',$customerInfo['name'], 'Technician 1','&nbsp;'),
                        array('Address','&nbsp;', 'Technician 2','&nbsp;'),
                        array('Inspection Date','&nbsp;'),
                        array('Manufacturer Name & Model Number','&nbsp;')
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
        $html .= parent::getQuestionsHTML(null, $typeID).'<br /><br />';
        
        return $html;
    }
}
?>

              