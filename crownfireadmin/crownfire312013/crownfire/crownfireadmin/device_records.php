<?php
session_start();
include('includes/init.php');
$document = new document($_REQUEST['id']);
if ($_REQUEST['id']) {
	$formInfo = $document->getData('document_data_9_device','document_id',$_REQUEST['id'],true, null, true);
} else {
	$formInfo = $document->getData('document_data_9_device','temp_id',$_REQUEST['temp_id'],true);
}
if ($_REQUEST['edit_id']) {
	$formValue = $document->getData('document_data_9_device','id', $_REQUEST['edit_id']);
}
?>
<meta http-equiv="Content-Type" content="application/xhtml+xml; charset=utf-8" />
<link href="css/styles.css" rel="stylesheet" />
<script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="js/jquery-ui-1.8.20.custom.min.js"></script>
<script type="text/javascript" src="js/functions.js"></script>
<!--[if IE]><script type="text/javascript" src="excanvas.js"></script><![endif]-->
<script type="text/javascript" src="js/html5-canvas-drawing-app.js"></script>
</script>
<link rel='shortcut icon' href="img/favicon.ico" type="image/x-icon" />
<!--[if IE 6]>
<link href="css/ie6.css" rel="stylesheet" />
<style type="text/css">
        .logo a, .toolbar a, .gift a, .mini_toolbar a, h4, h3, .calendardetails, .steps li, img, .editLink {
                behavior: url(css/iepngfix.htc)
        }
</style>
<![endif]-->
<!--[if IE 7]>
<link href="css/ie7.css" rel="stylesheet" />
<![endif]-->
<script>
$(function() {
        $( "#sortable" ).sortable();
        
        
        $(document).ready(function() {
            $("#sortable").sortable({
                handle : '.devicetable', 
                update : function () { 
                var order = $('#sortable').sortable('serialize');
                $('#info').html('<img src="../img/loading.gif" /> Saving ... Please wait');
                $('div#table_container').addClass('overlay');
                $.post("device-sort.php", { order: order },
                    function(data) {
                        $('#info').html(data);
                        $('div#table_container').removeClass('overlay');
                    });
                }
                
            }); 
        }); 
});
</script>
</head>
<body class="whitebg">
    
<h2>Device Records</h2>
<div id="info"></div> 
<div id="table_container">
    
    
<ul id="sortable">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
 <tr align="center" bgcolor="#000" style="color: #fff;">
  <td width="12%">Location</td>
  <td width="15%">Device Type</td>
  <td width="5%">Correctly Installed</td>
  <td width="5%">Requires Service</td>
  <td width="5%">Alarm Operation <br />Confirmed</td>
  <td width="5%">Annunciator Indication <br />Confirmed</td>
  <td width="10%">Zone Address</td>
  <td width="13%">Smoke Sensitivity</td>
  <td width="20%">Remarks</td>
  <td width="5%">&nbsp; </td>
  <td width="5%">&nbsp; </td>
 </tr>
 <form method="post" action="device_records_do.php">
  <tr align="center" id="zone<?=$i?>">
   <td width="12%"><input type="text" name="location" value="<?=stripslashes($formValue['location'])?>" style="width: 85px;" /></td>
   <td width="15%"><input type="text" name="device" value="<?=stripslashes($formValue['device'])?>" style="width: 75px;" /></td>
   <td width="5%"><input type="checkbox" name="correctly_installed" value="Yes" style="width: 55px;" <?php if(strtolower($formValue['correctly_installed']) == 'yes' || (!isset($formValue['correctly_installed']))) { echo ' checked'; } ?>/></td>
   <td width="5%"><input type="checkbox" name="requires_service" value="Yes" style="width: 75px;" <?php if(strtolower($formValue['requires_service']) == 'yes') { echo ' checked'; } ?> /></td>
   <td width="5%"><input type="checkbox" name="alarm" value="Yes" style="width: 55px;"  <?php if(strtolower($formValue['alarm']) == 'yes' || (!isset($formValue['alarm']))) { echo ' checked'; } ?>/></td>
   <td width="5%"><input type="checkbox" name="confirmed" value="Yes" style="width: 55px;"  <?php if(strtolower($formValue['confirmed']) == 'yes') { echo ' checked'; } ?>/></td>
   <td width="10%"><input type="text" name="zone_address" value="<?=stripslashes($formValue['zone_address'])?>" style="width: 75px;" /></td>
   <td width="13%"><input type="text" name="smoke_sensitivity" value="<?=stripslashes($formValue['smoke_sensitivity'])?>" style="width: 55px;" /></td>
   <td width="20%"><input type="text" name="remarks" value="<?=stripslashes($formValue['remarks'])?>" style="width: 95px;" /></td>
   <td width="5%" align="middle"> &nbsp; </td>
   <td width="5%" align="middle"><input type="submit" name="save" class="smallbutton" value="Save" /></td>
   <input type="hidden" name="temp_id" value="<?=$_REQUEST['temp_id']?>" />
   <input type="hidden" name="id" value="<?=$_REQUEST['id']?>" />
   <input type="hidden" name="edit_id" value="<?=$_REQUEST['edit_id']?>" />
  </tr>
 </form>
 <tr>
  <td colspan="12"><hr /></td>
 </tr>
</table>
 
<?php
if (is_array($formInfo)) {
foreach($formInfo as $form) {
  ?>
  <li id="listItem_<?=$form['id']?>">
 <table width="100%" border="0" cellspacing="0" cellpadding="0" class="devicetable">
  <tr align="center" id="zone<?=$i?>">
   <td width="11%"><?=stripslashes($form['location'])?></td>
   <td width="11%"><?=stripslashes($form['device'])?></td>
   <td width="7%"><?php if (strtolower($form['correctly_installed']) == 'yes') { echo 'Yes'; } else { echo 'No'; }?></td>
   <td width="10%"><?php if(strtolower($form['requires_service']) == 'yes') { echo 'Yes'; } else { echo 'No'; } ?> </td>
   <td width="8%"><?php if(strtolower($form['alarm']) == 'yes') { echo 'Yes'; } else { echo 'No'; } ?></td>
   <td width="9%"><?php if(strtolower($form['confirmed']) == 'yes') { echo 'Yes'; } else { echo 'No'; } ?></td>
   <td width="10%"><?=stripslashes($form['zone_address'])?></td>
   <td width="10%"><?=stripslashes($form['smoke_sensitivity'])?></td>
   <td width="16%"><?=stripslashes($form['remarks'])?></td>
   <td width="5%"><a href="device_records.php?id=<?=$_REQUEST['id']?>&temp_id=<?=$_REQUEST['temp_id']?>&edit_id=<?=$form['id']?>#top"><img src="images/icons/edit.png" border="0" /></a></td>
   <td width="5%"><a href="device_records_do.php?id=<?=$_REQUEST['id']?>&temp_id=<?=$_REQUEST['temp_id']?>&delete_id=<?=$form['id']?>"><img src="images/icons/delete.png" border="0" /></a></td>
  </tr>
  </table></li>
  <?php
}
}
?>
 </ul>
</table>
</div>
</body></html>