<?php
$title = 'Properties';
include('templates/header.inc.php');

$users = new users();
$userInfo = $users->getUserInfo($_REQUEST['user_id']);
?>
<a href="documents.php?user_id=<?= $_REQUEST['user_id'] ?>&property_id=<?= $_REQUEST['property_id'] ?>"><< Back to Documents</a> <br />
<?php
$display->userInfoWindow($userInfo);
$document_states = document::getDocumentStates();

if (isset($_REQUEST['existing_id'])) {
    $_REQUEST['id'] = $_REQUEST['existing_id'];
    $document = new document($_REQUEST['id']);
}
?>
<hr />
<div id="options_link_on">
    <img src="img/icons/copy.jpg" />
    <a href="javascript:void(0);" onClick="showIt('options'); hideIt('options_link_on'); showIt('options_link_off');">Show Options</a>
</div>
<div id="options_link_off" style="display: none;">
    <img src="img/icons/copy.jpg" />
    <a href="javascript:void(0);" onClick="hideIt('options'); hideIt('options_link_off'); showIt('options_link_on');">Hide Options</a>
</div>
<hr />
<div id="options" style="display: none;">
    <fieldset style="width: 800px;">
        <legend>Options</legend>
        <table>
            <form method="post" id="add_document_2" action="add_document_2.php">
                <input type="hidden" name="type_id" value="<?= $_REQUEST['type_id'] ?>" />
                <input type="hidden" name="user_id" value="<?= $_REQUEST['user_id'] ?>" />
                <input type="hidden" name="property_id" value="<?= $_REQUEST['property_id'] ?>" />
                <tr>
                    <td>Import from Existing Report:</td>
                    <td>
                        <select name="existing_id" style="width:400px;">
                            <?php
                            $existing_reports = document::getExistingReports($_REQUEST['user_id'], $_REQUEST['property_id'], $_REQUEST['type_id']);
                            if (is_array($existing_reports)) {
                                echo '<option value="">-- Please Select --</option>';
                                foreach ($existing_reports as $ereport_obj) {
                                    $name = null;
                                    $doc_name = $ereport_obj->getYear();
                                    if (!empty($doc_name)) {
                                        $name = $ereport_obj->getYear();
                                    } else {
                                        $name = '[NO YEAR SET]';
                                    }
                                    $name .= ' - ' . date('F, jS, Y H:i:s', $ereport_obj->getDateAdded());

                                    echo '<option value="' . $ereport_obj->getDocumentId() . '">' . strtoupper($name) . '</option>';
                                }
                            }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>&nbsp; </td>
                    <td><button class="continue" type="submit" name="submit_n" value="Save">Continue</button></td>
                </tr>
            </form>
        </table>
    </fieldset>
</div>

<form method="post" id="edit_document_2_do" action="edit_document_2_do.php">
    <input type="hidden" name="type_id" value="<?= $_REQUEST['type_id'] ?>" />
    <input type="hidden" name="user_id" value="<?= $_REQUEST['user_id'] ?>" />
    <input type="hidden" name="property_id" value="<?= $_REQUEST['property_id'] ?>" />
    <fieldset style="width: 800px;">
        <legend>Add Document - <?= document::getDocumentTypeById($_REQUEST['type_id']) ?></legend>

        <table width="100%">
            <tr>
                <td width="20%">Document Year:</td>
                <td><input type="text" name="document_year" class="required" value="<?php echo date('Y'); ?>" /></td>
                <input type="hidden" name="last_year" value="1">
            </tr>
        </table>
        <hr color="Red" />
        <?php
        include('includes/document_' . $_REQUEST['type_id'] . '.inc');
        if (isset($_REQUEST['existing_id'])) {
            $_REQUEST['id'] = null;
        }
        ?>
        <h3>Options</h3>
        <table width="100%">
            <tr>
                <td width="20%">Document Status:</td>
                <td>
                    <select name="state_id">
                        <?php
                        foreach ($document_states as $stateArray) {
                            echo '<option value="' . $stateArray['id'] . '">' . $stateArray['statename'] . '</option>';
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td><?= logger::logLink('Notification:', 'document', 'notification', @$_REQUEST['id']); ?>:</td>
                <td>
                    <input type="checkbox" name="fl_email" value="1" style="width: 5px;"> Email the Customer Notification of this Document
                </td>
            </tr>
            <tr>
                <td>Deficiency:</td>
                <td>
                    <select name="deficiency" >
                        <option value="0">No</option>
                        <option value="1">Yes</option>
                    </select>
                </td>
            </tr>
        </table>
        <br /><br />
        <button class="save" type="submit" name="submit_n" value="Save">Save</button>&nbsp; &nbsp; &nbsp; <button class="cancel" type="button" onClick="location.href='aindex.php'";>Cancel</button>
    </fieldset>
</form>
<?php
include('templates/footer.inc.php');
?>

<script>
  $(document).ready(function(){
	$("#add_document_2").validate();
    $("#edit_document_2_do").validate();
  });
  </script>