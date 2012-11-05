<?php
session_start();
$page = $_POST['editFile'];
// Man this is stupid.
$_SESSION['page'] = $page;

if ($_POST['meta']) {
	header('Location: meta.php');	
} else {
	header('Location: editPage.php');
}
?>
