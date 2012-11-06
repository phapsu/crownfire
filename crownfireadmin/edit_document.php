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
        <table width="100%">
            <tr>
                <td width="20%">Document Year:</td>
                <td><input type="text" name="document_year" class="required" value="<?php echo $document->getYear(); ?>" /></td>
            </tr>
        </table>
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
        <button class="save" type="submit" name="submit_n" value="Save">Save</button>&nbsp; &nbsp; &nbsp; <button class="cancel" type="button" onClick="location.href='documents.php?user_id=<?= $_REQUEST['user_id'] ?>&property_id=<?= $document->getPropertyId() ?>'">Cancel</button>
    </fieldset>
</form>
<?php
include('templates/footer.inc.php');
?>

<script>
  $(document).ready(function(){	
    $("#edit_document_2_do").validate();
  });
  </script>