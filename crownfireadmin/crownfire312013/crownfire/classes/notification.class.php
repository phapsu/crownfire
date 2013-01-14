<?php
//session_start();
require_once('phpmailer/class.phpmailer.php');
class notification extends crownfire {
	
	public static function sendDocumentNotification($user_id, $document_id) {
		global $cfg; // oops
		$db = new database();
		
		$mail             	= new PHPMailer(); // defaults to using php "mail()"
		$userObj 			= new users();
		$documentObj 		= new document($document_id);
		$property_obj 		= new property($documentObj->property_id);
		
		$userInfo = $userObj->getUserInfo($user_id);
		
		$propertyAddress = $property_obj->getAddress1().', '.$property_obj->getAddress2().'<br />'.$property_obj->getCity().', '.$property_obj->getProvince().'<br />'.$property_obj->getCountry();
		
		$body             = file_get_contents($cfg['include_directory'].'/documentNotification.inc');
		$body             = eregi_replace("[\]",'',$body);
		
		// Our replacements
		$body = str_replace('{{first_name}}',$userInfo['name'], $body);
		$body = str_replace('{{username}}',$userInfo['username'], $body);
		$body = str_replace('{{password}}',$userInfo['password'], $body);
		$body = str_replace('{{property_address}}',$propertyAddress, $body);
		$body = str_replace('{{document_id}}',$document_id, $body);
		$body = str_replace('{{document_type}}',document::getDocumentTypeById($documentObj->getTypeId()), $body);
		
		$mail->AddReplyTo($cfg['mail_from']['email'], $cfg['mail_from']['from']);
		$mail->SetFrom($cfg['mail_from']['email'], $cfg['mail_from']['from']);
		
		$address = $userInfo['email'];
		$mail->AddAddress($address, $userInfo['name']);
		
		$mail->Subject    = "A new report has been added to your account";
		
		$mail->AltBody    = "To view the message, please use an HTML compatible email viewer!"; // optional, comment out and test

		$mail->MsgHTML($body);
		if ($cfg['mode'] == 'live') {
			$mail->Send();
		}
		logger::log('document','notification',$document_id, $_SESSION['user_id']);
	}
	
	public static function sendWelcomeEmail($userInfo) {
		global $cfg; // oops
		
		$mail             = new PHPMailer(); // defaults to using php "mail()"
		
		$body             = file_get_contents($cfg['include_directory'].'/registrationEmail.inc');
		$body             = eregi_replace("[\]",'',$body);
		
		// Our replacements
		$body = str_replace('{{first_name}}',$userInfo['name'],$body);
		$body = str_replace('{{username}}',$userInfo['username'],$body);
		$body = str_replace('{{password}}',$userInfo['password'],$body);
		
		$mail->AddReplyTo($cfg['mail_from']['email'], $cfg['mail_from']['from']);
		$mail->SetFrom($cfg['mail_from']['email'], $cfg['mail_from']['from']);
		
		$address = $userInfo['email'];
		$mail->AddAddress($address, $userInfo['name']);
		
		$mail->Subject    = "Your Crownfire Account is Active";
		
		$mail->AltBody    = "To view the message, please use an HTML compatible email viewer!"; // optional, comment out and test
		
		$mail->MsgHTML($body);
		if ($cfg['mode'] == 'live') {
			$mail->Send();
		}
		// Log ($section, $type, $id, $description) {
		logger::log('user', 'notification', $userInfo['id'], $userInfo['id']);
	}
}