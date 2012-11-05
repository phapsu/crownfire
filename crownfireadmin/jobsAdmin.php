<?php
$fileContents = file_get_contents('../jobs.inc');
?>
<hr>
<h1>Jobs Admin</h1>
<hr>
<script type="text/javascript" src="tiny_mce/tiny_mce.js"></script>
	<script type="text/javascript">
	tinyMCE.init({
		mode : "textareas",
		theme : "advanced"
	});
	</script>

<form method="post" action="save.php">
<textarea cols="90" rows="30" name="pagecontents"><?=$fileContents?></textarea>
<br /><br />
<input type="submit" name="submit_n" value="Save Jobs Page" />
</form>