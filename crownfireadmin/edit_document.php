<?php
$title = 'Edit Document';
include('templates/header.inc.php');

// Pull our document info
$document = new document($_REQUEST['id']);
$users = new users();
$userInfo = $users->getUserInfo($_REQUEST['user_id']);
?>
<a href="documents.php?user_id=<?= $_REQUEST['user_id'] ?>&property_id=<?= $_REQUEST['property_id'] ?>"><< Back to Documents</a> <br /> &nbsp; <br />
<?php
$display->userInfoWindow($userInfo);

$documentTypeName = document::getDocumentTypeById($_REQUEST['type_id']);
?>
<form method="post" id="edit_document_2_do" action="edit_document_2_do.php">
    <input type="hidden" name="id" value="<?= $_REQUEST['id'] ?>" />
    <input type="hidden" name="type_id" value="<?= $_REQUEST['type_id'] ?>" />
    <input type="hidden" name="user_id" value="<?= $_REQUEST['user_id'] ?>" />
    <input type="hidden" name="property_id" value="<?= $_REQUEST['property_id'] ?>" />
    <fieldset style="width: 900px;">
        <legend>Document - <?= $documentTypeName ?></legend>
        <input name="document_name" type="hidden" value="<?= $documentTypeName ?>">
        <table width="100%">
            <tr>
                <td width="20%">Document Year:</td>
                <td><input type="text" name="document_year" class="required" value="<?php echo $document->getYear(); ?>" /></td>
                <input type="hidden" name="last_year" value="<?php echo $document->getYear(); ?>">
            </tr>
        </table>
        <button value="Blank Document" id="blank_document" name="blank_document" type="button" style="float: right; margin-top: -30px; position: relative;">Blank Document</button>
        <hr color="Red" />
        <?php
        include('includes/document_' . $_REQUEST['type_id'] . '.inc');
        ?>
        <h3>Options</h3>
        <table width="100%">
            <tr>
                <td width="20%">Document Status:</td>
                <td>
                    <select name="state_id">
                        <?php
                        foreach ($document_states as $stateArray) {
                            echo '<option value="' . $stateArray['id'] . '"';
                            if ($stateArray['id'] == $document->getStateId()) {
                                echo ' selected';
                            }
                            echo '>' . $stateArray['statename'] . '</option>';
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td><?= logger::logLink('Notification:', 'document', 'notification', $_REQUEST['id']); ?>:</td>
                <td>
                    <input type="checkbox" name="fl_email" value="1" style="width: 15px;"> Email the Customer Notification of this Document
                </td>
            </tr>
            <tr>
                <td>Deficiency:</td>
                <td>
                    <select name="deficiency" id="deficiency">
                        <option value="0">No</option>
                        <option value="1">Yes</option>
                    </select>
                    <script>
                        $(function(){
                            $('#deficiency').val("<?php echo $document->getDeficiency();?>");
                        });
                    </script>
                </td>
            </tr>
        </table>
        <br /><br />
        <button id="btn_save" class="save" type="button" name="submit_n" value="Save">Save</button>&nbsp; &nbsp; &nbsp; <button class="cancel" type="button" onClick="location.href='documents.php?user_id=<?= $_REQUEST['user_id'] ?>&property_id=<?= $document->getPropertyId() ?>'">Cancel</button>
    </fieldset>
</form>
<?php
include('templates/footer.inc.php');
?>

<script>
  $(document).ready(function(){	
    $("#edit_document_2_do").validate();
    
    $("#blank_document").click(function(){
        
        $('#edit_document_2_do').removeAttr('action');
        $('#edit_document_2_do').attr('action', 'blank_document_2_do.php');  
        $('#edit_document_2_do')[0].submit();
    });
    
    $("#btn_save").click(function(){
//          var user_id = "<?= $_REQUEST['user_id'] ?>";
//          var property_id = "<?= $_REQUEST['property_id'] ?>";
//           
//           
//          $.ajax({
//               type: "POST",
//               url: "edit_document_2_do.php",
//               data: $("#edit_document_2_do").serialize(),
//               success: function(){
//                 window.location.href='/crownfireadmin/documents.php?user_id='+user_id+'&property_id='+property_id;
//               }
//             })
        
        
        
        
        $('#edit_document_2_do').removeAttr('action');
        $('#edit_document_2_do').attr('action', 'edit_document_2_do.php');  
        $('#edit_document_2_do')[0].submit();
    });
    
    
  });
  </script>