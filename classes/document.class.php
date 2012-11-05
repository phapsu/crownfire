<?php
class document extends crownfire {

	public function __construct($document_id=null) {
		parent::__construct();

		if ($document_id) {
			$this->document_id = $document_id;
			$this->load();
		}
	}

	// Fetch our data
	public function load() {
		$query = "SELECT * FROM documents WHERE id = '".$this->document_id."'";
		$results = $this->db->dbQuery($query);

		if ($this->db->num_rows($results) == 0) {
			Error::displayError("Invalid document_id.  Sorry.");
			exit();
		} else {
			$info = $this->db->get_assoc($results);
			if ($this->securityCheckIsValid()) {
				$this->setDocumentId($info['id']);
				$this->setName($info['document_name']);
                                $this->setYear($info['year']);
				$this->setStateId($info['state_id']);
				$this->setDeficiency($info['deficiency']);
				$this->setUserId($info['user_id']);
				$this->setPropertyId($info['property_id']);
				$this->setTypeId($info['type_id']);
				$this->setDateAdded($info['date_added']);
				$this->setDateUpdated($info['date_updated']);
				if(isset($info['comment'])) $this->setComments($info['comment']);
			}
		}
	}
        
        public function runQuery($query) {
            $this->db->dbQuery($query);
        }
        
	public function save() {
		if (isset($this->document_id)) {
			$query = 'UPDATE documents ';
		} else {
			$query = 'INSERT INTO documents ';
		}

		$query .= ' SET ';

		$query .= " user_id 		= '".$this->db->escape_string($this->user_id)."',
					document_name 	= '".$this->db->escape_string($this->name)."',
                                        year 	= '".$this->db->escape_string($this->year)."',
		 			property_id 	= '".$this->db->escape_string($this->property_id)."',
		 			type_id 		= '".$this->db->escape_string($this->type_id)."',
		 			state_id 		= '".$this->db->escape_string($this->state_id)."',
		 			deficiency 		= '".intval($this->db->escape_string($this->deficiency))."',
		 			date_added		= '".$this->db->escape_string($this->date_added)."',
		 			date_updated	= '".$this->db->escape_string($this->date_updated)."'";

		if ($this->document_id) {
			$query .= " WHERE id = '".$this->db->escape_string($this->document_id)."'";
			$results = $this->db->dbQuery($query);
			return $this->document_id;
		} else {
			$results = $this->db->dbQuery($query);
			return $this->db->sql_insert_id($results);
		}
	}

	public function delete() {
		$query = "DELETE FROM documents WHERE id = ".$this->db->escape_string($this->document_id);
		$this->db->dbQuery($query);

		$query = "DELETE FROM document_answers WHERE document_id = ".$this->db->escape_string($this->document_id);
		$this->db->dbQuery($query);

		// TODO: cleanup all the data tables
	}

	public function query($query) {
		$this->db->dbQuery($query);
	}

	public function saveData($table,$array,$id_field=null,$id=null) {

		// Just verify this row exists.
		if(!is_null($id)) {
			$query = "SELECT count(*) as my_c FROM $table WHERE $id_field = $id";
			$results = $this->db->dbQuery($query);
			if ($this->db->result($results,0,'my_c') == 0) {
				$id = null;
			}
		}

		if (is_null($id)) {
			$query = "INSERT INTO $table SET ";
		} else {
			$query = "UPDATE $table SET ";
		}

		$x=0;
		foreach($array as $field => $value) {
			$query .= "$field = '".$this->db->escape_string($value)."'";
			$x++;
			if ($x != count($array)) {
				$query .= ',';
			}
		}

		if (!is_null($id) && !is_null($id_field)) {
			$query .= " WHERE $id_field = '".$id."'";
		}
		$this->db->dbQuery($query);
	}

	public function deleteData($table,$id_field,$id) {
		$query = "DELETE FROM $table WHERE $id_field = '".$this->db->escape_string($id)."'";
		$this->db->dbQuery($query);
		return null;
	}

	///////////////////////////////////////////////////////////////////////

	public function getDocumentsByPropertyId($property_id, $state = null, $group = null, $year = null) {
		$query = "SELECT documents.id FROM documents, document_types WHERE documents.property_id = '".$this->db->escape_string($property_id)."' AND document_types.id = documents.type_id";
		if(!is_null($state)) {
			$query .= " AND documents.state_id = '".$this->db->escape_string($state)."'";
		}

                if (!is_null($year)) {
                    $query .= " AND documents.year = $year";
                }
                
		if (!is_null($group)) {
			$query .= " GROUP BY documents.type_id";
		}

		$query .= ' ORDER BY document_types.type ASC, documents.date_added DESC';
                
		$results = $this->db->dbQuery($query);
		$return = array();
		while($myrow = $this->db->row($results)) {
			$return[] = new self($myrow['id']);
		}
		return $return;
	}

	///////////////////////////////////////////////////////////////////////

	public function getAllDocumentsByPropertyId($property_id, $state = null) {
		$query = "SELECT id FROM documents WHERE property_id = '".$this->db->escape_string($property_id)."'";
		if(!is_null($state)) {
			$query .= " AND state_id = '".$this->db->escape_string($state)."'";
		}
		$results = $this->db->dbQuery($query);
		$return = array();
		while($myrow = $this->db->row($results)) {
			$return[] = new self($myrow['id']);
		}
		return $return;
	}

        ///////////////////////////////////////////////////////////////////////

	public static function getExistingReports($user_id, $property_id, $type_id) {
            $db = new database();
            $query = "SELECT id FROM documents WHERE user_id = '".$user_id."' AND property_id = '".$db->escape_string($property_id)."' AND type_id = '".$type_id."'";
            
            $results = $db->dbQuery($query);
            $return = array();
            while($myrow = $db->row($results)) {
                    $return[] = new self($myrow['id']);
            }
            return $return;
	}
        
	//////////////////////////////////////////////////////////////////////////

	public function getCertificate($property_id, $state = null) {
		$query = "SELECT id FROM documents WHERE property_id = '".$this->db->escape_string($property_id)."' AND type_id = 11";
		if(!is_null($state)) {
			$query .= " AND state_id = '".$this->db->escape_string($state)."'";
		}
		$query .= ' LIMIT 1';

		$results = $this->db->dbQuery($query);
		if ($this->db->num_rows($results) != 0) {
			$return = array();
			while($myrow = $this->db->row($results)) {
				$return[] = new self($myrow['id']);
			}
			return $return;
		} else {
			return false;
		}
	}
	////////////////////////////////////////////////////////////////////////

	public function setDocumentId($id) {
		$this->document_id = $id;
	}

	public function setName($name) {
		$this->name = $name;
	}

        public function setYear($year) {
		$this->year = $year;
	}
        
	public function setUserId($user_id) {
		$this->user_id = $user_id;
	}

	public function setPropertyId($property_id) {
		$this->property_id = $property_id;
	}

	public function setTypeId($type_id) {
		$this->type_id = $type_id;
	}

	public function setDeficiency($deficiency) {
		$this->deficiency = $deficiency;
	}
        
	public function setStateId($state_id) {
		$this->state_id = $state_id;
	}

	public function setDateAdded($date) {
		$this->date_added = $date;
	}

	public function setDateUpdated($date) {
		$this->date_updated = $date;
	}

	public function setComments($comment) {
		$this->comment = $comment;

	}

	/////////////////////////////////////////////////////////////////////

	public function getDocumentId() {
		return $this->document_id;
	}

	public function getName() {
		return $this->name;
	}

        public function getYear() {
		return $this->year;
	}
        
	public function getUserId() {
		return $this->user_id;
	}

	public function getPropertyId() {
		return $this->property_id;
	}

	public function getTypeId() {
		return $this->type_id;
	}

	public function getStateId() {
		return $this->state_id;
	}
        
	public function getDeficiency() {
		return $this->deficiency;
	}

	public function getDateAdded() {
		return $this->date_added;
	}

	public function getDateUpdated() {
		return $this->date_updated;
	}

	public function getComments() {
		return $this->comment;
	}

	public function securityCheckIsValid() {
		return true;
	}

	##################### Static Functions #########################

	public static function getDocumentTypes() {
		$db = new database();
		$query = "SELECT id,type FROM document_types WHERE fl_active = 1 ORDER BY id ASC";
		$results = $db->dbQuery($query);

		$return = array();
		while ($myrow = $db->row($results)) {
			$return[] = $myrow;
		}
		return $return;
	}

	public static function getDocumentStates() {
		$db = new database();
		$query = "SELECT id, statename FROM document_states ORDER BY statename ASC";
		$results = $db->dbQuery($query);

		$return = array();
		while ($myrow = $db->row($results)) {
			$return[] = $myrow;
		}
		return $return;

	}

	public static function getDocumentQuestionsByTypeId($type_id, $section = null) {
		$db = new database();
		$query = "SELECT id, question FROM document_questions WHERE type_id = $type_id";
		if (!empty($section)) {
			$query .= " AND section = $section";
		}
		$query .= " ORDER BY weight ASC, id ASC";

		$results = $db->dbQuery($query);

		$return = array();
		while ($myrow = $db->row($results)) {
			$return[] = $myrow;
		}
		return $return;
	}

	public static function saveQuestions($type_id, $document_id) {
		$db = new database();

		// First kill off all the previous answers
		$query = "DELETE FROM document_answers WHERE document_id = ".$db->escape_string($document_id);
		$db->dbQuery($query);

		// Now parse all the answers
		$query = "SELECT id, question FROM document_questions WHERE type_id = $type_id ORDER BY id ASC";
		$results = $db->dbQuery($query);

		$return = array();
		while ($myrow = $db->row($results)) {
			$question_id = $myrow['id'];
			$question_value = $_POST['question'][$question_id];

			$query = "INSERT INTO
						document_answers
					  SET
					  	 question_id	= '".$db->escape_string($question_id)."',
					     document_id 	= '".$db->escape_string($document_id)."',
					     question_value = '".$db->escape_string($question_value)."'";
			$db->dbQuery($query);
		}

		// Now save all our custom options ...
		if (is_array($_POST['custom_question'])) {
			foreach($_POST['custom_question'] as $question_id => $array) {
				if (is_array($array)) {
					foreach($array as $option_id => $question_value) {
						$question_value = $question_value[0];
						if (!empty($question_value)) {
							$query = "INSERT INTO
										document_answers
									  SET
									  	 question_id	= '".$db->escape_string($question_id)."',
									  	 option_id		= '".$db->escape_string($option_id)."',
									     document_id 	= '".$db->escape_string($document_id)."',
									     question_value = '".$db->escape_string($question_value)."'";
							$db->dbQuery($query);
						}
					}
				}
			}
		}
	}

	public static function getCustomOption($question_id) {
		$db = new database();
		$query = "SELECT id, question_id, optionname_before, optionname_after FROM document_question_options WHERE question_id = ".$db->escape_string($question_id);
		$results = $db->dbQuery($query);

		if ($db->num_rows($results) != 0) {
			$fields = array();
			while ($myrow = $db->row($results)) {
				$fields[] = $myrow;
			}
			return $fields;
		} else {
			return false;
		}
	}

	public static function getDocumentAnswers($document_id) {
		$db = new database();
		$query = "SELECT * FROM document_answers WHERE document_id = $document_id";
		$results = $db->dbQuery($query);

		$return = array();
		while ($myrow = $db->row($results)) {
			$return[$myrow['question_id']] = $myrow['question_value'];
		}

		return $return;
	}

	public static function getCustomDocumentAnswers($document_id) {
		$db = new database();
		$query = "SELECT * FROM document_answers WHERE document_id = $document_id AND option_id != 0";
		$results = $db->dbQuery($query);

		$return = array();
		while ($myrow = $db->row($results)) {
			$return[$myrow['option_id']] = $myrow['question_value'];
		}

		return $return;
	}

	public static function getDocumentTypeById($type_id) {
		$db = new database();
		$query = "SELECT type FROM document_types WHERE id = $type_id";
		$results = $db->dbQuery($query);

		if ($db->num_rows($results) != 0) {
			return $db->result($results,0,'type');
		} else {
			return 'n/a';
		}
	}

	public static function getData($table, $primary, $id, $return_array=false, $use_id=null, $weight = false) {
		$db = new database();
		$query = "SELECT * FROM $table WHERE $primary = '".$db->escape_string($id)."'";
                if ($weight) {
                    $query .= ' ORDER BY weight ASC, id DESC';
                }
		$results = $db->dbQuery($query);
		if ($return_array) {
			$return = array();
			while ($myrow = $db->row($results)) {
				if ($use_id) {
					$return[$myrow[$use_id]] = $myrow;
				} else {
					$return[] = $myrow;
				}
			}
		} else {
			$return = $db->get_assoc($results);
			if (is_array($return)) {
				foreach($return as $key => $value) {
					$return2[$key] = stripslashes(str_replace('"', '&quot;', $value));
				}
			}
			return $return2;
		}

		return $return;
	}

	public static function getDataSimple($table) {
		$db = new database();

		$query = "SELECT * FROM $table";
		$results = $db->dbQuery($query);

		$return = array();
		while ($myrow = $db->row($results)) {
			$return[] = $myrow;
		}

		return $return;
	}

	public static function getTestingOptions($document_id) {
		$db = new database();

		$query = "SELECT * FROM document_data_6_valve WHERE document_id = '".$db->escape_string($document_id)."'";
		$results = $db->dbQuery($query);

		$return = array();
		while ($myrow = $db->row($results)) {
			$return[$myrow['option_id']] = $myrow;
		}
		return $return;
	}
        
	public function getDocumentHTMLAll($property_id, $year=null) {
		$document_list = $this->getDocumentsByPropertyId($property_id, 1, null, $year);
		$i = 0;
		foreach($document_list as $document) {
			$i++;
			$html .= self::getDocumentHTML($document->getDocumentId());

			// We add a pagebreak for each type ..
			if (count($document_list) != $i) {
				$html .= '<br pagebreak="true"/>';
			}
		}
		return $html;
	}
	public static function getCreatedData($property_id) {
		return time();


	}

	public static function getUpdatedData($property_id) {
		return time();


	}

	public function getCertificateHTML($property_id) {
		global $cfg;

		// We need the document ID
		$query = "SELECT id FROM documents WHERE property_id = ".$this->db->escape_string($property_id)." AND type_id = 11";
		$results = $this->db->dbQuery($query);

		if ($this->db->num_rows($results) != 0) {
			$document_id = $this->db->result($results,0,'id');
		} else {
			echo "Error finding certificate information";
			exit();
		}
		$document = new self();
		$reports = $document->getDocumentsByPropertyId($property_id);
		$reportData = $document->getData('document_data_11_cert','document_id',$document_id, true);
		$documentInfo = $document->getData('document_data_11_data','document_id',$document_id);

		// We need to process this array a bit
		if (is_array($reportData)) {
			foreach($reportData as $key => $array) {
				$reportArray[$array['report_id']] = $array;
			}
		}

		// tcpdf doesn't support border-image.  dammit.
		$html = '<center>
				<table width="100%" padding="5" border="0" style="border: 10px solid #000000;">
				  <tr>
				   <td align="center">
				   	&nbsp; <br /> &nbsp; <br />
				     <table width="100%">
				      <tr>
				       <td width="10%"><img src="'.$cfg['site_url'].'/img/nfpa.png" width="55" /></td>
				       <td width="80%"><img src="'.$cfg['site_url'].'/img/pdf_logo.png" width="400" /> </td>
				       <td width="10%"><img src="'.$cfg['site_url'].'/img/cfaa.png" width="55" /></td>
				   	  </tr>
				   	 </table>
				   	<br />
				   	<font size="16"><b>Annual Inspection Certificate</b></font>
				   	<br />
				   	<font size="12">'.property::getPropertyAddress($property_id).'</font>
				   	<br /> <br />
				   	 <center>
					  <table style="font-size: 24px;" width="100%" border="0">
					   <tr>
					    <td width="15%">&nbsp; </td>
					    <td width="70%" align="left">
This is to certify that the Fire and/or Life Safety systems as listed below, have been tested and inspected by Certified trained personnel,
and are fully operational as designed and installed. All tests performed, are in accordance to all Manufacturers specifications, all
applicable codes and standards as
required by the Authorities Having Jurisdiction. All deficiencies, if any, have been corrected on that
date shown as listed below. A detailed list of all equipment, devices, test results and recommendations to improve these systems, are
outlined in the Annual Fire and Life Safety Report.
					   	</td>
					   	<td width="15%">&nbsp; </td>
					   </tr>
					  </table>
					 </center>


				   	<br />

				   	<table style="font-size: 24px;" cellpadding="0" cellspacing="3" width="90%">
				   	 <tr>
				   	  <td width="15%">&nbsp; </td>
				   	  <td width="15%">&nbsp; </td>
				   	  <td width="20%"><b><u>Date Inspected/Tested</u></b></td>
				   	  <td width="20%"><b><u>Deficiencies Corrected</u></b></td>
				   	  <td width="30%"><b><u>Certified Technician</u></b></td>
				   	 </tr>';
					if (is_array($reports)) {
						foreach($reports as $info) {
							if (is_array($reportArray[$info->getDocumentId()])) {
								$check = '<img src="'.$cfg['site_url'].'/images/red_checkmark.gif" width="8" height="8" />';
								$html .= '<tr>
									   	    <td width="15%">'.$check.'</td>
									   	    <td width="25%">'.strtoupper(document::getDocumentTypeById($info->getTypeId())).'</td>
									   	    <td width="20%">'.strtoupper($reportArray[$info->getDocumentId()]['inspected']).'</td>
									   	    <td width="20%">'.strtoupper($reportArray[$info->getDocumentId()]['deficiencies']).'</td>
									   	    <td width="20%">'.strtoupper($reportArray[$info->getDocumentId()]['tech']).'</td>
										  </tr>';
							}
						}
					}
			$html .= '<tr><td colspan="5">&nbsp; </td></tr>';
			$html .= '<tr><td colspan="2" align="right">Next Inspection due on or before:</td>
				      <td>'.$documentInfo['inspection_date'].'</td>
				      <td>Service Manager:</td>
				      <td><b>David Leonardis</b></td>
				     </tr>
				     <tr><td colspan="5">&nbsp; <br /> &nbsp; <br /></td></tr>
					</table>';
			$html .= '</td>
				  	 </tr></table></center>
				    <table width="100%"><tr><td align="center"><br /> &nbsp; <br /> This certificate does not override the annual inspection report</td></tr></table>';
		return $html;
	}

	public static function getDocumentHTML($document_id) {
		$db = new database();
		// Get some basic document info
		$documentObj = new self($document_id);

		// Get the document type
		$type = self::getDocumentTypeById($documentObj->getTypeId());

		$html = '<font size="15"><b>'.$type.'</b></font><br /><br />';

		// It's just easier to do a switch here.  I'm sure I could have saved some work but ... meh
		switch($documentObj->getTypeId()) {
			case '1':
				$documentInfo = $documentObj->getData('document_data_1_head','document_id',$document_id, false);

				$header = '<table style="font-size: 25px;" cellpadding="0" cellspacing="5" width="95%">
						  <tr valign="top">
						   <td width="15%" align="right"><b>Customer Name:</b></td>
						   <td width="25%" align="left">'.$documentInfo['customer_name'].'</td>
						   <td width="15%" align="right"><b>Technician:</b></td>
						   <td width="25%" align="left">'.$documentInfo['technician'].'</td>
						  </tr>
						  <tr valign="top">
						   <td width="15%" align="right"><b>Address:</b></td>
						   <td align="left">'.$documentInfo['address'].'</td>
						   <td width="15%" align="right"><b>Inspection Date:</b></td>
						   <td align="left">'.$documentInfo['inspection_date'].'</td>
						  </tr>
						  <tr valign="top">
						   <td colspan="4"><b>Manufacturer Name & Model Number:</b> '.$documentInfo['man_name_model'].'</td>
						  </tr>
						 </table><br />';

				$html .= $header;

				$zoneInfo 	  = $documentObj->getData('document_data_1_zones','document_id',$document_id,true);

				if (is_array($zoneInfo) && count($zoneInfo) > 0) {
					$html .= '<font size="10"><b>Alarm Panel Information</b></font><br /><br />';
					$html .= '<table border="1" style="font-size: 25px; width: 650px;" cellpadding="5">';
					$html .= '<tr bgcolor="#000000" style="color: #FFFFFF;">
								<td colspan="4" width="50%">&nbsp; </td>
								<td width="25%">Alarm Circuit</td>
								<td width="25%">Supervisory Circuit</td>
							  </tr>';
					foreach($zoneInfo as $key => $zone) {
					  $html .= '<tr>
								   <td width="10%">Zone Name:</td>
								   <td width="15%">'.$zone['zone_name'].'</td>
								   <td width="10%">Zone #:</td>
								   <td width="15%">'.$zone['zone_num'].'</td>
								   <td width="25%">'.$zone['alarm_circuit'].'</td>
								   <td width="25%">'.$zone['supervisory_circuit'].'</td>
								  </tr>';
					}
					$html .= '</table>';
				}
				$html .= '<br /><br />';
			break;

			case '3':
				$documentInfo = $documentObj->getData('document_data_3_head','document_id',$document_id,false);

				$html .= '<table style="font-size: 30px;" cellpadding="0" cellspacing="5" width="95%">
						  <tr valign="top">
						   <td width="25%" align="right"><b>Customer Name:</b></td>
						   <td width="25%" align="left">'.$documentInfo['customer_name'].'</td>
						   <td width="25%" align="right"><b>Technician 1:</b></td>
						   <td width="25%" align="left">'.$documentInfo['technician_1'].'</td>
						  </tr>
						  <tr valign="top">
						   <td width="25%" align="right"><b>Address:</b></td>
						   <td width="25%" align="left">'.$documentInfo['address'].'</td>
						   <td width="25%" align="right"><b>Technician 2:</b></td>
						   <td width="25%" align="left">'.$documentInfo['technician_2'].'</td>
						  </tr>
						  <tr>
						   <td width="25%" align="right"><b>City:</b></td>
						   <td width="25%" align="left">'.$documentInfo['city'].'</td>
						   <td width="25%" align="right"><b>Inspection Date:</b></td>
						   <td width="25%" align="left">'.$documentInfo['inspection_date'].'</td>
						  </tr>
						 </table><br />';

				$summaryInfo 	  = $documentObj->getData('document_data_3_summary','document_id',$document_id,false);

				if (is_array($summaryInfo) && count($summaryInfo) > 0) {
					$html .= '<font size="10"><b>Summary</b></font><br /><br />';
					$html .= '<table border="1" style="font-size: 30px; width: 600px;" cellpadding="5">';
					$html .= '<tr valign="top">
								<td>
								 <b>Deficiencies</b>:<br /><br />
								 '.nl2br($summaryInfo['deficiencies']).'
								</td>
							  </tr>
							  <tr valign="top">
							  	<td><b>Recommendations:</b><br /><br />
							  	'.nl2br($summaryInfo['recommendations']).'
							  	</td>
							  </tr>
							  <tr valign="top">
								  <td><b>Remarks:</b><br /><br />
								  '.nl2br($summaryInfo['remarks']).'
								  </td>
							  </tr>
							 </table><br />';
				}

				// Our questions/answers
				$html .= self::getQuestionsHTML($document_id, $documentObj->getTypeId()).'<br /><br />';

			break;

			case '4':
				$documentInfo 		= $documentObj->getData('document_data_4_head','document_id',$document_id);

				$reportInfo 	  	= $documentObj->getData('document_data_4_report','document_id',$document_id,true);

				$html .= '<table width="100%">
						   <tr>
						   	 <td width="75%">
								 <table style="font-size: 25px;" cellpadding="0" cellspacing="5" width="90%">
								  <tr valign="top">
								   <td width="25%" align="right"><b>Customer Name:</b></td>
								   <td width="25%" align="left">'.$documentInfo['customer_name'].'</td>
								   <td width="25%" align="right"><b>Technician:</b></td>
								   <td width="25%" align="left">'.$documentInfo['technician'].'</td>
								  </tr>
								  <tr valign="top">
								   <td width="25%" align="right"><b>Address:</b></td>
								   <td width="25%" align="left">'.$documentInfo['address'].'</td>
								   <td width="25%" align="right"><b>Inspection Date:</b></td>
								   <td width="25%" align="left">'.$documentInfo['inspection_date'].'</td>
								  </tr>
								  <tr valign="top">
								   <td width="25%" align="right"><b>City:</b></td>
								   <td width="25%" align="left">'.$documentInfo['city'].'</td>
								   <td width="25%" align="right"><b>Site:</b></td>
								   <td width="25%" align="left">'.$documentInfo['site'].'</td>
								  </tr>
								  <tr>
								   <td width="25%" align="right"><b>Contact:</b></td>
								   <td width="75%" colspan="3" align="left">'.$documentInfo['contact'].'</td>
								  </tr>
								 </table>
							</td>
							<td width="25%">
								<table width="100%" style="border: 1px solid #000; font-size: 22px;" cellpadding="4">
								   <tr>
								    <td colspan="2"><u><b>Lengend</b></u></td>
								   </tr>
								   <tr>
								    <td>R/C</td>
								    <td>Re-Charge</td>
								   </tr>
								   <tr>
								    <td>6YR</td>
								    <td>6YR Maintenance</td>
								   </tr>
								   <tr>
								    <td>H/T</td>
								    <td>Hydro-Static Testing</td>
								   </tr>
								   <tr>
								    <td>I/R</td>
								    <td>Inspect & Re-Rack</td>
								   </tr>
								   <tr>
								    <td>P</td>
								    <td>Pulled For Service</td>
								   </tr>
								   <tr>
								    <td>C</td>
								    <td>Condemned</td>
								   </tr>
								  </table>
							</td>
							</tr></table>';


				if (is_array($reportInfo) && count($reportInfo) > 0) {
					$html .= '<table style="font-size: 20px; border: 1px solid #000000; width: 680px;" cellpadding="5" border="1">
								 <tr align="center" bgcolor="#000000" style="color: #FFFFFF;">
								  <td width="5%">No.#</td>
								  <td width="20%">Hose Location</td>
								  <td width="10%">Size &amp; Type</td>
								  <td width="10%">Manufacture</td>
								  <td width="10%">Extinguisher #</td>
								  <td width="10%">Manufacture Date</td>
								  <td width="5%">Last <br />H-Test</td>
								  <td width="5%">Next <br />H-Test</td>
								  <td width="10%">Next <br />6 Year</td>
								  <td width="15%">Remarks</td>
								 </tr>';
					foreach($reportInfo as $key => $report) {
						  $html .= '<tr align="center">
									  <td width="5%">'.stripslashes($report['report_num']).'</td>
									  <td width="20%">'.stripslashes($report['location']).'</td>
									  <td width="10%">'.stripslashes($report['size_type']).'</td>
									  <td width="10%">'.stripslashes($report['manufacture']).'</td>
									  <td width="10%">'.stripslashes($report['serial']).'</td>
									  <td width="10%">'.stripslashes($report['manufacture_date']).'</td>
									  <td width="5%">'.stripslashes($report['last_h_test']).'</td>
									  <td width="5%">'.stripslashes($report['next_h_test']).'</td>
									  <td width="10%">'.stripslashes($report['next_six_year']).'</td>
									  <td width="15%">'.stripslashes($report['remarks']).'</td>
									</tr>';
					}
					$html .= '</table>';
			}

			break;

			case '5':
				$documentInfo 		= $documentObj->getData('document_data_5_head','document_id',$document_id);

				$formInfo 		  	= $documentObj->getData('document_data_5_form','document_id',$document_id,true);

				$html .= '<table width="100%">
						   <tr>
						   	 <td width="75%">
						   	 <table style="font-size: 30px;" cellpadding="0" cellspacing="5" width="90%">
							  <tr valign="top">
							   <td width="25%" align="right"><b>Customer Name:</b></td>
							   <td width="25%" align="left">'.$documentInfo['customer_name'].'</td>
							   <td width="25%" align="right"><b>Technician:</b></td>
							   <td width="25%" align="left">'.$documentInfo['technician'].'</td>
							  </tr>
							  <tr valign="top">
							   <td width="25%" align="right"><b>Address:</b></td>
							   <td width="25%" align="left">'.$documentInfo['address'].'</td>
							   <td width="25%" align="right"><b>Inspection Date:</b></td>
							   <td width="25%" align="left">'.$documentInfo['inspection_date'].'</td>
							  </tr>
							  <tr valign="top">
							   <td width="25%" align="right"><b>City:</b></td>
							   <td width="25%" align="left">'.$documentInfo['city'].'</td>
							   <td width="25%" align="right"><b>Site:</b></td>
							   <td width="25%" align="left">'.$documentInfo['site'].'</td>
							  </tr>
							  <tr>
							   <td width="25%" align="right"><b>Contact:</b></td>
							   <td width="75%" colspan="3" align="left">'.$documentInfo['contact'].'</td>
							  </tr>
							 </table>
							</td>
							<td width="25%">
							  <table width="100%" style="border: 1px solid #000; font-size: 22px;" cellpadding="4">
							   <tr>
							    <td colspan="2"><u><b>Lengend</b></u></td>
							   </tr>
							   <tr>
							    <td>-</td>
							    <td>Less / Greater</td>
							   </tr>
							   <tr>
							    <td>P</td>
							    <td>Pass</td>
							   </tr>
							   <tr>
							    <td>F</td>
							    <td>Fail</td>
							   </tr>
							   <tr>
							    <td>RB</td>
							    <td>Requires Batteries</td>
							   </tr>
							   <tr>
							    <td>NR</td>
							    <td>Unit Needs Replacing</td>
							   </tr>
							  </table>
							</td>
						   </tr>
						  </table>';

				if (is_array($formInfo) && count($formInfo) > 0) {
					$html .= '<font size="10"><b>Emergency Lighting Annual Inspection Form</b></font><br /><br />';

					$html .= '<table border="1" style="font-size: 25px; border: 1px solid #000000; width: 650px;" cellpadding="5">
							 <tr bgcolor="#000000" style="color: #fff;">
							  <td width="10%"><b>Type:</b></td>
							  <td width="25%">( U ) = Emergency Light Unit</td>
							  <td width="20%">( C ) = Combo Unit</td>
							  <td width="25%">( R ) = Remote Head</td>
							  <td width="20%">( X ) = Exit Sign</td>
							 </tr>
							</table><br />';

					$html .= '<table border="1" style="font-size: 25px; border: 1px solid #000000; width: 650px;" cellpadding="5">
							  <tr align="center" bgcolor="#000000" style="color: #FFFFFF;">
							   <td width="10%">Unit Type</td>
							   <td width="30%">Location</td>
							   <td width="5%">Time Illuminated</td>
							   <td width="10%">Pass or Fail</td>
							   <td width="10%">Unit Voltage</td>
							   <td width="10%">Unit Watts</td>
							   <td width="5%"># Of Batteries</td>
							   <td width="20%">Size Of Batteries</td>
							  </tr>';
					foreach($formInfo as $key => $form) {
						$html .= '<tr align="center">
                                                    <td width="10%">'.$form['unit_type'].'</td>
                                                    <td width="30%">'.$form['location'].'</td>
                                                    <td width="5%">'.$form['time_illuminated'].'</td>
                                                    <td width="10%">'.$form['pass_or_fail'].'</td>
                                                    <td width="10%">'.$form['unit_voltage'].'</td>
                                                    <td width="10%">'.$form['unit_watts'].'</td>
                                                    <td width="5%">'.$form['num_batteries'].'</td>
                                                    <td width="20%">'.$form['size_batteries'].'</td>
                                            </tr>';
					}
					$html .= '</table><br /><br />';
				}

				$html .= '<font size="10"><b>Remarks</b></font><br />
						'.$documentInfo['comments'].'<br /><br />';

				$html .= '<table width="100%"><tr><td align="center"><font size="6">Records Must Be Available Upon Fire Departments Request for Min 2 Years</font></td></tr></table>';
			break;

			case '6':
				$documentInfo 		= $documentObj->getData('document_data_6_head','document_id',$document_id);
				$testingInfo		= document::getDataSimple('valve_testing_options');
				$testingOptions 	= document::getTestingOptions($document_id);

				$html .= '<table style="font-size: 30px;" cellpadding="0" cellspacing="5" width="90%">
						  <tr valign="top">
						   <td width="25%" align="right"><b>Customer Name:</b></td>
						   <td width="25%" align="left">'.$documentInfo['customer_name'].'</td>
						   <td width="25%" align="right"><b>Technician:</b></td>
						   <td width="25%" align="left">'.$documentInfo['technician'].'</td>
						  </tr>
						  <tr valign="top">
						   <td width="25%" align="right"><b>Address:</b></td>
						   <td width="25%" align="left">'.$documentInfo['address'].'</td>
						   <td width="25%" align="right"><b>Inspection Date:</b></td>
						   <td width="25%" align="left">'.$documentInfo['inspection_date'].'</td>
						  </tr>
						 </table><br />';

				$html .= '<table style="font-size: 30px;" cellpadding="0" cellspacing="5" width="90%">';
				$html .= '<tr>';
				$html .= '<td width="50%">Fire Hydrant Location</td>';
				$html .= '<td width="50%">Technician Comments</td>';
				$html .= '</tr>';
				$html .= '<tr>';
				$html .= '<td width="50%" style="border: 1px solid #000;">';
				$img = document::getDocumentImage($document_id);
				if ($img) {
					$html .= '<img src="'.$img.'" />';
				}
				$html .= '</td>';
				$html .= '<td width="50%" style="border: 1px solid #000;">';
				$html .= $documentInfo['tech_comments'];
				$html .= '</td>';
				$html .= '</tr></table>';

				$html .= 'Fire Hydrant Make And Model: '.$documentInfo['hydrant_make'].'<br /><br />';

				$html .= '<font size="10"><b>Valve Testing</b></font><br /><br />';

				$html .= '<table style="font-size: 30px; border: 1px solid #000000; width: 350px;" cellpadding="5">
							 <tr align="center" bgcolor="#000000" style="color: #FFFFFF;">
							  <td width="70%">Size of Test Valve</td>
							  <td>3/4"</td>
							  <td>1"</td>
							 </tr>';
				 if (is_array($testingInfo)) {
				 	foreach($testingInfo as $key => $valueArray) {
				 		$html .= '<tr align="center">
								  <td>'.$valueArray['testing_name'].'</td>
								  <td>'.$testingOptions[$valueArray['id']]['size_a'].'</td>
								  <td>'.$testingOptions[$valueArray['id']]['size_b'].'</td>
								</tr>';
				 	}
				 }
				$html .= '</table><br />';

				// Our questions/answers
				$html .= self::getQuestionsHTML($document_id, $documentObj->getTypeId()).'<br /><br />';
			break;

			case '7':
				$documentInfo 		= $documentObj->getData('document_data_7_head','document_id',$document_id);
				$switchInfo 		= $documentObj->getData('document_data_7_switches','document_id',$document_id);
				$reportInfo 		= $documentObj->getData('document_data_7_report','document_id',$document_id);
				$componentInfo		= document::getDataSimple('component_options');
				$componentOptions	= document::getDataSimple('document_data_7_component');

				$html .= '<table style="font-size: 30px;" cellpadding="0" cellspacing="5" width="90%">
						 <tr>
						  <td width="25%">Inspection Date:</td>
						  <td>'.$documentInfo['inspection_date'].'</td>
						 </tr>
						 <tr>
						  <td>Technician:</td>
						  <td>'.$documentInfo['technician'].'</td>
						 </tr>
						 <tr>
						  <td>Job Name:</td>
						  <td>'.$documentInfo['job_name'].'</td>
						 </tr>
						  <tr>
						  <td>Job Address:</td>
						  <td>'.$documentInfo['job_address'].'</td>
						 </tr>
						 <tr>
						  <td>Site Contact:</td>
						  <td>'.$documentInfo['site_contact'].'</td>
						 </tr>
						</table>';

				// Our questions/answers
				$html .= self::getQuestionsHTML($document_id, $documentObj->getTypeId());

				$html .= '<br /><font size="10"><b>Valve Info</b></font><br />
						<table style="font-size: 30px;" cellpadding="0" width="90%">
						 <tr align="center" bgcolor="#000000" style="color: #fff; font-weight: bold;">
						  <td width="16%">Type of Valve</td>
						  <td width="16%">Make of Valve</td>
						  <td width="16%">Valve Model</td>
						  <td width="16%">Year</td>
						  <td width="16%">System #</td>
						  <td width="16%">Serial Number</td>
						 </tr>
						 <tr align="center">
						  <td>'.$documentInfo['valve_type'].'</td>
						  <td>'.$documentInfo['valve_make'].'</td>
						  <td>'.$documentInfo['valve_model'].'</td>
						  <td>'.$documentInfo['valve_year'].'</td>
						  <td>'.$documentInfo['valve_system'].'</td>
						  <td>'.$documentInfo['valve_serial'].'</td>
						 </tr>
						</table>';

				if (is_array($componentInfo) && is_array($componentOptions)) {
				 	// Fetch our options (if any)

 					$html .= '<br /><font size="10"><b>System Components</b></font><br />
								<table border="1" style="font-size: 30px; border: 1px solid #000000;" cellpadding="5" width="90%">
								 <tr align="center" bgcolor="#000000" style="color: #fff; font-weight: bold;">
								  <td>System Component</td>
								  <td>OK</td>
								  <td>Needs Work</td>
								  <td>N/A</td>
								 </tr>';
				 	foreach($componentInfo as $key => $valueArray) {
				 		$html .= '<tr align="center">
						  		  <td align="left">'.$valueArray['component_option'].'</td>';
				 		  $checked = false;
						  for($i=1;$i<=3;$i++) {
						  	$html .= '<td>';
						  	if($i==$componentOptions[$valueArray['id']]['option_value'] || ($i==3 && $checked == false)) {
						  		$html .= '<img src="'.$cfg['site_url'].'/images/red_checkmark.gif" width="8" height="8" />';
						  		$checked = true;
						  	}
						  	$html .= '</td>';
						  }
						$html .= '</tr>';
				 	}
					$html .= '</table><br />';
				 }

				 $html .= '<font size="10"><b>Make &amp; Model Switches</b></font><br />
						<table style="font-size: 30px; border: 1px solid #000000;" cellpadding="0" cellspacing="5" width="90%">
						 <tr>
						  <td><b>Pressure Switches:</b></td>
						  <td>'.$switchInfo['pressure_switches'].'</td>
						 </tr>
						 <tr>
						  <td><b>Flow Switches:</b></td>
						  <td>'.$switchInfo['flow_switches'].'</td>
						 </tr>
						 <tr>
						  <td><b>Supervistory Switches:</b></td>
						  <td>'.$switchInfo['supervistory_switches'].'</td>
						 </tr>
						</table><br />

						<font size="10"><b>Flow Test Report</b></font><br />
						<table style="font-size: 30px; border: 1px solid #000000;" cellpadding="0" cellspacing="5" width="90%">
						 <tr>
						  <td width="25%"><b>City Pressure PSI:</b></td>
						  <td>'.$reportInfo['city_pressure'].'</td>
						  <td width="25%"><b>System Static Pressure PSI:</b></td>
						  <td>'.$reportInfo['system_pressure'].'</td>
						 </tr>
						 <tr>
						  <td width="25%"><b>Air Pressure PSI:</b></td>
						  <td>'.$reportInfo['air_pressure'].'</td>
						  <td width="25%"><b>Flow Residual Pressure PSI:</b></td>
						  <td>'.$reportInfo['flow_pressure'].'</td>
						 </tr>
						</table><br />

						<font size="10"><b>Time &amp; Trip Test Report</b><br />

						<table style="font-size: 30px; border: 1px solid #000000;" cellpadding="0" cellspacing="5" width="90%">
						 <tr>
						  <td width="25%"><b>Trip Pressure PSI:</b></td>
						  <td>'.$reportInfo['trip_pressure'].'</td>
						  <td width="25%"><b>Trip Time:</b></td>
						  <td>'.$reportInfo['trip_time_min'].' min. '.$reportInfo['trip_time_sec'].' sec.</td>
						 </tr>
						 <tr>
						  <td width="25%"><b>Inspectors Test Time:</b></td>
						  <td>'.$reportInfo['test_time_min'].' min. '.$reportInfo['test_time_sec'].' sec</td>
						  <td width="25%"><b>Trip Time (Q.O.D.):</b></td>
						  <td>'.$reportInfo['trip_time_qod_min'].' min. '.$reportInfo['trip_time_qod_sec'].' sec</td>
						 </tr>
						</table><br />

						<font size="10"><b>Comments</b></font><br />
						'.$documentInfo['comments'].'<br /><br />';
			break;

			case '8':
				$documentInfo 		= $documentObj->getData('document_data_8_head','document_id',$document_id);
				$pumpInfo 	 	 	= $documentObj->getData('document_data_8_pump','document_id',$document_id,false);
				$testInfo 	 	 	= $documentObj->getData('document_data_8_test','document_id',$document_id,false);
				$waterInfo 	 	 	= $documentObj->getData('document_data_8_water','document_id',$document_id,false);

				$html .= '<table style="font-size: 30px;" cellpadding="0" cellspacing="5" width="90%">
						  <tr valign="top">
						   <td width="25%" align="right"><b>Customer Name:</b></td>
						   <td width="25%" align="left">'.$documentInfo['customer_name'].'</td>
						   <td width="25%" align="right"><b>Technician:</b></td>
						   <td width="25%" align="left">'.$documentInfo['technician'].'</td>
						  </tr>
						  <tr valign="top">
						   <td width="25%" align="right"><b>Address:</b></td>
						   <td width="25%" align="left">'.$documentInfo['address'].'</td>
						   <td width="25%" align="right"><b>Inspection Date:</b></td>
						   <td width="25%" align="left">'.$documentInfo['inspection_date'].'</td>
						  </tr>
						  <tr valign="top">
						   <td width="25%" align="right"><b>City:</b></td>
						   <td width="25%" align="left">'.$documentInfo['city'].'</td>
						   <td width="25%" width="15%" align="right"><b>Site:</b></td>
						   <td width="25%" align="left">'.$documentInfo['site'].'</td>
						  </tr>
						  <tr>
						   <td width="25%" align="right"><b>Contact:</b></td>
						   <td colspan="75%" align="left">'.$documentInfo['contact'].'</td>
						  </tr>
						 </table><br />

						<font size="10"><b>Pump Info</b></font><br />
						<table style="font-size: 30px; border: 1px solid #000000;" width="90%" cellpadding="5">
						 <tr>
						  <td width="30%"><b>Water Supply Source:</b></td>
						  <td width="70%">'.$pumpInfo['water_supply_source'].'</td>
						 </tr>
						 <tr>
						  <td width="30%"><b>Fire Pump:</b></td>
						  <td width="70%">'.$pumpInfo['fire_pump'].'</td>
						 </tr>
						 <tr>
						  <td width="30%"><b>Jockey Pump:</b></td>
						  <td width="70%">'.$pumpInfo['jockey_pump'].'</td>
						 </tr>
						</table><br />

						<font size="10"><b>Test Information</b></font><br />
						<table style="font-size: 30px; border: 1px solid #000000;" width="90%" cellpadding="5">
						 <tr>
						  <td width="30%"><b>Location Of Highest Fire Hose Cabinet:</b></td>
						  <td width="70%">'.$testInfo['location_cabinet'].'</td>
						 </tr>
						 <tr>
						  <td width="30%"><b>Number of Floors:</b></td>
						  <td width="70%">'.$testInfo['number_floors'].'</td>
						 </tr>
						 <tr>
						  <td width="30%"><b>Fire Hose Length in Cabnets:</b></td>
						  <td width="70%">'.$testInfo['fire_hose_length'].'</td>
						 </tr>
						  <tr>
						  <td width="30%"><b>Type of Control Valve:</b></td>
						  <td width="70%">'.$testInfo['type_control_valve'].'</td>
						 </tr>
						</table><br />';

				$html .= self::getQuestionsHTML($document_id, $documentObj->getTypeId());

				$html .= '<br /><font size="10"><b>Water Flow Data</b></font><br />';

				$html .= '<table style="font-size: 30px; border: 1px solid #000000;" width="90%" cellpadding="5">
							 <tr>
							  <td width="30%"><b>Hose Length:</b></td>
							  <td width="70%">'.$waterInfo['hose_length'].'</td>
							 </tr>
							 <tr>
							  <td width="30%"><b>Flow Location:</b></td>
							  <td width="70%">'.$waterInfo['flow_location'].'</td>
							 </tr>
							 <tr>
							  <td width="30%"><b>Orifice:</b></td>
							  <td width="70%">'.$waterInfo['orifice'].'</td>
							 </tr>
							 <tr>
							  <td width="30%"><b># of Hoses Used:</b></td>
							  <td width="70%">'.$waterInfo['num_hoses_used'].'</td>
							 </tr>
							 <tr>
							  <td width="30%"><b>GPM:</b></td>
							  <td width="70%">'.$waterInfo['gpm'].' PSI</td>
							 </tr>
							 <tr>
							  <td width="30%"><b>Pito Tube:</b></td>
							  <td width="70%">'.$waterInfo['pito_tube'].' PSI</td>
							 </tr>
							 <tr>
							  <td width="30%"><b>Hose Rack Residual Reading:</b></td>
							  <td width="70%">'.$waterInfo['hose_rack'].' PSI</td>
							 </tr>
							</table><br />

							<font size="10"><b>Comments</b></font><br /><br />';

							$html .= $documentInfo['comments'].'<br /><br />';
			break;

			case '9':

				$documentInfo 		= $documentObj->getData('document_data_9_head','document_id',$document_id);
				$documentInfo 		= array_merge($documentInfo, $documentObj->getData('document_data_9_e_2_1','document_id',$document_id));
				$documentInfo 		= array_merge($documentInfo, $documentObj->getData('document_data_9_e_2_3','document_id',$document_id));
				$documentInfo 		= array_merge($documentInfo, $documentObj->getData('document_data_9_e_2_4','document_id',$document_id));
				$documentInfo 		= array_merge($documentInfo, $documentObj->getData('document_data_9_e_2_5','document_id',$document_id));
				$documentInfo 		= array_merge($documentInfo, $documentObj->getData('document_data_9_e_2_6','document_id',$document_id));
				$documentInfo 		= array_merge($documentInfo, $documentObj->getData('document_data_9_e_2_7','document_id',$document_id));
				$documentInfo 		= array_merge($documentInfo, $documentObj->getData('document_data_9_e_2_8','document_id',$document_id));
				$documentInfo 		= array_merge($documentInfo, $documentObj->getData('document_data_9_e_2_9','document_id',$document_id));
				$documentInfo 		= array_merge($documentInfo, $documentObj->getData('document_data_9_e_2_10','document_id',$document_id));
				$documentInfo 		= array_merge($documentInfo, $documentObj->getData('document_data_9_e_2_11','document_id',$document_id));
				$documentInfo 		= array_merge($documentInfo, $documentObj->getData('document_data_9_e_3_1','document_id',$document_id));
				$formInfo 			= $documentObj->getData('document_data_9_device','document_id',$document_id, true);

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

				$html .= '<font size="10"><b>E1. Fire Alarm System Annual Test and Inspection Report - CAN/ULC S536-04</b></font><br /><br />';
				$header = '<table style="font-size: 30px; border: 1px solid #000000;" cellpadding="5" width="90%">
						 <tr>
						  <td width="30%"><b>Building Name:</b></td>
						  <td width="70%">'.$documentInfo['building_name'].'</td>
						 </tr>
						 <tr>
						  <td width="30%"><b>Address:</b></td>
						  <td width="70%">'.$documentInfo['address'].'</td>
						 </tr>
						 <tr>
						  <td width="30%"><b>Date:</b></td>
						  <td width="70%">'.$documentInfo['date'].'</td>
						 </tr>
						 <tr>
						  <td width="30%"><b>System Manufacturer:</b></td>
						  <td width="70%">'.$documentInfo['system_manufacturer'].'</td>
						 </tr>
						 <tr>
						  <td width="30%"><b>Model Number:</b></td>
						  <td width="70%">'.$documentInfo['model_number'].'</td>
						 </tr>
						</table><br /><br />';
				$html .= $header;
				$html .= self::getQuestionsHTML($document_id, $documentObj->getTypeId(), 1, array(1 => 'Yes', 0 => 'No', 'N/A' => 'N/A'), false);

				$html .= '<br /><b>Comments</b>: '.$documentInfo['comments'];

				$html .= '<br /> <br /><table style="font-size: 30px;" cellpadding="0" cellspacing="5" width="90%">
							 <tr>
							  <td width="35%" align="left" style="border-bottom:0.5px solid #000;">'.$documentInfo['primary_technician'].'</td>
							  <td width="20%" align="left" style="border-bottom:0.5px solid #000;">'.$documentInfo['primary_company'].'</td>
							  <td width="20%" align="left" style="border-bottom:0.5px solid #000;">'.$documentInfo['primary_telephone'].'</td>
							  <td width="25%" align="left" style="border-bottom:0.5px solid #000;">'.$documentInfo['primary_identification'].'</td>
							 </tr>
							 <tr align="left" style="font-size: 12px;">
							  <td width="35%">Printed Name of Primary or Supervising<br />Technition Conducting the Test and Inspection</td>
							  <td width="20%">Company</td>
							  <td width="20%">Telephone</td>
							  <td width="25%">CFAA Identification Number</td>
							 </tr>
							 <tr>
							  <td width="35%" align="left" style="border-bottom:0.5px solid #000;">'.$documentInfo['technician'].'</td>
							  <td width="20%" align="left" style="border-bottom:0.5px solid #000;">'.$documentInfo['company'].'</td>
							  <td width="20%" align="left" style="border-bottom:0.5px solid #000;">'.$documentInfo['telephone'].'</td>
							  <td width="25%" align="left" style="border-bottom:0.5px solid #000;">'.$documentInfo['identification'].'</td>
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
							<table style="font-size: 30px; border: 1px solid #000000;" cellpadding="5" width="90%">
							 <tr>
							  <td width="40%"><b>Control unit or transponder location:</b></td>
							  <td width="60%">'.$documentInfo['e21_transponder_location'].'</td>
							 </tr>
							 <tr>
							  <td width="40%"><b>Control unit or transponder identification:</b></td>
							  <td width="60%">'.$documentInfo['e21_identification'].'</td>
							 </tr>
							</table>';

				$html .= self::getQuestionsHTML($document_id, $documentObj->getTypeId(), 2, array(1 => 'Yes', 0 => 'No', 'N/A' => 'N/A'), false);

				$html .= '<br pagebreak="true"/>';
				$html .= $header;
				$html .= '<font size="10"><b>E2.2 Voice Communication Test - CAN/ULC S536-04</b></font><br />';

				$html .= self::getQuestionsHTML($document_id, $documentObj->getTypeId(), 3, array(1 => 'Yes', 0 => 'No', 'N/A' => 'N/A'), false);

				$html .= '<br pagebreak="true"/>';
				$html .= $header;
				$html .= '<font size="10"><b>E2.3 Control Unit or Transponder Inspection - CAN/ULC S536-04</b></font><br /><br />
							<table style="font-size: 30px; border: 1px solid #000000;" cellpadding="5" width="90%">
							 <tr>
							  <td width="40%">Control unit or transponder location:</td>
							  <td width="60%">'.$documentInfo['e23_transponder_location'].'</td>
							 </tr>
							 <tr>
							  <td width="40%">Control unit or transponder identification:</td>
							  <td width="60%">'.$documentInfo['e23_address'].'</td>
							 </tr>
							</table>';

				$html .= self::getQuestionsHTML($document_id, $documentObj->getTypeId(), 4, array(1 => 'Yes', 0 => 'No', 'N/A' => 'N/A'), false);

				$html .= '<br pagebreak="true"/>';
				$html .= $header;
				$html .= '<font size="10"><b>E2.4 Power Supply Inspection - CAN/ULC S536-04</b></font><br /><br />
							<table style="font-size: 30px; border: 1px solid #000000;" width="90%" cellpadding="5">
							 <tr>
							  <td width="40%">Control unit or transponder location:</td>
							  <td width="60%">'.$documentInfo['e24_transponder_location'].'</td>
							 </tr>
							 <tr>
							  <td width="40%">Control unit or transponder identification:</td>
							  <td width="60%">'.$documentInfo['e24_transponder_identification'].'</td>
							 </tr>
							</table>';
				$html .= self::getQuestionsHTML($document_id, $documentObj->getTypeId(), 5, array(1 => 'Yes', 0 => 'No', 'N/A' => 'N/A'), false);

				$html .= '<br pagebreak="true"/>';
				$html .= $header;
				$html .= '<font size="10"><b>E2.5 Emergency Power Supply Test and Inspection - CAN/ULC S536-04</b></font><br /><br />
							<table style="font-size: 30px;" cellpadding="0" cellspacing="5" width="90%">
							 <tr>
							  <td width="40%">Control unit or transponder location:</td>
							  <td width="60%">'.$documentInfo['e25_transponder_location'].'</td>
							 </tr>
							 <tr>
							  <td width="40%">Control unit or transponder identification:</td>
							  <td width="60%">'.$documentInfo['e25_transponder_identification'].'</td>
							 </tr>
							</table>';

				$html .= self::getQuestionsHTML($document_id, $documentObj->getTypeId(), 6, array(1 => 'Yes', 0 => 'No', 'N/A' => 'N/A'), false);
				$html .= '<br pagebreak="true"/>';

				if (!empty($documentInfo['e25_transponder_location_2'])) {
						$html .= $header;
						$html .= '<font size="10"><b>E2.5 (B) Emergency Power Supply Test and Inspection - CAN/ULC S536-04</b></font><br /><br />
							<table style="font-size: 30px;" cellpadding="0" cellspacing="5" width="90%">
							 <tr>
							  <td width="40%">Control unit or transponder location:</td>
							  <td width="60%">'.$documentInfo['e25_transponder_location_2'].'</td>
							 </tr>
							 <tr>
							  <td width="40%">Control unit or transponder identification:</td>
							  <td width="60%">'.$documentInfo['e25_transponder_identification_2'].'</td>
							 </tr>
							</table>';

						$html .= self::getQuestionsHTML($document_id, $documentObj->getTypeId(), 15, array(1 => 'Yes', 0 => 'No', 'N/A' => 'N/A'), false);
						$html .= '<br pagebreak="true"/>';
				}

				if (!empty($documentInfo['e25_transponder_location_3'])) {
						$html .= $header;
						$html .= '<font size="10"><b>E2.5 (C) Emergency Power Supply Test and Inspection - CAN/ULC S536-04</b></font><br /><br />
							<table style="font-size: 30px;" cellpadding="0" cellspacing="5" width="90%">
							 <tr>
							  <td width="40%">Control unit or transponder location:</td>
							  <td width="60%">'.$documentInfo['e25_transponder_location_3'].'</td>
							 </tr>
							 <tr>
							  <td width="40%">Control unit or transponder identification:</td>
							  <td width="60%">'.$documentInfo['e25_transponder_identification_3'].'</td>
							 </tr>
							</table>';

						$html .= self::getQuestionsHTML($document_id, $documentObj->getTypeId(), 16, array(1 => 'Yes', 0 => 'No', 'N/A' => 'N/A'), false);
						$html .= '<br pagebreak="true"/>';
				}

				if (!empty($documentInfo['e25_transponder_location_4'])) {
						$html .= $header;
						$html .= '<font size="10"><b>E2.5 (D) Emergency Power Supply Test and Inspection - CAN/ULC S536-04</b></font><br /><br />
							<table style="font-size: 30px;" cellpadding="0" cellspacing="5" width="90%">
							 <tr>
							  <td width="40%">Control unit or transponder location:</td>
							  <td width="60%">'.$documentInfo['e25_transponder_location_4'].'</td>
							 </tr>
							 <tr>
							  <td width="40%">Control unit or transponder identification:</td>
							  <td width="60%">'.$documentInfo['e25_transponder_identification_4'].'</td>
							 </tr>
							</table>';

						$html .= self::getQuestionsHTML($document_id, $documentObj->getTypeId(), 17, array(1 => 'Yes', 0 => 'No', 'N/A' => 'N/A'), false);
						$html .= '<br pagebreak="true"/>';
				}


				$html .= $header;
				$html .= '<font size="10"><b>E2.6 Annunciator and Remote Trouble Signal Unit Test and Inspection - CAN/ULC S536-04</b></font><br /><br />
							<table style="font-size: 30px; border: 1px solid #000000;" width="90%" cellpadding="5">
							 <tr>
							  <td width="40%">Annunciator or remote trouble signal unit location:</td>
							  <td width="60%">'.$documentInfo['e26_annunciator_location'].'</td>
							 </tr>
							 <tr>
							  <td width="40%">Annunciator or remote trouble signal unit identification:</td>
							  <td width="60%">'.$documentInfo['e26_annunciator_identification'].'</td>
							 </tr>
							</table>';

				$html .= self::getQuestionsHTML($document_id, $documentObj->getTypeId(), 9, array(1 => 'Yes', 0 => 'No', 'N/A' => 'N/A'), false);

				$html .= '<br pagebreak="true"/>';
				$html .= $header;
				$html .= '<font size="10"><b>E2.7 Annunciator or Sequential Displays - CAN/ULC S536-04</b></font><br /><br />
							<table style="font-size: 30px; border: 1px solid #000000;" width="90%" cellpadding="5">
							 <tr>
							  <td width="40%">Annunciator or remote trouble signal unit location:</td>
							  <td width="60%">'.$documentInfo['e27_annunciator_location'].'</td>
							 </tr>
							 <tr>
							  <td width="40%">Annunciator or remote trouble signal unit identification:</td>
							  <td width="60%">'.$documentInfo['e27_annunciator_identification'].'</td>
							 </tr>
							</table>';

				$html .= self::getQuestionsHTML($document_id, $documentObj->getTypeId(), 9, array(1 => 'Yes', 0 => 'No', 'N/A' => 'N/A'), false);

				$html .= '<br pagebreak="true"/>';
				$html .= $header;
				$html .= '<font size="10"><b>E2.8 Remote Trouble Signal Unit Test and Inspection - CAN/ULC S536-04</b></font><br /><br />
							<table style="font-size: 30px; border: 1px solid #000000;" width="90%" cellpadding="5">
							 <tr>
							  <td width="40%">Remote trouble signal unit location:</td>
							  <td width="60%">'.$documentInfo['e28_remote_location'].'</td>
							 </tr>
							 <tr>
							  <td width="40%">Remote trouble signal unit identification:</td>
							  <td width="60%">'.$documentInfo['e28_remote_identification'].'</td>
							 </tr>
							</table>';

				$html .= self::getQuestionsHTML($document_id, $documentObj->getTypeId(), 11, array(1 => 'Yes', 0 => 'No', 'N/A' => 'N/A'), false);

				$html .= '<br pagebreak="true"/>';
				$html .= $header;
				$html .= '<font size="10"><b>E2.9 Printer Test - CAN/ULC S536-04</b></font><br /><br />
							<table style="font-size: 30px; border: 1px solid #000000;" width="90%" cellpadding="5">
							 <tr>
							  <td width="40%">Printer location:</td>
							  <td width="60%">'.$documentInfo['e29_printer_location'].'</td>
							 </tr>
							 <tr>
							  <td width="40%">Printer identification:</td>
							  <td width="60%">'.$documentInfo['e29_printer_identification'].'</td>
							 </tr>
							</table>';

				$html .= self::getQuestionsHTML($document_id, $documentObj->getTypeId(), 12, array(1 => 'Yes', 0 => 'No', 'N/A' => 'N/A'), false);

				$html .= '<br pagebreak="true"/>';
				$html .= $header;
				$html .= '<font size="10"><b>E2.10 Communication Link Test - CAN/ULC S536-04</b></font><br /><br />
							<table style="font-size: 30px; border: 1px solid #000000;" width="90%" cellpadding="5">
							 <tr>
							  <td width="40%">Control unit or transponder location:</td>
							  <td width="60%">'.$documentInfo['e210_transponder_location'].'</td>
							 </tr>
							 <tr>
							  <td width="40%">Control unit or transponder identification:</td>
							  <td width="60%">'.$documentInfo['e210_transponder_identification'].'</td>
							 </tr>
							 <tr>
							  <td width="40%">Data communication link identification:</td>
							  <td width="60%">'.$documentInfo['e210_data_identification'].'</td>
							 </tr>
							</table>';
				$html .= self::getQuestionsHTML($document_id, $documentObj->getTypeId(), 13, array(1 => 'Yes', 0 => 'No', 'N/A' => 'N/A'), false);

				$html .= '<br pagebreak="true"/>';
				$html .= $header;
				$html .= '<font size="10"><b>E2.11 Ancillary Device Circuit Test - CAN/ULC S536-04</b></font><br /><br />
							<table style="font-size: 30px; border: 1px solid #000000;" width="90%" cellpadding="5">
							 <tr bgcolor="#000000">
							  <td colspan="2" style="color: #ffffff;">Record Specific Type of Ancillary Circuit</td>
							 </tr>
							 <tr>
							  <td>'.$documentInfo['record_1'].'</td>
							  <td>'.$documentInfo['record_1_option'].'</td>
							 </tr>
							 <tr>
							  <td>'.$documentInfo['record_2'].'</td>
							  <td>'.$documentInfo['record_2_option'].'</td>
							 </tr>
							 <tr>
							  <td>'.$documentInfo['record_3'].'</td>
							  <td>'.$documentInfo['record_3_option'].'</td>
							 </tr>
							</table>
							<br />
							<font size="5">Note: The tests reported on this Form do not include the actual operational test of acillary devices</font>';

				$html .= '<br pagebreak="true"/>';
				$html .= $header;
				$html .= '<font size="10"><b>E2.12 Remarks - CAN/ULC S536-04</b></font><br /><br />';

				$html .= $documentInfo['remarks_e12'];

				$html .= '<br pagebreak="true"/>';
				$html .= $header;
				$html .= '<font size="10"><b>E3.1 Field Device Testing - Legend and Notes - CAN/ULC S536-04</b></font><br /><br />
							<table style="font-size: 30px;" cellpadding="0" cellspacing="5" width="90%">
							 <tr bgcolor="#000000" style="font-weight: bold; color: #ffffff;" align="center">
							  <td width="10%">Device</td>
							  <td width="30%">Description</td>
							  <td width="30%">Type</td>
							  <td width="30%">Model No</td>
							 </tr>
							 <tr>
							  <td width="10%">M</td>
							  <td width="30%">Manual Pull Station</td>
							  <td width="30%" align="center">'.$documentInfo['type_1'].'</td>
							  <td width="30%" align="center">'.$documentInfo['model_1'].'</td>
							 </tr>
							 <tr>
							  <td width="10%">RHT</td>
							  <td width="30%">Heat Detector, Restorable</td>
							  <td width="30%" align="center">'.$documentInfo['type_2'].'</td>
							  <td width="30%" align="center">'.$documentInfo['model_2'].'</td>
							 </tr>
							  <tr>
							  <td width="10%">HT</td>
							  <td width="30%" align="center">Heat Detector, Non-restoreable</td>
							  <td width="30%" align="center">'.$documentInfo['type_19'].'</td>
							  <td width="30%" align="center">'.$documentInfo['model_19'].'</td>
							 </tr>
							 <tr valign="top">
							  <td>S</td>
							  <td>
							  	Smoke Detector
							  	<br /><br />
							  	Sensitivity test method or test equiptment:<br />
							  	Model/Method: '.$documentInfo['model_method'].'
							  	<br /><br />
							  	Manufacturer Sensitivity Range:<br />
							  	Sensitivity Range: '.$documentInfo['range_2'].'
							  </td>
							  <td width="30%" align="center">N/A<br />'.$documentInfo['na_value1'].'</td>
							  <td width="30%" align="center">N/A<br />'.$documentInfo['na_value2'].'</td>
							 </tr>
							 <tr>
							  <td width="10%">RI</td>
							  <td width="30%">Remote Indicator Unit</td>
							  <td width="30%" align="center">'.$documentInfo['type_4'].'</td>
							  <td width="30%" align="center">'.$documentInfo['model_4'].'</td>
							 </tr>
							 <tr>
							  <td width="10%">DS</td>
							  <td width="30%">Duct Smoke Detector</td>
							  <td width="30%" align="center">'.$documentInfo['type_5'].'</td>
							  <td width="30%" align="center">'.$documentInfo['model_5'].'</td>
							 </tr>
							 <tr>
							  <td width="10%">--</td>
							  <td width="30%">Other type of Detector</td>
							  <td width="30%" align="center">'.$documentInfo['type_6'].'</td>
							  <td width="30%" align="center">'.$documentInfo['model_6'].'</td>
							 </tr>
							 <tr>
							  <td width="10%">SFD</td>
							  <td width="30%">Supporting Field Device</td>
							  <td width="30%" align="center">'.$documentInfo['type_7'].'</td>
							  <td width="30%" align="center">'.$documentInfo['model_7'].'</td>
							 </tr>
							 <tr>
							  <td width="10%">FS</td>
							  <td width="30%">Sprinkler Flow Switch</td>
							  <td width="30%" align="center">'.$documentInfo['type_20'].'</td>
							  <td width="30%" align="center">'.$documentInfo['model_20'].'</td>
							 </tr>
							 <tr>
							  <td width="10%">SS</td>
							  <td>Sprinkler Supervisory Device</td>
							  <td width="30%" align="center">'.$documentInfo['type_8'].'</td>
							  <td width="30%" align="center">'.$documentInfo['model_8'].'</td>
							 </tr>
							 <tr>
							  <td width="10%">--</td>
							  <td width="30%">Other Supervisory Devices (low pressure, low water,low temp,power loss etc.)</td>
							  <td width="30%" align="center">'.$documentInfo['type_9'].'</td>
							  <td width="30%" align="center">'.$documentInfo['model_9'].'</td>
							 </tr>
							 <tr>
							  <td width="10%">EM</td>
							  <td width="30%">Fault Isolation Module</td>
							  <td width="30%" align="center">'.$documentInfo['type_10'].'</td>
							  <td width="30%" align="center">'.$documentInfo['model_10'].'</td>
							 </tr>
							 <tr>
							  <td width="10%">B</td>
							  <td width="30%">Bell</td>
							  <td width="30%" align="center">'.$documentInfo['type_11'].'</td>
							  <td width="30%" align="center">'.$documentInfo['model_11'].'</td>
							 </tr>
							 <tr>
							  <td width="10%">H</td>
							  <td width="30%">Horn</td>
							  <td width="30%" align="center">'.$documentInfo['type_12'].'</td>
							  <td width="30%" align="center">'.$documentInfo['model_12'].'</td>
							 </tr>
							 <tr>
							  <td width="10%">V</td>
							  <td width="30%">Visible Signal Device</td>
							  <td width="30%" align="center">'.$documentInfo['type_13'].'</td>
							  <td width="30%" align="center">'.$documentInfo['model_13'].'</td>
							 </tr>
							 <tr>
							  <td width="10%">SP</td>
							  <td width="30%">Cone Type Speaker</td>
							  <td width="30%" align="center">'.$documentInfo['type_14'].'</td>
							  <td width="30%" align="center">'.$documentInfo['model_14'].'</td>
							 </tr>
							 <tr>
							  <td width="10%">HSP</td>
							  <td width="30%">Horn Type Speaker</td>
							  <td width="30%" align="center">'.$documentInfo['type_15'].'</td>
							  <td width="30%" align="center">'.$documentInfo['model_15'].'</td>
							 </tr>
							 <tr>
							  <td width="10%">AD</td>
							  <td width="30%">Ancillary Device</td>
							  <td width="30%" align="center">'.$documentInfo['type_16'].'</td>
							  <td width="30%" align="center">'.$documentInfo['model_16'].'</td>
							 </tr>
							 <tr>
							  <td width="10%">ET</td>
							  <td width="30%">Emergency Telephone</td>
							  <td width="30%" align="center">'.$documentInfo['type_17'].'</td>
							  <td width="30%" align="center">'.$documentInfo['model_17'].'</td>
							 </tr>
							 <tr>
							  <td width="10%">EOL</td>
							  <td width="30%">End of Line Resistor</td>
							  <td width="30%" align="center">'.$documentInfo['type_18'].'</td>
							  <td width="30%" align="center">'.$documentInfo['model_18'].'</td>
							 </tr>
							</table><br />

							<font size="7"><b>The following notes apply to Appendix E3.2, Individual Device Record:</b></font><br />
							<table style="font-size: 30px;" cellpadding="0" cellspacing="5" width="90%" border="0">';
							foreach($notes_array as $num => $note) {
								$html .= '<tr>
										   <td width="11%"><b>Note '.$num.'.</b></td>
										   <td width="91%">'.$note.'</td>
										  </tr>';
							}

							$html .= '</table>';
				$html .= '<br pagebreak="true"/>';
				$html .= $header;
				if (is_array($formInfo)) {
					$html .= '<h3>E3.2 Device Record - CAN/ULC S536-04</h3>
								<table style="font-size: 25px; border: 1px solid #000;" cellpadding="3" cellspacing="0" width="90%" border="1">
								 <tr bgcolor="#000000" style="font-weight: bold; color: #ffffff;" align="center">
								  <td width="10%">Location</td>
								  <td width="10%">Device Type</td>
								  <td width="10%">Correctly Installed</td>
								  <td width="10%">Requires Service</td>
								  <td width="15%">Alarm Operation Confirmed</td>
								  <td width="15%">Annunciator Indication Confirmed</td>
								  <td width="10%">Zone Address</td>
                                                                  <td width="10%">Smoke Sensitivity</td>
								  <td width="10%">Remarks</td>
								 </tr>';
					$printed = 0;
					$page = 1;
					foreach($formInfo as $form) {
						$printed++;
						$html .= '<tr align="center">
								  <td width="10%">'.$form['location'].'</td>
								  <td width="10%">'.$form['device'].'</td>';
						$html .= '<td width="10%">';
						if (strtoupper($form['correctly_installed']) == 'YES') {
							$html .= '<img src="'.$cfg['site_url'].'/images/red_checkmark.gif" width="8" height="8" />';
						} else {
							$html .= ' &nbsp; ';
						}
						$html .= '</td>';
						$html .= '<td width="10%">';
						if (strtoupper($form['requires_service']) == 'YES') {
							$html .= '<img src="'.$cfg['site_url'].'/images/red_checkmark.gif" width="8" height="8" />';
						} else {
							$html .= ' &nbsp; ';
						}
						$html .= '</td>';
						$html .= '<td width="15%">';
						if (strtoupper($form['alarm']) == 'YES') {
							$html .= '<img src="'.$cfg['site_url'].'/images/red_checkmark.gif" width="8" height="8" />';
						} else {
							$html .= ' &nbsp; ';
						}
						$html .= '</td>';
						$html .= '<td width="15%">';
						if (strtoupper($form['confirmed']) == 'YES') {
							$html .= '<img src="'.$cfg['site_url'].'/images/red_checkmark.gif" width="8" height="8" />';
						} else {
							$html .= ' &nbsp; ';
						}
						$html .= '</td>
								  <td width="10%">'.$form['zone_address'].'</td>
                                                                  <td width="10%">'.$form['smoke_sensitivity'].'</td>
								  <td width="10%">'.$form['remarks'].'</td>
								  </tr>';
						if (25 == $printed) {
							$printed = 0;
							$page++;
							$html .= '</table>';
							$html .= '<br pagebreak="true"/>';
							$html .= $header;
							$html .= ' <br /> <h3>E3.2 Device Record - CAN/ULC S536-04 (Page '.$page.')</h3>
								<table style="font-size: 25px; border: 1px solid #000;" cellpadding="3" cellspacing="0" width="90%" border="1">
								 <tr bgcolor="#000000" style="font-weight: bold; color: #ffffff;" align="center">
								  <td width="10%">Location</td>
								  <td width="10%">Device Type</td>
								  <td width="10%">Correctly Installed</td>
								  <td width="10%">Requires Service</td>
								  <td width="20%">Alarm Operation Confirmed</td>
								  <td width="20%">Annunciator Indication Confirmed</td>
								  <td width="10%">Zone Address</td>
								  <td width="10%">Remarks</td>
								 </tr>';
						}
					}
					$html .= '</table>';
				}
			break;

			case '10':
				$documentInfo 		= $documentObj->getData('document_data_10_head','document_id',$document_id);
				$documentInfo 		= array_merge($documentInfo, $documentObj->getData('document_data_10_pump','document_id',$document_id));
				$documentInfo 		= array_merge($documentInfo, $documentObj->getData('document_data_10_test','document_id',$document_id));
				$documentInfo 		= array_merge($documentInfo, $documentObj->getData('document_data_10_piping','document_id',$document_id));

				$html .= '<table style="font-size: 30px;" cellpadding="0" cellspacing="5" width="90%">
							 <tr>
							  <td width="30%"><b>Location:</b></td>
							  <td>'.$documentInfo['location'].'</td>
							 </tr>
							 <tr>
							  <td width="30%"><b>Date:</b></td>
							  <td>'.$documentInfo['date'].'</td>
							 </tr>
							 <tr>
							  <td width="30%"><b>Owner:</b></td>
							  <td>'.$documentInfo['owner'].'</td>
							 </tr>
							 <tr>
							  <td><b>Description of Equiptment:</b></td>
							  <td>'.$documentInfo['description'].'</td>
							 </tr>
							</table>
							<br />

							<font size="10"><b>Fire Pump Info</b></font><br /><br />

							<table style="font-size: 30px; border: 1px solid #000000;" cellpadding="0" cellspacing="5" width="90%">
							 <tr bgcolor="#EEEEEE" align="center">
							  <td colspan="2" width="50%"><b>Driver</b></td>
							  <td colspan="2" width="50%"><b>Pump</b></td>
							 </tr>
							 <tr>
							  <td width="25%"><b>Horsepower:</b></td>
							  <td width="25%">'.$documentInfo['horsepower'].'</td>
							  <td width="25%"><b>Manufacturer:</b></td>
							  <td width="25%">'.$documentInfo['manufacturer'].'</td>
							 </tr>
							 <tr>
							  <td width="25%"><b>Manufacturer:</b></td>
							  <td width="25%">'.$documentInfo['manufacturer_2'].'</td>
							  <td width="25%"><b>Sunction:</b></td>
							  <td width="25%">'.$documentInfo['sunction'].'</td>
							 </tr>
							 <tr>
							  <td width="25%"><b>Voltage:</b></td>
							  <td width="25%">'.$documentInfo['voltage'].'</td>
							  <td width="25%"><b>Discharge:</b></td>
							  <td width="25%">'.$documentInfo['discharge'].'</td>
							 </tr>
							 <tr>
							  <td width="25%"><b>Rated RPM (Synch):</b></td>
							  <td width="25%">'.$documentInfo['rated'].'</td>
							  <td width="25%"><b>Head Dia:</b></td>
							  <td width="25%">'.$documentInfo['head_dia'].'</td>
							 </tr>
							 <tr>
							  <td width="25%"><b>Full Load Amperage:</b></td>
							  <td width="25%">'.$documentInfo['amperage'].'</td>
							  <td width="25%"><b>RPM:</b></td>
							  <td width="25%">'.$documentInfo['rpm'].'</td>
							 </tr>
							 <tr>
							  <td width="25%"><b>Continuous Amperage:</b></td>
							  <td width="25%">'.$documentInfo['continuous_amperage'].'</td>
							  <td width="25%"><b>GPM:</b></td>
							  <td width="25%">'.$documentInfo['gpm'].'</td>
							 </tr>
							 <tr>
							  <td width="25%"><b>Model:</b></td>
							  <td width="25%">'.$documentInfo['model'].'</td>
							  <td width="25%"><b>Head:</b></td>
							  <td width="25%">'.$documentInfo['head'].'</td>
							 </tr>
							 <tr>
							  <td width="25%"><b>Serial Number:</b></td>
							  <td width="25%">'.$documentInfo['serial_number'].'</td>
							  <td width="25%"><b>Model:</b></td>
							  <td width="25%">'.$documentInfo['model2'].'</td>
							 </tr>
							 <tr>
							  <td width="25%">&nbsp; </td>
							  <td width="25%">&nbsp; </td>
							  <td width="25%"><b>Serial Number:</b></td>
							  <td width="25%">'.$documentInfo['serial_number_2'].'</td>
							 </tr>
							</table>
							<br />

							<font size="10"><b>Associated Piping</b></font><br /><br />

							<table style="font-size: 30px; border: 1px solid #000000;" cellpadding="0" cellspacing="5" width="90%">
							 <tr>
							  <td width="25%"><b>Suction Piping:</b></td>
							  <td width="25%">'.$documentInfo['suction_piping'].'</td>
							  <td width="25%"><b>Control Valve:</b></td>
							  <td width="25%">'.$documentInfo['control_valve'].'</td>
							 </tr>
							 <tr>
							  <td width="25%"><b>Discharge Piping:</b></td>
							  <td width="25%">'.$documentInfo['discharge_piping'].'</td>
							  <td width="25%"><b>Control Valve:</b></td>
							  <td width="25%">'.$documentInfo['control_valve_2'].'</td>
							 </tr>
							 <tr>
							  <td width="25%"><b>Sunction Check Valve:</b></td>
							  <td width="25%">'.$documentInfo['sunction_check_valve'].'</td>
							  <td width="25%"><b>Discharge Check Valve:</b></td>
							  <td width="25%">'.$documentInfo['discharge_check_valve'].'</td>
							 </tr>
							 <tr>
							  <td width="25%"><b>Pressure Relief Valve:</b></td>
							  <td width="25%">'.$documentInfo['pressure_relief'].'</td>
							  <td width="25%"><b>Set For:</b></td>
							  <td width="25%">'.$documentInfo['set_for'].'</td>
							 </tr>
							</table><br />

							<font size="10"><b>Test Data</b></font><br /><br />

							<table style="font-size: 30px; border: 1px solid #000000;" cellpadding="0" cellspacing="5" width="90%">
							 <tr>
							  <td width="40%"><b>Time of Test</b></td>
							  <td colspan="3" align="left">'.$documentInfo['time_of_test'].'</td>
							 </tr>
							 <tr>
							  <td width="40%"><b>Static Pressure Before Test Sunction:</b></td>
							  <td>'.$documentInfo['static_before_suction'].'</td>
							  <td width="20%"><b>Discharge:</b></td>
							  <td>'.$documentInfo['test_discharge'].'</td>
							 </tr>
							 <tr>
							  <td width="40%"><b>Cut in Pressure:</b></td>
							  <td>'.$documentInfo['cut_in_pressure'].'</td>
							  <td><b>Cut Out Pressure:</b></td>
							  <td>'.$documentInfo['cut_out_pressure'].'</td>
							 </tr>
							 <tr>
							  <td width="40%"><b>Static Pressure After Test: Suction:</b></td>
							  <td>'.$documentInfo['static_after_test'].'</td>
							  <td><b>Discharge:</b></td>
							  <td>'.$documentInfo['after_discharge'].'</td>
							 </tr>
							 <tr>
							  <td width="40%"><b>Outlet Used for Testing:</b></td>
							  <td colspan="3">'.$documentInfo['outlet_used'].'</td>
							 </tr>
							 <tr>
							  <td width="40%"><b>Supervisory Valves Checked:</b></td>
							  <td colspan="3">'.ucFirst($documentInfo['supervisory_checked']).'</td>
							 </tr>
							 <tr>
							  <td width="40%"><b>Packings:</b></td>
							  <td>'.$documentInfo['packings'].'</td>
							  <td><b>RPM Measured:</b></td>
							  <td>'.$documentInfo['rpm_measured'].'</td>
							 </tr>
							 <tr>
							  <td width="40%"><b>Full Load Amperage Meassured:</b></td>
							  <td colspan="3">'.$documentInfo['full_load'].'</td>
							 </tr>
							 <tr>
							  <td width="40%"><b>Voltage Drop Across Motor Leads:</b></td>
							  <td colspan="3">'.$documentInfo['voltage_drop'].'</td>
							 </tr>
							 <tr>
							  <td width="40%"><b>Vacuum Clean Motor Inside:</b></td>
							  <td colspan="3">'.$documentInfo['vacuum_inside'].'</td>
							 </tr>
							 <tr>
							  <td width="40%"><b>Check Angular Coupling Alignment:</b></td>
							  <td colspan="3">'.$documentInfo['angular_alignment'].'</td>
							 </tr>
							 <tr>
							  <td width="40%"><b>Check Parallel Coupling Alignment:</b></td>
							  <td colspan="3">'.$documentInfo['parallel_alignment'].'</td>
							 </tr>
							 <tr>
							  <td width="40%"><b>Pump Level:</b></td>
							  <td>'.$documentInfo['pump_level'].'</td>
							  <td><b>Base Firm:</b></td>
							  <td>'.$documentInfo['base_firm'].'</td>
							 </tr>
							 <tr>
							  <td width="40%"><b>Comments:</b></td>
							  <td colspan="3">'.$documentInfo['comments'].'</td>
							 </tr>
							</table>
							<br />
							<table style="font-size: 30px;" cellpadding="0" cellspacing="5" width="90%">
							 <tr>
							  <td><b>Lead Technicion:</b></td>
							  <td>'.$documentInfo['primary_technician'].'</td>
							 </tr>
							</table><br /><br />';
			break;

			case '12':
				$documentInfo 		= $documentObj->getData('document_data_12_head','document_id',$document_id);
				$documentInfo 		= array_merge($documentInfo, $documentObj->getData('document_data_12_data','document_id', $document_id));
				$documentInfo 		= array_merge($documentInfo, $documentObj->getData('document_data_12_location','document_id', $document_id));

				$html .= '<table style="font-size: 25px; border: 1px solid #000000;" cellpadding="0" cellspacing="5" width="99%">
							 <tr valign="top">
							  <td width="40%">
								<table width="100%" cellpadding="5">
								 <tr>
								  <td width="40%"><b>Name:</b></td>
								  <td width="60%">'.$documentInfo['customer_name'].'</td>
								 </tr>
								 <tr>
								  <td width="40%"><b>Address:</b></td>
								  <td width="60%">'.$documentInfo['address'].'</td>
								 </tr>
								 <tr>
								  <td width="40%"><b>City:</b></td>
								  <td width="60%">'.$documentInfo['city'].'</td>
								 </tr>
								 <tr>
								  <td width="40%"><b>State:</b></td>
								  <td width="60%">'.$documentInfo['state'].'</td>
								 </tr>
								  <tr>
								  <td width="40%"><b>Zip:</b></td>
								  <td width="60%">'.$documentInfo['zip'].'</td>
								 </tr>
								 <tr>
								  <td width="40%"><b>Telephone:</b></td>
								  <td width="60%">'.$documentInfo['telephone'].'</td>
								 </tr>
								 <tr>
								  <td width="40%"><b>Store No.:</b></td>
								  <td width="60%">'.$documentInfo['store'].'</td>
								 </tr>
								 <tr>
								  <td width="40%"><b>Owner or Manager:</b></td>
								  <td width="60%">'.$documentInfo['owner'].'</td>
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
								  <td colspan="2">'.$documentInfo['date_service'].'</td>
								  <td>'.$documentInfo['time_service'].'</td>
								  <td>'.$documentInfo['am'].'</td>
								  <td>'.$documentInfo['pm'].'</td>
								 </tr>
								 <tr bgcolor="#000000" style="color: #ffffff;">
								  <td>Annual</td>
								  <td>Semi-Annual</td>
								  <td>Recharge</td>
								  <td>Installation</td>
								  <td>Renovation</td>
								 </tr>
								 <tr>
								  <td>'.$documentInfo['annual'].'</td>
								  <td>'.$documentInfo['semi_annual'].'</td>
								  <td>'.$documentInfo['recharge'].'</td>
								  <td>'.$documentInfo['installation'].'</td>
								  <td>'.$documentInfo['renovation'].'</td>
								 </tr>
								 <tr bgcolor="#000000" style="color: #ffffff;">
								  <td colspan="4">Location of System Cynlinders</td>
								  <td>UL 300</td>
								 </tr>
								 <tr>
								  <td colspan="4">'.$documentInfo['loc_cynlinders'].'</td>
								  <td>'.$documentInfo['ul_300'].'</td>
								 </tr>
								 <tr bgcolor="#000000" style="color: #ffffff;">
								  <td colspan="2">Manufacturer</td>
								  <td>Model #</td>
								  <td>Wet</td>
								  <td>Dry Chemical</td>
								 </tr>
								 <tr>
								  <td colspan="2">'.$documentInfo['manufacturer'].'</td>
								  <td>'.$documentInfo['model_number'].'</td>
								  <td>'.$documentInfo['wet'].'</td>
								  <td>'.$documentInfo['dry_chemical'].'</td>
								 </tr>
								 <tr bgcolor="#000000" style="color: #ffffff;" align="center">
								  <td colspan="2">Cylinder Size Master</td>
								  <td>Cylinder Size Slave</td>
								  <td colspan="2">Cylinder Size Slave</td>
								 </tr>
								 <tr align="center">
								  <td colspan="2">'.$documentInfo['cylinder_master'].'</td>
								  <td>'.$documentInfo['cylinder_slave'].'</td>
								  <td colspan="2">'.$documentInfo['cylinder_slave_2'].'</td>
								 </tr>
								 <tr bgcolor="#000000" style="color: #ffffff;">
								  <td colspan="2">Fuel Shut-Off</td>
								  <td>Electric</td>
								  <td>Gas</td>
								  <td>Size</td>
								 </tr>
								 <tr>
								  <td colspan="2">'.$documentInfo['fuel'].'</td>
								  <td>'.$documentInfo['electric'].'</td>
								  <td>'.$documentInfo['gas'].'</td>
								  <td>'.$documentInfo['size'].'</td>
								 </tr>
								 <tr bgcolor="#000000" style="color: #ffffff;" align="center">
								  <td colspan="2">Serial Number</td>
								  <td>Last Hydro Test Date</td>
								  <td colspan="2">Last Recharge Date</td>
								 </tr>
								 <tr align="center">
								  <td colspan="2">'.$documentInfo['serial_number'].'</td>
								  <td>'.$documentInfo['last_hydro'].'</td>
								  <td colspan="2">'.$documentInfo['last_recharge'].'</td>
								 </tr>
								 <tr bgcolor="#000000" style="color: #ffffff;">
								  <td colspan="5">Manufacturer\'s Manual Reference</td>
								 </tr>
								 <tr>
								  <td width="33%" colspan="2">Page No.: '.$documentInfo['page_number'].'</td>
								  <td width="33%">Drawing No.: '.$documentInfo['drawing_number'].'</td>
								  <td width="33%" colspan="2">Date: '.$documentInfo['final_date'].'</td>
								 </tr>
								</table>
							  </td>
							 </tr>
							</table>

							<h3>Cooking Appliance Locations: Left to Right</h3>
							<table style="font-size: 30px; border: 1px solid #000000;" cellpadding="5" cellspacing="0" width="99%" border="1">
							 <tr align="center">
							  <td width="25%">'.$documentInfo['appliance1'].'</td>
							  <td width="25%">'.$documentInfo['appliance2'].'</td>
							  <td width="25%">'.$documentInfo['appliance3'].'</td>
							  <td width="25%">'.$documentInfo['appliance4'].'</td>
							 </tr>
							  <tr align="center">
							  <td width="25%">'.$documentInfo['appliance5'].'</td>
							  <td width="25%">'.$documentInfo['appliance6'].'</td>
							  <td width="25%">'.$documentInfo['appliance7'].'</td>
							  <td width="25%">'.$documentInfo['appliance8'].'</td>
							 </tr>
							</table>&nbsp; <br />';

							$html .= self::getQuestionsHTML($document_id, $documentObj->getTypeId(), null, array(1 => 'Yes'), false, 'numbers');

							$html .= '<h3>Comments</h3>
							<font size="10">'.$documentInfo['comments'].'</font>

							<br /><br />
							<font size="5">On this date, this range hood fire supporession system was inspected and operationally tested in accoredance with the fire suppression system reaquirements of NFPA17 or 17A, 96
							and the manufacturer\'s manual, with the results indicted above.</font>
							<br /><br />

							<table border="1" style="font-size: 30px; border: 1px solid #000000;" cellpadding="3" cellspacing="0" width="99%">
							 <tr>
							  <td align="left">'.$documentInfo['technician'].'</td>
							  <td>'.$documentInfo['permit_no'].'</td>
							  <td>'.$documentInfo['date_2'].'</td>
							  <td>'.$documentInfo['time_2'].'</td>
							  <td>'.$documentInfo['am_2'].'</td>
							  <td>'.$documentInfo['pm_2'].'</td>
							  <td>'.$documentInfo['agent'].'</td>
							 </tr>
							 <tr bgcolor="#000000" style="color: #ffffff;">
							  <td align="left">Service Technician</td>
							  <td>Permit No.</td>
							  <td>Date</td>
							  <td>Time</td>
							  <td>AM</td>
							  <td>PM</td>
							  <td>Customer\'s Authorized Agent</td>
							 </tr>
							</table>';
			break;

			case 13:
				// This one is a bit different.  I got lazy.
				$fields = array();
				$fields = array('building_address' 		=> 'Building Address',
								'information_date'		=> 'Date of Information',
								'manufacturer_name'		=> 'C1. MANUFACTURER NAME AND MODEL NUMBER',
								'system_operation'		=> 'C2. SYSTEM OPERATION (zoned, non zoned, single or two stage) - supervised circuits',
								'location_control'		=> 'C3. LOCATION OF CONTROL UNIT OR TRANSPONDERS, DISPLAY AND CONTROL CENTERS,ANNUNCIATORS, AND REMOTE TROUBLE SIGNAL UNITS.',
								'description'			=> 'C4. DESCRIPTION OF DEGRADED MODE CAPABILITY OPERATION, IF APPLICABLE',
								'sequence'				=> 'C5. SEQUENCE OF OPERATION, INCLUDING, BUT NOT LIMITED TO THE FOLLOWING BRIEFLY DESCRIBED',
								'general_description'	=> 'C6. GENERAL DESCRIPTION OF LOCATION OF DEVICES CONNECTED TO CONTROL UNIT OR TRANSPONDER.',
								'voice_communication'	=> 'C7. VOICE COMMUNICATION SYSTEM AND OPERATION.',
								'emergency_telephone'	=> 'C8. EMERGENCY TELEPHONE EQUIPMENT AND OPERATION.',
								'emergency_power'		=> 'C9. EMERGENCY POWER SUPPLY (IE. BATTERIES IN ONE CENTRAL LOCATION OR DISTRIBUTED IN CONTROL UNITS OR TRANSPONDERS, EMERGENCY GENERATOR OR A COMBINATION OF BOTH) - DISTRIBUTION OF BATTERY TYPE, CHARGING PROCEDURE AND MAINTENANCE.',
								'system_battery'		=> 'C10. SYSTEM BATTERY LOAD CALCULATIONS');

				$questions = array('sequence' 		 	=> array(1, false),
							  	   'general_description'=> array(2, false),
							   	   'system_battery' 	=> array(3, true));
				$documentInfo = $documentObj->getData('document_data_13_data','document_id',$document_id);
				foreach($fields as $field_name => $title) {
					$html .= '<font size="8"><u><b>'.$title.'</b></u></font><br />';
					$html .= '<font size="6">'.$documentInfo[$field_name].'</font><br /><br />';
					if (!empty($questions[$field_name][0])) {
						$html .= self::getQuestionsHTML($document_id, $documentObj->getTypeId(), $questions[$field_name][0], array(1 => 'Yes', 0 => 'No', 'n/a' => 'N/A'), false, 'letters', $questions[$field_name][1]);
						$html .= '<br />';
					}
				}
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
        
	public static function getQuestionsHTML($document_id, $type_id, $section=null, $options_array = array(1 => 'Yes', 0 => 'No'), $add_question = false, $iterate = 'letters', $skip_html = false) {
		global $cfg;
		// Process our questions
		$questions = document::getDocumentQuestionsByTypeId($type_id, $section);
		$answers = document::getDocumentAnswers($document_id);
		$custom_answers = document::getCustomDocumentAnswers($document_id);

		if (is_array($questions)) {
			$nums = 1;
			$letters = 'A';
			$html .= '<br /> <table border="1" style="font-size: 30px; border: 1px solid #000000;" cellpadding="5" width="90%">';

			$html .= '<tr bgcolor="#000000" align="center">';
			if (!is_null($iterate)) {
				$html .= '<td width="8%">&nbsp; </td>';
			}
			$html .= '<td width="40%">&nbsp; </td>';
			foreach($options_array as $key => $value) {
				$html .= '<td width="20%" align="center" style="color: #ffffff;">';
				if (!$skip_html) {
					$html .= $value;
				} else {
					$html .= ' &nbsp; ';
				}
				$html .= '</td>';
			}
			$html .= '</tr>';
			foreach($questions as $questionArray) {
				$html .= '<tr valign="middle">';
				if ($iterate == 'numbers') {
					$html .= '<td width="8%">'.$nums.'.</td>';
				} elseif ($iterate == 'letters') {
					$html .= '<td width="8%">'.strtoupper($letters).'.</td>';
				}
				$html .= '<td width="40%">'.$questionArray['question'];
				$html .= ($add_question) ? '?' : '';
				$html .= '</td>';
				if ($option_name_array = document::getCustomOption($questionArray['id'])) {
					$html .= '<td colspan="'.(count($option_name_array)+2).'">';
					$html .= '<table cellpadding="2" border="0" width="100%">';
					foreach($option_name_array as $key => $row) {
						if (!empty($row['optionname_before']) && !empty($row['optionname_after'])) {
							$width = '33';
						} else {
							$width = '50';
						}

						if (!empty($row['optionname_before']) && !empty($row['optionname_after'])) {
							$align = 'center';
						} elseif (!empty($row['optionname_before'])) {
							$align = "left";
						} else {
							$align = "right";
						}
						$html .= '<tr>';
						 if (!empty($row['optionname_before'])) {
						 	$html .= '<td width="'.$width.'%" align="right">'.$row['optionname_before'].':</td>';
						 }
						 $html .= '<td width="'.$width.'%" align="'.$align.'">'.$custom_answers[$row['id']].'</td>';
						 if (!empty($row['optionname_after'])) {
						 	$html .= '<td width="'.$width.'%" align="left">'.$row['optionname_after'].'</td>';
						 }
						$html .= '</tr>';
					}
					$html .= '</table></td>';
				} else {
					foreach($options_array as $key => $value) {
						$html .= '<td width="20%" align="center" valign="middle">';
						if (!empty($answers[$questionArray['id']]) && $answers[$questionArray['id']] == $value) {
							//$html .= $value;
							$html .= '<img src="'.$cfg['site_url'].'/images/red_checkmark.gif" width="8" height="8" />';
						}
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
		$letters_array = array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z',
							   'AA','BB','CC','DD','EE','FF','GG','HH','II','JJ','KK','LL','MM','NN','OO','PP','QQ','RR','SS','TT','UU','VV','WW','XX','YY','ZZ');
		if (($key = array_search($letter, $letters_array)) === false) {
			return 'A';
		} else {
			return $letters_array[$key+1];
		}
	}

	public static function getDocumentImage($document_id) {
		global $cfg;
		$db = new database();
		$query = "SELECT * FROM document_images WHERE document_id = $document_id";
		$results = $db->dbQuery($query);
		if ($db->num_rows($results) != 0) {
			return $cfg['image_save_url'].'/'.$db->result($results,0,'image');
		} else {
			return null;
		}
	}
        
        public static function copyDevices($devices, $temp_id) {
            global $cfg;
            $db = new database();
            
            if (is_array($devices) && count($devices) > 0) {
                $document = new document();
                foreach($devices as $d) {
                    $save_array = array('temp_id'               => $temp_id,
                                        'location'              => $d['location'],
                                        'device'                => $d['device'],
                                        'correctly_installed'   => $d['correctly_installed'],
                                        'requires_service'      => $d['requires_service'],
                                        'alarm'                 => $d['alarm'],
                                        'confirmed'             => $d['confirmed'],
                                        'zone_address'          => $d['zone_address'],
                                        'smoke_sensitivity'     => $d['smoke_sensitivity'],
                                        'remarks'               => $d['remarks']);
                    $document->saveData('document_data_9_device', $save_array);	
                }
            }
        }
}