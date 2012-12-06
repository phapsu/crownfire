<?php
$title = 'Properties';
include('templates/header.inc.php');

$user = new users();
$user_data = $user->getUserInfo($_REQUEST['user_id']);

// And get their properties
$property = new property();
$property_list = $property->getListByUserId($_REQUEST['user_id']);
?>
<a href="customers.php"><< Back to Customers</a> <br /> &nbsp; <br />
<?=$display->userInfoWindow($user_data)?>
<br />
<ul class="tools">
 <li><a href="edit_property.php?user_id=<?=$_REQUEST['user_id']?>" class="addproperty">Add Property</a></li>
</ul>
<br />

<table class="listTable highlight" cellspacing="0" cellpadding="0" border="0">
<tr class="tableRowHeader">
<th width="5%">ID</th>
<th width="20%">Name</th>
<th width="20%">Address</th>
<th width="5%">Edit</th>
<th width="5%">Delete</th>
<th width="5%">Map</th>
<th width="5%">Full Reports</th>
<th width="5%">Properties</th>
</tr>
<?php
if (is_array($property_list) && count($property_list) > 0) {
	foreach($property_list as $property_obj) {
		?>
		<tr align="center">
		 <td><?=$property_obj->getPropertyId();?></td>
		 <td><?=stripslashes($property_obj->getName());?></td>
		 <td><?=stripslashes($property_obj->getAddress1());?>, <?=stripslashes($property_obj->getAddress2());?><br /><?=stripslashes($property_obj->getCity());?>, <?=$property_obj->getProvince();?><br /><?=$property_obj->getCountry();?></td>
		 <td><a href="edit_property.php?id=<?=$property_obj->getPropertyId();?>&user_id=<?=$property_obj->getUserId();?>"><img border="0" src="images/icons/edit.png" /></a></td>
		 <td><a href="delete_property_do.php?user_id=<?=$property_obj->getUserId();?>&property_id=<?=$property_obj->getPropertyId();?>"><img border="0" src="images/icons/delete.png" /></a></td>
		 <td><img border="0" src="images/icons/mapIcon.png" title="View Map" alt="View Map" /></td>
                 <td>
                     <?php                     
                     $yearsArray = document::getYears($property_obj->getPropertyId());
                     echo '<table class="emptytable" align="middle">';
                         echo '<tr>';
                     
                     //show file pdf trong thu muc documents tuong ung voi property 
                     //$filename = "full_report_189_2012.pdf";
                     $targetPath = $_SERVER['DOCUMENT_ROOT'].'/documents';   

                     $min_year = min($yearsArray);
                     
                     for($i=$min_year-2; $i<$min_year; $i++){
                         $document_name = $targetPath.'/full_report_'.$property_obj->getPropertyId().'_'.$i.'.pdf';
                         //echo $document_name;
                         if (file_exists($document_name)) {
                         ?>    
                            <td>
                                <table class="emptytable">
                                <tr>
                                    <td><img border="0" src="images/icons/pdf_icon.gif" title="PDF Download <?=$i?>" alt="Download" /></td>
                                </tr>
                                <tr>
                                    <td><a href="<?=$document_name;?>"><?=$i?></a></td>                                    
                                </tr>
                                </table>
                             </td>
                          <?php                             
                        }
                     }
                     
                     if (is_array($yearsArray) && count($yearsArray) > 0) {
                         
                         foreach($yearsArray as $year) {
                             if (!$year) {
                                 continue;
                             }
                             ?>
                             <td>
                                <table class="emptytable">
                                <tr>
                                    <td><img border="0" src="images/icons/pdf_icon.gif" title="PDF Download <?=$year?>" alt="Download" /></td>
                                </tr>
                                <tr>
                                    <td><a href="view_document_all.php?property_id=<?=$property_obj->getPropertyId()?>&year=<?=$year?>"><?=$year?></a></td>
                                </tr>
                                </table>
                             </td>
                             <?php
                         }
                         
                     }                     
                     echo '</tr>';
                     echo '</table>';
                     ?>
                     
                 </td>
		 <td><a href="documents.php?user_id=<?=$property_obj->getUserId();?>&property_id=<?=$property_obj->getPropertyId();?>"><img border="0" src="images/icons/template.png" title="View Reports" alt="View Reports" /></a></td>
		</tr>
	<?php
	}
} else {
?>
<tr>
 <td colspan="6" align="center"><i>There are no properties for this customer yet.  You can <a href="edit_property.php?user_id=<?=$_REQUEST['user_id']?>">add a property</a> now.</i></td>
</tr>
<?php	
}
?>
</table>
<?php
include('templates/footer.inc.php');
?>