<?php
$title = 'Properties';
include('templates/header.inc.php');


$_REQUEST['user_id'] = $_SESSION['admin_id'];
$_REQUEST['property_id'] = null;
$_REQUEST['type_id'] = $_POST['type_id'];
$redirect = $_POST['redirect'];

$document_states = document::getDocumentStates();

if (isset($_REQUEST['existing_id'])) {
    $_REQUEST['id'] = $_REQUEST['existing_id'];
    $document = new document($_REQUEST['id']);
}

?>

<div id="options_link_on">   
    <a href="javascript:history.back(-1);">Back</a>
</div>
<br/>
<form method="post" action="blank_document_do.php?redirect=<?php echo urlencode($redirect);?>">
    <input type="hidden" name="type_id" value="<?= $_REQUEST['type_id'] ?>" />
    <input type="hidden" name="user_id" value="<?= $_REQUEST['user_id'] ?>" />
    <input type="hidden" name="property_id" value="<?= $_REQUEST['property_id'] ?>" />
    <fieldset style="width: 800px;">
        <legend>Add Document - <?= document::getDocumentTypeById($_REQUEST['type_id']) ?></legend>

        <table width="100%">
            <tr>
                <td width="20%">Document Year:</td>
                <td><input type="text" name="document_year" value="<?php echo date('Y'); ?>" /></td>
            </tr>
        </table>
        <hr color="Red" />
        <?php
        include('includes/blank_documents/document_' . $_REQUEST['type_id'] . '.inc');      
        ?>       
        <br /><br />
        <button class="save" type="submit" name="submit_n" value="Save">Save</button>&nbsp; &nbsp; &nbsp; <button class="cancel" type="button" onClick="location.href='aindex.php'">Cancel</button>
    </fieldset>
</form>
<?php
include('templates/footer.inc.php');
?>