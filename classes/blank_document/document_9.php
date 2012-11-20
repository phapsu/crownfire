<?php

//include('../blank_document.class.php');
class document_9 extends blank_document {

    public function show($customerInfo, $buildingInfo) {
        
        $typeID = $_REQUEST['typeId'];
        $buildingName = $buildingInfo['name'];
        $buildingAdd = $buildingInfo['address1'];
        
        $notes_array = array(
            1 => 'Smoke detector sensitivity confirmation or measurement should be recorded in the remarks column',
            2 => 'Smoke detector cleaning or replacement date should also be recorded in the remarks column',
            3 => 'Status Change, including time delay, should be recorded in the remarks column',
            4 => 'Duct smoke detector pressure differential should be confirmed and recorded in the remarks column',
            5 => 'Time delay setting of water flow switch should be recorded in the remarks column',
            6 => 'Sprinkler supervisory switches cause trouble condition to be annunciated but not an alarm condition',
            7 => 'Upper and lower pressure setting of supervisory devices should be recorded in the remarks column',
            8 => 'Low temperature setting should be recorded in the remarks column',
            9 => 'Identify the specific ancillary devices in the remarks column',
            10 => 'Identify date field device changed in the remarks column',
            11 => 'Identify correct field device operation (e.g, alarm, trouble, supervisory, annunciation indication',
            12 => 'Identify zone, circuit number or address',
            13 => 'Identify conventional field device locations',
            14 => 'Identify active field device and supporting field device, data communication link (DCL), address and location',
            15 => 'Test and confirm conventional field device supervision of wiring',
            16 => 'Confirm field device free of damage',
            17 => 'Confirm field device free of foreign substance (e.g. paint)',
            18 => 'Confirm field device mechanically supported independently of the wiring',
            19 => 'Confirm field device protective dust shield of covers removed');

        $headerTable = array(
            array('Building Name', @$_POST['building_name']),
            array('Address',@$_POST['address']),
            array('Date', '&nbsp;'),
            array('System Manufacturer', @$_POST['system_manufacturer']),
            array('Model Number', @$_POST['model_number']),
        );
        $header = parent::tableHeader($headerTable);  
        
        $html  = $header;
        
        $html .= '<font size="10"><b>E1. Fire Alarm System Annual Test and Inspection Report - CAN/ULC S536-04</b></font><br /><br />';
        
        $html .= parent::getQuestionsHTML(null, $typeID, 1, array(1 => 'Yes', 0 => 'No', 'N/A' => 'N/A'), false);

        $html .= '<br /><b>Comments</b>: ' . parent::dottedLine(7);

        $html .= '<br /> <br /><table style="font-size: 30px;" cellpadding="0" cellspacing="5" width="100%">
							 <tr>
							  <td width="35%" align="left" style="border-bottom:0.5px solid #000;">&nbsp;</td>
							  <td width="20%" align="left" style="border-bottom:0.5px solid #000;">&nbsp;</td>
							  <td width="20%" align="left" style="border-bottom:0.5px solid #000;">&nbsp;</td>
							  <td width="25%" align="left" style="border-bottom:0.5px solid #000;">&nbsp;</td>
							 </tr>
							 <tr align="left" style="font-size: 12px;">
							  <td width="35%">Printed Name of Primary or Supervising<br />Technition Conducting the Test and Inspection</td>
							  <td width="20%">Company</td>
							  <td width="20%">Telephone</td>
							  <td width="25%">CFAA Identification Number</td>
							 </tr>
							 <tr>
							  <td width="35%" align="left" style="border-bottom:0.5px solid #000;">&nbsp;</td>
							  <td width="20%" align="left" style="border-bottom:0.5px solid #000;">&nbsp;</td>
							  <td width="20%" align="left" style="border-bottom:0.5px solid #000;">&nbsp;</td>
							  <td width="25%" align="left" style="border-bottom:0.5px solid #000;">&nbsp;</td>
							 </tr>
							 <tr align="left" style="font-size: 12px;">
							  <td width="35%">Printed Name of Primary or Supervising<br />Technition Conducting the Test and Inspection</td>
							  <td width="20%">Company</td>
							  <td width="20%">Telephone</td>
							  <td width="25%">CFAA Identification Number</td>
							 </tr>
						  </table>
						  <br /><br />';

        $html .= '<br pagebreak="true"/>';
        $html .= $header;
        $html .= '<font size="10"><b>E2.1 Control Unit or Transponder Test - CAN/ULC S536-04</b></font><br /><br />
							<table style="font-size: 30px; border: 1px solid #000000;" cellpadding="5" width="100%">
							 <tr>
							  <td width="40%"><b>Control unit or transponder location:</b></td>
							  <td width="60%">&nbsp;</td>
							 </tr>
							 <tr>
							  <td width="40%"><b>Control unit or transponder identification:</b></td>
							  <td width="60%">&nbsp;</td>
							 </tr>
							</table>';

        $html .= parent::getQuestionsHTML(null, $typeID, 2, array(1 => 'Yes', 0 => 'No', 'N/A' => 'N/A'), false);

        $html .= '<br pagebreak="true"/>';
        $html .= $header;
        $html .= '<font size="10"><b>E2.2 Voice Communication Test - CAN/ULC S536-04</b></font><br />';

        $html .= parent::getQuestionsHTML(null, $typeID, 3, array(1 => 'Yes', 0 => 'No', 'N/A' => 'N/A'), false);

        $html .= '<br pagebreak="true"/>';
        $html .= $header;
        $html .= '<font size="10"><b>E2.3 Control Unit or Transponder Inspection - CAN/ULC S536-04</b></font><br /><br />
							<table style="font-size: 30px; border: 1px solid #000000;" cellpadding="5" width="100%">
							 <tr>
							  <td width="40%">Control unit or transponder location:</td>
							  <td width="60%">&nbsp;</td>
							 </tr>
							 <tr>
							  <td width="40%">Control unit or transponder identification:</td>
							  <td width="60%">&nbsp;</td>
							 </tr>
							</table>';

        $html .= parent::getQuestionsHTML(null, $typeID, 4, array(1 => 'Yes', 0 => 'No', 'N/A' => 'N/A'), false);

        $html .= '<br pagebreak="true"/>';
        $html .= $header;
        $html .= '<font size="10"><b>E2.4 Power Supply Inspection - CAN/ULC S536-04</b></font><br /><br />
							<table style="font-size: 30px; border: 1px solid #000000;" width="100%" cellpadding="5">
							 <tr>
							  <td width="40%">Control unit or transponder location:</td>
							  <td width="60%">&nbsp;</td>
							 </tr>
							 <tr>
							  <td width="40%">Control unit or transponder identification:</td>
							  <td width="60%">&nbsp;</td>
							 </tr>
							</table>';
        $html .= parent::getQuestionsHTML(null, $typeID, 5, array(1 => 'Yes', 0 => 'No', 'N/A' => 'N/A'), false);

        $html .= '<br pagebreak="true"/>';
        $html .= $header;
        $html .= '<font size="10"><b>E2.5 Emergency Power Supply Test and Inspection - CAN/ULC S536-04</b></font><br /><br />
							<table style="font-size: 30px;" cellpadding="0" cellspacing="5" width="100%">
							 <tr>
							  <td width="40%">Control unit or transponder location:</td>
							  <td width="60%">&nbsp;</td>
							 </tr>
							 <tr>
							  <td width="40%">Control unit or transponder identification:</td>
							  <td width="60%">&nbsp;</td>
							 </tr>
							</table>';

        $html .= parent::getQuestionsHTML(null, $typeID, 6, array(1 => 'Yes', 0 => 'No', 'N/A' => 'N/A'), false);
        $html .= '<br pagebreak="true"/>';

        
        $html .= $header;
        $html .= '<font size="10"><b>E2.5 (B) Emergency Power Supply Test and Inspection - CAN/ULC S536-04</b></font><br /><br />
                                                    <table style="font-size: 30px;" cellpadding="0" cellspacing="5" width="100%">
                                                     <tr>
                                                      <td width="40%">Control unit or transponder location:</td>
                                                      <td width="60%">&nbsp;</td>
                                                     </tr>
                                                     <tr>
                                                      <td width="40%">Control unit or transponder identification:</td>
                                                      <td width="60%">&nbsp;</td>
                                                     </tr>
                                                    </table>';

        $html .= parent::getQuestionsHTML(null, $typeID, 15, array(1 => 'Yes', 0 => 'No', 'N/A' => 'N/A'), false);
        $html .= '<br pagebreak="true"/>';
        

        $html .= $header;
        $html .= '<font size="10"><b>E2.5 (C) Emergency Power Supply Test and Inspection - CAN/ULC S536-04</b></font><br /><br />
                                                    <table style="font-size: 30px;" cellpadding="0" cellspacing="5" width="100%">
                                                     <tr>
                                                      <td width="40%">Control unit or transponder location:</td>
                                                      <td width="60%">&nbsp;</td>
                                                     </tr>
                                                     <tr>
                                                      <td width="40%">Control unit or transponder identification:</td>
                                                      <td width="60%">&nbsp;</td>
                                                     </tr>
                                                    </table>';

        $html .= parent::getQuestionsHTML(null, $typeID, 16, array(1 => 'Yes', 0 => 'No', 'N/A' => 'N/A'), false);
        $html .= '<br pagebreak="true"/>';


        $html .= $header;
        $html .= '<font size="10"><b>E2.5 (D) Emergency Power Supply Test and Inspection - CAN/ULC S536-04</b></font><br /><br />
                                                    <table style="font-size: 30px;" cellpadding="0" cellspacing="5" width="100%">
                                                     <tr>
                                                      <td width="40%">Control unit or transponder location:</td>
                                                      <td width="60%">&nbsp;</td>
                                                     </tr>
                                                     <tr>
                                                      <td width="40%">Control unit or transponder identification:</td>
                                                      <td width="60%">&nbsp;</td>
                                                     </tr>
                                                    </table>';

        $html .= parent::getQuestionsHTML(null, $typeID, 17, array(1 => 'Yes', 0 => 'No', 'N/A' => 'N/A'), false);
        $html .= '<br pagebreak="true"/>';



        
        $html .= $header;
        $html .= '<font size="10"><b>E2.6 Annunciator and Remote Trouble Signal Unit Test and Inspection - CAN/ULC S536-04</b></font><br /><br />
							<table style="font-size: 30px; border: 1px solid #000000;" width="100%" cellpadding="5">
							 <tr>
							  <td width="40%">Annunciator or remote trouble signal unit location:</td>
							  <td width="60%">&nbsp;</td>
							 </tr>
							 <tr>
							  <td width="40%">Annunciator or remote trouble signal unit identification:</td>
							  <td width="60%">&nbsp;</td>
							 </tr>
							</table>';

        $html .= parent::getQuestionsHTML(null, $typeID, 9, array(1 => 'Yes', 0 => 'No', 'N/A' => 'N/A'), false);

        $html .= '<br pagebreak="true"/>';
        $html .= $header;
        $html .= '<font size="10"><b>E2.7 Annunciator or Sequential Displays - CAN/ULC S536-04</b></font><br /><br />
							<table style="font-size: 30px; border: 1px solid #000000;" width="100%" cellpadding="5">
							 <tr>
							  <td width="40%">Annunciator or remote trouble signal unit location:</td>
							  <td width="60%">&nbsp;</td>
							 </tr>
							 <tr>
							  <td width="40%">Annunciator or remote trouble signal unit identification:</td>
							  <td width="60%">&nbsp;</td>
							 </tr>
							</table>';

        $html .= parent::getQuestionsHTML(null, $typeID, 9, array(1 => 'Yes', 0 => 'No', 'N/A' => 'N/A'), false);
//
        $html .= '<br pagebreak="true"/>';
        $html .= $header;
        $html .= '<font size="10"><b>E2.8 Remote Trouble Signal Unit Test and Inspection - CAN/ULC S536-04</b></font><br /><br />
							<table style="font-size: 30px; border: 1px solid #000000;" width="100%" cellpadding="5">
							 <tr>
							  <td width="40%">Remote trouble signal unit location:</td>
							  <td width="60%">&nbsp;</td>
							 </tr>
							 <tr>
							  <td width="40%">Remote trouble signal unit identification:</td>
							  <td width="60%">&nbsp;</td>
							 </tr>
							</table>';

        $html .= parent::getQuestionsHTML(null, $typeID, 11, array(1 => 'Yes', 0 => 'No', 'N/A' => 'N/A'), false);

        $html .= '<br pagebreak="true"/>';
        $html .= $header;
        $html .= '<font size="10"><b>E2.9 Printer Test - CAN/ULC S536-04</b></font><br /><br />
							<table style="font-size: 30px; border: 1px solid #000000;" width="100%" cellpadding="5">
							 <tr>
							  <td width="40%">Printer location:</td>
							  <td width="60%">&nbsp;</td>
							 </tr>
							 <tr>
							  <td width="40%">Printer identification:</td>
							  <td width="60%">&nbsp;</td>
							 </tr>
							</table>';

        $html .= parent::getQuestionsHTML(null, $typeID, 12, array(1 => 'Yes', 0 => 'No', 'N/A' => 'N/A'), false);

        $html .= '<br pagebreak="true"/>';
        $html .= $header;
        $html .= '<font size="10"><b>E2.10 Communication Link Test - CAN/ULC S536-04</b></font><br /><br />
							<table style="font-size: 30px; border: 1px solid #000000;" width="100%" cellpadding="5">
							 <tr>
							  <td width="40%">Control unit or transponder location:</td>
							  <td width="60%">&nbsp;</td>
							 </tr>
							 <tr>
							  <td width="40%">Control unit or transponder identification:</td>
							  <td width="60%">&nbsp;</td>
							 </tr>
							 <tr>
							  <td width="40%">Data communication link identification:</td>
							  <td width="60%">&nbsp;</td>
							 </tr>
							</table>';
        $html .= parent::getQuestionsHTML(null, $typeID, 13, array(1 => 'Yes', 0 => 'No', 'N/A' => 'N/A'), false);

        $html .= '<br pagebreak="true"/>';
        $html .= $header;
        $html .= '<font size="10"><b>E2.11 Ancillary Device Circuit Test - CAN/ULC S536-04</b></font><br /><br />
							<table style="font-size: 25px; border: 1px solid #000;" cellpadding="3" cellspacing="0" width="100%" border="1">
							 <tr bgcolor="#000000">
							  <td colspan="2" style="color: #ffffff;">Record Specific Type of Ancillary Circuit</td>
							 </tr>
							 <tr>
							  <td>&nbsp;</td>
							  <td>&nbsp;</td>
							 </tr>
							 <tr>
							  <td>&nbsp;</td>
							  <td>&nbsp;</td>
							 </tr>
							 <tr>
							  <td>&nbsp;</td>
							  <td>&nbsp;</td>
							 </tr>
							</table>
							<br />
							<font size="5">Note: The tests reported on this Form do not include the actual operational test of acillary devices</font>';

        $html .= '<br pagebreak="true"/>';
        $html .= $header;
        $html .= '<font size="10"><b>E2.12 Remarks - CAN/ULC S536-04</b></font>'.parent::dottedLine(10);


        $html .= '<br pagebreak="true"/>';
        $html .= $header;
        $html .= '<font size="10"><b>E3.1 Field Device Testing - Legend and Notes - CAN/ULC S536-04</b></font><br /><br />
							<table style="font-size: 25px; border: 1px solid #000;" cellpadding="3" cellspacing="0" width="100%" border="1">
							 <tr bgcolor="#000000" style="font-weight: bold; color: #ffffff;" align="center">
							  <td width="10%">Device</td>
							  <td width="30%">Description</td>
							  <td width="30%">Type</td>
							  <td width="30%">Model No</td>
							 </tr>
							 <tr>
							  <td width="10%">M</td>
							  <td width="30%">Manual Pull Station</td>
							  <td width="30%" align="center">&nbsp;</td>
							  <td width="30%" align="center">&nbsp;</td>
							 </tr>
							 <tr>
							  <td width="10%">RHT</td>
							  <td width="30%">Heat Detector, Restorable</td>
							  <td width="30%" align="center">&nbsp;</td>
							  <td width="30%" align="center">&nbsp;</td>
							 </tr>
							  <tr>
							  <td width="10%">HT</td>
							  <td width="30%" align="center">Heat Detector, Non-restoreable</td>
							  <td width="30%" align="center">&nbsp;</td>
							  <td width="30%" align="center">&nbsp;</td>
							 </tr>
							 <tr valign="top">
							  <td>S</td>
							  <td>
							  	Smoke Detector
							  	<br /><br />
							  	Sensitivity test method or test equiptment:<br />
							  	Model/Method: &nbsp;
							  	<br /><br />
							  	Manufacturer Sensitivity Range:<br />
							  	Sensitivity Range: &nbsp;
							  </td>
							  <td width="30%" align="center">N/A<br />&nbsp;</td>
							  <td width="30%" align="center">N/A<br />&nbsp;</td>
							 </tr>
							 <tr>
							  <td width="10%">RI</td>
							  <td width="30%">Remote Indicator Unit</td>
							  <td width="30%" align="center">&nbsp;</td>
							  <td width="30%" align="center">&nbsp;</td>
							 </tr>
							 <tr>
							  <td width="10%">DS</td>
							  <td width="30%">Duct Smoke Detector</td>
							  <td width="30%" align="center">&nbsp;</td>
							  <td width="30%" align="center">&nbsp;</td>
							 </tr>
							 <tr>
							  <td width="10%">--</td>
							  <td width="30%">Other type of Detector</td>
							  <td width="30%" align="center">&nbsp;</td>
							  <td width="30%" align="center">&nbsp;</td>
							 </tr>
							 <tr>
							  <td width="10%">SFD</td>
							  <td width="30%">Supporting Field Device</td>
							  <td width="30%" align="center">&nbsp;</td>
							  <td width="30%" align="center">&nbsp;</td>
							 </tr>
							 <tr>
							  <td width="10%">FS</td>
							  <td width="30%">Sprinkler Flow Switch</td>
							  <td width="30%" align="center">&nbsp;</td>
							  <td width="30%" align="center">&nbsp;</td>
							 </tr>
							 <tr>
							  <td width="10%">SS</td>
							  <td>Sprinkler Supervisory Device</td>
							  <td width="30%" align="center">&nbsp;</td>
							  <td width="30%" align="center">&nbsp;</td>
							 </tr>
							 <tr>
							  <td width="10%">--</td>
							  <td width="30%">Other Supervisory Devices (low pressure, low water,low temp,power loss etc.)</td>
							  <td width="30%" align="center">&nbsp;</td>
							  <td width="30%" align="center">&nbsp;</td>
							 </tr>
							 <tr>
							  <td width="10%">EM</td>
							  <td width="30%">Fault Isolation Module</td>
							  <td width="30%" align="center">&nbsp;</td>
							  <td width="30%" align="center">&nbsp;</td>
							 </tr>
							 <tr>
							  <td width="10%">B</td>
							  <td width="30%">Bell</td>
							  <td width="30%" align="center">&nbsp;</td>
							  <td width="30%" align="center">&nbsp;</td>
							 </tr>
							 <tr>
							  <td width="10%">H</td>
							  <td width="30%">Horn</td>
							  <td width="30%" align="center">&nbsp;</td>
							  <td width="30%" align="center">&nbsp;</td>
							 </tr>
							 <tr>
							  <td width="10%">V</td>
							  <td width="30%">Visible Signal Device</td>
							  <td width="30%" align="center">&nbsp;</td>
							  <td width="30%" align="center">&nbsp;</td>
							 </tr>
							 <tr>
							  <td width="10%">SP</td>
							  <td width="30%">Cone Type Speaker</td>
							  <td width="30%" align="center">&nbsp;</td>
							  <td width="30%" align="center">&nbsp;</td>
							 </tr>
							 <tr>
							  <td width="10%">HSP</td>
							  <td width="30%">Horn Type Speaker</td>
							  <td width="30%" align="center">&nbsp;</td>
							  <td width="30%" align="center">&nbsp;</td>
							 </tr>
							 <tr>
							  <td width="10%">AD</td>
							  <td width="30%">Ancillary Device</td>
							  <td width="30%" align="center">&nbsp;</td>
							  <td width="30%" align="center">&nbsp;</td>
							 </tr>
							 <tr>
							  <td width="10%">ET</td>
							  <td width="30%">Emergency Telephone</td>
							  <td width="30%" align="center">&nbsp;</td>
							  <td width="30%" align="center">&nbsp;</td>
							 </tr>
							 <tr>
							  <td width="10%">EOL</td>
							  <td width="30%">End of Line Resistor</td>
							  <td width="30%" align="center">&nbsp;</td>
							  <td width="30%" align="center">&nbsp;</td>
							 </tr>
							</table><br />

                                                        <font size="7"><b>The following notes apply to Appendix E3.2, Individual Device Record:</b></font><br />
                                                        <table style="font-size: 30px;" cellpadding="0" cellspacing="5" width="100%" border="0">';
        foreach ($notes_array as $num => $note) {
            $html .= '<tr>
                <td width="11%"><b>Note ' . $num . '.</b></td>
                <td width="91%">' . $note . '</td>
               </tr>';
        }

        $html .= '</table>';
        
        
        $html .= '<br pagebreak="true"/>';
        $html .= $header;
        
        $html .= '<h3>E3.2 Device Record - CAN/ULC S536-04</h3>
                                                            <table style="font-size: 25px; border: 1px solid #000;" cellpadding="3" cellspacing="0" width="100%" border="1">
                                                             <tr bgcolor="#000000" style="font-weight: bold; color: #ffffff;" align="center">
                                                              <td width="20%">Location</td>
                                                              <td width="10%">Device Type</td>
                                                              <td width="10%">Correctly Installed</td>
                                                              <td width="10%">Requires Service</td>
                                                              <td width="10%">Alarm Operation Confirmed</td>
                                                              <td width="10%">Annunciator Indication Confirmed</td>
                                                              <td width="10%">Zone Address</td>
                                                              <td width="10%">Smoke Sensitivity</td>
                                                              <td width="10%">Remarks</td>
                                                             </tr>';
        for($i=0;$i<10;$i++){
            $html .= '<tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>';
        }
        $html .= '</table>';
        


        return $html;
    }

}

?>