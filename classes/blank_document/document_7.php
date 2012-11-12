<?php

//include('../blank_document.class.php');
class document_7 extends blank_document {

    public function show($customerInfo) {
        $typeID = $_REQUEST['typeId'];

        $headerTable = array(
            array('Inspection Date', '&nbsp;', 'Technician', '&nbsp;'),
            array('Job Name', '&nbsp;', 'Job Address', '&nbsp;'),
            array('Site Contact', '&nbsp;'),
        );
        $html = parent::tableHeader($headerTable);

        // Our questions/answers
        $html .= parent::getQuestionsHTML(null, $typeID);

        $html .= '<br /><font size="10"><b>Valve Info</b></font><br />
						<table style="font-size: 30px;" cellpadding="0" width="100%" border="1" >
						 <tr align="center" bgcolor="#000000" style="color: #fff; font-weight: bold;">
						  <td width="16%">Type of Valve</td>
						  <td width="16%">Make of Valve</td>
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

        $html .= '<br /><font size="10"><b>System Components</b></font><br />
                                                            <table border="1" style="font-size: 30px; border: 1px solid #000000;" cellpadding="5" width="100%">
                                                             <tr align="center" bgcolor="#000000" style="color: #fff; font-weight: bold;">
                                                              <td>System Component</td>
                                                              <td>OK</td>
                                                              <td>Needs Work</td>
                                                              <td>N/A</td>
                                                             </tr>';
        for ($i = 0; $i < 10; $i++) {
            $html .= '<tr align="center"><td align="left">&nbsp;</td>';
            $html .= '<td>&nbsp;</td>';
            $html .= '<td>&nbsp;</td>';
            $html .= '<td>&nbsp;</td>';
            $html .= '</tr>';
        }
        $html .= '</table><br />';


        $html .= '<font size="10"><b>Make &amp; Model Switches</b></font><br />
						<table style="font-size: 30px; border: 1px solid #000000;" cellpadding="0" cellspacing="5" width="100%">
						 <tr>
						  <td><b>Pressure Switches:</b></td>
						  <td>&nbsp;</td>
						 </tr>
						 <tr>
						  <td><b>Flow Switches:</b></td>
						  <td>&nbsp;</td>
						 </tr>
						 <tr>
						  <td><b>Supervistory Switches:</b></td>
						  <td>&nbsp;</td>
						 </tr>
						</table><br />

						<font size="10"><b>Flow Test Report</b></font><br />
						<table style="font-size: 30px; border: 1px solid #000000;" cellpadding="0" cellspacing="5" width="100%">
						 <tr>
						  <td width="20%"><b>City Pressure PSI:</b></td>
						  <td>&nbsp;</td>
						  <td width="30%"><b>System Static Pressure PSI:</b></td>
						  <td>&nbsp;</td>
						 </tr>
                                                 <tr><td colspan="4"><br/></td></tr>
						 <tr>
						  <td width="20%"><b>Air Pressure PSI:</b></td>
						  <td>&nbsp;</td>
						  <td width="30%"><b>Flow Residual Pressure PSI:</b></td>
						  <td>&nbsp;</td>
						 </tr>
						</table><br /><br/>

						<font size="10"><b>Time &amp; Trip Test Report</b><br />

						<table style="font-size: 30px; border: 1px solid #000000;" cellpadding="0" cellspacing="5" width="100%">
						 <tr>
						  <td width="25%"><b>Trip Pressure PSI:</b></td>
						  <td>&nbsp;</td>
						  <td width="25%"><b>Trip Time:</b></td>
						  <td>&nbsp;</td>
						 </tr>
                                                 <tr><td colspan="4"><br/></td></tr>
						 <tr>
						  <td width="25%"><b>Inspectors Test Time:</b></td>
						  <td>&nbsp;</td>
						  <td width="25%"><b>Trip Time (Q.O.D.):</b></td>
						  <td>&nbsp;</td>
						 </tr>
						</table><br /><br /><br />

						<font size="10"><b>Comments</b></font>'.parent::dottedLine(20);

        return $html;
    }

}

?>       