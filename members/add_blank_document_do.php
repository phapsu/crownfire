<?php
$title = 'Properties';
include('templates/header.template_full.php');


$_REQUEST['user_id'] = $_POST['user_id'];
$_REQUEST['property_id'] = $_POST['property_id'];
$_REQUEST['type_id'] = $_POST['type_id'];


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
<form method="post" action="edit_document_2_do.php" id="blankDocument">
    <input type="hidden" name="type_id" value="<?= $_REQUEST['type_id'] ?>" />
    <input type="hidden" name="user_id" value="<?= $_REQUEST['user_id'] ?>" />
    <input type="hidden" name="property_id" value="<?= $_REQUEST['property_id'] ?>" />
    <fieldset>
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
        <button class="save" type="button" id="submit_n" name="submit_n" value="Save">Save</button>&nbsp; &nbsp; &nbsp; <button class="cancel" type="button" onClick="location.href='aindex.php'">Cancel</button>
    </fieldset>
</form>
<?php
include('templates/footer.template_full.php');
?>
<script type="text/javascript">
$(function(){
//    $("input").attr('readonly', true);
    $('#submit_n').bind('click', function(){
//        $("input:radio, input:checkbox").not(":button, :submit, :reset, :hidden").each(function () {
//            $(this).removeAttr('checked').removeAttr('selected');
//        });
//        
//        $("input:text, input:password, input:file, select, textarea").not(":button, :submit, :reset, :hidden").each(function () {
//            $(this).val('');
//        });
        
        $('#blankDocument').submit();
    });
});
</script>