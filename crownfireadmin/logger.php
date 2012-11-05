<?php
include('templates/header_min.inc.php');
$history = logger::getLog($_REQUEST['section'], $_REQUEST['type'], $_REQUEST['id']);
?>
<h3>History</h3>
<table class="listTable highlight" cellspacing="0" cellpadding="0" border="0">
<tr class="tableRowHeader">
<th width="15%">Date</th>
<th width="20%">User</th>
<th width="20%">Action</th>
</tr>
<?php
if(is_array($history)) {
	foreach($history as $historyArray) {
		?>
		<tr align="center">
		 <td><?=date($cfg['date_format'],$historyArray['date_added'])?></td>
		 <td><?=$historyArray['name']?></td>
		 <td><?=ucFirst($historyArray['section'])?> <?=ucFirst($historyArray['type'])?></td>
		</tr>
	<?php
	}
}
?>
</table>

<center><a href="javascript:window.close();">Close Window</a></center>

<?php
include('templates/footer_min.inc.php');
?>