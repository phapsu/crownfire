<?php
class blank_document {   
    private static function pr($data){
        echo '<pre>';
        print_r($data);
        echo '</pre>';
    }
    /**
     * 
     * @param type $data = [ [] => [header_name => header_value ] ]
     * @return string
     */
    protected static function tableHeader($pdf_data=array()){
        $opentable = '<table style="font-size: 25px;" border="0" cellpadding="0" cellspacing="0" width="100%">';
        $breakRow = '<tr valign="top"><td colspan="4"><br></td></tr>';
        $twoCol = '<tr valign="top">
                         <td width="15%%" align="right"><b>%s:</b></td>
                         <td width="45%%" align="left" style="border-bottom: dotted 1px black;">%s</td>
                         <td width="15%%" align="right"><b>%s:</b></td>
                         <td width="25%%" align="left" style="border-bottom: dotted 1px black;">%s</td>
                  </tr>';
        $oneCol = '<tr valign="top">
                        <td nowrap="" style="padding-top:40px; text-align:right;"><b>%s:</b></td>
                        <td colspan="3" style="padding-top:40px;border-bottom: dotted 1px black;">%s</td>
                  </tr>';
        $closetable = '</table><br />';
        
        $tableRow = $breakRow;
        foreach ($pdf_data as $data){
            $count = count($data);
            
            if($count > 2){
                $tableRow .= sprintf($twoCol, $data[0], $data[1], $data[2], $data[3]);
                $tableRow .= $breakRow;
            }else{
                $tableRow .= sprintf($oneCol, $data[0], $data[1]);
                $tableRow .= $breakRow;                
            }
        }
        
            
        return $opentable.$tableRow.$closetable;
    }
        
    protected static function dottedLine($numofLine = 20) {
        $html = '';

        for ($i = 0; $i < $numofLine; $i++) {
            $html .= '<p style="border-bottom: dotted 1px black;">&nbsp;</p>';
            $html .='<br>';
        }

        return $html;
    }

    public static function getDocumentHTML($typeID, $customerInfo = null, $buildingInfo = null) {
        $html = '';
        switch ($typeID) {
            case '1':

                include('blank_document/document_'.$typeID.'.php');
                $class = 'document_'.$typeID;
                $doc = new $class;
                $html .= $doc->show($customerInfo);
                
                break;

            case '3':
                
                include('blank_document/document_'.$typeID.'.php');
                $class = 'document_'.$typeID;
                $doc = new $class;
                $html .= $doc->show($customerInfo);

                break;

            case '4':               
                
                include('blank_document/document_'.$typeID.'.php');
                $class = 'document_'.$typeID;
                $doc = new $class;
                $html .= $doc->show($customerInfo);
                

                break;

            case '5':
                
                include('blank_document/document_'.$typeID.'.php');
                $class = 'document_'.$typeID;
                $doc = new $class;
                $html .= $doc->show($customerInfo);
                
                break;

            case '6':
                
                include('blank_document/document_'.$typeID.'.php');
                $class = 'document_'.$typeID;
                $doc = new $class;
                $html .= $doc->show($customerInfo);
                
                break;

            case '7':
                
                include('blank_document/document_'.$typeID.'.php');
                $class = 'document_'.$typeID;
                $doc = new $class;
                $html .= $doc->show($customerInfo);
               
                break;

            case '8':
                
                include('blank_document/document_'.$typeID.'.php');
                $class = 'document_'.$typeID;
                $doc = new $class;
                $html .= $doc->show($customerInfo);
                
                break;

            case '9':
                
                include('blank_document/document_'.$typeID.'.php');
                $class = 'document_'.$typeID;
                $doc = new $class;
                $html .= $doc->show($customerInfo);
                
                break;

            case '10':
                
                include('blank_document/document_'.$typeID.'.php');
                $class = 'document_'.$typeID;
                $doc = new $class;
                $html .= $doc->show($customerInfo);
               
                break;

            case '12':
                
                include('blank_document/document_'.$typeID.'.php');
                $class = 'document_'.$typeID;
                $doc = new $class;
                $html .= $doc->show($customerInfo);
                
                break;

            case '13':
                
                include('blank_document/document_'.$typeID.'.php');
                $class = 'document_'.$typeID;
                $doc = new $class;
                $html .= $doc->show($customerInfo);
               
                break;
        }
        return $html;
    }

    public static function getYears($property_id) {
        global $cfg;

        $db = new database();
        $query = "SELECT distinct(year) as document_year FROM documents WHERE property_id = $property_id AND state_id = 1";
        $results = $db->dbQuery($query);

        $return = array();
        while ($myrow = $db->row($results)) {
            $return[] = $myrow['document_year'];
        }
        return $return;
    }

    public static function getQuestionsHTML($document_id, $type_id, $section = null, $options_array = array(1 => 'Yes', 0 => 'No'), $add_question = false, $iterate = 'letters', $skip_html = false) {
        global $cfg;
        // Process our questions
        $questions = document::getDocumentQuestionsByTypeId($type_id, $section);
        $html = '';
        if (is_array($questions)) {
            $nums = 1;
            $letters = 'A';
            $widthRemainCols = 54/count($options_array).'%';
            $html .= '<br /> <table border="1" style="font-size: 30px; border: 1px solid #000000;border: 1px solid red;" cellpadding="5" width="100%">';

            $html .= '<tr bgcolor="#000000" align="center">';
            if (!is_null($iterate)) {
                $html .= '<td width="5.9%">&nbsp; </td>';
            }
            $html .= '<td width="40%">&nbsp; </td>';
            foreach ($options_array as $key => $value) {
                $html .= '<td width="'.$widthRemainCols.'" align="center" style="color: #ffffff;">';
                if (!$skip_html) {
                    $html .= $value;
                } else {
                    $html .= ' &nbsp; ';
                }
                $html .= '</td>';
            }
            $html .= '</tr>';
            foreach ($questions as $questionArray) {
                $html .= '<tr valign="middle">';
                if ($iterate == 'numbers') {
                    $html .= '<td width="5.9%">' . $nums . '.</td>';
                } elseif ($iterate == 'letters') {
                    $html .= '<td width="5.9%">' . strtoupper($letters) . '.</td>';
                }
                $html .= '<td width="40%">' . $questionArray['question'];
                $html .= ($add_question) ? '?' : '';
                $html .= '</td>';
                if ($option_name_array = document::getCustomOption($questionArray['id'])) {
                    $html .= '<td colspan="' . (count($option_name_array) + 2) . '">';
                    $html .= '<table cellpadding="2" border="0" width="100%">';
                    foreach ($option_name_array as $key => $row) {
                        if (!empty($row['optionname_before']) && !empty($row['optionname_after'])) {
                            $width = '33';
                        } else {
                            $width = '50';
                        }
                        $width = $widthRemainCols;
                        if (!empty($row['optionname_before']) && !empty($row['optionname_after'])) {
                            $align = 'center';
                        } elseif (!empty($row['optionname_before'])) {
                            $align = "left";
                        } else {
                            $align = "right";
                        }
                        $html .= '<tr>';
                        if (!empty($row['optionname_before'])) {
                            $html .= '<td width="' . $width . '" align="right">' . $row['optionname_before'] . ':</td>';
                        }
                        $html .= '<td width="' . $width . '" align="' . $align . '">' . $custom_answers[$row['id']] . '</td>';
                        if (!empty($row['optionname_after'])) {
                            $html .= '<td width="' . $width . '%" align="left">' . $row['optionname_after'] . '</td>';
                        }
                        $html .= '</tr>';
                    }
                    $html .= '</table></td>';
                } else {
                    foreach ($options_array as $key => $value) {
                        $html .= '<td width="'.$widthRemainCols.'" align="center" valign="middle">';
                        
                        $html .= '</td>';
                    }
                }
                $html .= '</tr>';
                $nums++;
                $letters = self::iterate($letters);
            }
            $html .= '</table>';
        }
        return $html;
    }

    /////////////////////////////////////////////////////////////////////

    public static function iterate($letter) {
        $letters_array = array('A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z',
            'AA', 'BB', 'CC', 'DD', 'EE', 'FF', 'GG', 'HH', 'II', 'JJ', 'KK', 'LL', 'MM', 'NN', 'OO', 'PP', 'QQ', 'RR', 'SS', 'TT', 'UU', 'VV', 'WW', 'XX', 'YY', 'ZZ');
        if (($key = array_search($letter, $letters_array)) === false) {
            return 'A';
        } else {
            return $letters_array[$key + 1];
        }
    }

    public static function getDocumentImage($document_id) {
        global $cfg;
        $db = new database();
        $query = "SELECT * FROM document_images WHERE document_id = $document_id";
        $results = $db->dbQuery($query);
        if ($db->num_rows($results) != 0) {
            return $cfg['image_save_url'] . '/' . $db->result($results, 0, 'image');
        } else {
            return null;
        }
    }

    public static function copyDevices($devices, $temp_id) {
        global $cfg;
        $db = new database();

        if (is_array($devices) && count($devices) > 0) {
            $document = new document();
            foreach ($devices as $d) {
                $save_array = array('temp_id' => $temp_id,
                    'location' => $d['location'],
                    'device' => $d['device'],
                    'correctly_installed' => $d['correctly_installed'],
                    'requires_service' => $d['requires_service'],
                    'alarm' => $d['alarm'],
                    'confirmed' => $d['confirmed'],
                    'zone_address' => $d['zone_address'],
                    'smoke_sensitivity' => $d['smoke_sensitivity'],
                    'remarks' => $d['remarks']);
                $document->saveData('document_data_9_device', $save_array);
            }
        }
    }

}