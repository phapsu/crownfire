<?php
$title = 'Properties';
include('templates/header.template.php');
?>

<h3>View Your Reports Online</h3>
				<form name="frmLogin" action="login_do.php" target="_top" method="post">
					<fieldset>
						<div class="login_item form_username">
							<input name="user_id" id="user_id" value="username or email" class="faded_input" type="text" onClick="this.value='';">
						</div>
						<div class="login_item form_password">
							<input name="password" id="password_holder" value="password" class="faded_input" type="text" onClick="this.value='';">
						</div>
					</fieldset>
					<a href="javascript: void(0);" onClick="frmLogin.submit();" class="button floatright"><span>Login</span><span class="cap"></span></a>
				</form>
<?php
include('templates/footer.template.php');
?>