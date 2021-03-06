<?php
$title = 'Properties';
include('templates/header.inc.php');

$users = new users();
$userList = $users->getUsers();
?>
<h1>Customers</h1>
<ul class="tools">
	<li><a href="edit_user.php" class="adduser">Add Customer</a></li>
</ul>

<table class="listTable highlight" cellspacing="0" cellpadding="0" border="0">
<tr class="tableRowHeader">
<th width="15%">ID</th>
<th width="20%">Customer Name</th>
<th width="20%">Customer Email</th>
<th width="20%">No. of Properties</th>
<th width="5%" >&nbsp; </th>
<th width="5%" >&nbsp; </th>
<th width="5%" >&nbsp; </th>
<th width="5%" >&nbsp; </th>
</tr>
<?php
if(is_array($userList)) {
	foreach($userList as $userArray) {
		?>
		<tr align="center">
		 <td><?=$userArray['id']?></td>
		 <td><?=stripslashes($userArray['name']);?></td>
		 <td><a href="mailto:<?=$userArray['email']?>"><?=$userArray['email']?></a></td>
		 <td><?=property::getPropertyCount($userArray['id'])?></td>
		 <td><a href="view_properties.php?user_id=<?=$userArray['id']?>"><img border="0" src="images/icons/building-icon.png" title="Properties" /></a></td>
		 <td><a href="edit_user.php?user_id=<?=$userArray['id']?>"><img border="0" src="images/icons/edit.png" title="Edit User" /></a></td>
		 <td><a href="delete_customer_do.php?user_id=<?=$userArray['id']?>" onclick="return confirm('Are you sure you want to delete this customer? \n\n ALL DATA WILL BE LOST');"><img border="0" src="images/icons/delete.png" title="Delete User" /></a></td>
		 <td><a href="send_info.php?user_id=<?=$userArray['id']?>"><img border="0" src="images/icons/email.png" title="Send Welcome Email" /></a></td>
		</tr>
	<?php
	}
}
?>
</table>
<?php
include('templates/footer.inc.php');
?>