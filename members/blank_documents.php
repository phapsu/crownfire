<?php
$title = 'Documents';
include('templates/header.template_full.php');


// And get their properties
$property_id = (isset($_REQUEST['property_id'])) ? $_REQUEST['property_id'] : null;
$document = new document();
$document_list = $document->getBlankDocumentsByPropertyId($property_id);
?>

<ul class="tools">
    <li><a href="add_blank_document.php?property_id=<?php echo $property_id;?>" class="addproperty">Add Document</a></li>	
</ul>
<br />

<table class="listTable highlight" cellspacing="0" cellpadding="0" border="0">
<tr class="tableRowHeader">
<th width="5%">ID</th>
<th width="15%">Type</th>
<th width="5%">&nbsp; </th>
<th width="5%">&nbsp; </th>
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
	<tr align="center">
	 <td><?=$document_obj->getDocumentId();?></td>
	 <td><?=$typeName;?></td>	
	 <td><a href="delete_document_do.php?id=<?=$document_obj->getDocumentId();?>&user_id=<?=$document_obj->getUserId();?>&property_id=<?=$document_obj->getPropertyId();?>" onclick="return confirm('Are you sure you want to delete this document? \n\n ALL DATA WILL BE LOST');"><img border="0" src="images/icons/delete.png" /></a></td>
	 <?php
	 if($document_obj->getTypeId() == 11) {
	 	?>
	 	<td><a href="<?=$cfg['site_url']?>/members/view_cert.php?property_id=<?=$document_obj->getPropertyId();?>&name=<?php echo urlencode($document_obj->getName());?>&type=<?php echo urlencode($typeName);?>&created=<?php echo $created;?>&blank=<?php echo $document_obj->getTypeId();?>"><img border="0" src="images/icons/view.png" /></a></td>
	 	<?php
	 } else {
	 	?>
                <td><a href="export_blank_document.php?id=<?=$document_obj->getDocumentId();?>&name=<?php echo urlencode($document_obj->getName());?>&type=<?php echo urlencode($typeName);?>&created=<?php echo $created;?>&blank=<?php echo $document_obj->getTypeId();?>"><img border="0" src="images/icons/view.png" /></a></td>
	 	<?php
	 }
	 ?>
	</tr>
<?php
}
?>
</table>
<?php
include('templates/footer.template_full.php');
?>