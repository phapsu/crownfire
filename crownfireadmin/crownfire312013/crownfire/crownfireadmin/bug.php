<?php
$title = 'Bugs';
include('templates/header.inc.php');

$users = new users();
$userList = $users->getUsers();
?>
<h3>Bugs</h3>
<a href="javascript:history.go(-1);"><< Back</a>
<center>
<table width="80%">
	<form method="post" action="error.php">
		<input type="hidden" name="return2" value="<?=$_GET['page']?>" />
		<input type="hidden" name="vars2" value="<?=$_GET['vars']?>" />
	<tr valign="top">
		<td width="50%"><b>Add Bug</b><br /><br /><textarea name="error_desc" rows="10" cols="55" style="width: 600px;"></textarea></td>
		<td>
			<b>Current Bugs</b><br /><br />
		<?php
		$db = new database();
		$q = "SELECT * FROM errors WHERE page = '".$db->escape_string(urldecode($_REQUEST['page']))."'";	
		$r = $db->dbQuery($q);
		while($myrow = $db->row($r)) {
			$myrow['error'] = str_replace('<br />','',$myrow['error']);
			echo '->  '.$myrow['error'].'<br />';
		}
		?>
		</td>
	
	</tr>
	<tr>
	 <td colspan="2"><b>URL:</b> <?=urldecode($_GET['page'])?></td>
	</tr>
	<tr>
	 <td colspan="2"><b>Vars:</b> <?=urldecode($_GET['vars'])?></td>
	</tr>
	<tr>
		<td><input type="submit" name="Go" value="Go" /></td>
		<td>&nbsp; </td>
	</tr>
	</form>
</table>
</center>