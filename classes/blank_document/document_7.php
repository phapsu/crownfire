<?php

//include('../blank_document.class.php');
class document_7 extends blank_document {

    public function show($customerInfo) {
        $typeID = $_REQUEST['typeId'];

        $headerTable = array(
            array('Inspection Date', @$_POST['inspection_date'] , 'Technician', @$_POST['technician']),
            array('Job Name', @$_POST['job_name'], 'Job Address', @$_POST['job_address']),
            array('Site Contact', @$_POST['site_contact']),
        );
        $html = parent::tableHeader($headerTable);

        // Our questions/answers
        $html .= '<br /><font size="10"><b>Questions</b></font><br />';
        
        $html .= '<table width="100%" cellpadding="5" border="1" style="font-size: 25px; border: 1px solid #000000;">
                    <tr bgcolor="#000000" align="center">
                        <td width="70%">&nbsp; </td>
                        <td width="15%" align="center" style="color: #ffffff;">Yes</td>
                        <td width="15%" align="center" style="color: #ffffff;">No</td>                        
                    </tr>
                    <tr>
                        <td>Is System Monitored </td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>Is System Tied Into F/A </td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>Does Building Have Security Service</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                 </table>';   
        
        $html .= '<br /><br /><font size="10"><b>Valve Info</b></font><br />
                    <table style="font-size: 25px;" cellpadding="5" width="100%" border="1" >
                     <tr align="center" bgcolor="#000000" style="color: #fff; font-weight: bold;">
                      <td width="18%">Type of Valve</td>
                      <td width="18%">Make of Valve</td>
                      <td width="16%">Valve Model</td>
                      <td width="16%">Year</td>
                      <td width="16%">System #</td>
                      <td width="16%">Serial Number</td>
                     </tr>
                     <tr align="center">
                      <td>&nbsp;<br/></td>
                      <td>&nbsp;<br/></td>
                      <td>&nbsp;<br/></td>
                      <td>&nbsp;<br/></td>
                      <td>&nbsp;<br/></td>
                      <td>&nbsp;<br/></td>
                     </tr>
                    </table>';


        // Fetch our options (if any)
        //System Components
        $html .= '<br /><font size="10"><b>System Components</b></font><br />
                <table border="1" style="font-size: 25px; border: 1px solid #000000;" cellpadding="5" width="100%">
                 <tr align="center" bgcolor="#000000" style="color: #fff; font-weight: bold;">
                  <td width="50%">System Component</td>
                  <td width="15%">OK</td>
                  <td width="20%">Needs Work</td>
                  <td width="15%">N/A</td>
                 </tr>';
        
        $componentInfo		= document::getDataSimple('component_options');
        
        if (is_array($componentInfo)) {
            foreach($componentInfo as $key => $valueArray) {
            
                $html .='<tr>
                            <td>'.$valueArray['component_option'].'</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                        </tr>';
            }            
        }
        
        $html .= '</table><br /><br />';

        $html .= '<font size="10"><b>Make &amp; Model Switches</b></font><br />
                <table style="font-size: 25px;" cellpadding="5" width="100%" border="1" >
                 <tr>
                  <td width="40%"><b>Pressure Switches</b></td>
                  <td  width="60%">&nbsp;</td>
                 </tr>
                 <tr>
                  <td><b>Flow Switches</b></td>
                  <td>&nbsp;</td>
                 </tr>
                 <tr>
                  <td><b>Supervistory Switches</b></td>
                  <td>&nbsp;</td>
                 </tr>
                </table><br />

                <font size="10"><b>Flow Test Report</b></font><br />
                <table style="font-size: 25px;" cellpadding="5" width="100%" border="1" >
                 <tr>
                  <td width="25%"><b>City Pressure PSI</b></td>
                  <td  width="25%">&nbsp;</td>
                  <td width="25%"><b>System Static Pressure PSI</b></td>
                  <td  width="25%">&nbsp;</td>
                 </tr>                 
                 <tr>
                  <td><b>Air Pressure PSI</b></td>
                  <td>&nbsp;</td>
                  <td><b>Flow Residual Pressure PSI</b></td>
                  <td>&nbsp;</td>
                 </tr>
                </table><br /><br/>

                <font size="10"><b>Time &amp; Trip Test Report</b><br />

                <table style="font-size: 25px;" cellpadding="5" width="100%" border="1" >
                 <tr>
                  <td width="25%"><b>Trip Pressure PSI</b></td>
                  <td width="25%">&nbsp;</td>
                  <td width="25%"><b>Trip Time</b></td>
                  <td width="25%">&nbsp;</td>
                 </tr>
                 <tr>
                  <td><b>Inspectors Test Time</b></td>
                  <td>&nbsp;</td>
                  <td><b>Trip Time (Q.O.D.)</b></td>
                  <td>&nbsp;</td>
                 </tr>
                </table><br /><br /><br />

                <font size="10"><b>Comments</b></font>'.parent::dottedLine(20);

        return $html;
    }

}
?>