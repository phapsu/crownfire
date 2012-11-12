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
 $documentInfo = $documentObj->getData('document_data_10_head', 'document_id', $document_id);
                $documentInfo = array_merge($documentInfo, $documentObj->getData('document_data_10_pump', 'document_id', $document_id));
                $documentInfo = array_merge($documentInfo, $documentObj->getData('document_data_10_test', 'document_id', $document_id));
                $documentInfo = array_merge($documentInfo, $documentObj->getData('document_data_10_piping', 'document_id', $document_id));

                $html .= '<table style="font-size: 30px;" cellpadding="0" cellspacing="5" width="100%">
							 <tr>
							  <td width="30%"><b>Location:</b></td>
							  <td>' . $documentInfo['location'] . '</td>
							 </tr>
							 <tr>
							  <td width="30%"><b>Date:</b></td>
							  <td>' . $documentInfo['date'] . '</td>
							 </tr>
							 <tr>
							  <td width="30%"><b>Owner:</b></td>
							  <td>' . $documentInfo['owner'] . '</td>
							 </tr>
							 <tr>
							  <td><b>Description of Equiptment:</b></td>
							  <td>' . $documentInfo['description'] . '</td>
							 </tr>
							</table>
							<br />

							<font size="10"><b>Fire Pump Info</b></font><br /><br />

							<table style="font-size: 30px; border: 1px solid #000000;" cellpadding="0" cellspacing="5" width="100%">
							 <tr bgcolor="#EEEEEE" align="center">
							  <td colspan="2" width="50%"><b>Driver</b></td>
							  <td colspan="2" width="50%"><b>Pump</b></td>
							 </tr>
							 <tr>
							  <td width="25%"><b>Horsepower:</b></td>
							  <td width="25%">' . $documentInfo['horsepower'] . '</td>
							  <td width="25%"><b>Manufacturer:</b></td>
							  <td width="25%">' . $documentInfo['manufacturer'] . '</td>
							 </tr>
							 <tr>
							  <td width="25%"><b>Manufacturer:</b></td>
							  <td width="25%">' . $documentInfo['manufacturer_2'] . '</td>
							  <td width="25%"><b>Sunction:</b></td>
							  <td width="25%">' . $documentInfo['sunction'] . '</td>
							 </tr>
							 <tr>
							  <td width="25%"><b>Voltage:</b></td>
							  <td width="25%">' . $documentInfo['voltage'] . '</td>
							  <td width="25%"><b>Discharge:</b></td>
							  <td width="25%">' . $documentInfo['discharge'] . '</td>
							 </tr>
							 <tr>
							  <td width="25%"><b>Rated RPM (Synch):</b></td>
							  <td width="25%">' . $documentInfo['rated'] . '</td>
							  <td width="25%"><b>Head Dia:</b></td>
							  <td width="25%">' . $documentInfo['head_dia'] . '</td>
							 </tr>
							 <tr>
							  <td width="25%"><b>Full Load Amperage:</b></td>
							  <td width="25%">' . $documentInfo['amperage'] . '</td>
							  <td width="25%"><b>RPM:</b></td>
							  <td width="25%">' . $documentInfo['rpm'] . '</td>
							 </tr>
							 <tr>
							  <td width="25%"><b>Continuous Amperage:</b></td>
							  <td width="25%">' . $documentInfo['continuous_amperage'] . '</td>
							  <td width="25%"><b>GPM:</b></td>
							  <td width="25%">' . $documentInfo['gpm'] . '</td>
							 </tr>
							 <tr>
							  <td width="25%"><b>Model:</b></td>
							  <td width="25%">' . $documentInfo['model'] . '</td>
							  <td width="25%"><b>Head:</b></td>
							  <td width="25%">' . $documentInfo['head'] . '</td>
							 </tr>
							 <tr>
							  <td width="25%"><b>Serial Number:</b></td>
							  <td width="25%">' . $documentInfo['serial_number'] . '</td>
							  <td width="25%"><b>Model:</b></td>
							  <td width="25%">' . $documentInfo['model2'] . '</td>
							 </tr>
							 <tr>
							  <td width="25%">&nbsp; </td>
							  <td width="25%">&nbsp; </td>
							  <td width="25%"><b>Serial Number:</b></td>
							  <td width="25%">' . $documentInfo['serial_number_2'] . '</td>
							 </tr>
							</table>
							<br />

							<font size="10"><b>Associated Piping</b></font><br /><br />

							<table style="font-size: 30px; border: 1px solid #000000;" cellpadding="0" cellspacing="5" width="100%">
							 <tr>
							  <td width="25%"><b>Suction Piping:</b></td>
							  <td width="25%">' . $documentInfo['suction_piping'] . '</td>
							  <td width="25%"><b>Control Valve:</b></td>
							  <td width="25%">' . $documentInfo['control_valve'] . '</td>
							 </tr>
							 <tr>
							  <td width="25%"><b>Discharge Piping:</b></td>
							  <td width="25%">' . $documentInfo['discharge_piping'] . '</td>
							  <td width="25%"><b>Control Valve:</b></td>
							  <td width="25%">' . $documentInfo['control_valve_2'] . '</td>
							 </tr>
							 <tr>
							  <td width="25%"><b>Sunction Check Valve:</b></td>
							  <td width="25%">' . $documentInfo['sunction_check_valve'] . '</td>
							  <td width="25%"><b>Discharge Check Valve:</b></td>
							  <td width="25%">' . $documentInfo['discharge_check_valve'] . '</td>
							 </tr>
							 <tr>
							  <td width="25%"><b>Pressure Relief Valve:</b></td>
							  <td width="25%">' . $documentInfo['pressure_relief'] . '</td>
							  <td width="25%"><b>Set For:</b></td>
							  <td width="25%">' . $documentInfo['set_for'] . '</td>
							 </tr>
							</table><br />

							<font size="10"><b>Test Data</b></font><br /><br />

							<table style="font-size: 30px; border: 1px solid #000000;" cellpadding="0" cellspacing="5" width="100%">
							 <tr>
							  <td width="40%"><b>Time of Test</b></td>
							  <td colspan="3" align="left">' . $documentInfo['time_of_test'] . '</td>
							 </tr>
							 <tr>
							  <td width="40%"><b>Static Pressure Before Test Sunction:</b></td>
							  <td>' . $documentInfo['static_before_suction'] . '</td>
							  <td width="20%"><b>Discharge:</b></td>
							  <td>' . $documentInfo['test_discharge'] . '</td>
							 </tr>
							 <tr>
							  <td width="40%"><b>Cut in Pressure:</b></td>
							  <td>' . $documentInfo['cut_in_pressure'] . '</td>
							  <td><b>Cut Out Pressure:</b></td>
							  <td>' . $documentInfo['cut_out_pressure'] . '</td>
							 </tr>
							 <tr>
							  <td width="40%"><b>Static Pressure After Test: Suction:</b></td>
							  <td>' . $documentInfo['static_after_test'] . '</td>
							  <td><b>Discharge:</b></td>
							  <td>' . $documentInfo['after_discharge'] . '</td>
							 </tr>
							 <tr>
							  <td width="40%"><b>Outlet Used for Testing:</b></td>
							  <td colspan="3">' . $documentInfo['outlet_used'] . '</td>
							 </tr>
							 <tr>
							  <td width="40%"><b>Supervisory Valves Checked:</b></td>
							  <td colspan="3">' . ucFirst($documentInfo['supervisory_checked']) . '</td>
							 </tr>
							 <tr>
							  <td width="40%"><b>Packings:</b></td>
							  <td>' . $documentInfo['packings'] . '</td>
							  <td><b>RPM Measured:</b></td>
							  <td>' . $documentInfo['rpm_measured'] . '</td>
							 </tr>
							 <tr>
							  <td width="40%"><b>Full Load Amperage Meassured:</b></td>
							  <td colspan="3">' . $documentInfo['full_load'] . '</td>
							 </tr>
							 <tr>
							  <td width="40%"><b>Voltage Drop Across Motor Leads:</b></td>
							  <td colspan="3">' . $documentInfo['voltage_drop'] . '</td>
							 </tr>
							 <tr>
							  <td width="40%"><b>Vacuum Clean Motor Inside:</b></td>
							  <td colspan="3">' . $documentInfo['vacuum_inside'] . '</td>
							 </tr>
							 <tr>
							  <td width="40%"><b>Check Angular Coupling Alignment:</b></td>
							  <td colspan="3">' . $documentInfo['angular_alignment'] . '</td>
							 </tr>
							 <tr>
							  <td width="40%"><b>Check Parallel Coupling Alignment:</b></td>
							  <td colspan="3">' . $documentInfo['parallel_alignment'] . '</td>
							 </tr>
							 <tr>
							  <td width="40%"><b>Pump Level:</b></td>
							  <td>' . $documentInfo['pump_level'] . '</td>
							  <td><b>Base Firm:</b></td>
							  <td>' . $documentInfo['base_firm'] . '</td>
							 </tr>
							 <tr>
							  <td width="40%"><b>Comments:</b></td>
							  <td colspan="3">' . $documentInfo['comments'] . '</td>
							 </tr>
							</table>
							<br />
							<table style="font-size: 30px;" cellpadding="0" cellspacing="5" width="100%">
							 <tr>
							  <td><b>Lead Technicion:</b></td>
							  <td>' . $documentInfo['primary_technician'] . '</td>
							 </tr>
							</table><br /><br />';