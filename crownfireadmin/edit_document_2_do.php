<?php

session_start();
include("includes/init.php");
include('../includes/JG_Cache.php');
///////////////////////////////////////////////////////////
// Let's unset all the errors.
unset($_SESSION['post']);
unset($_SESSION['general_error']);
///////////////////////////////////////////////////////////

$err = 0;
// Important stuff
$redirect = (isset($_GET['redirect']) && !empty($_GET['redirect']))  ? urldecode($_GET['redirect']) : '';
$user_id = $_POST['user_id'];
$property_id = $_POST['property_id'];
$type_id = $_POST['type_id'];
$state_id = $_POST['state_id'];
$deficiency = $_POST['deficiency'];
$document_id = (isset($_REQUEST['id'])) ? $_REQUEST['id'] : null;
$name = (isset($_REQUEST['document_name'])) ? $_REQUEST['document_name'] : null;
$year = (isset($_REQUEST['document_year'])) ? $_REQUEST['document_year'] : null;
$required = array();

if ($validate->validateForm($required) && $err != 1) {

    // Ok, we validated.  First we need to add this document into the generic table
    if ($_REQUEST['id']) {
        $document = new document($_REQUEST['id']);
    } else {
        $document = new document();
        $document->setDateAdded(time());
    }
    $document->setName($name);
    $document->setYear($year);
    $document->setUserId($user_id);
    $document->setPropertyId($property_id);
    $document->setTypeId($type_id);
    $document->setStateId($state_id);
    $document->setDeficiency($deficiency);
    $document->setDateUpdated(time());
    $new_document_id = $document->save();
    
    /**
     * Clear cache
     */
    $cache = new JG_Cache($cfg['cache_directory']);
    $cache->clear('document_'.$new_document_id);
    $cache->clear('cert_'.$property_id);
    

    // Now, depending on the document type_id we need to save data
    switch ($type_id) {
        case '1':
            // We need to save all the data in the head of the form.  Since these always change we have
            // to check on each one.  SIGH.
            $save_array = array('document_id' => $new_document_id,
                'customer_name' => $_POST['customer_name'],
                'technician' => $_POST['technician'],
                'address' => $_POST['address'],
                'inspection_date' => $_POST['inspection_date'],
                'city' => $_POST['city'],
                'man_name_model' => $_POST['man_name_model']);
            $document = new document();
            if ($document_id) {
                $document->saveData('document_data_1_head', $save_array, 'document_id', $document_id);
            } else {
                $document->saveData('document_data_1_head', $save_array);
            }

            // This form has an array of fields too
            if (is_array($_POST['zone_name'])) {

                // We'll delete these records first.
                $document->deleteData('document_data_1_zones', 'document_id', $document_id);

                // Now add them in.
                foreach ($_POST['zone_name'] as $key => $zone_name) {
                    if (empty($zone_name)) {
                        continue;
                    }
                    $save_array = array('document_id' => $new_document_id,
                        'zone_name' => $zone_name,
                        'zone_num' => $_POST['zone_num'][$key],
                        'alarm_circuit' => $_POST['alarm_circuit'][$key],
                        'supervisory_circuit' => $_POST['supervisory_circuit'][$key]);
                    $document->saveData('document_data_1_zones', $save_array);
                }
            }
            break;

        case '3':

            $save_array = array('document_id' => $new_document_id,
                'customer_name' => $_POST['customer_name'],
                'technician_1' => $_POST['technician_1'],
                'technician_2' => $_POST['technician_2'],
                'address' => $_POST['address'],
                'inspection_date' => $_POST['inspection_date'],
                'city' => $_POST['city']);
            $document = new document();
            if ($document_id) {
                $document->saveData('document_data_3_head', $save_array, 'document_id', $document_id);
            } else {
                $document->saveData('document_data_3_head', $save_array);
            }

            $save_array = array('document_id' => $new_document_id,
                'deficiencies' => $_POST['deficiencies'],
                'recommendations' => $_POST['recommendations'],
                'remarks' => $_POST['remarks']);
            if ($document_id) {
                $document->saveData('document_data_3_summary', $save_array, 'document_id', $document_id);
            } else {
                $document->saveData('document_data_3_summary', $save_array);
            }

            // Need to save the question answers
            document::saveQuestions($type_id, $new_document_id);


            break;

        case '4':
            $save_array = array('document_id' => $new_document_id,
                'customer_name' => $_POST['customer_name'],
                'technician' => $_POST['technician'],
                'address' => $_POST['address'],
                'inspection_date' => $_POST['inspection_date'],
                'city' => $_POST['city'],
                'contact' => $_POST['contact'],
                'site' => $_POST['site']);
            $document = new document();
            if ($document_id) {
                $document->saveData('document_data_4_head', $save_array, 'document_id', $document_id);
            } else {
                $document->saveData('document_data_4_head', $save_array);
            }

            // Save the fire extinguisher / fire hose report
            if (is_array($_POST['report_num'])) {

                // We'll delete these records first.
                $document->deleteData('document_data_4_report', 'document_id', $document_id);

                // Now add them in.
                $weight = 0;
                foreach ($_POST['report_num'] as $key => $report_num) {
                    if (empty($report_num)) {
                        continue;
                    }
                    $save_array = array('document_id' => $new_document_id,
                        'report_num' => $_POST['report_num'][$key],
                        'location' => $_POST['location'][$key],
                        'size_type' => $_POST['size_type'][$key],
                        'manufacture' => $_POST['manufacture'][$key],
                        'serial' => $_POST['serial'][$key],
                        'manufacture_date' => $_POST['manufacture_date'][$key],
                        'last_h_test' => $_POST['last_h_test'][$key],
                        'next_h_test' => $_POST['next_h_test'][$key],
                        'next_six_year' => $_POST['next_six_year'][$key],
                        'remarks' => $_POST['remarks'][$key],
                        'weight' => $weight);
                    $document->saveData('document_data_4_report', $save_array);
                    $weight++;
                }
            }
            break;

        case '5':
            $save_array = array('document_id' => $new_document_id,
                'customer_name' => $_POST['customer_name'],
                'technician' => $_POST['technician'],
                'address' => $_POST['address'],
                'inspection_date' => $_POST['inspection_date'],
                'city' => $_POST['city'],
                'contact' => $_POST['contact'],
                'site' => $_POST['site'],
                'comments' => $_POST['comments']);
            $document = new document();
            if ($document_id) {
                $document->saveData('document_data_5_head', $save_array, 'document_id', $document_id);
            } else {
                $document->saveData('document_data_5_head', $save_array);
            }

            // Save the fire extinguisher / fire hose report
            if (is_array($_POST['unit_type'])) {

                // We'll delete these records first.
                $document->deleteData('document_data_5_form', 'document_id', $document_id);

                // Now add them in.
                foreach ($_POST['unit_type'] as $key => $unit_type) {
                    if (empty($unit_type)) {
                        continue;
                    }
                    $save_array = array('document_id' => $new_document_id,
                        'unit_type' => $_POST['unit_type'][$key],
                        'location' => $_POST['location'][$key],
                        'time_illuminated' => $_POST['time_illuminated'][$key],
                        'pass_or_fail' => $_POST['pass_or_fail'][$key],
                        'unit_voltage' => $_POST['unit_voltage'][$key],
                        'unit_watts' => $_POST['unit_watts'][$key],
                        'num_batteries' => $_POST['num_batteries'][$key],
                        'size_batteries' => $_POST['size_batteries'][$key],
                        'weight' => $key);
                    $document->saveData('document_data_5_form', $save_array);
                }
            }
            break;

        case '6':
            $save_array = array('document_id' => $new_document_id,
                'customer_name' => $_POST['customer_name'],
                'technician' => $_POST['technician'],
                'address' => $_POST['address'],
                'inspection_date' => $_POST['inspection_date'],
                'hydrant_make' => $_POST['hydrant_make'],
                'tech_comments' => $_POST['tech_comments']);
            $document = new document();
            if ($document_id) {
                $document->saveData('document_data_6_head', $save_array, 'document_id', $document_id);
            } else {
                $document->saveData('document_data_6_head', $save_array);
            }

            // Valve Testing
            // Delete first
            $document->deleteData('document_data_6_valve', 'document_id', $document_id);

            // Add options
            if (is_array($_POST['testingOption'])) {
                foreach ($_POST['testingOption'] as $key => $value) {
                    if ($value['size_a'] != '' || $value['size_b'] != '') {
                        $save_array = array('document_id' => $new_document_id,
                            'option_id' => $key,
                            'size_a' => $value['size_a'],
                            'size_b' => $value['size_b']);
                        $document->saveData('document_data_6_valve', $save_array);
                    }
                }
            }

            // Need to save the question answers
            document::saveQuestions($type_id, $new_document_id);
            break;

        case '7':
            $save_array = array('document_id' => $new_document_id,
                'inspection_date' => $_POST['inspection_date'],
                'technician' => $_POST['technician'],
                'job_name' => $_POST['job_name'],
                'job_address' => $_POST['job_address'],
                'site_contact' => $_POST['site_contact'],
                'valve_type' => $_POST['valve_type'],
                'valve_make' => $_POST['valve_make'],
                'valve_model' => $_POST['valve_model'],
                'valve_year' => $_POST['valve_year'],
                'valve_system' => $_POST['valve_system'],
                'valve_serial' => $_POST['valve_serial'],
                'comments' => $_POST['comments']);

            $document = new document();
            if ($document_id) {
                $document->saveData('document_data_7_head', $save_array, 'document_id', $document_id);
            } else {
                $document->saveData('document_data_7_head', $save_array);
            }

            // Need to save the question answers
            document::saveQuestions($type_id, $new_document_id);

            // Delete first
            $document->deleteData('document_data_7_component', 'document_id', $document_id);

            // Add options
            if (is_array($_POST['component_option'])) {
                foreach ($_POST['component_option'] as $key => $value) {
                    $value = $value[0];
                    if ($value != '') {
                        $save_array = array('document_id' => $new_document_id,
                            'option_id' => $key,
                            'option_value' => $value);
                        $document->saveData('document_data_7_component', $save_array);
                    }
                }
            }

            $save_array = array('document_id' => $new_document_id,
                'pressure_switches' => $_POST['pressure_switches'],
                'flow_switches' => $_POST['flow_switches'],
                'supervistory_switches' => $_POST['supervistory_switches']);

            if ($document_id) {
                $document->saveData('document_data_7_switches', $save_array, 'document_id', $document_id);
            } else {
                $document->saveData('document_data_7_switches', $save_array);
            }

            $save_array = array('document_id' => $new_document_id,
                'city_pressure' => $_POST['city_pressure'],
                'system_pressure' => $_POST['system_pressure'],
                'air_pressure' => $_POST['air_pressure'],
                'flow_pressure' => $_POST['flow_pressure'],
                'trip_pressure' => $_POST['trip_pressure'],
                'trip_time_min' => $_POST['trip_time_min'],
                'test_time_min' => $_POST['test_time_min'],
                'trip_time_qod_min' => $_POST['trip_time_qod_min'],
                'trip_time_sec' => $_POST['trip_time_sec'],
                'test_time_sec' => $_POST['test_time_sec'],
                'trip_time_qod_sec' => $_POST['trip_time_qod_sec']);
            if ($document_id) {
                $document->saveData('document_data_7_report', $save_array, 'document_id', $document_id);
            } else {
                $document->saveData('document_data_7_report', $save_array);
            }
            break;

        case '8':
            $save_array = array('document_id' => $new_document_id,
                'customer_name' => $_POST['customer_name'],
                'technician' => $_POST['technician'],
                'address' => $_POST['address'],
                'inspection_date' => $_POST['inspection_date'],
                'city' => $_POST['city'],
                'contact' => $_POST['contact'],
                'site' => $_POST['site'],
                'comments' => $_POST['comments']);
            $document = new document();
            if ($document_id) {
                $document->saveData('document_data_8_head', $save_array, 'document_id', $document_id);
            } else {
                $document->saveData('document_data_8_head', $save_array);
            }

            // Need to save the question answers
            document::saveQuestions($type_id, $new_document_id);

            $save_array = array('document_id' => $new_document_id,
                'water_supply_source' => $_POST['water_supply_source'],
                'fire_pump' => $_POST['fire_pump'],
                'jockey_pump' => $_POST['jockey_pump']);
            if ($document_id) {
                $document->saveData('document_data_8_pump', $save_array, 'document_id', $document_id);
            } else {
                $document->saveData('document_data_8_pump', $save_array);
            }

            $save_array = array('document_id' => $new_document_id,
                'location_cabinet' => $_POST['location_cabinet'],
                'number_floors' => $_POST['number_floors'],
                'fire_hose_length' => $_POST['fire_hose_length'],
                'type_control_valve' => $_POST['type_control_valve']);
            if ($document_id) {
                $document->saveData('document_data_8_test', $save_array, 'document_id', $document_id);
            } else {
                $document->saveData('document_data_8_test', $save_array);
            }

            $save_array = array('document_id' => $new_document_id,
                'hose_length' => $_POST['hose_length'],
                'flow_location' => $_POST['flow_location'],
                'orifice' => $_POST['orifice'],
                'num_hoses_used' => $_POST['num_hoses_used'],
                'gpm' => $_POST['gpm'],
                'pito_tube' => $_POST['pito_tube'],
                'hose_rack' => $_POST['hose_rack']);
            if ($document_id) {
                $document->saveData('document_data_8_water', $save_array, 'document_id', $document_id);
            } else {
                $document->saveData('document_data_8_water', $save_array);
            }
            break;

        case '9':
            // Man this turned out really dumb.  Feature creep.
            $save_array = array('document_id' => $new_document_id,
                'building_name' => $_POST['building_name'],
                'address' => $_POST['address'],
                'date' => $_POST['date'],
                'system_manufacturer' => $_POST['system_manufacturer'],
                'model_number' => $_POST['model_number'],
                'comments' => $_POST['comments'],
                'primary_technician' => $_POST['primary_technician'],
                'primary_company' => $_POST['primary_company'],
                'primary_telephone' => $_POST['primary_telephone'],
                'primary_identification' => $_POST['primary_identification'],
                'technician' => $_POST['technician'],
                'company' => $_POST['company'],
                'telephone' => $_POST['telephone'],
                'identification' => $_POST['identification']);
            if ($document_id) {
                $document->saveData('document_data_9_head', $save_array, 'document_id', $document_id);
            } else {
                $document->saveData('document_data_9_head', $save_array);
            }

            $save_array = array('document_id' => $new_document_id,
                'e21_transponder_location' => $_POST['e21_transponder_location'],
                'e21_identification' => $_POST['e21_identification']);

            if ($document_id) {
                $document->saveData('document_data_9_e_2_1', $save_array, 'document_id', $document_id);
            } else {
                $document->saveData('document_data_9_e_2_1', $save_array);
            }

            $save_array = array('document_id' => $new_document_id,
                'e23_transponder_location' => $_POST['e23_transponder_location'],
                'e23_address' => $_POST['e23_address']);

            if ($document_id) {
                $document->saveData('document_data_9_e_2_3', $save_array, 'document_id', $document_id);
            } else {
                $document->saveData('document_data_9_e_2_3', $save_array);
            }

            $save_array = array('document_id' => $new_document_id,
                'e24_transponder_location' => $_POST['e24_transponder_location'],
                'e24_transponder_identification' => $_POST['e24_transponder_identification']);

            if ($document_id) {
                $document->saveData('document_data_9_e_2_4', $save_array, 'document_id', $document_id);
            } else {
                $document->saveData('document_data_9_e_2_4', $save_array);
            }

            $save_array = array('document_id' => $new_document_id,
                'e25_transponder_location' => $_POST['e25_transponder_location'],
                'e25_transponder_identification' => $_POST['e25_transponder_identification'],
                'e25_transponder_location_2' => $_POST['e25_transponder_location_2'],
                'e25_transponder_identification_2' => $_POST['e25_transponder_identification_2'],
                'e25_transponder_location_3' => $_POST['e25_transponder_location_3'],
                'e25_transponder_identification_3' => $_POST['e25_transponder_identification_3'],
                'e25_transponder_location_4' => $_POST['e25_transponder_location_4'],
                'e25_transponder_identification_4' => $_POST['e25_transponder_identification_4']);

            if ($document_id) {
                $document->saveData('document_data_9_e_2_5', $save_array, 'document_id', $document_id);
            } else {
                $document->saveData('document_data_9_e_2_5', $save_array);
            }

            $save_array = array('document_id' => $new_document_id,
                'e26_annunciator_location' => $_POST['e26_annunciator_location'],
                'e26_annunciator_identification' => $_POST['e26_annunciator_identification']);

            if ($document_id) {
                $document->saveData('document_data_9_e_2_6', $save_array, 'document_id', $document_id);
            } else {
                $document->saveData('document_data_9_e_2_6', $save_array);
            }

            $save_array = array('document_id' => $new_document_id,
                'e27_annunciator_location' => $_POST['e27_annunciator_location'],
                'e27_annunciator_identification' => $_POST['e27_annunciator_identification']);

            if ($document_id) {
                $document->saveData('document_data_9_e_2_7', $save_array, 'document_id', $document_id);
            } else {
                $document->saveData('document_data_9_e_2_7', $save_array);
            }

            $save_array = array('document_id' => $new_document_id,
                'e28_remote_location' => $_POST['e28_remote_location'],
                'e28_remote_identification' => $_POST['e28_remote_identification']);

            if ($document_id) {
                $document->saveData('document_data_9_e_2_8', $save_array, 'document_id', $document_id);
            } else {
                $document->saveData('document_data_9_e_2_8', $save_array);
            }

            $save_array = array('document_id' => $new_document_id,
                'e29_printer_location' => $_POST['e29_printer_location'],
                'e29_printer_identification' => $_POST['e29_printer_identification']);

            if ($document_id) {
                $document->saveData('document_data_9_e_2_9', $save_array, 'document_id', $document_id);
            } else {
                $document->saveData('document_data_9_e_2_9', $save_array);
            }

            $save_array = array('document_id' => $new_document_id,
                'e210_transponder_location' => $_POST['e210_transponder_location'],
                'e210_transponder_identification' => $_POST['e210_transponder_identification'],
                'e210_data_identification' => $_POST['e210_data_identification']);

            if ($document_id) {
                $document->saveData('document_data_9_e_2_10', $save_array, 'document_id', $document_id);
            } else {
                $document->saveData('document_data_9_e_2_10', $save_array);
            }

            $save_array = array('document_id' => $new_document_id,
                'record_1' => $_POST['record_1'],
                'record_1_option' => $_POST['record_1_option'],
                'record_2' => $_POST['record_2'],
                'record_2_option' => $_POST['record_2_option'],
                'record_3' => $_POST['record_3'],
                'record_3_option' => $_POST['record_3_option'],
                'remarks_e12' => $_POST['remarks_e12']);
            if ($document_id) {
                $document->saveData('document_data_9_e_2_11', $save_array, 'document_id', $document_id);
            } else {
                $document->saveData('document_data_9_e_2_11', $save_array);
            }

            // Why didn't I loop this?  I don't know.
            $save_array = array('document_id' => $new_document_id,
                'type_1' => $_POST['type_1'],
                'model_1' => $_POST['model_1'],
                'type_2' => $_POST['type_2'],
                'model_2' => $_POST['model_2'],
                'type_3' => $_POST['type_3'],
                'model_3' => $_POST['model_3'],
                'type_4' => $_POST['type_4'],
                'model_4' => $_POST['model_4'],
                'type_5' => $_POST['type_5'],
                'model_5' => $_POST['model_5'],
                'type_6' => $_POST['type_6'],
                'model_6' => $_POST['model_6'],
                'type_7' => $_POST['type_7'],
                'model_7' => $_POST['model_7'],
                'type_8' => $_POST['type_8'],
                'model_8' => $_POST['model_8'],
                'type_9' => $_POST['type_9'],
                'model_9' => $_POST['model_9'],
                'type_10' => $_POST['type_10'],
                'model_10' => $_POST['model_10'],
                'type_11' => $_POST['type_11'],
                'model_11' => $_POST['model_11'],
                'type_12' => $_POST['type_12'],
                'model_12' => $_POST['model_12'],
                'type_13' => $_POST['type_13'],
                'model_13' => $_POST['model_13'],
                'type_14' => $_POST['type_14'],
                'model_14' => $_POST['model_14'],
                'type_15' => $_POST['type_15'],
                'model_15' => $_POST['model_15'],
                'type_16' => $_POST['type_16'],
                'model_16' => $_POST['model_16'],
                'type_17' => $_POST['type_17'],
                'model_17' => $_POST['model_17'],
                'type_18' => $_POST['type_18'],
                'model_18' => $_POST['model_18'],
                'type_19' => $_POST['type_19'],
                'model_19' => $_POST['model_19'],
                'type_20' => $_POST['type_20'],
                'model_20' => $_POST['model_20'],
                'model_method' => $_POST['model_method'],
                'range_2' => $_POST['range_2'],
                'na_value1' => $_POST['na_value1'],
                'na_value2' => $_POST['na_value2']);
            if ($document_id) {
                $document->saveData('document_data_9_e_3_1', $save_array, 'document_id', $document_id);
            } else {
                $document->saveData('document_data_9_e_3_1', $save_array);
            }

            document::saveQuestions($type_id, $new_document_id);

            if ($_REQUEST['device_temp_id']) {
                $query = "UPDATE document_data_9_device SET document_id = $new_document_id WHERE temp_id = '" . $_REQUEST['device_temp_id'] . "'";
                $document->query($query);
            }

            // Let's save the new device
            // Save the fire extinguisher / fire hose report
            /*
              if (is_array($_POST['location'])) {

              // We'll delete these records first.
              $document->deleteData('document_data_9_device','document_id',$document_id);

              // Now add them in.
              foreach($_POST['location'] as $key => $unit_type) {
              if (empty($unit_type)) {
              continue;
              }
              $save_array = array('document_id'			=> $new_document_id,
              'location'				=> $_POST['location'][$key],
              'device'				=> $_POST['device'][$key],
              'correctly_installed'	=> $_POST['correctly_installed'][$key],
              'requires_service'		=> $_POST['requires_service'][$key],
              'alarm'					=> $_POST['alarm'][$key],
              'confirmed'				=> $_POST['confirmed'][$key],
              'zone_address'			=> $_POST['zone_address'][$key],
              'remarks'				=> $_POST['remarks'][$key]);
              $document->saveData('document_data_9_device',$save_array);

              }
              }
             */
            break;

        case '10':
            $save_array = array('document_id' => $new_document_id,
                'location' => $_POST['location'],
                'date' => $_POST['date'],
                'owner' => $_POST['owner'],
                'description' => $_POST['description'],
                'primary_technician' => $_POST['primary_technician']);
            $document = new document();
            if ($document_id) {
                $document->saveData('document_data_10_head', $save_array, 'document_id', $document_id);
            } else {
                $document->saveData('document_data_10_head', $save_array);
            }

            //////////////////////////////////////////////////////////////////////////
            $save_array = array('document_id' => $new_document_id,
                'horsepower' => $_POST['horsepower'],
                'manufacturer' => $_POST['manufacturer'],
                'manufacturer_2' => $_POST['manufacturer_2'],
                'sunction' => $_POST['sunction'],
                'voltage' => $_POST['voltage'],
                'discharge' => $_POST['discharge'],
                'rated' => $_POST['rated'],
                'head_dia' => $_POST['head_dia'],
                'amperage' => $_POST['amperage'],
                'rpm' => $_POST['rpm'],
                'continuous_amperage' => $_POST['continuous_amperage'],
                'gpm' => $_POST['gpm'],
                'model' => $_POST['model'],
                'head' => $_POST['head'],
                'serial_number' => $_POST['serial_number'],
                'model2' => $_POST['model2'],
                'serial_number_2' => $_POST['serial_number_2']);
            $document = new document();
            if ($document_id) {
                $document->saveData('document_data_10_pump', $save_array, 'document_id', $document_id);
            } else {
                $document->saveData('document_data_10_pump', $save_array);
            }

            $save_array = array('document_id' => $new_document_id,
                'suction_piping' => $_POST['suction_piping'],
                'control_valve' => $_POST['control_valve'],
                'discharge_piping' => $_POST['discharge_piping'],
                'control_valve_2' => $_POST['control_valve_2'],
                'sunction_check_valve' => $_POST['sunction_check_valve'],
                'discharge_check_valve' => $_POST['discharge_check_valve'],
                'pressure_relief' => $_POST['pressure_relief'],
                'set_for' => $_POST['set_for']);
            $document = new document();
            if ($document_id) {
                $document->saveData('document_data_10_piping', $save_array, 'document_id', $document_id);
            } else {
                $document->saveData('document_data_10_piping', $save_array);
            }

            $save_array = array('document_id' => $new_document_id,
                'time_of_test' => $_POST['time_of_test'],
                'static_before_suction' => $_POST['static_before_suction'],
                'test_discharge' => $_POST['test_discharge'],
                'cut_in_pressure' => $_POST['cut_in_pressure'],
                'cut_out_pressure' => $_POST['cut_out_pressure'],
                'static_after_test' => $_POST['static_after_test'],
                'after_discharge' => $_POST['after_discharge'],
                'outlet_used' => $_POST['outlet_used'],
                'supervisory_checked' => $_POST['supervisory_checked'],
                'packings' => $_POST['packings'],
                'rpm_measured' => $_POST['rpm_measured'],
                'full_load' => $_POST['full_load'],
                'voltage_drop' => $_POST['voltage_drop'],
                'vacuum_inside' => $_POST['vacuum_inside'],
                'angular_alignment' => $_POST['angular_alignment'],
                'parallel_alignment' => $_POST['parallel_alignment'],
                'pump_level' => $_POST['pump_level'],
                'base_firm' => $_POST['base_firm'],
                'comments' => $_POST['comments']);
            $document = new document();
            if ($document_id) {
                $document->saveData('document_data_10_test', $save_array, 'document_id', $document_id);
            } else {
                $document->saveData('document_data_10_test', $save_array);
            }
            break;

        case 11:
            if (is_array($_POST['include'])) {
                // We'll delete these records first.
                $document->deleteData('document_data_11_cert', 'document_id', $document_id);

                // Now add them in.
                foreach ($_POST['include'] as $report_id => $report) {
                    if (empty($report)) {
                        continue;
                    }
                    $save_array = array('document_id' => $new_document_id,
                        'report_id' => $_POST['include'][$report_id],
                        'inspected' => $_POST['inspected'][$report_id],
                        'deficiencies' => $_POST['deficiencies'][$report_id],
                        'tech' => $_POST['certified_technician'][$report_id]);
                    $document->saveData('document_data_11_cert', $save_array);
                }
            }

            $document->deleteData('document_data_11_data', 'document_id', $document_id);
            $save_array = array('document_id' => $new_document_id,
                'inspection_date' => $_POST['inspection_date']);

            $document->saveData('document_data_11_data', $save_array);
            break;

        case '12':
            $save_array = array('document_id' => $new_document_id,
                'customer_name' => $_POST['customer_name'],
                'address' => $_POST['address'],
                'city' => $_POST['city'],
                'state' => $_POST['state'],
                'zip' => $_POST['zip'],
                'telephone' => $_POST['telephone'],
                'store' => $_POST['store'],
                'comments' => $_POST['comments'],
                'owner' => $_POST['owner']);
            $document = new document();
            if ($document_id) {
                $document->saveData('document_data_12_head', $save_array, 'document_id', $document_id);
            } else {
                $document->saveData('document_data_12_head', $save_array);
            }

            $save_array = array('document_id' => $new_document_id,
                'appliance1' => $_POST['appliance1'],
                'appliance2' => $_POST['appliance2'],
                'appliance3' => $_POST['appliance3'],
                'appliance4' => $_POST['appliance4'],
                'appliance5' => $_POST['appliance5'],
                'appliance6' => $_POST['appliance6'],
                'appliance7' => $_POST['appliance7'],
                'appliance8' => $_POST['appliance8']);
            $document = new document();
            if ($document_id) {
                $document->saveData('document_data_12_location', $save_array, 'document_id', $document_id);
            } else {
                $document->saveData('document_data_12_location', $save_array);
            }

            $save_array = array('document_id' => $new_document_id,
                'date_service' => $_POST['date_service'],
                'time_service' => $_POST['time_service'],
                'am' => $_POST['am'],
                'pm' => $_POST['pm'],
                'annual' => $_POST['annual'],
                'semi_annual' => $_POST['semi_annual'],
                'recharge' => $_POST['recharge'],
                'installation' => $_POST['installation'],
                'renovation' => $_POST['renovation'],
                'loc_cynlinders' => $_POST['loc_cynlinders'],
                'ul_300' => $_POST['ul_300'],
                'manufacturer' => $_POST['manufacturer'],
                'model_number' => $_POST['model_number'],
                'wet' => $_POST['wet'],
                'dry_chemical' => $_POST['dry_chemical'],
                'cylinder_master' => $_POST['cylinder_master'],
                'cylinder_slave' => $_POST['cylinder_slave'],
                'cylinder_slave_2' => $_POST['cylinder_slave_2'],
                'fuel' => $_POST['fuel'],
                'electric' => $_POST['electric'],
                'gas' => $_POST['gas'],
                'size' => $_POST['size'],
                'serial_number' => $_POST['serial_number'],
                'last_hydro' => $_POST['last_hydro'],
                'last_recharge' => $_POST['last_recharge'],
                'page_number' => $_POST['page_number'],
                'drawing_number' => $_POST['drawing_number'],
                'final_date' => $_POST['final_date'],
                'technician' => $_POST['technician'],
                'permit_no' => $_POST['permit_no'],
                'date_2' => $_POST['date_2'],
                'time_2' => $_POST['time_2'],
                'am_2' => $_POST['am_2'],
                'pm_2' => $_POST['pm_2'],
                'agent' => $_POST['agent']);

            $document = new document();
            if ($document_id) {
                $document->saveData('document_data_12_data', $save_array, 'document_id', $document_id);
            } else {
                $document->saveData('document_data_12_data', $save_array);
            }

            document::saveQuestions($type_id, $new_document_id);
            break;

        case 13:

            $fields = explode(',', $_POST['saveFields']);

            $save_array = array('document_id' => $new_document_id);
            foreach ($fields as $key => $item) {
                $save_array[$item] = $_POST[$item];
            }
            $document = new document();
            if ($document_id) {
                $document->saveData('document_data_13_data', $save_array, 'document_id', $document_id);
            } else {
                $document->saveData('document_data_13_data', $save_array);
            }
            document::saveQuestions($type_id, $new_document_id);
            break;
    }

    // Check if we need to send an email
    if (1 == $_POST['fl_email']) {
        notification::sendDocumentNotification($user_id, $new_document_id);
    }
    if($redirect){
        header('Location: ' . $redirect);
    }else{
        header('Location: documents.php?user_id=' . $user_id . '&property_id=' . $property_id);
    }
} else {
    header('Location: edit_property.php?id=' . $_POST['id'] . '&user_id=' . $_POST['user_id']);
}
?>