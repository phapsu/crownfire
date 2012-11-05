<?php
class crownfire {

	public function __construct() {
		global $cfg;
		$this->db = new database();
		$this->db->connect($cfg);
	}
	
	public function metaDescription($page=null) {
		if (!$page) {
			$page = basename($_SERVER['PHP_SELF']);
		}
		
		$q = "SELECT description FROM descriptions WHERE page = '".$this->db->escape_string($page)."'";
		$results = $this->db->dbQuery($q);
		
		if ($this->db->num_rows($results) > 0) {
			$description = $this->db->result($results,0,'description');
			
			return $description;
		}
		$meta = array();
		$meta['default']['description'] = "Crownfire offers fire protection service to the greater Toronto area as well as Brantford, London and Hamilton.  Pass your next fire protection inspection ease!";
		return $meta['default']['description'];
	}
	
	public function metaKeywords($page=null) {
		if (!$page) {
			$page = basename($_SERVER['PHP_SELF']);
		}
		$q = "SELECT keywords FROM keywords WHERE page = '".$this->db->escape_string($page)."'";
		$results = $this->db->dbQuery($q);
		
		if ($this->db->num_rows($results) > 0) {
			$keywords = $this->db->result($results,0,'keywords');
			return $keywords;
		}
		$meta = array();	
		$meta['default']['keywords'] = array('fire','extinguishers','protection','safety','crownfire','crown','fire','inspections','alarms','lights','toronto');
		return implode(',',$meta['default']['keywords']);
	}
	
	public function getPages() {
		$query = "SELECT page FROM pages ORDER BY page ASC";
		$results = $this->db->dbQuery($query);
		
		$return = array();
		while($myrow = $this->db->row($results)) {
			$return[] = $myrow['page'];
		}
		
		return $return;
	}
	
	public function getPageContent() {
		$file = '../pageincludes/'.$_SESSION['page'];
		if (!file_exists($file)) {
			$fp = fopen($file, 'w') or die("can't open file");
			fclose($fp);
		} else {
			return file_get_contents($file);
		}
	}
	
	public function saveMeta($page, $description, $keywords) {
		// description
		$q = "SELECT page_id FROM descriptions WHERE page = '".$this->db->escape_string($page)."' LIMIT 1";
		$r = $this->db->dbQuery($q);
		
		if($this->db->num_rows($r) > 0) {
			$query = 'UPDATE ';
			$end = ' WHERE page_id = '.$this->db->result($r,0,'page_id');
		} else {
			$query = 'INSERT INTO ';
		}
		
		$query = $query. ' descriptions';
		$query .= " SET 
					page 		= '".$this->db->escape_string($page)."',
					description = '".$this->db->escape_string($description)."' ";
		$query .= $end;
		
		$this->db->dbQuery($query);
		
		$end = '';
		// keywords
		$q = "SELECT page_id FROM keywords WHERE page = '".$this->db->escape_string($page)."' LIMIT 1";
		$r = $this->db->dbQuery($q);
		
		if($this->db->num_rows($r) > 0) {
			$query = 'UPDATE ';
			$end = ' WHERE page_id = '.$this->db->result($r,0,'page_id');
		} else {
			$query = 'INSERT INTO ';
		}
		
		$query = $query. ' keywords';
		$query .= " SET 
					page 		= '".$this->db->escape_string($page)."',
					keywords = '".$this->db->escape_string($keywords)."' ";
		$query .= $end;
		$this->db->dbQuery($query);
		
	}
}