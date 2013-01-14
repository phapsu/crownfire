<?php
include('templates/header.inc.php');
$pageList = $crownfire->getPages();
if (!in_array($_SESSION['page'],$crownfire->getPages())) {
	exit();
}

$keywords	 = $crownfire->metaKeywords($_SESSION['page']);
$description = $crownfire->metaDescription($_SESSION['page']);
?>
<h1>Edit Meta - <?=$_SESSION['page']?></h1>
<table cellspacing="10">
	<form method="post" action="save_meta_do.php">
 <tr>
  <td>Keywords:</td>
  <td><input type="text" name="keywords" value="<?=$keywords?>" size="160" maxlength="255" /></td>
 </tr>
 <tr>
  <td>Description:</td>
  <td><input type="text" name="description" value="<?=$description?>" size="160" maxlength="255" /></td>
 </tr>
 <tr>
  <td colspan="2"> <br /> <button class="save" type="submit" name="submit_n" value="Save Meta Information">Save Meta Information</button>&nbsp; &nbsp; &nbsp; <button class="cancel" type="button" onClick="location.href='aindex.php'";>Cancel</button></td>
 </table>
</table>


</form>

<?php
include('templates/footer.inc.php');
?>