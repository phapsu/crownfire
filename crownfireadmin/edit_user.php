<?php
$title = 'Properties';
include('templates/header.inc.php');

if ($validate->is_error()) {
	$user_info = $validate->get_error_data();
} elseif (!empty($_REQUEST['user_id'])) {
	$users = new users();
	$user_info = $users->getUserInfo($_REQUEST['user_id']);
}
?>

<?php
$display->error_message();
?>

<fieldset style="width: 600px;">
  <legend>Manage User</legend>
	<table cellpadding="8">
	<form method="post" action="edit_user_do.php?<?php if(isset($_GET['redirect'])) : echo 'redirect='.$_GET['redirect']; else: echo ''; endif;?>">
	 <tr valign="middle">
	  <td><?=$display->formElement('Name:','name',1);?></td>
	  <td><input type="text" name="name" id="name" value="<?php if(isset($user_info['name'])) echo stripslashes($user_info['name'])?>" /></td>
	 </tr>
	 <tr valign="middle">
	  <td><?=$display->formElement('Username:','username',1);?></td>
	  <td><input type="text" name="username" id="username" value="<?php if(isset($user_info['username'])) echo stripslashes($user_info['username'])?>" /></td>
	 </tr>
	 <tr valign="middle">
	  <td><?=$display->formElement('Password:','password',1);?></td>
	  <td><input type="text" name="password" id="password" value="<?php if(isset($user_info['password'])) echo $user_info['password']?>" /><button type="button" id="genPass">Generate</button></td>
	 </tr>
	 <tr valign="middle">
	  <td><?=$display->formElement('Email:','email',1);?></td>
	  <td><input type="text" name="email" id="email" value="<?php if(isset($user_info['email'])) echo $user_info['email']?>" /></td>
	 </tr>
	 <tr valign="middle">
	  <td><?=logger::logLink('Send Welcome Email:', 'user', 'notification', @$user_info['id']);?></td>
	  <td align="left"><input type="checkbox" name="fl_send" id="fl_send" value="1" style="width: 1px;" /></td>
	 </tr>
	 <tr>
	 <td>&nbsp; </td>
	  <td> <button class="save" type="submit" name="submit_n" value="Save Property">Save User</button>&nbsp; &nbsp; &nbsp; <button class="cancel" type="button" onClick="location.href='<?php if(isset($_GET['redirect'])) : echo $_GET['redirect']; else: echo 'customers.php'; endif;?>'">Cancel</button></td>
	 </tr>
	 <input type="hidden" name="user_id" value="<?php if(isset($_REQUEST['user_id'])) echo $_REQUEST['user_id']?>" />
	 </form>
	</table>
</fieldset>

<script>

$(function(){
    function wpiGenerateRandomNumber(length) {

        var i = 0;
        var numkey = "";
        var randomNumber;

        while( i < length) {

            randomNumber = (Math.floor((Math.random() * 100)) % 94) + 33;

            if ((randomNumber >=33) && (randomNumber <=47)) { continue; }
            if ((randomNumber >=58) && (randomNumber <=90)) { continue; }
            if ((randomNumber >=91) && (randomNumber <=122)) { continue; }
            if ((randomNumber >=123) && (randomNumber <=126)) { continue; }

            i++;
            numkey += String.fromCharCode(randomNumber);

        }

        return numkey;

    }
   $('#genPass').click(function(){
       $('#password').val(wpiGenerateRandomNumber(7));
   });
});
</script>

<?php
include('templates/footer.inc.php');
?>