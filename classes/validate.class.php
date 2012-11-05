<?php
class Validate {
	
	function is_error() {
		if (isset($_SESSION['post']['errors']) && is_array($_SESSION['post']['errors']) && count($_SESSION['post']['errors']) > 0) {
			return true;
		} else {
			return false;
		}
	}
	
	function get_error_data() {
		global $db;
		$form_values = array();
		
		// If they came back here with an error.
		if (is_array($_SESSION['post']['errors']) && count($_SESSION['post']['errors']) > 0) {
			foreach($_SESSION['post'] as $key=>$val) {
				$form_values[$key] = stripslashes($val);
			}
		}
		
		return $form_values;
	}
	
	function validateForm($required_fields,$banned_words_field='') {
		global $details;
		
		$banned_stuff = array();
		
		if (isset($_SESSION['post']) && !is_array($_SESSION['post'])) {
			$_SESSION['post'] = array();
		}
		if (isset($_SESSION['post']) && !is_array($_SESSION['post']['errors'])) {
			$_SESSION['post']['errors'] = array();
		}
		
		foreach ($required_fields as $field) {
			// The field is empty
			if ($_REQUEST[$field] == "") {
				// Add that field to the errors
				$_SESSION['post']['errors'][] = $field;
			} else {
				// The form has a value.
				// Clear the old error.
				// This sucks.
				//$key = array_search( $field, $_SESSION['post']['errors'] );
				//unset($_SESSION['post']['errors'][$key]);
				// Add it's value into session in case other errors come up.
				$_SESSION['post'][$field] = $_REQUEST[$field];
			}
		}
		// Check if we have any errors
		if (isset($_SESSION['post']['errors']) && count($_SESSION['post']['errors']) > 0) {
			foreach ($_REQUEST as $k=>$v) {
				if ($_SESSION['post'][$k] == "") {
					$_SESSION['post'][$k] = $v;
				}
			}
			return false;
		} else {
			if (is_array($banned_words_field)) {
				foreach ($banned_words_field as $check_field) {;
					foreach ($banned_stuff as $naughty) {
				        if (strstr($_POST[$check_field],$naughty)) {
	    		            $match++;
							$_SESSION['post']['chars'][] = $check_field;
						} else {
							$key = array_search( $field, $_SESSION['post']['errors'] );
							unset($_SESSION['post']['chars'][$key]);
						}
					}
	        	}
				if ($match == 0) {
					return true;
				} else {
					foreach ($_POST as $k=>$v) {
						if ($_SESSION['post'][$k] == "") {
							$_SESSION['post'][$k] = $v;
						}
					}
					return false;
				}
			} else {
				return true;
			}
		}
	}
	
	/**
Validate an email address.
Provide email address (raw input)
Returns true if the email address has the email 
address format and the domain exists.
*/
function validEmail($email)
{
   $isValid = true;
   $atIndex = strrpos($email, "@");
   if (is_bool($atIndex) && !$atIndex)
   {
      $isValid = false;
   }
   else
   {
      $domain = substr($email, $atIndex+1);
      $local = substr($email, 0, $atIndex);
      $localLen = strlen($local);
      $domainLen = strlen($domain);
      if ($localLen < 1 || $localLen > 64)
      {
         // local part length exceeded
         $isValid = false;
      }
      else if ($domainLen < 1 || $domainLen > 255)
      {
         // domain part length exceeded
         $isValid = false;
      }
      else if ($local[0] == '.' || $local[$localLen-1] == '.')
      {
         // local part starts or ends with '.'
         $isValid = false;
      }
      else if (preg_match('/\\.\\./', $local))
      {
         // local part has two consecutive dots
         $isValid = false;
      }
      else if (!preg_match('/^[A-Za-z0-9\\-\\.]+$/', $domain))
      {
         // character not valid in domain part
         $isValid = false;
      }
      else if (preg_match('/\\.\\./', $domain))
      {
         // domain part has two consecutive dots
         $isValid = false;
      }
      else if(!preg_match('/^(\\\\.|[A-Za-z0-9!#%&`_=\\/$\'*+?^{}|~.-])+$/',
                 str_replace("\\\\","",$local)))
      {
         // character not valid in local part unless 
         // local part is quoted
         if (!preg_match('/^"(\\\\"|[^"])+"$/',
             str_replace("\\\\","",$local)))
         {
            $isValid = false;
         }
      }
   }
   return $isValid;
}
	
	
}