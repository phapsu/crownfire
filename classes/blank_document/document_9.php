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
            array('Address', @$_POST['address']),
            array('Date', @$_POST['date']),
            array('System Manufacturer', @$_POST['system_manufacturer']),
            array('Model Number', @$_POST['model_number']),
        );
        $header = parent::tableHeader($headerTable);

        //begin report

        $html = $header;
            
        $html .= '<font size="10"><b>E1. Fire Alarm System Annual Test and Inspection Report - CAN/ULC S536-04</b></font><br /><br />';
        
        $html .= '<table width="100%" cellpadding="5" border="1" style="font-size: 25px; border: 1px solid #000000;">
                    <tr bgcolor="#000000" align="center">
                        <td width="5%">&nbsp; </td>
                        <td width="65%">&nbsp; </td>
                        <td width="10%" align="center" style="color: #ffffff;">Yes</td>
                        <td width="10%" align="center" style="color: #ffffff;">No</td>
                        <td width="10%" align="center" style="color: #ffffff;">N/A</td>
                    </tr>
                    <tr>
                        <td>A.</td>
                        <td>System provides single-stage operation</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>B.</td>
                        <td>System provides single-stage operation</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>C.</td>
                        <td>The entire fire alarm system has been inspected and tested in accordance with CAN/ULC-S536, inspection and testing of fire alarm systems. </td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>D.</td>
                        <td>The fire alarm system documentation is on site and includes a description of the system </td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>E.</td>
                        <td>The fire alarm system is fully functional </td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>F.</td>
                        <td>The fire alarm system has deficiences noted on the pages attached </td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>G.</td>
                        <td>A copy of this report will be given to the following, who is owner or ' . "owner's" . ' representative for this building </td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                </table><br/><br/>';



        $html .= '<br /><b>Comments</b>: ' . parent::dottedLine(7);

        $html .= '<br /><br /><br />This is to certify that the information contained in this Fire Alarm SYstems Annual Test and Inspection Report is correct and complete. ';

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


        $html .= '<table width="100%" cellpadding="5" border="1" style="font-size: 25px; border: 1px solid #000000;">
                    <tr bgcolor="#000000" align="center">
                        <td width="5%">&nbsp; </td>
                        <td width="65%">&nbsp; </td>
                        <td width="10%" align="center" style="color: #ffffff;">Yes</td>
                        <td width="10%" align="center" style="color: #ffffff;">No</td>
                        <td width="10%" align="center" style="color: #ffffff;">N/A</td>
                    </tr>
                    <tr>
                        <td>A.</td>
                        <td>Power ' . "'ON'" . ' visual indicator operators </td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>B.</td>
                        <td>Common Visual trouble signal operates </td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>C.</td>
                        <td>Common audible trouble signal operates </td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>D.</td>
                        <td>Trouble signal silence switch operates </td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>E.</td>
                        <td>Main power supply failure trouble signal operates </td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>F.</td>
                        <td>Ground fault tested on positive and negative initiates trouble signal </td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>G.</td>
                        <td>Alert signal operates </td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>H.</td>
                        <td>Alarm signal operates </td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>I.</td>
                        <td>Automatic transfer from alert signal to alarm signal operates </td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>J.</td>
                        <td>Manual transfer from alert signal to alarm signal operates </td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>K.</td>
                        <td>Automatic transfer from alert signal to alarm signal cancel (acknowledge) feature operates on a two-stage system </td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>L.</td>
                        <td>Alarm signal silence inhibit function operates </td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>M.</td>
                        <td>Alarm signal manual silence operates </td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>N.</td>
                        <td>Alarm signal silence visual indication operates</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>0.</td>
                        <td>Alarm signal when silenced, automatically re-initiates upon subsequent alarm </td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>P.</td>
                        <td>Alarm signal silence automatic cut-out timer </td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>Q.</td>
                        <td>Audible and visual alert signals and alarm signals programmed and operate per design and specification, or documentation as detailed in Appendix C, Description of Fire Alarm System for Inspection and Test Procedures 	</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>R.</td>
                        <td>Input circuit alarm and supervisory operation including audible and visual indication operates</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>S.</td>
                        <td>Input circuit supervision fault causes a trouble indiciation </td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>T.</td>
                        <td>Output circuit alarm indicators operate </td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>U.</td>
                        <td>Output circuit supervision fault causes a trouble indication </td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>V.</td>
                        <td>Visual indicator test (lamp test) </td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>W.</td>
                        <td>Coded signal sequences operate not less than the required number of times and the correct alarm signal operates thereafter </td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>X.</td>
                        <td>Coded signal sequences are not interrupted by subsequent alarms </td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>Y.</td>
                        <td>Ancillary device by pass will result in a trouble signal </td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>Z.</td>
                        <td>Input circuit to output circuit operation, including ancillary device circuits, for correct program operation, as per design and specification or documentation as detailed in Appendix C. Description of Fire Alarm System for Inspection and Test Procedures </td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>AA.</td>
                        <td>Fire alarm system reset operates</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>BB.</td>
                        <td>Main power supply to emergency power supply transfer operates </td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>CC.</td>
                        <td>Status change confirmation (smoke detectors only) verified. [Refer Subsection 5.7.4.3, Status change confirmation (Alarm Verification Feature)] </td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>DD.</td>
                        <td>Receipt of the alarm transmission to the fire signal receiving centre </td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>EE.</td>
                        <td>Receipt of the supervisory transmission to the fire signal receiving centre </td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>FF.</td>
                        <td>Receipt of the trouble transmission to the fire signal receiving centre </td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>GG.</td>
                        <td>Record the name and telephone number of the fire signal receiving centre </td>
                        <td colspan="3">Name:<br/>Telephone:</td>                        
                    </tr>
                    <tr>
                        <td>HH.</td>
                        <td>Operation of the fire signal receiving centre disconnect means results in a specific trouble indication at the control unit or transponder and transmits a trouble signal to the fire signal receiving centre </td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                </table><br/><br/>';


        $html .= '<br pagebreak="true"/>';
        $html .= $header;

        $html .= '<font size="10"><b>E2.2 Voice Communication Test - CAN/ULC S536-04</b></font><br />';

        $html .= '<table width="100%" cellpadding="5" border="1" style="font-size: 25px; border: 1px solid #000000;">
                    <tr bgcolor="#000000" align="center">
                        <td width="5%">&nbsp; </td>
                        <td width="65%">&nbsp; </td>
                        <td width="10%" align="center" style="color: #ffffff;">Yes</td>
                        <td width="10%" align="center" style="color: #ffffff;">No</td>
                        <td width="10%" align="center" style="color: #ffffff;">N/A</td>
                    </tr>
                    <tr>
                        <td>A.</td>
                        <td>Power ' . "'ON'" . ' visual indicator operators </td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>B.</td>
                        <td>Common Visual trouble signal operates </td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>C.</td>
                        <td>Common audible trouble signal operates </td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>D.</td>
                        <td>Trouble signal silence switch operates </td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>E.</td>
                        <td>All call voice paging, including visual indicator operates</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>F.</td>
                        <td>Output circuits for selective voice paging, including visual indication, operates </td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>G.</td>
                        <td>Microphone, including press to talk switch, operates </td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>H.</td>
                        <td>Operation of voice paging does not interfere with initial inhibit time of alert signal or alarm signal</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>I.</td>
                        <td>All call voice paging operates (on emergency power supply) </td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>J.</td>
                        <td>Upon failure of one amplifier, system automatically transfers to backup amplifier(s) </td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>K.</td>
                        <td>Circuits for emergency telephone call-in operation, including audible and visual indication, operates </td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>L.</td>
                        <td>Circuits for emergency telephones for operation, including two-way voice communication, operates </td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>M.</td>
                        <td>Circuits for emergency telephone trouble operation, including visual indication, operates </td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>N.</td>
                        <td>Emergency telephone verbal communication operates </td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>0.</td>
                        <td>Emergency telephone operable or in-use tone at handset operates </td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                 </table>';


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

        $html .= '<table width="100%" cellpadding="5" border="1" style="font-size: 25px; border: 1px solid #000000;">
                    <tr bgcolor="#000000" align="center">
                        <td width="5%">&nbsp; </td>
                        <td width="65%">&nbsp; </td>
                        <td width="10%" align="center" style="color: #ffffff;">Yes</td>
                        <td width="10%" align="center" style="color: #ffffff;">No</td>
                        <td width="10%" align="center" style="color: #ffffff;">N/A</td>
                    </tr>
                    <tr>
                        <td>A.</td>
                        <td>Input circuit designations correctly identified in relation to connected field devices</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>B.</td>
                        <td>Output circuit designations correctly identified in relation to connected field devices </td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>C.</td>
                        <td>Correct designations for common control functions and indicators </td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>D.</td>
                        <td>Plug-in components and modules securely in place </td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>E.</td>
                        <td>Plug-in cables securely in place </td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>F.</td>
                        <td>Record the date, revision and version of firmware and software program </td>
                        <td coslpan="3">Date:<br/>Rev<br/>Ver</td>                        
                    </tr>
                    <tr>
                        <td>G.</td>
                        <td>Clean and free of dust and dirt </td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>H.</td>
                        <td>Fuses in accordance with manufacturer' . "'s" . ' specification </td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>I.</td>
                        <td>Control unit or transponder lock functional </td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>J.</td>
                        <td>Termination points from wiring to field devices secure </td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>                    
                 </table>';

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


        $html .= '<table width="100%" cellpadding="5" border="1" style="font-size: 25px; border: 1px solid #000000;">
                    <tr bgcolor="#000000" align="center">
                        <td width="5%">&nbsp; </td>
                        <td width="65%">&nbsp; </td>
                        <td width="10%" align="center" style="color: #ffffff;">Yes</td>
                        <td width="10%" align="center" style="color: #ffffff;">No</td>
                        <td width="10%" align="center" style="color: #ffffff;">N/A</td>
                    </tr>
                    <tr>
                        <td>A.</td>
                        <td>Fused in accordance with the manufacturer' . "'s" . ' marked rating of the system </td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>B.</td>
                        <td>Adequate to meet the requirements of the system </td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>                                  
                 </table>';


        $html .= '<br pagebreak="true"/>';
        $html .= $header;
        $html .= '<font size="10"><b>E2.5 (A) Emergency Power Supply Test and Inspection - CAN/ULC S536-04</b></font><br /><br />
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



        $html .= '<table width="100%" cellpadding="5" border="1" style="font-size: 25px; border: 1px solid #000000;">
                    <tr bgcolor="#000000" align="center">
                        <td width="5%">&nbsp; </td>
                        <td width="65%">&nbsp; </td>
                        <td width="10%" align="center" style="color: #ffffff;">Yes</td>
                        <td width="10%" align="center" style="color: #ffffff;">No</td>
                        <td width="10%" align="center" style="color: #ffffff;">N/A</td>
                    </tr>
                    <tr>
                        <td>A.</td>
                        <td>Correct battery type as recommended by manufacturer </td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>B.</td>
                        <td>Correct battery rating as determined by battery calculations based on full system load </td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>C.</td>
                        <td>Battery voltage with main power supply ' . "'ON'" . ' </td>
                        <td colspan="2">&nbsp;</td>                        
                        <td>V dc</td>
                    </tr>
                    <tr>
                        <td rowspan="2">D.</td>
                        <td rowspan="2">Battery voltage and current with main power supply ' . "'OFF'" . ' and fire alarm system in supervisory condition </td>
                        <td>Voltage</td>
                        <td>&nbsp;</td>
                        <td>V dc</td>
                    </tr>
                    <tr>                        
                        <td>Current</td>
                        <td>&nbsp;</td>
                        <td>A</td>
                    </tr>
                    <tr>
                        <td rowspan="2">E.</td>
                        <td rowspan="2">Battery voltage and current with main power supply ' . "'OFF'" . ' and fire alarm system in full load alarm condition </td>
                        <td>Voltage</td>
                        <td>&nbsp;</td>
                        <td>V dc</td>
                    </tr>
                    <tr>                        
                        <td>Current</td>
                        <td>&nbsp;</td>
                        <td>A</td>
                    </tr>
                    <tr>
                        <td>F.</td>
                        <td>Charging current </td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>A</td>
                    </tr>
                    <tr>
                        <td>G.</td>
                        <td>Physical damage </td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>H.</td>
                        <td>Terminals cleaned and lubricated </td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>I.</td>
                        <td>Terminals clamped lightly </td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>J.</td>
                        <td>Correct electrolyte levels</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>K.</td>
                        <td>Specific gravity of electrolyte is within manufacturer' . "'s" . ' specification </td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>L.</td>
                        <td>Electrolyte leakage </td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>M.</td>
                        <td>Adequate ventilation </td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>N.</td>
                        <td>Battery manufacturer' . "'s" . ' date code or in-service date </td>
                        <td>Date</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>0.</td>
                        <td>Disconnection causes trouble signal </td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>P.</td>
                        <td>Required supervisory load for 24 h followed by the required full load operation </td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>Q.</td>
                        <td>A silent test by using the load resistor method may be used for the full duration test (Refer to Appendix F1, Silent Test) </td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>R.</td>
                        <td>Silent accelerated test (Refer to Appendix F2, Silent Accelerated Test) </td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>S.</td>
                        <td>A battery capacity meter test (Refer to Appendix F3, Battery Capacity Meter Test) </td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>T.</td>
                        <td>In lieu of the above battery tests, replace the battery with a new set having a current date code, amp-hour capacity and type as recommended by the manufacturer. </td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>U.</td>
                        <td>Record calculated battery capacity (Refer to Appendix F4 1 C) </td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>Ah</td>
                    </tr>
                    <tr>
                        <td>V.</td>
                        <td>Record battery terminal voltage after completion of tests </td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>V dc</td>
                    </tr>
                    <tr>
                        <td>W.</td>
                        <td>Battery voltage not less than 85% of its rating after the tests </td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>X.</td>
                        <td>Generator provides power to the AC circuit serving the fire alarm system </td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>Y.</td>
                        <td>Trouble condition at the emergency generator shall result in an audible common trouble signal and a visual indication at the required annunciator </td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                </table>';

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


        $html .= '<table width="100%" cellpadding="5" border="1" style="font-size: 25px; border: 1px solid #000000;">
                    <tr bgcolor="#000000" align="center">
                        <td width="5%">&nbsp; </td>
                        <td width="65%">&nbsp; </td>
                        <td width="10%" align="center" style="color: #ffffff;">Yes</td>
                        <td width="10%" align="center" style="color: #ffffff;">No</td>
                        <td width="10%" align="center" style="color: #ffffff;">N/A</td>
                    </tr>
                    <tr>
                        <td>A.</td>
                        <td>Correct battery type as recommended by manufacturer </td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>B.</td>
                        <td>Correct battery rating as determined by battery calculations based on full system load </td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>C.</td>
                        <td>Battery voltage with main power supply ' . "'ON'" . ' </td>
                        <td colspan="2">&nbsp;</td>                        
                        <td>V dc</td>
                    </tr>
                    <tr>
                        <td rowspan="2">D.</td>
                        <td rowspan="2">Battery voltage and current with main power supply ' . "'OFF'" . ' and fire alarm system in supervisory condition </td>
                        <td>Voltage</td>
                        <td>&nbsp;</td>
                        <td>V dc</td>
                    </tr>
                    <tr>                        
                        <td>Current</td>
                        <td>&nbsp;</td>
                        <td>A</td>
                    </tr>
                    <tr>
                        <td rowspan="2">E.</td>
                        <td rowspan="2">Battery voltage and current with main power supply ' . "'OFF'" . ' and fire alarm system in full load alarm condition </td>
                        <td>Voltage</td>
                        <td>&nbsp;</td>
                        <td>V dc</td>
                    </tr>
                    <tr>                        
                        <td>Current</td>
                        <td>&nbsp;</td>
                        <td>A</td>
                    </tr>
                    <tr>
                        <td>F.</td>
                        <td>Charging current </td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>A</td>
                    </tr>
                    <tr>
                        <td>G.</td>
                        <td>Physical damage </td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>H.</td>
                        <td>Terminals cleaned and lubricated </td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>I.</td>
                        <td>Terminals clamped lightly </td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>J.</td>
                        <td>Correct electrolyte levels</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>K.</td>
                        <td>Specific gravity of electrolyte is within manufacturer' . "'s" . ' specification </td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>L.</td>
                        <td>Electrolyte leakage </td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>M.</td>
                        <td>Adequate ventilation </td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>N.</td>
                        <td>Battery manufacturer' . "'s" . ' date code or in-service date </td>
                        <td>Date</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>0.</td>
                        <td>Disconnection causes trouble signal </td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>P.</td>
                        <td>Required supervisory load for 24 h followed by the required full load operation </td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>Q.</td>
                        <td>A silent test by using the load resistor method may be used for the full duration test (Refer to Appendix F1, Silent Test) </td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>R.</td>
                        <td>Silent accelerated test (Refer to Appendix F2, Silent Accelerated Test) </td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>S.</td>
                        <td>A battery capacity meter test (Refer to Appendix F3, Battery Capacity Meter Test) </td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>T.</td>
                        <td>In lieu of the above battery tests, replace the battery with a new set having a current date code, amp-hour capacity and type as recommended by the manufacturer. </td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>U.</td>
                        <td>Record calculated battery capacity (Refer to Appendix F4 1 C) </td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>Ah</td>
                    </tr>
                    <tr>
                        <td>V.</td>
                        <td>Record battery terminal voltage after completion of tests </td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>V dc</td>
                    </tr>
                    <tr>
                        <td>W.</td>
                        <td>Battery voltage not less than 85% of its rating after the tests </td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>X.</td>
                        <td>Generator provides power to the AC circuit serving the fire alarm system </td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>Y.</td>
                        <td>Trouble condition at the emergency generator shall result in an audible common trouble signal and a visual indication at the required annunciator </td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                </table>';


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



        $html .= '<table width="100%" cellpadding="5" border="1" style="font-size: 25px; border: 1px solid #000000;">
                    <tr bgcolor="#000000" align="center">
                        <td width="5%">&nbsp; </td>
                        <td width="65%">&nbsp; </td>
                        <td width="10%" align="center" style="color: #ffffff;">Yes</td>
                        <td width="10%" align="center" style="color: #ffffff;">No</td>
                        <td width="10%" align="center" style="color: #ffffff;">N/A</td>
                    </tr>
                    <tr>
                        <td>A.</td>
                        <td>Correct battery type as recommended by manufacturer </td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>B.</td>
                        <td>Correct battery rating as determined by battery calculations based on full system load </td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>C.</td>
                        <td>Battery voltage with main power supply ' . "'ON'" . ' </td>
                        <td colspan="2">&nbsp;</td>                        
                        <td>V dc</td>
                    </tr>
                    <tr>
                        <td rowspan="2">D.</td>
                        <td rowspan="2">Battery voltage and current with main power supply ' . "'OFF'" . ' and fire alarm system in supervisory condition </td>
                        <td>Voltage</td>
                        <td>&nbsp;</td>
                        <td>V dc</td>
                    </tr>
                    <tr>                        
                        <td>Current</td>
                        <td>&nbsp;</td>
                        <td>A</td>
                    </tr>
                    <tr>
                        <td rowspan="2">E.</td>
                        <td rowspan="2">Battery voltage and current with main power supply ' . "'OFF'" . ' and fire alarm system in full load alarm condition </td>
                        <td>Voltage</td>
                        <td>&nbsp;</td>
                        <td>V dc</td>
                    </tr>
                    <tr>                        
                        <td>Current</td>
                        <td>&nbsp;</td>
                        <td>A</td>
                    </tr>
                    <tr>
                        <td>F.</td>
                        <td>Charging current </td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>A</td>
                    </tr>
                    <tr>
                        <td>G.</td>
                        <td>Physical damage </td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>H.</td>
                        <td>Terminals cleaned and lubricated </td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>I.</td>
                        <td>Terminals clamped lightly </td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>J.</td>
                        <td>Correct electrolyte levels</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>K.</td>
                        <td>Specific gravity of electrolyte is within manufacturer' . "'s" . ' specification </td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>L.</td>
                        <td>Electrolyte leakage </td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>M.</td>
                        <td>Adequate ventilation </td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>N.</td>
                        <td>Battery manufacturer' . "'s" . ' date code or in-service date </td>
                        <td>Date</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>0.</td>
                        <td>Disconnection causes trouble signal </td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>P.</td>
                        <td>Required supervisory load for 24 h followed by the required full load operation </td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>Q.</td>
                        <td>A silent test by using the load resistor method may be used for the full duration test (Refer to Appendix F1, Silent Test) </td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>R.</td>
                        <td>Silent accelerated test (Refer to Appendix F2, Silent Accelerated Test) </td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>S.</td>
                        <td>A battery capacity meter test (Refer to Appendix F3, Battery Capacity Meter Test) </td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>T.</td>
                        <td>In lieu of the above battery tests, replace the battery with a new set having a current date code, amp-hour capacity and type as recommended by the manufacturer. </td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>U.</td>
                        <td>Record calculated battery capacity (Refer to Appendix F4 1 C) </td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>Ah</td>
                    </tr>
                    <tr>
                        <td>V.</td>
                        <td>Record battery terminal voltage after completion of tests </td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>V dc</td>
                    </tr>
                    <tr>
                        <td>W.</td>
                        <td>Battery voltage not less than 85% of its rating after the tests </td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>X.</td>
                        <td>Generator provides power to the AC circuit serving the fire alarm system </td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>Y.</td>
                        <td>Trouble condition at the emergency generator shall result in an audible common trouble signal and a visual indication at the required annunciator </td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                </table>';


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


        $html .= '<table width="100%" cellpadding="5" border="1" style="font-size: 25px; border: 1px solid #000000;">
                    <tr bgcolor="#000000" align="center">
                        <td width="5%">&nbsp; </td>
                        <td width="65%">&nbsp; </td>
                        <td width="10%" align="center" style="color: #ffffff;">Yes</td>
                        <td width="10%" align="center" style="color: #ffffff;">No</td>
                        <td width="10%" align="center" style="color: #ffffff;">N/A</td>
                    </tr>
                    <tr>
                        <td>A.</td>
                        <td>Correct battery type as recommended by manufacturer </td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>B.</td>
                        <td>Correct battery rating as determined by battery calculations based on full system load </td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>C.</td>
                        <td>Battery voltage with main power supply ' . "'ON'" . ' </td>
                        <td colspan="2">&nbsp;</td>                        
                        <td>V dc</td>
                    </tr>
                    <tr>
                        <td rowspan="2">D.</td>
                        <td rowspan="2">Battery voltage and current with main power supply ' . "'OFF'" . ' and fire alarm system in supervisory condition </td>
                        <td>Voltage</td>
                        <td>&nbsp;</td>
                        <td>V dc</td>
                    </tr>
                    <tr>                        
                        <td>Current</td>
                        <td>&nbsp;</td>
                        <td>A</td>
                    </tr>
                    <tr>
                        <td rowspan="2">E.</td>
                        <td rowspan="2">Battery voltage and current with main power supply ' . "'OFF'" . ' and fire alarm system in full load alarm condition </td>
                        <td>Voltage</td>
                        <td>&nbsp;</td>
                        <td>V dc</td>
                    </tr>
                    <tr>                        
                        <td>Current</td>
                        <td>&nbsp;</td>
                        <td>A</td>
                    </tr>
                    <tr>
                        <td>F.</td>
                        <td>Charging current </td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>A</td>
                    </tr>
                    <tr>
                        <td>G.</td>
                        <td>Physical damage </td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>H.</td>
                        <td>Terminals cleaned and lubricated </td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>I.</td>
                        <td>Terminals clamped lightly </td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>J.</td>
                        <td>Correct electrolyte levels</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>K.</td>
                        <td>Specific gravity of electrolyte is within manufacturer' . "'s" . ' specification </td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>L.</td>
                        <td>Electrolyte leakage </td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>M.</td>
                        <td>Adequate ventilation </td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>N.</td>
                        <td>Battery manufacturer' . "'s" . ' date code or in-service date </td>
                        <td>Date</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>0.</td>
                        <td>Disconnection causes trouble signal </td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>P.</td>
                        <td>Required supervisory load for 24 h followed by the required full load operation </td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>Q.</td>
                        <td>A silent test by using the load resistor method may be used for the full duration test (Refer to Appendix F1, Silent Test) </td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>R.</td>
                        <td>Silent accelerated test (Refer to Appendix F2, Silent Accelerated Test) </td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>S.</td>
                        <td>A battery capacity meter test (Refer to Appendix F3, Battery Capacity Meter Test) </td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>T.</td>
                        <td>In lieu of the above battery tests, replace the battery with a new set having a current date code, amp-hour capacity and type as recommended by the manufacturer. </td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>U.</td>
                        <td>Record calculated battery capacity (Refer to Appendix F4 1 C) </td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>Ah</td>
                    </tr>
                    <tr>
                        <td>V.</td>
                        <td>Record battery terminal voltage after completion of tests </td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>V dc</td>
                    </tr>
                    <tr>
                        <td>W.</td>
                        <td>Battery voltage not less than 85% of its rating after the tests </td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>X.</td>
                        <td>Generator provides power to the AC circuit serving the fire alarm system </td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>Y.</td>
                        <td>Trouble condition at the emergency generator shall result in an audible common trouble signal and a visual indication at the required annunciator </td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                </table>';



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


        $html .= '<table width="100%" cellpadding="5" border="1" style="font-size: 25px; border: 1px solid #000000;">
                    <tr bgcolor="#000000" align="center">
                        <td width="5%">&nbsp; </td>
                        <td width="65%">&nbsp; </td>
                        <td width="10%" align="center" style="color: #ffffff;">Yes</td>
                        <td width="10%" align="center" style="color: #ffffff;">No</td>
                        <td width="10%" align="center" style="color: #ffffff;">N/A</td>
                    </tr>
                    <tr>
                        <td>A.</td>
                        <td>Power ' . "'ON'" . ' indicator operates </td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>B.</td>
                        <td>Individual alarm and supervisory input zones are clearly indicated and separately designated </td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>C.</td>
                        <td>Individual alarm and supervisory zone designation labels are properly identified </td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>D.</td>
                        <td>Common trouble signal operates </td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>E.</td>
                        <td>Visual indicator test (lamp test) operates </td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>F.</td>
                        <td>Input wiring from control unit or transponder is supervised </td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>G.</td>
                        <td>Alarm signal silence visual indicator operates </td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>H.</td>
                        <td>Switches for ancillary functions operate as per design and specification, or documentation as detailed in Appendix C. Description of Fire Alarm System for Inspection and Test Procedures. </td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>I.</td>
                        <td>Other ancillary function visual indicators operate </td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>J.</td>
                        <td>Manual activation of alarm signal and indication operates </td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>K.</td>
                        <td>Displays are visible in installed location operates </td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>L.</td>
                        <td>Operates on emergency power </td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                </table>';

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


        $html .= '<table width="100%" cellpadding="5" border="1" style="font-size: 25px; border: 1px solid #000000;">
                    <tr bgcolor="#000000" align="center">
                        <td width="5%">&nbsp; </td>
                        <td width="65%">&nbsp; </td>
                        <td width="10%" align="center" style="color: #ffffff;">Yes</td>
                        <td width="10%" align="center" style="color: #ffffff;">No</td>
                        <td width="10%" align="center" style="color: #ffffff;">N/A</td>
                    </tr>
                    <tr>
                        <td>A.</td>
                        <td>Power ' . "'ON'" . ' indicator operates </td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>B.</td>
                        <td>Individual alarm and supervisory zone indication operates </td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>C.</td>
                        <td>Exception operation of each individual alarm and supervisory zone indication gives the identical indication, or lights the identical indicators at the other annunciator(s) and sequential display(s) </td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>D.</td>
                        <td>Specify method of confirmation </td>
                        <td coslpan="3">&nbsp;</td>                        
                    </tr>
                    <tr>
                        <td>E.</td>
                        <td>Minimum of one alarm zone and one supervisory zone tested per annunciator or sequential display to confirm operation </td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>F.</td>
                        <td>Individual alarm and supervisory zone designation labels are properly identified </td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>G.</td>
                        <td>Common trouble signal operates </td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>H.</td>
                        <td>Visual indicator test (lamp test) operates </td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>I.</td>
                        <td>Input wiring from control unit or transponder is supervised</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>J.</td>
                        <td>Alarm signal silence visual indicator operates </td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>K.</td>
                        <td>Switches for ancillary functions operate as per design and specification or documentation as detailed in Appendix C description of the Fire Alarm System for inspection and test procedures </td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>L.</td>
                        <td>Other ancillary functions visual indicators operate </td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>M.</td>
                        <td>Manual activation of alarm signal and indication operates </td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>N.</td>
                        <td>Displays are visible in installed location </td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                </table>';


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


        $html .= '<table width="100%" cellpadding="5" border="1" style="font-size: 25px; border: 1px solid #000000;">
                    <tr bgcolor="#000000" align="center">
                        <td width="5%">&nbsp; </td>
                        <td width="65%">&nbsp; </td>
                        <td width="10%" align="center" style="color: #ffffff;">Yes</td>
                        <td width="10%" align="center" style="color: #ffffff;">No</td>
                        <td width="10%" align="center" style="color: #ffffff;">N/A</td>
                    </tr>
                    <tr>
                        <td>A.</td>
                        <td>Input writing from control unit or transponder is supervised </td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>B.</td>
                        <td>Audible trouble signal silence operates </td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>C.</td>
                        <td>Visual trouble signal operates </td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>D.</td>
                        <td>Audible trouble signal operates </td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                 </table>';


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

        $html .= '<table width="100%" cellpadding="5" border="1" style="font-size: 25px; border: 1px solid #000000;">
                    <tr bgcolor="#000000" align="center">
                        <td width="5%">&nbsp; </td>
                        <td width="65%">&nbsp; </td>
                        <td width="10%" align="center" style="color: #ffffff;">Yes</td>
                        <td width="10%" align="center" style="color: #ffffff;">No</td>
                        <td width="10%" align="center" style="color: #ffffff;">N/A</td>
                    </tr>
                    <tr>
                        <td>A.</td>
                        <td>Operates as per design and specification or documentation as detailed in Appendix C, Description of Fire Alarm System for Inspection and Test Procedures  </td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>B.</td>
                        <td>Zone of each alarm initiating device is correctly printed </td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>C.</td>
                        <td>Rated voltage is present </td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>                    
                 </table>';

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


        $html .= '<table width="100%" cellpadding="5" border="1" style="font-size: 25px; border: 1px solid #000000;">
                    <tr bgcolor="#000000" align="center">
                        <td width="5%">&nbsp; </td>
                        <td width="65%">&nbsp; </td>
                        <td width="10%" align="center" style="color: #ffffff;">Yes</td>
                        <td width="10%" align="center" style="color: #ffffff;">No</td>
                        <td width="10%" align="center" style="color: #ffffff;">N/A</td>
                    </tr>
                    <tr>
                        <td>A.</td>
                        <td>Confirm that a trouble signal is received at the control unit or transponder under an open loop fault for each data communication link (DCL) </td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>B.</td>
                        <td>Where fault isolation modules are installed in data communication links serving field devices, wiring shall be shorted on the isolated side, annunciation of the fault confirmed, and then a field device on the source side shall be operated, and activation confirmed at the control unit or transponder </td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>C.</td>
                        <td>Control unit to control unit </td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>    
                    <tr>
                        <td>D.</td>
                        <td>Control unit to transponder </td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>    
                    <tr>
                        <td>E.</td>
                        <td>Transponder to transponder</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>    
                 </table>';


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
        $html .= '<font size="10"><b>E2.12 Remarks - CAN/ULC S536-04</b></font>' . parent::dottedLine(10);


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

        $html .= '<font size="10"><b>E3.2 Device Record - CAN/ULC S536-04 (Page 1)</b></font><br /><br />';

        $html .= '<table style="font-size: 25px; border: 1px solid #000;" cellpadding="3" cellspacing="0" width="100%" border="1">
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

        $document = new document($_REQUEST['id']);
        if ($_REQUEST['id']) {
            $formInfo = $document->getData('document_data_9_device', 'document_id', $_REQUEST['id'], true, null, true);
        } else {
            $formInfo = $document->getData('document_data_9_device', 'temp_id', $_REQUEST['temp_id'], true);
        }

        if (is_array($formInfo)) {
            $j=1;            
            foreach ($formInfo as $i => $form) {
                if (($i>0)&($i % 20 == 0)) {
                    $j++;
                    $html.= '</table>';
                    $html .= '<br pagebreak="true"/>';

                    $html .= $header;

                    $html .= '<font size="10"><b>E3.2 Device Record - CAN/ULC S536-04 (Page '.($j).')</b></font><br /><br />';

                    $html .= '<table style="font-size: 25px; border: 1px solid #000;" cellpadding="3" cellspacing="0" width="100%" border="1">
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
                    $html .= '<tr>
                        <td>' . stripslashes($form['location']) . '</td>
                        <td>' . stripslashes($form['device']) . '</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>';
                } else {
                    $html .= '<tr>
                        <td>' . stripslashes($form['location']) . '</td>
                        <td>' . stripslashes($form['device']) . '</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>';
                }
            }
        }
        $html .= '</table>';

        return $html;
    }

}

?>