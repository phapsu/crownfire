<?php
session_start();
$title = 'Page Admin - '.$_SESSION['page'];
include('templates/header.inc.php');

if (!in_array($_SESSION['page'],$crownfire->getPages())) {
	exit();
}
// so stupid and dangerous.
$fileContents = $crownfire->getPageContent();
?>
<br />
<script type="text/javascript" src="tiny_mce/tiny_mce.js"></script>
	<script type="text/javascript">
	tinyMCE.init({
		document_base_url : "http://www.crownfire.ca/",
		content_css : "http://www.crownfire.ca/css/crownfire2010.css",
		mode : "textareas",
		theme : "advanced"
	});
	</script>

<h3>Manage Content</h3>
<form method="post" action="save.php">
<input type="hidden" name="page" value="<?=$_SESSION['page']?>" />
<textarea cols="90" rows="30" name="pagecontents" style="width: 800px;"><?=$fileContents?></textarea>
<br /><br />
<button class="save" type="submit" name="submit_n" value="Save Content">Save Content</button>&nbsp; &nbsp; &nbsp; <button class="cancel" type="button" onClick="location.href='aindex.php'";>Cancel</button>
</form>
<?php
include('templates/footer.inc.php');
?>