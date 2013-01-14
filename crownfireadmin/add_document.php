<?php
$title = 'Properties';
include('templates/header.inc.php');

$users = new users();
$userInfo = $users->getUserInfo($_REQUEST['user_id']);
$doc = new document();
//$listDocumentID = $doc->getListDocumentTypeIdByPropertyId($_REQUEST['property_id']);
$document_types = $doc->getDocumentTypes();
?>
<?= $display->userInfoWindow($userInfo) ?>
<fieldset style="width: 800px;">
    <legend>Add Document</legend>
    <table cellpadding="8">
        <form method="post" action="add_document_do.php">
            <tr valign="top" valign="middle">
                <td>Select type:</td>
                <td>
                    <select name="type_id" style="width: 400px;">
                        <option value="">-- Select --</option>
                        <?php
                        foreach ($document_types as $typeArray) {
//                            if(in_array($typeArray['id'], $listDocumentID)){
//                                continue;
//                            }
                            echo '<option value="' . $typeArray['id'] . '">' . $typeArray['type'] . '</option>';
                        }
                        ?>
                    </select>
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

<?php
include('templates/footer.inc.php');
?>