<?php
$title = 'Properties';
include('templates/header.inc.php');
$property = new property($_REQUEST['id']);

if ($validate->is_error()) {
	$property_info = $validate->get_error_data();
} elseif ($_REQUEST['id']) {
	$property_info = array('name'			=> $property->getName(),
						   'user_id'		=> $property->getUserId(),
						   'address1' 		=> $property->getAddress1(),
						   'address2' 		=> $property->getAddress2(),
						   'city' 	  		=> $property->getCity(),
						   'province' 		=> $property->getProvince(),
						   'country'  		=> $property->getCountry(),
						   'postal_code'	=> $property->getPostal(),
						   'id'		  		=> $property->getPropertyId());
}

$users = new users();
$userInfo = $users->getUserInfo($_REQUEST['user_id']);
?>

<a href="view_properties.php?user_id=<?=$property->getUserId();?>"><< Back to Properties</a> <br /> &nbsp; <br />

<?=$display->userInfoWindow($userInfo)?>

<fieldset style="width: 500px;">
  <legend>Add Property</legend>
	<table cellpadding="8">
	<form method="post" action="edit_property_do.php">
	 <tr valign="top" valign="middle">
	  <td><b><?=$display->formElement('Address:','address1',1);?></b></td>
	  <td>
	    <table>
	     <tr>
	      <td><input type="text" name="address1" value="<?=$property_info['address1']?>" onKeyUp="document.getElementById('name').value=this.value;" id="address1" /></td>
	     </tr>
	     <tr>
	      <td><input type="text" name="address2" value="<?=$property_info['address2']?>" /></td>
	     </tr>
	    </table>
	  </td>
	 </tr>
	 <tr valign="middle">
	  <td><b><?=$display->formElement('Name:','name',1);?></b></td>
	  <td><input type="text" name="name" id="name" value="<?=$property_info['name']?>" /></td>
	 </tr>
	 <tr valign="top" valign="middle">
	  <td><b><?=$display->formElement('City:','city',1);?></b></td>
	  <td><input type="text" name="city" value="<?=$property_info['city']?>" /></td>
	 </tr>
	 <tr valign="top" valign="middle">
	  <td><b><?=$display->formElement('Province:','province',1);?></b></td>
	  <td><input type="text" name="province" value="<?=$property_info['province']?>" /></td>
	 </tr>
	 <tr valign="top" valign="middle">
	  <td><b><?=$display->formElement('Country:','country',1);?></b></td>
	  <td><input type="text" name="country" value="<?=$property_info['country']?>" /></td>
	 </tr>
	 <tr valign="top" valign="middle">
	  <td><b><?=$display->formElement('Postal Code:','postal_code',1);?></b></td>
	  <td><input type="text" name="postal_code" value="<?=$property_info['postal_code']?>" /></td>
	 </tr>
	 <tr>
	 <td>&nbsp; </td>
	  <td> <button class="save" type="submit" name="submit_n" value="Save Property">Save Property</button>&nbsp; &nbsp; &nbsp; <button class="cancel" type="button" onClick="location.href='view_properties.php?user_id=<?=$property_info['user_id']?>'";>Cancel</button></td>
	 </tr>
	 <input type="hidden" name="id" value="<?=$property_info['id']?>" />
	 <input type="hidden" name="user_id" value="<?=$_REQUEST['user_id']?>" />
	 </form>
	</table>
</fieldset>

<?php
include('templates/footer.inc.php');
?>