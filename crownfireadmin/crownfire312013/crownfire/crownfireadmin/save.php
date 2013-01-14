<?php
$contents = stripslashes($_POST['pagecontents']);

$fp = fopen('../pageincludes/'.$_POST['page'],'w+');
fwrite($fp,$contents);
fclose($fp);
?>
<h1>Complete</h1>

Your file has been saved.
<br /><br />
<a href="aindex.php">Return to Admin</a>