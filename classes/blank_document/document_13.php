<?php
//include('../blank_document.class.php');
class document_13 extends blank_document {
 
    public function show($customerInfo){
        $html = '<table width="100%" cellspacing="0" cellpadding="0" border="0" style="font-size: 25px;">';

        $html .= '<tr valign="top"><td><br></td></tr>';
        
        $html .= '<tr valign="top"><td><b>Building Address</b></td></tr>';
        $html .= '<tr valign="top"><td> '.self::dottedLine(7).'</td></tr>';
        $html .= '<tr><td>&nbsp;</td></tr>';
        
        $html .= '<tr valign="top"><td><b>Date of Information</b></td></tr>';
        $html .= '<tr valign="top"><td> '.self::dottedLine(7).'</td></tr>';
        $html .= '<tr><td>&nbsp;</td></tr>';
        
        $html .= '<tr valign="botopttom"><td><b>C1. MANUFACTURER NAME AND MODEL NUMBER</b></td></tr>';
        $html .= '<tr valign="top"><td> '.self::dottedLine(7).'</td></tr>';
        $html .= '<tr><td>&nbsp;</td></tr>';
        
        $html .= '<tr valign="top"><td><b>C2. SYSTEM OPERATION (zoned, non zoned, single or two stage) - supervised circuits</b></td></tr>';
        $html .= '<tr valign="top"><td> '.self::dottedLine(7).'</td></tr>';
        $html .= '<tr><td>&nbsp;</td></tr>';
        
        $html .= '<tr valign="top"><td><b>C3. LOCATION OF CONTROL UNIT OR TRANSPONDERS, DISPLAY AND CONTROL CENTERS,ANNUNCIATORS, AND REMOTE TROUBLE SIGNAL UNITS.</b></td></tr>';
        $html .= '<tr valign="top"><td> '.self::dottedLine(7).'</td></tr>';
        $html .= '<tr><td>&nbsp;</td></tr>';
      
        $html .= '<tr valign="top"><td><b>C4. DESCRIPTION OF DEGRADED MODE CAPABILITY OPERATION, IF APPLICABLE</b></td></tr>';
        $html .= '<tr valign="top"><td> '.self::dottedLine(7).'</td></tr>';
        $html .= '<tr><td>&nbsp;</td></tr>';
        
        $html .= '<tr valign="top"><td><b>C5. SEQUENCE OF OPERATION, INCLUDING, BUT NOT LIMITED TO THE FOLLOWING BRIEFLY DESCRIBED</b></td></tr>';
        $html .= '<tr valign="top"><td> '.self::dottedLine(7).'</td></tr>';
        $html .= '<tr><td>&nbsp;</td></tr>';
      
        $html .= '</table><br />'; 
        
        $html .= '<table width="100%" cellpadding="5" border="1" style="font-size: 25px; border: 1px solid #000000;">';
        $html .= '<tr bgcolor="#000000" align="center"><td width="70%">&nbsp; </td><td width="10%" align="center" style="color: #ffffff;">Yes</td><td width="10%" align="center" style="color: #ffffff;">No</td><td width="10%" align="center" style="color: #ffffff;">N/A</td></tr>';
        $html .= '<tr><td>A. Alert signal and alarm signal sequence</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>';
        $html .= '<tr><td>B. Procedure for resetting alarm system, silencing alarm signals and acknowledging trouble conditions</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>';
        $html .= '<tr><td>C. Identifying function of each operable switch or push button on the control unit or transponder</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>';
        $html .= '<tr><td>D. Smoke control system or fan shutdown connections present</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>';
        $html .= '<tr><td>E. Elevator homing activated by fire alarm</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>';  
        $html .= '<tr><td>F. Magnetic door lock release activated by fire alarm</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>';
        $html .= '<tr><td>G. Door holder release activated by fire alarm </td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>';
        $html .= '<tr><td>H. Extinguishing system activated by fire alarm</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>';
        $html .= '<tr><td>I. Transmission of signals to remote monitoring connection </td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>';
        
        $html .= '</table><br />'; 
        
        
        $html .= '<table border="0" style="font-size: 25px; width: 100%;" cellpadding="0">'; 
        
        $html .= '<tr valign="top"><td><b>C6. GENERAL DESCRIPTION OF LOCATION OF DEVICES CONNECTED TO CONTROL UNIT OR TRANSPONDER.</b></td></tr>';
        $html .= '<tr valign="top"><td> '.self::dottedLine(7).'</td></tr>';
        $html .= '<tr><td>&nbsp;</td></tr>';
      
        $html .= '</table><br />';
        
        $html .= '<table width="100%" cellpadding="5" border="1" style="font-size: 25px; border: 1px solid #000000;">';
        $html .= '<tr bgcolor="#000000" align="center"><td width="70%">&nbsp; </td><td width="10%" align="center" style="color: #ffffff;">Yes</td><td width="10%" align="center" style="color: #ffffff;">No</td><td width="10%" align="center" style="color: #ffffff;">N/A</td></tr>';
        $html .= '<tr><td>A. Sprinkler flow and valve supervisory switches on a floor-by-floor basis</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>';
        $html .= '<tr><td>B. Manual pull stations at exits </td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>';
        $html .= '<tr><td>C. Smoke detectors in stairwells and corridors </td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>';
        $html .= '<tr><td>D. Heat detectors at the top of elevator shafts and in service and storage </td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>';
        $html .= '<tr><td>E. Duct type smoke detectors in air handling systems </td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>';  
        $html .= '<tr><td>F. Ancillary systems (kitchen extinguishing) </td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>';
        $html .= '<tr><td>G. Bells, horns or speakers throughout </td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>';
        $html .= '<tr><td>H. Emergency telephones at exits and </td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>';
        $html .= '<tr><td>I. Visible signal devices in public areas</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>';
        
        $html .= '</table><br />';      
        
        $html .= '<table border="0" style="font-size: 25px; width: 100%;" cellpadding="0">'; 
          
        $html .= '<tr valign="top"><td><b>C7. VOICE COMMUNICATION SYSTEM AND OPERATION.</b></td></tr>';
        $html .= '<tr valign="top"><td> '.self::dottedLine(7).'</td></tr>';
        $html .= '<tr><td>&nbsp;</td></tr>';
        
        $html .= '<tr valign="top"><td><b>C8. EMERGENCY TELEPHONE EQUIPMENT AND OPERATION.</b></td></tr>';
        $html .= '<tr valign="top"><td> '.self::dottedLine(7).'</td></tr>';
        $html .= '<tr><td>&nbsp;</td></tr>';
        
        $html .= '<tr valign="top"><td><b>C9. EMERGENCY POWER SUPPLY (IE. BATTERIES IN ONE CENTRAL LOCATION OR DISTRIBUTED IN CONTROL UNITS OR TRANSPONDERS, EMERGENCY GENERATOR OR A COMBINATION OF BOTH) - DISTRIBUTION OF BATTERY TYPE, CHARGING PROCEDURE AND MAINTENANCE.</b></td></tr>';
        $html .= '<tr valign="top"><td> '.self::dottedLine(7).'</td></tr>';
        $html .= '<tr><td>&nbsp;</td></tr>';
        
        $html .= '<tr valign="top"><td><b>C10. SYSTEM BATTERY LOAD CALCULATIONS</b></td></tr>';
        $html .= '<tr valign="top"><td> '.self::dottedLine(7).'</td></tr>';
        $html .= '<tr><td>&nbsp;</td></tr>';
        $html .= '</table><br />';          
        
        $html .= '<table width="100%" cellpadding="5" border="1" style="font-size: 25px; border: 1px solid #000000;">';
        
        $html .= '<tr><td width="55%">A. Sprinkler flow and valve supervisory switches on a floor-by-floor basis</td><td width="40%">'.self::dottedLine(3).'</td><td width="5%">&nbsp;</td></tr>';
        $html .= '<tr><td>B. Supervisory current</td><td>'.self::dottedLine(3).'</td><td>A</td></tr>';
        $html .= '<tr><td>C. Full load alarm current </td><td>'.self::dottedLine(3).'</td><td>A</td></tr>';
        $html .= '<tr><td>D. 24 x SV Current </td><td>'.self::dottedLine(3).'</td><td>Ah</td></tr>';
        $html .= '<tr><td>E. 30 min. of alarm = 0.5 x Full Load = </td><td>'.self::dottedLine(3).'</td><td>Ah</td></tr>';
        $html .= '<tr><td>F. Total Ah = #4 + #5 = </td><td>'.self::dottedLine(3).'</td><td>Ah</td></tr>';
        
        $html .= '</table><br />'; 
        
        
        return $html;
    }
}
?>