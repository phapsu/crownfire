<?php

//include('../blank_document.class.php');
class document_8 extends blank_document {

    public function show($customerInfo) {
        $typeID = $_REQUEST['typeId'];
        
        $headerTable = array(
            array('Customer Name', @$_POST['customer_name'], 'Technician', @$_POST['technician']),
            array('Address', @$_POST['address'], 'Inspection Date', '&nbsp;'),
            array('City', @$_POST['city'], 'Site', @$_POST['site']),
            array('Contact', @$_POST['contact']),
        );
        $html = parent::tableHeader($headerTable);

        $html .= '<font size="10"><b>Pump Info</b></font><br />
                <table style="font-size: 30px; border: 1px solid #000000;" width="100%" cellpadding="5">
                 <tr>
                  <td width="30%"><b>Water Supply Source:</b></td>
                  <td width="70%">&nbsp;</td>
                 </tr>
                 <tr>
                  <td width="30%"><b>Fire Pump:</b></td>
                  <td width="70%">&nbsp;</td>
                 </tr>
                 <tr>
                  <td width="30%"><b>Jockey Pump:</b></td>
                  <td width="70%">&nbsp;</td>
                 </tr>
                </table><br />

                <font size="10"><b>Test Information</b></font><br />
                <table style="font-size: 30px; border: 1px solid #000000;" width="100%" cellpadding="5">
                 <tr>
                  <td width="40%"><b>Location Of Highest Fire Hose Cabinet:</b></td>
                  <td width="60%">&nbsp;</td>
                 </tr>
                 <tr>
                  <td width="30%"><b>Number of Floors:</b></td>
                  <td width="70%">&nbsp;</td>
                 </tr>
                 <tr>
                  <td width="30%"><b>Fire Hose Length in Cabnets:</b></td>
                  <td width="70%">&nbsp;</td>
                 </tr>
                  <tr>
                  <td width="30%"><b>Type of Control Valve:</b></td>
                  <td width="70%">&nbsp;</td>
                 </tr>
                </table><br />';

        $html .= parent::getQuestionsHTML(null, $typeID);

        $html .= '<br /><font size="10"><b>Water Flow Data</b></font><br />';

        $html .= '<table style="font-size: 30px; border: 1px solid #000000;" width="100%" cellpadding="5">
							 <tr>
							  <td width="30%"><b>Hose Length:</b></td>
							  <td width="70%">&nbsp;</td>
							 </tr>
							 <tr>
							  <td width="30%"><b>Flow Location:</b></td>
							  <td width="70%">&nbsp;</td>
							 </tr>
							 <tr>
							  <td width="30%"><b>Orifice:</b></td>
							  <td width="70%">&nbsp;</td>
							 </tr>
							 <tr>
							  <td width="30%"><b># of Hoses Used:</b></td>
							  <td width="70%">&nbsp;</td>
							 </tr>
							 <tr>
							  <td width="30%"><b>GPM:</b></td>
							  <td width="70%">&nbsp;</td>
							 </tr>
							 <tr>
							  <td width="30%"><b>Pito Tube:</b></td>
							  <td width="70%">&nbsp;</td>
							 </tr>
							 <tr>
							  <td width="30%"><b>Hose Rack Residual Reading:</b></td>
							  <td width="70%">&nbsp;</td>
							 </tr>
							</table><br />

							<font size="10"><b>Comments</b></font>';

        $html .= parent::dottedLine(6);

        return $html;
    }

}

?>
               