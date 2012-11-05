<?php
$title = 'Profile';
include('templates/header.template.php');

if ($validate->is_error()) {
	$user_info = $validate->get_error_data();
} elseif (!empty($_SESSION['user_id'])) {
	$users = new users();
	$user_info = $users->getUserInfo($_SESSION['user_id']);
}
?>
<br />
<a href="index.php">&lt;&lt; Back to Properties</a> <br /> &nbsp; <br />


<fieldset style="width: 500px;">
  <legend>Manage User</legend>
	<table cellpadding="8">
	<form method="post" action="profile_do.php">
	 <tr valign="middle">
	  <td><?=$display->formElement('Name:','name',1);?></td>
	  <td><input type="text" name="name" id="name" value="<?=$user_info['name']?>" style="width: 250px;" /></td>
	 </tr>
	 <tr valign="middle">
	  <td><?=$display->formElement('Username:','username',1);?></td>
	  <td><?=$user_info['username']?></td>
	 </tr>
	 <tr valign="middle">
	  <td><?=$display->formElement('Password:','password',1);?></td>
	  <td><input type="text" name="password" id="password" value="<?=$user_info['password']?>" style="width: 250px;" /></td>
	 </tr>
	 <tr valign="middle">
	  <td><?=$display->formElement('Email:','email',1);?></td>
	  <td><input type="text" name="email" id="email" value="<?=$user_info['email']?>" style="width: 250px;" /></td>
	 </tr>
	 <tr>
	 <td>&nbsp; </td>
	  <td> <button class="save" type="submit" name="submit_n" value="Save Property">Save User</button>&nbsp; &nbsp; &nbsp; <button class="cancel" type="button" onClick="location.href='index.php'";>Cancel</button></td>
	 </tr>
	 <input type="hidden" name="user_id" value="<?=$_SESSION['user_id']?>" />
	 <input type="hidden" name="username" value="<?=$user_info['username']?>" />
	 </form>
	</table>
</fieldset>


<?php
include('templates/footer.template.php');
?>