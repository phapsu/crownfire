<?php
$title = 'Documents';
include('templates/header.inc.php');

$user = new users();
$user_data = $user->getUserInfo($_REQUEST['user_id']);

// And get their properties
$document = new document();
$document_list = $document->getDocumentsByPropertyId($_REQUEST['property_id']);
?>
<a href="view_properties.php?user_id=<?=$_REQUEST['user_id']?>">&lt;&lt; Back to Properties</a> <br /> &nbsp; <br />
<?=$display->userInfoWindow($user_data)?>
<br />
<ul class="tools">
	<li><a href="add_document.php?user_id=<?=$_REQUEST['user_id']?>&property_id=<?=$_REQUEST['property_id']?>" class="addproperty">Add Document</a></li>	
</ul>
<br />

<table class="listTable highlight" cellspacing="0" cellpadding="0" border="0">
<tr class="tableRowHeader">
<th width="5%">ID</th>
<th width="5%">Year</th>
<th width="15%">Name</th>
<th width="15%">Type</th>
<th width="10%">Created</th>
<th width="10%">Last Updated</th>
<th width="5%">&nbsp; </th>
<th width="5%">&nbsp; </th>
<th width="5%">&nbsp; </th>
<th width="5%">&nbsp; </th>
</tr>
<?php
$type_id=0;
foreach($document_list as $document_obj) {
        if($type_id!=$document_obj->getTypeId())
        {
            $type_id = $document_obj->getTypeId();
        }
        else continue; 
            
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
         <td><?=$document_obj->getYear()?></td>
	 <td><?=$document_obj->getName();?></td>
	 <td><?=$typeName;?></td>
	 <td><?=date('F, jS, Y H:i:s',$created);?></td>
	 <td><?=date('F, jS, Y H:i:s',$document_obj->getDateUpdated())?></td>
	 <td><a href="edit_document.php?id=<?=$document_obj->getDocumentId();?>&user_id=<?=$document_obj->getUserId();?>&type_id=<?=$document_obj->getTypeId();?>&property_id=<?=$document_obj->getPropertyId();?>"><img border="0" src="images/icons/edit.png" /></a></td>
	 <td><a href="delete_document_do.php?id=<?=$document_obj->getDocumentId();?>&user_id=<?=$document_obj->getUserId();?>&property_id=<?=$document_obj->getPropertyId();?>" onclick="return confirm('Are you sure you want to delete this document? \n\n ALL DATA WILL BE LOST');"><img border="0" src="images/icons/delete.png" /></a></td>
	 <?php
	 if($document_obj->getTypeId() == 11) {
	 	?>
	 	<td><a href="<?=$cfg['site_url']?>/members/view_cert.php?property_id=<?=$document_obj->getPropertyId();?>&name=<?php echo urlencode($document_obj->getName());?>&type=<?php echo urlencode($typeName);?>&created=<?php echo $created;?>"><img border="0" src="images/icons/view.png" /></a></td>
	 	<?php
	 } else {
	 	?>
                <td><a href="view_document.php?id=<?=$document_obj->getDocumentId();?>&name=<?php echo urlencode($document_obj->getName());?>&type=<?php echo urlencode($typeName);?>&created=<?php echo $created;?>"><img border="0" src="images/icons/view.png" /></a></td>
	 	<?php
	 }
	 ?>
	 <td><img border="0" title="<?=$alt?>" alt="<?=$alt?>" src="<?=$icon?>" /></td>
	</tr>
<?php
}
?>
</table>
<?php
include('templates/footer.inc.php');
?>