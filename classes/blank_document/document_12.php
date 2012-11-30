<?php
//include('../blank_document.class.php');
class document_12 extends blank_document {
 
    public function show($customerInfo){
        //$html = parent::tableDottedHeader($customerInfo['name']);

        $html = '<table style="font-size: 25px;" cellpadding="0" cellspacing="0" width="100%">
                 <tr valign="top">
                  <td width="40%">
                        <table width="100%" cellpadding="15" cellpadding="0">
                         <tr valign="top">
                          <td width="40%"><b>Name:</b></td>
                          <td width="60%">'.@$_POST['customer_name'].self::dottedLine(1).'</td>
                         </tr>
                         <tr valign="top">
                          <td width="40%"><b>Address:</b></td>
                          <td width="60%">' .@$_POST['address']. self::dottedLine(1) . '</td>
                         </tr>
                         <tr valign="top">
                          <td width="40%"><b>City:</b></td>
                          <td width="60%">' .@$_POST['city']. self::dottedLine(1) . '</td>
                         </tr>
                         <tr valign="top">
                          <td width="40%"><b>State:</b></td>
                          <td width="60%">' . @$_POST['state'].self::dottedLine(1) . '</td>
                         </tr>
                         <tr valign="top">
                          <td width="40%"><b>Zip:</b></td>
                          <td width="60%">' . @$_POST['zip'].self::dottedLine(1) . '</td>
                         </tr>
                         <tr valign="top">
                          <td width="40%"><b>Telephone:</b></td>
                          <td width="60%">' . @$_POST['telephone'].self::dottedLine(1) . '</td>
                         </tr>
                         <tr valign="top">
                          <td width="40%"><b>Store No.:</b></td>
                          <td width="60%">' . @$_POST['store'].self::dottedLine(1) . '</td>
                         </tr>
                         <tr valign="top">
                          <td width="40%"><b>Owner or Manager:</b></td>
                          <td width="60%">' .@$_POST['owner']. self::dottedLine(1) . '</td>
                         </tr>
                        </table>
                  </td>
                  <td width="60%">
                        <table width="100%" border="1" cellpadding="5">
                         <tr bgcolor="#000000" style="color: #ffffff;">
                          <td colspan="2">Date of Service</td>
                          <td>Time</td>
                          <td>A.M.</td>
                          <td>P.M.</td>
                         </tr>
                         <tr>
                          <td colspan="2"></td>
                          <td></td>
                          <td></td>
                          <td></td>
                         </tr>
                         <tr bgcolor="#000000" style="color: #ffffff;">
                          <td>Annual</td>
                          <td>Semi-Annual</td>
                          <td>Recharge</td>
                          <td>Installation</td>
                          <td>Renovation</td>
                         </tr>
                         <tr>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                         </tr>
                         <tr bgcolor="#000000" style="color: #ffffff;">
                          <td colspan="4">Location of System Cynlinders</td>
                          <td>UL 300</td>
                         </tr>
                         <tr>
                          <td colspan="4"></td>
                          <td></td>
                         </tr>
                         <tr bgcolor="#000000" style="color: #ffffff;">
                          <td colspan="2">Manufacturer</td>
                          <td>Model #</td>
                          <td>Wet</td>
                          <td>Dry Chemical</td>
                         </tr>
                         <tr>
                          <td colspan="2"></td>
                          <td></td>
                          <td></td>
                          <td></td>
                         </tr>
                         <tr bgcolor="#000000" style="color: #ffffff;" align="center">
                          <td colspan="2">Cylinder Size Master</td>
                          <td>Cylinder Size Slave</td>
                          <td colspan="2">Cylinder Size Slave</td>
                         </tr>
                         <tr align="center">
                          <td colspan="2"></td>
                          <td></td>
                          <td colspan="2"></td>
                         </tr>
                         <tr bgcolor="#000000" style="color: #ffffff;">
                          <td colspan="2">Fuel Shut-Off</td>
                          <td>Electric</td>
                          <td>Gas</td>
                          <td>Size</td>
                         </tr>
                         <tr>
                          <td colspan="2"></td>
                          <td></td>
                          <td></td>
                          <td></td>
                         </tr>
                         <tr bgcolor="#000000" style="color: #ffffff;" align="center">
                          <td colspan="2">Serial Number</td>
                          <td>Last Hydro Test Date</td>
                          <td colspan="2">Last Recharge Date</td>
                         </tr>
                         <tr align="center">
                          <td colspan="2"></td>
                          <td></td>
                          <td colspan="2"></td>
                         </tr>
                         <tr bgcolor="#000000" style="color: #ffffff;">
                          <td colspan="5">Manufacturer\'s Manual Reference</td>
                         </tr>
                         <tr>
                          <td width="33%" colspan="2">Page No.: </td>
                          <td width="33%">Drawing No.: </td>
                          <td width="34%" colspan="2">Date: </td>
                         </tr>
                        </table>
                  </td>
                 </tr>
                </table>

                <h3>Cooking Appliance Locations: Left to Right</h3>
                <table style="font-size: 25px; border: 1px solid #000000;" cellpadding="5" cellspacing="0" width="100%" border="1">
                 <tr align="center">
                  <td width="25%"></td>
                  <td width="25%"></td>
                  <td width="25%"></td>
                  <td width="25%"></td>
                 </tr>
                  <tr align="center">
                  <td width="25%"></td>
                  <td width="25%"></td>
                  <td width="25%"></td>
                  <td width="25%"></td>
                 </tr>
                </table>&nbsp; <br />';
        
        
        
        $html .= '<table width="100%" cellpadding="5" border="1" style="font-size: 25px; border: 1px solid #000000;border: 1px solid #000000;">';
        $html .= '<tr bgcolor="#000000" align="center"><td width="80%">&nbsp; </td><td width="10%" align="center" style="color: #ffffff;">Yes</td><td width="10%" align="center" style="color: #ffffff;">N/A</td></tr>';
        $html .= '<tr><td>1. All appliances properly covered w/correct nozzles</td><td>&nbsp;</td><td>&nbsp;</td></tr>';    
        $html .= '<tr><td>2. Duct and plenum covered w/correct nozzles </td><td>&nbsp;</td><td>&nbsp;</td></tr>';
        $html .= '<tr><td>3. Check positioning of all nozzles </td><td>&nbsp;</td><td>&nbsp;</td></tr>';
        $html .= '<tr><td>4. System installed in accordance w/MFG UL listing </td><td>&nbsp;</td><td>&nbsp;</td></tr>';
        $html .= '<tr><td>5. Hood/duct penetrations sealed w/weld or UL device </td><td>&nbsp;</td><td>&nbsp;</td></tr>';
        $html .= '<tr><td>6. Check if seals intact, evidence of tampering</td><td>&nbsp;</td><td>&nbsp;</td></tr>';
        $html .= '<tr><td>7. If system has been discharged, report same </td><td>&nbsp;</td><td>&nbsp;</td></tr>';
        $html .= '<tr><td>8. Pressure gauge in proper range (if gauged) </td><td>&nbsp;</td><td>&nbsp;</td></tr>';
        $html .= '<tr><td>9. Check cartridge weight (if applicable) </td><td>&nbsp;</td><td>&nbsp;</td></tr>';
        $html .= '<tr><td>10. Hydrostatic test date</td><td colspan="2">&nbsp;</td></tr>';
        $html .= '<tr><td>11. 6 year maintenance date </td><td>&nbsp;</td><td>&nbsp;</td></tr>';
        $html .= '<tr><td>12. Inspect cylinder and mount </td><td>&nbsp;</td><td>&nbsp;</td></tr>';
        $html .= '<tr><td>13. operate system from terminal link </td><td>&nbsp;</td><td>&nbsp;</td></tr>';
        $html .= '<tr><td>14. Test for proper operation from remote </td><td>&nbsp;</td><td>&nbsp;</td></tr>';
        $html .= '<tr><td>15. Check operation of micro switch </td><td>&nbsp;</td><td>&nbsp;</td></tr>';
        $html .= '<tr><td>16. Check operation of gas valve</td><td>&nbsp;</td><td>&nbsp;</td></tr>';
        $html .= '<tr><td>17. Clean nozzles </td><td>&nbsp;</td><td>&nbsp;</td></tr>';
        $html .= '<tr><td>18. Proper nozzle covers in place </td><td>&nbsp;</td><td>&nbsp;</td></tr>';
        $html .= '<tr><td>19. Check fuse links and clean </td><td>&nbsp;</td><td>&nbsp;</td></tr>';
        $html .= '<tr><td>20. Replaced fuse links </td><td>&nbsp;</td><td>&nbsp;</td></tr>';
        $html .= '<tr><td>21. Check travel of cable nuts/S-hooks </td><td>&nbsp;</td><td>&nbsp;</td></tr>';
        $html .= '<tr><td>22. Piping & Conduit securely bracketed </td><td>&nbsp;</td><td>&nbsp;</td></tr>';
        $html .= '<tr><td>23. Proper separation between fryers & flame </td><td>&nbsp;</td><td>&nbsp;</td></tr>';
        $html .= '<tr><td>24. Proper clearance-flame to filters </td><td>&nbsp;</td><td>&nbsp;</td></tr>';
        $html .= '<tr><td>25. Exhaust fan in operating order </td><td>&nbsp;</td><td>&nbsp;</td></tr>';
        $html .= '<tr><td>26. All filters in place </td><td>&nbsp;</td><td>&nbsp;</td></tr>';
        $html .= '<tr><td>27. Fuel shut-off in on position </td><td>&nbsp;</td><td>&nbsp;</td></tr>';
        $html .= '<tr><td>28. Manual & Remote set/seals in place</td><td>&nbsp;</td><td>&nbsp;</td></tr>';
        $html .= '<tr><td>29. Replace systems covers </td><td>&nbsp;</td><td>&nbsp;</td></tr>';
        $html .= '<tr><td>30. System operational & seals in place </td><td>&nbsp;</td><td>&nbsp;</td></tr>';
        $html .= '<tr><td>31. Slave system operational </td><td>&nbsp;</td><td>&nbsp;</td></tr>';
        $html .= '<tr><td>32. Clean cylinder & mount </td><td>&nbsp;</td><td>&nbsp;</td></tr>';
        $html .= '<tr><td>33. Fan warning sign on hood </td><td>&nbsp;</td><td>&nbsp;</td></tr>';
        $html .= '<tr><td>34. Personnel instructed in manual operation of system </td><td>&nbsp;</td><td>&nbsp;</td></tr>';
        $html .= '<tr><td>35. Proper hand portable extinguishers </td><td>&nbsp;</td><td>&nbsp;</td></tr>';
        $html .= '<tr><td>36. Portable extinguishers properly serviced </td><td>&nbsp;</td><td>&nbsp;</td></tr>';
        $html .= '<tr><td>37. Service & Certification tag on system </td><td>&nbsp;</td><td>&nbsp;</td></tr>';
        $html .= '<tr><td>38. Note Discrepancies or Deficiencies Below </td><td>&nbsp;</td><td>&nbsp;</td></tr>';
        
        
        $html .= '</table><br />'; 
		
        $html .= '<table border="0" style="font-size: 25px; width: 100%;" cellpadding="0">';
        $html .= '<tr valign="bottom"><td><b>Comments</b></td></tr>';
        $html .= '<tr valign="top"><td> '.self::dottedLine(7).'</td></tr>';
        $html .= '<tr><td>&nbsp;</td></tr>';
        
        $html .= '</table><br />';
        return $html;
    }
}
?>
