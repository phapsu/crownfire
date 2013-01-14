<?php
$title = 'Properties';
include('templates/header.inc.php');

$users = new users();
$userList = $users->getUsers('admin');
?>
<h1>Customers</h1>
<ul class="tools">
	<li><a href="add_account.php?redirect=users.php" class="adduser">Add User</a></li>
</ul>

<table class="listTable highlight" cellspacing="0" cellpadding="0" border="0">
<tr class="tableRowHeader">
<th width="15%">ID</th>    
<th width="20%">Username</th>
<th width="20%">Name</th>
<th width="20%">Email</th>
<th width="20%">Closed when</th>
<th width="5%" >&nbsp; </th>
<th width="5%" >&nbsp; </th>
<th width="5%" >&nbsp; </th>
<th width="5%" >&nbsp; </th>
</tr>
<?php
if(is_array($userList)) {
	foreach($userList as $userArray) {
            if(isset($_SESSION['user_type']) && $_SESSION['user_type'] > 1 && $userArray['type'] == 1){
                continue;
            }
		?>
		<tr align="center">
		 <td><?=$userArray['id']?></td>
                 <td><?=stripslashes($userArray['username']);?></td>
		 <td><?=stripslashes($userArray['name']);?></td>
		 <td><a href="mailto:<?=$userArray['email']?>"><?=$userArray['email']?></a></td>
                 <td><?php if($userArray['login_until']) echo stripslashes(date("M d, Y H:i", strtotime($userArray['login_until'])));?></td>
		 <td><a href="view_properties.php?user_id=<?=$userArray['id']?>"><img border="0" src="images/icons/building-icon.png" title="Properties" /></a></td>
		 <td><a href="add_account.php?user_id=<?=$userArray['id']?>&redirect=users.php"><img border="0" src="images/icons/edit.png" title="Edit User" /></a></td>
		 <td><?php if($userArray['type'] > 1) : ?><a href="delete_customer_do.php?user_id=<?=$userArray['id']?>&redirect=users.php" onclick="return confirm('Are you sure you want to delete this customer? \n\n ALL DATA WILL BE LOST');"><img border="0" src="images/icons/delete.png" title="Delete User" /></a><?php endif;?></td>
		 <td><a href="send_info.php?user_id=<?=$userArray['id']?>&redirect=users.php"><img border="0" src="images/icons/email.png" title="Send Welcome Email" /></a></td>
		</tr>
	<?php
	}
}
?>
</table>
<?php
include('templates/footer.inc.php');
?>