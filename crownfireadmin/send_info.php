<?php
$title = 'Properties';
include('templates/header.inc.php');

$redirect = (isset($_GET['redirect'])) ? '?redirect='.$_GET['redirect'] : '';
if ($validate->is_error()) {
	$user_info = $validate->get_error_data();
} elseif ($_REQUEST['user_id']) {
	$users = new users();
	$user_info = $users->getUserInfo($_REQUEST['user_id']);
	
	$email_content = $display->getInclude('email');
}
?>
<?=$display->userInfoWindow($user_info)?>
<?php
$display->error_message();
?>

<fieldset style="width: 800px;">
  <legend>Send Email</legend>
	<table cellpadding="8">
        <form method="post" action="send_info_do.php<?php echo $redirect;?>">
	 <tr valign="top">
	  <td><b><?=$display->formElement('Email Contents:','name',1);?></b></td>
	  <td><textarea name="email" style="width: 700px; height: 300px;"><?=$email_content?></textarea></td>
	 </tr>
	 <tr>
	 <td>&nbsp; </td>
	  <td> <button class="sendemail" type="submit" name="submit_n" value="Send Email">Send Email</button>&nbsp; &nbsp; &nbsp; <button class="cancel" type="button" onClick="location.href='customers.php'";>Cancel</button></td>
	 </tr>
	 <input type="hidden" name="user_id" value="<?=$_REQUEST['user_id']?>" />
	 </form>
	</table>
</fieldset>



<?php
include('templates/footer.inc.php');
?>