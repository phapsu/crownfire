<?php
//include('../blank_document.class.php');
class document_10 extends blank_document {
 
    public function show($customerInfo){
        //$html = parent::tableDottedHeader($customerInfo['name']);
        
                
                $html = '<table style="font-size: 25px;" cellpadding="0" cellspacing="0" width="100%">
                                                        <tr valign="top"><td colspan="2"><br></td></tr>
							 <tr>
							  <td width="30%"><b>Location:</b></td>
							  <td width="70%">' .@$_POST['location'].self::dottedLine(1). '</td>
							 </tr>
							 <tr>
							  <td><b>Date:</b></td>
							  <td>' . @$_POST['date'].self::dottedLine(1).'</td>
							 </tr>
							 <tr>
							  <td><b>Owner:</b></td>
							  <td>'.@$_POST['owner'].self::dottedLine(1). '</td>
							 </tr>
							 <tr>
							  <td><b>Description of Equiptment:</b></td>
							  <td>' .@$_POST['description'].self::dottedLine(1). '</td>
							 </tr>
							</table>
							<br /><br />

							<font size="10"><b>Fire Pump Info</b></font><br /><br />

							<table style="font-size: 25px; border: 1px solid #000000;" cellpadding="0" cellspacing="5" width="100%">
							 <tr bgcolor="#EEEEEE" align="center">
							  <td colspan="2" width="50%"><b>Driver</b></td>
							  <td colspan="2" width="50%"><b>Pump</b></td>
							 </tr>
							 <tr>
							  <td width="25%"><b>Horsepower:</b></td>
							  <td width="25%">' .self::dottedLine(1). '</td>
							  <td width="25%"><b>Manufacturer:</b></td>
							  <td width="25%">' .self::dottedLine(1). '</td>
							 </tr>
							 <tr>
							  <td width="25%"><b>Manufacturer:</b></td>
							  <td width="25%">' .self::dottedLine(1). '</td>
							  <td width="25%"><b>Sunction:</b></td>
							  <td width="25%">' .self::dottedLine(1). '</td>
							 </tr>
							 <tr>
							  <td width="25%"><b>Voltage:</b></td>
							  <td width="25%">' .self::dottedLine(1).'</td>
							  <td width="25%"><b>Discharge:</b></td>
							  <td width="25%">' .self::dottedLine(1). '</td>
							 </tr>
							 <tr>
							  <td width="25%"><b>Rated RPM (Synch):</b></td>
							  <td width="25%">' .self::dottedLine(1). '</td>
							  <td width="25%"><b>Head Dia:</b></td>
							  <td width="25%">'.self::dottedLine(1). '</td>
							 </tr>
							 <tr>
							  <td width="25%"><b>Full Load Amperage:</b></td>
							  <td width="25%">' .self::dottedLine(1). '</td>
							  <td width="25%"><b>RPM:</b></td>
							  <td width="25%">' .self::dottedLine(1). '</td>
							 </tr>
							 <tr>
							  <td width="25%"><b>Continuous Amperage:</b></td>
							  <td width="25%">'.self::dottedLine(1). '</td>
							  <td width="25%"><b>GPM:</b></td>
							  <td width="25%">' .self::dottedLine(1). '</td>
							 </tr>
							 <tr>
							  <td width="25%"><b>Model:</b></td>
							  <td width="25%">' .self::dottedLine(1). '</td>
							  <td width="25%"><b>Head:</b></td>
							  <td width="25%">' .self::dottedLine(1). '</td>
							 </tr>
							 <tr>
							  <td width="25%"><b>Serial Number:</b></td>
							  <td width="25%">' .self::dottedLine(1). '</td>
							  <td width="25%"><b>Model:</b></td>
							  <td width="25%">' .self::dottedLine(1). '</td>
							 </tr>
							 <tr>
							  <td width="25%">&nbsp; </td>
							  <td width="25%">&nbsp; </td>
							  <td width="25%"><b>Serial Number:</b></td>
							  <td width="25%">'.self::dottedLine(1). '</td>
							 </tr>
							</table>
							<br /><br />

							<font size="10"><b>Associated Piping</b></font><br /><br />

							<table style="font-size: 25px; border: 1px solid #000000;" cellpadding="0" cellspacing="5" width="100%">
							 <tr>
							  <td width="25%"><b>Suction Piping:</b></td>
							  <td width="25%">' .self::dottedLine(1). '</td>
							  <td width="25%"><b>Control Valve:</b></td>
							  <td width="25%">'.self::dottedLine(1). '</td>
							 </tr>
							 <tr>
							  <td width="25%"><b>Discharge Piping:</b></td>
							  <td width="25%">' .self::dottedLine(1). '</td>
							  <td width="25%"><b>Control Valve:</b></td>
							  <td width="25%">' .self::dottedLine(1). '</td>
							 </tr>
							 <tr>
							  <td width="25%"><b>Sunction Check Valve:</b></td>
							  <td width="25%">' .self::dottedLine(1). '</td>
							  <td width="25%"><b>Discharge Check Valve:</b></td>
							  <td width="25%">' .self::dottedLine(1). '</td>
							 </tr>
							 <tr>
							  <td width="25%"><b>Pressure Relief Valve:</b></td>
							  <td width="25%">' .self::dottedLine(1).'</td>
							  <td width="25%"><b>Set For:</b></td>
							  <td width="25%">' .self::dottedLine(1). '</td>
							 </tr>
							</table><br /><br />
                                                        
                                                        <br pagebreak="true"/>    

                                                        <font size="10"><b>Test Data</b></font><br /><br />

							<table style="font-size: 25px; border: 1px solid #000000;" cellpadding="0" cellspacing="5" width="100%">
							 <tr>
							  <td><b>Time of Test</b></td>
							  <td colspan="3" align="left">' .self::dottedLine(1). '</td>
							 </tr>
							 <tr>
							  <td width="40%"><b>Static Pressure Before Test Sunction:</b></td>
							  <td width="20%">' .self::dottedLine(1). '</td>
							  <td width="20%"><b>Discharge:</b></td>
							  <td width="20%">' .self::dottedLine(1).'</td>
							 </tr>
							 <tr>
							  <td><b>Cut in Pressure:</b></td>
							  <td>'.self::dottedLine(1). '</td>
							  <td><b>Cut Out Pressure:</b></td>
							  <td>'.self::dottedLine(1).'</td>
							 </tr>
							 <tr>
							  <td><b>Static Pressure After Test: Suction:</b></td>
							  <td>' .self::dottedLine(1). '</td>
							  <td><b>Discharge:</b></td>
							  <td>' .self::dottedLine(1). '</td>
							 </tr>
							 <tr>
							  <td><b>Outlet Used for Testing:</b></td>
							  <td colspan="3">' .self::dottedLine(1). '</td>
							 </tr>
							 <tr>
							  <td><b>Supervisory Valves Checked:</b></td>
							  <td colspan="3">' .self::dottedLine(1). '</td>
							 </tr>
							 <tr>
							  <td><b>Packings:</b></td>
							  <td>' .self::dottedLine(1). '</td>
							  <td><b>RPM Measured:</b></td>
							  <td>' .self::dottedLine(1). '</td>
							 </tr>
							 <tr>
							  <td><b>Full Load Amperage Meassured:</b></td>
							  <td colspan="3">' .self::dottedLine(1). '</td>
							 </tr>
							 <tr>
							  <td><b>Voltage Drop Across Motor Leads:</b></td>
							  <td colspan="3">' .self::dottedLine(1). '</td>
							 </tr>
							 <tr>
							  <td><b>Vacuum Clean Motor Inside:</b></td>
							  <td colspan="3">' .self::dottedLine(1). '</td>
							 </tr>
							 <tr>
							  <td><b>Check Angular Coupling Alignment:</b></td>
							  <td colspan="3">' .self::dottedLine(1). '</td>
							 </tr>
							 <tr>
							  <td><b>Check Parallel Coupling Alignment:</b></td>
							  <td colspan="3">' .self::dottedLine(1). '</td>
							 </tr>
							 <tr>
							  <td><b>Pump Level:</b></td>
							  <td>' .self::dottedLine(1). '</td>
							  <td><b>Base Firm:</b></td>
							  <td>'.self::dottedLine(1).'</td>
							 </tr>
							 <tr>
							  <td><b>Comments:</b></td>
							  <td colspan="3">' .self::dottedLine(1).'</td>
							 </tr>
							</table>
							<br /><br />
							<table style="font-size: 25px;" cellpadding="0" cellspacing="5" width="100%">
							 <tr>
							  <td width="20%"><b>Lead Technicion:</b></td>
							  <td colspan="3">' .self::dottedLine(1). '</td>
							 </tr>
							</table><br /><br />'; 
        
        return $html;
    }
}
?> 