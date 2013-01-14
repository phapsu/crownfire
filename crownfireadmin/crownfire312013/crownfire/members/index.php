<?php
$title = 'Properties';
include('templates/header.template.php');

$user = new users();
$user_data = $user->getUserInfo($_SESSION['user_id']);

// And get their properties
$property = new property();
$property_list = $property->getListByUserId($_SESSION['user_id']);

// Check if we came with a success message
if (!empty($_GET['c']) && !empty($_REQUEST['a'])) {
	?>
	<div class="successMessage">
            Success.  Your <?=$_GET['c']?> has been <?=$_GET['a']?>.
	</div>
	<?php	
}
?>
<h1>Your Properties</h1>

<table class="listTable highlight" cellspacing="0" cellpadding="0" border="0">
<tr class="tableRowHeader">
<th width="5%">ID</th>
<th width="20%">Address</th>
<th width="30%">&nbsp; </th>
</tr>
<?php
if (is_array($property_list)) {
	foreach($property_list as $property_obj) {
		?>
		<tr align="center" bgcolor="#fff" style="background: #fff; font-size: 15px;">
		 <td><?=$property_obj->getPropertyId();?></td>
		 <td><?=stripslashes($property_obj->getAddress1());?>, <?=stripslashes($property_obj->getAddress2());?><br /><?=stripslashes($property_obj->getCity());?>, <?=stripslashes($property_obj->getProvince());?><br /><?=stripslashes($property_obj->getCountry());?></td>
		 <td><a href="documents.php?property_id=<?=$property_obj->getPropertyId()?>"><b>View Inspection Reports</b></a></td>
		</tr>
<?php
	}
}
?>
</table>
<?php
include('templates/footer.template.php');
?>