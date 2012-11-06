<?php
$title = 'Properties';
include('templates/header.inc.php');
$document_types = document::getDocumentTypes();
?>

<fieldset style="width: 800px;">
    <legend>Create Blank Document</legend>
    <table cellpadding="8">
        <form method="post" action="add_blank_document_do.php">
            <tr valign="top" valign="middle">
                <td>Select type:</td>
                <td>
                    <select name="type_id" id="typeId" style="width: 400px;">
                        <option value="">-- Select --</option>
                        <?php
                        foreach ($document_types as $typeArray) {
                            echo '<option value="' . $typeArray['id'] . '">' . $typeArray['type'] . '</option>';
                        }
                        ?>
                    </select>
                    <input type="hidden" name="typeName" id="typeName"/>
                    <input type="hidden" name="redirect" value="<?php echo $_GET['redirect'];?>"/>
                </td>
            </tr>
            <tr>
                <td>&nbsp; </td>
                <td> <button class="continue" type="submit" name="submit_n" value="Save Property">Continue</button>&nbsp; &nbsp; &nbsp; <button class="cancel" type="button" onClick="location.href='documents.php?user_id=<?= $_REQUEST['user_id'] ?>&property_id=<?= $_REQUEST['property_id'] ?>'";>Cancel</button></td>
            </tr>
            <input type="hidden" name="user_id" value="<?= $_REQUEST['user_id'] ?>" />
            <input type="hidden" name="property_id" value="<?= $_REQUEST['property_id'] ?>" />
        </form>
    </table>
</fieldset>
<script>
$(function(){
   $('#typeId').change(function(){
       $name = $(this).find(":selected").text();
       $('#typeName').val($name);
   });
});
</script>
<?php
include('templates/footer.inc.php');
?>