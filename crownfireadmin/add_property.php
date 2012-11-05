<?php
$title = 'Properties';
include('templates/header.inc.php');

$users = new users();
$userInfo = $users->getUserInfo($_REQUEST['user_id']);
?>

<?=$display->userInfoWindow($userInfo)?>

<fieldset style="width: 500px;">
  <legend>Add Property</legend>
	<table cellpadding="8">
	 <tr valign="top" valign="middle">
	  <td><b>Address:</b></td>
	  <td>
	    <table>
	     <tr>
	      <td><input type="text" name="address1" value="" onKeyUp="document.getElementById('name').value=this.value;" id="address1" /></td>
	     </tr>
	     <tr>
	      <td><input type="text" name="address1" value="" /></td>
	     </tr>
	    </table>
	  </td>
	 </tr>
	 <tr valign="middle">
	  <td><b>Name:</td>
	  <td><input type="text" name="name" id="name" value="" /></td>
	 </tr>	 
	 <tr valign="top" valign="middle">
	  <td><b>City:</b></td>
	  <td><input type="text" name="city" value="" /></td>
	 </tr>
	 <tr valign="top" valign="middle">
	  <td><b>Province:</b></td>
	  <td><input type="text" name="province" value="" /></td>
	 </tr>
	 <tr valign="top" valign="middle">
	  <td><b>Country:</b></td>
	  <td><input type="text" name="country" value="" /></td>
	 </tr>
	 <tr>
	 <td>&nbsp; </td>
	  <td> <button class="save" type="submit" name="submit_n" value="Save Property">Save Property</button>&nbsp; &nbsp; &nbsp; <button class="cancel" type="button" onClick="location.href='aindex.php'";>Cancel</button></td>
	 </tr>
	</table>
</fieldset>

<?php
include('templates/footer.inc.php');
?>