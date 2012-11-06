<?php
include('templates/header.inc.php');
$pageList = $crownfire->getPages();
?>
<h2>Crownfire Admin</h2>

<table width="100%">
    <tr>
        <td>
            <fieldset style="width: 500px;">
                <legend>Customers</legend>
                <table width="400">
                    <tr valign="top">
                        <td><a href="customers.php"><img border="0" src="images/user-group-icon.png" /></a></td>
                        <td>
                            Manage the customers and their properties.  Create and manage their reports and certificates.
                        </td>
                    </tr>
                </table>
            </fieldset>
        </td>
        <td>
            <fieldset style="width: 500px;">
                <legend>Content</legend>
                <table width="400">
                    <tr valign="top">
                        <td><a href="content.php"><img border="0" src="images/pages-icon.png" width="48" height="48" /></a></td>
                        <td>
                            Manage the content on Crownfire.com
                        </td>
                    </tr>
                </table>
            </fieldset>

        </td>
    </tr>
    <tr>
        <td>
            <fieldset style="width: 500px;">
                <legend>Meta Tags</legend>
                <table width="400">
                    <tr valign="top">
                        <td><a href="metaadmin.php"><img border="0" src="images/icons/html-icon.png" width="48" height="48" /></a></td>
                        <td>
                            Manage the keywords and descriptions for all pages on Crownfire.com
                        </td>
                    </tr>
                </table>
            </fieldset>

        </td>
        <td>
            <fieldset style="width: 500px;">
                <legend>Stats</legend>
                <table width="400">
                    <tr valign="top">
                        <td><a target="_new" href="http://npoole:Nate123@www.crownfire.ca/plesk-stat/webstat/"><img border="0" src="images/icon_seo.png" width="48" height="48" /></a></td>
                        <td>
                            Website stats for Crownfire.com.  
                        </td>
                    </tr>
                </table>
            </fieldset>


        </td>
    </tr>

    <tr>
        <td> 
            <fieldset style="width: 500px;">
                <legend>Document</legend>
                <table width="400">
                    <tr valign="top">
                        <td><a href="blank_documents.php?user_id=<?php echo $_SESSION['admin_id'];?>"><img border="0" src="images/pages-icon.png" width="48" height="48" /></a></td>
                        <td>
                            Create Blank Document
                        </td>
                    </tr>
                </table>
            </fieldset>
        </td>      
        <td>
            <?php if (isset($_SESSION['user_type']) && $_SESSION['user_type'] == 1 && isset($_SESSION['admin_id'])): ?>  
                <fieldset style="width: 500px;">
                    <legend>User</legend>
                    <table width="400">
                        <tr valign="top">
                            <td><a href="users.php"><img border="0" src="images/user-group-icon.png" /></a></td>
                            <td>
                                Manage user access back-end
                            </td>
                        </tr>
                    </table>
                </fieldset>  
            <?php endif; ?>
        </td>   
    </tr>

</table>



<?php
include('templates/footer.inc.php');
?>