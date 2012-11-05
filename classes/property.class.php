<?php
class property extends crownfire {
	private static $instance;
	
	public function __construct($property_id=null) {
		parent::__construct();
		
		if ($property_id) {
			$this->property_id = $property_id;
			$this->load();
		}
	}

	// Fetch our data
	public function load() {
		$query = "SELECT * FROM properties WHERE id = '".$this->property_id."'";
		$results = $this->db->dbQuery($query);
		
		if ($this->db->num_rows($results) == 0) {
			Error::displayError("Invalid propertyID.  Sorry");
		} else {
			$info = $this->db->get_assoc($results);
			if ($this->securityCheckIsValid()) {
				$this->setPropertyId($info['id']);
				$this->setUserId($info['user_id']);
				$this->setName($info['name']);
				$this->setAddress1($info['address1']);
				$this->setAddress2($info['address2']);
				$this->setCity($info['city']);
				$this->setProvince($info['province']);
				$this->setPostal($info['postal_code']);
				$this->setCountry($info['country']);
			}
		}
	}
	
	public function getListByUserId($user_id) {
		$query = "SELECT id FROM properties WHERE user_id = '".$this->db->escape_string($user_id)."'";
		$results = $this->db->dbQuery($query);
		
		$return = array();
		while ($myrow = $this->db->row($results)) {
			$return[] = new self($myrow['id']);	
		}
		return $return;
	}
	
	// Setters
	public function setPropertyId($id) { 
		$this->id = $id;
	}
	
	public function setName($name) {
		$this->name = $name;
	}
	
	public function setAddress1($address1) {
		$this->address1 = $address1;
	}
	
	public function setAddress2($address2) {
		$this->address2 = $address2;
	}
	
	public function setCity($city) {
		$this->city = $city;
	}
	
	public function setPostal($postal) {
		$this->postal = $postal;
	}
	
	public function setProvince($province) {
		$this->province = $province;
	}
	
	public function setCountry($country) {
		$this->country = $country;
	}

	public function setUserId($user_id) {
		$this->user_id = $user_id;	
	}
	
	// getters
	public function getPropertyId() {
		return $this->id;
	}
	
	public function getName() {
		return $this->name;
	}

	public function getUserId() {
		return $this->user_id;	
	}	
	
	public function getAddress1() {
		return $this->address1;
	}
	
	public function getAddress2() {
		return $this->address2;
	}
	
	public function getCity() {
		return $this->city;
	}
	public function getProvince() {
		return $this->province;
	}
	
	public function getPostal() {
		return $this->postal;
	}
	
	public function getCountry() {
		return $this->country;
	}
	
	// saver
	
	public function save() {
		if ($this->id) {
			$query = 'UPDATE ';
		} else {
			$query = 'INSERT INTO ';	
		}
		
		$query .= " properties
				    SET
					  	name		= '".$this->db->escape_string($this->name)."',
					  	address1	= '".$this->db->escape_string($this->address1)."',
					  	address2	= '".$this->db->escape_string($this->address2)."',
					  	city		= '".$this->db->escape_string($this->city)."',
					  	postal_code	= '".$this->db->escape_string($this->postal)."',
					  	province	= '".$this->db->escape_string($this->province)."',
					  	country		= '".$this->db->escape_string($this->country)."'";
		if ($this->user_id) {
			$query .= ", user_id = '".$this->db->escape_string($this->user_id)."'";
		}
		
		if ($this->id) {
			$query .= " WHERE id = '".$this->db->escape_string($this->id)."'";	
		}
		$results = $this->db->dbQuery($query);
		
		$id = $this->db->sql_insert_id($results);
		
		return $id;
	}
	
	public function delete() {
		$query = "DELETE FROM properties WHERE id = '".$this->db->escape_string($this->id)."'";
		$results = $this->db->dbQuery($query);
	}
	
	public function securityCheckIsValid() {
		return true;
	}
	
	public static function getPropertyAddress($property_id) {
		$db = new database();
		$property_obj = new self($property_id);
		
		$address = $property_obj->getAddress1().', '.$property_obj->getAddress2().'<br />'.$property_obj->getCity().', '.$property_obj->getProvince().'<br />'.$property_obj->getCountry();
		
		return $address;
	}
	
	
	/////////////////////// Static Functions //////////////////////////
	public static function getPropertyCount($user_id) {
		$db = new database();
		$query = "SELECT count(*) as my_c FROM properties WHERE user_id = '".$db->escape_string($user_id)."'";
		$results = $db->dbQuery($query);
		
		return $db->result($results,0,'my_c');
	}
}