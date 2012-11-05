<?php
include('templates/header.inc.php');
$pageList = $crownfire->getPages();
?>
<table width="80%">
 
 <tr bgcolor="#EEEEEE" style="font-weight: bold; font-size: 30px;">
  <td>Edit Keywords/Descriptions</td>
 </tr>
 <tr valign="top">
  <td>
   <b>Select a file to edit</b>
	<br />
	<form method="post" action="choosefile_do.php" />
	<input type="hidden" name="meta" value="1" />
	<select name="editFile" style="width: 300px;">
	<option>--Please Select--</option>
	<?php
	foreach ($pageList as $page) {
		?>
		<option value="<?=$page?>"><?=$page?></option>
		<?php
	}
	?>
	</select>
	<br />
	<br />
	<input type="submit" name="Continue" value="Continue" />
	</form>
   </td>
 </tr>
</table>
<br />
<?php
include('templates/footer.inc.php');
