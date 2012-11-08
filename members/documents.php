<?php
$title = 'Documents';
include('templates/header.template.php');

if (isset($_REQUEST['year'])) {
    $year = $_REQUEST['year'];
} else {
    $year = date('Y');
}

$user = new users();
$user_data = $user->getUserInfo($_SESSION['user_id']);

// And get their properties
$document = new document();
$document_data = $document->getDocumentsByPropertyId($_REQUEST['property_id'], null, null, $year);
?>
<br />
<a href="index.php">&lt;&lt; Back to Properties</a> <br /> &nbsp; <br />

<table>
<form method="GET" action="<?php echo $_SERVER['PHP_SELF']; ?>" />
 <input type="hidden" name="property_id" value="<?php echo $_REQUEST['property_id']?>" />
 <tr>
  <td>Reports Year: </td>
  <td>
   <select name="year" onChange="this.form.submit();" style="width: 150px;">
   <?php
   if (!isset($_REQUEST['year'])) {
       $selected_year = date('Y');
   } else {
       $selected_year = $_REQUEST['year'];
   }
   
   for ($i=date('Y');$i>=2011;$i--) {
       ?>
       <option value="<?php echo $i; ?>"
       <?php 
       if ($i == $selected_year) {
           echo ' selected="selected"';
       }
       ?>
       ><?php echo $i; ?></option>
       <?php
   }
   ?>
   </select>
  </td>
 </tr>
</form>
</table>
  
</form>
<table class="listTable highlight" cellspacing="0" cellpadding="0" border="0">
<tr class="tableRowHeader">
<th width="20%">Type</th>
<th width="20%">Created</th>
<th width="20%">Last Updated</th>
<th width="5%">Download</th>
</tr>
<?php
$items = 0;
if (is_array($document_data) && count($document_data) != 0) {
        $items++;
	?>	
	<tr align="center">
	 <td>Inspection Report</td>
	 <td><?=date('F, jS, Y H:i:s',document::getCreatedData($_REQUEST['property_id']))?></td>
	 <td><?=date('F, jS, Y H:i:s',document::getUpdatedData($_REQUEST['property_id']))?></td>
	 <td><a href="view_document.php?property_id=<?=$_REQUEST['property_id']?>&year=<?=$year?>"><img border="0" src="../img/icons/pdf_icon.gif" /></a></td>
	</tr>	
	<?php
}
if ($certData = $document->getCertificate($_REQUEST['property_id'], 1)) {
        $items++;
	?>
	<tr align="center">
	 <td>Certificate</td>
	 <td><?=date('F, jS, Y H:i:s',document::getCreatedData($_REQUEST['property_id']))?></td>
	 <td><?=date('F, jS, Y H:i:s',document::getUpdatedData($_REQUEST['property_id']))?></td>
	 <td><a href="view_cert.php?property_id=<?=$_REQUEST['property_id']?>&year=<?=$_REQUEST['year']?>"><img border="0" src="../img/icons/pdf_icon.gif" /></a></td>
	</tr>
	<?php
}
if ($items == 0) {
    ?>
    <tr>    
     <td colspan="4" align="center"><i>No reports to display.  Reports for a different year may be available.</i></td>
    </tr>
    <?php
}
?>
</table>
<?php
include('templates/footer.template.php');
?>