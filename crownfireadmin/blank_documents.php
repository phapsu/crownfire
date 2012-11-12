<?php
$title = 'Documents';
include('templates/header.inc.php');

$user = new users();
$user_data = $user->getUserInfo($_REQUEST['user_id']);

// And get their properties
$document = new document();
$document_list = $document->getBlankDocumentsByUserId($_SESSION['user_id']);
?>
<?=$display->userInfoWindow($user_data)?>
<br />
<ul class="tools">
    <li><a href="add_blank_document.php?user_id=<?=$_REQUEST['user_id']?>&redirect=<?php echo urlencode('blank_documents.php?user_id='.$_SESSION['admin_id']);?>" class="addproperty">Add Document</a></li>	
</ul>
<br />

<table class="listTable highlight" cellspacing="0" cellpadding="0" border="0">
<tr class="tableRowHeader">
<th width="10%">&nbsp; </th>
<th>Type</th>
</tr>
<?php
foreach($document_list as $document_obj) {
	if ($document_obj->getStateId() == 0) {
		$icon = 'images/icons/inactive.png';
		$alt = 'Inactive';
	} else {
		$icon = 'images/icons/active.png';
		$alt = 'Active';
	}
        $typeName = document::getDocumentTypeById($document_obj->getTypeId());
        $created = $document_obj->getDateAdded();
	?>
	<tr> 
            <td align="center"><a href="blank_document_select_property.php?id=<?=$document_obj->getDocumentId();?>&name=<?php echo urlencode($document_obj->getName());?>&type=<?php echo urlencode($typeName);?>&typeId=<?php echo urlencode($document_obj->getTypeId());?>&created=<?php echo $created;?>&blank=true"><img border="0" src="images/icons/view.png" /></a></td>
	 
            <td><?=$typeName;?></td>
	</tr>
<?php
}
?>
</table>
<?php
include('templates/footer.inc.php');
?>