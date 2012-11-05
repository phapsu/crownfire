<?php
//////////////////////////////////////////////////////////////
// Generate Config file for Crownfire
//
// @author Nathan Poole <npoole@gmail.com>
// Last Updated: 2010/12/01
//////////////////////////////////////////////////////////////
$cfg = array();
// Is the site up?  You can set to false while you do updates.
$cfg['site_up'] 	   = 	true;
// General Config Settings
// Turning this on simple lets me run the setup on my localhost.  
// Good for how I prefer to edit, and then upload.
// Unfortunately I don't even have a good SVN system yet.
$cfg['mode']			= 'dev'; // dev/live

// Name
$cfg['site_name'] 		= 'Crownfire';

// Who does mail come from?
$cfg['mail_from']		= array('from' => 'Crownfire', 'email' => 'info@crownfire.com');
// TODO
// Which messageBoards are MEMBERS ONLY.  This sucks.  This array 
// should be built from values in the database.
$cfg['admin_directory']		= 'crownfireadmin';

// Connections and linking.  ***Never a trailing slash***
if ($cfg['mode'] == 'live') {
	$cfg['site_url'] 			= 'http://crownfire.ca';
	$cfg['db_server']			= 'localhost';
	$cfg['db_username']			= 'crownfire';
	$cfg['db_password']			= 'uu9cyK9f';
	$cfg['db_name']				= 'crownfire';
	$cfg['log_directory']		= '/var2/vhosts/crownfire.ca/httpdocs/logs';
	$cfg['include_directory']	= '/var2/vhosts/crownfire.ca/httpdocs/'.$cfg['admin_directory'].'/includes';
	$cfg['image_save_directory']    = '/var2/vhosts/crownfire.ca/httpdocs/document_images';
	$cfg['image_save_url']		= $cfg['site_url'].'/document_images';
} else {
	$cfg['site_url'] 			= 'http://localhost/crownfire';
	$cfg['db_server']			= 'localhost';
	$cfg['db_username']			= 'root';
	$cfg['db_password']			= '';
	$cfg['db_name']				= 'crownfire';
	$cfg['log_directory']		= 'C:\\xampp\\htdocs\\crownfire\\logs';
	$cfg['include_directory']	= 'C:\\xampp\\htdocs\\crownfire\\'.$cfg['admin_directory'].'\\includes';
	$cfg['image_save_directory']    = 'C:\\xampp\\htdocs\\crownfire\\document_images';
	$cfg['image_save_url']		= $cfg['site_url'].'/document_images';
}

// Other settings
$cfg['site_options']			= array('show_user_window' => 1);
$cfg['date_format']				= 'F jS, Y H:i:s';

// Log SQL errors?  I think a good idea.  Hopefully there are none, however.
$cfg['log_sql_errors'] =	true;
error_reporting(0);
?>