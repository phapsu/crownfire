<?php
$title = 'Properties';
include('templates/header.inc.php');

$users = new users();
$userList = $users->getMemberList();


$url = 'view_blank_document.php?id='.$_REQUEST['id'].'&name='.$_REQUEST['name'].'&type='.$_REQUEST['type'].'&typeId='.$_REQUEST['typeId'].'&created='.$_REQUEST['created'];
?>

<fieldset style="background-color: #fff;" class="highlight">
    <legend>Select property</legend>
    <table cellpadding="8">
        <form method="post" action="<?php echo $url;?>">
            <tr valign="top" valign="middle">                
                <td>
                    <select multiple="true" name="customer_id" id="customer_id" style="width: 100%; height: 300px;">
                        <option value="">-- Select --</option>
                        <?php
                        foreach ($userList as $typeArray) {
                            echo '<option value="' . $typeArray['id'] . '">' . $typeArray['name'] . '</option>';
                        }
                        ?>
                    </select>               
                </td>
                <td>
                    <select multiple="true" name="property_id" id="property_id" style="width: 400px; height: 300px;"></select>               
                </td>
            </tr>
            <tr>
                <td>&nbsp; </td>
                <td> <button class="continue" type="submit" name="submit_n" value="Save Property">Continue</button>&nbsp; &nbsp; &nbsp; <button class="cancel" type="button" onClick="location.href='documents.php?user_id=<?= $_REQUEST['user_id'] ?>&property_id=<?= $_REQUEST['property_id'] ?>'">Cancel</button></td>
            </tr>

        </form>
    </table>
</fieldset>
<script>
$(document).ready(function() 
{
    $('#customer_id').bind('click', function() 
    {
        var $this = $('#customer_id');
        var $option = $this.find('option');
        var $property_id = $('#property_id');
        var items = $option.parent().val();
        
        if (items.length > 1) {
            alert("You can only select 1 value at a time");
            
            $option.each(function(){ 
                $(this).removeAttr('selected');
            });            
        }else{
            $.get('<?php echo 'get_json_property_list.php'?>?user_id='+$this.val(), {}, function(data){
                data = jQuery.parseJSON(data);
                $property_id.find("option").remove();
                $.each(data, function(i, property) {
                    $property_id.append('<option value="' + i+ '">' + property + '</option>');
                });
            });
        }
        
       
    });
    $('#property_id').bind('click', function() 
    {
      
        var $property_id = $('#property_id');
        var $property_option = $property_id.find('option');        
        
        if($property_option.parent().val() != undefined && $property_option.parent().val().length > 1){
            alert("You can only select 1 value at a time");
            
            $property_option.each(function(){ 
                $(this).removeAttr('selected');
            });            
        }
    });
});
</script>
<?php
include('templates/footer.inc.php');
?>