<?php
//include('../blank_document.class.php');
class document_11 extends blank_document {
 
    public function show($customerInfo){
        //$html = parent::tableDottedHeader($customerInfo['name']);

        $html .= '<table width="100%" class="dataTable">
                     <tr bgcolor="#000" style="color: #fff; font-weight: bold;" align="center">
                      <td>&nbsp; </td>
                      <td>Document</td>
                      <td>Date Inspected</td>
                      <td>Deficiencies Corrected</td>
                      <td>Certified Technician</td>
                    </tr>
                    <tr align="center">
                     <td>'.self::dottedLine(1).'</td>
                     <td>'.self::dottedLine(1).'</td>
                     <td>'.self::dottedLine(1).'</td>
                     <td>'.self::dottedLine(1).'</td>
                     <td>'.self::dottedLine(1).'</td>
                    </tr>
                    </table>
                  <br />
                  <table>  
                   <tr>
                    <td>Next Inspection due on or before:</td>
                    <td>'.self::dottedLine(1).'</td>
                    <td>Service Manager:</td>
                    <td>'.self::dottedLine(1).'</td>
                   </tr>
                  </table>';
        
        return $html;
    }
}
?>