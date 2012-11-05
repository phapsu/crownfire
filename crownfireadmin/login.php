<?php
include("templates/header.inc.php");
?>
<h1>Login</h1>
<?php
if ($validate->is_error()) {
	$display->error_message();
}
?>
<fieldset style="width: 350px;">
  <legend>Please Login</legend>
	<table>
	<form method="post" action="login_do.php">
	 <tr>
	  <td><?=$display->formElement('Email:','email',1);?></td><td><input type="text" name="email" size="25" style="width: 200px;" /></td>
	 </tr>
	 <tr>
	  <td><?=$display->formElement('Password:','password',1);?></td><td><input type="password" name="password" size="25"  style="width: 200px;" /></td>
	 </tr>
	 <tr>
	  <td>&nbsp; </td>
	  <td><button type="submit" class="save" name="submit_n">Login</button></td>
	 </tr>
	</table>
	</form>
</fieldset>
