<?php
session_start();
include("includes/init.php");
///////////////////////////////////////////////////////////
$document = new document();

parse_str($_POST['order'], $chunks);
$order_data = $chunks['listItem'];

if (is_array($order_data)) {
    foreach($order_data as $weight => $device_id) {
        $query = "UPDATE document_data_9_device SET weight = $weight WHERE id = $device_id";
        $document->runQuery($query);
    }
    ?>
    <table cellspacing="0" cellpadding="0">
     <tr>
      <td><img src="../img/checkmark.gif" /></td>
      <td>Complete ...</td>
     </tr>
    </table>
<?php
} else {
    ?>
    <table cellspacing="0" cellpadding="0">
     <tr>
      <td><img src="../img/loading.gif" /></td>
      <td>Saving ...</td>
     </tr>
    </table>
    <?php
}
?>