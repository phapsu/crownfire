<?php
//session_start();
class logger extends crownfire {
	
	public function log($section, $type, $id, $user_id) {
		$db = new database();
		
		$query = "INSERT INTO
					history
				  SET
				  	section			= '".$db->escape_string($section)."',
				  	primary_id		= '".$db->escape_string($id)."',
				  	type			= '".$db->escape_string($type)."',
				  	user_id			= '".$db->escape_string($user_id)."',
				  	date_added		= UNIX_TIMESTAMP()";
		$db->dbQuery($query);
	}
	
	public static function getLog($section, $type=0, $id=0) {
		$db = new database();
		
		$query = "SELECT 
					h.section, 
					h.type, 
					h.date_added, 
					u.name 
				  FROM 
				  	history h, 
				  	users u 
				  WHERE 
				  	h.section = '".$db->escape_string($section)."'";
		if ($id != 0) {
		  	$query .= " AND h.primary_id = '".$db->escape_string($id)."'";
		}
		if ($type != 0) { 
			$query .= "AND h.type = '".$db->escape_string($type)."'";
		} 
		$query .= " AND u.id = h.user_id";
		$results = $db->dbQuery($query);
		
		$return = array();
		if ($db->num_rows($results)) {
			while($myrow = $db->row($results)) {
				$return[] = $myrow;
			}
		}
		return $return;
	}
	
	public static function getLogCount($section, $type, $id) {
		$db = new database();
		
		$query = "SELECT count(*) as my_c FROM history WHERE section = '".$db->escape_string($section)."' AND primary_id = '".$db->escape_string($id)."' AND type = '".$db->escape_string($type)."'";
		$results = $db->dbQuery($query);
		return $db->result($results,0,'my_c');
	}
	
	public static function logLink($text, $section, $type, $id=null) {
		if (is_null($id)) {
			$count = 0;
		} else {
			$count = self::getLogCount($section, $type, $id);
		}
		return '<a href="javascript:void(0);" onClick="openLogWindow(\''.$section.'\',\''.$type.'\',\''.$id.'\');">'.$text.' ('.$count.')</a>';
	}
	
	public static function getItemLink($section, $id) {
		$db = new database();
		switch($section) {
			case 'document':
				$query = "SELECT
							dt.type,
							p.name,
							d.user_id,
							d.type_id,
							d.property_id
						  FROM
						  	documents d,
						  	document_types dt,
						  	properties p
						  WHERE 
						  	d.id = ".$db->escape_string($id).'
						  AND
						  	dt.id = d.type_id
						  AND
						  	p.id = d.property_id';
				$results = $db->dbQuery($query);
				
				if ($db->num_rows($results) != 0) {
					$user_id 	= $db->result($results,0,'user_id');
					$type_id 	= $db->result($results,0,'type_id');
					$property_id= $db->result($results,0,'property_id');
					$type 		= $db->result($results,0,'type');
					$name 		= $db->result($results,0,'name');
					
					
					return '<a href="/edit_document.php?id='.$id.'&user_id='.$user_id.'&type_id='.$type_id.'&property_id='.$property_id.'">'.$type.' - '.$name.'</a>';
				} else {
					return 'Unknown';
				}
			break;
		}
	}
}