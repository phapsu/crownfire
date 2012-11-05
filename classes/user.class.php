<?php

class users extends crownfire {

    public function getName($user_id) {
        $query = "SELECT username FROM users WHERE id = " . $this->db->escape_string($user_id);
        $results = $this->db->dbQuery($query);

        if ($this->db->num_rows($results) != 0) {
            return $this->db->result($results, 0, 'username');
        }
    }

    public function getUsers($userType = 'members') {

        switch ($userType) {
            case 'admin':
                $type = 'type = 1';
                break;

            case 'members':
            default:
                $type = 'type = 2';
                break;

            case 'techs':
            default:
                $type = 'type = 3';
                break;
        }

        $fl_admin = 0;
        if ($userType == 'admin') {
            $fl_admin = 1;
            $type = '(type = 1 OR type = 2)';
        }

        $query = "SELECT * FROM users WHERE $type AND fl_deleted = 0 AND fl_admin = $fl_admin ORDER BY ID DESC";
        $results = $this->db->dbQuery($query);

        $return = array();
        while ($myrow = $this->db->row($results)) {
            $return[] = $myrow;
        }

        return $return;
    }

    public static function getSessionId() {
        return $_SESSION['user_id'];
    }

    public function getProfile($user_id) {

        //$userInfo = self::getUserInfo($user_id);
    }

    public function setType($type) {
        $this->type = $type;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setUsername($username) {
        $this->username = $username;
    }

    public function setPassword($password) {
        $this->password = $password;
    }

    public function setLoginUntil($login_until) {
        $this->login_until = $login_until;
    }

    public function setInfo($array) {
        $this->setEmail($array['email']);
        $this->setUsername($array['username']);
        $this->setPassword($array['password']);
    }

    public function save($id = null, $admin=false) {

        if (!$id) {
            $query = "INSERT INTO
							users
					  SET
					  		name 			= '" . $this->db->escape_string($this->name) . "',
							email 			= '" . $this->db->escape_string($this->email) . "',
							username 		= '" . $this->db->escape_string($this->username) . "',
							password 		= '" . $this->db->escape_string($this->password) . "',
							login_until 		= '" . $this->db->escape_string($this->login_until) . "',
							type			= '" . $this->db->escape_string($this->type) . "'";
            if($admin){
                $query .= ", fl_admin 		= '1'";
            }
            $result = $this->db->dbQuery($query);
            return $this->db->sql_insert_id($result);
        } else {
            $query = "UPDATE
							users
					  SET
					  		name 			= '" . $this->db->escape_string($this->name) . "',
					  		login_until 		= '" . $this->db->escape_string($this->login_until) . "',
							email 			= '" . $this->db->escape_string($this->email) . "',";
            if (!empty($this->username)) {
                $query .= " username 		= '" . $this->db->escape_string($this->username) . "',";
            }
            $query .= " password 		= '" . $this->db->escape_string($this->password) . "'
					  WHERE
					  		id 				= '" . $this->db->escape_string($id) . "'";
            $result = $this->db->dbQuery($query);
            return $id;
        }
        return true;
    }

    public function deleteUser($user_id) {

        $query = "UPDATE users SET fl_deleted = 1 WHERE id = '" . $this->db->escape_string($user_id) . "'";
        $results = $this->db->dbQuery($query);

        return null;
    }

    public function login($email, $password, $type = 1, $admin = false) {
        $query = "SELECT id, type, login_until FROM users WHERE ";
        if (strpos($email, '@') !== FALSE) {
            $query .= " email = '" . $this->db->escape_string($email) . "' ";
        } else {
            $query .= " username = '" . $this->db->escape_string($email) . "' ";
        }
        if ($admin) {
            $type = "(type = '1' OR type = '2')";
        } else {
            $type = "(type = '" . $this->db->escape_string($type) . "')";
        }
        $query .= " AND password = '" . $this->db->escape_string($password) . "' AND $type AND fl_deleted = 0";
        $query .= " AND (login_until > '" . date('Y-m-d H:i') . "' OR login_until IS NULL)";

        if ($admin) {
            $query .= " AND fl_admin = 1";
        }

        $results = $this->db->dbQuery($query);
        if ($this->db->num_rows($results) != 0) {

            if ($admin) {
                $_SESSION['admin_id'] = $this->db->result($results, 0, 'id');
                $_SESSION['user_id'] = $this->db->result($results, 0, 'id');
            } else {
                $_SESSION['user_id'] = $this->db->result($results, 0, 'id');
            }

            $_SESSION['user_type'] = $this->db->result($results, 0, 'type');
            $_SESSION['login_until'] = $this->db->result($results, 0, 'login_until');

            return true;
        } else {
            return false;
        }
    }

    public function getUserInfo($user_id) {
        $query = "SELECT * FROM users WHERE id = " . $this->db->escape_string($user_id);
        $results = $this->db->dbQuery($query);

        if ($this->db->num_rows($results) != 0) {
            return $this->db->get_assoc($results);
        } else {
            return false;
        }
    }

    public function getUsername() {
        if ($_SESSION['user_id']) {
            $query = "SELECT username FROM users WHERE id = " . $this->db->escape_string($_SESSION['user_id']);
            $results = $this->db->dbQuery($query);

            if ($this->db->num_rows($results) != 0) {
                return $this->db->result($results, 0, 'username');
            }
        } else {
            return false;
        }
    }

    public function unique_id($argLength = 8) {
        mt_srand($this->make_seed());
        $id = uniqid(md5(mt_rand(1, 500)));
        mt_srand($this->make_seed());
        $return = substr($id, mt_rand(0, strlen($id)), $argLength);
        if ($stringlength = strlen($return) < $argLength) {
            $difference = $argLength - $stringlength;
            mt_srand($this->make_seed());
            $string = "a1A2b3B4c5c6d7D8e9EfFgGhHiIjJkKlLmMnNoOpPqQrRsStTuUvVwWxXyYzZ";
            for ($i = 0; $i < $difference; $i++) {
                $random .= $string{mt_rand(0, strlen($string) - 1)};
            }
            // Append the string to our ID.
            $return .= $random;
            if (strlen($return) > $argLength) {
                $return = substr($return, 0, $argLength);
            }
        }
        return $return;
    }

    public function make_seed() {
        list($usec, $sec) = explode(' ', microtime());
        return (float) $sec + ((float) $usec * 100000);
    }

    public function getSiteOption($user_id, $key) {
        global $cfg;

        $query = "SELECT 
					option_value 
				  FROM 
				  	site_options
				  WHERE
				  	user_id = '" . $this->db->escape_string($user_id) . "'
				  AND
				  	option_key = '" . $this->db->escape_string($key) . "'";
        $results = $this->db->dbQuery($query);

        if ($this->db->num_rows($results) == 0) {
            // We need to add the option for them with the default value
            $default_value = $cfg['site_options'][$key];

            if (!empty($default_value)) {
                $this->setOption($user_id, $key, $default_value);
                return $default_value;
            }
        } else {
            return $this->db->result($results, 0, 'option_value');
        }
    }

    public function setOption($user_id, $key, $value) {
        $query = "DELETE FROM site_options WHERE user_id = '" . $this->db->escape_string($user_id) . "' AND option_key = '" . $this->db->escape_string($key) . "'";
        $this->db->dbQuery($query);

        $query = "INSERT INTO
						site_options
					  SET
					  	user_id			= '" . $this->db->escape_string($user_id) . "',
				  		option_key 		= '" . $this->db->escape_string($key) . "',
				  		option_value	= '" . $this->db->escape_string($value) . "'";
        $this->db->dbQuery($query);
        return true;
    }

    public function isAdmin($user_id) {
        $query = "SELECT count(*) as my_c FROM users WHERE id = '" . $this->db->escape_string($user_id) . "' AND fl_admin = 1";
        $results = $this->db->dbQuery($query);

        $count = $this->db->result($results, 0, 'my_c');

        if ($count == 0) {
            return false;
        } else {
            return true;
        }
    }

}