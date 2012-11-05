<?php
class database {
	public static function connect($cfg) {
		$link = mysql_connect($cfg['db_server'], $cfg['db_username'], $cfg['db_password']);
		if (!$link) {
		   die('Could not connect: ' . mysql_error());
		} else {
			mysql_select_db($cfg['db_name'],$link);
		}
	}
	
	function dbQuery($query,$link="") {
		global $cfg;
		$result = mysql_query($query);
		if (mysql_error()) {
			echo mysql_error();
			// Do we log?
			if ($cfg['log_sql_errors']) {
				if (is_dir($cfg['log_directory'])) {
					$fp = fopen($cfg['log_directory'].'/sql_errors_'.strtolower(date('F')).'_'.strtolower(date('Y')).'.txt','a+');
					$error = mysql_error();
					$query = str_replace("\n","",$query);
					$query = str_replace("\r","",$query);
					$page = $_SERVER['PHP_SELF'];
					$user = $_SESSION['UserID'];
					$refer = $_SERVER['HTTP_REFERER'];
					$line = "$user|$page|$query|$error|$refer\n";
					fwrite($fp,$line);
					fclose($fp);
				}
			}
		}
		
		return $result;
	}
	
	function result($result,$row,$name) {
		//echo "Error finding $name";
		return mysql_result($result,$row,$name);
		
	}
	function row($result_set) {
		$myrow = mysql_fetch_array($result_set);
		return $myrow;
	}
	public function escape_string($string) {
		if(!empty($string)) {
			return mysql_real_escape_string($string);
		} else {
			return $string;
		}
	}
	
	function num_rows($result_set) {
		$rows = @mysql_num_rows($result_set);
		return $rows;
	}
	
	function get_assoc($result) {
		return mysql_fetch_assoc($result);
	}
	
	function sql_insert_id($res) {
		return mysql_insert_id();
	}
}
